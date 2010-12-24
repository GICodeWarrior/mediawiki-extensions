<?php

/**
 * API module to get special words for a language stored by the Live Translate extension.
 *
 * @since 0.2
 *
 * @file ApiQueryLiveTranslate.php
 * @ingroup LiveTranslate
 *
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiQueryLiveTranslate extends ApiQueryBase {
	public function __construct( $main, $action ) {
		parent :: __construct( $main, $action, 'lt' );
	}

	/**
	 * Retrieve the specil words from the database.
	 */
	public function execute() {
		// Get the requests parameters.
		$params = $this->extractRequestParams();
		
		if ( !isset( $params['language'] ) ) {
			$this->dieUsageMsg( array( 'missingparam', 'language' ) );
		}			
		
		$specialWords = LiveTranslateFunctions::getSpecialWordsForLang( $params['language'] );	
		
		$toggeledSpecials = array();
		
		foreach ( $specialWords as $word ) {
			$toggledWord = LiveTranslateFunctions::getToggledCase( $word );
			
			if ( $toggledWord ) {
				$toggeledSpecials[] = $toggledWord;
			}
		}
		
		foreach ( array_unique( array_merge( $specialWords, $toggeledSpecials ) ) as $word ) {
			$this->getResult()->addValue(
				'words',
				null,
				$word
			);			
		}
	}
	
	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getAllowedParams()
	 */
	public function getAllowedParams() {
		return array (
			'language' => array(
				ApiBase::PARAM_TYPE => 'string',
				//ApiBase::PARAM_REQUIRED => true,
			),
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getParamDescription()
	 */
	public function getParamDescription() {
		return array (
			'language' => 'The language for which to return special words',
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getDescription()
	 */
	public function getDescription() {
		return 'This module returns all special words defined in the wikis Live Translate Dictionary for a given language';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getPossibleErrors()
	 */
	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
			array( 'missingparam', 'language' ),
		) );
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getExamples()
	 */
	protected function getExamples() {
		return array (
			'api.php?action=query&list=livetranslate&ltlanguage',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}	
	
}
