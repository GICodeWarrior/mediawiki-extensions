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
	protected static function loadJs() {
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
	public static function addJSLocalisation() {
		global $egLTJSMessages, $wgOut;
		
		$data = array();
	
		foreach ( $egLTJSMessages as $msg ) {
			$data[$msg] = wfMsgNoTrans( $msg );
		}
	
		$wgOut->addInlineScript( 'var wgLTEMessages = ' . json_encode( $data ) . ';' );		
	}	
	
}