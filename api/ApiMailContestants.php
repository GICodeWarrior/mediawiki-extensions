<?php

/**
 * API module to mail contestants.
 *
 * @since 0.1
 *
 * @file ApiMailContestants.php
 * @ingroup Contest
 * @ingroup API
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiMailContestants extends ApiBase {
	
	public function __construct( $main, $action ) {
		parent::__construct( $main, $action );
	}
	
	public function execute() {
		global $wgUser;
		
		if ( !$wgUser->isAllowed( 'contestadmin' ) || $wgUser->isBlocked() ) {
			$this->dieUsageMsg( array( 'badaccess-groups' ) );
		}
		
		$params = $this->extractRequestParams();
		
		$everythingOk = true;
		
		$contestIds = array();
		$challengeIds = array();
		
		if ( !is_null( 'challengetitles' ) ) {
			
		}
		
		if ( !is_null( 'contestnames' ) ) {
			
		}
		
		$conditions = array();
		// TODO
		if ( count( $contestIds ) > 0 ) {
			$conditions[] = array( 'contest_id' => $contestIds );
		}
		
		if ( count( $challengeIds ) > 0 ) {
			$conditions[] = array( 'challenge_id' => $challengeIds );
		}
		
		if ( !is_null( $params['ids'] ) && count( $params['ids'] ) > 0 ) {
			$conditions[] = array( 'id' => $params['ids'] );
		}
		
		$contestants = ContestContestant::s()->select( 'email', $conditions );
		
		if ( $contestants !== false && count( $contestants ) > 0 ) {
			$recipients = array();
			
			foreach ( $contestants as /* ContestContestant */ $contestant ) {
				$recipients[] = $contestant->getField( 'email' );
			}
			
			$everythingOk = $this->sendReminderEmail( $recipients );
		}
		
		$this->getResult()->addValue(
			null,
			'success',
			$everythingOk
		);
	}
	
	/**
	 * TODO
	 * 
	 * Send a reminder email.
	 * 
	 * @since 0.1
	 * 
	 * @return Status
	 */
	public function sendReminderEmail( array $recipients ) {
		global $wgPasswordSender, $wgPasswordSenderName;
		
		$title = wfMsgExt( 'contest-email-reminder-title', 'parsemag', $this->getContest()->getDaysLeft() );
		$emailText = ContestUtils::getParsedArticleContent( $this->getContest()->getField( 'reminder_email' ) );
		$user = $this->getUser();
		$sender = $wgPasswordSender;
		$senderName = $wgPasswordSenderName;
		
		wfRunHooks( 'ContestBeforeReminderEmail', array( &$this, &$title, &$emailText, &$user, &$sender, &$senderName ) );
		
		return UserMailer::send( 
			new MailAddress( $user ),
			new MailAddress( $sender, $senderName ),
			$title,
			$emailText,
			null,
			'text/html; charset=ISO-8859-1'
		);
	}
	/*
	public function needsToken() {
		return true;
	}
	
	public function getTokenSalt() {
		$params = $this->extractRequestParams();
		return 'deletecontest' . implode( '|', $params['ids'] ); // TODO
	}
	
	public function mustBePosted() {
		return true;
	}
	*/
	public function getAllowedParams() {
		return array(
			'ids' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => false,
				ApiBase::PARAM_ISMULTI => true,
			),
			'contestids' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => false,
				ApiBase::PARAM_ISMULTI => true,
			),
			'contestnames' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => false,
				ApiBase::PARAM_ISMULTI => true,
			),
			'challengeids' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => false,
				ApiBase::PARAM_ISMULTI => true,
			),
			'challengetitles' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => false,
				ApiBase::PARAM_ISMULTI => true,
			),
			'token' => null,
		);
	}
	
	public function getParamDescription() {
		return array(
			'ids' => 'The IDs of the contestants to mail',
			'token' => 'Edit token',
		);
	}
	
	public function getDescription() {
		return array(
			'API module for mailing contestants. The provided conditions such as contest ids and challenge titles will be joined with AND.'
		);
	}
	
	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
			array( 'missingparam', 'ids' ),
		) );
	}

	protected function getExamples() {
		return array(
			'api.php?action=mailcontestants&ids=42',
			'api.php?action=mailcontestants&ids=4|2',
			'api.php?action=mailcontestants&contestids=42',
			'api.php?action=mailcontestants&contestnames=Weekend of Code',
			'api.php?action=mailcontestants&challengetitles=foo|bar|baz',
		);
	}	
	
	public function getVersion() {
		return __CLASS__ . ': $Id:  $';
	}		
	
}
