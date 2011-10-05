<?php

/**
 * Base class for API query modules that return results using a
 * ContestDBClass deriving class.
 *
 * @since 0.1
 *
 * @file ApiContestQuery.php
 * @ingroup Contest
 * @ingroup API
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
abstract class ApiContestQuery extends ApiQueryBase {
	
	protected abstract function getClassName();
	
	protected function getClass() {
		$className = $this->getClassName();
		return $className::s();
	}

	/**
	 * Retrieve the special words from the database.
	 */
	public function execute() {
		$params = $this->getParams();
		$results = $this->getResults( $params, $this->getConditions( $params ) );
		$this->addResults( $params, $results );
	}
	
	protected function getParams() {
		// Get the requests parameters.
		$params = $this->extractRequestParams();
		
		$starPropPosition = array_search( '*', $params['props'] );
		
		if ( $starPropPosition !== false ) {
			unset( $params['props'][$starPropPosition] );
			$params['props'] = array_merge( $params['props'], $this->getClass()->getFieldNames() );
		}
		
		return array_filter( $params, create_function( '$p', 'return isset( $p );' ) );
	}
	
	protected function getConditions( array $params ) {
		$conditions = array();
		
		foreach ( $params as $name => $value ) {
			if ( $this->getClass()->canHasField( $name ) ) {
				$conditions[$name] = $value;
			}
		}
		
		return $conditions;
	}
	
	protected function getResults( array $params, array $conditions ) {
		return $this->getClass()->select(
			$params['props'],
			$conditions,
			array(
				'LIMIT' => $params['limit'] + 1,
				'ORDER BY' => $this->getClass()->getPrefixedField( 'id' ) . ' ASC'
			)
		);
	}
	
	protected function addResults( array $params, array $results ) {
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
				ApiBase::PARAM_TYPE => array_merge( $this->getClass()->getFieldNames(), array( '*' ) ),
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
		
		return array_merge( $this->getClass()->getAPIParams(), $params );
	}

	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getParamDescription()
	 */
	public function getParamDescription() {
		$descs = array (
			'props' => 'Fields to query',
			'continue' => 'Offset number from where to continue the query',
			'limit' => 'Max amount of rows to return',
		);
		
		return array_merge( $this->getClass()->getFieldDescriptions(), $descs );
	}

	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getPossibleErrors()
	 */
	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
		) );
	}	
	
}
