<?php

/**
 * Contest landing page for participants.
 * 
 * @since 0.1
 * 
 * @file SpecialContestWelcome.php
 * @ingroup Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialContestWelcome extends SpecialContestPage {
	
	/**
	 * Constructor.
	 * 
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'ContestWelcome' );
	}
	
	/**
	 * @see SpecialPage::getDescription
	 * 
	 * @since 0.1
	 */
	public function getDescription() {
		return wfMsg( 'special-' . strtolower( $this->getName() ) );
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
		
		$out->setPageTitle( $this->getDescription() );
		
		$contest = Contest::s()->selectRow( null, array( 'name' => $subPage ) );
		
		if ( $contest === false ) {
			$this->showError( 'contest-welcome-unknown' );
			$out->addHTML( '<br /><br /><br /><br />' );
			$out->returnToMain();
		}
		else {
			$this->showIntro( $contest );
			$this->showChallanges( $contest->getChallanges() );
			$this->showOpportunities();
			$this->showRules();
			$this->showSignupLinks( $contest );
		}
	}
	
	protected function showIntro( Contest $contest ) {
		
	}
	
	protected function showChallanges( array /* of ContestChallange */ $challanges ) {
		
	}
	
	protected function showOpportunities() {
		
	}
	
	protected function showRules() {
		
	}
	
	protected function showSignupLinks( Contest $contest ) {
		
	}
	
}