<?php
/**
 * Special Page for Contribution statistics extension
 *
 * @file
 * @ingroup Extensions
 */

// Special page ContributionStatistics
class SpecialContributionStatistics extends SpecialPage {

	/* Members */
	
	private $mStartDate;
	private $mEndDate;
	private $mMode;

	/* Functions */

	public function __construct() {
		// Initialize special page
		parent::__construct( 'ContributionStatistics' );
		
		// Internationalization
		wfLoadExtensionMessages( 'ContributionReporting' );
	}
	
	public function execute( $sub ) {
		global $wgRequest, $wgOut, $wgUser;
		global $egContributionStatisticsViewDays;
		
		$this->evalDateRange();
		
		// Handle sub-pages
		if( $sub !== '' ) {
			// Split parameters up
			$params = explode( '/', trim( $sub, '/' ) );
			
			// Handle ranges
			if ( $params[0] == 'range' && isset( $params[1] ) ) {
				$valid = false;
				$range = explode( ':', $params[1] );
				if ( count( $range ) >= 2 ) {
					// From start to end
					$valid = $this->evalDateRange( $range[0], $range[1] );
				} else if ( count( $range ) == 1 ) {
					// From start to end of current fiscal year
					$valid = $this->evalDateRange( $range[0] );
				}
				if ( !$valid ) {
					// Revert changes to range
					$this->evalDateRange();
				}
			}
		}
		
		// Begin output
		$this->setHeaders();
		
		// Show daily totals if the range includes today
		if( $this->mEndDate > time() && $this->mStartDate < time() ) {
			$this->showDailyTotals( $egContributionStatisticsViewDays );
		}
		
		// Show daily totals
		$this->showMonthlyTotals( );
		
		// Show currency totals
		$this->showCurrencyTotals();
		
		// Show contribution breakdown
		$this->showContributionBreakdown();
	}
	
	/* Display Functions */
	
	public function showDailyTotals( $days ) {
		global $wgOut, $wgLang;
		
		$days = $this->getDailyTotals( $days );
		$total = $this->getTotalContributions();
		
		$htmlOut = Xml::element( 'h3', null,
			wfMsgExt( 'contribstats-daily-totals', array( 'parsemag' ), $wgLang->formatNum( count( $days ) ) )
		);
		
		$htmlOut .= Xml::openElement( 'table',
			array( 
				'border' => 0,
				'cellpadding' => 5, 
				'width' => '100%'
			)
		);
		$htmlOut .= Xml::element( 'th', array( 'align' => 'left' ), wfMsg( 'contribstats-day' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'left' ), wfMsg( 'contribstats-contributions' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-total' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-avg' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-min' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-max' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-total-ytd' ) );
		
		// Days
		foreach ( $days as $data ) {
			$htmlOut .= Xml::tags( 'tr', null,
				Xml::element( 'td', array( 'align' => 'left' ), $data[0] ) .
				Xml::element( 'td', array( 'align' => 'left' ), $wgLang->formatNum( $data[1] ) ) .
				Xml::element( 'td', array( 'align' => 'right' ), $wgLang->formatNum( number_format( $data[2], 2 ) ) ) .
				Xml::element( 'td', array( 'align' => 'right' ), $wgLang->formatNum( number_format( $data[3], 2 ) ) ) .
				Xml::element( 'td', array( 'align' => 'right' ), $wgLang->formatNum( number_format( $data[4], 2 ) ) ) .
				Xml::element( 'td', array( 'align' => 'right' ), $wgLang->formatNum( number_format( $data[5], 2 ) ) ) .
				Xml::element( 'td', array( 'align' => 'right' ), $wgLang->formatNum( number_format( $total, 2 ) ) )
			);
			$total -= $data[2];
		}
		
		$htmlOut .= Xml::closeElement( 'table' );
		
		// Output HTML
		$wgOut->addHTML( $htmlOut );
	}
	
	public function showMonthlyTotals() {
		global $wgOut, $wgLang;
		
		$months = $this->getMonthlyTotals();
		$total = $this->getTotalContributions();
		
		$msg = '';
		if ( $this->mMode == 'range' ) {
			$msg = wfMsgExt( 'contribstats-month-range-totals', array( 'parsemag' ), $wgLang->formatNum( count( $months ) ) );
		} else {
			$msg = wfMsgExt( 'contribstats-monthly-totals', array( 'parsemag' ), $wgLang->formatNum( count( $months ) ) );
		}
		$htmlOut = Xml::element( 'h3', null, $msg );
		
		$htmlOut .= Xml::openElement( 'table',
			array( 
				'border' => 0,
				'cellpadding' => 5, 
				'width' => '100%'
			)
		);
		$htmlOut .= Xml::element( 'th', array( 'align' => 'left' ), wfMsg( 'contribstats-month' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'left' ), wfMsg( 'contribstats-contributions' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-total' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-avg' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-min' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-max' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-total-ytd' ) );
		
		// Months
		foreach ( $months as $data ) {
			$htmlOut .= Xml::tags( 'tr', null,
				Xml::element( 'td', array( 'align' => 'left' ), $data[0] ) .
				Xml::element( 'td', array( 'align' => 'left' ), $wgLang->formatNum( $data[1] ) ) .
				Xml::element( 'td', array( 'align' => 'right' ), $wgLang->formatNum( number_format( $data[2], 2 ) ) ) .
				Xml::element( 'td', array( 'align' => 'right' ), $wgLang->formatNum( number_format( $data[3], 2 ) ) ) .
				Xml::element( 'td', array( 'align' => 'right' ), $wgLang->formatNum( number_format( $data[4], 2 ) ) ) .
				Xml::element( 'td', array( 'align' => 'right' ), $wgLang->formatNum( number_format( $data[5], 2 ) ) ) .
				Xml::element( 'td', array( 'align' => 'right' ), $wgLang->formatNum( number_format( $total, 2 ) ) )
			);
			$total -= $data[2];
		}
		
		$htmlOut .= Xml::closeElement( 'table' );
		
		// Output HTML
		$wgOut->addHTML( $htmlOut );
	}
	
	public function showCurrencyTotals() {
		global $wgOut, $wgLang;
		
		$msg = '';
		if ( $this->mMode == 'range' ) {
			$msg = wfMsg( 'contribstats-currency-range-totals',
				$wgLang->date( wfTimestamp( TS_MW, $this->mStartDate ) ),
				$wgLang->date( wfTimestamp( TS_MW, $this->mEndDate ) )
			);
		} else {
			$msg = wfMsg( 'contribstats-currency-totals', $this->getCurrentFiscalYear() );
		}
		$htmlOut = Xml::element( 'h3', null, $msg );
		
		$htmlOut .= Xml::openElement( 'table',
			array( 
				'border' => 0,
				'cellpadding' => 5, 
				'width' => '100%'
			)
		);
		$htmlOut .= Xml::element( 'th', array( 'align' => 'left' ), wfMsg( 'contribstats-currency' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'left' ), wfMsg( 'contribstats-contributions' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-total' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-avg' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-min' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-max' ) );
		
		// Days
		foreach ( $this->getCurrencyTotals() as $data ) {
			$htmlOut .= Xml::tags( 'tr', null,
				Xml::element( 'td', array( 'align' => 'left' ), $data[0] ) .
				Xml::element( 'td', array( 'align' => 'left' ), $wgLang->formatNum( $data[1] ) ) .
				Xml::element( 'td', array( 'align' => 'right' ), $wgLang->formatNum( number_format( $data[2], 2 ) ) ) .
				Xml::element( 'td', array( 'align' => 'right' ), $wgLang->formatNum( number_format( $data[3], 2 ) ) ) .
				Xml::element( 'td', array( 'align' => 'right' ), $wgLang->formatNum( number_format( $data[4], 2 ) ) ) .
				Xml::element( 'td', array( 'align' => 'right' ), $wgLang->formatNum( number_format( $data[5], 2 ) ) )
			);
		}
		
		$htmlOut .= Xml::closeElement( 'table' );
		
		// Output HTML
		$wgOut->addHTML( $htmlOut );
	}
	
	public function showContributionBreakdown() {
		global $wgOut, $wgLang;
		
		$msg = '';
		if ( $this->mMode == 'range' ) {
			$msg = wfMsg( 'contribstats-contribution-range-breakdown',
				$wgLang->date( wfTimestamp( TS_MW, $this->mStartDate ) ),
				$wgLang->date( wfTimestamp( TS_MW, $this->mEndDate ) )
			);
		} else {
			$msg = wfMsg( 'contribstats-contribution-breakdown', $this->getCurrentFiscalYear() );
		}
		$htmlOut = Xml::element( 'h3', null, $msg );
		
		$htmlOut .= Xml::openElement( 'table',
			array( 
				'border' => 0,
				'cellpadding' => 5, 
				'width' => '100%'
			)
		);
		$htmlOut .= Xml::element( 'th', array( 'align' => 'left' ), wfMsg( 'contribstats-amount' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-contributions' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-percentage-ytd' ) );
		$htmlOut .= Xml::element( 'th', array( 'align' => 'right' ), wfMsg( 'contribstats-avg' ) );
		
		$numContributions = $this->getNumContributions();
		$factor = $numContributions > 0 ? 100.0 / $numContributions : 0;
		
		$list = array(
			'Exactly 30.00' => array( 30 ),
			'Exactly 75.00' => array( 75 ),
			'Exactly 100.00' => array( 100 ),
			'Under 99.00' => array( 0, 99.99 ),
			'From 100.00 - 999.99' => array( 100, 999.99 ),
			'Over 1000.00' => array( 1000, 999999999999.99 ),
		);
		foreach( $list as $label => $range ) {
			$data = array();
			if( isset( $range[1] ) ) {
				$data = $this->getNumContributionsWithin( $range[0], $range[1] );
			} else {
				$data = $this->getNumContributionsOf( $range[0] );
			}
			$htmlOut .= Xml::tags( 'tr', null,
				Xml::element( 'td', array( 'align' => 'left' ), $label ) .
				Xml::element( 'td', array( 'align' => 'right' ), $data[0] ) .
				Xml::element( 'td', array( 'align' => 'right' ), round( $data[0] * $factor, 2 ) . '%' ) .
				Xml::element( 'td', array( 'align' => 'right' ), isset( $range[1] ) ? round( $data[1], 2 ) : '-' )
			);
		}
		
		$htmlOut .= Xml::closeElement( 'table' );
		
		// Output HTML
		$wgOut->addHTML( $htmlOut );
	}
	
	/* Query Functions */
	
	public function getDailyTotals( $limit = 30 ) {
		// Get connection
		$dbr = efContributionReportingConnection();
		
		// Select sums and dates of contributions grouped by day
		$res = $dbr->select( 'public_reporting',
			array(
				"FROM_UNIXTIME(received, '%Y-%m-%d')",
				'count(*)',
				'sum(converted_amount)',
				'avg(converted_amount)',
				'min(converted_amount)',
				'max(converted_amount)'
			),
			$this->dateConds( $dbr ),
			__METHOD__,
			array(
				'ORDER BY' => 'received DESC',
				'LIMIT' => $limit,
				'GROUP BY' => "FROM_UNIXTIME(received, '%Y-%m-%d')"
			)
		);
		
		// Build day/value array
		$totals = array();
		while ( $row = $dbr->fetchRow( $res ) ) {
			$totals[] = $row;
		}
		
		// Return results
		return $totals;
	}
	
	public function getMonthlyTotals() {
		// Get connection
		$dbr = efContributionReportingConnection();
		
		// Select sums and dates of contributions grouped by day
		$res = $dbr->select( 'public_reporting',
			array(
				"FROM_UNIXTIME(received, '%Y-%m')",
				'count(*)',
				'sum(converted_amount)',
				'avg(converted_amount)',
				'min(converted_amount)',
				'max(converted_amount)'
			),
			$this->dateConds( $dbr ),
			__METHOD__,
			array(
				'ORDER BY' => 'received DESC',
				'GROUP BY' => "FROM_UNIXTIME(received, '%Y-%m')"
			)
		);
		
		// Build day/value array
		$totals = array();
		while ( $row = $dbr->fetchRow( $res ) ) {
			$totals[] = $row;
		}
		
		// Return results
		return $totals;
	}
	
	public function getCurrencyTotals() {
		// Get connection
		$dbr = efContributionReportingConnection();
		
		// Select sums and dates of contributions grouped by day
		$res = $dbr->select( 'public_reporting',
			array(
				'original_currency',
				'count(*)',
				'sum(converted_amount)',
				'avg(converted_amount)',
				'min(converted_amount)',
				'max(converted_amount)'
			),
			$this->dateConds( $dbr ),
			__METHOD__,
			array(
				'ORDER BY' => 'sum(converted_amount) DESC',
				'GROUP BY' => 'original_currency'
			)
		);
		
		$totals = array();
		while ( $row = $dbr->fetchRow( $res ) ) {
			$totals[$row[0]] = $row;
		}
		
		if ( isset( $totals[null] ) ) {
			// Merge null and USD
			$totals['USD'][1] += $totals[null][1];
			$totals['USD'][2] += $totals[null][2];
			$totals['USD'][3] = ( $totals['USD'][3] + $totals[null][3] ) / 2;
			$totals['USD'][4] = min( $totals['USD'][4], $totals[null][4] );
			$totals['USD'][5] = max( $totals['USD'][5], $totals[null][5] );
			unset( $totals[null] );
		}
		
		// Return results
		return $totals;
	}
	
	public function getNumContributionsWithin( $min, $max ) {
		// Get connection
		$dbr = efContributionReportingConnection();
		
		// Return average contribution amount
		$sizes = array(
				'converted_amount >= ' . $dbr->addQuotes( $min ),
				'converted_amount <= ' . $dbr->addQuotes( $max ),
			);
		$dates = $this->dateConds( $dbr );
		$res = $dbr->select( 'public_reporting',
			array(
				'count(*)',
				'avg(converted_amount)'
			),
			array_merge( $sizes, $dates ),
			__METHOD__
		);
		
		return $dbr->fetchRow( $res );
	}
	
	public function getNumContributionsOf( $value ) {
		// Get connection
		$dbr = efContributionReportingConnection();
		
		// Return average contribution amount
		$res = $dbr->select( 'public_reporting',
			array(
				'count(*)',
				'avg(converted_amount)'
			),
			array(
				'converted_amount' => $value,
			) + $this->dateConds( $dbr ),
			__METHOD__
		);
		
		return $dbr->fetchRow( $res );
	}
	
	public function getNumContributions() {
		// Get connection
		$dbr = efContributionReportingConnection();
		
		// Return average contribution amount
		return $dbr->selectField( 'public_reporting',
			array(
				'count(*)'
			),
			$this->dateConds( $dbr ),
			__METHOD__
		);
	}
	
	public function getTotalContributions() {
		// Get connection
		$dbr = efContributionReportingConnection();
		
		// Return average contribution amount
		return $dbr->selectField( 'public_reporting',
			array(
				'sum(converted_amount)'
			),
			$this->dateConds( $dbr ),
			__METHOD__
		);
	}
	
	protected function dateConds( $dbr ) {
		return
			array(
				'received > ' . $dbr->addQuotes( wfTimestamp( TS_UNIX, $this->mStartDate ) ),
				'received < ' . $dbr->addQuotes( wfTimestamp( TS_UNIX, $this->mEndDate ) )
			);
	}
	
	public function getCurrentFiscalYear() {
		global $egContributionStatisticsFiscalYearCutOff;
		
		$year = date( 'Y' );
		
		// If the cuttoff date is ahead of us in the current calendar year
		if ( time() < strtotime( $egContributionStatisticsFiscalYearCutOff ) ) {
			// Use last year
			$year = date( 'Y' ) - 1;
		}
		
		return $year;
	}
	
	public function evalDateRange( $startDate = null, $endDate = null ) {
		global $egContributionStatisticsFiscalYearCutOff;
		
		if ( $startDate !== null || $endDate !== null ) {
			$this->mMode = 'range';
		} else {
			$this->mMode = false;
		}
		
		$year = $this->getCurrentFiscalYear();
		
		// If there was no start date override
		if ( $startDate === null ) {
			// Use the fiscal year cutoff date
			$this->mStartDate = strtotime( $egContributionStatisticsFiscalYearCutOff . ' ' . $year );
		} else {
			$this->mStartDate = strtotime( $startDate );
		}
		
		// If there was no end date override
		if ( $endDate === null ) {
			// Use the fiscal year cutoff date
			$this->mEndDate = strtotime( $egContributionStatisticsFiscalYearCutOff . ' ' . ( $year + 1 ) );
		} else {
			$this->mEndDate = strtotime( $endDate );
		}
		
		// Catch invalid dates
		return !( $this->mStartDate === false || $this->mEndDate === false );
	}
}
