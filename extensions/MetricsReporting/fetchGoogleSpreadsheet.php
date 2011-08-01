<?php

$IP = getenv( 'MW_INSTALL_PATH' );
if ( $IP === false ) {
	$IP = dirname( __FILE__ ) . '/../..';
}
require( "$IP/maintenance/Maintenance.php" );

class FetchGoogleSpreadsheet extends Maintenance {
	public function __construct() {
		parent::__construct();
		$this->mDescription = "Grabs and does stuff with a Google Documents Spreadsheet";
		$this->addArg( 'spreadsheet', 'URL or something to document' );
	}

	public function execute() {
		$url = $this->getArg( 0 );

		// Headers
		// GData-Version: 3.0
		$http = MWHttpRequest::factory( 'https://www.google.com/accounts/ClientLogin', array(
													'method' => 'POST',
													'postData' => array(
														'accountType' => 'HOSTED_OR_GOOGLE',
														'service' => 'wise', // Spreadsheet service is "wise"
														'Email' => '',
														'Passwd' => '',
														'source' => Http::userAgent(),
													)
											)
		);

		$res = $http->execute();
		if ( $http->getStatus() == 403 ) {
			$this->error( '403', true );
		}
		//var_dump( $res );
		//var_dump( $http->getResponseHeaders() );
		$content = $http->getContent();
		//var_dump( $content );

		$authToken = null;
		$pos = strpos( $content, 'Auth' );
		if ( $pos !== false ) {
			$authToken = rtrim( substr( $content, $pos + 6 ) );
		}

		if ( $authToken === null ) {
			$this->error( 'No auth token', true );
		}

		//var_dump( $authToken );

		$http = MWHttpRequest::factory( $url, array(
												'method' => 'POST'
											)
										);
		$http->setHeader( 'GData-Version', '3.0' );
		$http->setHeader( 'GAuthorization', 'GoogleLogin auth=' . $authToken );

		var_dump( $res );
		var_dump( $http->getResponseHeaders() );
		$content = $http->getContent();
		var_dump( $content );
	}
}

$maintClass = "FetchGoogleSpreadsheet";
require_once( DO_MAINTENANCE );