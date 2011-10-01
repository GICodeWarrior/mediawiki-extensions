<?php

/**
 * Contest submission interface for participants.
 * 
 * @since 0.1
 * 
 * @file SpecialContestSubmission.php
 * @ingroup Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialContestSubmission extends SpecialContestPage {
	
	/**
	 * Constructor.
	 * 
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'ContestSubmission', 'contestparticipant' );
	}
	
	/**
	 * Main method.
	 * 
	 * @since 0.1
	 * 
	 * @param string $arg
	 */
	public function execute( $subPage ) {
		$subPage = str_replace( '_', ' ', $subPage );
		
		if ( !parent::execute( $subPage ) ) {
			return;
		}
		
		if ( $this->getRequest()->wasPosted() && $this->getUser()->matchEditToken( $this->getRequest()->getVal( 'wpEditToken' ) ) ) {
			$contestant = ContestContestant::s()->selectRow( null, array( 'id' => $this->getRequest()->getInt( 'wpcontestant-id' ) ) );
			$this->showPage( $contestant );
		}
		else {
			$this->handleViewRequest( $subPage );
		}
	}
	
	/**
	 * Handle view requests for the page.
	 * 
	 * @since 0.1
	 * 
	 * @param string $contestName
	 */
	protected function handleViewRequest( $contestName ) {
		$out = $this->getOutput();
		
		$contest = Contest::s()->selectRow( null, array( 'name' => $contestName ) );
		
		if ( $contest === false ) {
			$this->showError( 'contest-submission-unknown' );
			$out->addHTML( '<br /><br /><br /><br />' );
			$out->returnToMain();
		}
		else {
			switch ( $contest->getField( 'status' ) ) {
				case Contest::STATUS_ACTIVE:
					$this->handleEnabledPage( $contest );	
					break;
				case Contest::STATUS_DRAFT:
					// TODO	
					break;
				case Contest::STATUS_FINISHED:
					$this->showWarning( 'contest-submission-finished' );
					$out->addHTML( '<br /><br /><br /><br />' );
					$out->returnToMain();	
					break;
			}
		}
	}
	
	/**
	 * Handle page request when the contest is enabled.
	 * 
	 * @since 0.1
	 * 
	 * @param Contest $contest
	 */
	protected function handleEnabledPage( Contest $contest ) {
		// Check if the user is already a contestant in this contest.
		// If he is, reirect to submission page, else show signup form.
		$contestant = ContestContestant::s()->selectRow(
			'id',
			array(
				'contest_id' => $contest->getId(),
				'user_id' => $this->getUser()->getId()
			)
		);
		
		if ( $contestant === false ) {
			$out->redirect( SpecialPage::getTitleFor( 'ContestSignup', $contest->getField( 'name' ) )->getLocalURL() );
		}
		else {
			$contestant->setContest( $contest );
			$this->showPage( $contestant );
		}
	}
	
	/**
	 * Show the page content.
	 * 
	 * @since 0.1
	 * 
	 * @param ContestContestant $contestant
	 */
	protected function showPage( ContestContestant $contestant ) {
		$this->getOutput()->setPageTitle( $contestant->getContest()->getField( 'name' ) );
		$this->getOutput()->addWikiMsg( 'contest-submission-header', $contestant->getContest()->getField( 'name' ) );
		
		$form = new HTMLForm( $this->getFormFields( $contestant ), $this->getContext() );
		
		$form->setSubmitCallback( array( __CLASS__, 'handleSubmission' ) );
		$form->setSubmitText( wfMsg( 'contest-submission-submit' ) );
		
		if( $form->show() ){
			// TODO: we might want to have a title field here
			$this->getOutput()->redirect( $this->getTitle( $contestant->getContest()->getField( 'name' ) )->getLocalURL() );
		}
	}
	
	/**
	 * Handle form submission.
	 * 
	 * @since 0.1
	 * 
	 * @return true|array
	 */
	public static function handleSubmission( array $data ) {
		$user = $GLOBALS['wgUser']; //$this->getUser();
		
		$user->setEmail( $data['contestant-email'] );
		$user->setRealName( $data['contestant-realname'] );
		$user->saveSettings();
		
		$contestant = new ContestContestant( array(
			'id' => $data['contestant-id'],
		
			'volunteer' => $data['contestant-volunteer'],
			'wmf' => $data['contestant-wmf'],
		) );
		
		return $contestant->writeToDB();
	}
	
	/**
	 * Gets the field definitions for the form.
	 * 
	 * @since 0.1
	 * 
	 * @param ContestContestant $contest
	 */
	protected function getFormFields( ContestContestant $contestant ) {
		$fields = array();
		
		$user = $this->getUser();
		
		$fields['contestant-id'] = array(
			'type' => 'hidden',
			'default' => $contestant->getId(),
			'id' => 'contest-id',
		);
		
		$fields['contestant-realname'] = array(
			'type' => 'text',
			'default' => $user->getRealName(),
			'label-message' => 'contest-signup-realname',
			'required' => true,
			'validation-callback' => array( __CLASS__, 'validateNameField' )
		);
		
		$fields['contestant-email'] = array(
			'type' => 'text',
			'default' => $user->getEmail(),
			'label-message' => 'contest-signup-email',
			'required' => true,
			'validation-callback' => array( __CLASS__, 'validateEmailField' )
		);
		
		$fields['contestant-country'] = array(
			'type' => 'select',
			'label-message' => 'contest-signup-country',
			'required' => true,
			'options' => ContestContestant::getCountriesForInput()
		);
		
		$fields['contestant-volunteer'] = array(
			'type' => 'check',
			'default' => '0',
			'label-message' => 'contest-signup-volunteer',
		);
		
		$fields['contestant-wmf'] = array(
			'type' => 'check',
			'default' => '0',
			'label-message' => 'contest-signup-wmf',
		);
		
		return $fields;
	}
	
	/**
	 * HTMLForm field validation-callback for name field.
	 * 
	 * @since 0.1
	 * 
	 * @param $value String
	 * @param $alldata Array
	 * 
	 * @return true|string
	 */
	public static function validateNameField( $value, $alldata = null ) {
		return strlen( $value ) > 1;
	}
	
	/**
	 * HTMLForm field validation-callback for email field.
	 * 
	 * @since 0.1
	 * 
	 * @param $value String
	 * @param $alldata Array
	 * 
	 * @return true|string
	 */
	public static function validateEmailField( $value, $alldata = null ) {
		return Sanitizer::validateEmail( $value );
	}
	
}
