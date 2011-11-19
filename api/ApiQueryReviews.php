<?php

/**
 * API module to get a list of reviews.
 *
 * @since 0.1
 *
 * @file ApiQueryReviews.php
 * @ingroup Reviews
 * @ingroup API
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiQueryReviews extends ApiReviewQuery {

	/**
	 * (non-PHPdoc)
	 * @see ApiContestQuery::getClassInfo()
	 * @return array
	 */
	protected function getClassInfo() {
		return array(
			'class' => 'Review',
			'item' => 'review',
			'set' => 'reviews',
		);
	}

	public function __construct( $main, $action ) {
		parent::__construct( $main, $action, 're' );
	}

	/**
	 * Handle the API request.
	 * Checks for access rights and then let's the parent method do the actual work.
	 */
	public function execute() {
		global $wgUser;

		if ( !$wgUser->isAllowed( 'contestadmin' ) || $wgUser->isBlocked() ) {
			$this->dieUsageMsg( array( 'badaccess-groups' ) );
		}

		parent::execute();
	}

	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getDescription()
	 */
	public function getDescription() {
		return 'API module for querying reviews';
	}

	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getExamples()
	 */
	protected function getExamples() {
		return array (
			'api.php?action=query&list=reviews&reprops=id|name',
			'api.php?action=query&list=reviews&restatus=1',
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getVersion()
	 */
	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}

}
