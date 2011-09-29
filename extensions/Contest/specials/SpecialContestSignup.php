<?php

/**
 * Contest signup interface for participants.
 * 
 * @since 0.1
 * 
 * @file SpecialContestSignup.php
 * @ingroup Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialContestSignup extends SpecialContestPage {
	
	/**
	 * Constructor.
	 * 
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'ContestSignup', 'contestparticipant' );
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
			$this->handleSubmission();
		}
		else {
			$this->showPage( $subPage );
		}
	}
	
	protected function handleSubmission() {
		
	}
	
	protected function showPage( $contestName ) {
		$out = $this->getOutput();
		
		$contest = Contest::s()->selectRow( null, array( 'name' => $contestName ) );
		
		if ( $contest === false ) {
			$this->showError( 'contest-signup-unknown' );
			$out->addHTML( '<br /><br /><br /><br />' );
			$out->returnToMain();
		}
		else {
			// TODO: we might want to have a title field here
			$out->setPageTitle( $contest->getField( 'name' ) );
			$out->addWikiMsg( 'contest-signup-header', $contest->getField( 'name' ) );
			
			$this->showSignupForm( $contest );
		}
	}
	
	/**
	 * Display the signup form for this contest.
	 * 
	 * @since 0.1
	 * 
	 * @param Contest $contest
	 */
	protected function showSignupForm( Contest $contest ) {
		$out = $this->getOutput();
		$form = new HTMLForm( $this->getFormFields( $contest ), $this->getContext() );
		
		$form->setSubmitText( wfMsg( 'contest-signup-submit' ) );
		$form->show();
	}
	
	/**
	 * Gets the field definitions for the form.
	 * 
	 * @since 0.1
	 * 
	 * @param Contest $contest
	 */
	protected function getFormFields( Contest $contest ) {
		$fields = array();
		
		$user = $this->getUser();
		
		$fields[] = array(
			'type' => 'hidden',
			'default' => $contest->getId(),
			'name' => 'contest-id',
			'id' => 'contest-id',
		);
		
		$fields[] = array(
			'type' => 'text',
			'default' => $user->getRealName(),
			'label-message' => 'contest-signup-realname',
			'name' => 'contestant-realname',
		);
		
		$fields[] = array(
			'type' => 'text',
			'default' => $user->getEmail(),
			'label-message' => 'contest-signup-email',
			'name' => 'contestant-email',
		);
		
		$fields[] = array(
			'type' => 'check',
			'default' => '0',
			'label-message' => 'contest-signup-volunteer',
			'name' => 'contestant-volunteer',
		);
		
		$fields[] = array(
			'type' => 'check',
			'default' => '0',
			'label-message' => 'contest-signup-wmf',
			'name' => 'contestant-wmf',
		);
		
		$fields[] = array(
			'type' => 'check',
			'default' => '0',
			'label-message' => array( 'contest-signup-readrules', $contest->getField( 'rules_page' ) ),
			'name' => 'contestant-readrules',
		);
		
		return $fields;
	}
	
}
