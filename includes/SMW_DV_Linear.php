<?php

/**
 * This datavalue implements unit support custom units, for which users have
 * provided linear conversion factors within the wiki. Those user settings
 * are retrieved from a type page, the DB key of which is the type id of this
 * object.
 *
 * @author Markus Krötzsch
 * @note AUTOLOADED
 */
class SMWLinearValue extends SMWNumberValue {

	protected $m_unitfactors = false; // array mapping canonical unit strings to conversion factors
	protected $m_unitids = false; // array mapping (normalised) unit strings to canonical unit strings (ids)
	protected $m_displayunits = false; // array of (canonical) units that should be displayed
	protected $m_mainunit = false; // main unit (recognised by the conversion factor 1)

	/**
	 * Converts the current m_value and m_unit to the main unit, if possible.
	 * This means, it changes the fileds m_value and m_unit accordingly, and
	 * that it stores the ID of the originally given unit in $this->m_unitin.
	 * This should obviously not be done more than once, so it is advisable to 
	 * first check if m_unitin is non-false. Also, it should be checked if the
	 * value is valid before trying to calculate with its contents.
	 */
	protected function convertToMainUnit() {
		if ($this->m_unitin !== false) return;
		$this->initConversionData();
		if (!$this->isValid()) { // give up, avoid calculations with non-numbers
			$this->m_unitin = $this->m_unit;
			return;
		}

		// Find ID for current unit
		if (array_key_exists($this->m_unit, $this->m_unitids)) {
			$this->m_unitin = $this->m_unitids[$this->m_unit];
		} else { // already unit id (possibly of an unknown unit)
			$this->m_unitin = $this->m_unit;
		}

		// Do conversion
		if ( (array_key_exists($this->m_unitin, $this->m_unitfactors)) && ($this->m_mainunit !== false) ) {
			$this->m_unit = $this->m_mainunit;
			$this->m_value = $this->m_value/$this->m_unitfactors[$this->m_unitin];
		} //else: unsupported unit, keep all as it is
	}

	/**
	 * This method creates an array of unit-value-pairs that should be
	 * printed. Units are the keys and should be canonical unit IDs.
	 * The result is stored in $this->m_unitvalues. Again, any class that
	 * requires effort for doing this should first check whether the array
	 * is already set (i.e. not false) before doing any work.
	 * Note that the values should be plain numbers. Output formatting is done 
	 * later when needed. Also, it should be checked if the value is valid 
	 * before trying to calculate with its contents.
	 * This method also must call or implement convertToMainUnit().
	 */
	protected function makeConversionValues() {
		if ($this->m_unitvalues !== false) return;
		$this->convertToMainUnit();
		if ($this->m_unit !== $this->m_mainunit) { // conversion failed, no choice for us
			$this->m_unitvalues = array($this->m_unit => $this->m_value);
			return;
		}
		$this->initDisplayData();

		$this->m_unitvalues = array();
		if (count($this->m_displayunits) == 0) { // no display units, just show all
			foreach ($this->m_unitfactors as $unit => $factor) {
				$this->m_unitvalues[$unit] = $this->m_value*$factor;
			}
		} else {
			foreach ($this->m_displayunits as $unit) {
				if (array_key_exists($unit, $this->m_unitfactors)) {
					$this->m_unitvalues[$unit] = $this->m_value*$this->m_unitfactors[$unit];
				}
			}
			if (count($this->m_unitvalues) == 0) { // none of the desired units matches
				// display just the current one (so one can disable unit tooltips by setting a nonunit for display)
				$this->m_unitvalues = array($this->m_unit => $this->m_value);
			}
		}
	}

	/**
	 * This method is used when no user input was given to find the best
	 * values for m_wikivalue, m_unitin, and m_caption. After conversion,
	 * these fields will look as if they were generated from user input,
	 * and convertToMainUnit() will have been called (if not, it would be
	 * blocked by the presence of m_unitin).
	 */
	protected function makeUserValue() {
		$this->convertToMainUnit();

		$value = false;
		if ($this->m_unit === $this->m_mainunit) { // only try if conversion worked
			if ( ($value === false) && $this->m_outformat) { // first try given output unit
				$unit = $this->normalizeUnit($this->m_outformat);
				$printunit = $unit;
				if (array_key_exists($unit, $this->m_unitids)) { // find id for output unit
					$unit = $this->m_unitids[$unit];
					if (array_key_exists($unit, $this->m_unitfactors)) { // find factor for this id
						$value = $this->m_value * $this->m_unitfactors[$unit];
					}
				}
			}
			if ($value === false) { // next look for the first given display unit
				$this->initDisplayData();
				foreach ($this->m_displayunits as $unit) {
					if (array_key_exists($unit, $this->m_unitids)) { // find id for first display unit
						$unit = $this->m_unitids[$unit];
						if (array_key_exists($unit, $this->m_unitfactors)) { // find factor for this id
							$value = $this->m_value * $this->m_unitfactors[$unit];
							$printunit = $unit;
							break;
						}
					}
				}
			}
		}

		if ($value === false) { // finally fallback to current value
			$value = $this->m_value;
			$unit = $this->m_unit;
			$printunit = $unit;
		}

		$this->m_caption = smwfNumberFormat($value);
		if ($printunit != '') {
			$this->m_caption .= '&nbsp;' . $printunit;
		}
		$this->m_wikivalue = $this->m_caption;
		$this->m_unitin = $unit;
	}

/// The remaining functions are relatively "private" but are kept protected since 
/// subclasses might exploit this to, e.g., "fake" conversion factors instead of
/// getting them from the database. A cheap way of making built-in types.

	/**
	 * This method fills $m_unitfactors and $m_unitids with required values.
	 */
	protected function initConversionData() {
		if ($this->m_unitids !== false) return;
		$this->m_unitids = array();
		$this->m_unitfactors = array();

		$typetitle = Title::newFromText($this->m_typeid, SMW_NS_TYPE);
		if ($typetitle === NULL) return;
		$factors = smwfGetStore()->getSpecialValues($typetitle, SMW_SP_CONVERSION_FACTOR);
		if (count($factors)==0) { // no custom type
			// delete all previous errors, this is our thing
			// TODO: probably we should check for this earlier, but avoid unnecessary DB requests ...
			$this->m_errors = array(wfMsgForContent('smw_unknowntype', SMWDataValueFactory::findTypeLabel($this->getTypeID())));
			return;
		}
		$numdv = SMWDataValueFactory::newTypeIDValue('_num'); // used for parsing the factors
		foreach ($factors as $factorstring) {
			$numdv->setUserValue($factorstring);
			if (!$numdv->isValid() || ($numdv->getNumericValue() === 0)) {
				continue; // ignore problmatic conversions
			}
			$unit_aliases = preg_split('/\s*,\s*/', $numdv->getUnit());
			$first = true;
			foreach ($unit_aliases as $unit) {
				$unit = $this->normalizeUnit($unit);
				if ($first) {
					$unitid = $unit;
					$this->m_unitfactors[$unit] = $numdv->getNumericValue();
					if ($numdv->getNumericValue() == 1) {
						$this->m_mainunit = $unit;
					}
					$first = false;
				}
				// add all known units to m_unitids to simplify checking for them
				$this->m_unitids[$unit] = $unitid;
			}
		}
	}

	/**
	 * This method fills $m_displayunits.
	 */
	protected function initDisplayData() {
		if ($this->m_displayunits !== false) return;
		$this->initConversionData(); // needed to normalise unit strings
		$this->m_displayunits = array();
		if (!$this->m_property) return;
		$proptitle = Title::newFromText($this->m_property, SMW_NS_PROPERTY);
		if ($proptitle === NULL) return;
		$values = smwfGetStore()->getSpecialValues($proptitle, SMW_SP_DISPLAY_UNITS);
		$units = array();
		foreach ($values as $value) { // Join all if many annotations exist. Discouraged but possible.
			$units = $units + preg_split('/\s*,\s*/',$value->getXSDValue());
		}
		foreach ($units as $unit) {
			$unit = $this->normalizeUnit($unit);
			if (array_key_exists($unit, $this->m_unitids)) {
				$unit = $this->m_unitids[$unit];
				$this->m_displayunits[$unit] = $unit; // avoid duplicates
			} // note: we ignore unsuppported units, as they are printed anyway for lack of alternatives
		}
	}

}
