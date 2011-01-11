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
		
		// FIXME: Hitting the db on every page load should be avoided
		if ( in_array( $title->getFullText(), LiveTranslateFunctions::getLocalMemoryNames() ) ) {
			$parser = LTTMParser::newFromType( LiveTranslateFunctions::getMemoryType( $title->getFullText() ) );
			$tm = $parser->parse( $article->getContent() );	
			$tus = $tm->getTranslationUnits();	
			
			if ( count( $tus ) == 0 ) {
				$wgOut->addWikiMsg( 'livetranslate-dictionary-empty' );
			}
			else {
				$wgOut->addWikiMsg(
					'livetranslate-dictionary-count',
					$wgLang->formatNum( count( $tus ) ) ,
					$wgLang->formatNum( count( $tus[0]->getVariants() ) )
				);
				
				$notAllowedLanguages = array();
				
				foreach ( $tus[0]->getVariants() as $languageCode => $translations ) {
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
		else if (
			$egGoogleApiKey != ''
			&& $article->exists() 
			&& ( count( $egLiveTranslateLanguages ) > 1 || ( count( $egLiveTranslateLanguages ) == 1 && $egLiveTranslateLanguages[0] != $currentLang ) ) ) {
			$wgOut->addHTML(
				Html::rawElement(
					'div',
					array(
						'id' => 'livetranslatediv',
						'style' => 'display:inline; float:right',
						'class' => 'notranslate'
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
				'<br /><br /><div id="googlebranding" style="display:inline; float:right"></div>'
			);
			
			$wgOut->addScript(
				Html::linkedScript( 'https://www.google.com/jsapi?key=' . htmlspecialchars( $egGoogleApiKey ) ) .
				Html::inlineScript(
					'google.load("language", "1");
					google.setOnLoadCallback(function(){google.language.getBranding("googlebranding");});' .
					'var sourceLang = ' . json_encode( $currentLang ) . ';'
				)
			);		
			
			LiveTranslateFunctions::loadJs();		
		}
		
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
	public static function onSchemaUpdate( /* DatabaseUpdater */ $updater = null ) {
		global $wgDBtype, $egLiveTranslateIP;
		
		if ( $wgDBtype == 'mysql' ) {
			// Set up the current schema.
			if ( $updater === null ) {
				global $wgExtNewTables, $wgExtNewIndexes, $wgExtNewFields;
				
				$wgExtNewTables[] = array(
					'live_translate',
					$egLiveTranslateIP . '/LiveTranslate.sql',
					true
				);
				$wgExtNewTables[] = array(
					'live_translate_memories',
					$egLiveTranslateIP . '/LiveTranslate.sql',
					true
				);		
				
				$wgExtNewIndexes[] = array(
					'live_translate',
					'word_translation',
					$egLiveTranslateIP . '/sql/LT_IndexWordTranslation.sql',
					true
				);
				
				$wgExtNewFields[] = array(
					'live_translate',
					'memory_id',
					$egLiveTranslateIP . '/sql/LT_addTMField.sql'
				);	
			}
			else {
				$updater->addExtensionUpdate( array( 
					'addTable',
					'live_translate',
					$egLiveTranslateIP . '/LiveTranslate.sql',
					true
				) );
				$updater->addExtensionUpdate( array( 
					'addTable',
					'live_translate_memories',
					$egLiveTranslateIP . '/LiveTranslate.sql',
					true
				) );	
							
				$updater->addExtensionUpdate( array(
					'addIndex',
					'live_translate',
					'word_translation',
					$egLiveTranslateIP . '/sql/LT_IndexWordTranslation.sql',
					true
				) );
				
				$updater->addExtensionUpdate( array(
					'addField',
					'live_translate',
					'memory_id',
					$egLiveTranslateIP . '/sql/LT_addTMField.sql',
					true
				) );
			}		
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

		// FIXME: Hitting the db on every page save should be avoided
		if ( in_array( $title->getFullText(), LiveTranslateFunctions::getLocalMemoryNames() ) ) {
			$requestData = array(
				'action' => 'importtms',
				'format' => 'json',
				'source' => $title->getFullText(),
				'type' => LiveTranslateFunctions::getMemoryType( $title->getFullText() ),
			);
			
			$api = new ApiMain( new FauxRequest( $requestData, true ), true );
			$api->execute();
			$response = $api->getResultData();					
		}
		
		return true;
	}
		
}
