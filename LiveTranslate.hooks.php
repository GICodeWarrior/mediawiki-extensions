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
		global $wgOut, $wgLang, $egLiveTranslateDirPage, $egGoogleApiKey, $egLiveTranslateLanguages;
		
		$title = $article->getTitle();
		
		$currentLang = LiveTranslateFunctions::getCurrentLang( $title );
		
		if ( $title->getFullText() == $egLiveTranslateDirPage ) {
			$wordSets = LiveTranslateFunctions::parseTranslations( $article->getContent() );
			
			if ( count( $wordSets ) == 0 ) {
				$wgOut->addWikiMsg( 'livetranslate-dictionary-empty' );
			}
			else {
				$wgOut->addWikiMsg(
					'livetranslate-dictionary-count',
					$wgLang->formatNum( count( $wordSets ) ) ,
					$wgLang->formatNum( count( $wordSets[0] ) )
				);
				
				$notAllowedLanguages = array();
				
				foreach ( $wordSets[0] as $languageCode => $translations ) {
					if ( !in_array( $languageCode, $egLiveTranslateLanguages ) ) {
						$notAllowedLanguages[] = $languageCode;
					}
				}
				
				if ( count( $notAllowedLanguages ) > 0 ) {
					$languages = Language::getLanguageNames( false );
					
					foreach ( $notAllowedLanguages as &$notAllowedLang ) {
						if ( array_key_exists( $notAllowedLang, $languages ) ) {
							$notAllowedLang = $languages[$notAllowedLang];
						}
					}
					
					$wgOut->addHTML(
						Html::element(
							'span',
							array( 'style' => 'color:darkred' ),
							wfMsgExt( 'livetranslate-dictionary-unallowed-langs', 'parsemag', $wgLang->listToText( $notAllowedLanguages ), count( $notAllowedLanguages ) )
						)
						
					);
				}
			}
			
			$outputDone = true;
		}
		else if ( $article->exists() 
			&& ( count( $egLiveTranslateLanguages ) > 1 ) || count( $egLiveTranslateLanguages ) == 1 && $egLiveTranslateLanguages[0] != $currentLang ) {
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
					LiveTranslateFunctions::getLanguageSelector( $currentLang ) .
					'&#160;' . 
					Html::element(
						'button',
						array( 'id' => 'livetranslatebutton' ),
						wfMsg( 'livetranslate-button-translate' )
					) .
					'&#160;' . 
					Html::element(
						'button',
						array( 'id' => 'ltrevertbutton', 'style' => 'display:none' ),
						wfMsg( 'livetranslate-button-revert' )
					)					
				) .
				'</span>'
			);
		}
		
		$wgOut->addScript(
			Html::linkedScript( 'https://www.google.com/jsapi?key=' . htmlspecialchars( $egGoogleApiKey ) ) .
			Html::inlineScript(
				'google.load("language", "1");' .
				'var sourceLang = ' . json_encode( $currentLang ) . ';'
			)
		);		
		
		LiveTranslateFunctions::loadJs();
		
		return true;
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
		$minoredit, $watchthis, $sectionanchor, &$flags, $revision, &$status, $baseRevId, &$redirect = null ) {
		
		global $egLiveTranslateDirPage;
		
		$title = $article->getTitle();

		if ( $title->getFullText() == $egLiveTranslateDirPage ) {
			LiveTranslateFunctions::saveTranslations( LiveTranslateFunctions::parseTranslations( $text ) );
		}
		
		return true;
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
		global $wgTitle;
		
		$currentLang = LiveTranslateFunctions::getCurrentLang( $wgTitle );	
		$specialWords = LiveTranslateFunctions::getSpecialWordsForLang( $currentLang );
		
		$toggeledSpecials = array();
		
		foreach ( $specialWords as $word ) {
			$toggledWord = LiveTranslateFunctions::getToggledCase( $word );
			
			if ( $toggledWord ) {
				$toggeledSpecials[] = $toggledWord;
			}
		}
		
		foreach ( array_merge( $specialWords, $toggeledSpecials ) as $specialWord ) {
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