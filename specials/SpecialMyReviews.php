<?php

/**
 * List of reviews for a user.
 *
 * @since 0.1
 *
 * @file SpecialMyReviews.php
 * @ingroup Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialMyReviews extends SpecialPage {

	public $subPage;
	
	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'MyReviews', 'review' );
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

		if ( $subPage === '' ) {
			$this->getOutput()->addWikiMsg( 'reviews-myreviews-header' );
			$this->displayReviewList();
		}
		else {
			$review = Review::selectRow( null, array( 'id' => $subPage, 'user_id' => $this->getUser()->getId() ) );
			
			if ( $review == false ) {
				$this->getOutput()->addWikiMsg( 'reviews-myreviews-nosuchreview' );
				$this->displayReviewList();
			}
			else {
				$this->getOutput()->addWikiMsg( 'reviews-myreviews-editheader' );
				$this->displayEditControl( $review );
			}
		}
	}

	/**
	 * Display the list of reviews for this user.
	 * 
	 * @since 0.1
	 */
	protected function displayReviewList() {
		$reviewPager = new ReviewPager(
			array( 'review_user_id' => $this->getUser()->getId() ),
			$this->getName()
		);

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
	 * Display the review edit control for the provided review.
	 * 
	 * @since 0.1
	 * 
	 * @param Review $review
	 */
	protected function displayEditControl( Review $review ) {
		$control = new ReviewControl( $review );
		$control->addToContext( $this );
	}

}
