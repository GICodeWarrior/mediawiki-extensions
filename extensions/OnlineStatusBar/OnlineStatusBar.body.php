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
 * @author of magic word Alexandre Emsenhuber
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @link http://www.mediawiki.org/wiki/Extension:OnlineStatusBar Documentation
 */

class OnlineStatusBar {

	public static function Get_Html( $text, $mode ) {
		global $wgOnlineStatusBarColor, $wgOnlineStatusBarY;
		$color = $wgOnlineStatusBarColor[$mode];
		return <<<HTML
<div class="onlinebar metadata topiconstatus" id="status-top">
<div class="statusbaricon">
$text</div></div>
HTML;
	}

	public static function GetImageHtml( $mode ) {
		global $wgExtensionAssetsPath, $wgOnlineStatusBarIcon, $wgOnlineStatusBarModes;
		$icon = "$wgExtensionAssetsPath/OnlineStatusBar/{$wgOnlineStatusBarIcon[$mode]}";
		$modeText = $wgOnlineStatusBarModes[$mode];
		return Html::element( 'img', array( 'src' => $icon ) );
	}

	public static function GetNow() {
		return gmdate( 'Ymdhis', time() );
	}

	public static function GetOwnerFromTitle ( $title )
	{
		if ( $title === null ) {
			return null;
		}
		$username = preg_replace( '/\/.*/', '', $title->getText() );
                $user_object = User::newFromName ( $username );	
		return $user_object;
	}

	public static function UpdateDb() {
		global $wgUser, $wgOnlineStatusBarDefaultOnline;
		if ( OnlineStatusBar::GetStatus( $wgUser->getName() ) != $wgOnlineStatusBarDefaultOnline ) {
			$dbw = wfGetDB( DB_MASTER );
			$row = array(
				'username' => $wgUser->getName(),
				'timestamp' => $dbw->timestamp( wfTimestamp() ), /// fixme
			);
			$dbw->insert( 'online_status', $row, __METHOD__, 'DELAYED' );
		}

		return false;
	}

	public static function UpdateStatus() {
		global $wgUser, $wgOnlineStatusBarDefaultOffline;
		if ( OnlineStatusBar::GetStatus( $wgUser->getName() ) == $wgOnlineStatusBarDefaultOffline ) {
			OnlineStatusBar::UpdateDb();
			return true;
		}
		$dbw = wfGetDB( DB_MASTER );
		$dbw->update(
			'online_status',
			array( 'timestamp' => $dbw->timestamp( wfTimestamp() ) ),
			array( 'username' => $wgUser->getID() ),
			__METHOD__
		);

		return false;

	}

	public static function DeleteOld() {
		global $wgOnlineStatusBar_LogoutTime, $wgDBname;
		$dbw = wfGetDB( DB_MASTER );
		$time = wfTimestamp( TS_UNIX ) - $wgOnlineStatusBar_LogoutTime;
		$time = $dbw->addQuotes( $dbw->timestamp( $time ) - $wgOnlineStatusBar_LogoutTime );
		$dbw->delete( 'online_status', array( "timestamp < $time" ), __METHOD__ );
		return 0;
	}

	public static function IsValid( $id ) {
		global $wgOnlineStatusBarDefaultIpUsers, $wgOnlineStatusBarDefaultEnabled;
		// checks if anon
		if ( User::isIP( $id ) ) {
			return $wgOnlineStatusBarDefaultIpUsers;
		}
		$user = User::newFromName( $id );
		// check if exist
		if ( $user == null ) {
			return false;
		}
		// do we track them
		$value = $user->getOption( "OnlineStatusBar_active" ); 
		if ( $value === null ) {
			return $wgOnlineStatusBarDefaultEnabled;
		}
		if ( $value == true ) {
			return true;
		}
		return false;
	}

	static function GetStatus( $userID ) {
		global $wgOnlineStatusBarModes, $wgOnlineStatusBarDefaultOffline, $wgOnlineStatusBarDefaultOnline, $wgDBname;
		$dbw = wfGetDB( DB_MASTER );
		OnlineStatusBar::DeleteOld();
		$user = User::newFromName( $userID );
		if ( $user == null ) {
			// something is wrong
			return $wgOnlineStatusBarDefaultOffline;
		}
		$result = $dbw->selectField( 'online_status', 'username', array( 'username' => $userID ),
			__METHOD__, array( 'limit 1', 'order by timestamp desc' ) );
		if ( $result ) {
			$status = $user->getOption( "OnlineStatusBar_status" );
			if ( $status === null || $status == "" ) {
				return $wgOnlineStatusBarDefaultOnline;
			} else {
				return $status;
			}
		}

		return $wgOnlineStatusBarDefaultOffline;
	}

	static function DeleteStatus( $userId ) {
		$dbw = wfGetDB( DB_MASTER );
		$dbw->delete( 'online_status', array( 'username' => $userId ), __METHOD__ ); // delete user
		return true;
	}
}
