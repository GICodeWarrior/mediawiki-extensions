<?php
class ConfirmAccount {
	/*
	* Move old stale requests to rejected list. Delete old rejected requests.
	*/
	public static function runAutoMaintenance() {
		global $wgRejectedAccountMaxAge, $wgConfirmAccountFSRepos;

		$dbw = wfGetDB( DB_MASTER );
		# Select all items older than time $cutoff
		$cutoff = $dbw->timestamp( time() - $wgRejectedAccountMaxAge );
		$accountrequests = $dbw->tableName( 'account_requests' );
		$sql = "SELECT acr_storage_key,acr_id FROM $accountrequests WHERE acr_rejected < '{$cutoff}'";
		$res = $dbw->query( $sql );

		$repo = new FSRepo( $wgConfirmAccountFSRepos['accountreqs'] );
		# Clear out any associated attachments and delete those rows
		while( $row = $dbw->fetchObject( $res ) ) {
			$key = $row->acr_storage_key;
			if( $key ) {
				$path = $repo->getZonePath( 'public' ).'/'.
					$key[0].'/'.$key[0].$key[1].'/'.$key[0].$key[1].$key[2].'/'.$key;
				if( $path && file_exists($path) ) {
					unlink($path);
				}
			}
			$dbw->query( "DELETE FROM $accountrequests WHERE acr_id = {$row->acr_id}" );
		}

		# Select all items older than time $cutoff
		global $wgConfirmAccountRejectAge;
		$cutoff = $dbw->timestamp( time() - $wgConfirmAccountRejectAge );
		# Old stale accounts will count as rejected. If the request was held, give it more time.
		$dbw->update( 'account_requests',
			array( 'acr_rejected' => $dbw->timestamp(),
				'acr_user' => 0, // dummy
				'acr_comment' => wfMsgForContent('confirmaccount-autorej'),
				'acr_deleted' => 1 ),
			array( "acr_rejected IS NULL", "acr_registration < '{$cutoff}'", "acr_held < '{$cutoff}'" ),
			__METHOD__ );

		# Clear cache for notice of how many account requests there are
		global $wgMemc;
		$key = wfMemcKey( 'confirmaccount', 'noticecount' );
		$wgMemc->delete( $key );
	}

	/**
	 * Flag a user's email as confirmed in the db
	 *
	 * @param sring $name
	 */
	public function confirmEmail( $name ) {
		global $wgMemc;
		$dbw = wfGetDB( DB_MASTER );
		$dbw->update( 'account_requests',
			array( 'acr_email_authenticated' => $dbw->timestamp() ),
			array( 'acr_name' => $name ),
			__METHOD__ );
		# Clear cache for notice of how many account requests there are
		$key = wfMemcKey( 'confirmaccount', 'noticecount' );
		$wgMemc->delete( $key );
	}

	/**
	 * Generate and store a new e-mail confirmation token, and return
	 * the URL the user can use to confirm.
	 * @param string $token
	 * @return string
	 */
	public function confirmationTokenUrl( $token ) {
		$title = SpecialPage::getTitleFor( 'RequestAccount' );
		return $title->getFullUrl( array(
			'action' => 'confirmemail',
			'wpEmailToken' => $token
		) );
	}

	/**
	 * Generate, store, and return a new e-mail confirmation code.
	 * A hash (unsalted since it's used as a key) is stored.
	 * @param User $user
	 * @param string $expiration
	 * @return string
	 */
	public function getConfirmationToken( $user, &$expiration ) {
		global $wgConfirmAccountRejectAge;
		$expires = time() + $wgConfirmAccountRejectAge;
		$expiration = wfTimestamp( TS_MW, $expires );
		$token = $user->generateToken( $user->getName() . $user->getEmail() . $expires );
		return $token;
	}
}
