<?php

/**
 * Represents an article and associated rating 
 **/
class Rating {
	public $project;
	public $namespace;
	public $title;
	public $quality;
	public $quality_timestamp;
	public $importance;
	public $importance_timestamp;

	private $old_importance;
	private $old_quality;
	private $inDB = false;

	public function __construct( $project, $namespace, $title, $quality, $quality_timestamp, $importance, $importance_timestamp ) {
		$this->project = $project;
		$this->namespace = $namespace;
		$this->title = $title;
		$this->quality = $quality;
		$this->quality_timestamp = $quality_timestamp;
		$this->importance = $importance;
		$this->importance_timestamp = $importance_timestamp;
	}

	public function update( $importance, $quality, $timestamp ) {
		$logAction = ""; // q for quality change, i for importance change, qi for both
		if( $quality != $this->quality ) {
			$this->old_quality = $this->quality;
			$this->quality = $quality;
			$this->quality_timestamp = $timestamp;
			$logAction .= "q";
		}
		if( $importance != $this->importance ) {
			$this->old_importance = $this->importance;
			$this->importance = $importance;
			$this->importance_timestamp = $timestamp;
			$logAction .= "i";
		}
		if( $logAction != "") {
			$timestamp = wfTimestamp( TS_MW );
			if( strpos( $logAction, 'q' ) !== false ) {
				AssessmentChangeLog::makeEntry(
					$this->project,
					$this->namespace,
					$this->title,
					$timestamp,
					"quality",
					$this->old_quality,
					$this->quality
				);
			}
			if( strpos( $logAction, 'i' ) !== false ) {
				AssessmentChangeLog::makeEntry(
					$this->project,
					$this->namespace,
					$this->title,
					$timestamp,
					"importance",
					$this->old_importance,
					$this->importance
				);
			}
			
			$this->saveAll();
		}
	}

	private function updateAggregateStats( $is_new_rating ) {
		if(! $is_new_rating && empty($this->old_importance) && empty($this->old_quality) ) {
			return;
		}
		$dbw = wfGetDB( DB_MASTER );
		$importance_column = Statistics::getImportanceColumn( $this->importance );
		$dbw->insert(
			'project_stats',
			array(
				'ps_project' => $this->project,
				'ps_quality' => $this->quality,
				$importance_column => '0'
			),
			__METHOD__,
			array( 'IGNORE' )
		);
		$dbw->update(
			'project_stats',
			array( "$importance_column = $importance_column + 1" ),
			array( 
				"ps_project" => $this->project,
				"ps_quality" => $this->quality
			),
			__METHOD__
		);

		if(! $is_new_rating ) {
			// Is not a new rating, and atleast one of quality or importance has changed
			if(! empty( $this->old_quality ) ) {
				$q_value = $this->old_quality;
			} else {
				$q_value = $this->quality;
			}
			if(! empty( $this->old_importance) ) {
				$i_column = Statistics::getImportanceColumn( $this->old_importance );
			} else {
				$i_column = Statistics::getImportanceColumn( $this->importance );
			}
			$dbw->update(
				'project_stats',
				array( "$i_column = $i_column - 1" ),
				array( 
					"ps_project" => $this->project,
					"ps_quality" => $q_value
				),
				__METHOD__	
			);
		}
	}
	
	public function saveAll() {
		$data_array = array(
			'r_project' => $this->project,
			'r_namespace' => $this->namespace,
			'r_article' => $this->title,
			'r_quality' => $this->quality,
			'r_quality_timestamp' => $this->quality_timestamp,
			'r_importance' => $this->importance,
			'r_importance_timestamp' => $this->importance_timestamp
		);
		$dbw = wfGetDB( DB_MASTER );
		if( $this->inDB ) {
			$dbw->update(
				"ratings",
				$data_array,
				array(
					'r_namespace' => $this->namespace,
					'r_article' => $this->title,
					'r_project' => $this->project
				),
				__METHOD__
			);

			$this->updateAggregateStats( false );
		} else {
			$dbw->insert(
				"ratings",
				$data_array,
				__METHOD__
			);

			$this->updateAggregateStats( true );
			$this->inDB = true;
		}		
	}

	public static function forTitle( $title ) {
		$dbr = wfGetDB( DB_SLAVE );
		$query = $dbr->select(
			"ratings",
			array(
				"r_project", "r_namespace", "r_article", "r_quality", 
				"r_quality_timestamp", "r_importance", "r_importance_timestamp"
			),
			array(
				"r_namespace" => $title->getNamespace(),
				"r_article" => $title->getText(),
			),
			__METHOD__
		);

		$ratings = array();

		foreach( $query as $row ) {
			$rating = new Rating( 
				$row->r_project, $row->r_namespace,
				$row->r_article, $row->r_quality,
				$row->r_quality_timestamp, $row->r_importance,
				$row->r_importance_timestamp);
			$rating->inDB = true;
			$ratings[$rating->project] = $rating;
		}
		return $ratings;
	}

	public static function moveArticle( $oldTitle, $newTitle ) {		
		// Can be optimized to use two queries - so we touch DB_MASTER only if necessary
		// But is that a good thing?
		$dbw = wfGetDB( DB_MASTER );
		$dbw->update(
			'ratings',
			array(
				'r_namespace' => $newTitle->getNamespace(),
				'r_article' => $newTitle->getText()
			),
			array(
				'r_namespace' => $oldTitle->getNamespace(),
				'r_article' => $oldTitle->getText()
			),
			__METHOD__
		);
		// Article moves not logged
	}

	public static function getLogs() {
		$dbr = wfGetDB( DB_SLAVE );

	}
}
