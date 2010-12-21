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
		global $wgUser;
		
		$targetLang = $currentLang;
		
		$languages = Language::getLanguageNames( false );
		
		if ( $wgUser->isLoggedIn() ) {
			$userLang = $wgUser->getOption( 'language' );
			
			if ( array_key_exists( $userLang, $languages ) ) {
				$targetLang = $userLang;
			}			
		}
		
		$options = array();
		ksort( $languages );
		
		foreach ( $languages as $code => $name ) {
			$display = wfBCP47( $code ) . ' - ' . $name;
			$options[$display] = $code;
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
	 * Parses the provided dictionary content and returns it as an
	 * array of associative arrays. 
	 * 
	 * @since 0.1
	 * 
	 * @param string $content
	 * 
	 * @return array
	 */		
	public static function parseTranslations( $content ) {
		$translationSets = array();
		
		$lines = explode( "\n", $content );
		$languages = array_map( 'trim', explode( ',', array_shift( $lines ) ) );
		
		foreach ( $lines as $line ) {
			$values = array_map( 'trim', explode( ',', $line ) );
			
			$translations = array();
			
			foreach ( $values as $nr => $value ) {
				if ( array_key_exists( $nr, $languages ) ) {
					// Add the translation (or translations) (value, array) of the word in the language (key).
					$translations[$languages[$nr]] = array_map( 'trim', explode( '|', $value ) );
				}
			}
			
			$translationSets[] = $translations;
		}
		
		return $translationSets;
	}
	
	/**
	 * Replaces the current translations with the provided ones. 
	 * 
	 * @since 0.1
	 * 
	 * @param array $translationSets
	 */		
	public static function saveTranslations( array $translationSets ) {
		$dbw = wfGetDB( DB_MASTER );
		
		$dbw->query( 'TRUNCATE TABLE ' . $dbw->tableName( 'live_translate' ) );

		foreach ( $translationSets as $wordId => $translationSet ) {
			foreach ( $translationSet as $language => $translations ) {
				$primary = 1;
				
				foreach ( $translations as $translation ) {
					$dbw->insert(
						'live_translate',
						array(
							'word_id' => $wordId,
							'word_language' => $language,
							'word_translation' => $translation,
							'word_primary' => $primary
						)
					);

					$primary = 0;
				}
			}
		}
	}	
	
}