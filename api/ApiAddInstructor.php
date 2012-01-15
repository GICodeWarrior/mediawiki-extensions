<?php

/**
 * API module to associate users as instructor for a course.
 *
 * @since 0.1
 *
 * @file ApiAddInstructor.php
 * @ingroup Education Program
 * @ingroup API
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiAddInstructor extends ApiBase {

	public function execute() {
		$params = $this->extractRequestParams();

		if ( !( isset( $params['username'] ) XOR isset( $params['userid'] ) ) ) {
			$this->dieUsage( wfMsgExt( 'ep-addinstructor-invalid-user-arg' ), 'username-xor-userid' );
		}

		$everythingOk = true;

		// TODO

		$this->getResult()->addValue(
			null,
			'success',
			$everythingOk
		);
	}

	/**
	 * Get the User being used for this instance.
	 * ApiBase extends ContextSource as of 1.19.
	 *
	 * @since 0.1
	 *
	 * @return User
	 */
	public function getUser() {
		return method_exists( 'ApiBase', 'getUser' ) ? parent::getUser() : $GLOBALS['wgUser'];
	}

	public function needsToken() {
		return true;
	}

	public function mustBePosted() {
		return true;
	}

	public function getAllowedParams() {
		return array(
			'username' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => false,
			),
			'userid' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => false,
			),
			'courseid' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => true,
			),
			'token' => null,
		);
	}

	public function getParamDescription() {
		return array(
			'courseid' => 'The ID of the course to which the instructor should be added',
			'username' => 'Name of the user to associate as instructor',
			'userid' => 'Id of the user to associate as instructor',
			'token' => 'Edit token. You can get one of these through prop=info.',
		);
	}

	public function getDescription() {
		return array(
			'API module for associating a user as instructor with a course.'
		);
	}

	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
			array( 'code' => 'username-xor-userid', 'info' => 'You need to either provide the username or the userid parameter' ),
		) );
	}

	protected function getExamples() {
		return array(
			'api.php?action=addinstructor&courseid=42&userid=9001',
			'api.php?action=addinstructor&courseid=42&username=Jeroen%20De%20Dauw',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}

}
