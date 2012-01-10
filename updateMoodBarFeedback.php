<?php
/**
 * Update moodbar_feedback.mbf_latest_response with the latest response id
 *
 * @ingroup Maintenance
 */

$IP = getenv( 'MW_INSTALL_PATH' );
if ( $IP === false ) {
	$IP = dirname( __FILE__ ) . '/../..';
}
require_once( "$IP/maintenance/Maintenance.php" );

class UpdateMoodBarFeedback extends LoggedUpdateMaintenance {
	public function __construct() {
		parent::__construct();
		$this->mDescription = "Update moodbar_feedback.mbf_latest_response with the corresponding latest moodbar_feedback_response.mbfr_id";
	}

	protected function getUpdateKey() {
		return 'update moodbar_feedback.mbf_latest_response';
	}

	protected function updateSkippedMessage() {
		return 'mbf_latest_response in moodbar_feedback table is already updated.';
	}

	protected function doDBUpdates() {
		$db = wfGetDB( DB_MASTER );

		$this->output( "Updating mbf_latest_response in moodbar_feedback table...\n" );

		// Grab the feedback record with mbf_latest_response = 0
		$res = $db->select( array( 'moodbar_feedback', 'moodbar_feedback_response' ), 
					array( 'MAX(mbfr_id) AS latest_mbfr_id', 'mbf_id' ),
					array( 'mbf_id=mbfr_mbf_id', 'mbf_latest_response' => 0 ),
					__METHOD__,
					array( 'GROUP BY' => 'mbfr_mbf_id' )
		);
		$count = 0;
		foreach ( $res as $row ) {
			$count++;
			if ( $count % 100 == 0 ) {
				$this->output( $count . "\n" );
				wfWaitForSlaves();
			}
			$db->update( 'moodbar_feedback',
					array( 'mbf_latest_response' => intval( $row->latest_mbfr_id ) ),
					array( 'mbf_id' => intval( $row->mbf_id ) ),
					__METHOD__ );
		}
		$this->output( "Done, $count rows updated.\n" );
		return true;
	}
}

$maintClass = "UpdateMoodBarFeedback";
require_once( RUN_MAINTENANCE_IF_MAIN );
