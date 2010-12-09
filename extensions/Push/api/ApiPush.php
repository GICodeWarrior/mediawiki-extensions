<?php

/**
 * API module to push wiki pages to other MediaWiki wikis.
 *
 * @since 0.3
 *
 * @file ApiPush.php
 * @ingroup Push
 *
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiPush extends ApiBase {
	
	public function __construct( $main, $action ) {
		parent::__construct( $main, $action );
	}
	
	public function execute() {
		$params = $this->extractRequestParams();
		
		if ( !isset( $params['page'] ) ) {
			$this->dieUsageMsg( array( 'missingparam', 'page' ) );
		}
		
		if ( !isset( $params['targets'] ) ) {
			$this->dieUsageMsg( array( 'missingparam', 'targets' ) );
		}		

		$title = Title::newFromText( $params['page'] );
		
		$revision = $this->getPageRevision( $title );
		
		if ( $revision !== false ) {
			$this->doPush( $title, $revision, $params['targets'] );
		}
	}
	
	/**
	 * Makes an internal request to the API to get the needed revision.
	 * 
	 * @since 0.3
	 * 
	 * @param Title $title
	 * 
	 * @return array or false
	 */
	protected function getPageRevision( Title $title ) {
		$revId = PushFunctions::getRevisionToPush( $title );
		
		$requestData = array(
			'action' => 'query',
			'format' => 'json',
			'prop' => 'revisions',
			'rvprop' => 'timestamp|user|comment|content',
			'titles' => $title->getFullText(),
			'rvstartid' => $revId,
			'rvendid' => $revId,		
		);
		
		$api = new ApiMain( new FauxRequest( $requestData, true ), true );
		$api->execute();
		$response = $api->getResultData();
		
		$revision = false;
		
		if ( array_key_exists( 'query', $response )
			&& array_key_exists( 'pages', $response['query'] )
			&& count( $response['query']['pages'] ) > 0 ) {
			
			foreach ( $response['query']['pages'] as $key => $value ) {
				$first = $key;
				break;
			}
			
			if ( array_key_exists( 'revisions', $response['query']['pages'][$first] )
				&& count( $response['query']['pages'][$first]['revisions'] ) > 0 ) {
				$revision = $response['query']['pages'][$first]['revisions'][0];
			}
			else {
				// TODO
			}
		}
		else {
			// TODO
		}

		return $revision;
	}
	
	/**
	 * Pushes the page content to the target wikis.
	 * 
	 * @since 0.3
	 * 
	 * @param Title $title
	 * @param array $revision
	 * @param array $targets
	 */		
	protected function doPush( Title $title, array $revision, array $targets ) {
		foreach ( $targets as $target ) {
			if ( substr( $target, -1 ) !== '/' ) {
				$target .= '/';
			}
			
			$target .= 'api.php';
			
			$token = $this->getEditToken( $title, $target );

			if ( $token !== false ) {
				$this->pushToTarget( $title, $revision, $target, $token );
			}
		}
	}
	
	/**
	 * Obtains the needed edit token by making an HTTP GET request
	 * to the remote wikis API. 
	 * 
	 * @since 0.3
	 * 
	 * @param Title $title
	 * @param string $target
	 * 
	 * @return string or false
	 */	
	protected function getEditToken( Title $title, $target ) {
		$requestData = array(
			'action' => 'query',
			'format' => 'json',
			'intoken' => 'edit',
			'prop' => 'info',
			'titles' => $title->getFullText(),			
		);
		
		$parts = array();
		
		foreach ( $requestData as $key => $value ) {
			$parts[] = $key . '=' . urlencode( $value );
		}
		
		$response = FormatJson::decode( Http::get( $target . '?' . implode( '&', $parts ) ) );
		$token = false;

		if ( property_exists( $response, 'query' )
			&& property_exists( $response->query, 'pages' )
			&& count( $response->query->pages ) > 0 ) {
			
			foreach ( $response->query->pages as $key => $value ) {
				$first = $key;
				break;
			}

			if ( property_exists( $response->query->pages->$first, 'edittoken' ) ) {
				$token = $response->query->pages->$first->edittoken;
			}
			else {
				// TODO
			}			
		}
		else {
			// TODO
		}
		
		return $token;
	}	
	
	/**
	 * Pushes the page content to the specified wiki.
	 * 
	 * @since 0.3
	 * 
	 * @param Title $title
	 * @param array $revision
	 * @param string $target
	 * @param string $token
	 */		
	protected function pushToTarget( Title $title, array $revision, $target, $token ) {
		global $wgSitename;

		$summary = wfMsgExt(
			'push-import-revision-message',
			'parsemag',
			$wgSitename,
			$revision['user'],
			$revision['comment'] == '' ? '' : wfMsgExt( 'push-import-revision-comment', 'parsemag', $revision['comment'] )
		);

		$requestData = array(
			'action' => 'edit',
			'title' => $title->getFullText(),
			'format' => 'json',
			'summary' => $summary,
			'text' => $revision['*'],
			'token' => $token,
		);

		$response = Http::post( $target, array( 'postData' => $requestData ) );
//var_dump($response);exit;
		// TODO
	}
	
	public function getAllowedParams() {
		return array(
			'page' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => true,
			),
			'targets' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_REQUIRED => true,
			),			
		);
	}
	
	public function getParamDescription() {
		return array(
			'page' => 'The name of the page to push.',
			'targets' => 'The urls of the wikis to push to.',
		);
	}
	
	public function getDescription() {
		return array(
			'Pushes page contnet to other wikis.'
		);
	}
		
	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
			array( 'missingparam', 'page' ),
			array( 'missingparam', 'targets' ),
		) );
	}

	protected function getExamples() {
		return array(
			'api.php?action=push&page=Main page&targets=http://en.wikipedia.org/w',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id: ApiPush.php 63775 2010-03-15 16:35:22Z jeroendedauw $';
	}	
	
}
