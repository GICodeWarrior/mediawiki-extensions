<?php

/**
 * Class describing a single translation memory unit.
 *
 * @since 0.4
 *
 * @file LT_TMUnit.php
 * @ingroup LiveTranslate
 *
 * @licence GNU GPL v3
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class LTTMUnit {
	
	/**
	 * List of language varinats of the translation memory unit.
	 * 
	 * language code => array( primary translation [, synonym [, ect]] )
	 * 
	 * @since 0.4
	 * 
	 * @var array
	 */
	protected $variants = array();
	
	/**
	 * Creates a new translation memory unit.
	 * 
	 * @since 0.4
	 * 
	 * @param array $variants
	 */
	public function __construct( array $variants = array() ) {
		$this->addVariants( $variants );
	}
	
	/**
	 * Returns the list of language varinats of the translation memory unit.
	 * 
	 * @since 0.4
	 * 
	 * @var array: language code => array( primary translation [, synonym [, ect]] )
	 */
	public function getVariants() {
		return $this->variants;
	}
	
	/**
	 * Adds the translation (and optional synonyms) of the unit in a single language.
	 * 
	 * @since 0.4
	 * 
	 * @param string $language
	 * @param string $translation
	 * @param array $synonyms
	 */
	public function addVariant( $language, $translation, array $synonyms = array() ) {
		$this->variants[$language] = array_merge( array( $translation ), $synonyms );
	}
	
	/**
	 * Adds a list of translations to the translation memory unit.
	 * 
	 * @since 0.4
	 * 
	 * @param array $variants language code => array( primary translation [, synonym [, ect]] )
	 */
	public function addVariants( array $variants ) {
		foreach ( $variants as $language => $variant ) {
			$variant = (array)$variant; // Do not require an array, to simplify notation when there are no synonyms.
			$primaryTranslation = array_shift( $variant );
			$this->addVariant( $language, $primaryTranslation, $variant );
		}
	}
	
}
