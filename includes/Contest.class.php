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
	
	const STATUS_DRAFT = 0;
	const STATUS_ACTIVE = 1;
	const STATUS_FINISHED = 2;
	
	/**
	 * Method to get an instance so methods that ought to be static,
	 * but can't be due to PHP 5.2 not having LSB, can be called on
	 * it. This also allows easy identifying of code that needs to
	 * be changed once PHP 5.3 becomes an acceptable requirement. 
	 * 
	 * @since 0.1
	 * 
	 * @return ContestDBObject
	 */
	public static function s() {
		static $instance = false;
		
		if ( $instance === false ) {
			$instance = new self( array() );
		}
		
		return $instance;
	}
	
	/**
	 * Get a new instance of the class from an array. 
	 * 
	 * @since 0.1
	 * 
	 * @param array $data
	 * @param boolean $loadDefaults
	 * 
	 * @return ContestDBObject
	 */	
	public function newFromArray( array $data, $loadDefaults = false ) {
		return new self( $data, $loadDefaults );
	}
	
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
			'status' => 'int',
			'submission_count' => 'int',
		);
	}
	
	/**
	 * @see parent::getDefaults
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
	public function getDefaults() {
		return array(
			'name' => '',
			'status' => self::STATUS_DRAFT,
			'submission_count' => 0,
		);
	}
	
	public static function getStatusMessage( $status ) {
		static $map = false;
		
		if ( $map === false ) {
			$map = array_flip( self::getStatusMessages() );
		}
		
		return $map[$status];
	}
	
	public static function getStatusMessages() {
		static $map = false;
		
		if ( $map === false ) {
			$map = array(
				wfMsg( 'contest-status-draft' ) => self::STATUS_DRAFT,
				wfMsg( 'contest-status-active' ) => self::STATUS_ACTIVE,
				wfMsg(  'contest-status-finished' ) => self::STATUS_FINISHED,
			);
		}
		
		return $map;
	}
	
}