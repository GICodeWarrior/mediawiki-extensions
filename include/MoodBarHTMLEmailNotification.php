<?php

/**
 * A custom Mailer for MoodBar that sends HTML Email notification
 * This is a hacksish solution till we revamp the email system 
 */
class MoodBarHTMLEmailNotification {
	
	protected $to, $subject, $body, $replyto, $from;
	protected $timestamp, $composed_common, $response, $feedback;
	protected $mime_boundary;
	
	/**
	 * @var Title
	 */
	protected $title;

	/**
	 * @var User
	 */
	protected $editor;
	protected $targetUser;
	
	public function __construct() {
		$this->mime_boundary = 'PHP_Alt_Boundary_'. md5( time() );	
	}
	
	/**
	 * Send emails corresponding to the user $editor editing the page $title.
	 * Also updates wl_notificationtimestamp.
	 *
	 * May be deferred via the job queue.
	 *
	 * @param $editor User object
	 * @param $title Title object
	 * @param $timestamp string Edit timestamp
	 * @param $response string response text
	 * @param $feedback integer feedback id
	 */
	public function notifyOnRespond( $editor, $title, $timestamp, $feedback, $response ) {
		global $wgEnotifUseJobQ, $wgEnotifUserTalk;

		if ( $title->getNamespace() != NS_USER_TALK || !$wgEnotifUserTalk || 
		     !$this->canSendUserTalkEmail( $editor, $title ) ) {
			return;
		}

		if ( $wgEnotifUseJobQ ) {
			$params = array(
				'editor' => $editor->getName(),
				'editorID' => $editor->getID(),
				'timestamp' => $timestamp,
				'response' => $response,
				'feedback' => $feedback
			);
			$job = new MoodBarHTMLMailerJob( $title, $params );
			$job->insert();
		} else {
			$this->actuallyNotifyOnRespond( $editor, $title, $timestamp, $feedback, $response );
		}
	}
	
	/**
	 * Immediate version of notifyOnRespond().
	 *
	 * Send emails corresponding to the user $editor editing the page $title.
	 * Also updates wl_notificationtimestamp.
	 *
	 * @param $editor User object
	 * @param $title Title object
	 * @param $timestamp string Edit timestamp
	 * @param $response string response text
	 * @param $feedabck integer feedback id
	 */
	public function actuallyNotifyOnRespond( $editor, $title, $timestamp, $feedback, $response ) {

		global $wgEnotifUserTalk;

		wfProfileIn( __METHOD__ );

		if ( $title->getNamespace() != NS_USER_TALK ) {
			return;	
		}

		$this->title = $title;
		$this->timestamp = $timestamp;
		$this->editor = $editor;
		$this->composed_common = false;
		$this->response = $response;
		$this->feedback = $feedback;

		if ( $wgEnotifUserTalk && $this->canSendUserTalkEmail( $editor, $title ) ) {
			$this->compose( $this->targetUser );
		}
		
		wfProfileOut( __METHOD__ );
		
	}
	
	/**
	 * @param $editor User
	 * @param $title Title bool
	 * @return bool
	 */
	protected function canSendUserTalkEmail( $editor, $title ) {
		global $wgEnotifUserTalk;

		if ( $wgEnotifUserTalk ) {
			$this->targetUser = User::newFromName( $title->getText() );

			if ( !$this->targetUser || $this->targetUser->isAnon() ) {
				wfDebug( __METHOD__ . ": user talk page edited, but user does not exist\n" );
			} elseif ( $this->targetUser->getId() == $editor->getId() ) {
				wfDebug( __METHOD__ . ": user edited their own talk page, no notification sent\n" );
			} elseif ( $this->targetUser->getOption( 'enotifusertalkpages' ) )
			{
				if ( $this->targetUser->isEmailConfirmed() ) {
					wfDebug( __METHOD__ . ": sending talk page update notification\n" );
					return true;
				} else {
					wfDebug( __METHOD__ . ": talk page owner doesn't have validated email\n" );
				}
			} else {
				wfDebug( __METHOD__ . ": talk page owner doesn't want notifications\n" );
			}
		}
		return false;
	}
	
	/**
	 * Generate the generic "this page has been changed" e-mail text.
	 */
	protected function composeCommonMailtext() {
		global $wgPasswordSender, $wgPasswordSenderName, $wgNoReplyAddress;
		global $wgEnotifFromEditor, $wgEnotifRevealEditorAddress;
		global $wgEnotifUseRealName, $wgRequest;

		$this->composed_common = true;
	
		$keys = array();

		if ( $this->editor->isAnon() ) {
			$pageEditor = wfMsgForContent( 'enotif_anon_editor', $this->editor->getName() );
		} else {
			$pageEditor = $wgEnotifUseRealName ? $this->editor->getRealName() : $this->editor->getName();
		}
		
		$feedbackUrl = SpecialPage::getTitleFor( 'FeedbackDashboard', $this->feedback )->getCanonicalURL();
		
		// build the subject	
		$this->subject = wfMessage( 'moodbar-enotif-subject')->params( $pageEditor )->escaped();

		// build the header
		$textEmailHeader = wfMessage( 'moodbar-enotif-text-body-header' )
		                                     ->params( $pageEditor, $feedbackUrl )->escaped();
		$htmlEmailHeader = wfMsgExt( 'moodbar-enotif-html-body-header', 
			                            array( 'parse' ), 
			                            $this->editor->getTalkPage()->getCanonicalURL(), 
			                            $pageEditor, 
			                            $feedbackUrl );
	        // build the response text
		$textResponse = htmlspecialchars( $this->response );
		$messageCache = MessageCache::singleton();
		
		// This is ugly, it's used to add domain name to wiki link so it can be clicked from email.
		$action = $wgRequest->getVal( 'action' );
		$wgRequest->setVal( 'action', 'render' );
		$htmlResponse = $messageCache->parse( $this->response )->getText();
		$wgRequest->setVal( 'action', $action );
		
		//build the copy text
		$textEmailCopy = wfMessage( 'moodbar-enotif-body-copy-text' )->escaped();
		$htmlEmailCopy = wfMsgExt( 'moodbar-enotif-body-copy-text', array( 'parse' ) );
		
		//assemable the email body
		$this->body = <<<HTML
--$this->mime_boundary
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit

$textEmailHeader 

$textResponse

$textEmailCopy

--$this->mime_boundary
Content-Type: text/html; charset=UTF-8
Content-Transfer-Encoding: 8bit

<html>
	<body>
		$htmlEmailHeader
		
		$htmlResponse
		
		$htmlEmailCopy
	</body>
</html>

--$this->mime_boundary--
HTML;
			
		# Reveal the page editor's address as REPLY-TO address only if
		# the user has not opted-out and the option is enabled at the
		# global configuration level.
		$adminAddress = new MailAddress( $wgPasswordSender, $wgPasswordSenderName );
		if ( $wgEnotifRevealEditorAddress
			&& ( $this->editor->getEmail() != '' )
			&& $this->editor->getOption( 'enotifrevealaddr' ) )
		{
			$editorAddress = new MailAddress( $this->editor );
			if ( $wgEnotifFromEditor ) {
				$this->from    = $editorAddress;
			} else {
				$this->from    = $adminAddress;
				$this->replyto = $editorAddress;
			}
		} else {
			$this->from    = $adminAddress;
			$this->replyto = new MailAddress( $wgNoReplyAddress );
		}
	}
	
	/**
	 * Compose a mail to a given user and either queue it for sending, or send it now,
	 * depending on settings.
	 * @param $user User
	 */
	protected function compose( $user ) {
		
		global $wgContLang, $wgEnotifUseRealName;
		
		if ( !$this->composed_common ) {
			$this->composeCommonMailtext();
		}
		
		$to = new MailAddress( $user );

		return UserMailer::send( $to, $this->from, $this->subject, $this->body, $this->replyto, $contentType = 'multipart/alternative; boundary=' . $this->mime_boundary );

	}
	
}
