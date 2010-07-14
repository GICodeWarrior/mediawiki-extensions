<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	echo "FlaggedRevs extension\n";
	exit( 1 );
}

class ValidationStatistics extends IncludableSpecialPage
{
	public function __construct() {
		parent::__construct( 'ValidationStatistics' );
	}

	public function execute( $par ) {
		global $wgUser, $wgOut, $wgLang, $wgContLang;
		$this->setHeaders();
		$this->skin = $wgUser->getSkin();
		$this->db = wfGetDB( DB_SLAVE );

		$this->maybeUpdate();

		$ec = $this->getEditorCount();
		$rc = $this->getReviewerCount();
		$mt = $this->getMeanReviewWait();
		$mdt = $this->getMedianReviewWait();
		$pt = $this->getMeanPendingWait();
		$timestamp = $this->getLastUpdate();
		if ( $timestamp != '-' ) {
			$date = $wgLang->date( $timestamp, true );
			$time = $wgLang->time( $timestamp, true );
		}

		$wgOut->addWikiMsg( 'validationstatistics-users',
			$wgLang->formatnum( $ec ), $wgLang->formatnum( $rc )
		);
		# Most of the output depends on background queries
		if ( !$this->readyForQuery() ) {
			return false;
		}

		$key = wfMemcKey( 'flaggedrevs', 'reviewPercentiles' );
		$dbCache = wfGetCache( CACHE_DB );
		$data = $dbCache->get( $key );
		# Is there a review time table available?
		if ( is_array( $data ) && count( $data ) ) {
			$headerRows = $dataRows = '';
			foreach ( $data as $percentile => $perValue ) {
				$headerRows .= "<th>P<sub>" . intval( $percentile ) . "</sub></th>";
				$dataRows .= '<td>' . $wgLang->formatTimePeriod( $perValue ) . '</td>';
			}
			$css = 'wikitable flaggedrevs_stats_table';
			$reviewChart = "<table class='$css' style='white-space: nowrap;'>\n";
			$reviewChart .= "<tr align='center'>$headerRows</tr>\n";
			$reviewChart .= "<tr align='center'>$dataRows</tr>\n";
			$reviewChart .= "</table>\n";
		} else {
			$reviewChart = '';
		}

		# Show "last updated"...
		$wgOut->addWikiMsg( 'validationstatistics-lastupdate', $date, $time );
		$wgOut->addHtml( '<hr/>' );
		# Show pending time stats...
		$wgOut->addWikiMsg( 'validationstatistics-pndtime', $wgLang->formatTimePeriod( $pt ) );
		# Show review time stats...
		if ( !FlaggedRevs::useOnlyIfProtected() ) {
			$wgOut->addWikiMsg( 'validationstatistics-revtime',
				$wgLang->formatTimePeriod( $mt ),
				$wgLang->formatTimePeriod( $mdt ),
				$reviewChart
			);
		}
		# Show per-namespace stats table...
		$wgOut->addWikiMsg( 'validationstatistics-table' );
		$wgOut->addHTML(
			Xml::openElement( 'table', array( 'class' => 'wikitable flaggedrevs_stats_table' ) )
		);
		$wgOut->addHTML( "<tr>\n" );
		// Headings (for a positive grep result):
		// validationstatistics-ns, validationstatistics-total, validationstatistics-stable,
		// validationstatistics-latest, validationstatistics-synced, validationstatistics-old
		$msgs = array( 'ns', 'total', 'stable', 'latest', 'synced', 'old' ); // our headings
		foreach ( $msgs as $msg ) {
			$wgOut->addHTML( '<th>' .
				wfMsgExt( "validationstatistics-$msg", array( 'parseinline' ) ) . '</th>' );
		}
		$wgOut->addHTML( "</tr>\n" );
		$namespaces = FlaggedRevs::getReviewNamespaces();
		foreach ( $namespaces as $namespace ) {
			$row = $this->db->selectRow( 'flaggedrevs_stats', '*',
				array( 'namespace' => $namespace ) );
			if( !$row ) continue; // NS added to config recently?

			$NsText = $wgContLang->getFormattedNsText( $row->namespace );
			$NsText = $NsText ? $NsText : wfMsgHTML( 'blanknamespace' );

			$percRev = intval( $row->total ) == 0
				? '-' // devision by zero
				: $wgLang->formatnum( wfMsgExt( 'percent', array( 'escapenoentities' ),
					sprintf( '%4.2f', 100 * intval( $row->reviewed ) / intval( $row->total ) ) )
				);
			$percLatest = intval( $row->total ) == 0
				? '-' // devision by zero
				: $wgLang->formatnum( wfMsgExt( 'percent', array( 'escapenoentities' ),
					sprintf( '%4.2f', 100 * intval( $row->synced ) / intval( $row->total ) ) )
				);
			$percSynced = intval( $row->reviewed ) == 0
				? '-' // devision by zero
				: $wgLang->formatnum( wfMsgExt( 'percent', array( 'escapenoentities' ),
					sprintf( '%4.2f', 100 * intval( $row->synced ) / intval( $row->reviewed ) ) )
				);
			$outdated = intval( $row->reviewed ) - intval( $row->synced );
			$outdated = $wgLang->formatnum( max( 0, $outdated ) ); // lag between queries

			$wgOut->addHTML(
				"<tr align='center'>
					<td>" .
						htmlspecialchars( $NsText ) .
					"</td>
					<td>" .
						htmlspecialchars( $wgLang->formatnum( $row->total ) ) .
					"</td>
					<td>" .
						htmlspecialchars( $wgLang->formatnum( $row->reviewed ) .
							$wgContLang->getDirMark() ) . " <i>($percRev)</i>
					</td>
					<td>" .
						htmlspecialchars( $wgLang->formatnum( $row->synced ) .
							$wgContLang->getDirMark() ) . " <i>($percLatest)</i>
					</td>
					<td>" .
						$percSynced .
					"</td>
					<td>" .
					
						htmlspecialchars( $outdated ) .
					"</td>
				</tr>"
			);
		}
		$wgOut->addHTML( Xml::closeElement( 'table' ) );
		# Is there a top 5 user list? If so, then show it...
		$data = $this->getTopFiveReviewers();
		if ( is_array( $data ) && count( $data ) ) {
			$wgOut->addWikiMsg( 'validationstatistics-utable' );
		
			$reviewChart = "<table class='wikitable flaggedrevs_stats_table' style='white-space: nowrap;'>\n";
			$reviewChart .= '<tr><th>' . wfMsgHtml( 'validationstatistics-user' ) .
				'</th><th>' . wfMsgHtml( 'validationstatistics-reviews' ) . '</th></tr>';
			foreach ( $data as $userId => $reviews ) {
				$reviewChart .= '<tr><td>' . htmlspecialchars( User::whois( $userId ) ) .
					'</td><td>' . $wgLang->formatNum( $reviews ) . '</td></tr>';
			}
			$reviewChart .= "</table>\n";
			$wgOut->addHTML( $reviewChart );
		}
	}

	protected function maybeUpdate() {
		global $wgFlaggedRevsStatsAge;
		if ( !$wgFlaggedRevsStatsAge ) {
			return false;
		}
		$dbCache = wfGetCache( CACHE_DB );
		$key = wfMemcKey( 'flaggedrevs', 'statsUpdated' );
		$keySQL = wfMemcKey( 'flaggedrevs', 'statsUpdating' );
		// If a cache update is needed, do so asynchronously.
		// Don't trigger query while another is running.
		if ( $dbCache->get( $key ) ) {
			wfDebugLog( 'ValidationStatistics', __METHOD__ . " skipping, got data" );
		} elseif ( $dbCache->get( $keySQL ) ) {
			wfDebugLog( 'ValidationStatistics', __METHOD__ . " skipping, in progress" );
		} else {
			global $wgPhpCli;
			$ext = !empty( $wgPhpCli ) ? $wgPhpCli : 'php';
			$path = wfEscapeShellArg( dirname( __FILE__ ) . '/../maintenance/updateStats.php' );
			$wiki = wfEscapeShellArg( wfWikiId() );
			$devNull = wfIsWindows() ? "NUL:" : "/dev/null";
			$commandLine = "$ext $path --wiki=$wiki > $devNull &";
			wfDebugLog( 'ValidationStatistics', __METHOD__ . " executing: $commandLine" );
			wfShellExec( $commandLine );
			return true;
		}
		return false;
	}
	
	protected function readyForQuery() {
		if ( !$this->db->tableExists( 'flaggedrevs_stats' ) ) {
			return false;
		} else {
			return ( 0 != $this->db->selectField( 'flaggedrevs_stats', 'COUNT(*)' ) );
		}
	}
	
	protected function getEditorCount() {
		return $this->db->selectField( 'user_groups', 'COUNT(*)',
			array( 'ug_group' => 'editor' ),
			__METHOD__ );
	}

	protected function getReviewerCount() {
		return $this->db->selectField( 'user_groups', 'COUNT(*)',
			array( 'ug_group' => 'reviewer' ),
			__METHOD__ );
	}
	
	protected function getMeanReviewWait() {
		if ( !$this->db->tableExists( 'flaggedrevs_stats2' ) ) return '-';
		$val = $this->db->selectField( 'flaggedrevs_stats2', 'ave_review_time' );
		return ( $val == false ? '-' : $val );
	}
	
	protected function getMedianReviewWait() {
		if ( !$this->db->tableExists( 'flaggedrevs_stats2' ) ) return '-';
		$val = $this->db->selectField( 'flaggedrevs_stats2', 'med_review_time' );
		return ( $val == false ? '-' : $val );
	}
	
	protected function getMeanPendingWait() {
		if ( !$this->db->tableExists( 'flaggedrevs_stats2' ) ) return '-';
		$val = $this->db->selectField( 'flaggedrevs_stats2', 'ave_pending_time' );
		return ( $val == false ? '-' : $val );
	}
	
	protected function getLastUpdate() {
		if ( !$this->db->tableExists( 'querycache_info' ) ) return '-';
		$val = $this->db->selectField( 'querycache_info', 'qci_timestamp',
			array( 'qci_type' => 'validationstats' ) );
		return ( $val == false ? '-' : $val );
	}
	
	protected function getTopFiveReviewers() {
		$key = wfMemcKey( 'flaggedrevs', 'reviewTopUsers' );
		$dbCache = wfGetCache( CACHE_DB );
		$data = $dbCache->get( $key );
		if ( is_array( $data ) )
			return $data; // cache hit

		$dbr = wfGetDB( DB_SLAVE );
		$cutoff = $dbr->timestamp( time() - 3600 );
		$res = $dbr->select( 'logging',
			array( 'log_user', 'COUNT(*) AS reviews' ),
			array(
				'log_type' => 'review', // page reviews
				'log_action' => array( 'approve', 'approve2', 'approve-i', 'approve2-i' ), // manual approvals
				'log_timestamp >= ' . $dbr->addQuotes( $cutoff ) // last hour
			),
			__METHOD__,
			array( 'GROUP BY' => 'log_user', 'ORDER BY' => 'reviews DESC', 'LIMIT' => 5 )
		);
		$data = array();
		foreach ( $res as $row ) {
			$data[$row->log_user] = $row->reviews;
		}
		// Save/cache users
		$dbCache->set( $key, $data, 3600 );
		return $data;
	}
}
