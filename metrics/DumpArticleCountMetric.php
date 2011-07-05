<?php

class DumpArticleCountMetric extends ApiAnalyticsBase {

	public function getAllowedFilters() {
		return array(
			'selectprojects',
			'selectwikis',
		);
	}

	protected function getQueryInfo() {
		return array(
			'table' => array( 'comscores' ),
			'conds' => array(),
			'options' => array(),
			'join_conds' => array(),
		);
	}

	protected function getQueryFields() {
		return array( 'reach' );
	}

	public function getMetricField() {
		return 'reach';
	}

	public function getDescription() {
		return 'All namespace 0 pages which contain an internal link minus redirect pages (for some projects extra namespaces qualify)';
	}

	protected function getExamples() {
		return array(
			'api.php?action=analytics&metric=dumparitclecount',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
}
