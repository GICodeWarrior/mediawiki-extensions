<?php
/**
 * This class creates a page which asks the user for their zip code. It then uses the zip code to
 * look up information about the user's congressional representatives and presents that information
 * to the user.
 */
class SpecialCongressLookup extends UnlistedSpecialPage {
	var $zip;
	
	public function __construct() {
		// Register special page
		parent::__construct( 'CongressLookup' );
	}
	
	/**
	 * Handle different types of page requests
	 */
	public function execute( $sub ) {
		global $wgRequest, $wgOut;
		
		// Pull in query string parameters
		$this->zip = $wgRequest->getVal( 'zip' );
		
		// Setup
		$wgOut->disable();
		$this->sendHeaders();
		
		$this->buildPage();
		
	}
	
	/**
	 * Generate the HTTP response headers for the landing page
	 */
	private function sendHeaders() {
		global $wgCongressLookupSharedMaxAge, $wgCongressLookupMaxAge;
		header( "Content-type: text/html; charset=utf-8" );
		header( "Cache-Control: public, s-maxage=$wgCongressLookupSharedMaxAge, max-age=$wgCongressLookupMaxAge" );
	}
	
	/**
	 * Build the HTML for the page
	 * @return true
	 */
	private function buildPage() {
		$htmlOut = '';
		
		$dir = dirname( __FILE__ ) . '/';
		
		// Output beginning of the page
		$filename = $dir."includes/pageBegin.html";
		$handle = fopen( $filename, "r" );
		$htmlOut .= fread( $handle, filesize( $filename ) );
		fclose( $handle );
		
		if ( $this->zip ) {
			$htmlOut .= $this->getCongressTable();
		}
		
		// Output end of the page
		$htmlOut .= "\n</body>\n</html>\n";
		
		echo $htmlOut;
		
		return true;
	}
	
	/**
	 * Get an HTML table of data for the user's congressional representatives
	 * @return HTML for the table
	 */
	private function getCongressTable() {
		$myRepresentative = array();
		$mySenators = array();
		$myRepresentative = CongressLookupDB::getRepresentative( $this->zip );
		$mySenators = CongressLookupDB::getSenators( $this->zip );
		
		$congressTable = '';
		
		//TODO: Change this so it looks like... anything. 
		$congressTable .= '<pre>' . print_r( $myRepresentative, true ) . '</pre>';
		$congressTable .= '<pre>' . print_r( $mySenators, true ) . '</pre>';
		
		return $congressTable;
	}
	
}
