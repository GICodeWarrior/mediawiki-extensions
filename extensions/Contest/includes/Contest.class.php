<?php

/**
 * Abstract base class for representing objects that are stored in some DB table.
 * 
 * @since 0.1
 * 
 * @file ContestDBObject.php
 * @ingroup Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class Contest extends ContestDBObject {
	
	/**
	 * @see parent::getFieldTypes
	 * 
	 * @since 0.1
	 * 
	 * @return string
	 */
	public function getDBTable() {
		return 'contests';
	}

	/**
	 * @see parent::getFieldTypes
	 * 
	 * @since 0.1
	 * 
	 * @return string
	 */
	protected function getFieldPrefix() {
		return 'contest_';
	}
	
	/**
	 * @see parent::getFieldTypes
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	protected function getFieldTypes() {
		return array(
			'id' => 'id',
			'name' => 'str',
			'enabled' => 'bool',
			'submission_count' => 'int'
		);
	}
	
	/**
	 * @see parent::getDefaults
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	public static function getDefaults() {
		return array(
			'name' => '',
			'enabled' => false,
			'submission_count' => 0,
		);
	}
	
}