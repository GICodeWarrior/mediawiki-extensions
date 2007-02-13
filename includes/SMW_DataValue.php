<?php

require_once('SMW_Datatype.php');

/**
 * Objects of this type represent all that is known about 
 * a certain user-provided data value, especially its various
 * representations as strings, tooltips, numbers, etc.
 *
 * Data values form an additional layer of abstraction between
 * raw data values from the user or database, and the various
 * type handlers that can convert and evaluate these values.
 * Their purpose is to simplify the handling of data values,
 * and to clean up the code that is involved in processing data
 * values.
 */
class SMWDataValue {
	/**#@+
	 * @access private
	 */
	// representations of the actual value:
	
	/**
	 * The original string as specified by a user, if provided to 
	 * initialise this object. Otherwise a generated user-friendly string 
	 * (no xsd). Wikitext.
	 */
	var $vuser;

	/**
	 * XML Schema representation of single data value as stored in the DB.
	 * This value is important for processing, but might be completely different
	 * from the representations used for printout. 
	 * Plain xml-compatible text. FALSE if value could not be determined.
	 */
	var $vxsd;
	/**
	 * Float for representing scalar value of $vxsd. Required for all data-types 
	 * whose values are naturally sortable in a linear way; NULL 
	 * otherwise.
	 */
	var $vnum;
	/**
	 * Unit string or empty string, plain text. This is the unit SMW 
	 * stores in the attribute table. Where possible, datatypes should 
	 * convert input values to the primary unit and set this to its
	 * canonical string representation. Note that units internally are 
	 * only used to prevent confusion between assignments to one attribute
	 * which are not readily comparable. So types need not give a unit 
	 * string if there is only one unit, and they can give unit strings if
	 * there are multiple representations even though they are not "units"
	 * in a strict sense.
	 */
	var $unit;
	/**
	 * Error message, if value could not be intitialised. FALSE otherwise.
	 */
	var $error;

	/**
	 * String identifier that describes which of the returned 
	 * representations corresponds to the input; may be one of the array 
	 * keys of $others, equal to $unit to denote the main value, or 
	 * some other string or NULL if the input value was not returned with 
	 * the parsed results at all. 
	 * Note: the tooltip contains only the representations that are 
	 * different from the one given	by the users. To prevent a tooltip, 
	 * just set all keys of $others to the value of $input ('' by 
	 * default).
	 */
	var $input;
	
	/**
	 * Array of representations for this value. The strings 
	 * are wiki text, exclusively for human eyes; non-empty keys should be
	 * used to identify the representations, so that repetitions in the 
	 * tooltip can be avoided (cf. $input). The first entry in this
	 * array is assumed to be the most suitable representation to
	 * present to the user in cases where not all values can be shown.
	 */
	var $others;

	/**
	 * Array of desired units, used by attributes of Type:Linear
	 * and also for formatting of attributes of Type:DateTime.
	 * The first item in the array is the main value, 
	 * the rest appear in parentheses in factbox.
	 * Optional, overrides the Datatype's getUnits().
	 * array() if unset.
	 * 
	 * FALSE at initialization.
	 * see getDesiredUnits()

	 */
	var $desiredUnits;
	/**
	 * Array of possible values, used by attributes of Type:Enumeration.
	 * 
	 * FALSE at initialization if not set
	 * @see getPossibleValues() 
	 */
	var $possibleValues;
	/**
	 * Array of links (or rather of message IDs that contain link templates). 
	 * Some datatypes will look for added links and instantiate them with their
	 * processed values to point to helpful online resources. The strings in this
	 * array point to messages which contain the actual link strings, so those
	 * need to be resolved first.
	 * 
	 * FALSE at initialization.
	 * @see getServiceLinks()
	 */
	var $serviceLinks;
	// the following can be generated automatically, and are cached afterwards
	var $description;  //the user string printed e.g. in the factbox
	var $tooltip; //tooltip for the value in the article, possibly empty.
	
	// additional information about the value and the context in which it was given
	var $type_handler; //type handler for this object
	var $skin; //the current skin object, needed to build internal URLs
	var $infolinks; // an array of additional links provided in long descriptions of the value
	var $attribute; // wiki name (without namespace) of the attribute that this value was
	                // assigned to, or FALSE if no attribute was given.
	/**#@-*/

	/**
	 * Just initialise variables. To create value objects, use one of the 
	 * static methods provided below.
	 * @access private
	 */
	function SMWDataValue($type = NULL, $desiredUnits = false) {
		$this->clear();

		$this->type_handler = $type;
		$this->skin = NULL;
		$this->attribute = false;
		$this->desiredUnits = $desiredUnits;
		$this->possibleValues = false;
		$this->serviceLinks = false;
	}

	/*********************************************************************/
	/* Static methods for initialisation                                 */
	/*********************************************************************/
	
	/**
	 * Create a value from a string supplied by a user for a given attribute.
	 * The skin is needed to create some of the internal links automatically.
	 * If no value is given, an empty container is created, the value of which
	 * can be set later on.
	 */
	/* static */ function newAttributeValue($attribute, $skin=NULL, $value=false) {
		$type = SMWTypeHandlerFactory::getTypeHandler($attribute);
		$result = new SMWDataValue($type);
		$result->setSkin($skin);
		$result->attribute = $attribute;
		// TODO: Maybe only get this for attributes types that can support it, or only get if requested?
		if ($value !== false)
			$result->setUserValue($value);
		return $result;
	}

	/**
	 * Create a value from a string supplied by a user for a given special
	 * property, encoded as a numeric constant. The skin is needed to create 
	 * some of the internal links automatically.
	 * If no value is given, an empty container is created, the value of which
	 * can be set later on.
	 */
	/* static */ function newSpecialValue($specialprop, $skin=NULL, $value=false) {
		$type = SMWTypeHandlerFactory::getSpecialTypeHandler($specialprop);
		$result = new SMWDataValue($type);
		$result->setSkin($skin);
		if ($value !== false)
		  $result->setUserValue($value);
		return $result;
	}

	/**
	 * Create a value from a user-supplied string for which a type handler is known
	 * The skin is needed to create some of the internal links automatically.
	 * If no value is given, an empty container is created, the value of which
	 * can be set later on.
	 */
	/* static */ function newTypedValue($type, $skin=NULL, $value=false, $desiredUnits=array()) {
		$result = new SMWDataValue($type);
		$result->setSkin($skin);
		$result->desiredUnits = $desiredUnits;
		if ($value !== false)  $result->setUserValue($value);
		return $result;
	}

	/*********************************************************************/
	/* Set methods                                                       */
	/*********************************************************************/

	/**
	 * Set the user value (and compute other representations if possible)
	 */
	function setUserValue($value) {
		$this->clear();
		$this->vuser = $value; 
		//this is needed since typehandlers are not strictly required to
		//set the user value, especially if errors are reported.

		if ($this->type_handler === NULL) {
			return false;
		}
		$this->type_handler->processValue($value, $this);
		return true;
	}

	/**
	 * Set the xsd value (and compute other representations if possible)
	 */
	function setXSDValue($value, $unit) {
		$this->vxsd = $value;
		if ($this->type_handler === NULL) {
			return false;
		}
		$this->clear();
		// TODO: needs to support desiredUnits as well (mak)
		$this->type_handler->processXSDValue($value, $unit, $this);
		return true;
	}

	/**
	 * Set the main values obtained by processing an input in
	 * one call. Typically used by typehandlers, not by external users.
	 * @param user - see $vuser
	 * @param xsd - see $vxsd
	 * @param num - see $vnum
	 * @param unit - see $unit
	 */
	function setProcessedValues($user, $xsd, $num=NULL, $unit='') {
		$this->vuser = $user;
		$this->vxsd = $xsd;
		$this->vnum = $num;
		$this->unit = $unit;
	}

	/**
	 * Set the skin for this object. Needed to generate some of the 
	 * internal URLs. SMWDatavalues can be used without setting a skin
	 * but then cannot generate all URLs properly.
	 */
	function setSkin($skin) {
		$this->skin = $skin;
	}
	
	/**
	 * Add a new infolink object to the links provided with this value.
	 */
	function addInfolink($link) {
		$this->infolinks[] = $link;
	}
	
	/**
	 * Add an infolink to the inverse search for the given attribute and value.
	 * Note this is a query based exactly on what the user entered,
	 * not canonical units or number format.
	 * TODO: That's dumb, we've already parsed the user entry, so
	 * why repeat the effort in SearchTriple?  Instead tell the quick search exactly what number
	 * and unit to search on.  There's a bug that refers to this problem.
	 * : OK; but the SearchTriple Special needs reimplementaiton anyway. 
	 *   E.g. it is not very user-friendly. -- mak
	 */
	function addQuicksearchLink() {
		if ($this->skin !== NULL) {
			$this->infolinks[] = new SMWInfolink(
			    SMWInfolink::makeAttributeSearchURL($this->attribute,$this->vuser,$this->skin),
			    '+','smwsearch');
		}
	}

	/**
	 * Add further servicelinks found in the messages encoded in the
	 * serviceLinks array. This function is usually called with one
	 * or more paramters that specify the strings that are to be 
	 * inserted into the link templates that are retrieved from the
	 * message texts. The number and content of the parameters is
	 * depending on the datatype, and the service link message is 
	 * usually crafted with a particular datatype in mind.
	 */
	function addServiceLinks() {
		$args = func_get_args();
		array_unshift($args, ''); // add a 0 element as placeholder
		$serviceLinks = $this->getServiceLinks();

		foreach ($serviceLinks as $sid) {
			$args[0] = "smw_service_$sid";
			$text = call_user_func_array('wfMsgForContent', $args);
			$links = preg_split("([\n][\s]?)", $text);
			foreach ($links as $link) {
				$linkdat = explode('|',$link,2);
				if (count($linkdat) == 2)
					$this->addInfolink(new SMWInfolink($linkdat[1],$linkdat[0]));
			}
		}
	}

	/**
	 * Set some other representation for this value. See documentation for 
	 * SMWDataValue->others.
	 */
	function setPrintoutString($string, $key = '') {
		$this->others["K$key"] = $string; // use "K" to work around PHP casting string "1" to a numerical index, even when passed with strval($key)
	}

	/**
	 * Select the input value among the given representations. See documentation 
	 * for SMWDataValue->others.
	 */
	function setInput($key) {
		$this->input = "K$key"; // add "K" as in setPrintoutString
	}

	/**
	 * Set an error message for the current datavalue. The message should be plain
	 * text, possibly with light wiki/html markup. Global styling, especially spans
	 * enclosing the whole message, are not needed.
	 * Note: lighter warnings for the user can also be propagated by adding them 
	 * to one of the string representations that the user gets to see. Errors will 
	 * make a value invalid, preventing it, e.g., from being stored in the database.
	 */
	function setError($message) {
		$this->error = $message;
		$this->description = false;
		$this->tooltip = false;
	}

	/**
	 * Specify an array of desired units. See SMWDatavalue::desiredUnits for details.
	 */
	function setDesiredUnits($desiredUnits) {
		$this->desiredUnits = $desiredUnits;
	}


	/**
	 * Specify an array of service links. See SMWDataValue::serviceLinks for details.
	 */
	function setServiceLinks($serviceLinks) {
		$this->serviceLinks = $serviceLinks;
	}

	/**
	 * Reset the object to contain no value at all, but keep the existing type/skin/attribute.
	 */
	function clear() {
		$this->vuser = '';
		$this->vxsd = false;
		$this->vnum = NULL;
		$this->unit = '';
		$this->input = 'K';
		$this->others = array();
		$this->error = false;

		$this->tooltip = false;
		$this->description = false;
		$this->infolinks = array();
	}


	/*********************************************************************/
	/* Get methods                                                       */
	/*********************************************************************/

	/**
	 * Return a single user value string. If the data value 
	 * object was initialised with a user value string, then 
	 * this original string is returned. The returned value 
	 * is wiki-source string (though often just plain text).
	 * Also, this string typically already contains a unit,
	 * and might have a unit that is different from the
	 * standard unit that the parsed value was converted to.
	 * 
	 * This method might return FALSE if the data value was
	 * initialised not from a user value string and parsing the
	 * given value failed.
	 */
	function getUserValue() {
		return $this->vuser;
	}

	/**
	 * Return a single value string, obtained by parsing the 
	 * supplied user or XSD value. Canonical representation
	 * that includes a unit. Wikitext.
	 */
	function getStringValue() {
		if ( count($this->others) > 0 ) {
			reset($this->others);
			return current($this->others); // return first element
		} else {
			return $this->vuser;
		}
	}

	/**
	 * Return the XSD compliant version of the value, or
	 * FALSE if parsing the value failed and no XSD version
	 * is available. If the datatype has units, then this
	 * value is given in the unit provided by getUnit().
	 */
	function getXSDValue() {
		return $this->vxsd;
	}

	/**
	 * Return the numeric representation of the value, or NULL
	 * is none is available. This representation is used to 
	 * compare values of scalar types more efficiently, especially
	 * for sorting queries. If the datatype has units, then this
	 * value is to be interpreted wrt. the unit provided by getUnit().
	 */
	function getNumericValue() {
		return $this->vnum;
	}


	/**
	 * Return the unit in which the returned value is to be interpreted.
	 * This string is a plain UTF-8 string without wiki or html markup.
	 * Returns FALSE if no unit is given for the value.
	 */
	function getUnit() {
		return $this->unit;
	}

	/**
	 * Return error string or false if no error occured.
	 */
	function getError() {
		return $this->error;
	}

	/**
	 * Return the type id for this value, or FALSE if no type was given.
	 */
	function getTypeID() {
		if ($this->type_handler !== NULL) {
			return $this->type_handler->getID();
		} else return false;
	}

	/**
	 * Return an array of SMWLink objects that provide additional resources 
	 * for the given value.
	 * Captions can contain some HTML markup which is admissible for wiki 
	 * text, but no more. Result might have no entries but is always an array.
	 */
	function getInfolinks() {
		return $this->infolinks;
	}

	/**
	 * Return the long description of the value, as printed for
	 * example in the factbox. If errors occurred, return the error message
	 * The result always is a wiki-source string.
	 */
	function getValueDescription() {
		if ($this->description === false) {
			if ($this->error === false) {
				if (count($this->others)>0) {
					$sep = '';
					foreach ($this->others as $other) {
						$this->description .= $sep . $other;
						if ('' == $sep) $sep = ' (';  else $sep = ', ';
					}
					if (' (' != $sep) $this->description .= ')';
				}
			} else { $this->description = '<span class="smwwarning">' . $this->error  . '</span>'; }
		}
		return $this->description;
	}

	/**
	 * Return the text that is to be used as a tooltip for the value, or 
	 * the empty string if no tooltip is provided. Tooltip strings also 
	 * involve some markup for specifying linebreaks etc. which is then
	 * interpreted by the function that insertst the JScript into the 
	 * article.
	 */
	function getTooltip() {
		if ($this->tooltip === false) {
			if ($this->error === false) {
				$this->tooltip = '';
				$sep = '';
				foreach ($this->others as $id => $other) {
					if ( $id !== $this->input ) {
						$this->tooltip .= $sep . $other;
						$sep = ' = ';
					}
				}
			} else { $this->tooltip = ''; } // TODO: returning $this->error; does not fully work with the JScript pre-parsing right now
		}
		return $this->tooltip;
	}

	/**
	 * Return a string that identifies the value of the object, and that can 
	 * be used to compare different value objects.
	 */
	function getHash() {
		return $this->getValueDescription() . $this->vxsd . $this->unit;
		// (user_out is needed here to distinguish error messages, which
		//  usually have no XSD and no unit)
	}

	/**
	 * Return the array of desired units (possibly empty if not given).
	 */
	function getDesiredUnits() {
		// If we don't have a value for this, get it from the attribute.
		if ($this->desiredUnits === false && $this->attribute != false) {
			$this->desiredUnits = SMWTypeHandlerFactory::getUnitsList($this->attribute);
		}
		if ($this->desiredUnits === false) {
			return Array();
		} else {
			return $this->desiredUnits;
		}
	}

	/**
	 * Return the array of service links (possibly empty if not given).
	 */
	function getServiceLinks() {
		// If we don't have a value for this, get it from the attribute.
		if ($this->serviceLinks === false && $this->attribute != false) {
			$this->serviceLinks = SMWTypeHandlerFactory::getServiceLinks($this->attribute);
		}
		if ($this->serviceLinks === false) {
			return Array();
		} else {
			return $this->serviceLinks;
		}
	}

	/**
	 * Return the array of possible values (possibly empty if not given).
	 */
	function getPossibleValues() {
		// If we don't have a value for this, get it from the attribute.
		if ($this->possibleValues === false && $this->attribute != false) {
			$this->possibleValues = SMWTypeHandlerFactory::getPossibleValues($this->attribute);
		}
		if ($this->possibleValues === false) {
			return Array();
		} else {
			return $this->possibleValues;
		}
	}

	/**
	 * Return TRUE if a value was defined and understood by the given type,
	 * and false if parsing errors occured or no value was given.
	 */
	function isValid() {
		return ( ($this->error === false) && ($this->vuser !== false) );
	}
	
	/**
	 * Return TRUE if values of the given type generally have a numeric version.
	 */
	function isNumeric() {
		if ($this->type_handler !== NULL) {
			return $this->type_handler->isNumeric();
		} else { return false; }
	}
	
}

?>
