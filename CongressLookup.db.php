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
		$repData = array();
		$dbr = wfGetDB( DB_SLAVE );
		 
		$zip5 = self::trimZip( $zip, 5 ); // Trim it to 5 digit
		$zip5 = intval( $zip ); // Convert into an integer

		$row = $dbr->selectRow( 'cl_zip5', 'clz5_rep_id', array( 'clz5_zip' => $zip5 ) );
		/* we expect zip codes that split across districts to either be missing from the clz5_zip
		   table or to have NULL for the rep id. */
		if ( ( !$row ) || ( !$row->clz5_rep_id ) ) {
			/* if we got the extra 4 digits, use them */
			$zip9 = intval( self::trimZip( $zip, 9 ) ); // remove the dash and pad if needed
			if ( $zip9 >= 10000 ) {
				$row = $dbr->selectRow( 'cl_zip9', 'clz9_rep_id', array( 'clz9_zip' => $zip9 ) );
				if ( $row ) {
					$rep_id = $row->clz9_rep_id;
				}
			}
		}
		else {
			$rep_id = $row->clz5_rep_id;
		}
		if ( $row ) {
			$res = $dbr->select( 
				'cl_house',
				array(
					'clh_bioguideid',
					'clh_gender',
					'clh_name',
					'clh_title',
					'clh_state',
					'clh_district',
					'clh_phone',
					'clh_fax',
					'clh_contactform',
					'clh_twitter'
				),
				array(
					'clh_id' => $rep_id,
				),
				__METHOD__
			);
			foreach ( $res as $row ) {
				$oneHouseRep = array(
					'bioguideid' => $row->clh_bioguideid,
					'gender' => $row->clh_gender,
					'name' => $row->clh_name,
					'title' => $row->clh_title,
					'state' => $row->clh_state,
					'district' => $row->clh_district,
					'phone' => $row->clh_phone,
					'fax' => $row->clh_fax,
					'contactform' => $row->clh_contactform,
					'twitter' => $row->clh_twitter,
				);
				$repData[] = $oneHouseRep;
			}
			//$repData = $row;
		}
		return $repData;
	}
	
	/**
	 * Given a zip code, return the data for that zip code's senators
	 * @param $zip string
	 * @return array
	 */
	public static function getSenators( $zip ) {
		$senatorData = array();
		$dbr = wfGetDB( DB_SLAVE );
		 
		$zip = self::trimZip( $zip, 3 ); // Trim it to 3 digit
		$zip = intval( $zip ); // Convert into an integer
		$row = $dbr->selectRow( 'cl_zip3', 'clz3_state', array( 'clz3_zip' => $zip ) );
		if ( $row ) {
			$state = $row->clz3_state;
			$res = $dbr->select( 
				'cl_senate',
				array(
					'cls_bioguideid',
					'cls_gender',
					'cls_name',
					'cls_title',
					'cls_state',
					'cls_phone',
					'cls_fax',
					'cls_contactform',
					'cls_twitter'
				),
				array(
					'cls_state' => $state,
				),
				__METHOD__
			);
			foreach ( $res as $row ) {
				$oneSenator = array(
					'bioguideid' => $row->cls_bioguideid,
					'gender' => $row->cls_gender,
					'name' => $row->cls_name,
					'title' => $row->cls_title,
					'state' => $row->cls_state,
					'phone' => $row->cls_phone,
					'fax' => $row->cls_fax,
					'contactform' => $row->cls_contactform,
					'twitter' => $row->cls_twitter
				);
				$senatorData[] = $oneSenator;
			}
		}
		return $senatorData;
	}
	
	/**
	 * Helper method. Trim a zip code, but leave it as a string.
	 * Pad it with leading zeros to fill out to 5 or 9 digits as needed.
	 * @param $zip string: Raw zip code
	 * @param $length integer: How many digits we want to return (from the left)
	 * @return string The trimmed zip code
	 */	
	public static function trimZip( $zip, $length ) {
		$zip = trim( $zip );
		if ( strpos( $zip, '-' ) === False ) {
		    if ( strlen( $zip ) < 5 ) {
				$zip = sprintf( "%05d", $zip );
		    }
		    elseif ( strlen( $zip ) > 5 ) {
				$zip = sprintf( "%09d", $zip );
		    }
		}
		else {
		    $zipPieces = explode( '-', $zip, 2 );
		    if (! $zipPieces[1]) {
				$zipPieces[1] = 0;
		    }
		    $zip = sprintf( "%05d%04d", $zipPieces[0], $zipPieces[1] );
		}
		$zip = substr( $zip, 0, $length );
		return $zip;
	}
}
