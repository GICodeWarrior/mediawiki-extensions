<?php

class DumpEditsMetric extends ApiAnalyticsBase {

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
			'options' => array( 'GROUP BY' => 'date', ),
			'join_conds' => array(),
		);
	}

	protected function getQueryFields() {
		return array( 'edits' );
	}

	public function getDescription() {
		return 'All edits on articles (as defined by dumparticlecount)';
	}

	protected function getExamples() {
		return array(
			'api.php?action=analytics&metric=dumpedits',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
}
