<?php

class SpecialMoodBarFeedback extends SpecialPage {
	public function __construct() {
		parent::__construct( 'MoodBarFeedback' );
	}
	
	public function getDescription() {
		return wfMessage( 'moodbar-feedback-title' )->plain();
	}

	public function execute( $par ) {
		global $wgOut, $wgRequest;
		$formatter = MoodBarFeedbackFormatter::newFromRequest( $wgRequest, $par );
		$wgOut->setPageTitle( wfMsg( 'moodbar-feedback-title' ) );
		$wgOut->addHTML( $this->buildForm() );
		$wgOut->addHTML( $formatter->getHTML() );
		$wgOut->addModuleStyles( 'ext.moodBar.dashboard.styles' );
	}
	
	protected function buildForm() {
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
		
		return <<<HTML
		<div id="fbd-filters">
			<form action="$actionURL">
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
}

class MoodBarFeedbackFormatter {
	protected $types, $username, $id, $backwards, $offset, $limit;
	
	public function __construct( $types, $username, $id, $backwards, $offset ) {
		$this->types = (array)$types;
		$this->username = strval( $username ) !== '' ? strval( $username ) : null;
		$this->id = intval( $id );
		$this->backwards = (bool)$backwards;
		$this->offset = $offset;
		$this->limit = 20; // Hardcoded for now
	}
	
	public static function newFromRequest( WebRequest $request, $par = null ) {
		return new self(
			$request->getArray( 'type', array() ),
			$request->getVal( 'username', null ),
			intval( $par ),
			$request->getVal( 'dir' ) == 'prev',
			$request->getVal( 'offset', null )
		);
	}
	
	public function getHTML() {
		return $this->buildList( $this->doQuery() );
	}
	
	protected function getTitle( $par = null ) {
		return SpecialPage::getTitleFor( 'MoodBarFeedback', $par );
	}
	
	protected function doQuery() {
		$dbr = wfGetDB( DB_SLAVE );
		$conds = array();
		if ( $this->types ) {
			$conds['mbf_type'] = $this->types;
		}
		if ( $this->username !== null ) {
			$user = User::newFromName( $this->username ); // Returns false for IPs
			if ( !$user || $user->isAnon() ) {
				$conds['mbf_user_id'] = 0;
				$conds['mbf_user_ip'] = $this->username;
			} else {
				$conds['mbf_user_id'] = $user->getID();
				$conds[] = 'mbf_user_ip IS NULL';
			}
		}
		if ( $this->id > 0 ) {
			$conds['mbf_id'] = $this->id;
		}
		if ( $this->offset !== null ) {
			$arr = explode( '|', $this->offset, 2 );
			$ts = $dbr->addQuotes( $dbr->timestamp( $arr[0] ) );
			$id = isset( $arr[1] ) ? intval( $arr[1] ) : 0;
			$op = $this->backwards ? '>' : '<';
			$conds[] = "mbf_timestamp $op $ts OR (mbf_timestamp = $ts AND mbf_id $op= $id)";
		}
		
		$desc = $this->backwards ? '' : ' DESC';
		$res = $dbr->select( array( 'moodbar_feedback', 'user' ), array(
				'user_name', 'mbf_id', 'mbf_type',
				'mbf_timestamp', 'mbf_user_id', 'mbf_user_ip', 'mbf_comment'
			),
			$conds,
			__METHOD__,
			array( 'LIMIT' => $this->limit + 2, 'ORDER BY' => "mbf_timestamp$desc, mbf_id$desc" ),
			array( 'user' => array( 'LEFT JOIN', 'user_id=mbf_user_id' ) )
		);
		$rows = iterator_to_array( $res, /*$use_keys=*/false );
		
		// Figure out whether there are newer and older rows
		$olderRow = $newerRow = null;
		$count = count( $rows );
		if ( $this->offset && $count > 0 ) {
			// If there is an offset, drop the first row
			if ( $count > 1 ) {
				array_shift( $rows );
				$count--;
			}
			// We now know there is a previous row
			$newerRow = $rows[0];
		}
		if ( $count > $this->limit ) {
			// If there are rows past the limit, drop them
			array_splice( $rows, $this->limit );
			// We now know there is a next row
			$olderRow = $rows[$this->limit - 1];
		}
		
		// If we got everything backwards, reverse it
		if ( $this->backwards ) {
			$rows = array_reverse( $rows );
			list( $olderRow, $newerRow ) = array( $newerRow, $olderRow );
		}
		return array( 'rows' => $rows, 'olderRow' =>  $olderRow, 'newerRow' => $newerRow );
	}
	
	protected function buildList( $res ) {
		global $wgLang;
		$now = wfTimestamp( TS_UNIX );
		$list = '';
		foreach ( $res['rows'] as $row ) {
			$type = $row->mbf_type;
			$typeMsg = wfMessage( "moodbar-type-$type" )->escaped();
			$time = $wgLang->formatTimePeriod( $now - wfTimestamp( TS_UNIX, $row->mbf_timestamp ),
				array( 'avoid' => 'avoidminutes', 'noabbrevs' => true )
			);
			$timeMsg = wfMessage( 'ago' )->params( $time )->escaped();
			$username = htmlspecialchars( $row->user_name === null ? $row->mbf_user_ip : $row->user_name );
			$links = Linker::userToolLinks( $row->mbf_user_id, $username );
			$comment = htmlspecialchars( $row->mbf_comment );
			$permalinkURL = htmlspecialchars( $this->getTitle( $row->mbf_id )->getLinkURL() );
			$permalinkText = wfMessage( 'moodbar-feedback-permalink' )->escaped();
			
			$list .= <<<HTML
			<li class="fbd-item">
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
		
		if ( $list === '' ) {
			return '<div id="fbd-list">' . wfMessage( 'moodbar-feedback-noresults' )->escaped() . '</div>';
		} else {
			// Only show paging stuff if the result is not empty and there are more results
			$olderRow = $res['olderRow'];
			$newerRow = $res['newerRow'];
			$html = "<ul id=\"fbd-list\">$list</ul>";
			if ( $olderRow ) {
				$moreText = wfMessage( 'moodbar-feedback-more' )->escaped();
				$html .= '<div id="fbd-list-more"><a href="#">' . $moreText . '</a></div>';
			}
			
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
			$html .= '</div><div style="clear: both;"></div></div>';
			return $html;
		}
	}
	
	protected function getQuery( $offset, $backwards ) {
		$query = array(
			'type' => $this->types,
			'offset' => $offset,
		);
		if ( $this->username !== null ) {
			$query['username'] = $this->username;
		}
		if ( $backwards ) {
			$query['dir'] = 'prev';
		}
		return $query;
	}
}
