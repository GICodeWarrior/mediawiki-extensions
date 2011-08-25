<?php

class DumpActiveEditors100Metric extends DumpActiveEditors5Metric {

	public function __construct( ApiBase $query, $moduleName ) {
		parent::__construct( $query->getMain(), $moduleName );
		$this->numberOfActiveEditors = 100;
	}

	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}
}
