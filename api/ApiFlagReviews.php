<?php

/**
 * API module to flag reviews.
 *
 * @since 0.1
 *
 * @file ApiFlagReviews.php
 * @ingroup Reviews
 * @ingroup API
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiFlagReviews extends ApiBase {

	public function execute() {

		if ( $this->getUser()->isBlocked() ) {
			$this->dieUsageMsg( array( 'badaccess-groups' ) );
		}
		
		$params = $this->extractRequestParams();
		
		$state = Review::getStateForString( $params['state'] );
		
		if ( $state == Review::STATUS_FLAGGED && !$this->getUser()->isAllowed( 'flagreview' ) ) {
			$this->dieUsageMsg( array( 'badaccess-groups' ) );
		}
		
		if ( in_array( $state, array( Review::STATUS_REVIEWED, Review::STATUS_NEW ) ) 
			&& !$this->getUser()->isAllowed( 'reviewreview' ) ) {
			$this->dieUsageMsg( array( 'badaccess-groups' ) );
		}
		
		$this->getResult()->addValue(
			null,
			'success',
			Review::update( array( 'state' => $state ), array( 'id' => $params['ids'] ) )
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
			'api.php?action=flagreview&ids=4|2&state=new',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}

}
