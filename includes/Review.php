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
	
	/**
	 * (non-PHPdoc)
	 * @see ReviewsDBObject::insertIntoDB()
	 */
	protected function insertIntoDB() {
		$success = parent::insertIntoDB();
		
		if ( $success && $this->ratings !== false ) {
			foreach ( $this->getRatings() as /* ReviewRating */ $rating ) {
				$rating->writeToDB();
			}
		}
		
		return $success;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see ReviewsDBObject::updateInDB()
	 */
	protected function updateInDB() {
		$success = parent::updateInDB();
		
		if ( $success && $this->ratings !== false ) {
			$existingRatings = $this->getRatingsFromDB();
			$existing = array();
			
			foreach ( $existingRatings as /* ReviewRating */ $rating ) {
				$existing[$rating->getField( 'type' )] = $rating->getField( 'id' );
			}
			
			foreach ( $this->getRatings() as /* ReviewRating */ $rating ) {
				if ( array_key_exists( $rating->getField( 'type' ), $existing ) ) {
					$rating->setField( 'id', $existing[$rating->getField( 'type' )] );
				}
			}
		}
		
		return $success;
	}
	
	/**
	 * Load the ratings part of this review from the database.
	 * 
	 * @since 0.1
	 * 
	 * @return array of ReviewRating
	 */
	protected function getRatingsFromDB() {
		return ReviewRating::select( null, array( 'review_id' => $this->getId() ) );
	}
	
	/**
	 * Get the ratings part of this review.
	 * 
	 * @since 0.1
	 * 
	 * @return array of ReviewRating
	 */
	public function getRatings( $forceLoad = false ) {
		if ( $forceLoad || $this->ratings === false ) {
			$this->ratings = $this->getRatingsFromDB();
		}
		
		return $this->ratings;
	}
	
	/**
	 * Sets the ratings part of this review.
	 * 
	 * @since 0.1
	 * 
	 * @param array of ReviewRating $ratings
	 */
	public function setRatings( array /* of ReviewRating */ $ratings ) {
		$this->ratings = $ratings;
	}
	
	/**
	 * Sets the ratings part of this review.
	 * Ratings provided as type => value
	 * 
	 * @since 0.1
	 * 
	 * @param array $ratings
	 */
	public function setRatingArray( array $ratings ) {
		$objects = array();
		
		foreach ( $ratings as $type => $value ) {
			$objects[] = new ReviewRating( array(
				'type' => $type,
				'id' => $value
			) );
		}
		
		$this->setRatings( $objects );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see ReviewsDBObject::toArray()
	 */
	public function toArray( $fields = null, $incNullId = false, array $types = null ) {
		$array = parent::toArray( $fields, $incNullId );
		
		if ( !is_null( $types ) ) {
			$array['ratings'] = $this->getRatingArray( $types );
		}
		
		return $array;
	}
	
	/**
	 * Returns the ratings in associative array form.
	 * The array keys are the rating names, the values are their values.
	 * 
	 * @since 0.1
	 * 
	 * @param array $types
	 * 
	 * @return array
	 */
	public function getRatingArray( array $types = null ) {
		$ratings = array();
		
		foreach ( $this->getRatings() as /* ReviewRating */ $rating ) {
			if ( is_null( $types ) || in_array( $rating->getField( 'type' ), $types ) ) {
				$ratings[$rating->getField( 'type' )] = $rating->getField( 'value' );
			}
		}
		
		if ( !is_null( $types ) ) {
			foreach ( $types as $type ) {
				if ( !array_key_exists( $type, $ratings ) ) {
					$ratings[$type] = false;
				}
			}
		}
		
		return $ratings;
	}
	
	/**
	 * Get the message for a review state.
	 * 
	 * @since 0.1
	 * 
	 * @param Review::STATE_ $state
	 * 
	 * @return string
	 */
	public static function getStateMessage( $state ) {
		$map = array(
			self::STATUS_NEW => 'new',
			self::STATUS_FLAGGED => 'flagged',
			self::STATUS_REVIEWED => 'reviewed',
		);
		
		return wfMsg( 'reviews-state-' . $map[$state] );
	}

}
