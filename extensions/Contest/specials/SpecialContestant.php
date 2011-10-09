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
		
		$contestant = ContestContestant::s()->selectRow( null, array( 'id' => (int)$subPage ) );
		
		if ( $contestant === false ) {
			$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Contests' )->getLocalURL() );
		}
		else {
			if ( $this->getRequest()->wasPosted()
				&& $this->getUser()->matchEditToken( $this->getRequest()->getVal( 'wpEditToken' ) ) ) {
				$this->handleSubmission( $contestant );
			}
			
			$this->showPage( $contestant );
		}
	}
	
	/**
	 * Handle a submission by inserting/updating the vote
	 * and (optionally) adding the comment.
	 * 
	 * @since 0.1
	 * 
	 * @param ContestContestant $contestant
	 * 
	 * @return boolean Success indicator
	 */
	protected function handleSubmission( ContestContestant $contestant ) {
		$success = true;
		
		if ( trim( $this->getRequest()->getText( 'new-comment-text' ) ) !== '' ) {
			$comment = new ContestComment( array(
				'user_id' => $this->getUser()->getId(),
				'contestant_id' => $contestant->getId(),
			
				'text' => $this->getRequest()->getText( 'new-comment-text' ),
				'time' => wfTimestampNow()
			) );
			
			$success = $comment->writeToDB();
			
			if ( $success ) {
				ContestContestant::s()->addToField( 'comments', 1 );
			}		
		}
		
		if ( $success ) {
			// TODO: rating shizzle
		}
		
		return $success;
	}
	
	protected function showPage( ContestContestant $contestant ) {
		$out = $this->getOutput();
		
		$out->setPageTitle( wfMsgExt(
			'contest-contestant-title',
			'parseinline',
			$contestant->getField( 'id' ),
			$contestant->getContest()->getField( 'name' )
		) );
		
		$this->displayNavigation( str_replace( ' ', '_', $contestant->getContest()->getField( 'name' ) ) );
		
		$this->showGeneralInfo( $contestant );
		
		$out->addHTML( '<form method="post" action="' . htmlspecialchars( $this->getTitle( $this->subPage )->getLocalURL() ) . '">' );
		$out->addHTML( Html::hidden( 'wpEditToken', $this->getUser()->editToken() ) );
		
		$this->showRating( $contestant );
		$this->showComments( $contestant );
		
		$out->addHTML( '</form>' );
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
		$out = $this->getOutput();
		
		$out->addHTML( Html::element( 'h2', array(), wfMsg( 'contest-contestant-comments' ) ) );
		
		$out->addHTML( '<div class="contestant-comments">' );
		
		foreach ( $contestant->getComments() as /* ContestComment */ $comment ) {
			$out->addHTML( $this->getCommentHTML( $comment ) );
		}
		
		$out->addHTML( '</div>' );
		
		$out->addHTML(
			'<div class="contestant-new-comment">
				<textarea cols="40" rows="10" name="new-comment-text"></textarea>
			</div>'
		);
		
		$out->addHTML( Html::input( 'submitChanges', wfMsg( 'contest-contestant-submit' ), 'submit' ) );
	}
	
	/**
	 * Get the HTML for a single comment.
	 * 
	 * @since 0.1
	 * 
	 * @param ContestComment $comment
	 * 
	 * @return string
	 */
	protected function getCommentHTML( ContestComment $comment ) {
		$user = User::newFromId( $comment->getField( 'user_id' ) );
		
		$html = Html::rawElement(
			'div',
			array( 'class' => 'contestant-comment-meta' ),
			wfMsgHtml(
				'contest-contestant-comment-by',
				Linker::userLink( $comment->getField( 'user_id' ), $user->getName() ) .
					Linker::userToolLinks( $comment->getField( 'user_id' ), $user->getName() )
			) . '&#160;&#160;&#160;' .$this->getLang()->timeanddate( $comment->getField( 'time' ), true )
		);
		
		$html .= Html::rawElement(
			'div',
			array( 'class' => 'contestant-comment-text' ),
			$this->getOutput()->parse( $comment->getField( 'text' ) )
		);
		
		return Html::rawElement(
			'div',
			array(
				'class' => 'contestant-comment',
			),
			$html
		);
	}
	
}
