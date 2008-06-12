<?php
/**
 * The class in this file manages (special) properties that are
 * associated with a certain subject (article). It is used as a
 * container for chunks of subject-centred data.
 *
 * @author Markus Krötzsch
 */

/**
 * Class for representing chunks of semantic data for one given 
 * article (subject), similar what is typically displayed in the factbox.
 * This is a light-weight data container.
 */
class SMWSemanticData {
	protected $attribvals = array(); // text keys and arrays of datavalue objects
	protected $attribtitles = array(); // text keys and title objects
	protected $hasprops = false; // any normal properties yet?
	protected $hasspecs = false; // any special properties yet?
	protected $m_noduplicates; // avoid repeated values? 
	/// NOTE: not needing (e.g. when loading from store) can safe much time, 
	/// since objects can remain stubs until someone really acesses their value
	static protected $m_propertyprefix = false; // cache for the local version of "Property:"

	protected $subject;

	public function __construct(Title $subject, $noduplicates = true) {
		$this->subject = $subject;
		$this->m_noduplicates = $noduplicates;
	}

	/**
	 * Return subject to which the stored semantic annotation refer to.
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * Get the array of all properties that have stored values.
	 */
	public function getProperties() {
		ksort($this->attribtitles,SORT_STRING);
		return $this->attribtitles;
	}

	/**
	 * Get the array of all stored values for some property.
	 */
	public function getPropertyValues($property) {
		if ($property instanceof Title) {
			$property = $property->getText();
		}
		if (array_key_exists($property, $this->attribvals)) {
			return $this->attribvals[$property];
		} else {
			return array();
		}
	}

	/**
	 * Return true if there are any properties.
	 */
	public function hasProperties() {
		return $this->hasprops;
	}

	/**
	 * Return true if there are any special properties.
	 */
	public function hasSpecialProperties() {
		return $this->hasspecs;
	}

	/**
	 * Store a value for an property identified by its title object. Duplicate 
	 * value entries are ignored.
	 */
	public function addPropertyObjectValue(Title $property, /*SMWDataValue*/ $value) {
		if (!array_key_exists($property->getText(), $this->attribvals)) {
			$this->attribvals[$property->getText()] = array();
			$this->attribtitles[$property->getText()] = $property;
		}
		if ($this->m_noduplicates) {
			$this->attribvals[$property->getText()][$value->getHash()] = $value;
		} else {
			$this->attribvals[$property->getText()][] = $value;
		}
		$this->hasprops = true;
	}

	/**
	 * Store a value for a given property identified by its text label (without
	 * namespace prefix). Duplicate value entries are ignored.
	 */
	public function addPropertyValue($propertyname, /*SMWDataValue*/ $value) {
		if (array_key_exists($propertyname, $this->attribtitles)) {
			$property = $this->attribtitles[$propertyname];
		} else {
			if (SMWSemanticData::$m_propertyprefix == false) {
				global $wgContLang;
				SMWSemanticData::$m_propertyprefix = $wgContLang->getNsText(SMW_NS_PROPERTY) . ':';
			} // explicitly use prefix to cope with things like [[Property:User:Stupid::somevalue]]
			$property = Title::newFromText(SMWSemanticData::$m_propertyprefix . $propertyname);
			if ($property === NULL) { // error, maybe illegal title text
				return;
			}
		}
		$this->addPropertyObjectValue($property, $value);
	}

	/**
	 * Store a value for a special property identified by an integer contant. Duplicate 
	 * value entries are ignored.
	 */
	public function addSpecialValue($special, /*SMWDataValue*/ $value) {	
		global $smwgContLang;
		$property = $smwgContLang->findSpecialPropertyLabel($special);
		if ($property === false) {
			$property = '_' . $special;
		}
		if (!array_key_exists($property, $this->attribvals)) {
			$this->attribvals[$property] = array();
			$this->attribtitles[$property] = $special;
		}
		if ($value instanceof SMWDataValue) {
			if ($this->m_noduplicates) {
				$this->attribvals[$special][$value->getHash()] = $value;
			} else {
				$this->attribvals[$special][] = $value;
			}
		/// TODO: legacy cases, should soon be obsolete (maybe already now):
		} elseif ($value instanceof Title) {
			$this->attribvals[$special][$value->getPrefixedText()] = $value;
		} else {
			$this->attribvals[$special][$value] = $value;
		}
		$this->hasspecs = true;
	}

	/**
	 * Delete all data other than the subject.
	 */
	public function clear() {
		$this->attribvals = array();
		$this->attribtitles = array();
		$this->hasprops = false;
		$this->hasspecs = false;
	}

}

