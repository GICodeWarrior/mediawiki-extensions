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
	
	// TODO
	public function execute() {
		global $wgUser;
		
		if ( !$wgUser->isAllowed( 'contestadmin' ) || $wgUser->isBlocked() ) {
			$this->dieUsageMsg( array( 'badaccess-groups' ) );
		}
		
		$params = $this->extractRequestParams();
		
		$everythingOk = true;
		
		$contestIds = is_null( $params['contestids'] ) ? array() : $params['contestids'];
		$challengeIds = is_null( $params['challengeids'] ) ? array() : $params['challengeids'];
		
		if ( !is_null( $params['challengetitles'] ) ) {
			$challenges = ContestChallenge::s()->select( 'id', array( 'title' => $params['challengetitles'] ) );
			
			if ( $challenges === false ) {
				// TODO: error
			}
			
			foreach ( $challenges as /* ContestChallenge */ $challenge ) {
				$challengeIds[] = $challenge->getId();
			}
		}
		
		if ( !is_null( $params['contestnames'] ) ) {
			$contests = Contest::s()->select( 'id', array( 'name' => $params['contestnames'] ) );
			
			if ( $contests === false ) {
				// TODO: error
			}
			
			foreach ( $contests as /* Contest */ $contest ) {
				$contestIds[] = $contest->getId();
			}
		}
		
		$conditions = array();
		
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
				$recipients[] = new MailAddress( $contestant->getField( 'email' ) );
			}
			
			$everythingOk = $this->sendReminderEmail(
				ContestUtils::getParsedArticleContent( $params['page'] ), // TODO: have some magic here for params such as daysleft
				$recipients,
				array( 'daysleft' => $this->getContest()->getDaysLeft() )
			);
		}
		else {
			// TODO: error
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
	 * @param string $emailText
	 * @param array $recipients
	 * 
	 * @return Status
	 */
	public function sendReminderEmail( $emailText, array /* of MailAddress */ $recipients, array $params ) {
		global $wgPasswordSender, $wgPasswordSenderName;
		
		$title = wfMsgExt( 'contest-email-reminder-title', 'parsemag', $params['daysleft'] );
		$sender = $wgPasswordSender;
		$senderName = $wgPasswordSenderName;
		
		wfRunHooks( 'ContestBeforeReminderEmail', array( &$this, &$title, &$emailText, &$recipients, &$sender, &$senderName ) );
		
		return UserMailer::send( 
			$recipients,
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
			'page' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_ISMULTI => false,
			),
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
			'page' => 'Name of the page from which to pull content for the email body',
			'ids' => 'The IDs of the contestants to mail',
			'contestids' => 'The IDs of the contests where of the contestants should be mailed',
			'contestnames' => 'The names of the contests where of the contestants should be mailed',
			'challengeids' => 'The IDs of the challenges where of the contestants should be mailed',
			'challengetitles' => 'The titles of the challenges where of the contestants should be mailed',
			'token' => 'Edit token',
		);
	}
	
	public function getDescription() {
		return array(
			'API module for mailing contestants. Selection criteria will be joined with AND,
			except for the challange ids/titles and contest ids/names pairs, which will be joined wit OR.'
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
		return __CLASS__ . ': $Id$';
	}		
	
}
