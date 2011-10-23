<?
if ( !defined( 'MEDIAWIKI' ) ) {
	echo "This is a part of mediawiki and can't be started separately";
	die();
}

/**
 * Main file of Online status bar extension.
 *
 * @file
 * @ingroup Extensions
 * @author Petr Bena <benapetr@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @link http://www.mediawiki.org/wiki/Extension:OnlineStatusBar Documentation
 */

class OnlineStatusBar {
	private static function GetNow()
	{
		return gmdate('Ymdhis', time());
	}
	
	public static function Get_Html( $text, $mode)
	{
		global $wgOnlineStatusBarModes, $wgOnlineStatusBarIcon, $wgOnlineStatusBarColor, $wgOnlineStatusBarY;
		$icon = "$wgExtensionAssetsPath/OnlineStatusBar/{$wgOnlineStatusBarModes[$mode]}";
		$color = $wgOnlineStatusBarColor[$mode];
		return '<div style="right:0px; margin-top:-10px;" class="metadata topicon" id="status-top"><div style="border: 0px solid black; background: transparent; float: right; position: relative; top:' . $wgOnlineStatusBarY . 'px; padding: 5px"><p><b>' . $text . ': <span style="color: ' . $color . '; font:bold;"><img alt=' . $text . " - " . $mode  .' src="' . $wgOnlineStatusBarIcon[$mode] .  '" width="20" height="20" />' . $icon . '</span></b></p></div></div>';
	}

	static function UpdateDb()
	{
		global $wgUser, $wgDBname, $wgOnlineStatusBarTable;
		if ( OnlineStatusBar::GetStatus($wgUser->getID()) != $OnlineStatusBar->DefaultOnline )
		{
			$dbw = wfGetDB( DB_MASTER );
			$now = OnlineStatusBar::GetNow();
			$row = array(
				'userid' => $wgUser->getID(),
				'username' => $wgUser->getName(),
				'timestamp' => $now,
			);
			$dbw->insert( $wgOnlineStatusBarTable, $row, __METHOD__, 'DELAYED' );
		}
	
		return false;
	}

	static function UpdateStatus()
	{
		global $wgUser, $wgDBname, $wgOnlineStatusBarDefaultOffline, $wgOnlineStatusBarTable;
		$now = OnlineStatusBar::GetNow();
		if (OnlineStatusBar::GetStatus() == $wgOnlineStatusBarDefaultOffline)
		{
			OnlineStatusBar::UpdateDb();	
			return true;
		}
		$dbw = wfGetDB ( DB_MASTER );
		$dbw->update($wgOnlineStatusBarTable, array ('timestamp' => $now), array ('username' => $wgUser->getName()), __METHOD__ );

		return false;
	
	}
	
	public static function DeleteOld()
	{
		global $wgOnlineStatusBarTable, $wgOnlineStatusBar_LogoutTime, $wgDBname;
		$dbw= wfGetDB ( DB_MASTER );
		$time = OnlineStatusBar::GetNow() - $wgOnlineStatusBar_LogoutTime;
		$dbw->delete( $wgOnlineStatusBarTable,   array( 'timestamp < "' . $time . '"' ) ,__METHOD__ );
		return 0;
	}

	static function GetStatus( $userID ) {
		global $wgOnlineStatusBarTable, $wgOnlineStatusBarModes, $wgOnlineStatusBarDefaultOffline, $wgOnlineStatusBarDefaultOnline, $wgDBname;
		$dbw= wfGetDB ( DB_MASTER );
		OnlineStatusBar::DeleteOld();
		$result = $dbw->select( $wgOnlineStatusBarTable, array ('userid', 'username', 'timestamp'), array('username' => $userID), __METHOD__, array('limit 1', 'order by timestamp desc')); 
		$values = new ResultWrapper ($dbw, $result);

		if ($values->numRows() > 0)
		{
			return $wgOnlineStatusBarDefaultOnline;
		}
		
		return $wgOnlineStatusBarDefaultOffline;
	}
	
	static function DeleteStatus( $user )
	{
		global $wgOnlineStatusBarTable, $wgDBname;
		$dbw= wfGetDB ( DB_MASTER );
		$dbw->delete( $wgOnlineStatusBarTable, array ('username' => $user), __METHOD__ ); // delete user
		return true;
	}	
}
