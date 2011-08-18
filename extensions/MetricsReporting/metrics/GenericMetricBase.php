<?php

/**
 * Subclass this, pass the table name to the constructor, then just override
 * the getDescription and getExamples functions
 *
 * Then add it to the loader
 */
abstract class GenericMetricBase extends ApiAnalyticsBase {

	protected $tableName;

	/**
	 * @param $tableName string
	 */
	function __construct( $tableName ) {
		$this->tableName = $tableName;
	}

	public function getAllowedFilters() {
		return array(
			'selectprojects',
			'selectcountries',
		);
	}

	protected function getQueryInfo() {
		return array(
			'table' => array( $this->tableName ),
			'conds' => array(),
			'options' => array( 'GROUP BY' => 'date', 'ORDER BY' => 'date' ),
			'join_conds' => array(),
		);
	}

	protected function getQueryFields() {
		return array( 'date', 'language_code', 'project_code', 'country_code', 'value' );
	}

	public abstract function getDescription();

	protected abstract function getExamples();

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
}