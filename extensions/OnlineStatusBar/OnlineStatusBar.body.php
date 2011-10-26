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

	public static function Get_Html( $text, $mode )
	{
		global $wgOnlineStatusBarColor, $wgOnlineStatusBarY;
		$color = $wgOnlineStatusBarColor[$mode];
		return <<<HTML
<div style="right:0px; margin-top:-10px;" class="metadata topicon" id="status-top">
<div style="border: 0px solid black; background: transparent; float: right; position: relative; top: {$wgOnlineStatusBarY}px; padding: 5px">
$text</div></div>
HTML;
	}
	public static function GetImageHtml( $mode ) {
		global $wgExtensionAssetsPath, $wgOnlineStatusBarIcon, $wgOnlineStatusBarModes;
		$icon = "$wgExtensionAssetsPath/OnlineStatusBar/{$wgOnlineStatusBarIcon[$mode]}";
		$modeText = $wgOnlineStatusBarModes[$mode];
		return Html::element( 'img', array( 'src' => $icon ) );
	}
	
	static function GetNow()
	{
		return gmdate( 'Ymdhis', time() );
	}

	static function UpdateDb()
	{
		global $wgUser, $wgOnlineStatusBarDefaultOnline;
		if ( OnlineStatusBar::GetStatus( $wgUser->getName() ) != $wgOnlineStatusBarDefaultOnline )
		{
			$dbw = wfGetDB( DB_MASTER );
			$row = array(
				'username' => strtolower($wgUser->getName()),
				'timestamp' => $dbw->timestamp( wfTimestamp() ),
			);
			$dbw->insert( 'online_status', $row, __METHOD__, 'DELAYED' );
		}

		return false;
	}

	static function UpdateStatus()
	{
		global $wgUser, $wgOnlineStatusBarDefaultOffline;
		if ( OnlineStatusBar::GetStatus( $wgUser->getName() ) == $wgOnlineStatusBarDefaultOffline )
		{
			OnlineStatusBar::UpdateDb();
			return true;
		}
		$dbw = wfGetDB( DB_MASTER );
		$dbw->update(
			'online_status',
			array( 'timestamp' => $dbw->timestamp( wfTimestamp() ) ),
			array( 'username' => strtolower($wgUser->getID()) ),
			__METHOD__
		);

		return false;

	}

	public static function DeleteOld()
	{
		global $wgOnlineStatusBar_LogoutTime, $wgDBname;
		$dbw = wfGetDB( DB_MASTER );
		$time = wfTimestamp( TS_UNIX ) - $wgOnlineStatusBar_LogoutTime;
		$time = $dbw->addQuotes( $dbw->timestamp( $time ) - $wgOnlineStatusBar_LogoutTime );
		$dbw->delete( 'online_status', array( "timestamp < $time" ) , __METHOD__ );
		return 0;
	}

	public static function IsValid($id)
	{
		global $wgOnlineStatusBarDefaultIpUsers;
		// checks if anon
		if (User::isIP($id))
		{
			return $wgOnlineStatusBarDefaultIpUsers;
		}
		$user = User::newFromName($id);
		// check if exist
	        if ($user == null)
		{
			return false;
		} 
		// do we track them
		if ($user->getOption("OnlineStatusBar_active") == true)
		{
			return true;		
		}
		return false;
	}

	static function GetStatus( $userID ) {
		global $wgOnlineStatusBarModes, $wgOnlineStatusBarDefaultOffline, $wgOnlineStatusBarDefaultOnline, $wgDBname;
		$dbw = wfGetDB( DB_MASTER );
		OnlineStatusBar::DeleteOld();
		$result = $dbw->selectField( 'online_status', 'username', array( 'username' => strtolower($userID) ), __METHOD__, array( 'limit 1', 'order by timestamp desc' ) );
		if ( $result )
		{
			return $wgOnlineStatusBarDefaultOnline;
		}

		return $wgOnlineStatusBarDefaultOffline;
	}

	static function DeleteStatus( $userId )
	{
		$dbw = wfGetDB ( DB_MASTER );
		$dbw->delete( 'online_status', array( 'username' => $userId ), __METHOD__ ); // delete user
		return true;
	}
}
