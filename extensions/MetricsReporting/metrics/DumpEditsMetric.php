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
			'table' => array(),
			'conds' => array(),
			'options' => array(),
			'join_conds' => array(),
		);
	}

	protected function getQueryFields() {
		return array();
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
