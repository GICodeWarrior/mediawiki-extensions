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
 * Thank you to Raymond and others mentioned in TweetANew.i18n.php for translation work
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
 */

$wgBlackout = array(
	'Enable' => true,
);

/**
 * Class and localisation
 *
 */

$dir = dirname(__FILE__) . '/';
$wgAutoloadClasses['Blackout'] = $dir . 'Blackout.body.php';
$wgExtensionMessagesFiles['Blackout'] = $dir . 'Blackout.i18n.php';

$wgResourceModules['ext.blackout'] = array(
	'styles' => 'ext.blackout.css',
	'scripts' => 'ext.blackout.js',
	'localBasePath' => dirname(__FILE__) . '/modules',
	'remoteExtPath' => 'Blackout/modules'
);

/**
 * Credits
 *
 */

 $wgExtensionCredits['other'][] = array(
	'name'           => 'Blackout',
	'version'        => '1.0.20120117',
	'author'         => '[https://www.mediawiki.org/wiki/User:Varnent Gregory Varnum] utilizing work by [https://www.mediawiki.org/wiki/Extension:Blackout#Credits these fantastic MediaWiki developers]',
	'description'    => 'For use during blackouts in protest to SOPA/PIPA and Internet censorship.',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:Blackout',
);

/**
 * Call the hooks
 *
 */

$wgHooks['BeforePageDisplay'][] = 'Blackout::BlackoutBanner';
