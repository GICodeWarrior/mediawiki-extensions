<?php
/**
 * Special Page for Contribution statistics extension
 *
 * @file
 * @ingroup Extensions
 */

class SpecialYearlyTotal extends IncludableSpecialPage {

	protected $sharedMaxAge = 600; // Cache for 10 minutes on the server side
	protected $maxAge = 600; // Cache for 10 minutes on the client side

	/* Functions */

	public function __construct() {
		parent::__construct( 'YearlyTotal' );
	}

	public function execute( $sub ) {
		global $wgRequest, $wgOut, $egFundraiserStatisticsFundraisers;
		
		$js = $wgRequest->getBool( 'js', false );
		
		$adjustment = $wgRequest->getVal( 'adjustment' );
		// Make sure it's a number
		if ( is_nan( $adjustment ) ) {
			$adjustment = 0;
		}

		/* Setup */
		$wgOut->disable();
		$this->sendHeaders();
		
		$total = $this->query( $adjustment );
		
		$content = "wgFundraisingYearlyTotal = $total;";
		
		if ( $js ) {
			echo $content;
		} else {
			echo $total;
		}
	}

	/* Private Functions */

	private function query( $adjustment ) {
		global $wgMemc, $egFundraiserStatisticsCacheTimeout, $egFundraiserStatisticsFundraisers;
		
		$currenctFundraiserIndex = count( $egFundraiserStatisticsFundraisers ) - 1;
		$year = $egFundraiserStatisticsFundraisers[$currenctFundraiserIndex]['id'];

		$key = wfMemcKey( 'fundraiserstatistics', $year, $adjustment );
		$cache = $wgMemc->get( $key );
		if ( $cache != false && $cache != -1 ) {
			return $cache;
		}
		
		// Get the timestamp for the start of the current fundraiser
		// Note: This depends on the fundraisers being listed in chronological order
		$start = strtotime( $egFundraiserStatisticsFundraisers[$currenctFundraiserIndex]['start'] );
		$start = intval( wfTimestampOrNull( TS_UNIX, $start ) );

		$total = efContributionReportingTotal( $start, $adjustment );
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
