<?php

/**
 *
 */
class EditorsByGeographyMetric extends GenericMetricBase {
	/**
	 * @param $tableName string
	 */
	function __construct( ApiBase $query, $moduleName, $paramPrefix = '', $tableName ) {
		parent::__construct( $query->getMain(), $moduleName, $paramPrefix, 'editorsbygeography' );
	}

	public function getDescription() {
		return "Number of active unique registered editors by country";
	}

	protected function getExamples() {
		return "";
	}
}