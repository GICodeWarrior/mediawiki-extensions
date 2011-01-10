<?php

/**
 * Parser for custom Live Translate translation memory Format (LFT) data.
 *
 * @since 0.4
 *
 * @file LT_LTFParser.php
 * @ingroup LiveTranslate
 *
 * @licence GNU GPL v3
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class LTLTFParser extends LTTMParser {
	
	/**
	 * (non-PHPdoc)
	 * @see LTTMParser::parse()
	 */
	public function parse( $text ) {
		// LiveTranslateFunctions::parseTranslations
		return new LTTranslationMemory(); // TODO
	}	
	
}