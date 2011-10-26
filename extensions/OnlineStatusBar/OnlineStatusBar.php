<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	echo "This is a part of mediawiki and can't be started separately";
	die();
}

/**
 * Insert a special box on user page showing their status.
 *
 * @file
 * @ingroup Extensions
 * @author Petr Bena <benapetr@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @link http://www.mediawiki.org/wiki/Extension:OnlineStatusBar Documentation
 */

$wgExtensionCredits[version_compare( $wgVersion, '1.17', '>=' ) ? 'userpage tools' : 'other'][] = array(
	'path' => __FILE__,
	'name' => 'Online status bar',
	'version' => '1.0.0',
	'author' => array( 'Petr Bena' ),
	'descriptionmsg' => 'onlinestatusbar-desc',
	'url' => 'http://www.mediawiki.org/wiki/Extension:OnlineStatusBar',
);

$dir = dirname( __FILE__ );
$wgExtensionMessagesFiles['OnlineStatusBar'] = "$dir/OnlineStatusBar.i18n.php";

$wgAutoloadClasses['OnlineStatusBar'] = "$dir/OnlineStatusBar.body.php";

// Configuration
// Those values can be overriden in LocalSettings, do not change it here
$wgOnlineStatusBarModes = array(
	'online' => "On-line",
	'busy' => "Busy",
	'away' => "Away",
	'hidden' => "Offline",
	'offline' => "Offline",
);
$wgOnlineStatusBarIcon = array(
	'online' => "statusgreen.png",
	'busy' => "statusorange.png",
	'away' => "statusorange.png",
	'hidden' => "statusred.png",
	'offline' => "statusred.png",
);
$wgOnlineStatusBarColor = array(
	'online' => "green",
	'busy' => "orange",
	'away' => "orange",
	'hidden' => "red",
	'offline' => "red",
);

// default for anonymous and uknown users
$wgOnlineStatusBarDefaultIpUsers = false;
// default for online
$wgOnlineStatusBarDefaultOnline = "online";
// default for offline
$wgOnlineStatusBarDefaultOffline = "offline";
// if users have this feature enabled by default
$wgOnlineStatusBarDefaultEnabled = false;
// how long to wait until user is considered as offline
$wgOnlineStatusBar_LogoutTime = 3600;
// position of status bar
$wgOnlineStatusBarY = "-35";

$wgHooks['LoadExtensionSchemaUpdates'][] = 'wfOnlineStatusBar_CkSchema';
function wfOnlineStatusBar_CkSchema( $updater = null ) {
	if ( $updater != null ) {
		$updater->addExtensionUpdate( array( 'addtable', 'online_status', dirname( __FILE__ ) . '/OnlineStatusBar.sql', true ) );
	} else {
		global $wgExtNewTables;
		$wgExtNewTables[] = array(
			'online_status', dirname( __FILE__ ) . '/OnlineStatusBar.sql' );
	}
	return true;
}

$wgHooks['UserLogoutComplete'][] = 'wfOnlineStatusBar_Logout';
function wfOnlineStatusBar_Logout( &$user, &$inject_html, $old_name ) {
	OnlineStatusBar::DeleteStatus( $old_name );
	return true;
}

$wgHooks['ArticleViewHeader'][] = 'wfOnlineStatusBar_RenderBar';
function wfOnlineStatusBar_RenderBar( &$article, &$outputDone, &$pcache ) {
	global $wgOnlineStatusBar_Template, $messages, $wgOnlineStatusBarModes, $wgOut;
	OnlineStatusBar::UpdateStatus();
	$ns = $article->getTitle()->getNamespace();
	if ( ( $ns == NS_USER_TALK ) || ( $ns == NS_USER ) ) {
		// better way to get a username would be great :)
		$user = $article->getTitle();
		$user = preg_replace( '/\/.*/', '', substr($user, strpos($user, ":") + 1));
		if ( OnlineStatusBar::IsValid( $user ) ) {
			$mode = OnlineStatusBar::GetStatus( $user );
			$modetext = $wgOnlineStatusBarModes[$mode];
			$image = OnlineStatusBar::getImageHtml( $mode );
			$text = wfMessage( 'onlinestatusbar-line', $user )->rawParams( $image )->params( $modetext )->escaped();
			$wgOut->addHtml( OnlineStatusBar::Get_Html( $text, $mode ) );
		}
	}
	return true;
}

$wgHooks['UserLoginComplete'][] = 'wfOnlineStatusBar_UpdateStatus';
function wfOnlineStatusBar_UpdateStatus() {
	OnlineStatusBar::UpdateDb();
	return true;
}

$wgHooks['GetPreferences'][] = 'wfOnlineStatusBar_PreferencesHook';
function wfOnlineStatusBar_PreferencesHook( $user, &$preferences ) {
	global $wgOnlineStatusBarDefaultOnline, $wgOnlineStatusBarDefaultEnabled, $wgOnlineStatusBarModes;
	$preferences['OnlineStatusBar_active'] = array( 'type' => 'toggle', 'label-message' => 'onlinestatusbar-used', 'section' => 'misc/onlinestatus' ); // 'default' => $wgOnlineStatusBarDefaultEnabled );
	$preferences['OnlineStatusBar_status'] = array( 'type' => 'radio', 'label-message' => 'onlinestatusbar-status', 'section' => 'misc/onlinestatus',
		'options' => array(
			$wgOnlineStatusBarModes['online'] => 'online',
			$wgOnlineStatusBarModes['busy'] => 'busy',
			$wgOnlineStatusBarModes['away'] => 'away',
			$wgOnlineStatusBarModes['hidden'] => 'hidden'
		),
		//'default' => 'online',
	);
	return true;
}
