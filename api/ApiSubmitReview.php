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
		
		if ( !( isset( $params['id'] ) XOR isset( $params['name'] ) ) ) {
			$this->dieUsage( wfMsgExt( 'review-err-id-xor-name' ), 'id-xor-name' );
		}
		
		if ( isset( $params['name'] ) ) {
			$review = Review::selectRow( null, array( 'name' => $params['name'] ) );
			
			if ( $review === false ) {
				$this->dieUsage( wfMsgExt( 'review-err-review-name-unknown', 'parsemag', $params['name'] ), 'review-name-unknown' );
			}
		} else {
			$review = Review::selectRow( null, array( 'id' => $params['id'] ) );
			
			if ( $review === false ) {
				$this->dieUsage( wfMsgExt( 'review-err-review-id-unknown', 'parsemag', $params['id'] ), 'review-id-unknown' );
			}
		}
		
		// TODO
	}

	public function needsToken() {
		return true;
	}
	
	public function getTokenSalt() {
		return serialize( array( 'submitreview', $this->getUser()->getName() ) );
	}
	
	public function mustBePosted() {
		return true;
	}
	
	public function getAllowedParams() {
		return array(
			'id' => array(
				ApiBase::PARAM_TYPE => 'integer',
			),
			'name' => array(
				ApiBase::PARAM_TYPE => 'string',
			),
			// TODO
			'token' => null,
		);
	}
	
	public function getParamDescription() {
		return array(
			'id' => 'The ID of the review being submitted.',
			'name' => 'The name of the review being submitted.',
			'token' => 'Submission token.',
		);
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
