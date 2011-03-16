<?php

function mb_fgetcsv( $file, $delim = ',', $removeQuotes = true ) {
	$line = trim( fgets( $file ), "\r\n" );
	$fields = array();
	$fldCount = 0;
	$inQuotes = false;

	for( $i = 0; $i < mb_strlen( $line ); $i++ ) {
		if( !isset( $fields[$fldCount] ) ) {
			$fields[$fldCount] = '';
		}
		$tmp = mb_substr( $line, $i, mb_strlen( $delim ) );
		if( $tmp === $delim && !$inQuotes ) {
			$fldCount++;
			$i+= mb_strlen( $delim ) - 1;
		} elseif( $fields[$fldCount] == '' && mb_substr( $line, $i, 1 ) == '"' && !$inQuotes ) {
			if( !$removeQuotes ) {
				$fields[$fldCount] .= mb_substr( $line, $i, 1 );
			}
			$inQuotes = true;
		} elseif( mb_substr( $line, $i, 1 ) == '"' ) {
			if( mb_substr( $line, $i + 1, 1 ) == '"' ) {
				$i++;
				$fields[$fldCount] .= mb_substr( $line, $i, 1 );
			} else {
				if( !$removeQuotes ) {
					$fields[$fldCount] .= mb_substr( $line, $i, 1 );
				}
				$inQuotes = false;
			}
		} else {
			$fields[$fldCount] .= mb_substr( $line, $i, 1 );
		}
	}
	return $fields;
}

class InviteContactsCSV extends UnlistedSpecialPage {

	const FILE_SIZE = 20000;

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct( 'InviteContactsCSV' );
	}

	/**
	 * Show the special page
	 *
	 * @param $par Mixed: parameter passed to the page or null
	 */
	public function execute( $par ) {
		global $wgUser, $wgOut, $wgRequest, $wgScriptPath, $wgPasswordSender, $wgEmailFrom;
		wfLoadExtensionMessages( 'InviteContacts' );

		/**
		 * Redirect Non-logged in users to Login Page
		 * It will automatically return them to the InviteContactsCSV page
		 */
		if( $wgUser->getID() == 0 ){
			$login = SpecialPage::getTitleFor( 'Userlogin' );
			$wgOut->redirect( $login->getLocalURL( 'returnto=Special:InviteContactsCSV' ) );
			return false;
		}

		// Add CSS & JS
		$wgOut->addExtensionStyle( $wgScriptPath . '/extensions/InviteContacts/css/invite.css' );
		$wgOut->addScriptFile( $wgScriptPath . '/extensions/InviteContacts/js/GetContacts.js' );
		$wgOut->addScriptFile( $wgScriptPath . '/extensions/InviteContacts/js/ahah.js' );

		$this->domain = $wgRequest->getVal( 'domain' );

		if ( count( $_POST ) ) {
			// Uploaded .csv file
			if( $_POST['upload_csv'] == 1 ) {

				$wgOut->setPageTitle( wfMsg( 'invite-friends' ) );

				$output = '<div class="invite-links">
					<span>
						<a href="' . $wgScriptPath . '/index.php?title=Special:InviteContactsCSV">' . wfMsg( 'invite-find-friends' ) . '</a>
					</span> - <a href="' . SpecialPage::getTitleFor( 'InviteEmail' ) . '">' . wfMsg( 'invite-friends' ) . '</a>';

				if ( $wgUser->isLoggedIn() ) {
					if( class_exists( 'UserProfile' ) ) {
						$output .= ' - <a href="' . Title::makeTitle( NS_USER_PROFILE, $wgUser->getName() )->getLocalURL() . '"><strong>' . wfMsg( 'invite-yourprofile' ) . '</strong></a>';
					}
					$output .= ' - <a href="' . Title::makeTitle( NS_USER, $wgUser->getName() )->getLocalURL() . '"><strong>' . wfMsg( 'invite-youruserpage' ) . '</strong></a>';
				}

				$output .= '</div>';

				$output .= '<form id="form_id" name="myform" method="post" action="">
				<input type="hidden" name="sendersemail" value="' . $_POST['sendersemail'] . '" />';
				$output .= '<div class="invite-message">' . wfMsg( 'invite-getcontactsmaintitle' ) . '.</div>
				<h1>' . wfMsg( 'invite-yourcontacts' ) . '</h1>
				<p class="contacts-message">
					<span class="profile-on">' . wfMsg( 'invite-sharefriends' ) . '</span>
				</p>
				<p class="contacts-message">
					<input type="submit" value="' . wfMsg( 'invite-friends' ) . '" name="B1" /> <a href="javascript:toggleChecked()">' . wfMsg( 'invite-uncheckallbtn' ) . '</a>
				</p>
				<div class="contacts-title-row">
					<p class="contacts-checkbox"></p>
					<p class="contacts-title">'
						. wfMsg( 'invite-friendsname' ) .
					'</p>
					<p class="contacts-title">'
						. wfMsg( 'invite-emailaddr' ) .
					'</p>
					<div class="cleared"></div>
				</div>
				<div class="contacts">';

				if( $wgRequest->getFileSize( 'ufile' ) > self::FILE_SIZE ) {
					$wgOut->addHTML( '<div class="upload-csv-error">' . wfMsg( 'invite-uploadfiletoolarge' ) . '</div>' );
					$wgOut->addHTML( $this->displayForm() );
				}

				// Opening .csv file for processing
				$fp = fopen( $wgRequest->getFileTempname( 'ufile' ), 'r' );
				while( !feof( $fp ) ) {
					//$data = fgetcsv( $fp, 0, ',' ); // this uses the fgetcsv function to store the quote info in the array $data
					/* multibyte characters patch till php's fgetcsv handles them correctly */
					$data = mb_fgetcsv( $fp, ',' );

					switch( $wgRequest->getVal( 'email_client' ) ) {
						case 'outlook':
							$dataname = $data[1];
							if( !empty( $dataname ) && $data[3] ) {
								$dataname = $data[1] . ' ' . $data[3];
							}
							if( empty( $dataname ) ) {
								$dataname = $data[3];
							}
							$email = $data[57];
							break;
						case 'outlook_express':
							$email = $data[1];
							$dataname = $data[0];
							break;
						case 'thunderbird':
							$email = $data[4];
							$dataname = $data[2];
							if( empty( $dataname ) && ( $data[0] || $data[1] ) ) {
								$dataname = $data[0] . ' ' . $data[1];
							}
							break;
					}
					if( empty( $dataname ) ) {
						$dataname = $email;
					}
					// Skip table if email is blank
					if(
						!empty( $email ) && $data[0] != 'First Name' &&
						$data[0] != 'Name' && $data[1] != 'First Name'
					) {
						$addresses[] = array(
							'name' => $dataname,
							'email' => $email
						);
					}
				}

				if( $addresses ) {
					usort( $addresses, 'sortCSVContacts' );

					foreach( $addresses as $address ) {
						$output .= '<div class="contacts-row">
						<p class="contacts-checkbox">
							<input type="checkbox" name="list[]" value="' . $address['email'] . '" checked="checked" />
						</p>
						<p class="contacts-cell">'
							. $address['name'] .
						'</p>
						<p class="contacts-cell">'
							. $address['email'] .
						'</p>
						<div class="cleared"></div>
					</div>';
					}
				}

				$output .= '</div>';
				$output .= '<p>
				<input type="submit" value="' . wfMsg( 'invite-friends' ) . '" name="B1" /> <a href="javascript:toggleChecked()">' . wfMsg( 'uncheckallbtn' ) . '</a>
				</p>
				</form>';

				$wgOut->addHTML( $output );
			} else { // User clicked to send email to contacts
				$html_format = 'no'; // IMPORTANT: change this to "yes"  ONLY if you are sending HTML format email
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
							new MailAddress( $to ), new MailAddress( $from ),
							$subject, $message, new MailAddress( $from ),
							'text/html; charset=UTF-8'
						);
					} else {
						UserMailer::send(
							new MailAddress( $to ), new MailAddress( $from ),
							$subject, $message, new MailAddress( $sendersemail )
						);
					}
				}

				$wgOut->setPageTitle( wfMsg( 'invite-msg-sent' ) );
				$wgOut->addHTML( '<p class="user-message">' . wfMsg( 'invite-emailswentout' ) . ' ' . $confirm . '</p>' );
				$wgOut->addHTML( '<div class="relationship-request-buttons">
					<input type="button" value="' . wfMsg( 'mainpage' ) . '" onclick="window.location=\'' . $wgScriptPath . '/index.php?title=' . wfMsgForContent( 'mainpage' ) . '\'" />' );
				if( class_exists( 'UserProfile' ) ) {
					$wgOut->addHTML( '<input type="button" value="' . wfMsg( 'invite-yourprofile' ) . '" onclick=\'window.location="' . Title::makeTitle( NS_USER_PROFILE, $wgUser->getName() )->getLocalURL() . '\'" />' );
				}
				$wgOut->addHTML(
					'<input type="button" value="' . wfMsg( 'invite-youruserpage' ) . '" onclick=\'window.location="' . Title::makeTitle( NS_USER, $wgUser->getName() )->getLocalURL() . '\'" />
					</div>'
				);
			}
		} else {
			$wgOut->setPageTitle( wfMsg( 'invite-friends' ) );
			$wgOut->addHTML( $this->displayForm() );
		}
	}

	function displayForm() {
		global $wgUser, $wgOut, $wgRequest, $wgScriptPath;

		$out = '<div class="invite-links">
		<span><a href="' . SpecialPage::getTitleFor( 'InviteEmail' )->escapeFullURL() . '">' . wfMsg( 'invite-friends' ) . '</a>';
		if ( $wgUser->isLoggedIn() ) {
			if( class_exists( 'UserProfile' ) ) {
				$out .= ' - <a href="' . Title::makeTitle( NS_USER_PROFILE, $wgUser->getName() )->getLocalURL() . '"><strong>' . wfMsg( 'invite-yourprofile' ) . '</strong></a>';
			}
			$out .= ' - <a href="' . Title::makeTitle( NS_USER, $wgUser->getName() )->getLocalURL() . '"><strong>' . wfMsg( 'invite-youruserpage' ) . '</strong></a>';
		}
		$out .= '</span>
		</div>';
		$out .= "<script type=\"text/javascript\">
		function uploadCSV( f ) {
			if( !f.sendersemail.value ) {
				alert( '" . wfMsg( 'invite-entervalidemail' ) . "' );
			} else {
				document.emailform.submit();
			}
		}
		</script>";

		$out .= '<div class="invite-message">' . wfMsg( 'invite-getcontactsmaintitle' ) . '</div>
		<div id="target">
		<div class="invite-left">
		<div class="cleared"></div>
		<div class="invite-icons">
			<img src="' . $wgScriptPath . '/extensions/InviteContacts/images/myoutlook.gif" border="0" alt="Outlook" />
			<img src="' . $wgScriptPath . '/extensions/InviteContacts/images/myexpress.gif" border="0" alt="Outlook Express" />
			<img src="' . $wgScriptPath . '/extensions/InviteContacts/images/mythunderbird.gif" border="0" alt="Thunderbird" />
		</div>
		<div class="invite-form">
			<form name="emailform" action="" enctype="multipart/form-data" method="post">
			<input type="hidden" name="upload_csv" value="1" />
			<p>' . wfMsg( 'invite-csvfilelimit' ) . '</p>
			<p class="invite-form-title">' . wfMsg( 'invite-selectemailclient' ) . '</p>
			<p class="invite-form-input">
				<select name="email_client">
					<option value="outlook">Outlook</option>
					<option value="outlook_express">Outlook Express</option>
					<option value="thunderbird">Thunderbird</option>
				</select>
			</p>
			<div class="cleared"></div>
			<p class="invite-form-title">' . wfMsg( 'invite-selectcsvfile' ) . '</p>
			<p class="invite-form-input"><input name="ufile" type="file" id="ufile" size="20" /></p>
			<div class="cleared"></div>
			<p class="invite-form-title">' . wfMsg( 'invite-verifyemail' ) . '</p>
			<p class="invite-form-input"><input name="sendersemail" type="text" id="sendersemail" size="28" value="' . $wgUser->getEmail() . '"/></p>
			<p><input type="button" onclick="javascript:uploadCSV(this.form)" value="' . wfMsg( 'invite-uploadyourcontacts' ) . '" /></p>
			</form>
		</div></div></div>';
/*		$out .= '<div class="invite-right">
		<h1>' . wfMsg( 'invite-queshavewebmail' ) . '</h1>
		<p class="invite-right-image">
			<a href="' . SpecialPage::getTitleFor( 'InviteContacts' )->getFullURL() . '"><img src="' . $wgScriptPath . '/extensions/InviteContacts/images/myyahoo.gif\" border="0" alt="" /></a>
			<a href="' . SpecialPage::getTitleFor( 'InviteContacts' )->getFullURL() . '"><img src="' . $wgScriptPath . '/extensions/InviteContacts/images/mygmail.gif\" border="0" alt="" /></a>
		</p>
		<p class="invite-right-image">
			<a href="' . SpecialPage::getTitleFor( 'InviteContacts' )->getFullURL() . '"><img src="' . $wgScriptPath . '/extensions/InviteContacts/images/myhotmail.gif" border="0" alt="" /></a>
			<a href="' . SpecialPage::getTitleFor( 'InviteContacts' )->getFullURL() . '"><img src="' . $wgScriptPath . '/extensions/InviteContacts/images/myaol.gif" border="0" alt="" /></a>
		</p>
		<div class="cleared"></div>
		<p align="center">
			<input type="button" value="' . wfMsg( 'invite-friends' ) . '" onclick="window.location=\'' . SpecialPage::getTitleFor( 'InviteContacts' )->getFullURL() . '\'" />
		</p>
		</div>*/

		return $out;
	}
}

function sortCSVContacts( $x, $y ) {
	if ( strtoupper( $x['name'] ) == strtoupper( $y['name'] ) ) {
		return 0;
	} elseif ( strtoupper( $x['name'] ) < strtoupper( $y['name'] ) ) {
		return -1;
	} else {
		return 1;
	}
}