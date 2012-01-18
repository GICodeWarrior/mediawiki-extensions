<?php
/**
 * @ingroup Maintenance
 */
if ( getenv( 'MW_INSTALL_PATH' ) ) {
	$IP = getenv( 'MW_INSTALL_PATH' );
} else {
	$IP = dirname(__FILE__).'/../../..';
}

require_once( "$IP/maintenance/Maintenance.php" );

class CheckCongressLinks extends Maintenance {
	public function __construct() {
		$this->mDescription = "Detect bad links in congress contact links.";
	}

	public function execute() {
		$db = wfGetDB( DB_SLAVE );

		$this->output( "Checking House contact links...\n" );
		$res = $db->select( 'cl_house', array( 'clh_name', 'clh_contactform' ) );
		$countOk = $n = 0;
		foreach ( $res as $row ) {
			if ( ( ++$n % 50 ) == 0 ) {
				sleep( 2 ); // rate-limit
			}
			$this->checkContactLink( $row->clh_name, $row->clh_contactform, $countOk );
		}
		$this->output( "...{$countOk} OK / {$res->numRows()} Total\n" );

		$this->output( "\n" );

		$this->output( "Checking Senate contact links...\n" );
		$res = $db->select( 'cl_senate', array( 'cls_name', 'cls_contactform' ) );
		$countOk = $n = 0;
		foreach ( $res as $row ) {
			if ( ( ++$n % 50 ) == 0 ) {
				sleep( 2 ); // rate-limit
			}
			$this->checkContactLink( $row->cls_name, $row->cls_contactform, $countOk );
		}
		$this->output( "...{$countOk} OK / {$res->numRows()} Total\n" );
	}

	protected function checkContactLink( $name, $url, &$countOk ) {
		$req = MWHttpRequest::factory( $url, array( 
				'method'        => 'GET',
				'timeout'       => 8,
				'sslVerifyHost' => false, // just check if it can be reached
				'sslVerifyCert' => false, // just check if it can be reached
		) );
		if ( $req->execute()->isOK() ) {
			++$countOk;
		} else {
			$this->output( "Broken: [$name] [$url]\n" );
		}
	}
}

$maintClass = "CheckCongressLinks";
require_once( RUN_MAINTENANCE_IF_MAIN );
