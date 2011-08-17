<?php

require( "MetricsMaintenance.php" );

class FetchGoogleSpreadsheet extends MetricsMaintenance {
	public function __construct() {
		parent::__construct();
		$this->mDescription = "Grabs and does stuff with a Google Documents Spreadsheet";
		$this->addArg( 'spreadsheet', 'URL or something to document' );
	}

	public function execute() {
		$url = $this->getArg( 0 );

		// Headers
		$http = MWHttpRequest::factory( 'https://www.google.com/accounts/ClientLogin',
			array(
				'method' => 'POST',
				'postData' => array(
					'accountType' => 'HOSTED_OR_GOOGLE',
					'service' => 'wise', // Spreadsheet service is "wise"
					'Email' => '',
					'Passwd' => '',
					'source' => self::getUserAgent(),
				)
			)
		);
		$http->setHeader( 'User-Agent', self::getUserAgent() );

		$res = $http->execute();
		if ( $http->getStatus() == 403 ) {
			$this->error( '403', true );
		}

		$content = $http->getContent();

		$authToken = null;
		$pos = strpos( $content, 'Auth' );
		if ( $pos !== false ) {
			$authToken = rtrim( substr( $content, $pos + strlen( "Auth=" ) ) );
		}

		if ( $authToken === null ) {
			$this->error( 'No auth token returned. Check your Google Credentials', true );
		}
		$this->output( "Authorised. Got an authorisation token from Google\n" );

		$cookies = $http->getCookieJar();
		$http = $this->buildAuthedRequest( $url, $authToken, $cookies );

		$http->execute();
		$content = $http->getContent();

		$reader = new XMLReader();
		$reader->XML( $content );

		while ( $reader->read() && $reader->name !== 'entry' );

		$worksheets = array();
		while ( $reader->name === 'entry' ) {

			$node = new SimpleXMLElement( $reader->readOuterXML() );

			//$src = (string)$node->content["src"];
			$src = $node->content->attributes()->src;
			$this->output( 'Worksheet found: ' . $src );
			$worksheets[] = $src;

			// go to next <entry />
			$reader->next( 'entry' );
		}

		foreach( $worksheets as $sheet ) {
			$http = $this->buildAuthedRequest( $sheet, $authToken, $cookies );
			$http->execute();
			$content = $http->getContent();
			var_dump( $this->formatXmlString( $content ) );
		}

		$this->output( "Finished!\n" );
	}

	/**
	 * Pretty print xml string
	 *
	 * @param $xml string
	 * @return string
	 */
	function formatXmlString( $xml ) {
		$dom = new DOMDocument;
		$dom->preserveWhiteSpace = false;
		$dom->loadXML( $xml );
		$dom->formatOutput = true;
		return $dom->saveXml();
	}

	/**
	 * @param $url string
	 * @param $token string
	 * @param $cookies CookieJar
	 * @return MWHttpRequest
	 */
	function buildAuthedRequest( $url, $token, $cookies = null ) {
		$http = MWHttpRequest::factory( $url, array(
				'method' => 'GET',
			)
		);
		$http->setHeader( 'User-Agent', self::getUserAgent() );
		if ( $cookies !== null ) {
			$http->setCookieJar( $cookies );
		}
		$http->setHeader( 'GData-Version', '3.0' );
		$http->setHeader( 'Authorization', "GoogleLogin auth=\"{$token}\"" );
		return $http;
	}

	/**
	 * @return string
	 */
	private static function getUserAgent() {
		return Http::userAgent() . ' MetricsReporting/' . METRICS_REPORTING_VERSION;
	}
}

$maintClass = "FetchGoogleSpreadsheet";
require_once( DO_MAINTENANCE );
