<?php

$wgExtensionCredits['specialpage'][] = array(
        'name' => 'MergeAccount',
        'author' => 'Brion Vibber',
        'url' => 'http://meta.wikimedia.org/wiki/H:UL',
        'description' => 'Merges multiple accounts for Single User Login',
);

class SpecialMergeAccount extends SpecialPage {
	
	function __construct() {
		parent::__construct( 'MergeAccount', 'MergeAccount' );
	}

	function execute( $subpage ) {
		global $wgOut, $wgRequest, $wgUser;
		$this->setHeaders();
		
		if( !$wgUser->isLoggedIn() ) {
			$wgOut->addWikiText(
				wfMsg( 'centralauth-merge-notlogged' ) .
				"\n\n" .
				wfMsg( 'centralauth-readmore-text' ) );
			
			return;
		}
		
		global $wgUser, $wgRequest;
		$this->mUserName = $wgUser->getName();
		
		$this->mAttemptMerge = $wgRequest->wasPosted();

		$this->mMergeAction = $wgRequest->getVal( 'wpMergeAction' );
		$this->mPassword = $wgRequest->getVal( 'wpPassword' );
		$this->mDatabases = $wgRequest->getArray( 'wpWikis' );
		$this->mSessionToken = $wgRequest->getVal( 'wpMergeSessionToken' );
		$this->mSessionKey = pack( "H*", $wgRequest->getVal( 'wpMergeSessionKey' ) );
		
		// Possible demo states
		
		// success, all accounts merged
		// successful login, some accounts merged, others left
		// successful login, others left
		// not account owner, others left
		
		// is owner / is not owner
		// did / did not merge some accounts
		// do / don't have more accounts to merge
		
		if( $this->mAttemptMerge ) {
			switch( $this->mMergeAction ) {
			case "dryrun":
				return $this->doDryRunMerge();
			case "initial":
				return $this->doInitialMerge();
			case "cleanup":
				return $this->doCleanupMerge();
			case "remove":
				return $this->doUnattach();
			default:
				return $this->invalidAction();
			}
		}
		
		$globalUser = new CentralAuthUser( $this->mUserName );
		if( $globalUser->exists() ) {
			$this->showCleanupForm();
		} else {
			$this->showWelcomeForm();
		}
	}
	
	/**
	 * To pass potentially multiple passwords from one form submission
	 * to another while previewing the merge behavior, we can store them
	 * in the server-side session information.
	 *
	 * We'd rather not have plaintext passwords floating about on disk
	 * or memcached, so the session store is obfuscated with simple XOR
	 * encryption. The key is passed in the form instead of the session
	 * data, so they won't be found floating in the same place.
	 */
	private function initSession() {
		global $wgUser;
		$this->mSessionToken = $wgUser->generateToken();
		
		// Generate a random binary string
		$key = '';
		for( $i = 0; $i < 128; $i++ ) {
			$key .= chr( mt_rand( 0, 255 ) );
		}
		$this->mSessionKey = $key;
	}
	
	private function getWorkingPasswords() {
		wfSuppressWarnings();
		$passwords = unserialize(
			gzinflate(
				$this->xorString(
					$_SESSION['wsCentralAuthMigration'][$this->mSessionToken],
					$this->mSessionKey ) ) );
				wfRestoreWarnings();
		if( is_array( $passwords ) ) {
			return $passwords;
		}
		return array();
	}
	
	private function addWorkingPassword( $password ) {
		$passwords = $this->getWorkingPasswords();
		if( !in_array( $password, $passwords ) ) {
			$passwords[] = $password;
		}
		
		// Lightly obfuscate the passwords while we're storing them,
		// just to make us feel better about them floating around.
		$_SESSION['wsCentralAuthMigration'][$this->mSessionToken] =
			$this->xorString(
				gzdeflate(
					serialize(
						$passwords ) ),
				$this->mSessionKey );
	}
	
	private function clearWorkingPasswords() {
		unset( $_SESSION['wsCentralAuthMigration'][$this->mSessionToken] );
	}
	
	function xorString( $text, $key ) {
		if( $key != '' ) {
			for( $i = 0; $i < strlen( $text ); $i++ ) {
				$text[$i] = chr(0xff & (ord($text[$i]) ^ ord($key[$i % strlen( $key )])));
			}
		}
		return $text;
	}
	
	
	
	function doDryRunMerge() {
		global $wgUser, $wgRequest, $wgOut, $wgDBname;
		$globalUser = new CentralAuthUser( $wgUser->getName() );
		
		if( $globalUser->exists() ) {
			throw new MWException( "Already exists -- race condition" );
		}
		
		$password = $wgRequest->getVal( 'wpPassword' );
		if( $password != '' ) {
			$this->addWorkingPassword( $password );
		}
		$passwords = $this->getWorkingPasswords();
		
		$home = false;
		$attached = array();
		$unattached = array();
		$ok = $globalUser->migrationDryRun( $passwords, $home, $attached, $unattached );
		
		if( $ok ) {
			// This is the global account or matched it
			if( count( $unattached ) == 0 ) {
				// Everything matched -- very convenient!
				$wgOut->addWikiText(
					"All existing accounts can be automatically unified!\n" .
					"\n" .
					"No changes have been made to your accounts yet."
					 );
			} else {
				$wgOut->addWikiText(
					"You're set to continue, but some accounts could not be automatically verified and won't be migrated immediately. " .
					"You will be able to merge these later.\n" .
					"\n" .
					"No changes have been made to your accounts yet."
					 );
			}
			
			if( count( $unattached ) > 0 ) {
				$wgOut->addHtml( $this->step2PasswordForm( $unattached ) );
				$wgOut->addWikiText( "'''or'''" );
			}
			
			$subAttached = array_diff( $attached, array( $home ) );
			$wgOut->addHtml( $this->step3ActionForm( $home, $subAttached ) );
			
		} elseif( $home ) {
			$wgOut->addWikiText( "The migration system couldn't confirm that you're the owner of the home wiki account for your username." .
			 	"\n\n" .
				"Another wiki was determined as the home account for your username; follow the link below and log in there to finish your account migration.");
			$out = '<h2>Automatically selected home wiki</h2>';
			$out .= '<p>The password and e-mail address set at this wiki will be used for your unified account, ' .
				'and your user page here will be automatically linked to from other wikis. ' .
				'You can change the link later.</p>';
			$out .= $this->listAttached( array( $home ) );
			$wgOut->addHtml( $out );
		} else {
			// Didn't get your own password right? Laaaame!
			$this->initSession();
			$wgOut->addHtml(
				'<div class="errorbox">' .
					wfMsg( 'wrongpassword' ) .
				'</div>' .
				$this->step1PasswordForm() );
		}
	}
	
	function doInitialMerge() {
		global $wgUser, $wgRequest, $wgOut, $wgDBname;
		$globalUser = new CentralAuthUser( $wgUser->getName() );
		
		if( $globalUser->exists() ) {
			throw new MWException( "Already exists -- race condition" );
		}
		
		$passwords = $this->getWorkingPasswords();
		if( empty( $passwords ) ) {
			throw new MWException( "Submission error -- invalid input" );
		}
		
		$home = false;
		$attached = array();
		$unattached = array();
		$ok = $globalUser->storeAndMigrate( $passwords );
		$this->clearWorkingPasswords();
		
		if( $ok ) {
			$wgOut->setPageTitle( wfMsg( 'centralauth-complete' ) );
			//$wgOut->addWikiText( wfMsg( 'centralauth-complete-text' ) );
		} else {
			$wgOut->setPageTitle( wfMsg( 'centralauth-incomplete' ) );
			//$wgOut->addWikiText( wfMsg( 'centralauth-incomplete-text' ) );
		}
		$this->showCleanupForm();
	}
	
	function doCleanupMerge() {
		global $wgUser, $wgRequest, $wgOut, $wgDBname;
		$globalUser = new CentralAuthUser( $wgUser->getName() );
		
		if( !$globalUser->exists() ) {
			throw new MWException( "User doesn't exist -- race condition?" );
		}
		
		$password = $wgRequest->getText( 'wpPassword' );
		
		$home = false;
		$attached = array();
		$unattached = array();
		$ok = $globalUser->attemptPasswordMigration( $password, $attached, $unattached );
		$this->clearWorkingPasswords();
		
		if( $ok ) {
			$wgOut->setPageTitle( wfMsg( 'centralauth-complete' ) );
			$wgOut->addWikiText( wfMsg( 'centralauth-complete-text' ) );
		} else {
			if( empty( $attached ) ) {
				$wgOut->addWikiText( "Couldn't confirm any -- bad pass" );
			} else {
				$wgOut->addWikiText( "Did some but incomplete still." );
			}
		}
		$this->showCleanupForm();
	}
	
	private function showWelcomeForm() {
		global $wgOut, $wgUser;
		$wgOut->addWikiText(
			wfMsg( 'centralauth-merge-welcome' ) .
			"\n\n" .
			wfMsg( 'centralauth-readmore-text' ) );
		
		$this->initSession();
		$wgOut->addHtml(
			$this->passwordForm(
				'dryrun',
				wfMsg( 'centralauth-merge-step1-title' ),
				wfMsg( 'centralauth-merge-step1-detail' ),
				wfMsg( 'centralauth-merge-step1-submit' ) )
			);
	}
	
	function showCleanupForm() {
		global $wgUser;
		$globalUser = new CentralAuthUser( $wgUser->getName() );
		
		$merged = $globalUser->listAttached();
		$remainder = $globalUser->listUnattached();
		$this->showStatus( $merged, $remainder );
	}
	
	function showStatus( $merged, $remainder ) {
		global $wgOut;
		
		if( count( $remainder ) > 0 ) {
			$wgOut->setPageTitle( wfMsg( 'centralauth-incomplete' ) );
			$wgOut->addWikiText( wfMsg( 'centralauth-incomplete-text' ) );
		} else {
			$wgOut->setPageTitle( wfMsg( 'centralauth-complete' ) );
			$wgOut->addWikiText( wfMsg( 'centralauth-complete-text' ) );
		}
		$wgOut->addWikiText( wfMsg( 'centralauth-readmore-text' ) );
		
		if( $merged ) {
			$wgOut->addHtml( '<hr />' );
			$wgOut->addWikiText( wfMsg( 'centralauth-list-attached',
				$this->mUserName ) );
			$wgOut->addHtml( $this->listAttached( $merged ) );
		}
		
		if( $remainder ) {
			$wgOut->addHtml( '<hr />' );
			$wgOut->addWikiText( wfMsg( 'centralauth-list-unattached',
				$this->mUserName ) );
			$wgOut->addHtml( $this->listUnattached( $remainder ) );
			
			// Try the password form!
			$wgOut->addHtml( $this->passwordForm(
				'cleanup',
				wfMsg( 'centralauth-finish-title' ),
				wfMsgExt( 'centralauth-finish-text', array( 'parse' ) ),
				wfMsg( 'centralauth-finish-login' ) ) );
		}
	}
	
	function listAttached( $dblist ) {
		return $this->listForm( $dblist, 'unmerge', wfMsg( 'centralauth-admin-unmerge' ) );
	}
	
	function listUnattached( $dblist ) {
		return $this->listForm( $dblist, 'admin', wfMsg( 'centralauth-admin-merge' ) );
	}
	
	function listForm( $dblist  /* Params not used: , $action, $buttonText */ ) {
		$list = $this->listWikis( $dblist );
		
		return $list;
	}
	
	function listWikis( $list ) {
		asort( $list );
		return $this->formatList( $list, array( $this, 'listWikiItem' ) );
	}
	
	function formatList( $items, $callback ) {
		if( empty( $items ) ) {
			return '';
		} else {
			return "<ul>\n<li>" .
				implode( "</li>\n<li>",
					array_map( $callback, $items ) ) .
				"</li>\n</ul>\n";
		}
	}
	
	function listWikiItem( $dbname ) {
		return
			$this->foreignUserLink( $dbname );
	}
	
	function foreignUserLink( $dbname ) {
		$wiki = WikiMap::byDatabase( $dbname );
		if( !$wiki ) {
			throw new MWException( "no wiki for $dbname" );
		}
		
		$hostname = $wiki->getDisplayName();
		$userPageName = 'User:' . $this->mUserName;
		$url = $wiki->getUrl( $userPageName );
		return wfElement( 'a',
			array(
				'href' => $url,
				'title' => wfMsg( 'centralauth-foreign-link',
					$this->mUserName,
					$hostname ),
			),
			$hostname );
	}
	
	private function actionForm( $action, $title, $text ) {
		global $wgUser;
		return
			'<div id="userloginForm">' .
			Xml::openElement( 'form',
				array(
					'method' => 'post',
					'action' => $this->getTitle()->getLocalUrl( 'action=submit' ) ) ) .
			Xml::element( 'h2', array(), $title ) .
			Xml::hidden( 'wpEditToken', $wgUser->editToken() ) .
			Xml::hidden( 'wpMergeAction', $action ) .
			Xml::hidden( 'wpMergeSessionToken', $this->mSessionToken ) .
			Xml::hidden( 'wpMergeSessionKey', bin2hex( $this->mSessionKey ) ) .
			
			$text .
			
			Xml::closeElement( 'form' ) .
			
			'<br clear="all" />' .
			
			'</div>';
	}
		
	private function passwordForm( $action, $title, $text, $submit ) {
		return $this->actionForm(
			$action,
			$title,
			$text .
				'<table>' .
					'<tr>' .
						'<td>' .
							Xml::label(
								wfMsg( 'centralauth-finish-password' ),
								'wpPassword1' ) .
						'</td>' .
						'<td>' .
							Xml::input( 
								'wpPassword', 20, '',
									array(
										'type' => 'password',
										'id' => 'wpPassword1' ) ) .
						'</td>' .
					'</tr>' .
					'<tr>' .
						'<td></td>' .
						'<td>' .
							Xml::submitButton( $submit,
								array( 'name' => 'wpLogin' ) ) .
						'</td>' .
					'</tr>' .
				'</table>' );
	}
	
	private function step1PasswordForm() {
		return $this->passwordForm(
			'dryrun',
			wfMsg( 'centralauth-merge-step1-title' ),
			wfMsg( 'centralauth-merge-step1-detail' ),
			wfMsg( 'centralauth-merge-step1-submit' ) );
	}
	
	private function step2PasswordForm( $unattached ) {
		global $wgUser;
		return $this->passwordForm(
			'dryrun',
			wfMsg( 'centralauth-merge-step2-title' ),
			wfMsgExt( 'centralauth-merge-step2-detail', 'parse', $wgUser->getName() ) .
				$this->listUnattached( $unattached ),
			wfMsg( 'centralauth-merge-step2-submit' ) );
	}
	
	private function step3ActionForm( $home, $attached ) {
		global $wgUser;
		return $this->actionForm(
			'initial',
			wfMsg( 'centralauth-merge-step3-title' ),
			wfMsgExt( 'centralauth-merge-step3-detail', 'parse', $wgUser->getName() ) .
				'<h3>' . wfMsgHtml( 'centralauth-list-home-title' ) . '</h3>' .
				wfMsgExt( 'centralauth-list-home-dryrun', 'parse' ) .
				$this->listAttached( array( $home ) ) .
				( count( $attached )
					? ( '<h3>' . wfMsgHtml( 'centralauth-list-attached-title' ) . '</h3>' .
						wfMsgExt( 'centralauth-list-attached-dryrun', 'parse', $wgUser->getName() ) )
					: '' ) .
				$this->listAttached( $attached ) .
				'<p>' .
					Xml::submitButton( wfMsg( 'centralauth-merge-step3-submit' ),
						array( 'name' => 'wpLogin' ) ) .
				'</p>'
			);
	}
	
}


