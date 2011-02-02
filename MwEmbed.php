<?php
/**
 * MwEmbed extension, supports mwEmbed based modules
 * 
 * @file
 * @ingroup Extensions
 * 
 * @author Michael Dale ( michael.dale@kaltura.com )
 * @license GPL v2 or later
 * @version 0.3.0
 */   

/* Configuration */

/* Setup */

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'MwEmbedSupport',
	'author' => array( 'Michael Dale' ),
	'version' => '0.0.2',
	'url' => 'http://www.mediawiki.org/wiki/Extension:MwEmbed',
	'descriptionmsg' => 'mwembed-desc',
);

$wgAutoloadClasses['MwEmbedResourceManager'] = dirname( __FILE__ ) . '/MwEmbedResourceManager.php';
$wgExtensionMessagesFiles['MwEmbed'] = dirname( __FILE__ ) . '/MwEmbed.i18n.php';

// Register the core mwEmbed Module:
MwEmbedResourceManager::register( 'extensions/MwEmbedSupport/MwEmbedSupport' );
// Register the mwEmbed 'mediaWiki' module
// mediaWiki parts need to be separated from mwEmbed because mwEmbed when used stand alone
// should have minimal mediaWiki specific code.  
MwEmbedResourceManager::register( 'extensions/MwEmbedSupport/MwEmbedSupport' );

// Add module Registration
$wgHooks['ResourceLoaderRegisterModules'][] = 'MwEmbedResourceManager::registerModules';
// Add MwEmbed module configuration
$wgHooks['ResourceLoaderGetConfigVars'][] =  'MwEmbedResourceManager::registerConfigVars';

// The mwEmbed module is added to all pages if enabled: 
$wgHooks['BeforePageDisplay'][] = 'MwEmbedResourceManager::addMwEmbedModule';