<?php

class DumpActiveEditors5Metric extends ApiAnalyticsBase {

	public function getAllowedFilters() {
		return array(
			'selectprojects',
			'selectwikis',
		);
	}

	protected function getQueryInfo() {
		return array(
			'table' => array( 'wikistats' ),
			'conds' => array(),
			'options' => array( 'GROUP BY' => 'date', 'ORDER BY' => 'date' ),
			'join_conds' => array(),
		);
	}

	protected function getQueryFields() {
		return array( 'date', 'project_code', 'SUM(editors_ge_5)' );
	}

	public function getDescription() {
		return 'All registered editors that made 5 or more edits in a certain month';
	}

	protected function getExamples() {
		return array(
			'api.php?action=analytics&metric=dumpactiveeditors5',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
}
