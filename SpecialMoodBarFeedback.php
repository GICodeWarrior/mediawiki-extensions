<?php

class SpecialMoodBarFeedback extends SpecialPage {
	public function __construct() {
		parent::__construct( 'MoodBarFeedback' );
	}
	
	public function getDescription() {
		return wfMessage( 'moodbar-feedback-title' )->plain();
	}

	public function execute( $par ) {
		global $wgOut;

		$wgOut->setPageTitle( wfMsg( 'moodbar-feedback-title' ) );
		$wgOut->addHTML( $this->buildForm() );
		$res = $this->doQuery();
		$wgOut->addHTML( $this->buildList( $res ) );
		$wgOut->addModuleStyles( 'ext.moodBar.dashboard.styles' );
	}
	
	public function buildForm() {
		$filtersMsg = wfMessage( 'moodbar-feedback-filters' )->escaped();
		$typeMsg = wfMessage( 'moodbar-feedback-filters-type' )->escaped();
		$praiseMsg = wfMessage( 'moodbar-feedback-filters-type-happy' )->escaped();
		$confusionMsg = wfMessage( 'moodbar-feedback-filters-type-confused' )->escaped();
		$issuesMsg = wfMessage( 'moodbar-feedback-filters-type-sad' )->escaped();
		$usernameMsg = wfMessage( 'moodbar-feedback-filters-username' )->escaped();
		$setFiltersMsg = wfMessage( 'moodbar-feedback-filters-button' )->escaped();
		$whatIsMsg = wfMessage( 'moodbar-feedback-whatis' )->escaped();
		
		return <<<HTML
		<div id="fbd-filters">
			<form>
				<h3 id="fbd-filters-title">$filtersMsg</h3>
				<fieldset id="fbd-filters-types">
					<legend class="fbd-filters-label">$typeMsg</legend>
					<ul>
						<li>
							<input type="checkbox" id="fbd-filters-type-praise">
							<label for="fbd-filters-type-praise" id="fbd-filters-type-praise-label">$praiseMsg</label>
						</li>
						<li>
							<input type="checkbox" id="fbd-filters-type-confusion">
							<label for="fbd-filters-type-confusion" id="fbd-filters-type-confusion-label">$confusionMsg</label>
						</li>
						<li>
							<input type="checkbox" id="fbd-filters-type-issues">
							<label for="fbd-filters-type-issues" id="fbd-filters-type-issues-label">$issuesMsg</label>
						</li>
					</ul>
				</fieldset>
				<label for="fbd-filters-username" class="fbd-filters-label">$usernameMsg</label>
				<input type="text" id="fbd-filters-username" class="fbd-filters-input" />
				<button type="submit" id="fbd-filters-set">$setFiltersMsg</button>
			</form>
			<a href="#" id="fbd-about">$whatIsMsg</a>
		</div>
HTML;
	}
	
	public function buildList( $rows ) {
		global $wgLang;
		$now = wfTimestamp( TS_UNIX );
		$html = '<ul id="fbd-list">';
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
			
			$html .= <<<HTML
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
		
		$moreURL = '#'; //TODO
		$moreText = wfMessage( 'moodbar-feedback-more' )->escaped();
		$html .= '</ul><div id="fbd-list-more"><a href="#">More</a></div>';
		return $html;
	}
	
	public function doQuery() {
		$dbr = wfGetDB( DB_SLAVE );
		return $dbr->select( array( 'moodbar_feedback', 'user' ), array(
				'user_name', 'mbf_id', 'mbf_type',
				'mbf_timestamp', 'mbf_user_id', 'mbf_user_ip', 'mbf_comment'
			), array(
				'1=1', //TODO
			), __METHOD__,
			array( 'LIMIT' => 20 /*TODO*/, 'ORDER BY' => 'mbf_timestamp DESC' ),
			array( 'user' => array( 'LEFT JOIN', 'user_id=mbf_user_id' ) )
		);
	}
}
