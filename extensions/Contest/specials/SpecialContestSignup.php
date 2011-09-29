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
		if ( !parent::execute( $subPage ) ) {
			return;
		}
		
		$out = $this->getOutput();
		
		$contest = Contest::s()->selectRow( null, array( 'name' => $subPage ) );
		
		if ( $contest === false ) {
			$this->showError( 'contest-signup-unknown' );
			$out->addHTML( '<br /><br /><br /><br />' );
			$out->returnToMain();
		}
		else {
			// TODO: we might want to have a title field here
			$out->setPageTitle( $contest->getField( 'name' ) );
			
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
		
		
	}
	
}
