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
class SpecialContestant extends SpecialContestPage {
	
	/**
	 * Constructor.
	 * 
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'Contestant', 'contestjudge', false );
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
		
		$contestant = ContestContestant::s()->selectRow( null, array( 'id' => (int)$subPage ) );
		
		if ( $contestant === false ) {
			$out->redirect( SpecialPage::getTitleFor( 'Contests' )->getLocalURL() );
		}
		else {
			$out->setPageTitle( wfMsgExt(
				'contest-contestant-title',
				'parseinline',
				$contestant->getField( 'id' ),
				$contestant->getContest()->getField( 'name' )
			) );
			
			$this->subPage = str_replace( ' ', '_', $contestant->getContest()->getField( 'name' ) );
			$this->displayNavigation();
			
			$this->showGeneralInfo( $contestant );
			$this->showRating();
			$this->showComments();
		}
	}
	
	/**
	 * Display the general contestant info.
	 * 
	 * @since 0.1
	 * 
	 * @param ContestContestant $contestant
	 */
	protected function showGeneralInfo( ContestContestant $contestant ) {
		$out = $this->getOutput();
		
		$out->addHTML( Html::openElement( 'table', array( 'class' => 'wikitable contestant-summary' ) ) );
		
		foreach ( $this->getSummaryData( $contestant ) as $stat => $value ) {
			$out->addHTML( '<tr>' );
			
			$out->addHTML( Html::element(
				'th',
				array( 'class' => 'contestant-summary-name' ),
				wfMsg( 'contest-contestant-header-' . $stat )
			) );
			
			$out->addHTML( Html::rawElement(
				'td',
				array( 'class' => 'contestant-summary-value' ),
				$value
			) );
			
			$out->addHTML( '</tr>' );
		}
		
		$out->addHTML( Html::closeElement( 'table' ) );
	}
	
	/**
	 * Gets the summary data.
	 * Values are escaped.
	 * 
	 * @since 0.1
	 * 
	 * @param ContestContestant $contestant
	 * 
	 * @return array
	 */
	protected function getSummaryData( ContestContestant $contestant ) {
		$stats = array();
		
		$stats['id'] = htmlspecialchars( $contestant->getField( 'id' ) );
		$stats['contest'] = htmlspecialchars( $contestant->getContest()->getField( 'name' ) );
		
		$challengeTitles = ContestChallenge::getTitlesForIds( $contestant->getField( 'challenge_id' ) ); 
		$stats['challenge'] = htmlspecialchars( $challengeTitles[$contestant->getField( 'challenge_id' )] );
		
		if ( $contestant->getField( 'submission' ) === '' ) {
			$stats['submission'] = wfMsg( 'contest-contestant-notsubmitted' );
		}
		else {
			$stats['submission'] = '<b>' . Html::element(
				'a',
				array( 'href' => $contestant->getField( 'submission' ) ),
				wfMsg( 'contest-contestant-submission-url' )
			) . '</b>';
		}
		
		$countries = ContestContestant::getCountries();
		$stats['country'] = htmlspecialchars( $countries[$contestant->getField( 'country' )] );
		
		$stats['wmf'] = wfMsg( 'contest-contestant-' . ( $contestant->getField( 'wmf' ) ? 'yes' : 'no' ) );
		$stats['volunteer'] = wfMsg( 'contest-contestant-' . ( $contestant->getField( 'volunteer' ) ? 'yes' : 'no' ) );
		
		$stats['rating'] = wfMsgExt(
			'contest-contestant-rating',
			'parsemag',
			$this->getLang()->formatNum( $contestant->getField( 'rating' ) ),
			$this->getLang()->formatNum( $contestant->getField( 'rating_count' ) )
		);
		
		$stats['comments'] = $this->getLang()->formatNum( $contestant->getField( 'comments' ) );
		
		return $stats;
	}
	
	// TODO: show rating and commenting controls
	
	/**
	 * Display the current rating the judge gave if any and a control to
	 * (re)-rate.
	 * 
	 * @since 0.1
	 * 
	 * @param ContestContestant $contestant
	 */
	protected function showRating( ContestContestant $contestant ) {
		
	}

	/**
	 * Show the comments and a control to add additional ones.
	 * 
	 * @since 0.1
	 * 
	 * @param ContestContestant $contestant
	 */
	protected function showComments( ContestContestant $contestant ) {
		
	}
	
}
