<?php
/**
 * Special Page for Contribution statistics extension
 *
 * @file
 * @ingroup Extensions
 */

class SpecialDailyTotal extends IncludableSpecialPage {

	protected $sharedMaxAge = 300; // Cache for 5 minutes on the server side
	protected $maxAge = 300; // Cache for 5 minutes on the client side

	/* Functions */

	public function __construct() {
		parent::__construct( 'DailyTotal' );
	}

	public function execute( $sub ) {
		global $wgRequest, $wgOut;
		
		$js = $wgRequest->getBool( 'js', false );

		$timezone = $wgRequest->getText( 'timezone', '0:00' );

		/* Setup */
		$wgOut->disable();
		$this->sendHeaders();
		
		$zoneList = array (
			'-12:00' => 'Kwajalein',
			'-11:00' => 'Pacific/Midway',
			'-10:00' => 'Pacific/Honolulu',
			'-9:00' => 'America/Anchorage',
			'-09:00' => 'America/Anchorage',
			'-8:00' => 'America/Los_Angeles',
			'-08:00' => 'America/Los_Angeles',
			'-7:00' => 'America/Denver',
			'-07:00' => 'America/Denver',
			'-6:00' => 'America/Tegucigalpa',
			'-06:00' => 'America/Tegucigalpa',
			'-5:00' => 'America/New_York',
			'-05:00' => 'America/New_York',
			'-4:30' => 'America/Caracas',
			'-04:30' => 'America/Caracas',
			'-4:00' => 'America/Halifax',
			'-04:00' => 'America/Halifax',
			'-3:30' => 'America/St_Johns',
			'-03:30' => 'America/St_Johns',
			'-3:00' => 'America/Sao_Paulo',
			'-03:00' => 'America/Sao_Paulo',
			'-2:00' => 'Atlantic/South_Georgia',
			'-02:00' => 'Atlantic/South_Georgia',
			'-1:00' => 'Atlantic/Azores',
			'-01:00' => 'Atlantic/Azores',
			'0:00' => 'UTC',
			'00:00' => 'UTC',
			'1:00' => 'Europe/Belgrade',
			'01:00' => 'Europe/Belgrade',
			'2:00' => 'Europe/Minsk',
			'02:00' => 'Europe/Minsk',
			'3:00' => 'Asia/Kuwait',
			'03:00' => 'Asia/Kuwait',
			'3:30' => 'Asia/Tehran',
			'03:30' => 'Asia/Tehran',
			'4:00' => 'Asia/Muscat',
			'04:00' => 'Asia/Muscat',
			'5:00' => 'Asia/Yekaterinburg',
			'05:00' => 'Asia/Yekaterinburg',
			'5:30' => 'Asia/Kolkata',
			'05:30' => 'Asia/Kolkata',
			'5:45' => 'Asia/Katmandu',
			'05:45' => 'Asia/Katmandu',
			'6:00' => 'Asia/Dhaka',
			'06:00' => 'Asia/Dhaka',
			'6:30' => 'Asia/Rangoon',
			'06:30' => 'Asia/Rangoon',
			'7:00' => 'Asia/Krasnoyarsk',
			'07:00' => 'Asia/Krasnoyarsk',
			'8:00' => 'Asia/Brunei',
			'08:00' => 'Asia/Brunei',
			'9:00' => 'Asia/Seoul',
			'09:00' => 'Asia/Seoul',
			'9:30' => 'Australia/Darwin',
			'09:30' => 'Australia/Darwin',
			'10:00' => 'Australia/Canberra',
			'11:00' => 'Asia/Magadan',
			'12:00' => 'Pacific/Fiji',
			'13:00' => 'Pacific/Tongatapu',
		);
		
		// Translate offset to timezone name for PHP
		if ( array_key_exists( $timezone, $zoneList ) ) {
			$timeZoneName = $zoneList[$timezone];
		} else {
			$timeZoneName = 'UTC';
		}
		
		$setTimeZone = date_default_timezone_set( $timeZoneName );
		$start = date( 'Y-m-d' ); // Get the current date in the requested timezone
		$total = $this->query( $timezone, $start );
		
		$content = "wgFundraisingDailyTotal = $total;";
		
		if ( $js ) {
			echo $content;
		} else {
			echo $total;
		}
	}

	/* Private Functions */

	private function query( $timezone, $start ) {
		global $wgMemc, $egFundraiserStatisticsMinimum, $egFundraiserStatisticsMaximum, $egFundraiserStatisticsCacheTimeout;

		$key = wfMemcKey( 'fundraiserstatistics', $timezone, $start );
		$cache = $wgMemc->get( $key );
		if ( $cache != false && $cache != -1 ) {
			return $cache;
		}
		
		// Use database
		$dbr = efContributionReportingConnection();
		#$dbr = wfGetDB( DB_MASTER );
		$conditions = array(
			'converted_amount >= ' . $egFundraiserStatisticsMinimum,
			'converted_amount <= ' . $egFundraiserStatisticsMaximum,
			"DATE_FORMAT(CONVERT_TZ(FROM_UNIXTIME(received),'+00:00','$timezone'),'%Y-%m-%d') = '$start'"
		);
		
		$select = $dbr->select( 'public_reporting',
			array(
				'sum(converted_amount)'
			),
			$conditions,
			__METHOD__,
			array(
				'ORDER BY' => 'received'
			)
		);
		$row = $dbr->fetchRow( $select );
		$total = $row['sum(converted_amount)'];
		if ( !$total ) $total = 0;
		
		$wgMemc->set( $key, $total, $egFundraiserStatisticsCacheTimeout );
		return $total;
	}
	
	private function sendHeaders() {
		global $wgJsMimeType;
		header( "Content-type: $wgJsMimeType; charset=utf-8" );
		header( "Cache-Control: public, s-maxage=$this->sharedMaxAge, max-age=$this->maxAge" );
	}
}
