<?php

// Standard boilerplate to define $IP
if ( getenv( 'MW_INSTALL_PATH' ) !== false ) {
        $IP = getenv( 'MW_INSTALL_PATH' );
} else {
        $dir = dirname( __FILE__ ); $IP = "$dir/../../..";
}
require_once( "$IP/maintenance/Maintenance.php" );

class FixNarayamDisablePref extends Maintenance {
	function __construct() {
		parent::__construct();
	}

	function execute() {
		$dbw = wfGetDB( DB_MASTER );

		$table = 'user_properties';
		$oldPropName = 'narayamDisable';
		$newPropName = 'narayamEnable';
		echo "Fixing $oldPropName to $newPropName\n";

		$batchSize = 100;
		$allIds = array();
		while ( true ) {
			$dbw->begin();
			$res = $dbw->select(
				$table,
				array( 'up_user' ),
				array( 'up_property' => $oldPropName, 'up_value' => 1 ),
				__METHOD__,
				array( 'LIMIT' => $batchSize, 'FOR UPDATE' ) );
			if ( !$res->numRows() ) {
				$dbw->commit();
				break;
			}

			$ids = array();
			foreach ( $res as $row ) {
				$ids[] = $row->up_user;
			}
			$dbw->update(
				$table,
				array( 'up_property' => $newPropName, 'up_value' => 0 ),
				array( 'up_property' => $oldPropName, 'up_user' => $ids ),
				__METHOD__ );

			wfWaitForSlaves( 10 );
		}

		echo "Done\n";
	}
}

$maintClass = 'FixNarayamDisablePref';
require_once( RUN_MAINTENANCE_IF_MAIN );
