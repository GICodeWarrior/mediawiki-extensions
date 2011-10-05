<?php

/**
 * API module to get a list of contestants.
 *
 * @since 0.1
 *
 * @file ApiQueryContestants.php
 * @ingroup Contest
 * @ingroup API
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiQueryContestants extends ApiContestQuery {
	
	protected function getClassName() {
		return 'ContestContestant';
	}
	
	public function __construct( $main, $action ) {
		parent::__construct( $main, $action, 'ct' );
	}

	/**
	 * Handle the API request.
	 * Checks for access rights and then let's the parent method do the actual work.
	 */
	public function execute() {
		global $wgUser;
		
		if ( !$wgUser->isAllowed( 'contestadmin' ) || $wgUser->isBlocked() ) {
			$this->dieUsageMsg( array( 'badaccess-groups' ) );
		}

		parent::execute();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getDescription()
	 */
	public function getDescription() {
		return 'API module for querying contestants';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getExamples()
	 */
	protected function getExamples() {
		return array (
			'api.php?action=query&list=contestants&ctprops=id|user_id|contest_id|rating',
			'api.php?action=query&list=contestants&ctprops=id|rating&ctcontestid=42',
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see includes/api/ApiBase#getVersion()
	 */
	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
	
}
