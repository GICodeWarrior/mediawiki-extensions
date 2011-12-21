<?php

/**
 * API module to delete objects stored by the Education Program extension.
 *
 * @since 0.1
 *
 * @file ApiDeleteEducation.php
 * @ingroup Education Program
 * @ingroup API
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiDeleteEducation extends ApiBase {

	protected static $typeMap = array(
		'org' => 'EPOrg',
		'course' => 'EPCourse',
		'trem' => 'EPTerm',
		'student' => 'EPStudent',
		'mentor' => 'EPMentor',
	);
	
	public function execute() {
		$params = $this->extractRequestParams();
		
		if ( !$this->userIsAllowed( $params['type'], $params ) || $this->getUser()->isBlocked() ) {
			$this->dieUsageMsg( array( 'badaccess-groups' ) );
		}

		$everythingOk = true;

		foreach ( $params['ids'] as $id ) {
			// $instance->removeFromDB is used instead of Class::delete,
			// so that linked data also gets deleted.
			$c = self::$typeMap[$params['type']];
			$object = new $c( array( 'id' => $id ) );
			$everythingOk = $object->removeFromDB() && $everythingOk;
		}

		$this->getResult()->addValue(
			null,
			'success',
			$everythingOk
		);
	}
	
	/**
	 * @since 0.1
	 * 
	 * @param string $type
	 * @param array $params
	 */
	protected function userIsAllowed( $type, array $params ) {
		$user = $this->getUser();
		
		if ( $type === 'student' ) {
			return EPStudent::selectField( 'id', array( 'user_id' => $user->getId() ) ) === $params['id'];
		}
		
		if ( $type === 'mentor' ) {
			return EPMentor::selectField( 'id', array( 'user_id' => $user->getId() ) ) === $params['id'];
		}
		
		if ( $user->isAllowed( 'epadmin' ) ) {
			return true;
		}
		
		if ( $user->isAllowed( 'epmentor' ) ) {
			$mentor = new EPMentor( null, array( 'user_id' => $user->getId() ) );
			
			if ( $mentor !== false ) {
				if ( $type === 'course' ) {
					return $mentor->hasCourse( array( 'id' => $params['id'] ) );
				}
				elseif ( $type === 'term' ) {
					return $mentor->hasTerm( array( 'id' => $params['id'] ) );
				}
			}
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
			'ids' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_ISMULTI => true,
			),
			'type' => array(
				ApiBase::PARAM_TYPE => array_keys( self::$typeMap ),
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_ISMULTI => false,
			),
			'token' => null,
		);
	}

	public function getParamDescription() {
		return array(
			'ids' => 'The IDs of the reviews to delete',
			'token' => 'Edit token. You can get one of these through prop=info.',
			'type' => 'Type of object to delete.',
		);
	}

	public function getDescription() {
		return array(
			'API module for deleting objects parts of the Education Program extension.'
		);
	}

	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
		) );
	}

	protected function getExamples() {
		return array(
			'api.php?action=deleteeducation&ids=42&type=course',
			'api.php?action=deleteeducation&ids=4|2&type=student',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}

}
