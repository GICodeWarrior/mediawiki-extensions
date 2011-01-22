<?php

class StubAutoLang extends StubObject {
	protected $requestedLanguage;

	function __construct() {
		parent::__construct( 'wgLang' );
	}

	function __call( $name, $args ) {
		return $this->_call( $name, $args );
	}

	function setRequestedLanguage( $code ) {
		$this->requestedLanguage = $code;
	}

	//partially copied from StubObject.php. There should be a better way...
	function _newObject() {
		global $wgContLanguageCode, $wgContLang, $wgLanguageSelectorDetectLanguage;

		$code = $this->requestedLanguage;
		if (!$code) $code = wfLanguageSelectorDetectLanguage( $wgLanguageSelectorDetectLanguage );

		if( $code == $wgContLanguageCode ) {
			return $wgContLang;
		} else {
			$obj = Language::factory( $code );
			return $obj;
		}
	}
}