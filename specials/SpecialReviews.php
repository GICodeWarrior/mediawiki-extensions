<?php

/**
 * List of reviews.
 *
 * @since 0.1
 *
 * @file SpecialReviews.php
 * @ingroup Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialReviews extends SpecialPage {

	public $subPage;
	
	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'Reviews', 'reviewsadmin' );
	}

	/**
	 * @see SpecialPage::getDescription
	 *
	 * @since 0.1
	 * @return String
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
		$subPage = is_null( $subPage ) ? '' : $subPage;
		$this->subPage = str_replace( '_', ' ', $subPage );

		$this->setHeaders();
		$this->outputHeader();

		// If the user is authorized, display the page, if not, show an error.
		if ( !$this->userCanExecute( $this->getUser() ) ) {
			$this->displayRestrictionError();
			return false;
		}

		$out = $this->getOutput();
		
		if ( $this->getRequest()->getInt( 'deleted' ) === 1 ) {
			$out->addHTML(
				'<div class="successbox"><strong><p>'
					. wfMsgExt( 'reviews-reviews-deleted', array( 'parseinline' ) )
				. '</p></strong></div><hr style="display: block; clear: both; visibility: hidden;" />'
			);
		}
		
		if ( $subPage === '' ) {
			$out->addWikiMsg( 'reviews-reviews-header' );
			$this->displayReviewList();
		}
		else {
			$review = Review::selectRow( null, array( 'id' => $subPage ) );
			
			if ( $review === false ) {
				$out->addWikiMsg( 'reviews-reviews-nosuchreview' );
				$this->displayReviewList();
			}
			else {
				$out->addModules( 'ext.reviews.special.reviews' );
				
				$out->addWikiMsg( 'reviews-reviews-editheader' );
				
				$this->displaySummary( $review );
				
				$out->addHTML(
					Html::element( 'h3', array(), wfMsg( 'reviews-reviews-reviewtext' ) ) . 
					'<div class="review-text-content"><p>' . htmlspecialchars( $review->getField( 'text' ) ) . '</p></div>'
				);
				
				$this->displayAdminControls( $review );
			}
		}
	}

	/**
	 * Display the list of reviews.
	 * 
	 * @since 0.1
	 */
	protected function displayReviewList() {
		$reviewPager = new ReviewPager( array(), $this->getName() );

		if ( $reviewPager->getNumRows() ) {
			$this->getOutput()->addHTML(
				$reviewPager->getNavigationBar() .
				$reviewPager->getBody() .
				$reviewPager->getNavigationBar()
			);
		}
		else {
			$this->getOutput()->addWikiMsg( 'reviews-pager-no-results' );
		}
	}
	
	/**
	 * Display a summary of the review.
	 * 
	 * @since 0.1
	 * 
	 * @param Review $review
	 */
	protected function displaySummary( Review $review ) {
		$out = $this->getOutput();

		$out->addHTML( Html::openElement( 'table', array( 'class' => 'wikitable review-summary' ) ) );

		foreach ( $this->getSummaryData( $review ) as $stat => $value ) {
			$out->addHTML( '<tr>' );

			$out->addHTML( Html::element(
				'th',
				array( 'class' => 'review-summary-name' ),
				wfMsg( 'reviews-reviews-header-' . $stat )
			) );

			$out->addHTML( Html::rawElement(
				'td',
				array( 'class' => 'review-summary-value' ),
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
	 * @param Review $review
	 *
	 * @return array
	 */
	protected function getSummaryData( Review $review ) {
		$stats = array();

		$stats['title'] = htmlspecialchars( $review->getField( 'title' ) );
		$stats['page'] = Linker::link( $review->getTitle() );
		$stats['posted'] = htmlspecialchars( $this->getLanguage()->timeanddate( $review->getField( 'post_time' ), true ) );
		$stats['edited'] = htmlspecialchars( $this->getLanguage()->timeanddate( $review->getField( 'edit_time' ), true ) );
		
		$user = $review->getUser();
		$stats['user'] = Linker::userLink( $user->getId(), $user->getName() ) .
							Linker::userToolLinks( $user->getId(), $user->getName() );
						
		$stats['state'] = $review->getStateControl( $this->getUser() );
		
		$stats['rating'] = $review->getRating()->getDisplayHTML();

		if ( $review->hasRatings() ) {
			$stats['ratings'] = Html::rawElement(
				'ul',
				array(),
				implode( array_map( 'ReviewRating::getDisplayHTMLFor', $review->getRatings() ) ) 
			);
		}
			
		return $stats;
	}
	
	/**
	 * Display a summary of the review.
	 * 
	 * @since 0.1
	 * 
	 * @param Review $review
	 */
	protected function displayAdminControls( Review $review ) {
		$out = $this->getOutput();
		
		$out->addHTML( Html::element( 'h3', array(), wfMsg( 'reviews-reviews-controls' ) ) );
		
		if ( ReviewsSettings::get( 'reviewDeletionEnabled' ) ) {
			$out->addHTML( Html::element(
				'button',
				array(
					'class' => 'reviews-delete-button',
					'data-review-id' => $review->getId(),
					// TODO: might want to add invalidation sign here so master db can be used on target page and we don't get rep lag ghosts.
					'data-completion-url' => $this->getTitle()->getLocalURL( array( 'deleted' => 1 ) )
				),
				wfMsg( 'reviews-reviews-delete' )
			) );
		}
	}

}
