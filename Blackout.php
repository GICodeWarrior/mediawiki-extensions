<?php
/**
 * MediaWiki extension to protest, and raise awareness of, Internet censorship.
 * Installation instructions can be found on
 * https://www.mediawiki.org/wiki/Extension:Blackout
 *
 * @addtogroup Extensions
 * @author Gregory Varnum utilizing work by jorm and MediaWiki developers for the Wikimedia Foundation's SOPA/PIPA protest
 * @license GPL
 *
 * Thank you to *** for feedback, bug reporting and cleaning up code
 *
 */

/**
 * Exit if called outside of MediaWiki
 */
 if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

/**
 * SETTINGS
 * --------
 * The following variables may be reset in your LocalSettings.php file.
 * 
 * $wgBlackout['Enable']
 * 			- Enables blackout message
 *			  Default is true
 *
 * $wgBlackout['Skin']
 * 			- Change the blackout skin
 * 				* ProtestSopa (Default)
 * 				* SopStrike
 * 				* StopSopa
 *
 * $wgBlackout['Whitelist'][]
 * 			- Add pages to the whitelist
 *
 */

$wgBlackout = array(
	'Enable' => true,
	'Skin' => 'ProtestSopa',
	'Whitelist' => array(
		'Special:Version',
	),
);

/**
 * Class and localisation
 *
 */

$dir = dirname(__FILE__) . '/';

$wgAutoloadClasses['Blackout'] = $dir . 'Blackout.body.php';

$skinDir = $dir . 'skins/';
$wgAutoloadClasses['SkinProtestSopa'] = $skinDir . 'ProtestSopa.php';
$wgAutoloadClasses['SkinStopSopa'] = $skinDir . 'StopSopa.php';
$wgAutoloadClasses['SkinSopaStrike'] = $skinDir . 'SopaStrike.php';

/*
 * Credits
 */
 $wgExtensionCredits['other'][] = array(
	'name'           => 'Blackout',
	'version'        => '1.0.20120117',
	'author'         => array('[https://www.mediawiki.org/wiki/User:Varnent Gregory Varnum]', 'John Du Hart', '...'),
	'description'    => 'For use during blackouts in protest to SOPA/PIPA and Internet censorship.',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:Blackout',
);

/*
 * Hooks
 */
$wgHooks['MediaWikiPerformAction'][] = 'Blackout::overrideAction';
