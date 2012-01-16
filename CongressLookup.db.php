<?php
/**
 * Static methods that retrieve information from the database.
 */
class CongressLookupDB {

	/**
	 * Given a zip code, return the data for that zip code's congressional representative
	 * @param $zip string
	 * @return array
	 */
	public static function getRepresentative( $zip ) {
		$dbr = wfGetDB( DB_SLAVE );
		 
		$zip = self::trimZip( $zip, 5 ); // Trim it to 5 digit
		$zip = intval( $zip ); // Convert into an integer

		$row = $dbr->selectRow( 'cl_zip5', 'sz5_rep_id', array( 'sz5_zip' => $zip ) );
		if ( $row ) {
			// TODO: stuffz.
		}
	}
	
	/**
	 * Given a zip code, return the data for that zip code's senators
	 * @param $zip string
	 * @return array
	 */
	public static function getSenators( $zip ) {
		$dbr = wfGetDB( DB_SLAVE );
		 
		$zip = self::trimZip( $zip, 3 ); // Trim it to 3 digit
		$zip = intval( $zip ); // Convert into an integer

		$row = $dbr->selectRow( 'cl_zip3', 'sz3_state', array( 'sz3_zip' => $zip ) );
		if ( $row ) {
			// TODO: stuffz.
		}
	}
	
	/**
	 * Helper method. Trim a zip code, but leave it as a string.
	 * @param $zip string: Raw zip code
	 * @param $length integer: How many digits we want to return (from the left)
	 * @return string The trimmed zip code
	 */	
	public static function trimZip( $zip, $length ) {
		$zip = trim( $zip );
		$zipPieces = explode( '-', $zip, 2 );
		$zip = substr( $zipPieces[0], 0, $length );
		return $zip;
	}
}
