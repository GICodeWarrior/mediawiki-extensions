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

$wgExtensionCredits[version_compare($wgVersion, '1.17', '>=') ? 'userpage tools' : 'other'][] = array(
	'path' => __FILE__,
	'name' => 'Online status bar',
	'version' => '1.0.0',
	'author' => array( 'Petr Bena' ),
	'descriptionmsg' => 'onlinestatusbar-desc',
	'url' => 'http://www.mediawiki.org/wiki/Extension:OnlineStatusBar',
);

$dir = dirname( __FILE__ );
$wgExtensionMessagesFiles['OnlineStatusBar'] =  "$dir/OnlineStatusBar.i18n.php";

$wgAutoloadClasses['OnlineStatusBar'] = "$dir/OnlineStatusBar.body.php";

// Configuration
// Those values can be overriden in LocalSettings, do not change it here
$wgOnlineStatusBarModes = array (
        'online' => "On-line",
        'busy' => "Busy",
        'away' => "Away",
        'hidden' => "Offline",
        'offline' => "Offline",
);
$wgOnlineStatusBarIcon = array (
	'online' =>  OnlineStatusBar::GetFileUrl( "/20px-Ledgreen.svg.png" ),
	'busy' =>  OnlineStatusBar::GetFileUrl( "/20px-Ledorange.svg.png" ),
	'away' => OnlineStatusBar::GetFileUrl( "/20px-Ledorange.svg.png" ),
	'hidden' =>  OnlineStatusBar::GetFileUrl( "/20px-Nuvola_apps_krec.svg.png"),
	'offline' => OnlineStatusBar::GetFileUrl( "/20px-Nuvola_apps_krec.svg.png"),
);
$wgOnlineStatusBarColor = array (
	'online' => "green",
	'busy' => "orange",
	'away' => "orange",
	'hidden' => "red",
	'offline' => "red",
);

//default for online
$wgOnlineStatusBarDefaultOnline = "online";
//default for offline
$wgOnlineStatusBarDefaultOffline = "offline";
//name of table in db
$wgOnlineStatusBarTable = "online_status";
//if new users have this feature enabled by default (experimental)
$wgOnlineStatusBarDefaultEnabled = false;
//how long to wait until user is considered as offline
$wgOnlineStatusBar_LogoutTime = 3600;
//position of status bar
$wgOnlineStatusBarY = "-35";

$wgHooks['LoadExtensionSchemaUpdates'][] = 'wfOnlineStatusBar_CkSchema';

        function wfOnlineStatusBar_CkSchema($updater = null)
        {
	global $wgOnlineStatusBarTable;
                if ($updater != null)
                {
                        $updater->addExtensionUpdate( array ( 'addtable', $wgOnlineStatusBarTable, dirname( __FILE__) . '/OnlineStatusBar.sql', true));
                }
                else
                {
                        global $wgExtNewTables;
                        $wgExtNewTables[] = array(
                        $wgOnlineStatusBarTable, dirname( __FILE__ ) . '/OnlineStatusBar.sql' );
                }
                return true;
        }

$wgHooks['UserLogoutComplete'][] = 'wfOnlineStatusBar_Logout';

	function wfOnlineStatusBar_Logout(&$user, &$inject_html, $old_name)
	{
		global $wgUser;
		OnlineStatusBar::DeleteStatus($old_name);
		return true;
	}

$wgHooks['ArticleViewHeader'][] = 'wfOnlineStatusBar_RenderBar';
	function wfOnlineStatusBar_RenderBar(&$article, &$outputDone, &$pcache)
	{
		global $wgOnlineStatusBar_Template, $messages, $wgOnlineStatusBarModes, $wgOut;
		OnlineStatusBar::UpdateStatus();
		$ns=$article->getTitle()->getNamespace();
		if(($ns == "3") || ($ns == "2"))
		{
			// better way to get a username would be great :)
			$user = preg_replace('/\/.*/', '', preg_replace('/^.*\:/', "", $article->getTitle()));
			$OnlineStatus_Text = $user . language::getMessageFromDB("onlinestatusbar-line");
			$OnlineStatus_Mode = OnlineStatusBar::GetStatus($user);
			$wgOut->addHtml(OnlineStatusBar::Get_Html($OnlineStatus_Text, $OnlineStatus_Mode));
		}
		return true;
	}

$wgHooks['UserLoginComplete'][] = 'wfOnlineStatusBar_UpdateStatus';

        function wfOnlineStatusBar_UpdateStatus()
        {
		OnlineStatusBar::UpdateDb();
                return 0;
        }


$commonModuleInfo = array(
	'localBasePath' => dirname( __FILE__ ) . '/modules',
	'remoteExtPath' => 'OnlineStatusBar/modules',
);

?>
