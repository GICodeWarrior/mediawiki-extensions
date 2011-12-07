<?php
/**
 * Insert a special box on user page showing their status.
 *
 * @file
 * @ingroup Extensions
 * @author Petr Bena <benapetr@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @link http://www.mediawiki.org/wiki/Extension:OnlineStatusBar Documentation
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "This is a part of mediawiki and can't be started separately";
	die();
}

$wgExtensionCredits[version_compare( $wgVersion, '1.17', '>=' ) ? 'userpage tools' : 'other'][] = array(
	'path' => __FILE__,
	'name' => 'Online status bar',
	'version' => '1.0.4',
	'author' => array( 'Petr Bena' ),
	'descriptionmsg' => 'onlinestatusbar-desc',
	'url' => 'http://www.mediawiki.org/wiki/Extension:OnlineStatusBar',
);

$dir = dirname( __FILE__ );
$wgExtensionMessagesFiles['OnlineStatusBar'] = "$dir/OnlineStatusBar.i18n.php";

$wgResourceModules['ext.OnlineStatusBar'] = array (
	'skinStyles' => array (
		'default' => array ( 'OnlineStatusBar.css' ),
		'chick' => array ( 'OnlineStatusBarChick.css' ),
		'vector' => array ( 'OnlineStatusBarVector.css'),
		'modern' => array ( 'OnlineStatusBarModern.css' ),
		'standard' => array ( 'OnlineStatusBarClassic.css' ),
		'monobook' => array ( 'OnlineStatusBarMono.css' ),
		'simple' => array ( 'OnlineStatusBarSimple.css' ),
		'cologne' => array ( 'OnlineStatusBarCologne.css' ),
		'nostalgia' => array ( 'OnlineStatusBarNostalgia.css' ),
	),
	'scripts' => 'ext.onlinestatusbar.js',
	'localBasePath' => dirname ( __FILE__ ),
	'remoteExtPath' => 'OnlineStatusBar',
);

// Load other files of extension
$wgAutoloadClasses['OnlineStatusBar'] = "$dir/OnlineStatusBar.body.php";
$wgAutoloadClasses['OnlineStatusBar_StatusCheck'] = "$dir/OnlineStatusBar.status.php";
$wgAutoloadClasses['OnlineStatusBarHooks'] = "$dir/OnlineStatusBar.hooks.php";
$wgAutoloadClasses['ApiOnlineStatus'] = "$dir/OnlineStatusBar.api.php";
$wgAPIPropModules['onlinestatus'] = 'ApiOnlineStatus';

// For memcached
define( 'ONLINESTATUSBAR_DELAYED_CACHE', 'd' );
define( 'ONLINESTATUSBAR_NORMAL_CACHE', 'n' );
// Timeout
define( 'ONLINESTATUSBAR_CK_DELAYED', 1 );
define( 'ONLINESTATUSBAR_CK_AWAY', 2 );


// Configuration
// Those values can be overriden in LocalSettings, do not change it here
// default for anonymous and uknown users
$wgOnlineStatusBarTrackIpUsers = false;
// it's better to cron this for performance reasons
$wgOnlineStatusBarAutoDelete = true;
// delay between db updates
$wgOnlineStatusBar_WriteTime = 300;
// default for online
$wgOnlineStatusBarDefaultOnline = 'online';
// default for offline
$wgOnlineStatusBarDefaultOffline = 'offline';
// if users have this feature enabled by default
$wgOnlineStatusBarDefaultEnabled = false;
// how long to wait until user is considered as offline
$wgOnlineStatusBar_LogoutTime = 3600;
// time to wait until we consider user away
$wgOnlineStatusBar_AwayTime = 15;
// Cache
// default 10 minutes for online
$wgOnlineStatusBarCacheTime = array(
	'online' => 10,
	'busy' => 10,
	'away' => 10,
	'offline' => 60,
);
// Icons
$wgOnlineStatusBarIcon = array(
	'online' => 'statusgreen.png',
	'busy' => 'statusorange.png',
	'away' => 'statusorange.png',
	'hidden' => 'statusred.png',
	'offline' => 'statusred.png',
);


$wgHooks['LoadExtensionSchemaUpdates'][] = 'OnlineStatusBarHooks::ckSchema';
$wgHooks['UserLogout'][] = 'OnlineStatusBarHooks::logout';
$wgHooks['ArticleViewHeader'][] = 'OnlineStatusBarHooks::renderBar';
$wgHooks['UserLoginComplete'][] = 'OnlineStatusBarHooks::updateStatus';
$wgHooks['GetPreferences'][] = 'OnlineStatusBarHooks::preferencesHook';
$wgHooks['UserGetDefaultOptions'][] = 'OnlineStatusBarHooks::setDefaultOptions';
$wgHooks['LanguageGetMagic'][] = 'OnlineStatusBarHooks::magicWordVar';
$wgHooks['BeforePageDisplay'][] = 'OnlineStatusBarHooks::stylePage';
$wgHooks['MagicWordwgVariableIDs'][] = 'OnlineStatusBarHooks::magicWordSet';
$wgHooks['ParserGetVariableValueSwitch'][] = 'OnlineStatusBarHooks::parserGetVariable';
