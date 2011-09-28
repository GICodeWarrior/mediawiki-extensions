<?php

/**
 * Contest interface for judges.
 * 
 * @since 0.1
 * 
 * @file SpecialContest.php
 * @ingroup Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialContest extends SpecialContestPage {
	
	/**
	 * Constructor.
	 * 
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'Contest', 'contestjudge', false );
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
		

	}
	
	protected function showGeneralInfo( Contest $contest ) {
		
	}
	
	protected function showParticipants( Contest $contest ) {
		
	}
	
}