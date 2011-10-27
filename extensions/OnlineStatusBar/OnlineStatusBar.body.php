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
	
	/**
	 * Returns image
         * @param $mode User
         * @return string
         */
	public static function GetImageHtml( $mode ) {
		global $wgExtensionAssetsPath, $wgOnlineStatusBarIcon, $wgOnlineStatusBarModes;
		$icon = "$wgExtensionAssetsPath/OnlineStatusBar/{$wgOnlineStatusBarIcon[$mode]}";
		$modeText = $wgOnlineStatusBarModes[$mode];
		return Html::element( 'img', array( 'src' => $icon ) );
	}

	/**
         * @param $title Title
         * @return user
         */
	public static function GetOwnerFromTitle ( $title )
	{
		if ( $title === null ) {
			return null;
		}
		$username =  $title->getBaseText();
                $user_object = User::newFromName ( $username );	
		return $user_object;
	}

	/**
         * @return bool
         */
	public static function UpdateDb() {
		global $wgUser, $wgOnlineStatusBarDefaultOnline;
		if ( OnlineStatusBar::GetStatus( $wgUser->getName() ) != $wgOnlineStatusBarDefaultOnline ) {
			$dbw = wfGetDB( DB_MASTER );
			$row = array(
				'username' => $wgUser->getName(),
				'timestamp' => $dbw->timestamp(), 
			);
			$dbw->insert( 'online_status', $row, __METHOD__, 'DELAYED' );
		}
		return false;
	}

	/**
         * @return bool
         */
	public static function UpdateStatus() {
		global $wgUser, $wgOnlineStatusBarDefaultOffline;
		if ( OnlineStatusBar::GetStatus( $wgUser->getName() ) == $wgOnlineStatusBarDefaultOffline ) {
			OnlineStatusBar::UpdateDb();
			return true;
		}
		$dbw = wfGetDB( DB_MASTER );
		$dbw->update(
			'online_status',
			array( 'timestamp' => $dbw->timestamp() ),
			array( 'username' => $wgUser->getID() ),
			__METHOD__
		);

		return false;
	}

	/**
         * @return int
         */
	public static function DeleteOld() {
		global $wgOnlineStatusBar_LogoutTime, $wgDBname;
		$dbw = wfGetDB( DB_MASTER );
		$time = wfTimestamp( TS_UNIX ) - $wgOnlineStatusBar_LogoutTime;
		$time = $dbw->addQuotes( $dbw->timestamp( $time ) - $wgOnlineStatusBar_LogoutTime );
		$dbw->delete( 'online_status', array( "timestamp < $time" ), __METHOD__ );
		return 0;
	}


	/**
         * @param $userName string
         * @return bool
         */
	public static function IsValid( $userName ) {
		global $wgOnlineStatusBarDefaultIpUsers, $wgOnlineStatusBarDefaultEnabled;
		// checks if anon
		if ( User::isIP( $userName ) ) {
			return $wgOnlineStatusBarDefaultIpUsers;
		}
		$user = User::newFromName( $userName );
		// check if exist
		if ( $user == null ) {
			return false;
		}
		// do we track them
		return $user->getOption( "OnlineStatusBar_active", $wgOnlineStatusBarDefaultEnabled ); 
	}

	/**
         * @param $userName string
         * @return string
         */
	static function GetStatus( $userName ) {
		global $wgOnlineStatusBarModes, $wgOnlineStatusBarDefaultOffline, $wgOnlineStatusBarDefaultIpUsers, $wgOnlineStatusBarDefaultOnline, $wgDBname;
		$dbw = wfGetDB( DB_MASTER );
		OnlineStatusBar::DeleteOld();
		$user = User::newFromName( $userName );
		if ( $user == null && User::isIP ( $userName ) != true ) {
			// something is wrong
			return $wgOnlineStatusBarDefaultOffline;
		}
		$result = $dbw->selectField( 'online_status', 'username', array( 'username' => $userName ),
			__METHOD__, array( 'limit 1', 'order by timestamp desc' ) );
		if ( $result && $user != null ) {
			return $user->getOption( "OnlineStatusBar_status", $wgOnlineStatusDefaultOnline );
		} else if ( $result && User::isIP ( $userName ) && $wgOnlineStatusBarDefaultIpUsers ) {
			// user is anon
			return $wgOnlineStatusBarDefaultOnline;	
		}
		return $wgOnlineStatusBarDefaultOffline;
	}

	/**
	 * @param $userName string
         * @return bool
         */
	static function DeleteStatus( $userName ) {
		$dbw = wfGetDB( DB_MASTER );
		$dbw->delete( 'online_status', array( 'username' => $userName ), __METHOD__ ); // delete user
		return true;
	}
}
