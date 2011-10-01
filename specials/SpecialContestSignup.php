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
			$this->showSignupForm( Contest::s()->selectRow( null, array( 'id' => $this->getRequest()->getInt( 'wpcontest-id' ) ) ) );
		}
		else {
			$this->showPage( $subPage );
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
		
		$contestant = new ContestContestant( array(
			'contest_id' => $data['contest-id'],
			'user_id' => $user->getId(),
			'challange_id' => $data['contestant-challangeid'],
		
			'volunteer' => $data['contestant-volunteer'],
			'wmf' => $data['contestant-wmf'],
		) );
		
		return $contestant->writeToDB();
	}
	
	/**
	 * Show the page.
	 * 
	 * @since 0.1
	 * 
	 * @param string $contestName
	 */
	protected function showPage( $contestName ) {
		$out = $this->getOutput();
		
		$contest = Contest::s()->selectRow( null, array( 'name' => $contestName ) );
		
		if ( $contest === false ) {
			$this->showError( 'contest-signup-unknown' );
			$out->addHTML( '<br /><br /><br /><br />' );
			$out->returnToMain();
		}
		else {
			switch ( $contest->getField( 'status' ) ) {
				case Contest::STATUS_ACTIVE:
					$this->showEnabledPage( $contest );	
					break;
				case Contest::STATUS_DRAFT:
					// TODO	
					break;
				case Contest::STATUS_FINISHED:
					$this->showWarning( 'contest-signup-finished' );
					$out->addHTML( '<br /><br /><br /><br />' );
					$out->returnToMain();	
					break;
			}
		}
	}
	
	protected function showEnabledPage( Contest $contest ) {
		$out = $this->getOutput();
		
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
			// TODO: we might want to have a title field here
			$out->setPageTitle( $contest->getField( 'name' ) );
			$out->addWikiMsg( 'contest-signup-header', $contest->getField( 'name' ) );
			
			$this->showSignupForm( $contest );
		}
		else {
			$out->redirect( SpecialPage::getTitleFor( 'ContestSubmission', $contestName )->getLocalURL() );
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
		$form = new HTMLForm( $this->getFormFields( $contest ), $this->getContext() );
		
		$form->setSubmitCallback( array( __CLASS__, 'handleSubmission' ) );
		$form->setSubmitText( wfMsg( 'contest-signup-submit' ) );
		
		if( $form->show() ){
			$this->showSucess( $contest );
		}
	}
	
	/**
	 * Display a success message and helpfull links for further contest participation. 
	 * 
	 * @since 0.1
	 * 
	 * @param Contest $contest
	 */
	protected function showSucess( Contest $contest ) {
		$out = $this->getOutput();
		
		// TODO
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
		
		$fields['contest-id'] = array(
			'type' => 'hidden',
			'default' => $contest->getId(),
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
		
		$fields['contestant-challangeid'] = array(
			'type' => 'radio',
			'label-message' => 'contest-signup-challange',
			'options' => $this->getChallangesList( $contest ),
			'required' => true,
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
		
		$fields['contestant-readrules'] = array(
			'type' => 'check',
			'default' => '0',
			'label-message' => array( 'contest-signup-readrules', $contest->getField( 'rules_page' ) ),
		);
		
		return $fields;
	}
	
	/**
	 * Gets a list of contests that can be fed directly to the options field of
	 * an HTMLForm radio input.
	 * challange title => challange id
	 * 
	 * @since 0.1
	 * 
	 * @param Contest $contest
	 * 
	 * @return array
	 */
	protected function getChallangesList( Contest $contest ) {
		$list = array();
		
		foreach ( $contest->getChallanges() as /* ContestChallange */ $challange ) {
			$list[$challange->getField( 'title' )] = $challange->getId();
		}
		
		return $list;
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
