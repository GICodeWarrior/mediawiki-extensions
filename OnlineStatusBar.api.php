<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	echo "This is a part of mediawiki and can't be started separately";
	die();
}

/**
 * Hooks for OnlineStatusBar api's
 *
 * @group Extensions
 */

class ApiOnlineStatus extends ApiQueryBase {
	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'onlinestatus' );
	}

	public function execute() {
		$params = $this->extractRequestParams();
		if (is_string ( $params['user'] )) {
			$result = OnlineStatusBar::getUserInfoFromString( $params['user'] );
			// if user is IP and we track them
			if ( User::isIP( $params['user'] ) && $result === false ) {
				$result = OnlineStatusBar::getAnonFromString( $params['user'] );
			}
			if ( $result === false ) {
				$ret = 'unknown';
			} else {
				$ret = $result[0];
			}

			$this->getResult()->addValue(
				null, $this->getModuleName(), array( 'result' => $ret ) );
		} else
		{
			$this->dieUsage( "You provided invalid user." );
		}
	}

	public function getAllowedParams() {
		return array(
			'user' => null,
		);
	}

	public function getParamDescription() {
		return array(
			'user' => 'Username of user you want to get status of',
		);
	}

	public function getDescription() {
		return 'Returns online status of user.';
	}

	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
		array( 'code' => 'unknown', 'info' => "User doesn't allow to display user status"),
		));
	}

	public function getExamples() {
		return array(
		'api.php?action=query&list=onlinestatus&onlinestatususer=Petrb',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id: OnlineStatusBar.api.php 90814 2011-12-01 15:00:00Z petrb $';
	}
}
