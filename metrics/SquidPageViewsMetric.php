<?php

class SquidPageViewsMetric extends ApiAnalyticsBase {

	public function getAllowedFilters() {
		return array(
			'selectregions',
			'selectcountries',
			'selectwebproperties',
			'selectprojects',
			'selectwikis',
			'selectplatform',
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

	protected function canBeNormalised() {
		return true;
	}

	public function getDescription() {
		return array(
			'Total articles (htm component) requested from nearly all Wikimedia wikis (exceptions are mostly special purpose wikis, e.g. wikimania wikis)',
			'Totals are based on the archived 1:1000 sampled squid logs.',
		);
	}

	protected function getExamples() {
		return array(
			'api.php?action=analytics&metric=squidpageviews',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
}
