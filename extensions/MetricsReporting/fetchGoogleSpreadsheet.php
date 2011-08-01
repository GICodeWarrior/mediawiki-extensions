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
		$res = Http::request( 'GET', $url );
		var_dump( $res );
	}
}

$maintClass = "FetchGoogleSpreadsheet";
require_once( DO_MAINTENANCE );