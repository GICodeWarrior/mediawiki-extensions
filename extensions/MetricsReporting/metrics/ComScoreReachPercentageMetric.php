<?php

class ComScoreReachPercentageMetric extends ApiAnalyticsBase {

	public function getAllowedFilters() {
		return array(
			'selectregions',
			'selectcountries',
		);
	}

	protected function getQueryInfo() {
		return array(
			'table' => array( 'comscore', 'comscore_regisons'),
			'conds' => array(),
			'options' => array( 'ORDER BY' => 'comscore.region_code, date' ),
			'join_conds' => array(
				'comscore_regisons' => array( 'LEFT JOIN', "comscore.region_code = comscore_regions.region_code AND report_language = 'en' " )
			),
		);
	}

	protected function getQueryFields() {
		return array( 'date', 'reach', 'comscore.region_code', 'region_name');
	}

	public function getDescription() {
		return 'Percentage of total unique visitors to any web property which also visited a Wikimedia wiki';
	}

	protected function getExamples() {
		return array(
			'api.php?action=analytics&metric=',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
}
