<?php
/**
 * File holding the SMGeoCoordsValue class.
 * 
 * @file SM_GeoCoordsValue.php
 * @ingroup SMWDataValues
 * @ingroup SemanticMaps
 * 
 * @author Jeroen De Dauw
 * @author Markus Krötzsch
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

/**
 * Implementation of datavalues that are geographic coordinates.
 *
 * @author Jeroen De Dauw
 * @author Markus Krötzsch
 * 
 * @ingroup SemanticMaps
 */
class SMGeoCoordsValue extends SMWDataValue {

	protected $mCoordinateSet;
	protected $mWikivalue;

	/**
	 * Adds support for the geographical coordinate data type to Semantic MediaWiki.
	 * 
	 * TODO: i18n keys still need to be moved
	 */
	public static function initGeoCoordsType() {
		SMWDataValueFactory::registerDatatype( '_geo', __CLASS__, 'Geographic coordinate' );
		return true;
	}
	
	/**
	 * Defines the signature for geographical fields needed for the smw_coords table.
	 * 
	 * @param array $fieldTypes The field types defined by SMW, passed by reference.
	 */
	public static function initGeoCoordsFieldTypes( array $fieldTypes ) {
		global $smgUseSpatialExtensions;

		// Only add the table when the SQL store is not a postgres database, and it has not been added by SMW itself.
		if ( $smgUseSpatialExtensions && !array_key_exists( 'c', $fieldTypes ) ) {
			$fieldTypes['c'] = 'Point NOT NULL';
		}
		
		return true;
	}
	
	/**
	 * Defines the layout for the smw_coords table which is used to store value of the GeoCoords type.
	 * 
	 * @param array $propertyTables The property tables defined by SMW, passed by reference.
	 */
	public static function initGeoCoordsTable( array $propertyTables ) {
		global $smgUseSpatialExtensions;
		
		// No spatial extensions support for postgres yet, so just store as 2 float fields.
		$signature = $smgUseSpatialExtensions ? array( 'point' => 'c' ) : array( 'lat' => 'f', 'lon' => 'f' );
		$indexes = $smgUseSpatialExtensions ? array( array( 'point', 'SPATIAL INDEX' ) ) : array_keys( $signature );
		
		$propertyTables['smw_coords'] = new SMWSQLStore2Table(
			'sm_coords',
			$signature,
			$indexes // These are the fields that should be indexed.
		);
		
		return true;
	}
	
	/**
	 * @see SMWDataValue::parseUserValue
	 */
	protected function parseUserValue( $value ) {
		$this->parseUserValueOrQuery( $value );
	}
	
	/**
	 * Overwrite SMWDataValue::getQueryDescription() to be able to process
	 * comparators between all values.
	 * 
	 * @param string $value
	 * 
	 * @return SMWDescription
	 */
	public function getQueryDescription( $value ) {
		return $this->parseUserValueOrQuery( $value, true );
	}	
	
	/**
	 * Parses the value into the coordinates and any meta data provided, such as distance.
	 */
	protected function parseUserValueOrQuery( $value, $asQuery = false ) {
		$this->mWikivalue = $value;
		
		$comparator = SMW_CMP_EQ;
		
		if ( $value == '' ) {
			$this->addError( wfMsg( 'smw_novalues' ) );
		} else {
			SMWDataValue::prepareValue( $value, $comparator );					

			$parts = explode( '(', $value );
			
			$coordinates = trim( array_shift( $parts ) );
			$distance = count( $parts ) > 0 ? trim( array_shift( $parts ) ) : false;

			if ( $distance !== false ) {
				if ( preg_match( '/^!?\d+(\.\d+)?(\s.+)?\)$/', $distance ) ) {
					$distance = substr( $distance, 0, -1 );
				}
				else {
					$this->addError( wfMsgExt( 'semanticmaps-unrecognizeddistance', array( 'parsemag' ), $distance ) );
					$distance = false;						
				}
			}

			$parsedCoords = MapsCoordinateParser::parseCoordinates( $coordinates );
			if ( $parsedCoords ) {
				$this->mCoordinateSet = $parsedCoords;
				
				if ( $this->m_caption === false && !$asQuery ) {
					global $smgQPCoodFormat, $smgQPCoodDirectional;
					$this->m_caption = MapsCoordinateParser::formatCoordinates( $parsedCoords, $smgQPCoodFormat, $smgQPCoodDirectional );
        		}
			} else {
				$this->addError( wfMsgExt( 'maps_unrecognized_coords', array( 'parsemag' ), $coordinates, 1 ) );
			}
		}

		if ( $asQuery ) {
			$this->setUserValue( $value );
			
			switch ( true ) {
				case !$this->isValid() :
					return new SMWThingDescription();
					break;
				case $distance !== false :
					return new SMAreaValueDescription( $this, $comparator, $distance );
					break;
				default :
					return new SMGeoCoordsValueDescription( $this, $comparator );
					break;										
			}			
		}
	}
	
	/**
	 * @see SMWDataValue::parseDBkeys
	 */
	protected function parseDBkeys( $args ) {
		global $smgUseSpatialExtensions, $smgQPCoodFormat, $smgQPCoodDirectional;
		
		if ( $smgUseSpatialExtensions ) {
			// TODO
		}
		else {
			$this->mCoordinateSet['lat'] = $args[0];
			$this->mCoordinateSet['lon'] = $args[1];
		}
		
		$this->m_caption = MapsCoordinateParser::formatCoordinates(
			$this->mCoordinateSet,
			$smgQPCoodFormat,
			$smgQPCoodDirectional
		);
		
		$this->mWikivalue = $this->m_caption;
	}
	
	/**
	 * @see SMWDataValue::getDBkeys
	 */
	public function getDBkeys() {
		global $smgUseSpatialExtensions;
		
		$this->unstub();
		
		if ( $smgUseSpatialExtensions ) {
			$point = str_replace( ',', '.', " POINT({$this->mCoordinateSet['lat']} {$this->mCoordinateSet['lon']}) " );
			return array( "GeomFromText( '$point' )" );
		}
		else {
			return array(
				$this->mCoordinateSet['lat'],
				$this->mCoordinateSet['lon']
			);			
		}
	}
	
	/**
	 * @see SMWDataValue::getSignature
	 */	
	public function getSignature() {
		global $smgUseSpatialExtensions;
		return $smgUseSpatialExtensions ? 'c' : 'ff';
	}	

	/**
	 * @see SMWDataValue::getShortWikiText
	 */
	public function getShortWikiText( $linked = null ) {
		if ( $this->isValid() && ( $linked !== null ) && ( $linked !== false ) ) {
			SMWOutputs::requireHeadItem( SMW_HEADER_TOOLTIP );
			
			// TODO: fix lang keys so they include the space and coordinates.
			
			return '<span class="smwttinline">' . htmlspecialchars( $this->m_caption ) . '<span class="smwttcontent">' .
		        htmlspecialchars ( wfMsgForContent( 'maps-latitude' ) . ' ' . $this->mCoordinateSet['lat'] ) . '<br />' .
		        htmlspecialchars ( wfMsgForContent( 'maps-longitude' ) . ' ' . $this->mCoordinateSet['lon'] ) .
		        '</span></span>';
		}
		else {
			return htmlspecialchars( $this->m_caption );
		}
	}
	
	/**
	 * @see SMWDataValue::getShortHTMLText
	 */
	public function getShortHTMLText( $linker = null ) {
		return $this->getShortWikiText( $linker );
	}
	
	/**
	 * @see SMWDataValue::getLongWikiText
	 */
	public function getLongWikiText( $linked = null ) {
		if ( !$this->isValid() ) {
			return $this->getErrorText();
		}
		else {
			global $smgQPCoodFormat, $smgQPCoodDirectional;
			return MapsCoordinateParser::formatCoordinates( $this->mCoordinateSet, $smgQPCoodFormat, $smgQPCoodDirectional );
		}
	}

	/**
	 * @see SMWDataValue::getLongHTMLText
	 */
	public function getLongHTMLText( $linker = null ) {
		return $this->getLongWikiText( $linker );
	}

	/**
	 * @see SMWDataValue::getWikiValue
	 */
	public function getWikiValue() {
		$this->unstub();
		return $this->mWikivalue;
	}

	/**
	 * @see SMWDataValue::getExportData
	 */
	public function getExportData() {
		if ( $this->isValid() ) {
			global $smgQPCoodFormat, $smgQPCoodDirectional;
			$lit = new SMWExpLiteral(
				MapsCoordinateParser::formatCoordinates( $this->mCoordinateSet, $smgQPCoodFormat, $smgQPCoodDirectional ),
				$this,
				'http://www.w3.org/2001/XMLSchema#string'
			);
			return new SMWExpData( $lit );
		} else {
			return null;
		}
	}

	/**
	 * Create links to mapping services based on a wiki-editable message. The parameters
	 * available to the message are:
	 * 
	 * @return array
	 */
	protected function getServiceLinkParams() {
		return array(  ); // TODO
	}
	
	/**
	 * @return array
	 */
	public function getCoordinateSet() {
		return $this->mCoordinateSet;
	}
	
	/**
	 * @see SMWDataValue::getValueIndex
	 * 
	 * @return integer
	 */	
	public function getValueIndex() {
		return 0;
	}

	/**
	 * @see SMWDataValue::getLabelIndex
	 * 
	 * @return integer
	 */		
	public function getLabelIndex() {
		return 0;
	}	

}