<?php
/**
 * AdManager - a Mediawiki extension that allows setting an ad zone for indiviual pages or categories 
 *
 * The special page created is 'Special:AdManager', which allows sysops to set the zone for the
 * pages or categories. The correct ad code for adding the zone is automatically added to the correct page.
 */

if ( !defined( 'MEDIAWIKI' ) ) die( 'Not an entry point.' );

define( 'AD_TABLE', 'ad' );
define( 'AD_ZONES_TABLE', 'adzones' );

// credits
$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'AdManager',
	'version' => '0.1',
	'author' => 'Ike Hecht for WikiWorks',
	'url' => 'http://www.mediawiki.org/wiki/Extension:AdManager',
	'descriptionmsg'  => 'admanager-desc',
);

$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['AdManager'] = $dir . 'AdManager.i18n.php';

// This extension uses its own permission type, 'admanager'
$wgAvailableRights[] = 'admanager';
$wgGroupPermissions['sysop']['admanager'] = true;

$wgSpecialPages['AdManagerZones'] = 'SpecialAdManagerZones';
$wgSpecialPages['AdManager'] = 'SpecialAdManager';
$wgSpecialPageGroups['AdManagerZones'] = 'other';
$wgSpecialPageGroups['AdManager'] = 'other';
$wgAutoloadClasses['SpecialAdManagerZones'] = $dir . 'SpecialAdManagerZones.php';
$wgAutoloadClasses['SpecialAdManager'] = $dir . 'SpecialAdManager.php';

$wgAutoloadClasses['AdManagerHooks'] = $dir . '/AdManager.hooks.php';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'AdManagerHooks::onSchemaUpdate';
$wgHooks['SkinBuildSidebar'][] = 'AdManagerHooks::SkinBuildSidebar';

$wgAutoloadClasses['AdManagerUtils'] = $dir . '/AdManager.utils.php';