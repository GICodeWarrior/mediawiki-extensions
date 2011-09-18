<?php
/*
 * Extension for managing the Wikimania conferences
 */

if( !defined( 'MEDIAWIKI' ) ) {
	die( "Don't do that." );
}

// Extension credits
$wgExtensionCredits['specialpages'][] = array(
	'path'           => __FILE__,
	'name'           => 'Wikimania',
	'author'         => array( 'Chad Horohoe' ),
	'descriptionmsg' => 'wikimania-desc',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:Wikimania',
	'version'        => 0.1,
);

$d = dirname( __FILE__ );

/**
 * Classes
 */
$wgAutoloadClasses['WikimaniaHooks'] = "$d/backend/WikimaniaHooks.php";
$wgAutoloadClasses['SpecialAdministerWikimania'] = "$d/specials/SpecialAdministerWikimania.php";
$wgAutoloadClasses['SpecialCheckWikimaniaStatus'] = "$d/specials/SpecialCheckWikimaniaStatus.php";
$wgAutoloadClasses['SpecialRegisterForWikimania'] = "$d/specials/SpecialRegisterForWikimania.php";

/**
 * i18n
 */
$wgExtensionMessageFiles['wikimania'] = "$d/Wikimania.i18n.php";
$wgExtensionAliasesFiles['wikimania'] = "$d/Wikimania.alias.php";

/**
 * Special pages
 */
$wgSpecialPages['AdministerWikimania'] = 'SpecialAdministerWikimania';
$wgSpecialPages['CheckWikimaniaStatus'] = 'SpecialCheckWikimaniaStatus';
$wgSpecialPages['RegisterForWikimania'] = 'SpecialRegisterForWikimania';
$wgSpecialPageGroups['wikimania'] = array(
	'AdministerWikimania', 'CheckWikimaniaStatus', 'RegisterForWikimania'
);

/**
 * Hooks
 */
$wgHooks['LoadExtensionSchemaUpdates'][] = 'WikimaniaHooks::loadExtensionSchemaUpdates';

/**
 * Rights
 */
$wgAdditionalRights[] = 'wikimania-register';
$wgAdditionalRights[] = 'wikimania-checkstatus';
$wgAdditionalRights[] = 'wikimania-admin';
$wgGroupPermissions['user']['wikimania-register'] = true;
$wgGroupPermissions['user']['wikimania-checkstatus'] = true;
$wgGroupPermissions['sysop']['wikimania-admin'] = true;

/**
 * Configuration array for Wikimania
 */
$wgWikimaniaConf = array(

);
