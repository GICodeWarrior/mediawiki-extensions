<?php

/**
 * API module to delete reviews.
 *
 * @since 0.1
 *
 * @file ApiDeleteReviews.php
 * @ingroup Reviews
 * @ingroup API
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiDeleteReviews extends ApiBase {

	public function execute() {
		if ( !ReviewsSettings::get( 'reviewDeletionEnabled' ) ) {
			$this->dieUsage( 'Review deletion is disabled', 'reviewdeletiondisabled' );
		}

		if ( !$this->getUser()->isAllowed( 'reviewadmin' ) || $this->getUser()->isBlocked() ) {
			$this->dieUsageMsg( array( 'badaccess-groups' ) );
		}

		$params = $this->extractRequestParams();

		$everythingOk = true;

		foreach ( $params['ids'] as $id ) {
			$review = new Review( array( 'id' => $id ) );
			$everythingOk = $review->removeAllFromDB() && $everythingOk;
		}

		$this->getResult()->addValue(
			null,
			'success',
			$everythingOk
		);
	}

	public function needsToken() {
		return true;
	}

	public function getTokenSalt() {
		$params = $this->extractRequestParams();
		return 'deletereview' . implode( '|', $params['ids'] );
	}

	public function mustBePosted() {
		return true;
	}

	public function getAllowedParams() {
		return array(
			'ids' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_ISMULTI => true,
			),
			'token' => null,
		);
	}

	public function getParamDescription() {
		return array(
			'ids' => 'The IDs of the reviews to delete',
			'token' => 'Edit token, salted with the review ids',
		);
	}

	public function getDescription() {
		return array(
			'API module for deleting reviews.'
		);
	}

	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
			array( 'code' => 'reviewdeletiondisabled', 'info' => 'Review deletion is disabled' ),
		) );
	}

	protected function getExamples() {
		return array(
			'api.php?action=deletereviews&ids=42',
			'api.php?action=deletereviews&ids=4|2',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}

}
