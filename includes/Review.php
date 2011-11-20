<?php

/**
 * Class representing a single review.
 *
 * @since 0.1
 *
 * @file Review.php
 * @ingroup Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class Review extends ReviewsDBObject {

	// Constants representing the states a review can have.
	const STATUS_NEW = 0;
	const STATUS_FLAGGED = 1;
	const STATUS_REVIEWED = 2;

	/**
	 * 
	 *
	 * @since 0.1
	 * @var array of ReviewRating
	 */
	protected $ratings = false;

	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public static function getDBTable() {
		return 'reviews';
	}

	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	protected static function getFieldPrefix() {
		return 'review_';
	}

	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	protected static function getFieldTypes() {
		return array(
			'id' => 'id',
			'page_id' => 'int',
			'user_id' => 'int',
		
			'title' => 'str',
			'text' => 'str',
			'post_time' => 'str', // TS_MW
			'edit_time' => 'str', // TS_MW
			'state' => 'int',
			'rating' => 'int',
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
		);
	}
	
	/**
	 * Remove the review and all it's linked data, such as ratings,
	 * from the database.
	 * 
	 * @since 0.1
	 * 
	 * @return boolean Success indicator
	 */
	public function removeAllFromDB() {
		$id = $this->getId();
		
		$success = $this->removeFromDB();
		
		if ( $success ) {
			$success = ReviewRating::delete( array( 'review_id' => $id ) ) && $success;
		}
		
		return $success;
	}

}
