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
			'state' => array(
				ApiBase::PARAM_TYPE => array( 'flagged', 'reviewed', 'new' ),
				ApiBase::PARAM_DFLT => 'flagged',
			),
			'token' => null,
		);
	}

	public function getParamDescription() {
		return array(
			'ids' => 'The IDs of the reviews to flag',
			'state' => 'The state to set for the review.',
			'token' => 'Edit token. You can get one of these through prop=info.',
		);
	}

	public function getDescription() {
		return array(
			'API module for flagging reviews. By default their state will be changed to flagged, but using the state parameter, other states can also be set.'
		);
	}

	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
		) );
	}

	protected function getExamples() {
		return array(
			'api.php?action=flagreview&ids=42',
			'api.php?action=flagreview&ids=4|2',
			'api.php?action=flagreview&ids=42&state=reviewed',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}

}
