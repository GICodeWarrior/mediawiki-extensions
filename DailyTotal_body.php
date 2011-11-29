<?php
/**
 * Special Page for Contribution statistics extension
 *
 * @file
 * @ingroup Extensions
 */

class SpecialDailyTotal extends IncludableSpecialPage {

	protected $sharedMaxAge = 600; // Cache for 10 minutes on the server side
	protected $maxAge = 600; // Cache for 10 minutes on the client side

	/* Functions */

	public function __construct() {
		parent::__construct( 'DailyTotal' );
	}

	public function execute( $sub ) {
		global $wgRequest, $wgOut;
		
		$js = $wgRequest->getBool( 'js', false );

		$timezone = $wgRequest->getText( 'timezone', '0' );

		/* Setup */
		$wgOut->disable();
		$this->sendHeaders();
		
		$zoneList = array (
			'-12' => array( 'name' => 'Kwajalein', 'offset' => '-12:00' ),
			'-11' => array( 'name' => 'Pacific/Midway', 'offset' => '-11:00' ),
			'-10' => array( 'name' => 'Pacific/Honolulu', 'offset' => '-10:00' ),
			'-9' => array( 'name' => 'America/Anchorage', 'offset' => '-09:00' ),
			'-8' => array( 'name' => 'America/Los_Angeles', 'offset' => '-08:00' ),
			'-7' => array( 'name' => 'America/Denver', 'offset' => '-07:00' ),
			'-6' => array( 'name' => 'America/Tegucigalpa', 'offset' => '-06:00' ),
			'-5' => array( 'name' => 'America/New_York', 'offset' => '-05:00' ),
			'-4.5' => array( 'name' => 'America/Caracas', 'offset' => '-04:30' ),
			'-4' => array( 'name' => 'America/Halifax', 'offset' => '-04:00' ),
			'-3.5' => array( 'name' => 'America/St_Johns', 'offset' => '-03:30' ),
			'-3' => array( 'name' => 'America/Sao_Paulo', 'offset' => '-03:00' ),
			'-2' => array( 'name' => 'Atlantic/South_Georgia', 'offset' => '-02:00' ),
			'-1' => array( 'name' => 'Atlantic/Azores', 'offset' => '-01:00' ),
			'0' => array( 'name' => 'UTC', 'offset' => '+00:00' ),
			'1' => array( 'name' => 'Europe/Belgrade', 'offset' => '+01:00' ),
			'2' => array( 'name' => 'Europe/Minsk', 'offset' => '+02:00' ),
			'3' => array( 'name' => 'Asia/Kuwait', 'offset' => '+03:00' ),
			'3.5' => array( 'name' => 'Asia/Tehran', 'offset' => '+03:30' ),
			'4' => array( 'name' => 'Asia/Muscat', 'offset' => '+04:00' ),
			'5' => array( 'name' => 'Asia/Yekaterinburg', 'offset' => '+05:00' ),
			'5.5' => array( 'name' => 'Asia/Kolkata', 'offset' => '+05:30' ),
			'5.75' => array( 'name' => 'Asia/Katmandu', 'offset' => '+05:45' ),
			'6' => array( 'name' => 'Asia/Dhaka', 'offset' => '+06:00' ),
			'6.5' => array( 'name' => 'Asia/Rangoon', 'offset' => '+06:30' ),
			'7' => array( 'name' => 'Asia/Krasnoyarsk', 'offset' => '+07:00' ),
			'8' => array( 'name' => 'Asia/Brunei', 'offset' => '+08:00' ),
			'9' => array( 'name' => 'Asia/Seoul', 'offset' => '+09:00' ),
			'9.5' => array( 'name' => 'Australia/Darwin', 'offset' => '+09:30' ),
			'10' => array( 'name' => 'Australia/Canberra', 'offset' => '+10:00' ),
			'11' => array( 'name' => 'Asia/Magadan', 'offset' => '+11:00' ),
			'12' => array( 'name' => 'Pacific/Fiji', 'offset' => '+12:00' ),
			'13' => array( 'name' => 'Pacific/Tongatapu', 'offset' => '+13:00' ),
		);
		
		// Translate timezone param to timezone name for PHP
		if ( array_key_exists( $timezone, $zoneList ) ) {
			$timeZoneName = $zoneList[$timezone]['name'];
		} else {
			$timeZoneName = 'UTC';
		}
		
		// Translate timezone param to timezone offset for MySQL
		if ( array_key_exists( $timezone, $zoneList ) ) {
			$timeZoneOffset = $zoneList[$timezone]['offset'];
		} else {
			$timeZoneOffset = '+00:00';
		}
		
		$setTimeZone = date_default_timezone_set( $timeZoneName );
		$start = date( 'Y-m-d' ); // Get the current date in the requested timezone
		$total = $this->query( $timeZoneOffset, $start );
		
		$content = "wgFundraisingDailyTotal = $total;";
		
		if ( $js ) {
			echo $content;
		} else {
			echo $total;
		}
	}

	/* Private Functions */

	private function query( $timeZoneOffset, $start ) {
		global $wgMemc, $egFundraiserStatisticsMinimum, $egFundraiserStatisticsMaximum, $egFundraiserStatisticsCacheTimeout;

		$key = wfMemcKey( 'fundraiserstatistics', $timeZoneOffset, $start );
		$cache = $wgMemc->get( $key );
		if ( $cache != false && $cache != -1 ) {
			return $cache;
		}
		
		// We're only interested in donations from the past 2 days at most
		$recentTime = time() - 60 * 60 * 48;
		
		// Use database
		$dbr = efContributionReportingConnection();
		#$dbr = wfGetDB( DB_MASTER );
		$conditions = array(
			'received > ' . $recentTime,
			'converted_amount >= ' . $egFundraiserStatisticsMinimum,
			'converted_amount <= ' . $egFundraiserStatisticsMaximum,
			"DATE_FORMAT(CONVERT_TZ(FROM_UNIXTIME(received),'+00:00','$timeZoneOffset'),'%Y-%m-%d') = '$start'"
		);
		
		$select = $dbr->select( 'public_reporting',
			array(
				'sum(converted_amount)'
			),
			$conditions,
			__METHOD__
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

	public function isListed(){
		return false;
	}
}
