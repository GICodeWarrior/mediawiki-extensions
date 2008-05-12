<?php
if ( !defined( 'MEDIAWIKI' ) ) die();

/**
 * Special page to allow users to configure the wiki by a web based interface
 * Require MediaWiki version 1.7.0 or greater
 *
 * @addtogroup Extensions
 * @author Alexandre Emsenhuber
 */

## Adding credit :)
$wgExtensionCredits['specialpage'][] = array(
	'name' => 'Configure',
	'author' => 'Alexandre Emsenhuber',
	'url' => 'http://www.mediawiki.org/wiki/Extension:Configure',
	'description' => 'Allow authorised users to configure the wiki by a web-based interface',
	'descriptionmsg' => 'configure-desc',
	'version' => '0.3.0',
);

## Adding new rights...
$wgAvailableRights[] = 'configure';
$wgAvailableRights[] = 'configure-all';
$wgGroupPermissions['bureaucrat']['configure'] = true;
#$wgGroupPermissions['developer']['configure-all'] = true;

$dir = dirname( __FILE__ ) . '/';

## Define some functions
require_once( $dir . 'Configure.func.php' );

## Adding internationalisation...
if( isset( $wgExtensionMessagesFiles ) && is_array( $wgExtensionMessagesFiles ) ){
	$wgExtensionMessagesFiles['Configure'] = $dir . 'Configure.i18n.php';
} else {
	$wgHooks['LoadAllMessages'][] = 'efConfigureLoadMessages';
}

## Adding the new special page...
$wgAutoloadClasses['SpecialConfigure'] = $dir . 'Configure.body.php';
$wgSpecialPages['Configure'] = 'SpecialConfigure';

## Add the ajax function
$wgAjaxExportList[] = 'efConfigureAjax';

## Default path for the serialized files
$wgConfigureFilesPath = "$IP/serialized";

## Styles versions
$wgConfigureStyleVersion = '1';