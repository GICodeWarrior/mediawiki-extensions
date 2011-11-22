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
		parent::__construct( 'Reviews', 'review' );
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

		if ( $this->getRequest()->wasPosted() ) {
			
		}
		else {
			if ( $subPage === '' ) {
				$this->displayReviewList();
			}
			else {
				// TODO
			}
		}
	}

	protected function displayReviewList() {
		$reviewPager = new ReviewPager( array() );

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

}
