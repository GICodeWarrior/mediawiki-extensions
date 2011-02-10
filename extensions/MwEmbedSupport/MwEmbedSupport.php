<?php
/**
 * MwEmbed Support Extension, Supports MwEmbed based modules, 
 * and registers shared javascript resources. 
 * 
 * @file
 * @ingroup Extensions
 * 
 * @author Michael Dale ( michael.dale@kaltura.com )
 * @license GPL v2 or later
 * @version 0.3.0
 */   

/* Configuration */

// When used as an extension we are not in StandAloneResourceLoaderMode:
$wgStandAloneResourceLoaderMode = false; 


/* Setup */
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'MwEmbedSupport',
	'author' => array( 'Michael Dale' ),
	'version' => '0.0.4',
	'url' => 'http://www.mediawiki.org/wiki/Extension:MwEmbed',
	'descriptionmsg' => 'mwembed-desc',
);

$wgAutoloadClasses['MwEmbedResourceManager'] = dirname( __FILE__ ) . '/MwEmbedResourceManager.php';
$wgExtensionMessagesFiles['MwEmbedSupport'] = dirname( __FILE__ ) . '/MwEmbedSupport.i18n.php';

// Add Global MwEmbed Registration hook
$wgHooks['ResourceLoaderRegisterModules'][] = 'MwEmbedResourceManager::registerModules';

// Add MwEmbed module configuration
$wgHooks['ResourceLoaderGetConfigVars'][] =  'MwEmbedResourceManager::registerConfigVars';

/* MwEmbed Module Registration */

// Register the core MwEmbed Support Module:
MwEmbedResourceManager::register( 'extensions/MwEmbedSupport/MwEmbedModules/MwEmbedSupport' );

// Register the MwEmbed 'mediaWiki' Module:
MwEmbedResourceManager::register( 'extensions/MwEmbedSupport/MwEmbedModules/MediaWikiSupport' );

// Add MwEmbedSupport to Startup:
function MwUpdateStartupModules( &$modules ){	
	array_push($modules, 'jquery.triggerQueueCallback', 'jquery.mwEmbedUtil', 'mwEmbedStartup' );		
	return true;
}
$wgHooks['ResourceLoaderGetStartupModules'][] = 'MwUpdateStartupModules';

