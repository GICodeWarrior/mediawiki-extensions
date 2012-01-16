<?php

/**
 * API module to associate/disassociate users as instructor with/from a course.
 *
 * @since 0.1
 *
 * @file ApiInstructor.php
 * @ingroup Education Program
 * @ingroup API
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiInstructor extends ApiBase {

	public function execute() {
		$params = $this->extractRequestParams();

		if ( !( isset( $params['username'] ) XOR isset( $params['userid'] ) ) ) {
			$this->dieUsage( wfMsgExt( 'ep-addinstructor-invalid-user-args' ), 'username-xor-userid' );
		}

		if ( isset( $params['username'] ) ) {
			$user = User::newFromName( $params['username'] );
			$userId = $user->getId();
		}
		else {
			$userId = $params['userid'];
		}
		
		if ( $userId < 1 ) {
			$this->dieUsage( wfMsgExt( 'ep-addinstructor-invalid-user' ), 'invalid-user' );
		}
		
		if ( !$this->userIsAllowed( $userId ) ) {
			$this->dieUsageMsg( array( 'badaccess-groups' ) );
		}
		
		$course = EPCourse::selectRow( array( 'id', 'name', 'instructors' ), array( 'id' => $params['courseid'] ) );

		if ( $course === false ) {
			$this->dieUsage( wfMsgExt( 'ep-addinstructor-invalid-course' ), 'invalid-course' );
		}
		
		$success = false;
		
		switch ( $params['subaction'] ) {
			case 'add':
				$success = $course->addInstructors( array( $userId ) );
				break;
			case 'remove':
				$success = $course->removeInstructors( array( $userId ) );
				break;
		}
		
		$this->getResult()->addValue(
			null,
			'success',
			$success
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
	
	/**
	 * Returns if the user is allowed to do the requested action.
	 * 
	 * @since 0.1
	 * 
	 * @param integer $userId User id of the mentor affected
	 */
	protected function userIsAllowed( $userId ) {
		$user = $this->getUser();
		
		if ( $user->isAllowed( 'ep-instructor' ) ) {
			return true;
		}
		
		if ( $user->isAllowed( 'ep-beinstructor' ) && $user->getId() === $userId ) {
			return true;
		}
		
		return false;
	}

	public function needsToken() {
		return true;
	}

	public function mustBePosted() {
		return true;
	}

	public function getAllowedParams() {
		return array(
			'subaction' => array(
				ApiBase::PARAM_TYPE => array( 'add', 'remove' ),
				ApiBase::PARAM_REQUIRED => true,
			),
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
			'reason' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => false,
			),
			'token' => null,
		);
	}

	public function getParamDescription() {
		return array(
			'subaction' => 'Specifies what you want to do with the instructor',
			'courseid' => 'The ID of the course to which the instructor should be added',
			'username' => 'Name of the user to associate as instructor',
			'userid' => 'Id of the user to associate as instructor',
			'reason' => 'Message with the reason for this change for nthe log',
			'token' => 'Edit token. You can get one of these through prop=info.',
		);
	}

	public function getDescription() {
		return array(
			'API module for associating/disassociating a user as instructor with/from a course.'
		);
	}

	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
			array( 'code' => 'username-xor-userid', 'info' => 'You need to either provide the username or the userid parameter' ),
			array( 'code' => 'invalid-user', 'info' => 'An invalid user name or id was provided' ),
			array( 'code' => 'invalid-course', 'info' => 'There is no course with the provided ID' ),
		) );
	}

	protected function getExamples() {
		return array(
			'api.php?action=instructor&subaction=add&courseid=42&userid=9001',
			'api.php?action=instructor&subaction=add&courseid=42&username=Jeroen%20De%20Dauw',
			'api.php?action=instructor&subaction=remove&courseid=42&userid=9001',
			'api.php?action=instructor&subaction=remove&courseid=42&username=Jeroen%20De%20Dauw',
			'api.php?action=instructor&subaction=remove&courseid=42&username=Jeroen%20De%20Dauw&reason=Removed%20from%20program%20because%20of%20evil%20plans%20to%20take%20over%20the%20world',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}

}
