<?php

/**
 * Abstract base class for translation memory (TM) parsers.
 *
 * @since 0.4
 *
 * @file LT_TMParser.php
 * @ingroup LiveTranslate
 *
 * @licence GNU GPL v3
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
abstract class LTTMParser {
	
	/**
	 * Creates a new translation memory parser.
	 * 
	 * @since 0.4
	 */
	public function __construct() {
		
	}
	
	/**
	 * Parses the provided text to a LTTranslationMemory object.
	 * 
	 * @since 0.4
	 * 
	 * @param string $text
	 * 
	 * @return LTTranslationMemory
	 */
	public abstract function parse( $text );
	
}
