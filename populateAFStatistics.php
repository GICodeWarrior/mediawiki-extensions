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
	protected $timestamp;
	
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
		
		// the data structure to store high/low stats information
		$highs_and_lows = array();
		
		// fetch the highs
		$this->output( "Fetching highest rated articles from the last " . $this->polling_period . " seconds.\n" );
		$highs = $this->getHighs();
		foreach ( $highs as $high ) {
			$highs_and_lows[ $high->aa_page_id ][ 'average' ] = $high->avg_rating; 	
		}
		$this->output( "Done.\n" );
		
		// fetch the lows
		$this->output( "Fetching lowest rated articles from the last " . $this->polling_period . " seconds.\n" );
		$lows = $this->getLows();
		foreach ( $lows as $low ) {
			$highs_and_lows[ $low->aa_page_id ][ 'average' ] = $low->avg_rating;
		}
		$this->output( "Done.\n" );

		// fetch the ratings
		$this->output( "Fetching ratings for highest and lowest rated articles.\n" );
		$ratings = $this->getAverageRatings( array_keys( $highs_and_lows ));
		foreach( $ratings as $page_ratings ) {
			$highs_and_lows[ $page_ratings->aa_page_id ][ 'avg_ratings' ][ $page_ratings->aa_rating_id ] = $page_ratings->avg_rating; 
		}
		$this->output( "Done.\n" );
		
		// prepare data for insert into db
		$this->output( "Preparing data for db insertion ...\n");
		$cur_ts = $this->formatTimestamp( time() );
		$rows = array();
		foreach( $highs_and_lows as $page_id => $data ) {
			$rows[] = array(
				'afshl_page_id' => $page_id,
				'afshl_avg_overall' => $data[ 'average' ],
				'afshl_avg_ratings' => json_encode( $data[ 'avg_ratings' ] ),
				'afshl_ts' => $cur_ts,
			);
		}
		$this->output( "Done.\n" );
		
		// insert data to db
		$this->output( "Writing data to article_feedback_stats_highs_lows ...\n" );
		$rowsInserted = 0;
		while( $rows ) {
			$batch = array_splice( $rows, 0, $this->insert_batch_size );
			$this->dbw->replace( 
				'article_feedback_stats_highs_lows',
				array( array( 'afshl_page_id', 'afshl_avg_overall', 'afshl_avg_ratings', 'afshl_ts' )),
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
	 * Get the 50 page ids and average ratings for the lowest average ratings 
	 * newer than $this->timestamp
	 * @return object
	 */
	public function getLows() {
		$res = $this->dbr->select(
			'article_feedback', 
			array( 
				'aa_page_id', 
				'avg(aa_rating_value) as avg_rating'
			), 
			'aa_timestamp > ' . $this->getTimestamp(),
			__METHOD__,
			array( 
				'GROUP BY' => 'aa_page_id',
				'ORDER BY' => 'avg_rating DESC',
				'LIMIT' => '50',
			)
		);
		return $res;
	}
	
	/**
	 * Get the 50 page ids and average ratings for the highest average ratings 
	 * newer than $this->timestamp
	 * @return object
	 */
	public function getHighs() {
		$res = $this->dbr->select(
			'article_feedback', 
			array( 
				'aa_page_id', 
				'avg(aa_rating_value) as avg_rating'
			), 
			'aa_timestamp > ' . $this->getTimestamp(),
			__METHOD__,
			array( 
				'GROUP BY' => 'aa_page_id',
				'ORDER BY' => 'avg_rating ASC',
				'LIMIT' => '50',
			)
		);
		return $res;
	}
	
	/**
	 * Get average ratings for specified page id(s)
	 * 
	 * @param mixed $page_id Can be a singular numeric page id or array of numeric page ids
	 * @throws InvalidArgumentException
	 * @return object
	 */
	public function getAverageRatings( $page_id ) {
		if ( is_array( $page_id )) {
			$page_id = implode( ",", $page_id );
		} elseif( !is_numeric( $page_id )) {
			throw new InvalidArgumentException( '$page_id must be numeric or an array of numeric ids.' );
		}
		
		$res = $this->dbr->select(
			'article_feedback',
			array(
				'aa_page_id',
				'aa_rating_id',
				'avg(aa_rating_value) as avg_rating'
			),
			'aa_timestamp > ' . $this->getTimestamp() . ' && aa_page_id IN (' . $page_id . ')',
			__METHOD__,
			array( 'GROUP BY' => 'aa_page_id, aa_rating_id' )
		);
		
		return $res;
	}
	
	
	/**
	 * Set $this->timestamp
	 * @param int $ts
	 */
	public function setTimestamp( $ts ) {
		if ( !is_numeric( $ts )) {
			throw new InvalidArgumentException( 'Timestamp must be numeric.' );
		}
		$this->timestamp = $ts;
	}
	

	/**
	 * Get $this->timestamp
	 * 
	 * If it hasn't been set yet, set it based on the defined polling period.
	 * 
	 * @return int
	 */
	public function getTimestamp() {
		if ( !$this->timestamp ) {
			$timestamp = $this->formatTimestamp( strtotime( $this->polling_period . ' seconds ago' ));
			$this->setTimestamp( $timestamp );
		}
		return $this->timestamp;
	}
	
	/**
	 * Format a unix timestamp to be compatible with what we store in the db
	 * @param int $unix_time
	 * @return string
	 */
	public function formatTimestamp( $unix_time ) {
		if ( !is_numeric( $unix_time )) {
			throw new InvalidArgumentException( 'Timestamp must be numeric.' );
		}
		return date( 'Ymdhis', $unix_time );
	}
}

$maintClass = "PopulateAFStatistics";
require_once( DO_MAINTENANCE );
