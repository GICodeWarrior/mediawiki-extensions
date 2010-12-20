<?php

/**
 * Static class for hooks handled by the Live Translate extension.
 * 
 * @since 0.1
 * 
 * @file LiveTranslate.hooks.php
 * @ingroup LiveTranslate
 * 
 * @author Jeroen De Dauw
 */
final class LiveTranslateHooks {
	
	/**
	 * Adds the translation interface to articles.
	 * 
	 * @since 0.1
	 * 
	 * @param Article &$article
	 * @param boolean $outputDone
	 * @param boolean $useParserCache
	 * 
	 * @return true
	 */
	public static function onArticleViewHeader( Article &$article, &$outputDone, &$useParserCache ) {
		global $wgOut, $egLiveTranslateDirPage;
		
		$title = $article->getTitle();
		
		if ( $article->exists() && $title->getFullText() != $egLiveTranslateDirPage ) {
			$wgOut->addHTML(
				'<span class="notranslate" id="livetranslatespan">' .
				Html::rawElement(
					'div',
					array(
						'id' => 'livetranslatediv',
						'style' => 'display:inline; float:right',
					),
					htmlspecialchars( wfMsg( 'livetranslate-translate-to' ) ) .
					'&#160;' . 
					self::getLanguageSelector() .
					'&#160;' . 
					Html::element(
						'button',
						array( 'id' => 'livetranslatebutton', 'style' => 'height: 27px' ),
						wfMsg( 'livetranslate-button-translate' )
					)
				) .
				'</span>'
			);
		}
		
		LiveTranslateFunctions::loadJs();
		
		return true;
	}
	
	/**
	 * Returns the HTML for a language selector.
	 * 
	 * @since 0.1
	 * 
	 * @return string
	 */
	protected static function getLanguageSelector() {
		global $wgContLanguageCode;
		
		$languages = Language::getLanguageNames( false );
		
		$currentLang = 'en'; // TODO
		
		$currentLang = array_key_exists( $currentLang, $languages ) ? $currentLang : $wgContLanguageCode;
		
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

		return $languageSelector->getInputHTML( $currentLang );
	}
	
	/**
	 * Gets a list of all available languages.
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	protected static function getAvailableLanguages() {
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
	protected static function getSpecialWordsForLang( $language ) {
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
	 * Schema update to set up the needed database tables.
	 * 
	 * @since 0.1
	 * 
	 * @param DatabaseUpdater $updater
	 * 
	 * @return true
	 */	
	public static function onSchemaUpdate( DatabaseUpdater $updater ) {
		global $wgDBtype, $egLiveTranslateIP;
		
		if ( $wgDBtype == 'mysql' ) {
			// Set up the current schema.
			$updater->addExtensionUpdate( array( 
				'addTable',
				'livetranslate',
				$egLiveTranslateIP . '/LiveTranslate.sql',
				true
			) );
		}
		
		return true;
	}
	
	/**
	 * Handles edits to the dictionary page to save the translations into the db.
	 * 
	 * @since 0.1
	 * 
	 * @return true
	 */		
	public static function onArticleSaveComplete( &$article, &$user, $text, $summary,
		$minoredit, $watchthis, $sectionanchor, &$flags, $revision, &$status, $baseRevId, &$redirect ) {
		
		global $egLiveTranslateDirPage;
		
		$title = $article->getTitle();

		if ( $title->getFullText() == $egLiveTranslateDirPage ) {
			self::saveTranslations( self::parseTranslations( $text ) );
		}
		
		return true;
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
	protected static function parseTranslations( $content ) {
		$translationSets = array();
		
		$lines = explode( "\n", $content );
		$languages = array_map( 'trim', explode( ',', array_shift( $lines ) ) );
		
		foreach ( $lines as $line ) {
			$values = array_map( 'trim', explode( ',', $line ) );
			
			$translations = array();
			
			foreach ( $values as $nr => $value ) {
				if ( array_key_exists( $nr, $languages ) ) {
					$translations[$languages[$nr]] = $value;
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
	protected static function saveTranslations( array $translationSets ) {
		$dbw = wfGetDB( DB_MASTER );
		
		$dbw->query( 'TRUNCATE TABLE ' . $dbw->tableName( 'live_translate' ) );

		foreach ( $translationSets as $wordId => $translations ) {
			foreach ( $translations as $language => $translation ) {
				$dbw->insert(
					'live_translate',
					array(
						'word_id' => $wordId,
						'word_language' => $language,
						'word_translation' => $translation
					)
				);				
			}
		}
	}
	
	/**
	 * Called every time wikitext is added to the OutputPage, after it is parsed but before it is added.
	 * Wraps the words with special translations into no-translate tags.
	 * 
	 * @since 0.1
	 * 
	 * @param OutputPage $out
	 * @param string $text
	 * 
	 * @return true
	 */
	public static function onOutputPageBeforeHTML( OutputPage &$out, &$text ) {
		// TODO: obtain source lang
		$sourceLang = 'en';		
		
		$specialWords = self::getSpecialWordsForLang( $sourceLang );
		
		foreach ( $specialWords as $specialWord ) {
			$text = str_replace( 
				$specialWord , 
				Html::element(
					'span',
					array( 'class' => 'notranslate', 'original' => $specialWord ),
					$specialWord
				), 
				$text 
			);
		}
		
		return true;
	}
	
}