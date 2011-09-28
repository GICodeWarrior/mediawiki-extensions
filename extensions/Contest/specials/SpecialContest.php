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
		
		$out = $this->getOutput();
		
		$contest = Contest::s()->selectRow( null, array( 'name' => $subPage ) );
		
		if ( $contest === false ) {
			$out->redirect( SpecialPage::getTitleFor( 'Contests' )->getLocalURL() );
		}
		else {
			$out->setPageTitle( wfMsgExt( 'contest-contest-title', 'parseinline', $contest->getField( 'name' ) ) );
			$this->showGeneralInfo( $contest );
			$this->showContestants( $contest );
		}
	}
	
	protected function showGeneralInfo( Contest $contest ) {
		// TODO
	}
	
	// TODO: list scores and comment counts as well
	protected function showContestants( Contest $contest ) {
		$conds = array(
			'contestant_contest_id' => $contest->getId()
		);
		
		$pager = new ContestantPager( $this, $conds );
		
		if ( $pager->getNumRows() ) {
			$this->getOutput()->addHTML(
				$pager->getNavigationBar() .
				$pager->getBody().
				$pager->getNavigationBar()
			);
		}
		else {
			$this->getOutput()->addWikiMsg( 'contest-contest-no-results' );
		}
	}
	
}