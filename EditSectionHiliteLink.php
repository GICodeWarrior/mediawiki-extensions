<?php
/**
 * EditSectionHiliteLink extension
 *
 * @file
 * @ingroup Extensions
 *
 * This file contains the main include file for the EditSectionHiliteLink extension of
 * MediaWiki.
 *
 * Usage: Add the following line in LocalSettings.php:
 * require_once( "$IP/extensions/EditSectionHiliteLink/EditSectionHiliteLink.php" );
 *
 * @author Arash Boostani <aboostani@wikimedia.org>
 * @license GPL v2
 * @version 0.1.0
 */

// Check environment
if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "This is an extension to MediaWiki and cannot be run standalone.\n" );
	die( - 1 );
}

/* Configuration */

// Credits
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'EditSectionHiliteLink',
	'author' => 'Arash Boostani',
	'version' => '0.1.0',
	'url' => 'https://www.mediawiki.org/wiki/Extension:EditSectionHiliteLink',
	'descriptionmsg' => 'editsectionhilitelink-desc',
);

// Turn on the section container divs in the Parser
$wgSectionContainers = true;

// Shortcut to this extension directory
$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['EditSectionHiliteLink'] = $dir . 'EditSectionHiliteLink.i18n.php';

# Bump the version number every time you change any of the .css/.js files
$wgEditSectionHiliteLinkStyleVersion = 2;

$wgAutoloadClasses['EditSectionHiliteLinkHooks'] = $dir . 'EditSectionHiliteLink.hooks.php';

// Register edit link interception 
$wgHooks['DoEditSectionLink'][] = 'EditSectionHiliteLinkHooks::interceptLink';

// Register ajax add script hook
$wgHooks['AjaxAddScript'][] = 'EditSectionHiliteLinkHooks::addJS';

// Register css add script hook
$wgHooks['BeforePageDisplay'][] = 'EditSectionHiliteLinkHooks::addCSS';
