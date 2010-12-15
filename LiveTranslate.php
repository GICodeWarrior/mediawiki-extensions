<?php

/**
 * Initialization file for the Live Translate extension.
 * 
 * Documentation:	 		http://www.mediawiki.org/wiki/Extension:Live_Translate
 * Support					http://www.mediawiki.org/wiki/Extension_talk:Live_Translate
 * Source code:             http://svn.wikimedia.org/viewvc/mediawiki/trunk/extensions/LiveTranslate
 *
 * @file LiveTranslate.php
 * @ingroup LiveTranslate
 *
 * @licence GNU GPL v3
 *
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

/**
 * This documenation group collects source code files belonging to Live Translate.
 *
 * @defgroup LiveTranslate Live Translate
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

define( 'LiveTranslate_VERSION', '0.1 alpha' );

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Live Translate',
	'version' => LiveTranslate_VERSION,
	'author' => array(
		'[http://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw] for [http://www.wikiworks.com WikiWorks]',
	),
	'url' => 'http://www.mediawiki.org/wiki/Extension:Live_Translate',
	'descriptionmsg' => 'lte-desc'
);

$useExtensionPath = version_compare( $wgVersion, '1.16', '>=' ) && isset( $wgExtensionAssetsPath ) && $wgExtensionAssetsPath;
$egLiveTranslateScriptPath = ( $useExtensionPath ? $wgExtensionAssetsPath : $wgScriptPath . '/extensions' ) . '/LiveTranslate';
$egLiveTranslateIP = dirname( __FILE__ );
unset( $useExtensionPath );

$wgExtensionMessagesFiles['LiveTranslate'] 			= $egLiveTranslateIP . '/LiveTranslate.i18n.php';

$wgAutoloadClasses['LiveTranslate'] 				= $egLiveTranslateIP . '/LiveTranslate.hooks.php';

require_once 'LiveTranslate_Settings.php';
