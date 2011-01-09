<?php

/**
 * Class describing a translation memory.
 *
 * @since 0.4
 *
 * @file LT_TranslationMemory.php
 * @ingroup LiveTranslate
 *
 * @licence GNU GPL v3
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class LTTranslationMemory {
	
	/**
	 * List of translation units in the translation memory.
	 * 
	 * @since 0.4
	 * 
	 * @var array of LTTMUnit
	 */
	protected $translationUnits = array();
	
	/**
	 * Constructor for a new translation memory object.
	 * 
	 * @since 0.4
	 */	
	public function __construct() {
		
	}
	
	/**
	 * Adds a single LTTMUnit to the translation memory.
	 * 
	 * @since 0.4
	 * 
	 * @param LTTMUnit $tu
	 */		
	public function addTranslationUnit( LTTMUnit $tu ) {
		$translationUnits[] = $tu;
	}
	
	/**
	 * Constructor for a new translation memory object.
	 * 
	 * @since 0.4
	 */			
	public function getTranslationUnits() {
		return $this->translationUnits;
	}
	
}
