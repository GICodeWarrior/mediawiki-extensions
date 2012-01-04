<?php

/**
 * Utility class for MoodBar
 */
class MoodBarUtil {

	/**
	 * Calculate the time diff between $time and now, format the time diff to have the largest time block
	 * or 'less than 1 minute' if the time diff is less than 1 minute
	 * @param $time string - the UNIX time stamp
	 * @return string - formatted time string
	 */
	public static function formatTimeSince( $time ) {
		
		$blocks = array( array( 'total' => 60 * 60 * 24 * 365, 'name' => 'years' ),
					array( 'total' => 60 * 60 * 24 * 30, 'name' => 'months'),
					array( 'total' => 60 * 60 * 24 * 7, 'name' => 'weeks'),
					array( 'total' => 60 * 60 * 24, 'name' => 'days'),
					array( 'total' => 60 * 60, 'name' => 'hours'),
					array( 'total' => 60, 'name' => 'minutes') );

		$since = wfTimestamp( TS_UNIX ) - $time;
		$displayTime = 0;
		$displayBlock = '';

		// get the largest time block, 1 minute 35 seconds -> 2 minutes
		for ( $i = 0, $count = count( $blocks ); $i < $count; $i++ ) {
			$seconds = $blocks[$i]['total'];
			$displayTime = floor( $since / $seconds );
			
			if ( $displayTime > 0 ) {
				$displayBlock = $blocks[$i]['name'];
				// round up if the remaining time is greater than
				// half of the time unit
				if ( ( $since % $seconds ) >= ( $seconds / 2 ) ) {
					$displayTime++;
					
					//advance to upper unit if possible, eg, 24 hours to 1 day
					if ( isset( $blocks[$i-1] ) && $displayTime * $seconds ==  $blocks[$i-1]['total'] ) {
						$displayTime = 1;
						$displayBlock = $blocks[$i-1]['name'];
					}
					
				}
				break;
			}
		}

		if ( $displayTime > 0 ) {
			global $wgLang;
			
			// message key defined in moodbar only
			if ( in_array( $displayBlock, array( 'years', 'months', 'weeks' ) ) ) {
				$messageKey = 'moodbar-' . $displayBlock;
			}
			else {
				$messageKey = $displayBlock;
			}
			
			return wfMessage( $messageKey )->params( $wgLang->formatNum( $displayTime ) )->escaped();

		} else {
			return wfMessage( 'moodbar-seconds' )->escaped();
		}
	
	}

}