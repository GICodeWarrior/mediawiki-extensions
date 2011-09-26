<?php
/**
 * Special:MoodBarFeedback. Special page for viewing moodbar comments.
 */
class SpecialMoodBarFeedback extends SpecialPage {
	public function __construct() {
		parent::__construct( 'MoodBarFeedback' );
	}
	
	public function getDescription() {
		return wfMessage( 'moodbar-feedback-title' )->plain();
	}

	public function execute( $par ) {
		global $wgOut, $wgRequest;
		
		$limit = 20;
		$offset = false;
		$filterType = '';
		$id = intval( $par );
		if ( $id > 0 ) {
			// Special:MoodBarFeedback/123 is an ID/permalink view
			$filters = array( 'id' => $id );
			$filterType = 'id';
		} else {
			// Determine filters and offset from the query string
			$filters = array();
			$type = $wgRequest->getArray( 'type' );
			if ( $type ) {
				$filters['type'] = $type;
			}
			$username = strval( $wgRequest->getVal( 'username' ) );
			if ( $username !== '' ) {
				$filters['username'] = $username;
			}
			$offset = $wgRequest->getVal( 'offset', $offset );
			$filterType = 'filtered';
		}
		// Do the query
		$backwards = $wgRequest->getVal( 'dir' ) === 'prev';
		$res = $this->doQuery( $filters, $limit, $offset, $backwards );
		
		// Output HTML
		$wgOut->setPageTitle( wfMsg( 'moodbar-feedback-title' ) );
		$wgOut->addHTML( $this->buildForm( $filterType ) );
		$wgOut->addHTML( $this->buildList( $res ) );
		$wgOut->addModuleStyles( 'ext.moodBar.dashboard.styles' );
		$wgOut->addModules( 'ext.moodBar.dashboard' );
	}
	
	/**
	 * Build the filter form. The state of each form element is preserved
	 * using data in $wgRequest.
	 * @param $filterType string Value to pass in the <form>'s data-filtertype attribute
	 * @return string HTML
	 */
	public function buildForm( $filterType ) {
		global $wgRequest, $wgMoodBarConfig;
		$filtersMsg = wfMessage( 'moodbar-feedback-filters' )->escaped();
		$typeMsg = wfMessage( 'moodbar-feedback-filters-type' )->escaped();
		$praiseMsg = wfMessage( 'moodbar-feedback-filters-type-happy' )->escaped();
		$confusionMsg = wfMessage( 'moodbar-feedback-filters-type-confused' )->escaped();
		$issuesMsg = wfMessage( 'moodbar-feedback-filters-type-sad' )->escaped();
		$usernameMsg = wfMessage( 'moodbar-feedback-filters-username' )->escaped();
		$setFiltersMsg = wfMessage( 'moodbar-feedback-filters-button' )->escaped();
		$whatIsMsg = wfMessage( 'moodbar-feedback-whatis' )->escaped();
		$whatIsURL = htmlspecialchars( $wgMoodBarConfig['infoUrl'] );
		$actionURL = htmlspecialchars( $this->getTitle()->getLinkURL() );
		
		$types = $wgRequest->getArray( 'type', array() );
		$happyCheckbox = Xml::check( 'type[]', in_array( 'happy', $types ),
			array( 'id' => 'fbd-filters-type-praise', 'value' => 'happy' ) );
		$confusedCheckbox = Xml::check( 'type[]', in_array( 'confused', $types ),
			array( 'id' => 'fbd-filters-type-confusion', 'value' => 'confused' ) );
		$sadCheckbox = Xml::check( 'type[]', in_array( 'sad', $types ),
			array( 'id' => 'fbd-filters-type-issues', 'value' => 'sad' ) );
		$usernameTextbox = Html::input( 'username', $wgRequest->getText( 'username' ), 'text',
			array( 'id' => 'fbd-filters-username', 'class' => 'fbd-filters-input' ) );
		$filterType = htmlspecialchars( $filterType );
		
		return <<<HTML
		<div id="fbd-filters">
			<form action="$actionURL" data-filtertype="$filterType">
				<h3 id="fbd-filters-title">$filtersMsg</h3>
				<fieldset id="fbd-filters-types">
					<legend class="fbd-filters-label">$typeMsg</legend>
					<ul>
						<li>
							$happyCheckbox
							<label for="fbd-filters-type-praise" id="fbd-filters-type-praise-label">$praiseMsg</label>
						</li>
						<li>
							$confusedCheckbox
							<label for="fbd-filters-type-confusion" id="fbd-filters-type-confusion-label">$confusionMsg</label>
						</li>
						<li>
							$sadCheckbox
							<label for="fbd-filters-type-issues" id="fbd-filters-type-issues-label">$issuesMsg</label>
						</li>
					</ul>
				</fieldset>
				<label for="fbd-filters-username" class="fbd-filters-label">$usernameMsg</label>
				$usernameTextbox
				<button type="submit" id="fbd-filters-set">$setFiltersMsg</button>
			</form>
			<a href="$whatIsURL" id="fbd-about">$whatIsMsg</a>
		</div>
HTML;
	}
	
	/**
	 * Format a single list item from a database row.
	 * @param $row Database row object
	 * @return string HTML
	 */
	public static function formatListItem( $row ) {
		global $wgLang;
		$type = $row->mbf_type;
		$typeMsg = wfMessage( "moodbar-type-$type" )->escaped();
		$time = $wgLang->formatTimePeriod( wfTimestamp( TS_UNIX ) - wfTimestamp( TS_UNIX, $row->mbf_timestamp ),
			array( 'avoid' => 'avoidminutes', 'noabbrevs' => true )
		);
		$timeMsg = wfMessage( 'ago' )->params( $time )->escaped();
		$username = htmlspecialchars( $row->user_name === null ? $row->mbf_user_ip : $row->user_name );
		$links = Linker::userToolLinks( $row->mbf_user_id, $username );
		$comment = htmlspecialchars( $row->mbf_comment );
		$permalinkURL = htmlspecialchars( SpecialPage::getTitleFor( 'MoodBarFeedback', $row->mbf_id )->getLinkURL() );
		$permalinkText = wfMessage( 'moodbar-feedback-permalink' )->escaped();
		$continueData = wfTimestamp( TS_MW, $row->mbf_timestamp ) . '|' . intval( $row->mbf_id );
		
		return <<<HTML
		<li class="fbd-item" data-mbccontinue="$continueData">
			<div class="fbd-item-emoticon fbd-item-emoticon-$type">
				<span class="fbd-item-emoticon-label">$typeMsg</span>
			</div>
			<div class="fbd-item-time">$timeMsg</div>
			<h3 class="fbd-item-userName">
				<a href="#">$username</a>
				<sup class="fbd-item-userLinks">
					$links
				</sup>
			</h3>
			<div class="fbd-item-message">$comment</div>
			<div class="fbd-item-permalink">(<a href="$permalinkURL">$permalinkText</a>)</div>
			<div style="clear:both"></div>
		</li>
HTML;
	}
	
	/**
	 * Build a comment list from a query result
	 * @param $res array Return value of doQuery()
	 * @return string HTML
	 */
	public function buildList( $res ) {
		global $wgRequest;
		$list = '';
		foreach ( $res['rows'] as $row ) {
			$list .= self::formatListItem( $row );
		}
		
		if ( $list === '' ) {
			return '<div id="fbd-list">' . wfMessage( 'moodbar-feedback-noresults' )->escaped() . '</div>';
		} else {
			// FIXME: We also need to show the More link (hidden) if there were no results
			$olderRow = $res['olderRow'];
			$newerRow = $res['newerRow'];
			$html = "<ul id=\"fbd-list\">$list</ul>";
			
			// Output the "More" link
			$moreText = wfMessage( 'moodbar-feedback-more' )->escaped();
			$attribs = array( 'id' => 'fbd-list-more' );
			if ( !$olderRow ) {
				// There are no more rows. Hide the More link
				// We still need to output it because the JS may need it later
				$attribs['style'] = 'display: none;';
			}
			$html .= Html::rawElement( 'div', $attribs, '<a href="#">' . $moreText . '</a></div>' );
			
			// Paging links for no-JS clients
			$olderURL = $newerURL = false;
			if ( $olderRow ) {
				$olderOffset = wfTimestamp( TS_MW, $olderRow->mbf_timestamp ) . '|' . intval( $olderRow->mbf_id );
				$olderURL = htmlspecialchars( $this->getTitle()->getLinkURL( $this->getQuery( $olderOffset, false ) ) );
			}
			if ( $newerRow ) {
				$newerOffset = wfTimestamp( TS_MW, $newerRow->mbf_timestamp ) . '|' . intval( $newerRow->mbf_id );
				$newerURL = htmlspecialchars( $this->getTitle()->getLinkURL( $this->getQuery( $newerOffset, true ) ) );
			}
			$olderText = wfMessage( 'moodbar-feedback-older' )->escaped();
			$newerText = wfMessage( 'moodbar-feedback-newer' )->escaped();
			$html .= '<div id="fbd-list-newer-older"><div id="fbd-list-newer">';
			if ( $newerURL ) {
				$html .= "<a href=\"$newerURL\">$newerText</a>";
			} else {
				$html .= "<span class=\"fbd-page-disabled\">$newerText</span>";
			}
			$html .= '</div><div id="fbd-list-older">';
			if ( $olderURL ) {
				$html .= "<a href=\"$olderURL\">$olderText</a>";
			} else {
				$html .= "<span class=\"fbd-page-disabled\">$olderText</span>";
			}
			$html .= '</div></div><div style="clear: both;"></div>';
			return $html;
		}
	}
	
	/**
	 * Get a set of comments from the database.
	 * 
	 * The way paging is handled by this function is a bit weird. $offset is taken from
	 * the last row that was displayed, as opposed to the first row that was not displayed.
	 * This means that if $offset is set, the first row in the result (the one matching $offset)
	 * is dropped, as well as the last row. The dropped rows are only used to detect the presence
	 * or absence of more rows in each direction, the offset values for paging are taken from the
	 * first and last row that are actually shown.
	 * 
	 * $retval['olderRow'] is the row whose offset should be used to display older rows, or null if
	 * there are no older rows. This means that, if there are older rows, $retval['olderRow'] is set
	 * to the oldest row in $retval['rows']. $retval['newerRows'] is set similarly.
	 * 
	 * @param $filters array Array of filters to apply. Recognized keys are 'type' (array), 'username' (string) and 'id' (int)
	 * @param $limit int Number of comments to fetch
	 * @param $offset string Query offset. Timestamp and ID of the last shown result, formatted as 'timestamp|id'
	 * @param $backwards bool If true, page in ascending order rather than descending order, i.e. get $limit rows after $offset rather than before $offset. The result will still be sorted in descending order
	 * @return array( 'rows' => array( row, row, ... ), 'olderRow' => row|null, 'newerRow' => row|null )
	 */
	public function doQuery( $filters, $limit, $offset, $backwards ) {
		$dbr = wfGetDB( DB_SLAVE );
		
		// Set $conds based on $filters
		$conds = array();
		if ( isset( $filters['type'] ) ) {
			$conds['mbf_type'] = $filters['type'];
		}
		if ( isset( $filters['username'] ) ) {
			$user = User::newFromName( $filters['username'] ); // Returns false for IPs
			if ( !$user || $user->isAnon() ) {
				$conds['mbf_user_id'] = 0;
				$conds['mbf_user_ip'] = $filters['username'];
			} else {
				$conds['mbf_user_id'] = $user->getID();
				$conds[] = 'mbf_user_ip IS NULL';
			}
		}
		if ( isset( $filters['id'] ) ) {
			$conds['mbf_id'] = $filters['id'];
		}
		
		// Process $offset
		if ( $offset !== false ) {
			$arr = explode( '|', $offset, 2 );
			$ts = $dbr->addQuotes( $dbr->timestamp( $arr[0] ) );
			$id = isset( $arr[1] ) ? intval( $arr[1] ) : 0;
			$op = $backwards ? '>' : '<';
			$conds[] = "mbf_timestamp $op $ts OR (mbf_timestamp = $ts AND mbf_id $op= $id)";
		}
		
		// Do the actual query
		$desc = $backwards ? '' : ' DESC';
		$res = $dbr->select( array( 'moodbar_feedback', 'user' ), array(
				'user_name', 'mbf_id', 'mbf_type',
				'mbf_timestamp', 'mbf_user_id', 'mbf_user_ip', 'mbf_comment'
			),
			$conds,
			__METHOD__,
			array( 'LIMIT' => $limit + 2, 'ORDER BY' => "mbf_timestamp$desc, mbf_id$desc" ),
			array( 'user' => array( 'LEFT JOIN', 'user_id=mbf_user_id' ) )
		);
		$rows = iterator_to_array( $res, /*$use_keys=*/false );
		
		// Figure out whether there are newer and older rows
		$olderRow = $newerRow = null;
		$count = count( $rows );
		if ( $offset && $count > 0 ) {
			// If there is an offset, drop the first row
			if ( $count > 1 ) {
				array_shift( $rows );
				$count--;
			}
			// We now know there is a previous row
			$newerRow = $rows[0];
		}
		if ( $count > $limit ) {
			// If there are rows past the limit, drop them
			array_splice( $rows, $limit );
			// We now know there is a next row
			$olderRow = $rows[$limit - 1];
		}
		
		// If we got things backwards, reverse them
		if ( $backwards ) {
			$rows = array_reverse( $rows );
			list( $olderRow, $newerRow ) = array( $newerRow, $olderRow );
		}
		return array( 'rows' => $rows, 'olderRow' =>  $olderRow, 'newerRow' => $newerRow );
	}
	
	/**
	 * Get a query string array for a given offset, using filter parameters obtained from $wgRequest.
	 * @param $offset string Value for &offset=
	 * @param $backwards bool If true, set &dir=prev
	 * @return array
	 */
	protected function getQuery( $offset, $backwards ) {
		global $wgRequest;
		$query = array(
			'type' => $wgRequest->getArray( 'type', array() ),
			'username' => $wgRequest->getVal( 'username' ),
			'offset' => $offset,
		);
		if ( $backwards ) {
			$query['dir'] = 'prev';
		}
		return $query;
	}
}
