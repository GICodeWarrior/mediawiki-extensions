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

	public static function getStatusBarHtml( $text ) {
		return <<<HTML
<div class="onlinestatusbarbody metadata onlinestatusbartop" id="status-top">
<div class="onlinestatusbaricon">
$text</div></div>
HTML;
	}

	/**
	 * Returns image element
	 *
	 * @param $mode String
	 * @return string
	 */
	public static function GetImageHtml( $mode ) {
		global $wgExtensionAssetsPath, $wgOnlineStatusBarIcon;
		$icon = "$wgExtensionAssetsPath/OnlineStatusBar/{$wgOnlineStatusBarIcon[$mode]}";
		return Html::element( 'img', array( 'src' => $icon ) );
	}


	/**
	 * Returns the status and User element
	 *
	 * @param Title $title
	 * @return array|bool Array containing the status and User object
         */
	public static function getAnonFromTitle( Title $title ) {
		global $wgOnlineStatusBarTrackIpUsers;
		// if user is anon and we don't track them stop
		if ( $wgOnlineStatusBarTrackIpUsers == false ) {
			return false;
		}
	
		// checks ns
		if ( $title->getNamespace() != NS_USER && $title->getNamespace() != NS_USER_TALK ) {
			return false;
		}

		// we need to create temporary user object
		$user = User::newFromId( 0 );
		$user->setName( $title->getBaseText() );

		// Check if something wrong didn't happen
		if ( !($user instanceof User) ) {
			return false;
		}

		$status = OnlineStatusBar_StatusCheck::getStatus( $user );

		return array( $status, $user );
	}


	/**
	 * Returns the status and User element
	 *
	 * @param Title $title
	 * @return array|bool Array containing the status and User object
	 */
	public static function getUserInfoFromTitle( Title $title ) {
		if ( $title->getNamespace() != NS_USER && $title->getNamespace() != NS_USER_TALK ) {
			return false;
		}

		$user = User::newFromName( $title->getBaseText() );
		// Invalid user
		if ( !($user instanceof User) ) {
			return false;
		}
		if ( !self::isValid( $user ) ) {
			return false;
		}

		$status = OnlineStatusBar_StatusCheck::getStatus( $user );

		return array( $status, $user );
	}

	/**
	 * Purge page
	 * @return bool
	 *
	 */
	public static function purge( $user_type ) {
		if (  $user_type instanceof User  ) {
			$user = $user_type;
		} else if ( is_string( $user_type ) ){
			$user = User::newFromName( $user_type );
		} else {
			return false;
		}

		// check if something weird didn't happen
		if ( $user instanceof User ) {
			// purge both pages now
			if ( $user->getOption('OnlineStatusBar_active', false) ) {
				if ( $user->getOption('OnlineStatusBar_autoupdate', false) == true ) {
					WikiPage::factory( $user->getUserPage() )->doPurge();
					WikiPage::factory( $user->getTalkPage() )->doPurge();
				}
			}
		}
		return true;
	}


	/**
	 * @return timestamp
	 */
	public static function getTimeoutDate( $delayed = false ) {
		global $wgOnlineStatusBar_WriteTime, $wgOnlineStatusBar_LogoutTime;

		if ($delayed) {
			return wfTimestamp( TS_UNIX ) + $wgOnlineStatusBar_WriteTime;
		}
		
		return wfTimestamp( TS_UNIX ) - $wgOnlineStatusBar_LogoutTime;
	}

	/**
	 * Checks to see if the user can be tracked
	 *
	 * @param User $user
	 * @return bool
	 */
	public static function isValid( User $user ) {
		global $wgOnlineStatusBarTrackIpUsers, $wgOnlineStatusBarDefaultEnabled;

		// checks if anon
		if ( $user->isAnon() ) {
			return $wgOnlineStatusBarTrackIpUsers;
		}

		// do we track them
		return $user->getOption( "OnlineStatusBar_active", $wgOnlineStatusBarDefaultEnabled );
	}
}
