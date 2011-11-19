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
			'time' => 'str', // TS_MW

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
	
	public function removeAllFromDB() {
	
	}

}
