<?php
/**
 * SpecialPage for ArticleFeedback extension
 * 
 * @file
 * @ingroup Extensions
 */

class SpecialArticleFeedback extends SpecialPage {

	/* Methods */

	public function __construct() {
		parent::__construct( 'ArticleFeedback' );
	}

	public function execute( $par ) {
		global $wgUser, $wgOut, $wgRequest;

		$this->setHeaders();

		$dailyHighsAndLows = $this->getDailyHighsAndLows();
		$weeklyMostChanged = $this->getWeeklyMostChanged();
		$recentLows = $this->getRecentLows();

		// TODO: Use lists to generate tables

		$wgOut->addHtml( '<div class="articleFeedback-dashboard"><h2>Hello dashboard!</h2></div>' );
	}

	/* Protected Methods */

	/**
	 * Gets a list of articles which were rated exceptionally high or low.
	 * 
	 * - Based on average of all rating categories
	 * - Gets 50 highest rated and 50 lowest rated
	 * - Only consider articles with 10+ ratings in the last 24 hours
	 * 
	 * This data should be updated daily, ideally though a scheduled batch job
	 */
	protected function getDailyHighsAndLows() {
		return array(
			array(
				'title' => 'Main Page',
				// List of ratings as the currently stand
				'values' => array( 4, 3, 2, 1 ),
				// Current average (considering historic averages of each rating)
				'average' => 1.925
			)
		);
	}

	/**
	 * Gets a list of articles which have quickly changing ratings.
	 * 
	 * - Based on any rating category
	 * - Gets 50 most improved and 50 most worsened
	 * - Only consider articles with 100+ ratings in the last 7 days
	 * 
	 * This data should be updated daily, ideally though a scheduled batch job
	 */
	protected function getWeeklyMostChanged() {
		return array(
			array(
				'title' => 'Main Page',
				// List of differences for each rating in the past 7 days
				'differnces' => array( 1, -2, 0, 0 ),
			)
		);
	}

	/**
	 * Gets a list of articles which have recently recieved exceptionally low ratings.
	 * 
	 * - Based on any rating category
	 * - Gets 50 most improved and 50 most worsened
	 * - Only consider articles which were rated lower than 3 for 7 out of the last 10 ratings
	 * 
	 * This data should be updated whenever article ratings are changed, ideally through a hook
	 */
	protected function getRecentLows() {
		return array(
			array(
				'title' => 'Main Page',
				// List of rating IDs that qualify as recent lows
				'lows' => array( 0, 3 ),
			)
		);
	}
}
