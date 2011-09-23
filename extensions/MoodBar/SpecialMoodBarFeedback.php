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
		
		// Determine filters from the query string
		$filters = array();
		$type = $wgRequest->getArray( 'type' );
		if ( $type ) {
			$filters['type'] = $type;
		}
		$username = strval( $wgRequest->getVal( 'username' ) );
		if ( $username !== '' ) {
			$filters['username'] = $username;
		}
		// Do the query
		$res = $this->doQuery( $filters );

		// Output HTML
		$wgOut->setPageTitle( wfMsg( 'moodbar-feedback-title' ) );
		$wgOut->addHTML( $this->buildForm() );
		$wgOut->addHTML( $this->buildList( $res ) );
		$wgOut->addModuleStyles( 'ext.moodBar.dashboard.styles' );
	}
	
	public function buildForm() {
		global $wgRequest;
		$filtersMsg = wfMessage( 'moodbar-feedback-filters' )->escaped();
		$typeMsg = wfMessage( 'moodbar-feedback-filters-type' )->escaped();
		$praiseMsg = wfMessage( 'moodbar-feedback-filters-type-happy' )->escaped();
		$confusionMsg = wfMessage( 'moodbar-feedback-filters-type-confused' )->escaped();
		$issuesMsg = wfMessage( 'moodbar-feedback-filters-type-sad' )->escaped();
		$usernameMsg = wfMessage( 'moodbar-feedback-filters-username' )->escaped();
		$setFiltersMsg = wfMessage( 'moodbar-feedback-filters-button' )->escaped();
		$whatIsMsg = wfMessage( 'moodbar-feedback-whatis' )->escaped();
		
		$types = $wgRequest->getArray( 'type' );
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
			<form>
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
			<a href="#" id="fbd-about">$whatIsMsg</a>
		</div>
HTML;
	}
	
	public function buildList( $rows ) {
		global $wgLang;
		$now = wfTimestamp( TS_UNIX );
		$list = '';
		foreach ( $rows as $row ) {
			$type = $row->mbf_type;
			$typeMsg = wfMessage( "moodbar-type-$type" )->escaped();
			$time = $wgLang->formatTimePeriod( $now - wfTimestamp( TS_UNIX, $row->mbf_timestamp ),
				'avoidminutes', 'noabbrevs'
			);
			$timeMsg = wfMessage( 'ago' )->params( $time )->escaped();
			$username = htmlspecialchars( $row->user_name === null ? $row->mbf_user_ip : $row->user_name );
			$links = Linker::userToolLinks( $row->mbf_user_id, $username );
			$comment = htmlspecialchars( $row->mbf_comment );
			$permalinkURL = $this->getTitle( $row->mbf_id )->getLinkURL();
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
			// Only show paging stuff if the result is not empty
			$moreURL = '#'; //TODO
			$moreText = wfMessage( 'moodbar-feedback-more' )->escaped();
			return "<ul id=\"fbd-list\">$list</ul>" . '<div id="fbd-list-more"><a href="#">More</a></div>';
		}
	}
	
	public function doQuery( $filters ) {
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
		
		$dbr = wfGetDB( DB_SLAVE );
		return $dbr->select( array( 'moodbar_feedback', 'user' ), array(
				'user_name', 'mbf_id', 'mbf_type',
				'mbf_timestamp', 'mbf_user_id', 'mbf_user_ip', 'mbf_comment'
			),
			$conds,
			__METHOD__,
			array( 'LIMIT' => 20 /*TODO*/, 'ORDER BY' => 'mbf_timestamp DESC' ),
			array( 'user' => array( 'LEFT JOIN', 'user_id=mbf_user_id' ) )
		);
	}
}
