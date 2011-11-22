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
	public $timezone;

	/* Functions */

	public function __construct() {
		parent::__construct( 'DailyTotal' );
	}

	public function execute( $sub ) {
		global $wgRequest, $wgOut;

		$this->timezone = $wgRequest->getVal( 'timezone', '0' );
		// Make sure it's a number and reasonable
		if ( is_nan( $this->timezone ) || abs( $this->timezone ) > 100 ) {
			$this->timezone = 0;
		}

		/* Setup */
		$wgOut->disable();
		$this->sendHeaders();
		
		$start = date( 'Y-m-d' ); // Get the current date
		$total = $this->query( $start );
		
		$content = "wgFundraisingDailyTotal = $total;";
		echo $content;
	}

	/* Private Functions */

	private function query( $start ) {
		global $wgMemc, $egFundraiserStatisticsMinimum, $egFundraiserStatisticsMaximum, $egFundraiserStatisticsCacheTimeout;

		$key = wfMemcKey( 'fundraiserstatistics', $this->timezone, $start );
		$cache = $wgMemc->get( $key );
		if ( $cache != false && $cache != -1 ) {
			return $cache;
		}
		$timeShift = $this->timezone * 60 * 60;
		// Use database
		//$dbr = efContributionReportingConnection();
		$dbr = wfGetDB( DB_MASTER );
		$conditions = array(
			'received >= ' . $dbr->addQuotes( wfTimestamp( TS_UNIX, strtotime( $start ) + $timeShift ) ),
			'received <= ' . $dbr->addQuotes( wfTimestamp( TS_UNIX, strtotime( $start ) + 24 * 60 * 60 + $timeShift ) ),
			'converted_amount >= ' . $egFundraiserStatisticsMinimum,
			'converted_amount <= ' . $egFundraiserStatisticsMaximum
		);
		$select = $dbr->select( 'public_reporting',
			array(
				"DATE_FORMAT(FROM_UNIXTIME(received),'%Y-%m-%d')",
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
		
		if ( $total ) {
			$wgMemc->set( $key, $total, $egFundraiserStatisticsCacheTimeout );
			return $total;
		}
		return null;
	}
	
	private function sendHeaders() {
		global $wgJsMimeType;
		header( "Content-type: $wgJsMimeType; charset=utf-8" );
		header( "Cache-Control: public, s-maxage=$this->sharedMaxAge, max-age=$this->maxAge" );
	}
}
