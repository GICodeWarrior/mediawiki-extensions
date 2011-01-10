<?php

/**
 * Statis class with utility methods for the Live Translate extension.
 *
 * @since 0.1
 *
 * @file LiveTranslate_Functions.php
 * @ingroup LiveTranslate
 *
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class LiveTranslateFunctions {
	
	/**
	 * Loads the needed JavaScript.
	 * Takes care of non-RL compatibility.
	 * 
	 * @since 0.1
	 */
	public static function loadJs() {
		global $wgOut;
		
		// For backward compatibility with MW < 1.17.
		if ( is_callable( array( $wgOut, 'addModules' ) ) ) {
			$wgOut->addModules( 'ext.livetranslate' );
		}
		else {
			global $egLiveTranslateScriptPath;
			
			self::addJSLocalisation();
			
			$wgOut->includeJQuery();
			
			$wgOut->addHeadItem(
				'ext.livetranslate',
				Html::linkedScript( $egLiveTranslateScriptPath . '/includes/ext.livetranslate.js' )
			);
		}		
	}	
	
	/**
	 * Adds the needed JS messages to the page output.
	 * This is for backward compatibility with pre-RL MediaWiki.
	 * 
	 * @since 0.1
	 */
	protected static function addJSLocalisation() {
		global $egLTJSMessages, $wgOut;
		
		$data = array();
	
		foreach ( $egLTJSMessages as $msg ) {
			$data[$msg] = wfMsgNoTrans( $msg );
		}
	
		$wgOut->addInlineScript( 'var wgLTEMessages = ' . json_encode( $data ) . ';' );		
	}
	
	/**
	 * Returns the language code for a title.
	 * 
	 * @param Title $title
	 * 
	 * @return string
	 */
	public static function getCurrentLang( Title $title ) {
		$subPage = array_pop( explode( '/', $title->getSubpageText() ) );

		if ( $subPage != '' && array_key_exists( $subPage, Language::getLanguageNames( false ) ) ) {
			return $subPage;
		}
		
		global $wgLanguageCode;
		return $wgLanguageCode;
	}
	
	/**
	 * Returns the HTML for a language selector.
	 * 
	 * @since 0.1
	 * 
	 * @param string $currentLang
	 * 
	 * @return string
	 */
	public static function getLanguageSelector( $currentLang ) {
		global $wgUser, $wgLanguageCode, $egLiveTranslateLanguages;
		
		$allowedLanguages = array_merge( $egLiveTranslateLanguages, array( $currentLang ) );
		
		$targetLang = $wgLanguageCode;
		
		$languages = Language::getLanguageNames( false );
		
		if ( $wgUser->isLoggedIn() ) {
			$userLang = $wgUser->getOption( 'language' );
			
			if ( array_key_exists( $userLang, $languages ) && in_array( $userLang, $allowedLanguages ) ) {
				$targetLang = $userLang;
			}			
		}
		
		$options = array();
		ksort( $languages );
		
		foreach ( $languages as $code => $name ) {
			if ( in_array( $code, $allowedLanguages ) && $code != $currentLang ) {
				$display = wfBCP47( $code ) . ' - ' . $name;
				$options[$display] = $code;				
			}
		}
		
		$languageSelector = new HTMLSelectField( array(
			'id' => 'livetranslatelang',
			'fieldname' => 'language',
			'options' => $options
		) );

		return $languageSelector->getInputHTML( $targetLang );
	}
	
	/**
	 * Gets a list of all available languages.
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	public static function getAvailableLanguages() {
		$dbr = wfGetDB( DB_SLAVE );
			
		$destinationLangs = array();
			
		// TODO: fix index
		$res = $dbr->query( 'SELECT DISTINCT word_language FROM ' . $dbr->tableName( 'live_translate' ) );
		
		while ( $lang = $dbr->fetchObject( $res ) ) {
			$destinationLangs[] = $lang->word_language;
		}

		return $destinationLangs;
	}
	
	/**
	 * Gets a list of all special words in a language.
	 * 
	 * @since 0.1
	 * 
	 * @param string $language
	 * 
	 * @return array
	 */
	public static function getSpecialWordsForLang( $language ) {
		$dbr = wfGetDB( DB_SLAVE );
			
		$words = array();
			
		// TODO: fix index
		$res = $dbr->query( 
			'SELECT DISTINCT word_translation FROM ' . 
			$dbr->tableName( 'live_translate' ) . 
			' WHERE word_language = ' . $dbr->addQuotes( $language )
		);
		
		while ( $translation = $dbr->fetchObject( $res ) ) {
			$words[] = $translation->word_translation;
		}

		return $words;
	}
	
	/**
	 * Returns a PHP version of the JavaScript google.language.Languages enum of the Google Translate v1 API.
	 * @see https://code.google.com/apis/language/translate/v1/getting_started.html#LangNameArray
	 * 
	 * @since 0.1
	 * 
	 * @return array LANGUAGE_NAME => 'code' 
	 */
	public static function getGTSupportedLanguages() {
		return array(
			'AFRIKAANS' => 'af',
			'ALBANIAN' => 'sq',
			'AMHARIC' => 'am',
			'ARABIC' => 'ar',
			'ARMENIAN' => 'hy',
			'AZERBAIJANI' => 'az',
			'BASQUE' => 'eu',
			'BELARUSIAN' => 'be',
			'BENGALI' => 'bn',
			'BIHARI' => 'bh',
			'BRETON' => 'br',
			'BULGARIAN' => 'bg',
			'BURMESE' => 'my',
			'CATALAN' => 'ca',
			'CHEROKEE' => 'chr',
			'CHINESE' => 'zh',
			'CHINESE_SIMPLIFIED' => 'zh-CN',
			'CHINESE_TRADITIONAL' => 'zh-TW',
			'CORSICAN' => 'co',
			'CROATIAN' => 'hr',
			'CZECH' => 'cs',
			'DANISH' => 'da',
			'DHIVEHI' => 'dv',
			'DUTCH'=> 'nl',	
			'ENGLISH' => 'en',
			'ESPERANTO' => 'eo',
			'ESTONIAN' => 'et',
			'FAROESE' => 'fo',
			'FILIPINO' => 'tl',
			'FINNISH' => 'fi',
			'FRENCH' => 'fr',
			'FRISIAN' => 'fy',
			'GALICIAN' => 'gl',
			'GEORGIAN' => 'ka',
			'GERMAN' => 'de',
			'GREEK' => 'el',
			'GUJARATI' => 'gu',
			'HAITIAN_CREOLE' => 'ht',
			'HEBREW' => 'iw',
			'HINDI' => 'hi',
			'HUNGARIAN' => 'hu',
			'ICELANDIC' => 'is',
			'INDONESIAN' => 'id',
			'INUKTITUT' => 'iu',
			'IRISH' => 'ga',
			'ITALIAN' => 'it',
			'JAPANESE' => 'ja',
			'JAVANESE' => 'jw',
			'KANNADA' => 'kn',
			'KAZAKH' => 'kk',
			'KHMER' => 'km',
			'KOREAN' => 'ko',
			'KURDISH'=> 'ku',
			'KYRGYZ'=> 'ky',
			'LAO' => 'lo',
			'LATIN' => 'la',
			'LATVIAN' => 'lv',
			'LITHUANIAN' => 'lt',
			'LUXEMBOURGISH' => 'lb',
			'MACEDONIAN' => 'mk',
			'MALAY' => 'ms',
			'MALAYALAM' => 'ml',
			'MALTESE' => 'mt',
			'MAORI' => 'mi',
			'MARATHI' => 'mr',
			'MONGOLIAN' => 'mn',
			'NEPALI' => 'ne',
			'NORWEGIAN' => 'no',
			'OCCITAN' => 'oc',
			'ORIYA' => 'or',
			'PASHTO' => 'ps',
			'PERSIAN' => 'fa',
			'POLISH' => 'pl',
			'PORTUGUESE' => 'pt',
			'PORTUGUESE_PORTUGAL' => 'pt-PT',
			'PUNJABI' => 'pa',
			'QUECHUA' => 'qu',
			'ROMANIAN' => 'ro',
			'RUSSIAN' => 'ru',
			'SANSKRIT' => 'sa',
			'SCOTS_GAELIC' => 'gd',
			'SERBIAN' => 'sr',
			'SINDHI' => 'sd',
			'SINHALESE' => 'si',
			'SLOVAK' => 'sk',
			'SLOVENIAN' => 'sl',
			'SPANISH' => 'es',
			'SUNDANESE' => 'su',
			'SWAHILI' => 'sw',
			'SWEDISH' => 'sv',
			'SYRIAC' => 'syr',
			'TAJIK' => 'tg',
			'TAMIL' => 'ta',
			'TATAR' => 'tt',
			'TELUGU' => 'te',
			'THAI' => 'th',
			'TIBETAN' => 'bo',
			'TONGA' => 'to',
			'TURKISH' => 'tr',
			'UKRAINIAN' => 'uk',
			'URDU' => 'ur',
			'UZBEK' => 'uz',
			'UIGHUR' => 'ug',
			'VIETNAMESE' => 'vi',
			'WELSH' => 'cy',
			'YIDDISH' => 'yi',
			'YORUBA' => 'yo',
		);
	}
	
	/**
	 * Returns the provided text starting with a letter in toggeled case.
	 * If there is no difference between lowercase and upercase for the first
	 * character, false is returned.
	 * 
	 * @since 0.1
	 * 
	 * @param string $text
	 * 
	 * @return mixed
	 */
	public static function getToggledCase( $text ) {
		$isUpper = Language::firstChar( $text) == strtoupper( Language::firstChar( $text) );
		$isLower = Language::firstChar( $text) == strtolower( Language::firstChar( $text) );
		
		if ( $isUpper XOR $isLower ) {
			$text = $isUpper ? Language::lcfirst( $text ) : Language::ucfirst( $text );
			return $text;
		}
		else {
			return false;
		}
	}
	
}