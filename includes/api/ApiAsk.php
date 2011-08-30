<?php

/**
 * API module to query SMW by providing a query in the ask language. 
 *
 * @since 1.6.2
 *
 * @file ApiAsk.php
 * @ingroup SMW
 * @ingroup API
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiAsk extends ApiSMWQuery {
	
	public function execute() {
		$params = $this->extractRequestParams();
		$this->requireParameters( $params, array( 'query' ) );
		
		$queryResult = $this->getQueryResult( $this->getQuery( $params['query'] ) );
		$this->addQueryResult( $queryResult );
	}

	public function getAllowedParams() {
		return array(
			'query' => array(
				ApiBase::PARAM_TYPE => 'string',
			),
		);
	}
	
	public function getParamDescription() {
		return array(
			'query' => 'The query string in ask-language'
		);
	}
	
	public function getDescription() {
		return array(
			'API module to query SMW by providing a query in the ask language.'
		);
	}
	
	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
		) );
	}

	protected function getExamples() {
		return array(
			'api.php?action=ask&query=[[Modification date::+]]|%3FModification date|sort%3DModification date|order%3Ddesc',
		);
	}	
	
	public function getVersion() {
		return __CLASS__ . ': $Id:  $';
	}		
	
}
