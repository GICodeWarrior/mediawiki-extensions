<?php

$IP = getenv( 'MW_INSTALL_PATH' );
if ( $IP === false ) {
	$IP = dirname( __FILE__ ) . '/../..';
}
require( "$IP/maintenance/Maintenance.php" );

class PopulateAFStatistics extends Maintenance {
	/**
	 * The number of records to attempt to insert at any given time.
	 * @var int
	 */
	public $insert_batch_size = 100;
	
	/**
	 * The period (in seconds) before now for which to gather stats
	 * @var int
	 */
	public $polling_period = 86400;
	
	/**
	 * The formatted timestamp from which to determine stats
	 * @var int
	 */
	protected $lowerBoundTimestamp;
	
	/**
	 * DB slave
	 * @var object
	 */
	protected $dbr;
	
	/**
	 * DB master
	 * @var object
	 */
	protected $dbw;
	
	public function __construct() {
		parent::__construct();
		$this->mDescription = "Populates the article feedback stats tables";
	}
	
	public function syncDBs() {
		// FIXME: Copied from populateAFRevisions.php, which coppied from updateCollation.php, should be centralized somewhere
		$lb = wfGetLB();
		// bug 27975 - Don't try to wait for slaves if there are none
		// Prevents permission error when getting master position
		if ( $lb->getServerCount() > 1 ) {
			$dbw = $lb->getConnection( DB_MASTER );
			$pos = $dbw->getMasterPos();
			$lb->waitForAll( $pos );
		}
	}
	
	public function execute() {
		$this->dbr = wfGetDB( DB_SLAVE );
		$this->dbw = wfGetDB( DB_MASTER );
		
		// the data structure to store ratings for a given page
		$ratings = array();
		
		// fetch the ratings since the lower bound timestamp
		$res = $this->dbr->select(
			'article_feedback', 
			array( 
				'aa_page_id', 
				'aa_rating_value',
				'aa_rating_id'
			), 
			'aa_timestamp >= ' . $this->getLowerBoundTimestamp(),
			__METHOD__,
			array() // better to do with limits and offsets?
		);

		// assign the rating data to our data structure
		foreach ( $res as $row ) {
			$ratings[ $row->aa_page_id ][ $row->aa_rating_id ][] = $row->aa_rating_value; 
		}

		// determine the average ratings for a given page
		$highs_and_lows = array();
		foreach ( $ratings as $page_id => $data ) {
			foreach( $data as $rating_id => $rating ) {
				$rating_sum = array_sum( $rating );
				$rating_avg = $rating_sum / count( $rating );
				$highs_and_lows[ $page_id ][ 'avg_ratings' ][ $rating_id ] = $rating_avg;
			}
			$overall_rating_sum = array_sum( $highs_and_lows[ $page_id ][ 'avg_ratings' ] );
			$overall_rating_average = $overall_rating_sum / count( $highs_and_lows[ $page_id ][ 'avg_ratings' ] );
			$highs_and_lows[ $page_id ][ 'average' ] = $overall_rating_average;
		}
		
		// prepare data for insert into db
		$this->output( "Preparing data for db insertion ...\n");
		$cur_ts = $this->dbw->timestamp();
		$rows = array();
		foreach( $highs_and_lows as $page_id => $data ) {
			$rows[] = array(
				'afshl_page_id' => $page_id,
				'afshl_avg_overall' => $data[ 'average' ],
				'afshl_avg_ratings' => FormatJson::encode( $data[ 'avg_ratings' ] ),
				'afshl_ts' => $cur_ts,
			);
		}
		$this->output( "Done.\n" );
		
		// insert data to db
		$this->output( "Writing data to article_feedback_stats_highs_lows ...\n" );
		$rowsInserted = 0;
		while( $rows ) {
			$batch = array_splice( $rows, 0, $this->insert_batch_size );
			$this->dbw->insert( 
				'article_feedback_stats_highs_lows',
				$batch,
				__METHOD__
			);
			$rowsInserted += count( $batch );
			$this->syncDBs();
			$this->output( "Inserted " . $rowsInserted . " rows\n" );
		}
		$this->output( "Done.\n" );
	}
	
	
	/**
	 * Set $this->timestamp
	 * @param int $ts
	 */
	public function setLowerBoundTimestamp( $ts ) {
		if ( !is_numeric( $ts )) {
			throw new InvalidArgumentException( 'Timestamp must be numeric.' );
		}
		$this->lowerBoundTimestamp = $ts;
	}
	

	/**
	 * Get $this->lowerBoundTimestamp
	 * 
	 * If it hasn't been set yet, set it based on the defined polling period.
	 * 
	 * @return int
	 */
	public function getLowerBoundTimestamp() {
		if ( !$this->lowerBoundTimestamp ) {
			$timestamp = $this->dbw->timestamp( strtotime( $this->polling_period . ' seconds ago' ));
			$this->setLowerBoundTimestamp( $timestamp );
		}
		return $this->lowerBoundTimestamp;
	}
}

$maintClass = "PopulateAFStatistics";
require_once( DO_MAINTENANCE );
