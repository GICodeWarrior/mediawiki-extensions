<?php

class InviteContacts extends SpecialPage {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct( 'InviteContacts' );
	}

	/**
	 * Show the special page
	 *
	 * @param $par Mixed: parameter passed to the page or null
	 */
	public function execute( $par ) {
		global $wgUser, $wgOut, $wgScriptPath, $wgPasswordSender, $wgEmailFrom;
		wfLoadExtensionMessages( 'InviteContacts' );

		/**
		 * Redirect anonymous in users to Login Page
		 * It will automatically return them to the InviteContacts page
		 */
		if( $wgUser->getID() == 0 ) {
			$login = SpecialPage::getTitleFor( 'Userlogin' );
			$wgOut->redirect( $login->getLocalURL( 'returnto=Special:InviteContacts' ) );
			return false;
		}

		// Add CSS
		$wgOut->addExtensionStyle( $wgScriptPath . '/extensions/InviteContacts/css/invite.css' );

		if( count( $_POST ) && $_SESSION['alreadysubmitted'] == false ) {
			$_SESSION['alreadysubmitted'] = true;

			$html_format = 'no'; // IMPORTANT: change this to "yes" ONLY if you are sending HTML format email
			$title = Title::makeTitle( NS_USER, $wgUser->getName() );
			$subject = wfMsg( 'invite-subject', $wgUser->getName() );

			$body = wfMsg( 'invite-body', $_POST['sendersemail'], $wgUser->getName(), $title->getFullURL() );

$message = <<<EOF

$body

EOF;

			if( $wgEmailFrom ) {
				$from = $wgEmailFrom;
			} else {
				$from = $wgPasswordSender;
			}
			$sendersemail = $_POST['sendersemail'];

			$confirm = '';
			$loop = 0;
			foreach( $_POST['list'] as $to ) {
				$loop++;
				$confirm .= '<div class="invite-email-sent">' . $loop . '. ' . $to . '</div>';
				if( $html_format == 'yes' ) {
					UserMailer::send(
						new MailAddress( $to ),
						new MailAddress( $from ),
						$subject,
						$message,
						new MailAddress( $from ),
						'text/html; charset=UTF-8'
					);
				} else {
					UserMailer::send(
						new MailAddress( $to ),
						new MailAddress( $from ),
						$subject,
						$message,
						new MailAddress( $sendersemail )
					);
				}
			}

			$wgOut->setPageTitle( wfMsg( 'invite-sent-page-title' ) );
			$wgOut->addHTML( '<p class="user-message">' . wfMsg( 'invite-emailswentout' ) . ' ' . $confirm . '</p>' );
			$wgOut->addHTML( '<div class="relationship-request-buttons">
				<input type="button" value="' . wfMsg( 'mainpage' ) . '" onclick="window.location=\'' . $wgScriptPath . '/index.php?title=' . wfMsgForContent( 'mainpage' ) . '\'" />' );
			if( class_exists( 'UserProfile' ) ) {
				$wgOut->addHTML( '<input type="button" value="' . wfMsg( 'invite-yourprofile' ) . '" onclick=\"window.location=\'' . Title::makeTitle( NS_USER_PROFILE, $wgUser->getName() )->getLocalURL() . '\'" />' );
			}
			$wgOut->addHTML(
				'<input type="button" value="' . wfMsg( 'invite-youruserpage' ) . '" onclick=\"window.location=\'' . Title::makeTitle( NS_USER, $wgUser->getName() )->getLocalURL() . '\'" />
				</div>'
			);
		} else {
			$_SESSION['alreadysubmitted'] = false;

			$wgOut->addScriptFile( $wgScriptPath . '/extensions/InviteContacts/js/GetContacts.js' );
			$wgOut->addScriptFile( $wgScriptPath . '/extensions/InviteContacts/js/ahah.js' );

			$wgOut->setPageTitle( wfMsg( 'invite-find-friends' ) );

			// Get network to import from
			$get = ( !empty( $GET ) && isset( $_GET['domain'] ) ) ? $_GET['domain'] : '';
			if( empty( $get ) ) {
				$script = 'mygmail.php';
			} else {
				$script = $get . '.php';
			}

			$useCSV = false;
			if( $get == 'myoutlook' || $get == 'myexpress' || $get == 'mythunderbird' ) {
				$useCSV = true;
			}

			$formEnc = '';
			if ( $useCSV ) {
				$formEnc = ' enctype="multipart/form-data" ';
			}

			$wgOut->addHTML( $this->_content( $useCSV, $script, $formEnc ) );
		}
	}

	private function _content( $useCSV, $script, $formEnc ) {
		global $wgServer, $wgLanguageCode, $wgScriptPath, $wgUser;

		$out = '<div class="invite-links">
			<span class="profile-on">
				<a href="' . SpecialPage::getTitleFor( 'InviteContacts' )->escapeFullURL() . '">' . wfMsg( 'invite-find-friends' ) . '</a></span> - <a href="' . SpecialPage::getTitleFor( 'InviteEmail' )->escapeFullURL() . '">' . wfMsg( 'invite-friends' ) . '</a>';

		if ( $wgUser->isLoggedIn() ) {
			if( class_exists( 'UserProfile' ) ) {
				$out .= ' - <a href="' . Title::makeTitle( NS_USER_PROFILE, $wgUser->getName() )->getLocalURL() . '"><strong>' . wfMsg( 'invite-yourprofile' ) . '</strong></a>';
			}
			$out .= ' - <a href="' . Title::makeTitle( NS_USER, $wgUser->getName() )->getLocalURL() . '"><strong>' . wfMsg( 'invite-youruserpage' ) . '</strong></a>';
		}

		$out .= '</div>
		<div class="invite-message">' . wfMsg( 'invite-getcontactsmaintitle' ) . '</div>
		<div id="target">';

		if ( $useCSV != true ) {
			$out .= '<div class="invite-left">
				<div class="invite-icons">
				<img src="' . $wgScriptPath . '/extensions/InviteContacts/images/myyahoo.gif" border="0" alt="Yahoo!" />
				<img src="' . $wgScriptPath . '/extensions/InviteContacts/images/mygmail.gif" border="0" alt="GMail" />
				<img src="' . $wgScriptPath . '/extensions/InviteContacts/images/myhotmail.gif" border="0" alt="Hotmail" />
				<img src="' . $wgScriptPath . '/extensions/InviteContacts/images/myaol.gif" border="0" alt="AOL" />
				</div>
				<div class="invite-form">
				<form name="emailform" action="javascript:submit(\'' . $wgServer . $wgScriptPath . '/extensions/InviteContacts/getmycontacts/' . $script . '\', \'POST\');"' . $formEnc . ' method="post" onsubmit="return getMailAccount(\'' . $wgServer . $wgScriptPath . '\', this.username.value, \'' . $wgLanguageCode . '\');">
					<p class="invite-form-title">' . wfMsg( 'invite-form-email' ) . '</p>
					<p class="invite-form-input"><input type="text" name="username" size="34" /></p>
					<div class="cleared"></div>
					<p class="invite-form-title">' . wfMsg( 'invite-contact-passwd' ) . '</p>
					<p class="invite-form-input"><input type="password" name="password" size="34" /></p>
					<div class="cleared"></div>
					<p><input type="submit" value="' . wfMsg( 'invite-find-friends' ) . '" /></p>
				</form>
				</div>
			</div>';
/*			$out .= '<div class="invite-right">
			<h1>' . wfMsg( 'invite-donthaveemail' ) . '</h1>
			<p align="center">
				<a href="' . SpecialPage::getTitleFor( 'InviteContactsCSV' )->getFullURL() . '"><img src="' . $wgScriptPath . '/extensions/InviteContacts/images/myoutlook.gif" border="0" alt="" /></a>
				<a href="' . SpecialPage::getTitleFor( 'InviteContactsCSV' )->getFullURL() . '"><img src="' . $wgScriptPath . '/extensions/InviteContacts/images/mythunderbird.gif" border="0" alt="" /></a>
			</p>
			<div class="cleared"></div>
			<p align="center"><input type="button" value="' . wfMsg( 'invite-uploadyourcontacts' ) . '" onclick="window.location=\'' . SpecialPage::getTitleFor( 'InviteContactsCSV' )->getFullURL() .'\'" /></p>
			</div>
			<div class="cleared"></div>';*/
		} /*else {
			$out .= '<div class="invite-left">
				<div class="invite-icons">
					<img src="' . $wgScriptPath . '/extensions/InviteContacts/images/myoutlook.gif" border="0" alt="" />
					<img src="' . $wgScriptPath . '/extensions/InviteContacts/images/mythunderbird.gif" border="0" alt="" />
				</div>
				<div class="invite-form">
					<form name="emailform" action="javascript:submit(\'' . $wgServer . '/extensions/InviteContacts/getmycontacts/' . $script . '\', \'POST\');" ' . $formEnc . ' method="post">
					<p>' . wfMsg( 'invite-csvfilelimit' ) . '</p>
					<p class="invite-form-title">' . wfMsg( 'invite-selectcsvfile' ) . '</p>
					<p class="invite-form-input"><input name="ufile" type="file" id="ufile" size="28" /></p>
					<p><input type="submit" value="' . wfMsg( 'invite-uploadyourcontacts' ) . '"></p>
				</div>
			</div>
			<div class="invite-right">
				<h1>' . wfMsg( 'invite-queshavewebmail' ) . '</h1>
				<p class="invite-right-image">
					<a href="' . SpecialPage::getTitleFor( 'InviteContacts' )->getFullURL() . '"><img src="' . $wgScriptPath . '/extensions/InviteContacts/images/myyahoo.gif" border="0" alt="" /></a>
					<a href="' . SpecialPage::getTitleFor( 'InviteContacts' )->getFullURL() . '"><img src="' . $wgScriptPath . '/extensions/InviteContacts/images/mygmail.gif" border="0" alt="" /></a>
				</p>
				<p class="invite-right-image">
					<a href="' . SpecialPage::getTitleFor( 'InviteContacts' )->getFullURL() . '"><img src="' . $wgScriptPath . '/extensions/InviteContacts/images/myhotmail.gif" border="0" alt="" /></a>
					<a href="' . SpecialPage::getTitleFor( 'InviteContacts' )->getFullURL() . '"><img src="' . $wgScriptPath . '/extensions/InviteContacts/images/myaol.gif" border="0" alt="" /></a>
				</p>
				<div class="cleared"></div>
				<p align="center">
					<input type="button" value="' . wfMsg( 'invite-find-friends' ) . '" onclick="window.location=\'' . SpecialPage::getTitleFor( 'InviteContacts' )->getFullURL() . '\'" />
				</p>
			</div>
			<div class="cleared"></div>';
		}*/

		$out .= '</div>';

		return $out;
	}
}