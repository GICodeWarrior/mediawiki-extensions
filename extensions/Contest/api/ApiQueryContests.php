<?php

/**
 * API module to get a list of contests.
 *
 * @since 0.1
 *
 * @file ApiQueryContests.php
 * @ingroup Contest
 * @ingroup API
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiQueryContests extends ApiQueryBase {
	
	public function __construct( $main, $action ) {
		parent::__construct( $main, $action, 'co' );
	}

	/**
	 * Retrieve the special words from the database.
	 */
	public function execute() {
		global $wgUser;
		
		if ( !$wgUser->isAllowed( 'contestadmin' ) || $wgUser->isBlocked() ) {
			$this->dieUsageMsg( array( 'badaccess-groups' ) );
		}

		// Get the requests parameters.
		$params = $this->extractRequestParams();
		
		$starPropPosition = array_search( '*', $params['props'] );
		
		if ( $starPropPosition !== false ) {
			unset( $params['props'][$starPropPosition] );
			$params['props'] = array_merge( $params['props'], Contest::s()->getFieldNames() );
		}
		
		$params = array_filter( $params, create_function( '$p', 'return isset( $p );' ) );
		
		$conditions = array();
		
		foreach ( $params as $name => $value ) {
			if ( Contest::s()->canHasField( $name ) ) {
				$conditions[$name] = $value;
			}
		}
		
		$results = Contest::s()->select(
			$params['props'],
			$conditions,
			array(
				'LIMIT' => $params['limit'] + 1,
				'ORDER BY' => Contest::s()->getPrefixedField( 'id' ) . ' ASC'
			)
		);
		
		$serializedResults = array();
		$count = 0;
		
		foreach ( $results as $result ) {
			if ( ++$count > $params['limit'] ) {
				// We've reached the one extra which shows that
				// there are additional pages to be had. Stop here...
				$this->setContinueEnumParameter( 'continue', $result->getId() );
				break;
			}
			
			$serializedResults[] = $result->toArray();
		}

		$this->getResult()->setIndexedTagName( $serializedResults, 'contest' );
		
		$this->getResult()->addValue(
			null,
			'contests',
			$serializedResults
		);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getAllowedParams()
	 */
	public function getAllowedParams() {
		$params = array (
			'props' => array(
				ApiBase::PARAM_TYPE => array_merge( Contest::s()->getFieldNames(), array( '*' ) ),
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_DFLT => '*'
			),
			'limit' => array(
				ApiBase::PARAM_DFLT => 20,
				ApiBase::PARAM_TYPE => 'limit',
				ApiBase::PARAM_MIN => 1,
				ApiBase::PARAM_MAX => ApiBase::LIMIT_BIG1,
				ApiBase::PARAM_MAX2 => ApiBase::LIMIT_BIG2
			),
			'continue' => null,
		);
		
		return array_merge( Contest::s()->getAPIParams(), $params );
	}

	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getParamDescription()
	 */
	public function getParamDescription() {
		$descs = array (
			'props' => 'Contest data to query',
			'continue' => 'Offset number from where to continue the query',
			'limit' => 'Max amount of words to return',
		);
		
		return array_merge( Contest::s()->getFieldDescriptions(), $descs );
	}

	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getDescription()
	 */
	public function getDescription() {
		return 'API module for querying contests';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getPossibleErrors()
	 */
	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
		) );
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getExamples()
	 */
	protected function getExamples() {
		return array (
			'api.php?action=query&list=contests&props=id|name',
			'api.php?action=query&list=contests&costatus=1',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
	
}
