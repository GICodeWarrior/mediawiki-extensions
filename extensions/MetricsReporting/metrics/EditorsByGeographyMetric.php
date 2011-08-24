<?php

/**
 * Subclass this, pass the table name to the constructor, then just override
 * the getDescription and getExamples functions
 *
 * Then add it to the loader
 */
class EditorsByGeographyMetric extends GenericMetricBase {


	/**
	 * @param $tableName string
	 */
	function __construct() {
		parent::__construct("editorsbygeography");
	}


	public function getDescription(){
		return "Number of active unique registered editors by country";
	}

	protected function getExamples(){
		return "";
	}

	
}