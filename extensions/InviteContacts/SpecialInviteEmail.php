<?php

class InviteEmail extends UnlistedSpecialPage {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct( 'InviteEmail' );
	}

	/**
	 * Show the special page
	 *
	 * @param $par Mixed: parameter passed to the page or null
	 */
	public function execute( $par ) {
		global $wgUser, $wgOut, $wgRequest, $wgScriptPath, $wgPasswordSender, $wgEmailFrom;
		wfLoadExtensionMessages( 'InviteContacts' );

		# Check blocks
		if( $wgUser->isBlocked() ) {
			$wgOut->blockedPage();
			return;
		}

		if ( $wgUser->isAnon() ) {
			$skin = $wgUser->getSkin();
			$wgOut->setPageTitle( wfMsg( 'invite-notloggedin' ) );
			$llink = $skin->makeKnownLinkObj( SpecialPage::getTitleFor( 'Userlogin' ), wfMsgHtml( 'loginreqlink' ) );
			$wgOut->addHTML( wfMsgWikiHtml( 'invite-emailanontext', $llink ) );
			return;
		}

		// Add CSS
		$wgOut->addExtensionStyle( $wgScriptPath . '/extensions/InviteContacts/css/invite.css' );

		if( $wgEmailFrom ) {
			$this->from = $wgEmailFrom;
		} else {
			$this->from = $wgPasswordSender;
		}

		if( $wgRequest->wasPosted() && $_SESSION['alreadysubmitted'] == false ) {
			$_SESSION['alreadysubmitted'] = true;
			$message = $wgRequest->getVal( 'body' );
			$subject = $wgRequest->getVal( 'subject' );
			$addresses = explode( ',', $wgRequest->getVal( 'email_to' ) );
			$mailResult = '';
			foreach( $addresses as $address ) {
				$to = trim( $address );
				if ( User::isValidEmailAddr( $to ) ) {
					$mailResult = UserMailer::send(
						new MailAddress( $to ),
						new MailAddress( $this->from ),
						$subject,
						$message,
						new MailAddress( $this->from ),
						'text/html; charset=UTF-8'
					);
				}
			}
			if( class_exists( 'UserEmailTrack' ) ) {
				$mail = new UserEmailTrack( $wgUser->getID(), $wgUser->getName() );
				$mail->track_email(
					$wgRequest->getVal( 'track' ),
					count( $addresses ),
					$wgRequest->getVal( 'page_title' )
				);
			}

			$wgOut->setPageTitle( wfMsg( 'invite-sent' ) );

			$out = '';

			if ( $wgUser->isLoggedIn() ) {
				$out .= '<div class="invite-links">
					<a href="' . $wgUser->getUserPage()->escapeFullURL() . '">' . wfMsg( 'invite-back-to-userpage' ) . '</a>
				</div>';
			}

			$out .= wfMsgExt( 'invite-sent-thanks', 'parsemag' );

			$out .= '<p>
				<input type="button" class="invite-form-button" value="' . wfMsg( 'invite-more-friends' ) .'" onclick="window.location=\'' . SpecialPage::getTitleFor( 'InviteEmail' )->escapeFullURL() . '\'" />
			</p>';

			$wgOut->addHTML( $out );
		} else {
			$_SESSION['alreadysubmitted'] = false;
			$wgOut->addHTML( $this->displayForm() );
		}
	}

	function getInviteEmailContent( $type ) {
		global $wgUser;
		$title = Title::makeTitle( NS_USER, $wgUser->getName() );
		$user_label = $wgUser->getRealName();
		if( !trim( $user_label ) ) {
			$user_label = $wgUser->getName();
		}

		switch( $type ) {
			case 'rate':
				$this->track = 6;
				$rate_title = Title::makeTitle( NS_MAIN, $this->page );
				$email['subject'] = wfMsg(
					'invite-rate-subject',
					$user_label,
					$rate_title->getText()
				);
				$email['body'] = wfMsg(
					'invite-rate-body',
					$user_label,
					$user_label,
					$title->getFullURL(),
					$rate_title->getText(),
					$rate_title->getFullURL()
				);
				break;
			case 'edit':
				$this->track = 5;
				$rate_title = Title::makeTitle( NS_MAIN, $this->page );
				$email['subject'] = wfMsg(
					'invite-edit-subject',
					$user_label,
					$rate_title->getText()
				);
				$email['body'] = wfMsg(
					'invite-edit-body',
					$user_label,
					$user_label,
					$title->getFullURL(),
					$rate_title->getText(),
					$rate_title->getFullURL()
				);
				break;
			case 'view':
				$this->track = 4;
				$rate_title = Title::makeTitle( NS_MAIN, $this->page );
				$email['subject'] = wfMsg(
					'invite-view-subject',
					$user_label,
					$rate_title->getText()
				);
				$email['body'] = wfMsg(
					'invite-view-body',
					$user_label,
					$user_label,
					$title->getFullURL(),
					$rate_title->getText(),
					$rate_title->getFullURL()
				);
				break;
			default:
				$this->track = 3;
				$register = SpecialPage::getTitleFor( 'Userlogin', 'signup' );
				$user_title = Title::makeTitle( NS_USER, $wgUser->getName() );
				$email['subject'] = wfMsgExt( 'invite-subject', 'parsemag', $user_label );

				$email['body'] = wfMsgExt(
					'invite-body',
					'parsemag',
					$user_label,
					$user_label,
					$title->getFullURL(),
					$register->getFullURL( 'from=1&referral=' . urlencode( $user_title->getDBkey() ) )
				);
				break;
		}
		return $email;
	}

	function displayForm() {
		global $wgUser, $wgOut, $wgRequest;

		$wgOut->setPageTitle( wfMsg( 'invite-your-friends' ) );

		$this->email_type = $wgRequest->getVal( 'email_type' );
		$this->page = $wgRequest->getVal( 'page' );

		$email = $this->getInviteEmailContent( $this->email_type );

		$out = '';
		/*
		$out .= "<div class=\"invite-links\">
				<a href=\"index.php?title=Special:InviteContacts\">Find Your Friends</a>
				- <span class=\"profile-on\"><a href=\"index.php?title=Special:InviteEmail\">Invite Your Friends</a></span>
			</div>";
		*/
		//$out .= "<div class=\"invite-links\"><a href=\"index.php?title=Special:InviteContacts\">< Back to Invite</a></div>";

		if( $wgRequest->getVal( 'from' ) == 'register' ) {
			$out .= '<div style="margin-top:10px;">
				<a href="' . $wgUser->getUserPage()->getFullURL() . '" style="font-size:10px;">'
					. wfMsg( 'invite-skip-step' ) .
				'</a>
			</div>';
		}

		$out .= '<p class="invite-message">' . wfMsgExt( 'invite-message', 'parsemag' ) . '</p>
			<form name="email" action="" method="post" style="margin:0px">
			<input type="hidden" value="' . $this->track . '" name="track" />

			<div class="invite-form-enter-email">
				<p class="invite-email-title">' . wfMsg( 'invite-enter-emails' ) . '</p>
				<p class="invite-email-submessage">' . wfMsg( 'invite-comma-separated' ) . '</p>
				<p>
					<textarea name="email_to" id="email_to" rows="15" cols="42"></textarea>
				</p>
			</div>
			<div class="invite-email-content">
				<p class="invite-email-title">' . wfMsg( 'invite-customize-email' ) . '</p>
				<p class="email-field">' . wfMsg( 'invite-customize-subject' ) . '</p>
				<p class="email-field"><input type="text" name="subject" id="subject" value="' . $email['subject'] . '" /></p>
				<p class="email-field">' . wfMsg( 'invite-customize-body' ) . '</p>
				<p class="email-field">
					<textarea name="body" id="body" rows="15" cols="45" wrap="hard">'
						. $email['body'] .
					'</textarea>
				</p>
				<div class="email-buttons">
					<input type="button" class="site-button" onclick="document.email.submit()" value="' . wfMsg( 'invite-customize-send' ) . '" />
				</div>

			</div>
			<div class="cleared"></div>
			<input type="hidden" value="' . $this->page . '" name="page_title" />
		</form>';
		return $out;
	}
}