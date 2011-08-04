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
		$http = MWHttpRequest::factory( 'https://www.google.com/accounts/ClientLogin', array(
													'method' => 'POST',
													'postData' => array(
														'accountType' => 'HOSTED_OR_GOOGLE',
														'service' => 'wise', // Spreadsheet service is "wise"
														'Email' => '',
														'Passwd' => '',
														'source' => Http::userAgent() . ' MetricsReporting',
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
			$authToken = rtrim( substr( $content, $pos + strlen( "Auth=" ) ) );
		}

		if ( $authToken === null ) {
			$this->error( 'No auth token', true );
		}

		$cookies = $http->getCookieJar();
		//var_dump( $cookies );
		//var_dump( $authToken );

		$http = MWHttpRequest::factory( $url, array(
												'method' => 'GET',
											)
										);
		$http->setCookieJar( $cookies );
		$http->setHeader( 'GData-Version', '3.0' );
		$http->setHeader( 'Authorization', "GoogleLogin auth=\"{$authToken}\"" );

		$res = $http->execute();
		//var_dump( $res );
		//var_dump( $http->getResponseHeaders() );
		$content = $http->getContent();
		var_dump( $this->formatXmlString( $content ) );
	}

	/**
	 * Pretty print xml string
	 *
	 * From http://recursive-design.com/blog/2007/04/05/format-xml-with-php/
	 *
	 * @param $xml string
	 * @return string
	 */
	function formatXmlString($xml) {

		// add marker linefeeds to aid the pretty-tokeniser (adds a linefeed between all tag-end boundaries)
		$xml = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $xml);

		// now indent the tags
		$token      = strtok($xml, "\n");
		$result     = ''; // holds formatted version as it is built
		$pad        = 0; // initial indent
		$matches    = array(); // returns from preg_matches()

		// scan each line and adjust indent based on opening/closing tags
		while ($token !== false) {

			// test for the various tag states

			// 1. open and closing tags on same line - no change
			if (preg_match('/.+<\/\w[^>]*>$/', $token, $matches)) {
			  $indent=0;
			// 2. closing tag - outdent now
			} elseif (preg_match('/^<\/\w/', $token, $matches)) {
			  $pad -= 3;$indent = 0;
			// 3. opening tag - don't pad this one, only subsequent tags
			} elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches)) {
			 $indent=2;
			// 4. no indentation needed
			} else {
			  $indent = 0;
			}

			// pad the line with the required number of leading spaces
			$line    = str_pad($token, strlen($token)+$pad, ' ', STR_PAD_LEFT);
			$result .= $line . "\n"; // add to the cumulative result, with linefeed
			$token   = strtok("\n"); // get the next token
			$pad    += $indent; // update the pad size for subsequent lines
		}

		return $result;
	}
}

$maintClass = "FetchGoogleSpreadsheet";
require_once( DO_MAINTENANCE );