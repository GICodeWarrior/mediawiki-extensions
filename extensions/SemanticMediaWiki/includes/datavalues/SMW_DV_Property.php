<?php
/**
 * File holding class SMWPropertyValue.
 * 
 * @author Markus Krötzsch
 * 
 * @file
 * @ingroup SMWDataValues
 */

/**
 * Objects of this class represent properties in SMW.
 *
 * This class represents both normal (user-defined) properties and
 * predefined ("special") properties. Predefined properties may still
 * have a standard label (and associated wiki article) and they will
 * behave just like user-defined properties in most cases (e.g. when
 * asking for a printout text, a link to the according page is produced).
 * It is possible that predefined properties have no visible label at all,
 * if they are used only internally and never specified by or shown to
 * the user. Those will use their internal ID as DB key, and
 * empty texts for most printouts. All other proeprties use their
 * canonical DB key (even if they are predefined and have an id).
 * Functions are provided to check whether a property is visible or
 * user-defined, and to get the internal ID, if any.
 *
 * @note This datavalue is used only for representing properties and,
 * possibly objects/values, but never for subjects (pages as such). Hence
 * it does not provide a complete Title-like interface, or support for
 * things like sortkey.
 *
 * @author Markus Krötzsch
 * @ingroup SMWDataValues
 */
class SMWPropertyValue extends SMWDataValue {

	/**
	 * Cache for wiki page value object associated to this property, or
	 * null if no such page exists. Use getWikiPageValue() to get the data.
	 * @var SMWWikiPageValue
	 */
	protected $m_wikipage = null;

	/**
	 * Cache for type value of this property, or null if not calculated yet.
	 * @var SMWTypesValue
	 */
	private $mPropTypeValue;
	
	/**
	 * Cache for type ID of this property, or '' if not calculated yet.
	 * @var string
	 */
	private $mPropTypeId;

	public function getBaseType() {
		return SMWDataValue::TYPE_PROP;
	}

	/**
	 * Static function for creating a new property object from a
	 * propertyname (string) as a user might enter it.
	 * @note The resulting property object might be invalid if
	 * the provided name is not allowed. An object is returned
	 * in any case.
	 * 
	 * @param string $propertyName
	 * 
	 * @return SMWPropertyValue
	 */
	static public function makeUserProperty( $propertyName ) {
		$property = new SMWPropertyValue( '__pro' );
		$property->setUserValue( $propertyName );
		return $property;
	}

	/**
	 * Static function for creating a new property object from a property
	 * identifier (string) as it might be used internally. This might be
	 * the DB key version of some property title text or the id of a
	 * predefined property (such as '_TYPE').
	 * @note This function strictly requires an internal identifier, i.e.
	 * predefined properties must be referred to by their ID, and '-' is
	 * not supported for indicating inverses.
	 * @note The resulting property object might be invalid if
	 * the provided name is not allowed. An object is returned
	 * in any case.
	 */
	static public function makeProperty( $propertyid ) {
		$diProperty = new SMWDIProperty( $propertyid );
		$dvProperty = new SMWPropertyValue( '__pro' );
		$dvProperty->setDataItem( $diProperty );
		return $dvProperty;
	}

	/**
	 * We use the internal wikipage object to store some of this objects data.
	 * Clone it to make sure that data can be modified independently from the
	 * original object's content.
	 */
	public function __clone() {
		if ( $this->m_wikipage !== null ) $this->m_wikipage = clone $this->m_wikipage;
	}

	/**
	 * Extended parsing function to first check whether value refers to pre-defined
	 * property, resolve aliases, and set internal property id accordingly.
	 * @todo Accept/enforce property namespace.
	 */
	protected function parseUserValue( $value ) {
		$this->mPropTypeValue = null;
		$this->mPropTypeId = '';
		unset( $this->m_wikipage );

		if ( $this->m_caption === false ) { // always use this as caption
			$this->m_caption = $value;
		}
		$propertyName = smwfNormalTitleText( ltrim( rtrim( $value, ' ]' ), ' [' ) ); // slightly normalise label
		$inverse = false;
		if ( ( $propertyName !== '' ) && ( $propertyName{ 0 } == '-' ) ) { // property refers to an inverse
			$propertyName = (string)substr( $value, 1 );
			/// NOTE The cast is necessary at least in PHP 5.3.3 to get string '' instead of boolean false.
			$inverse = true;
		}

		try {
			$this->m_dataitem = SMWDIProperty::newFromUserLabel( $propertyName, $inverse, $this->m_typeid );
		} catch ( SMWDataItemException $e ) { // happens, e.g., when trying to sort queries by property "-"
			smwfLoadExtensionMessages( 'SemanticMediaWiki' );
			$this->addError( wfMsgForContent( 'smw_noproperty', $value ) );
			$this->m_dataitem = new SMWDIProperty( 'ERROR', false, $this->m_typeid ); // just to have something
		}
	}

	/**
	 * Extended parsing function to first check whether value is the id of a
	 * pre-defined property, to resolve property names and aliases, and to set
	 * internal property id accordingly.
	 */
	protected function parseDBkeys( $args ) {
		try {
			$dataItem = new SMWDIProperty( $args[0], false, $this->m_typeid );
		} catch ( SMWDataItemException $e ) {
			smwfLoadExtensionMessages( 'SemanticMediaWiki' );
			$this->addError( wfMsgForContent( 'smw_parseerror' ) ); // very rare to get an error here, don't bother with detailed reporting
			$dataItem = new SMWDIProperty( 'ERROR', false, $this->m_typeid ); // just to have something
		}
		$this->setDataItem( $dataItem );
	}

	/**
	 * @see SMWDataValue::setDataItem()
	 * @param $dataitem SMWDataItem
	 * @return boolean
	 */
	public function setDataItem( SMWDataItem $dataItem ) {
		if ( $dataItem->getDIType() == SMWDataItem::TYPE_PROPERTY ) {
			$this->m_dataitem = $dataItem;
			$this->mPropTypeValue = null;
			$this->mPropTypeId = '';
			unset( $this->m_wikipage );
			$this->m_caption = false;
			return true;
		} else {
			return false;
		}
	}

	public function setCaption( $caption ) {
		parent::setCaption( $caption );
		if ( $this->getWikiPageValue() instanceof SMWDataValue ) { // pass caption to embedded datavalue (used for printout)
			$this->m_wikipage->setCaption( $caption );
		}
	}

	public function setOutputFormat( $formatstring ) {
		$this->m_outformat = $formatstring;
		if ( $this->m_wikipage instanceof SMWDataValue ) { // do not unstub if not needed
			$this->m_wikipage->setOutputFormat( $formatstring );
		}
	}

	public function setInverse( $isinverse ) {
		$this->unstub(); // make sure later unstubbing does not overwrite this
		return $this->m_dataitem = new SMWDIProperty( $this->m_dataitem->getKey(), ( $isinverse == true ), $this->m_dataitem->getTypeID() );
	}

	/**
	 * Return a wiki page value that can be used for displaying this
	 * property, or null if no such wiki page exists (for predefined
	 * properties without any label).
	 * @return SMWWikiPageValue or null
	 */
	public function getWikiPageValue() {
		$this->unstub();
		if ( !isset( $this->m_wikipage ) ) {
			$diWikiPage = $this->m_dataitem->getDiWikiPage();
			if ( $diWikiPage !== null ) {
				$this->m_wikipage = SMWDataValueFactory::newDataItemValue( $diWikiPage, $this->m_caption );
				$this->m_wikipage->setOutputFormat( $this->m_outformat );
				$this->addError( $this->m_wikipage->getErrors() );
			} else { // should rarely happen ($value is only changed if the input $value really was a label for a predefined prop)
				$this->m_wikipage = null;
			}
		}
		return $this->m_wikipage;
	}

	/**
	 * Return TRUE if this is a property that can be displayed, and not a pre-defined
	 * property that is used only internally and does not even have a user-readable name.
	 * @note Every user defined property is necessarily visible.
	 */
	public function isVisible() {
		$this->unstub();
		return ( $this->m_dataitem->isUserDefined() ) || ( $this->m_dataitem->getLabel() != '' );
	}

	public function getShortWikiText( $linked = null ) {
		return $this->isVisible() ? $this->highlightText( $this->getWikiPageValue()->getShortWikiText( $linked ) ) : '';
	}

	public function getShortHTMLText( $linker = null ) {
		return $this->isVisible() ? $this->highlightText( $this->getWikiPageValue()->getShortHTMLText( $linker ) ) : '';
	}

	public function getLongWikiText( $linked = null ) {
		return $this->isVisible() ? $this->highlightText( $this->getWikiPageValue()->getLongWikiText( $linked ) ) : '';
	}

	public function getLongHTMLText( $linker = null ) {
		return $this->isVisible() ? $this->highlightText( $this->getWikiPageValue()->getLongHTMLText( $linker ) ) : '';
	}

	/**
	 * Return internal property id or page DBkey, either of which is sufficient for storing property references.
	 */
	public function getDBkeys() {
 		$this->unstub();
 		return array( $this->m_dataitem->getKey() );
	}

	public function getSignature() {
		return 't';
	}

	public function getValueIndex() {
		return 0;
	}

	public function getLabelIndex() {
		return 0;
	}

	public function getWikiValue() {
		return $this->isVisible() ? ( ( $this->isInverse() ? '-' : '' ) . $this->getWikiPageValue()->getWikiValue() ) : '';
	}

	/**
	 * If this property was not user defined, return the internal ID string referring to
	 * that property. Otherwise return FALSE;
	 */
	public function getPropertyID() {
		$this->unstub();
		return $this->m_dataitem->isUserDefined() ? false : $this->m_dataitem->getKey();
	}

	/**
	 * Return an SMWTypesValue object representing the datatype of this property.
	 */
	public function getTypesValue() {
		global $smwgPDefaultType;
		if ( $this->mPropTypeValue === null ) {
			if ( !$this->isValid() ) { // errors in property, return invalid types value with same errors
				$result = SMWDataValueFactory::newTypeIDValue( '__typ' );
				$result->setDBkeys( array( '__err' ) );
				$result->addError( $this->getErrors() );
			} elseif ( $this->m_dataitem->isUserDefined() ) { // normal property
				$typearray = smwfGetStore()->getPropertyValues( $this->getWikiPageValue(), new SMWDIProperty( '_TYPE' ) );
				if ( count( $typearray ) == 1 ) { // unique type given
					$result = current( $typearray );
				} elseif ( count( $typearray ) == 0 ) { // no type given
					$result = SMWDataValueFactory::newTypeIDValue( '__typ' );
					$result->setDBkeys( array( $smwgPDefaultType ) );
				} else { // many types given, error
					smwfLoadExtensionMessages( 'SemanticMediaWiki' );
					$result = SMWDataValueFactory::newTypeIDValue( '__typ' );
					$result->setDBkeys( array( '__err' ) );
					$result->addError( wfMsgForContent( 'smw_manytypes' ) );
				}
			} else { // pre-defined property
				$result = SMWDataValueFactory::newTypeIDValue( '__typ' );
				$result->setDBkeys( array( $this->m_dataitem->getPredefinedPropertyTypeID() ) );
			}
			$this->mPropTypeValue = $result;
		}
		return $this->mPropTypeValue;
	}

	/**
	 * Quickly get the type id of some property without necessarily making
	 * another datavalue. Note that this is not the same as getTypeID(), which
	 * returns the id of this property datavalue.
	 */
	public function getPropertyTypeID() {
		if ( $this->mPropTypeId === '' ) {
			$type = $this->getTypesValue();
			if ( $type instanceof SMWTypesValue ) {
				$this->mPropTypeId = $type->getDBkey();
			} else {
				$this->mPropTypeId = '__err';
			}
		}
		return $this->mPropTypeId;
	}

	/**
	 * Create special highlighting for hinting at special properties.
	 */
	protected function highlightText( $text ) {
		if ( $this->isUserDefined() ) {
			return $text;
		} else {
			SMWOutputs::requireHeadItem( SMW_HEADER_TOOLTIP );
			smwfLoadExtensionMessages( 'SemanticMediaWiki' );
			return '<span class="smwttinline"><span class="smwbuiltin">' . $text .
			'</span><span class="smwttcontent">' . wfMsgForContent( 'smw_isspecprop' ) . '</span></span>';
		}
	}

	/**
	 * A function for registering/overwriting predefined properties for SMW. Should be called from
	 * within the hook 'smwInitProperties'. Ids should start with three underscores "___" to avoid
	 * current and future confusion with SMW built-ins.
	 * @deprecated Use SMWDIProperty::registerProperty(). Will vanish before SMW 1.7.
	 */
	static public function registerProperty( $id, $typeid, $label = false, $show = false ) {
		SMWDIProperty::registerProperty( $id, $typeid, $label, $show );
	}

	/**
	 * Add a new alias label to an existing datatype id. Note that every ID should have a primary
	 * label, either provided by SMW or registered with registerDatatype. This function should be
	 * called from within the hook 'smwInitDatatypes'.
	 * @deprecated Use SMWDIProperty::registerPropertyAlias(). Will vanish before SMW 1.7.
	 */
	static public function registerPropertyAlias( $id, $label ) {
		SMWDIProperty::registerPropertyAlias( $id, $label );
	}

	/**
	 * @see SMWDIProperty::isUserDefined()
	 * @deprecated
	 */
	public function isUserDefined() {
		$this->unstub();
		return $this->m_dataitem->isUserDefined();
	}

	/**
	 * @see SMWDIProperty::isShown()
	 * @deprecated
	 */
	public function isShown() {
		$this->unstub();
		return $this->m_dataitem->isShown();
	}

	/**
	 * @see SMWDIProperty::isInverse()
	 * @deprecated
	 */
	public function isInverse() {
		$this->unstub();
		return $this->m_dataitem->isInverse();
	}

	/**
	 * Return a DB-key-like string: for visible properties, it is the actual DB key,
	 * for internal (invisible) properties, it is the property ID. The value agrees
	 * with the first component of getDBkeys() and it can be used in its place.
	 * @see SMWDIProperty::getKey()
	 * @deprecated
	 */
	public function getDBkey() {
		$this->unstub();
		return $this->m_dataitem->getKey();
	}

	/**
	 * @see SMWDIProperty::getLabel()
	 * @deprecated
	 */
	public function getText() {
		$this->unstub();
		return $this->m_dataitem->getLabel();
	}

}
