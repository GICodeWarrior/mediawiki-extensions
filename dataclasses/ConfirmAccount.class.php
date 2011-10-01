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
		foreach( $res as $row ) {
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
	public static function confirmEmail( $name ) {
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
	public static function confirmationTokenUrl( $token ) {
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
	public static function getConfirmationToken( $user, &$expiration ) {
		global $wgConfirmAccountRejectAge;

		$expires = time() + $wgConfirmAccountRejectAge;
		$expiration = wfTimestamp( TS_MW, $expires );
		$token = $user->generateToken( $user->getName() . $user->getEmail() . $expires );
		return $token;
	}

	/**
	 * Generate a new e-mail confirmation token and send a confirmation
	 * mail to the user's given address.
	 *
	 * @param User $user
	 * @param string $ip User IP address
	 * @param string $token
	 * @param string $expiration
	 * @return true|Status True on success, a Status object on failure.
	 */
	public static function sendConfirmationMail( User $user, $ip, $token, $expiration ) {
		global $wgContLang;

		$url = self::confirmationTokenUrl( $token );
		$lang = $user->getOption( 'language' );
		return $user->sendMail(
			wfMessage( 'requestaccount-email-subj' )->inLanguage( $lang )->text(),
			wfMessage( 'requestaccount-email-body',
				$ip,
				$user->getName(),
				$url,
				$wgContLang->timeanddate( $expiration, false ) ,
				$wgContLang->date( $expiration, false ) ,
				$wgContLang->time( $expiration, false )
			)->inLanguage( $lang )->text()
		);
	}

	/**
	 * Get a request name from an email confirmation token
	 *
	 * @param sring $code
	 * @return string|false
	 */
	public function requestNameFromEmailToken( $code ) {
		return wfGetDB( DB_SLAVE )->selectField( 'account_requests',
			'acr_name',
			array(
				'acr_email_token' => md5( $code ),
				'acr_email_token_expires > ' . $dbr->addQuotes( $dbr->timestamp() ),
			)
		);
	}

	/**
	 * Get the number of account requests for a request type
	 * @param $type int
	 * @return Array Assosiative array with 'open', 'held', 'type' keys mapping to integers
	 */
	public static function getOpenRequestCount( $type ) {
		$dbr = wfGetDB( DB_SLAVE );
		$open = (int)$dbr->selectField( 'account_requests', 'COUNT(*)',
			array( 'acr_type' => $type, 'acr_deleted' => 0, 'acr_held IS NULL' ),
			__METHOD__
		);
		$held = (int)$dbr->selectField( 'account_requests', 'COUNT(*)',
			array( 'acr_type' => $type, 'acr_deleted' => 0, 'acr_held IS NOT NULL' ),
			__METHOD__
		);
		$rej = (int)$dbr->selectField( 'account_requests', 'COUNT(*)',
			array( 'acr_type' => $type, 'acr_deleted' => 1, 'acr_user != 0' ),
			__METHOD__
		);
		return array( 'open' => $open, 'held' => $held, 'rejected' => $rej );
	}

	/**
	 * Verifies that it's ok to include the uploaded file
	 *
	 * @param string $tmpfile the full path of the temporary file to verify
	 * @param string $extension The filename extension that the file is to be served with
	 * @return Status object
	 */
	public static function verifyAttachment( $tmpfile, $extension ) {
		global $wgVerifyMimeType, $wgMimeTypeBlacklist;
		# magically determine mime type
		$magic =& MimeMagic::singleton();
		$mime = $magic->guessMimeType( $tmpfile, false );
		# check mime type, if desired
		if ( $wgVerifyMimeType ) {
			wfDebug ( "\n\nmime: <$mime> extension: <$extension>\n\n" );
			# Check mime type against file extension
			if ( !UploadBase::verifyExtension( $mime, $extension ) ) {
				return Status::newFatal( 'uploadcorrupt' );
			}
			# Check mime type blacklist
			if ( isset( $wgMimeTypeBlacklist ) && !is_null( $wgMimeTypeBlacklist )
				&& self::checkFileExtension( $mime, $wgMimeTypeBlacklist ) ) {
				return Status::newFatal( 'filetype-badmime', $mime );
			}
		}
		wfDebug( __METHOD__ . ": all clear; passing.\n" );
		return Status::newGood();
	}

	/**
	 * Perform case-insensitive match against a list of file extensions.
	 * Returns true if the extension is in the list.
	 *
	 * @param string $ext
	 * @param array $list
	 * @return bool
	 */
	protected static function checkFileExtension( $ext, $list ) {
		return in_array( strtolower( $ext ), $list );
	}
}
