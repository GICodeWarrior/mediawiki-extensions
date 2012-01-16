<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	echo "CongressLookup extension\n";
	exit( 1 );
}

/**
 * This class creates a page which asks the user for their zip code. It then uses the zip code to
 * look up information about the user's congressional representatives and presents that information
 * to the user.
 */
class SpecialCongressLookup extends UnlistedSpecialPage {

	protected $sharedMaxAge = 600; // Cache for 10 minutes on the server side
	protected $maxAge = 600; // Cache for 10 minutes on the client side
	
	public function __construct() {
		// Register special page
		parent::__construct( 'CongressLookup' );
	}
	
	/**
	 * Handle different types of page requests
	 */
	public function execute( $sub ) {
		global $wgRequest, $wgOut, $wgCongressLookupMaxAge;
		
		// Pull in query string parameters
		$zip = $wgRequest->getVal( 'zip' );
		
		/* Setup */
		$wgOut->setSquidMaxage( $wgCongressLookupMaxAge );
		$this->setHeaders();
		
		/* Display */
		// TODO: Do some work here.
	}
	
}
