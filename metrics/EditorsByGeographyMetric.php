<?php

/**
 *
 */
class EditorsByGeographyMetric extends GenericMetricBase {
	/**
	 * @param $tableName string
	 */
	function __construct() {
		parent::__construct( 'editorsbygeography' );
	}

	public function getDescription() {
		return "Number of active unique registered editors by country";
	}

	protected function getExamples() {
		return "";
	}
}