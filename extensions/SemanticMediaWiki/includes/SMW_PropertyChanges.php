<?php

/**
 * A collection of semantic properties and changes changes made to them.
 * This class is based on SMWSemanticData and can be seen as a simplified
 * version with SMWPropertyChange objects, each holding 2 SMWDataItem objects,
 * instead of SMWDataItem objects.
 * 
 * @since 1.6
 * 
 * @file SMW_PropertyChange.php
 * @ingroup SMW
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SMWPropertyChanges implements Iterator {

	protected $pos = 0;
	protected $currentRow = null;	
	
	/**
	 * Cache for the localized version of the namespace prefix "Property:".
	 *
	 * @var string
	 */
	static protected $mPropertyPrefix = '';	
	
	/**
	 * Array mapping property keys (string) to arrays of SMWPropertyChange.
	 * 
	 * @var array of SMWPropertyChange
	 */
	protected $changes = array();
	
	/**
	 * Array mapping property keys (string) to SMWDIProperty objects.
	 *
	 * @var array of SMWDIProperty
	 */
	protected $properties = array();
	
	/**
	 * Get the array of all properties that have changes.
	 *
	 * @return array of SMWDIProperty
	 */
	public function getProperties() {
		return $this->properties;
	}
	
	/**
	 * Get the array of all stored values for some property.
	 *
	 * @param $property SMWDIProperty
	 * 
	 * @return array of SMWPropertyChange
	 */
	public function getPropertyValues( SMWDIProperty $property ) {
		if ( array_key_exists( $property->getKey(), $this->changes ) ) {
			return $this->mPropVals[$property->getKey()];
		} else {
			return array();
		}  
	}
	
	/**
	 * Store a value for a property identified by its SMWDataItem object.
	 *
	 * @note There is no check whether the type of the given data item
	 * agrees with the type of the property. Since property types can
	 * change, all parts of SMW are prepared to handle mismatched data item
	 * types anyway.
	 *
	 * @param SMWDIProperty $property
	 * @param SMWPropertyChange $change
	 */
	public function addPropertyObjectChange( SMWDIProperty $property, SMWPropertyChange $change ) {
		if ( $property->isInverse() ) { // inverse properties cannot be used for annotation
			return;
		}

		if ( !array_key_exists( $property->getKey(), $this->changes ) ) {
			$this->changes[$property->getKey()] = array();
			$this->properties[$property->getKey()] = $property;
		}

		$this->changes[$property->getKey()][] = $change;
	}

	/**
	 * Store a value for a given property identified by its text label
	 * (without namespace prefix).
	 *
	 * @param string $propertyName
	 * @param SMWPropertyChange $change
	 */
	public function addPropertyChange( $propertyName, SMWPropertyChange $change ) {
		$propertyKey = smwfNormalTitleDBKey( $propertyName );

		if ( array_key_exists( $propertyKey, $this->mProperties ) ) {
			$property = $this->mProperties[$propertyKey];
		} else {
			if ( self::$mPropertyPrefix == '' ) {
				global $wgContLang;
				self::$mPropertyPrefix = $wgContLang->getNsText( SMW_NS_PROPERTY ) . ':';
			} // explicitly use prefix to cope with things like [[Property:User:Stupid::somevalue]]

			$propertyDV = SMWPropertyValue::makeUserProperty( self::$mPropertyPrefix . $propertyName );

			if ( !$propertyDV->isValid() ) { // error, maybe illegal title text
				return;
			}
			
			$property = $propertyDV->getDataItem();
		}

		$this->addPropertyObjectChange( $property, $change );
	}	
	
	function rewind() {
		$this->pos = 0;
		$this->currentRow = null;
	}

	function current() {
		if ( is_null( $this->currentRow ) ) {
			$this->next();
		}
		return $this->currentRow;
	}

	function key() {
		return $this->pos;
	}

	function next() {
		$this->pos++;
		$this->currentRow = array_key_exists( $this->pos, $this->changes ) ? $this->changes[$this->pos] : false;
		return $this->currentRow;
	}

	function valid() {
		return $this->current() !== false;
	}	
	
}