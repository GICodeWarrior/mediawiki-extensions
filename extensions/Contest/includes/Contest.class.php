<?php

/**
 * Class representing a single contest.
 * 
 * @since 0.1
 * 
 * @file Contest.class.php
 * @ingroup Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class Contest extends ContestDBObject {
	
	const STATUS_DRAFT = 0;
	const STATUS_ACTIVE = 1;
	const STATUS_FINISHED = 2;
	
	protected $challanges = null;
	protected $contestants = null;
	
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
	 * This method ought to be in the basic class and
	 * return a new static(), but this requires LSB/PHP>=5.3.
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
			'rules_page' => 'str',
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
			'rules_page' => '',
		);
	}
	
	/**
	 * Gets the message for the provided status.
	 * 
	 * @param Contest::STATUS_ $status
	 * 
	 * @return string
	 */
	public static function getStatusMessage( $status ) {
		static $map = false;
		
		if ( $map === false ) {
			$map = array_flip( self::getStatusMessages() );
		}
		
		return $map[$status];
	}
	
	/**
	 * Returns a list of status messages and their corresponding constants.
	 * 
	 * @since 0.1
	 * 
	 * @return array
	 */
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
	
	public function loadChallanges() {
		$this->challanges = ContestChallange::s()->select(
			null,
			array( 'contest_id' => $this->getId() )
		);
	}
	
	/**
	 * Gets the challanges that are part of this contest.
	 * 
	 * @since 0.1
	 * 
	 * @return array of ContestChallange
	 */
	public function getChallanges( $forceLoad = false ) {
		if ( is_null( $this->challanges ) || $forceLoad ) {
			$this->loadChallanges();
		}
		
		return $this->challanges;
	}
	
	public function loadContestants() {
		$this->contestants = ContestContestant::s()->select(
			null,
			array( 'contest_id' => $this->getId() )
		);
	}
	
	/**
	 * Gets the contestants for this contest.
	 * 
	 * @since 0.1
	 * 
	 * @return array of ContestContestant
	 */
	public function getContestants( $forceLoad = false ) {
		if ( is_null( $this->contestants ) || $forceLoad ) {
			$this->loadContestants();
		}
		
		return $this->contestants;
	}
	
	public function setContestants( array /* of ContestContestant */ $contestants ) {
		$this->contestants = $contestants;
	}
	
	public function setChallanges( array /* of ContestChallange */ $challanges ) {
		$this->challanges = $challanges;
	}
	
	public function writeAllToDB() {
		$success = parent::writeToDB();
		
		if ( $success ) {
			$success = $this->writeChallangesToDB();
		}
		
		if ( $success ) {
			$success = $this->writeContestantsToDB();
		}
		
		return $success;
	}
	
	public function writeChallangesToDB() {
		if ( is_null( $this->challanges ) || count( $this->challanges ) == 0 ) {
			return true;
		}
		
		$dbw = wfGetDB( DB_MASTER );
		$success = true;
		
		$dbw->begin();
		
		foreach ( $this->challanges as /* ContestChallange */ $challange ) {
			$challange->setField( 'contest_id', $this->getId() );
			$success &= $challange->writeToDB();
		}
		
		$dbw->commit();
		
		return $success;
	}
	
	public function writeContestantsToDB() {
		if ( is_null( $this->contestants ) || count( $this->contestants ) == 0 ) {
			return true;
		}
		
		$dbw = wfGetDB( DB_MASTER );
		$success = true;
		$nr = 0;
		
		$dbw->begin();
		
		foreach ( $this->contestants as /* ContestContestant */ $contestant ) {
			$contestant->setField( 'contest_id', $this->getId() );
			$success &= $contestant->writeToDB();
			
			if ( ++$nr % 500 == 0 ) {
				$dbw->commit();
				$dbw->begin();
			}
		}
		
		$dbw->commit();
		
		return $success;
	}
	
}