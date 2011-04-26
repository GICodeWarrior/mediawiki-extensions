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

		$wgOut->addModules( 'ext.articleFeedback.dashboard' );
		$this->setHeaders();
		$this->renderDailyHighsAndLows();
		$this->renderWeeklyMostChanged();
		$this->renderRecentLows();
	}

	/* Protected Methods */

	/**
	 * Returns an HTML table containing data from a given two dimensional array.
	 * 
	 * @param $headings Array: List of rows, each a list of columns (values will be escaped)
	 * @param $rows Array: List of rows, each a list of columns (values will not be escaped)
	 * @param $attribs Array: List of HTML attributes to apply to the table
	 * @return String: HTML table code
	 */
	protected function renderTable( array $headings, array $rows, $id = null ) {
		global $wgOut;

		$table = Html::openElement( 'table', array(
			'class' => 'articleFeedback-table sortable', 'id' => $id
		) );
		// Head
		$table .= Html::openElement( 'thead' );
		$table .= Html::openElement( 'tr' );
		foreach ( $headings as $heading ) {
			$table .= Html::element( 'th', array(), $heading );
		}
		$table .= Html::closeElement( 'tr' );
		$table .= Html::closeElement( 'thead' );
		// Body
		$table .= Html::openElement( 'tbody' );
		foreach ( $rows as $row ) {
			$table .= Html::openElement( 'tr' );
			foreach ( $row as $column ) {
				$table .= Html::rawElement( 'td', array(), $column );
			}
			$table .= Html::closeElement( 'tr' );
		}
		$table .= Html::closeElement( 'tbody' );
		$table .= Html::closeElement( 'table' );
		$wgOut->addHtml( $table );
	}

	/**
	 * Renders daily highs and lows
	 * 
	 * @return String: HTML table of daily highs and lows
	 */
	protected function renderDailyHighsAndLows() {
		global $wgOut;

		$data = $this->getDailyHighsAndLows();

		$wgOut->addHtml( Html::element( 'h2', array(), 'Daily Highs and Lows' ) );
		$this->renderTable(
			array( 'Article Title', 'Ratings', 'Average' ),
			array( /* rendered data */ ),
			'articleFeedback-table-highsandlows'
		);
	}

	/**
	 * Renders weekly most changed
	 * 
	 * @return String: HTML table of weekly most changed
	 */
	protected function renderWeeklyMostChanged() {
		global $wgOut;

		$data = $this->getWeeklyMostChanged();

		$wgOut->addHtml( Html::element( 'h2', array(), 'Weekly Most Changed' ) );
		$this->renderTable(
			array( 'Article Title', 'Category', 'Difference' ),
			array( /* rendered data */ ),
			'articleFeedback-table-weeklymostchanged'
		);
	}

	/**
	 * Renders recent lows
	 * 
	 * @return String: HTML table of recent lows
	 */
	protected function renderRecentLows() {
		global $wgOut;

		$data = $this->getRecentLows();

		$wgOut->addHtml( Html::element( 'h2', array(), 'Recent Lows' ) );
		$this->renderTable(
			array( 'Article Title', 'Category', 'Rating' ),
			array( /* rendered data */ ),
			'articleFeedback-table-recentlows'
		);
	}

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
				'differences' => array( 1, -2, 0, 0 ),
			)
		);
	}

	/**
	 * Gets a list of articles which have recently recieved exceptionally low ratings.
	 * 
	 * - Based on any rating category
	 * - Gets up to 100 most recently poorly rated articles
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
