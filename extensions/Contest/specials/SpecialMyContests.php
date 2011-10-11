<?php

/**
 * List of contests for a user. 
 * 
 * @since 0.1
 * 
 * @file SpecialMyContests.php
 * @ingroup Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialMyContests extends SpecialContestPage {
	
	/**
	 * Constructor.
	 * 
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'MyContests', 'contestparticipant' );
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
		
		$contestants = ContestContestant::s()->select( 
			array( 'id', 'contest_id', 'challenge_id' ),
			array( 'user_id' => $this->getUser()->getId() )
		);
		
		$contestantCount = count( $contestants );
		
		if ( $contestantCount == 0 ) {
			$this->getOutput()->addWikiMsg( 'contest-mycontests-no-contests' );
		}
		else if ( $contestantCount == 1 ) {
			$contest =  $contestants[0]->getContest( array( 'status', 'name' ) );
			
			if ( $contest->getField( 'status' ) == Contest::STATUS_ACTIVE ) {
				$this->getOutput()->redirect( SpecialPage::getTitleFor( 'ContestSubmission', $contest->getField( 'name' ) )->getLocalURL() );
			}
			else {
				$this->displayContestsTable( $contestants );
			}
		}
		else {
			$this->displayContestsTable( $contestants );
		}
	}
	
	/**
	 * Displays a list of contests the user participates or participated in,
	 * together with their user specific choices such as the contest challenge.
	 * 
	 * @since 0.1
	 * 
	 * @param array $contestants
	 */
	protected function displayContestsTable( array /* of ContestContestant */ $contestants ) {
		$user = $this->getUser();
		$out = $this->getOutput();
		
		$out->addHTML( Html::element( 'h2', array(), wfMsg( 'contest-mycontests-active-header' ) ) );
		
		// TODO
		
		$out->addHTML( Html::element( 'h2', array(), wfMsg( 'contest-mycontests-finished-header' ) ) );
		
		// TODO
	}	
	
}
