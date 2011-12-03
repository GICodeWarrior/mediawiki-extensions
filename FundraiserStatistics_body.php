<?php
/**
 * Special Page for Contribution statistics extension
 *
 * @file
 * @ingroup Extensions
 */

class SpecialFundraiserStatistics extends SpecialPage {

	/* Functions */

	public function __construct() {
		parent::__construct( 'FundraiserStatistics' );
	}

	public function execute( $sub ) {
		global $wgRequest, $wgOut, $wgLang, $wgScriptPath, $egFundraiserStatisticsFundraisers;

		$showYear = array();
		foreach ( $egFundraiserStatisticsFundraisers as $fundraiser ) {
			if ( $wgRequest->wasPosted() ) {
				$showYear[$fundraiser['id']] = $wgRequest->getCheck( 'toogle'.$fundraiser['id'] );
			} else {
				// By default, show only the fundraising years after 2008
				if ( intval( $fundraiser['id'] ) > 2008 ) {
					$showYear[$fundraiser['id']] = true;
				} else {
					$showYear[$fundraiser['id']] = false;
				}
			}
		}

		/* Configuration (this isn't totally static data, some of it gets built on the fly) */

		$charts = array(
			'totals' => array(
				'data' => array(),
				'index' => 1,
				'query' => 'dailyTotalMax',
				'precision' => 2,
				'label' => 'fundraiserstats-total',
				'max' => 1,
			),
			'contributions' => array(
				'data' => array(),
				'index' => 2,
				'query' => 'contributionsMax',
				'precision' => 0,
				'label' => 'fundraiserstats-contributions',
				'max' => 1,
			),
			'averages' => array(
				'data' => array(),
				'index' => 3,
				'query' => 'averagesMax',
				'precision' => 2,
				'label' => 'fundraiserstats-avg',
				'max' => 1,
			),
			'maximums' => array(
				'data' => array(),
				'index' => 4,
				'query' => 'maximumsMax',
				'precision' => 2,
				'label' => 'fundraiserstats-max',
				'max' => 1,
			),
			'ytd' => array(
				'data' => array(),
				'index' => 5,
				'query' => 'yearlyTotalMax',
				'precision' => 2,
				'label' => 'fundraiserstats-ytd',
				'max' => 1,
			),
		);

		/* Setup */

		$this->setHeaders();
		$wgOut->addModules( 'ext.fundraiserstatistics' );

		/* Display */

		$wgOut->addWikiMsg( 'contribstats-header' ); // Header (typically empty)
		
		// Chart maximums
		foreach ( $egFundraiserStatisticsFundraisers as $fundraiser ) {
			foreach ( $charts as $name => $chart ) {
				$chartMax = $this->query( $charts[$name]['query'], $fundraiser['start'], $fundraiser['end'] );
				if ( $chartMax > $charts[$name]['max'] ) {
					$charts[$name]['max'] = $chartMax;
				}
			}
		}
		// Scale factors
		foreach ( $charts as $name => $chart ) {
			$charts[$name]['factor'] = 300 / $chart['max'];
		}
		
		// HTML-time!
		
		// Each bar on the graph is associated with an individual data table. The ID linking the
		// bar and the table is stored in $dataTableId.
		$dataTableId = 0;
		$dataTablesHtml = ''; // This will contain the HTML for all the data tables
		foreach ( $egFundraiserStatisticsFundraisers as $fundraiserIndex => $fundraiser ) {
		
			// Get all the daily data for a particular fundraiser
			$days = $this->query( 'dailyTotals', $fundraiser['start'], $fundraiser['end'] );
			
			// See if this is the most recent fundraiser or not
			if ( $fundraiserIndex == count( $egFundraiserStatisticsFundraisers ) - 1 ) {
				$mostRecentFundraiser = true;
			} else {
				$mostRecentFundraiser = false;
			}
			
			foreach ( $charts as $name => $chart ) {
				$column = 0;
				foreach( $days as $i => $day ) {
					if ( !isset( $charts[$name]['data'][$column] ) ) {
						$charts[$name]['data'][$column] = '';
					}

					// Add spacer between days
					if ( $fundraiserIndex == 0 ) {
						$attributes = array(
							'style' => 'height:1px',
							'class' => 'fundraiserstats-bar-space'
						);
						$charts[$name]['data'][$column] .= Xml::tags(
							'td', array( 'valign' => 'bottom' ), Xml::element( 'div', $attributes, '', false )
						);
					}

					$height = $chart['factor'] * $day[$chart['index']];
					$style = "height:{$height}px;";
					if ( $showYear[$fundraiser['id']] !== true ) {
						$style .= "display:none;";
					}
					$attributes = array(
						'style' => $style,
						'class' => "fundraiserstats-bar fundraiserstats-bar-{$fundraiser['id']}",
						'rel' => "fundraiserstats-view-box-{$dataTableId}",
					);
					if ( $mostRecentFundraiser && $i == count( $days ) -1 ) {
						$attributes['class'] .= ' fundraiserstats-current';
					}
					$charts[$name]['data'][$column] .= Xml::tags(
						'td', array( 'valign' => 'bottom' ), Xml::element( 'div', $attributes, '', false )
					);
					
					// Construct the data table for this day
					$dataTable = Xml::openElement( 'tr' );
					$count = 0;
					foreach ( $charts as $subchart ) {
						$dataTable .= Xml::element(
							'td', array( 'width' => '16%', 'nowrap' => 'nowrap' ), wfMsg( $subchart['label'] )
						);
						$dataTable .= Xml::element(
							'td',
							array( 'width' => '16%', 'nowrap' => 'nowrap', 'align' => 'right' ),
							$wgLang->formatNum( number_format( $day[$subchart['index']], $subchart['precision'] ) )
						);
						if ( ++$count % 3 == 0 ) {
							$dataTable .= Xml::closeElement( 'tr' ) . Xml::openElement( 'tr' );
						}
					}
					$dataTable .= Xml::closeElement( 'tr' );
					
					$dataTablesHtml .= Xml::tags(
						'div',
						array(
							'id' => 'fundraiserstats-view-box-' . $dataTableId,
							'class' => 'fundraiserstats-view-box',
							'style' => 'display: ' . ( $dataTableId == 0 ? 'block' : 'none' )
						),
						Xml::tags(
							'table',
							array( 'cellpadding' => 10, 'cellspacing' => 0, 'border' => 0, 'width' => '100%' ),
							Xml::tags(
								'tr',
								null,
								Xml::tags(
									'td',
									array( 'colspan' => 6 ),
									Xml::element( 'h3', array( 'style' => 'float:right;color:gray;' ), $day[0] ) . // The date
									Xml::tags(
										'h3',
										array( 'style' => 'float:left;color:black;' ),
										wfMsgExt( 'fundraiserstats-day', array( 'parseinline' ), $wgLang->formatNum( $i + 1 ), $fundraiser['title'] )
									) .
									Xml::element( 'div', array( 'style' => 'clear:both;' ), '', false )
								)
							) .
							$dataTable
						)
					);
					$column++;
					$dataTableId++;
				}
			}
		}

		$wgOut->addHTML( Xml::openElement( 'div', array( 'id' => 'configtoggle' ) ) );
		$wgOut->addHTML( '<a id="customize-chart">'.wfMsg( 'fundraiserstats-customize' ).'</a>' );
		$wgOut->addHTML( Xml::closeElement( 'div' ) );

		$wgOut->addHTML( Xml::openElement( 'form', array( 'method' => 'post', 'id' => 'configform' ) ) );

		$years = wfMsg( 'fundraiserstats-show-years' ).'<br/>';
		foreach ( $egFundraiserStatisticsFundraisers as $fundraiser ) {
			$years .= Xml::check( 'toogle'.$fundraiser['id'], $showYear[$fundraiser['id']], array( 'id' => 'bar-'.$fundraiser['id'], 'class' => 'yeartoggle' ) );
			$years .= Xml::label( $fundraiser['id'], 'toogle'.$fundraiser['id'] );
			$years .= "<br/>";
		}
		$wgOut->addHTML( Xml::openElement( 'div', array( 'id' => 'configholder' ) ) );
		$wgOut->addHTML( $years );
		$wgOut->addHTML( Xml::closeElement( 'div' ) );

		$wgOut->addHTML( Xml::closeElement( 'form' ) );

		// Instructions
		$wgOut->addWikiMsg( 'fundraiserstats-instructions' );

		$chartsHtml = ''; // This will contain the HTML for all of the bar charts and tabs
		
		// Tabs
		$chartsHtml .= Xml::openElement( 'div', array( 'class' => 'fundraiserstats-chart-tabs' ) );
		$first = true;
		foreach ( $charts as $chart => $columns ) {
			$chartsHtml .= Xml::tags(
				'div',
				array(
					'id' => "fundraiserstats-chart-{$chart}-tab",
					'class' => 'fundraiserstats-chart-tab fundraiserstats-chart-tab-' . ( $first ? 'current' : 'normal' ),
					'rel' => "fundraiserstats-chart-{$chart}"
				),
				wfMsg( 'fundraiserstats-tab-' . $chart )
			);
			$first = false;
		}
		$chartsHtml .= Xml::closeElement( 'div' );
		
		// Charts
		$first = true;
		foreach ( $charts as $name => $chart ) {
			$chartsHtml .= Xml::tags(
				'div',
				array(
					'id' => "fundraiserstats-chart-{$name}",
					'class' => 'fundraiserstats-chart',
					'style' => 'display:' . ( $first ? 'block' : 'none' )
				),
				Xml::tags(
					'table',
					array( 'cellpadding' => 0, 'cellspacing' => 0, 'border' => 0 ),
					Xml::tags( 'tr', null, implode( $chart['data'] ) ) // FIXME: Missing parameter to implode
				)
			);
			$first = false;
		}
		// Output
		$wgOut->addHTML(
			Xml::tags(
				'table',
				array(
					'cellpadding' => 0,
					'cellspacing' => 0,
					'border' => 0
				),
				Xml::tags( 'tr', null, Xml::tags( 'td', null, $chartsHtml ) ) .
				Xml::tags( 'tr', null, Xml::tags( 'td', null, $dataTablesHtml ) )
			)
		);
		$wgOut->addWikiMsg( 'contribstats-footer' ); // Footer (typically empty)
	}

	/* Private Functions */

	/**
	 * Retrieve the donation data from the database
	 *
	 * @param string $type Which type of query to do
	 * @param string $start The start date for a fundraiser
	 * @param string $end The end date for a fundraiser
	 * @return an array of results or null
	 */
	private function query( $type, $start, $end ) {
		global $wgMemc, $egFundraiserStatisticsMinimum, $egFundraiserStatisticsMaximum, $egFundraiserStatisticsCacheTimeout;

		// Conctruct the key for memcached
		$key = wfMemcKey( 'fundraiserstatistics', $type, $start, $end );
		
		// If result exists in memcached, use that
		$cache = $wgMemc->get( $key );
		if ( $cache != false && $cache != -1 ) {
			return $cache;
		}
		
		// Use database
		$dbr = efContributionReportingConnection();
		$conditions = array(
			'received >= ' . $dbr->addQuotes( wfTimestamp( TS_UNIX, strtotime( $start ) ) ),
			'received <= ' . $dbr->addQuotes( wfTimestamp( TS_UNIX, strtotime( $end ) + 24 * 60 * 60 ) ),
			'converted_amount >= ' . $egFundraiserStatisticsMinimum,
			'converted_amount <= ' . $egFundraiserStatisticsMaximum
		);
		switch ( $type ) {
			case 'dailyTotals':
				$select = $dbr->select( 'public_reporting',
					array(
						"DATE_FORMAT(FROM_UNIXTIME(received),'%Y-%m-%d')",
						'sum(converted_amount)',
						'count(*)',
						'avg(converted_amount)',
						'max(converted_amount)',
					),
					$conditions,
					__METHOD__ . '-dailyTotals',
					array(
						'ORDER BY' => 'received',
						'GROUP BY' => "DATE_FORMAT(FROM_UNIXTIME(received),'%Y-%m-%d')"
					)
				);
				$result = array();
				$ytd = 0;
				while ( $row = $dbr->fetchRow( $select ) ) {
					// Insert the year-to-date amount as a record in the row (existing $ytd + sum)
					$row[5] = $ytd += $row[1];
					$result[] = $row;
				}
				break;
			case 'dailyTotalMax':
				$result = $dbr->selectField( 'public_reporting',
					array( 'sum(converted_amount) as sum' ),
					$conditions,
					__METHOD__ . '-dailyTotalMax',
					array(
						'ORDER BY' => 'sum DESC',
						'GROUP BY' => "DATE_FORMAT(FROM_UNIXTIME(received),'%Y-%m-%d')"
					)
				);
				break;
			case 'yearlyTotalMax':
				$result = $dbr->selectField( 'public_reporting',
					array( 'sum(converted_amount) as sum' ),
					$conditions,
					__METHOD__ . '-yearlyTotalMax'
				);
				break;
			case 'contributionsMax':
				$result = $dbr->selectField( 'public_reporting',
					array( 'count(converted_amount) as sum' ),
					$conditions,
					__METHOD__ . '-contributionsMax',
					array(
						'ORDER BY' => 'sum DESC',
						'GROUP BY' => "DATE_FORMAT(FROM_UNIXTIME(received),'%Y-%m-%d')"
					)
				);
				break;
			case 'averagesMax':
				$result = $dbr->selectField( 'public_reporting',
					array( 'avg(converted_amount) as sum' ),
					$conditions,
					__METHOD__ . '-averagesMax',
					array(
						'ORDER BY' => 'sum DESC',
						'GROUP BY' => "DATE_FORMAT(FROM_UNIXTIME(received),'%Y-%m-%d')"
					)
				);
				break;
			case 'maximumsMax':
				$result = $dbr->selectField( 'public_reporting',
					array( 'max(converted_amount) as sum' ),
					$conditions,
					__METHOD__ . '-maximumsMax',
					array(
						'ORDER BY' => 'sum DESC',
						'GROUP BY' => "DATE_FORMAT(FROM_UNIXTIME(received),'%Y-%m-%d')"
					)
				);
				break;
		}
		if ( isset( $result ) ) {
			// Store the result in memcached
			$wgMemc->set( $key, $result, $egFundraiserStatisticsCacheTimeout );
			return $result;
		}
		return null;
	}
}
