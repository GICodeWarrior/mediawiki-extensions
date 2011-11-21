<?php

/**
 * API module to submit reviews.
 *
 * @since 0.1
 *
 * @file ApiSubmitReview.php
 * @ingroup Reviews
 * @ingroup API
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiSubmitReview extends ApiBase {
	
	public function execute() {
		if ( !$this->getUser()->isAllowed( 'review' ) || $this->getUser()->isBlocked() ) {
			$this->dieUsageMsg( array( 'badaccess-groups' ) );
		}			
		
		$params = $this->extractRequestParams();
		
		unset( $params['token'] );
		$params['edit_time'] = wfTimestampNow();
		$params['user_id'] = $this->getUser()->getId();
		
		if ( array_key_exists( 'id', $params ) ) {
			$review = Review::selectRow( array( 'id', 'user_id' ), array( 'id' => $params['id'] ) );
			
			if ( $review->getField( 'user_id' ) === $this->getUser()->getId() ) {
				$review->setFields( $params );
				$review->writeToDB();
			}
			else {
				$this->dieUsageMsg( array( 'badaccess-groups' ) );
			}
		}
		else {
			$review = new Review( $params );
			
			$review->setField( 'state', Review::STATUS_NEW );
			$review->setField( 'post_time', wfTimestampNow() );
			
			$review->writeToDB();
		}
	}

	public function needsToken() {
		return true;
	}
	
	public function mustBePosted() {
		return true;
	}
	
	public function getAllowedParams() {
		$params = array(
			'id' => array(
				ApiBase::PARAM_TYPE => 'integer',
			),
			'title' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => true,
			),
			'text' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => true,
			),
			'rating' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => true,
			),
			'ratings' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => true,
			),
			'page_id' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => true,
			),
			// TODO
			'token' => null,
		);
		
		return $params;
	}
	
	public function getParamDescription() {
		$descs = array(
			'id' => 'The ID of the review being submitted, ommit for new review.',
			'token' => 'Edit token. You can get one of these through prop=info.',
			'title' => 'The review title',
			'text' => 'The review text',
			'rating' => 'The main rating for the review',
			'ratings' => 'JSON string holding the rating data',
			'page_id' => 'The ID of the page to which the review belongs',
		);
		
		return $descs;
	}
	
	public function getDescription() {
		return array(
			''
		);
	}
	
	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
		) );
	}

	protected function getExamples() {
		return array(
			'api.php?action=submitreview&',
		);
	}	
	
	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}		
	
}
