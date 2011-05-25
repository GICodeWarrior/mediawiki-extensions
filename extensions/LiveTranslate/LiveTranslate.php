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
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

/**
 * This documentation group collects source code files belonging to Live Translate.
 *
 * @defgroup LiveTranslate Live Translate
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

define( 'LiveTranslate_VERSION', '0.1' );

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Live Translate',
	'version' => LiveTranslate_VERSION,
	'author' => array(
		'[http://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw] for [http://www.wikiworks.com WikiWorks]',
	),
	'url' => 'http://www.mediawiki.org/wiki/Extension:Live_Translate',
	'descriptionmsg' => 'livetranslate-desc'
);

$useExtensionPath = version_compare( $wgVersion, '1.16', '>=' ) && isset( $wgExtensionAssetsPath ) && $wgExtensionAssetsPath;
$egLiveTranslateScriptPath = ( $useExtensionPath ? $wgExtensionAssetsPath : $wgScriptPath . '/extensions' ) . '/LiveTranslate';
$egLiveTranslateIP = dirname( __FILE__ );
unset( $useExtensionPath );

$wgExtensionMessagesFiles['LiveTranslate'] 			= $egLiveTranslateIP . '/LiveTranslate.i18n.php';
$wgExtensionMessagesFiles['LiveTranslateMagic'] 	= $egLiveTranslateIP . '/LiveTranslate.i18n.magic.php';

$wgAutoloadClasses['LiveTranslateHooks'] 			= $egLiveTranslateIP . '/LiveTranslate.hooks.php';
$wgAutoloadClasses['ApiImportTranslationMemories']	= $egLiveTranslateIP . '/api/ApiImportTranslationMemories.php';
$wgAutoloadClasses['ApiLiveTranslate']	 			= $egLiveTranslateIP . '/api/ApiLiveTranslate.php';
$wgAutoloadClasses['ApiQueryLiveTranslate']	 		= $egLiveTranslateIP . '/api/ApiQueryLiveTranslate.php';

$incDirIP = $egLiveTranslateIP . '/includes/';
$wgAutoloadClasses['LiveTranslateFunctions']	 	= $incDirIP . 'LiveTranslate_Functions.php';
$wgAutoloadClasses['LTGCSVParser']					= $incDirIP . 'LT_GCSVParser.php';
$wgAutoloadClasses['LTLTFParser']					= $incDirIP . 'LT_LTFParser.php';
$wgAutoloadClasses['LTTMParser']					= $incDirIP . 'LT_TMParser.php';
$wgAutoloadClasses['LTTMUnit']						= $incDirIP . 'LT_TMUnit.php';
$wgAutoloadClasses['LTTMXParser']					= $incDirIP . 'LT_TMXParser.php';
$wgAutoloadClasses['LTTranslationMemory']			= $incDirIP . 'LT_TranslationMemory.php';
unset( $incDirIP );

$wgAutoloadClasses['SpecialLiveTranslate']	 		= $egLiveTranslateIP . '/specials/SpecialLiveTranslate.php';

$wgSpecialPages['LiveTranslate'] = 'SpecialLiveTranslate';
$wgSpecialPageGroups['LiveTranslate'] = 'pagetools';

$wgAPIModules['importtms'] = 'ApiImportTranslationMemories';
$wgAPIModules['livetranslate'] = 'ApiLiveTranslate';
$wgAPIListModules['livetranslate'] = 'ApiQueryLiveTranslate';

$wgHooks['ArticleViewHeader'][] = 'LiveTranslateHooks::onArticleViewHeader';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'LiveTranslateHooks::onSchemaUpdate';
$wgHooks['ArticleSaveComplete'][] = 'LiveTranslateHooks::onArticleSaveComplete';
$wgHooks['LanguageGetMagic'][] = 'LiveTranslateHooks::addMagicWords';
$wgHooks['InternalParseBeforeLinks'][] = 'LiveTranslateHooks::stripMagicWords';
$wgHooks['OutputPageParserOutput'][] = 'LiveTranslateHooks::onOutputPageParserOutput';

$egLTJSMessages = array(
	'livetranslate-button-translate',
	'livetranslate-button-translating',
	'livetranslate-dictionary-error',
);

// For backward compatibility with MW < 1.17.
if ( defined( 'MW_SUPPORTS_RESOURCE_MODULES' ) ) {
	$moduleTemplate = array(
		'localBasePath' => dirname( __FILE__ ),
		'remoteBasePath' => $egLiveTranslateScriptPath,
		'group' => 'ext.livetranslate'
	);
	
	$wgResourceModules['ext.livetranslate'] = $moduleTemplate + array(
		'scripts' => array( 'includes/ext.livetranslate.js' ),
		'dependencies' => array(),
		'messages' => $egLTJSMessages
	);
}

/**
 * Enum for translation memory types.
 * 
 * @since 0.4
 */
define( 'TMT_LTF', 0 );
define( 'TMT_TMX', 1 );
define( 'TMT_GCSV', 2 );

$egLiveTranslateMagicWords = array();

require_once 'LiveTranslate_Settings.php';

$wgAvailableRights[] = 'managetms';