<?php

/**
 * Has static methods to grab assessment statistics
 **/

class Statistics {
	public static function getImportanceColumn( $importance ) {
		$importanceColumnMapping = array(
			'top' => 'ps_top_icount',
			'high' => 'ps_high_icount',
			'mid' => 'ps_mid_icount',
			'low' => 'ps_mid_icount',
			'no' => 'ps_no_icount',
			'' => 'ps_unclassified_icount'
		);

		return $importanceColumnMapping[ strtolower( $importance ) ];
	}

	public static function getProjectStats( $project ) {
		$dbr = wfGetDB( DB_SLAVE );
		$query = $dbr->select(
			"project_stats",
			"*",
			array(
				"ps_project" => $project
			),
			__METHOD__
		);

		$project_statistics = array(
			"top" => array(),
			"high" => array(),
			"mid" => array(),
			"low" => array(),
			"no" => array(),
			"" => array()
		);


		foreach( $query as $row_object ) {
			$data_row = (array)$row_object;
			$quality = $data_row['ps_quality'];
			foreach( $project_statistics as $importance => &$importance_row ) {
				$importance_row[$quality] = $data_row[Statistics::getImportanceColumn( $importance )];
			}
		}

		// Make '' into 'unclassified'
		$project_statistics['unclassified'] = $project_statistics[''];
		unset( $project_statistics[''] );

		return $project_statistics;
	}

}
