<?php

/**
 * Contest editing interface for contest admins.
 * 
 * @since 0.1
 * 
 * @file SpecialEditContest.php
 * @ingroup Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialEditContest extends SpecialContestPage {
	
	/**
	 * Constructor.
	 * 
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'EditContest', 'contestadmin', false );
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
		
		if ( $this->getRequest()->wasPosted() && $this->getUser()->matchEditToken( $this->getRequest()->getVal( 'wpEditToken' ) ) ) {
			$data = array( 'name' => $this->getRequest()->getVal( 'newcontest' ) );
			
			$contest = Contest::s()->selectRow( null, $data );
			
			if ( $contest === false ) {
				$contest = new Contest( $data );
			}
			else {
				// TODO: warn not new
			}
		}
		else {
			$contest = Contest::s()->selectRow( array( 'name' => $subPage ) );
		}
		
		if ( $contest === false ) {
			$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Contests' )->getLocalURL() );
		}
		else {
			$this->displayForm( $contest );
		}
	}
	
	protected function displayForm( Contest $contest ) {
		
	}
	
}