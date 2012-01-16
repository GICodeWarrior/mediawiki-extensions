<?php
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
		
		// Setup
		$wgOut->setSquidMaxage( $wgCongressLookupMaxAge );
		$this->setHeaders();
		
		if ( $zip ) {
			//$zip = $this->trimZip( $zip );
			$this->showMatches( $zip );
		}
	}
	
	/**
	 * Given a zip code, output HTML-formatted data for the representatives for that area
	 * @param $zip string: A zip code
	 * @return true
	 */
	private function showMatches( $zip ) {
		global $wgOut;
		
		$myRepresentative = array();
		$mySenators = array();
		$myRepresentative = CongressLookupDB::getRepresentative( $zip );
		$mySenators = CongressLookupDB::getSenators( $zip );
		
		// TODO: stuffz.
	}
	
}
