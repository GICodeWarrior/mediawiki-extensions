<?php

/**
 * This datavalue implements Boolean datavalues.
 *
 * @author Markus Krötzsch
 * @note AUTOLOADED
 */
class SMWBoolValue extends SMWDataValue {

	protected $m_value = NULL; // true, false, or NULL (unset)
	protected $m_stdcaption = ''; // a localised standard label for that value (if value is not NULL)

	protected function parseUserValue($value) {
		$value = trim($value);
		$lcv = strtolower($value);
		$this->m_value = NULL;
		if ($lcv === '1') { // note: if English "true" should be possible, specify in smw_true_words
			$this->m_value = true;
		} elseif ($lcv === '0') { // note: English "false" may be added to smw_true_words
			$this->m_value = false;
		} elseif (in_array($lcv, explode(',', wfMsgForContent('smw_true_words')), TRUE)) {
			$this->m_value = true;
		} elseif (in_array($lcv, explode(',', wfMsgForContent('smw_false_words')), TRUE)) {
			$this->m_value = false;
		} else {
			$this->addError(wfMsgForContent('smw_noboolean', $value));
		}

		if ($this->m_caption === false) {
			$this->m_caption = $value;
		}
		if ($this->m_value === true) {
			$vals = explode(',', wfMsgForContent('smw_true_words'));
			$this->m_stdcaption = $vals[0];
		} elseif ($this->m_value === false) {
			$vals = explode(',', wfMsgForContent('smw_false_words'));
			$this->m_stdcaption = $vals[0];
		} else {
			$this->m_stdcaption = '';
		}
		return true;
	}

	protected function parseXSDValue($value, $unit) {
		$this->parseUserValue($value); // no units, XML compatible syntax
		$this->m_caption = $this->m_stdcaption; // use default for this language
	}

	public function getShortWikiText($linked = NULL) {
		return $this->m_caption;
	}

	public function getShortHTMLText($linker = NULL) {
		return htmlspecialchars($this->m_caption);
	}

	public function getLongWikiText($linked = NULL) {
		if (!$this->isValid()) {
			return $this->getErrorText();
		} else {
			return $this->m_stdcaption;
		}
	}

	public function getLongHTMLText($linker = NULL) {
		if (!$this->isValid()) {
			return $this->getErrorText();
		} else {
			return $this->m_stdcaption;
		}
	}

	public function getXSDValue() {
		return $this->m_value?'1':'0';
	}

	public function getWikiValue(){
		return $this->m_stdcaption;
	}

	public function getNumericValue() {
		return $this->m_value?'1':'0';
	}

	public function isNumeric() {
		return true;
	}

	/**
	 * Creates the export line for the RDF export
	 *
	 * @param string $QName The element name of this datavalue
	 * @param ExportRDF $exporter the exporter calling this function
	 * @return the line to be exported
	 */
	public function exportToRDF($QName, ExportRDF $exporter) {
		$xsdvalue =  $this->m_value?'true':'false';
		return "\t\t<$QName rdf:datatype=\"http://www.w3.org/2001/XMLSchema#boolean\">$xsdvalue</$QName>\n";
	}

}
