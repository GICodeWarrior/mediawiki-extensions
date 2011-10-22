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
$wgOnlineStatusBarModes = array (
        'online' => "On-line",
        'busy' => "Busy",
        'away' => "Away",
        'hidden' => "Offline",
        'offline' => "Offline",
);

$wgOnlineStatusBarColor = array (
	'online' => "green",
	'busy' => "orange",
	'away' => "orange",
	'hidden' => "red",
	'offline' => "red",
);

$wgOnlineStatusBarDefaultOnline = "online";
$wgOnlineStatusBarDefaultOffline = "offline";
$wgOnlineStatusBarTable = "online_status";
$wgOnlineStatusBarDefaultEnabled = false;
$wgOnlineStatusBar_LogoutTime = 3600;

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
