<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "ConfirmAccount extension\n";
	exit( 1 );
}

# Add messages
efLoadConfirmAccountsMessages();

class RequestAccountPage extends SpecialPage {
	function __construct() {
		parent::__construct( 'RequestAccount' );
	}

	function execute( $subpage ) {
		global $wgUser, $wgOut, $wgRequest, $action, $wgUseRealNamesOnly;

		if( $wgUser->isBlocked() ) {
			$wgOut->blockedPage();
			return;
		}
		if ( wfReadOnly() ) {
			$wgOut->readOnlyPage();
			return;
		}

		$this->setHeaders();
		# We may only want real names being used
		if( $wgUseRealNamesOnly )
			$this->mUsername =  $wgRequest->getText( 'wpRealName' );
		else
			$this->mUsername = $wgRequest->getText( 'wpUsername' );
		# Grab other info fields...
		$this->mRealName = $wgRequest->getText( 'wpRealName' );
		$this->mEmail = $wgRequest->getText( 'wpEmail' );
		$this->mBio = $wgRequest->getText( 'wpBio' );
		$this->mNotes = $wgRequest->getText( 'wpNotes' );
		$this->mUrls = $wgRequest->getText( 'wpUrls' );
		$this->mCorrect = $wgRequest->getBool('wpCorrect');
		$this->mToS = $wgRequest->getBool('wpToS');
		# We may be confirming an email address here
		$emailCode = $wgRequest->getText( 'wpEmailToken' );

		if ( $wgRequest->wasPosted() && $wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) ) ) {
			$this->doSubmit();
		} else if( $action == 'confirmemail' ) {
			$this->confirmEmailToken( $emailCode );
		} else {
			$this->showForm();
		}
	}

	function showForm( $msg='' ) {
		global $wgOut, $wgUser, $wgTitle, $wgAuth, $wgUseRealNamesOnly;

		$wgOut->setPagetitle( wfMsgHtml( "requestaccount" ) );
		# Output failure message
		if( $msg ) {
			$wgOut->addHTML( '<div class="errorbox">' . $msg . '</div><div class="visualClear"></div>' );
		}
		# Give notice to users that are logged in
		if( $wgUser->getID() ) {
			$wgOut->addWikiText( wfMsgHtml( "requestaccount-dup" ) );
		}

		$wgOut->addWikiText( wfMsgHtml( "requestacount-text" ) );

		$action = $wgTitle->escapeLocalUrl( 'action=submit' );
		$form = "<form name='accountrequest' action='$action' method='post'><fieldset>";
		$form .= '<legend>' . wfMsgHtml('requestacount-legend1') . '</legend>';
		$form .= "<p>".wfMsgExt( 'requestacount-acc-text', array('parse') )."</p>\n";
		$form .= '<table cellpadding=\'4\'>';
		if( $wgUseRealNamesOnly ) {
			$form .= "<tr><td>".wfMsgHtml('username')."</td>";
			$form .= "<td>".wfMsgHtml('requestaccount-same')."</td></tr>\n";
		} else {
			$form .= "<tr><td>".Xml::label( wfMsgHtml('username'), 'wpUsername' )."</td>";
			$form .= "<td>".Xml::input( 'wpUsername', 30, $this->mUsername, array('id' => 'wpUsername') )."</td></tr>\n";
		}
		$form .= "<tr><td>".Xml::label( wfMsgHtml('requestaccount-email'), 'wpEmail' )."</td>";
		$form .= "<td>".Xml::input( 'wpEmail', 30, $this->mEmail, array('id' => 'wpEmail') )."</td></tr>\n";
		$form .= '</table></fieldset>';

		$form .= '<fieldset>';
		$form .= '<legend>' . wfMsgHtml('requestacount-legend2') . '</legend>';
		$form .= "<p>".wfMsgExt( 'requestaccount-bio-text', array('parse') )."</p>\n";
		$form .= '<table cellpadding=\'4\'>';
		$form .= "<tr><td>".Xml::label( wfMsgHtml('requestaccount-real'), 'wpRealName' )."</td>";
		$form .= "<td>".Xml::input( 'wpRealName', 35, $this->mRealName, array('id' => 'wpRealName') )."</td></tr>\n";
		$form .= '</table cellpadding=\'4\'>';
		$form .= "<p>".wfMsgHtml('requestaccount-bio')."</p>";
		$form .= "<p><textarea tabindex='1' name='wpBio' id='wpBio' rows='10' cols='80' style='width:100%'>" .
			$this->mBio .
			"</textarea></p>";
		$form .= '</fieldset>';

		$form .= '<fieldset>';
		$form .= '<legend>' . wfMsgHtml('requestacount-legend3') . '</legend>';
		$form .= "<p>".wfMsgExt( 'requestacount-ext-text', array('parse') )."</p>\n";

		$form .= "<p>".wfMsgHtml('requestaccount-notes')."</p>\n";
		$form .= "<p><textarea tabindex='1' name='wpNotes' id='wpNotes' rows='3' cols='80' style='width:100%'>" .
			$this->mNotes .
			"</textarea></p>";
		$form .= "<p>".wfMsgHtml('requestaccount-urls')."</p>\n";
		$form .= "<p><textarea tabindex='1' name='wpUrls' id='wpUrls' rows='2' cols='80' style='width:100%'>" .
			$this->mUrls .
			"</textarea></p>";
		$form .= '</fieldset>';

		# Pseudo template for extensions
		global $wgCaptcha;
		if( isset($wgCaptcha) ) {
			$template = new UsercreateTemplate();
			$template->set( 'header', '' );
			# Hook point to add captchas
			$wgCaptcha->injectUserCreate( $template );
			if( $template->data['header'] ) {
				$form .= '<fieldset>';
				$form .= $template->data['header'];
				$form .= '</fieldset>';
			}
		}
		$form .= "<p>".Xml::checkLabel( wfMsgExt( 'requestaccount-correct', 
			array('parseinline') ), 'wpCorrect', 'wpCorrect', $this->mCorrect )."</p>\n";
		$form .= "<p>".Xml::checkLabel( wfMsgExt( 'requestaccount-tos', 
			array('parseinline') ), 'wpToS', 'wpToS', $this->mToS )."</p>\n";
		$form .= Xml::hidden( 'title', $wgTitle->getPrefixedText() )."\n";
		$form .= Xml::hidden( 'wpEditToken', $wgUser->editToken() )."\n";
		$form .= "<p>".Xml::submitButton( wfMsgHtml( 'requestacount-submit') ) . "</p></fieldset>";
		$form .=  '</form>';

		$wgOut->addHTML( $form );
	}

	function doSubmit() {
		global $wgOut, $wgUser, $wgAuth, $wgAccountRequestThrottle, $wgMemc;

		# Now create a dummy user ($u) and check if it is valid
		$name = trim( $this->mUsername );
		$u = User::newFromName( $name, 'creatable' );	
		if( is_null( $u ) ) {
			$this->showForm( wfMsgHtml('noname') );
			return;
		}
		# Check if already in use
		if( 0 != $u->idForName() || $wgAuth->userExists( $u->getName() ) ) {
			$this->showForm( wfMsgHtml('userexists') );
			return;
		}
		# Check pending accounts for name use
		$dbw = wfGetDB( DB_MASTER );
		$dup = $dbw->selectField( 'account_requests', '1',
			array( 'acr_name' => $u->getName() ),
			__METHOD__ );
		if( $dup ) {
			$this->showForm( wfMsgHtml('requestaccount-inuse') );
			return;
		}
		# Make sure user agrees to policy here
		if( !$this->mCorrect || !$this->mToS ) {
			$this->showForm( wfMsgHtml('requestaccount-agree') );
			return;
		}
		# Validate email address
		if( !$u->isValidEmailAddr( $this->mEmail ) ) {
			$this->showForm( wfMsgHtml('invalidemailaddress') );
			return;
		}
		global $wgAccountRequestMinWords;
		# Check if biography is long enough
		if( str_word_count($this->mBio) < $wgAccountRequestMinWords ) {
			$this->showForm( wfMsgHtml('requestaccount-tooshort',$wgAccountRequestMinWords) );
			return;
		}
		# Set some additional data so the AbortNewAccount hook can be
		# used for more than just username validation
		$u->setEmail( $this->mEmail );
		$u->setRealName( $this->mRealName );
		# Let captchas confirm
		global $wgCaptcha;
		if( isset($wgCaptcha) ) {
			$abortError = '';
			$wgCaptcha->confirmUserCreate( $u, &$abortError );
			if( $abortError ) {
				$this->showForm( $abortError );
				return false;
			}
		}
		# Insert into pending requests...
		$dbw->begin();
		$dbw->insert( 'account_requests', 
			array(
				'acr_name' => $u->mName,
				'acr_email' => $u->mEmail,
				'acr_real_name' => $u->mRealName,
				'acr_registration' => wfTimestampNow(),
				'acr_bio' => $this->mBio,
				'acr_notes' => $this->mNotes,
				'acr_urls' => $this->mUrls,
				'acr_ip' => wfGetIP() // Possible use for spam blocking
			),
			__METHOD__ 
		);
		# Send confirmation, required!
		$result = $this->sendConfirmationMail( $u );
		if( WikiError::isError( $result ) ) {
			$error = wfMsg( 'mailerror', htmlspecialchars( $result->getMessage() ) );
			$this->showForm( $error );
			$dbw->rollback(); // Nevermind
			return false;
		}
		$dbw->commit();
		# Now request spamming.
		# BC: check if isPingLimitable() exists
		if( $wgAccountRequestThrottle && ( !method_exists($u,'isPingLimitable') || $wgUser->isPingLimitable() ) ) {
			$key = wfMemcKey( 'acctrequest', 'ip', wfGetIP() );
			$value = $wgMemc->incr( $key );
			if( !$value ) {
				$wgMemc->set( $key, 1, 86400 );
			}
			if( $value > $wgAccountRequestThrottle ) {
				$this->throttleHit( $wgAccountRequestThrottle );
				return false;
			}
		}
		# Done!
		$this->showSuccess();
	}

	function showSuccess() {
		global $wgOut;

		$wgOut->setPagetitle( wfMsg( "requestaccount" ) );
		$wgOut->addWikiText( wfMsg( "requestaccount-sent" ) );

		$wgOut->returnToMain();
	}
	
	/**
	 * @private
	 */
	function throttleHit( $limit ) {
		global $wgOut;

		$wgOut->addWikiText( wfMsgHtml( 'acct_request_throttle_hit', $limit ) );
	}
	
	function confirmEmailToken( $code ) {
		global $wgUser, $wgOut;
		# Confirm if this token is in the pending requests
		$name = $this->requestFromEmailToken( $code );
		if( $name !== false ) {
			$this->confirmEmail( $name );
			$wgOut->addWikiText( wfMsgHtml( 'request-account-econf' ) );
			$wgOut->returnToMain();
			return;
		}
		# Maybe the user confirmed after account was created...
		$user = User::newFromConfirmationCode( $code );
		if( is_object( $user ) ) {
			if( $user->confirmEmail() ) {
				$message = $wgUser->isLoggedIn() ? 'confirmemail_loggedin' : 'confirmemail_success';
				$wgOut->addWikiText( wfMsg( $message ) );
				if( !$wgUser->isLoggedIn() ) {
					$title = SpecialPage::getTitleFor( 'Userlogin' );
					$wgOut->returnToMain( true, $title->getPrefixedText() );
				}
			} else {
				$wgOut->addWikiText( wfMsg( 'confirmemail_error' ) );
			}
		} else {
			$wgOut->addWikiText( wfMsg( 'confirmemail_invalid' ) );
		}
	}
	
	/**
	 * Get a request name from an emailconfirm token
	 *
	 * @param sring $code
	 * @returns string $name
	 */		
	function requestFromEmailToken( $code ) {	
		$dbr = wfGetDB( DB_SLAVE );
		$reqID = $dbr->selectField( 'account_requests', 'acr_name', 
			array( 'acr_email_token' => md5( $code ),
				'acr_email_token_expires > ' . $dbr->addQuotes( $dbr->timestamp() ),
			) 
		);
		return $reqID;
	}
	
	/**
	 * Flag a user's email as confirmed in the db
	 *
	 * @param Sring $name
	 */	
	function confirmEmail( $name ) {
		$dbw = wfGetDB( DB_MASTER );
		$dbw->update( 'account_requests', 
			array( 'acr_email_authenticated' => wfTimestampNow() ),
			array( 'acr_name' => $name ),
			__METHOD__ );
	}
	
	/**
	 * Generate a new e-mail confirmation token and send a confirmation
	 * mail to the user's given address.
	 *
	 * @param User $user
	 * @return mixed True on success, a WikiError object on failure.
	 */
	function sendConfirmationMail( $user ) {
		global $wgContLang;
		$expiration = null; // gets passed-by-ref and defined in next line.
		$url = $this->confirmationTokenUrl( $user, $expiration );
		return $user->sendMail( wfMsg( 'requestaccount-email-subj' ),
			wfMsg( 'requestaccount-email-body',
				wfGetIP(),
				$user->getName(),
				$url,
				$wgContLang->timeanddate( $expiration, false ) ) );
	}	
	
	/**
	 * Generate and store a new e-mail confirmation token, and return
	 * the URL the user can use to confirm.
	 * @param User $user
	 * @return string
	 * @private
	 */
	function confirmationTokenUrl( $user, &$expiration ) {
		$token = $this->confirmationToken( $user, $expiration );
		$title = Title::makeTitle( NS_SPECIAL, 'RequestAccount' );
		return $title->getFullUrl( 'action=confirmemail&wpEmailToken='.$token );
	}
	
	/**
	 * Generate, store, and return a new e-mail confirmation code.
	 * A hash (unsalted since it's used as a key) is stored.
	 * @param User $user
	 * @return string
	 * @private
	 */
	function confirmationToken( $user, &$expiration ) {
		$now = time();
		$expires = $now + 7 * 24 * 60 * 60;
		$expiration = wfTimestamp( TS_MW, $expires );

		$token = $user->generateToken( $user->getName() . $user->getEmail() . $expires );
		$hash = md5( $token );

		$dbw = wfGetDB( DB_MASTER );
		$dbw->update( 'account_requests',
			array( 'acr_email_token'         => $hash,
			       'acr_email_token_expires' => $dbw->timestamp( $expires ) ),
			array( 'acr_name'                => $user->getName() ),
			__METHOD__ );

		return $token;
	}
	
}

class ConfirmAccountsPage extends SpecialPage
{

    function __construct() {
        SpecialPage::SpecialPage('ConfirmAccounts','confirmaccount');
    }

    function execute( $par ) {
        global $wgRequest, $wgOut, $wgUser;
        
		if( !$wgUser->isAllowed( 'confirmaccount' ) ) {
			$wgOut->permissionRequired( 'confirmaccount' );
			return;
		}

		$this->setHeaders();
		# A target user
		$this->acrID = $wgRequest->getIntOrNull( 'acrid' );
		# For renaming to alot for collisions with other local requests
		# that were added to some global $wgAuth system first.
		$this->mUsername = $wgRequest->getText( 'wpNewName' );
		# For viewing rejects
		$this->showRejects = $wgRequest->getBool( 'wpShowRejects' );
		
		$this->submitType = $wgRequest->getVal( 'wpSubmitType' );
		$this->reason = $wgRequest->getText( 'wpReason' );

		$this->skin = $wgUser->getSkin();

		if ( $wgRequest->wasPosted() && $wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) ) ) {
			$this->doSubmit();
		} else if( $this->acrID ) {
			$this->showForm();
		} else {
			$this->showList();
		}
	}
	
	function doSubmit() {
		global $wgOut, $wgTitle, $wgAuth;

		$row = $this->getRequest();
		if( !$row ) {
			$wgOut->addHTML( wfMsgHtml('confirmaccount-badid') );
			$wgOut->returnToMain( true, $wgTitle );
			return;
		}

		if( $this->submitType == 'reject' ) {
			global $wgSaveRejectedAccountReqs;
			# Make proxy user to email a rejection message :(
			$u = User::newFromName( $row->acr_name, 'creatable' );
			$u->setEmail( $row->acr_email );
			# Do not send multiple times
			if( !$row->acr_rejected ) {
				if( $this->reason ) {
					$result = $u->sendMail( wfMsg( 'confirmaccount-email-subj' ),
						wfMsgExt( 'confirmaccount-email-body4', array('parseinline'), $u->getName(), $this->reason ) );
				} else {
					$result = $u->sendMail( wfMsg( 'confirmaccount-email-subj' ),
						wfMsgExt( 'confirmaccount-email-body3', array('parseinline'), $u->getName() ) );
				}
				if( WikiError::isError( $result ) ) {
					$error = wfMsg( 'mailerror', htmlspecialchars( $result->getMessage() ) );
					$this->showForm( $error );
					return false;
				}
			}
			$dbw = wfGetDB( DB_MASTER );
			# Either mark off the row as deleted or wipe it completely
			if( $wgSaveRejectedAccountReqs ) {
				global $wgUser;
				# Request can later be recovered
				$dbw->update( 'account_requests', 
					array( 'acr_rejected' => 1, 'acr_user' => $wgUser->getID() ), 
					array( 'acr_id' => $this->acrID, 'acr_rejected' => 0 ), 
					__METHOD__ );
			} else {
				$dbw->delete( 'account_requests', array('acr_id' => $this->acrID), __METHOD__ );
			}

			$this->showSuccess( $action );
		} else if( $this->submitType == 'accept' ) {
			global $wgMakeUserPageFromBio;
			# Check if the name is to be overridden
			$name = $this->mUsername ? trim($this->mUsername) : $row->acr_name;
			# Now create user and check if the name is valid
			$user = User::newFromName( $name, 'creatable' );	
			if( is_null( $user ) ) {
				$this->showForm( wfMsgHtml('noname') );
				return;
			}
			# Check if already in use
			if( 0 != $user->idForName() || $wgAuth->userExists( $user->getName() ) ) {
				$this->showForm( wfMsgHtml('userexists') );
				return;
			}
			$user = User::createNew( $name );
			# Make a random password
			$p = User::randomPassword();
			# VERY important to set email now. Otherwise user will have to request
			# a new password at the login screen...
			$user->setEmail( $row->acr_email );
			if( $this->reason ) {
				$result = $user->sendMail( wfMsg( 'confirmaccount-email-subj' ),
					wfMsgExt( 'confirmaccount-email-body2', array('parseinline'), $user->getName(), $p, $this->reason ) );
			} else {
				$result = $user->sendMail( wfMsg( 'confirmaccount-email-subj' ),
					wfMsgExt( 'confirmaccount-email-body', array('parseinline'), $user->getName(), $p ) );
			}
			if( WikiError::isError( $result ) ) {
				$error = wfMsg( 'mailerror', htmlspecialchars( $result->getMessage() ) );
				$this->showForm( $error );
				return false;
			}
			if( !$wgAuth->addUser( $user, $p, $row->acr_email, $row->acr_real_name ) ) {
				$this->showForm( wfMsgHtml( 'externaldberror' ) );
				return false;
			}
			# Set password and realname
			$user->setPassword( $p );
			$user->setRealName( $row->acr_real_name );
			$user->saveSettings(); // Save this into the DB
			# Check if the user already confirmed email address
			$dbw = wfGetDB( DB_MASTER );
			$dbw->update( 'user', 
				array( 'user_email_authenticated' => $row->acr_email_authenticated,
					'user_email_token_expires' => $row->acr_email_token_expires,
					'user_email_token' => $row->acr_email_token ),
				array( 'user_id' => $user->getID() ),
				__METHOD__ );
			# OK, now remove the request
			$dbw->delete( 'account_requests', array('acr_id' => $this->acrID), __METHOD__ );

			wfRunHooks( 'AddNewAccount', array( $user ) );
			# Start up the user's brand new userpage
			if( $wgMakeUserPageFromBio ) {
				$userpage = new Article( $user->getUserPage() );
				$userpage->doEdit( $row->acr_bio, wfMsg('confirmaccount-summary'), EDIT_MINOR );
			}

			$this->showSuccess( $action, $user->getName() );
		} else {
			$this->showForm();
		}
	}
	
	function showForm( $msg='' ) {
		global $wgOut, $wgTitle, $wgUser;
		
		# Output failure message
		if( $msg ) {
			$wgOut->addHTML( '<div class="errorbox">' . $msg . '</div><div class="visualClear"></div>' );
		}
		
		$row = $this->getRequest();
		if( !$row || $row->acr_rejected && !$this->showRejects ) {
			$wgOut->addHTML( wfMsgHtml('confirmaccount-badid') );
			$wgOut->returnToMain( true, $wgTitle );
			return;
		}
		
		$listLink = $this->skin->makeKnownLinkObj( $wgTitle, wfMsgHtml( 'confirmaccount-back' ) );
		if( $this->showRejects ) {
			$listLink .= ' / '.$this->skin->makeKnownLinkObj( $wgTitle, wfMsgHtml( 'confirmaccount-back2' ),
				wfArrayToCGI( array('wpShowRejects' => 1 ) ) );
		}
		$wgOut->setSubtitle( '<p>'.$listLink.'</p>' );
		
		$wgOut->addWikiText( wfMsg( "confirmacount-text" ) );
		
		$action = $wgTitle->escapeLocalUrl( 'action=submit' );
		$form = "<form name='accountconfirm' action='$action' method='post'><fieldset>";
		$form .= '<legend>' . wfMsgHtml('requestacount-legend1') . '</legend>';
		$form .= '<table cellpadding=\'4\'>';
		$form .= "<tr><td>".Xml::label( wfMsgHtml('username'), 'wpNewName' )."</td>";
		$form .= "<td>".Xml::input( 'wpNewName', 30, $row->acr_name, array('id' => 'wpNewName') )."</td></tr>\n";
		
		$econf = $row->acr_email_authenticated ? ' <strong>'.wfMsgHtml('confirmaccount-econf').'</strong>' : '';
		$form .= "<tr><td>".wfMsgHtml('requestaccount-email')."</td>";
		$form .= "<td>".htmlspecialchars($row->acr_email).$econf."</td></tr>\n";
		$form .= '</table></fieldset>';
		
		$form .= '<fieldset>';
		$form .= '<legend>' . wfMsgHtml('requestacount-legend2') . '</legend>';
		$form .= '<table cellpadding=\'4\'>';
		$form .= "<tr><td>".wfMsgHtml('requestaccount-real')."</td>";
		$form .= "<td>".htmlspecialchars($row->acr_real_name)."</td></tr>\n";
		$form .= '</table cellpadding=\'4\'>';
		$form .= "<p>".wfMsgHtml('requestaccount-bio')."</p>";
		$form .= "<p><textarea tabindex='1' readonly name='wpBio' id='wpBio' rows='10' cols='80' style='width:100%'>" .
			$row->acr_bio .
			"</textarea></p>";
		$form .= '</fieldset>';
		
		$form .= '<fieldset>';
		$form .= '<legend>' . wfMsgHtml('requestacount-legend3') . '</legend>';
		$form .= "<p>".wfMsgHtml('requestaccount-notes')."</p>\n";
		$form .= "<p><textarea tabindex='1' readonly name='wpNotes' id='wpNotes' rows='3' cols='80' style='width:100%'>" .
			htmlspecialchars($row->acr_notes) .
			"</textarea></p>";
		$form .= "<p>".wfMsgHtml('confirmaccount-urls')."</p>\n";
		$form .= "<p>".$this->parseLinks($row->acr_urls)."</p>";
		$form .= '</fieldset>';
		
		$form .= "<p>".wfMsgExt( 'confirmacount-confirm', array('parse') )."</p>\n";
		$form .= "<p>".Xml::radio( 'wpSubmitType', 'accept', $this->submitType=='accept', array('id' => 'submitCreate') );
		$form .= ' '.Xml::label( wfMsg('confirmacount-create'), 'submitCreate' )."</p>\n";
		$form .= "<p>".Xml::radio( 'wpSubmitType', 'reject', $this->submitType=='reject', array('id' => 'submitDeny') );
		$form .= ' '.Xml::label( wfMsg('confirmacount-deny'), 'submitDeny' )."</p>\n";

		$form .= "<p>".wfMsgHtml('requestaccount-reason')."</p>\n";
		$form .= "<p><textarea tabindex='1' name='wpReason' id='wpReason' rows='3' cols='80' style='width:80%'>" .
			htmlspecialchars($this->reason) .
			"</textarea></p>";
		$form .= "<p>".Xml::submitButton( wfMsgHtml( 'confirmacount-submit') )."</p>\n";
		
		$form .= Xml::hidden( 'title', $wgTitle->getPrefixedText() )."\n";
		$form .= Xml::hidden( 'action', 'reject' );
		$form .= Xml::hidden( 'acrid', $row->acr_id );
		$form .= Xml::hidden( 'wpEditToken', $wgUser->editToken() )."\n";
		$form .=  '</form>';
		
		$wgOut->addHTML( $form );
	}
	
	/**
	 * Extract a list of all recognized HTTP links in the text.
	 * @param string $text
	 * @return string $linkList, list of clickable links
	 */
	function parseLinks( $text ) {
		global $wgParser, $wgTitle, $wgUser;

		$linkList = '';
		$lines = explode( "\n", htmlspecialchars($text) );
		foreach( $lines as $line ) {
			$links = explode("\n",$line);
			$link = $links[0];
			if( strpos($link,'.') )
				$linkList .= "<li><a href='$link'>$link</a></li>\n";
		}
		if( $linkList == '' ) {
			$linkList = wfMsgHtml( 'confirmaccount-nourls' );
		} else {
			$linkList = "<ul>$linkList</ul>";
		}

		return $linkList;
	}
	
	function getRequest() {
		if( !$this->acrID )
			return false;

		$dbw = wfGetDB( DB_SLAVE );
		$row = $dbw->selectRow( 'account_requests', '*', array('acr_id' => $this->acrID ), __METHOD__ );

		return $row;
	}
	
	function showSuccess( $action, $name = NULL ) {
		global $wgOut, $wgTitle;

		$wgOut->setPagetitle( wfMsg( "requestaccount" ) );
		if( $this->submitType == 'accept' )
			$wgOut->addWikiText( wfMsg( "confirmaccount-acc", $name ) );
		else if( $this->submitType == 'reject' )
			$wgOut->addWikiText( wfMsg( "confirmaccount-rej" ) );
		
		$wgOut->returnToMain( true, $wgTitle );
	}

	function showList() {
		global $wgOut, $wgUser, $wgTitle, $wgLang, $wgSaveRejectedAccountReqs;
		
		if( $this->showRejects ) {
			$listLink = $this->skin->makeKnownLinkObj( $wgTitle, wfMsgHtml( 'confirmaccount-back' ) );
		} else if( $wgSaveRejectedAccountReqs ) {
			$listLink = $this->skin->makeKnownLinkObj( $wgTitle, wfMsgHtml( 'confirmaccount-back2' ),
				wfArrayToCGI( array('wpShowRejects' => 1 ) ) );
		}
		$wgOut->setSubtitle( '<p>'.$listLink.'</p>' );

		if( $wgSaveRejectedAccountReqs ) {
			# Every 100th view, prune old deleted items
			wfSeedRandom();
			if( 0 == mt_rand( 0, 99 ) ) {
				global $wgRejectedAccountMaxAge;

				$dbw = wfGetDB( DB_MASTER );
				$cutoff = $dbw->timestamp( time() - $wgRejectedAccountMaxAge );
				$accountrequests = $dbw->tableName( 'account_requests' );
				$sql = "DELETE FROM $accountrequests WHERE acr_rejected = 1 AND acr_registration < '{$cutoff}'";
				$dbw->query( $sql );
			}
		}

		$pager = new ConfirmAccountsPager( $this, array(), $this->showRejects );	
		if ( $pager->getNumRows() ) {
			if( $this->showRejects )
				$wgOut->addHTML( wfMsgExt('confirmacount-list2', array('parse') ) );
			else
				$wgOut->addHTML( wfMsgExt('confirmacount-list', array('parse') ) );
			$wgOut->addHTML( $pager->getNavigationBar() );
			$wgOut->addHTML( "<ul>" . $pager->getBody() . "</ul>" );
			$wgOut->addHTML( $pager->getNavigationBar() );
		} else {
			if( $this->showRejects )
				$wgOut->addHTML( wfMsgExt('confirmacount-none2', array('parse')) );
			else
				$wgOut->addHTML( wfMsgExt('confirmacount-none', array('parse')) );
		}
	}
	
	function formatRow( $row ) {
		global $wgLang, $wgUser;

		$title = SpecialPage::getTitleFor( 'ConfirmAccounts' );
		if( $this->showRejects ) {
			$link = $this->skin->makeKnownLinkObj( $title, wfMsgHtml('confirmaccount-review'), 
				'acrid='.$row->acr_id.'&wpShowRejects=1' );
		} else {
			$link = $this->skin->makeKnownLinkObj( $title, wfMsgHtml('confirmaccount-review'), 'acrid='.$row->acr_id );
		}
		$time = $wgLang->timeanddate( wfTimestamp(TS_MW, $row->acr_registration), true );
		
		$r = '<li>';
		$r .= $time." ($link)";
		if( $this->showRejects )
			$r .= ' <strong>'.wfMsgExt( 'confirmaccount-reject', array('parseinline'), $row->user_name ).'</strong>';
		$r .= '<br/><table cellspacing=\'1\' cellpadding=\'3\' border=\'1\' width=\'100%\'>';
		$r .= '<tr><td><strong>'.wfMsgHtml('confirmaccount-name').'</strong></td><td width=\'100%\'>' .
			htmlspecialchars($row->acr_name) . '</td></tr>';
		$r .= '<tr><td><strong>'.wfMsgHtml('confirmaccount-real').'</strong></td><td width=\'100%\'>' .
			htmlspecialchars($row->acr_real_name) . '</td></tr>';
		$econf = $row->acr_email_authenticated ? ' <strong>'.wfMsg('confirmaccount-econf').'</strong>' : '';
		$r .= '<tr><td><strong>'.wfMsgHtml('confirmaccount-email').'</strong></td><td width=\'100%\'>' .
			htmlspecialchars($row->acr_email) . $econf.'</td></tr>';
		# Truncate this, blah blah...
		$bio = htmlspecialchars($row->acr_bio);
		$preview = $wgLang->truncate( $bio, 400 );
		if( strlen($preview) < strlen($bio) ) {
			$preview = substr( $preview, 0, strrpos($preview,' ') );
			$preview .= " . . .";
		}
		$r .= '<tr><td><strong>'.wfMsgHtml('confirmaccount-bio').'</strong></td><td width=\'100%\'><i>'.$preview.'</i></td></tr>';
		$r .= '</table></li>';
		
		return $r;
	}
}

/**
 * Query to list out stable versions for a page
 */
class ConfirmAccountsPager extends ReverseChronologicalPager {
	public $mForm, $mConds;

	function __construct( $form, $conds = array(), $rejects=0 ) {
		$this->mForm = $form;
		$this->mConds = $conds;
		$this->mConds['acr_rejected'] = $rejects;
		$this->rejects = $rejects;
		parent::__construct();
	}
	
	function formatRow( $row ) {
		$block = new Block;
		return $this->mForm->formatRow( $row );
	}

	function getQueryInfo() {
		$conds = $this->mConds;
		$tables = array('account_requests');
		$fields = array('acr_id','acr_name','acr_real_name','acr_registration',
			'acr_email','acr_email_authenticated','acr_bio','acr_notes','acr_urls');
		if( $this->rejects ) {
			$tables[] = 'user';
			$conds[] = 'acr_user = user_id';
			$fields[] = 'user_name';
		}
		return array(
			'tables' => $tables,
			'fields' => $fields,
			'conds' => $conds
		);
	}

	function getIndexField() {
		return 'acr_registration';
	}
}
