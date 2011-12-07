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
		
			'type' => 'str',
			'value' => 'int'
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
	 * @param string $titleText
	 * 
	 * @return array
	 */
	public static function getTypesForTitleText( $titleText ) {
		$ratingsPerCat = ReviewsSettings::get( 'categoryRatings' );
		$ratings = array();
		
		$api = new ApiMain( new FauxRequest( array(
			'action' => 'query',
			'format' => 'json',
			'prop' => 'categories',
			'titles' => $titleText,
		), true ), true );
		
		$api->execute();
		$result = $api->getResultData();

		if ( !array_key_exists( 'query', $result ) || !array_key_exists( 'pages', $result['query'] ) ) {
			return array();
		}
		
		foreach ( $result['query']['pages'] as $page ) {
			if ( array_key_exists( 'categories', $page ) ) {
				foreach ( $page['categories'] as $cat ) {
					$cat = explode( ':', $cat['title'], 2 );
					$cat = $cat[1];
					if ( array_key_exists( $cat, $ratingsPerCat ) ) {
						$ratings = array_merge( $ratings, $ratingsPerCat[$cat] );
					}
				}
			}
		}
		
		return $ratings;
	}
	
	/**
	 * Gets the HTML to display this rating.
	 * 
	 * @since 0.1
	 * 
	 * @return string
	 */
	public function getDisplayHTML() {
		return self::getDisplayHTMLFor( $this );
	}
	
	/**
	 * Gets the HTML to display the provided rating.
	 * 
	 * @since 0.1
	 * 
	 * @param ReviewRating $rating
	 * @param integer|false $count
	 * 
	 * @return string
	 */
	public static function getDisplayHTMLFor( ReviewRating $rating, $count = false ) {
		$attribs = array(
			'class' => 'review-rating-display',
			'data-value' => $rating->getField( 'value' ),
		);
		
		if ( $rating->hasField( 'type' ) ) {
			$attribs['data-type'] = $rating->getField( 'type' );
		}
		
		if ( $count !== false ) {
			$attribs['data-count'] = $count;
		}
		
		return Html::element( 'div', $attribs );
	}
	
}
