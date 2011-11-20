<?php

/**
 * Class representing a single review rating.
 *
 * @since 0.1
 *
 * @file ReviewRating.php
 * @ingroup Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ReviewRating extends ReviewsDBObject {

	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	public static function getDBTable() {
		return 'review_ratings';
	}

	/**
	 * @see parent::getFieldTypes
	 *
	 * @since 0.1
	 *
	 * @return string
	 */
	protected static function getFieldPrefix() {
		return 'rating_';
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
			'review_id' => 'int',
		
			'type' => 'int',
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
	 * Gets a list of the types of ratings that should show up for the context.
	 * 
	 * @since 0.1
	 * 
	 * @param ContextSource $context
	 * 
	 * @return array
	 */
	public static function getTypesForContext( ContextSource $context ) {
		$ratingsPerCat = ReviewsSettings::get( 'categoryRatings' );
		$ratings = array();
		
		foreach ( $context->getOutput()->getCategories() as $cat ) {
			if ( array_key_exists( $cat, $ratingsPerCat ) ) {
				$ratings = array_merge( $ratings, $ratingsPerCat[$cat] );
			}
		}
		
		return $ratings;
	}

}
