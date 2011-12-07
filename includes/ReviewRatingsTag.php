<?php

/**
 * Class to render ratings tags.
 * 
 * @since 0.1
 * 
 * @file ReviewRatingsTag.php
 * @ingroup Reviews
 * 
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ReviewRatingsTag {
	
	/**
	 * List of review parameters.
	 * 
	 * @since 0.1
	 * 
	 * @var array
	 */
	protected $parameters;
	
	protected $contents;
	
	/**
	 * Constructor.
	 * 
	 * @since 0.1
	 * 
	 * @param array $args
	 * @param string|null $contents
	 */
	public function __construct( array $args = array(), $contents = null ) {
		$this->contents = $contents;
		
		$args = filter_var_array( $args, $this->getTagParameters() );
		
		if ( is_array( $args ) ) {
			$this->parameters = $args;
		} else {
			// TODO: nicer handling
			throw new MWException( 'Invalid parameters for reviews tag.' );
		}
	}
	
	/**
	 * Renrder the ratings div.
	 * 
	 * @since 0.1
	 * 
	 * @param Parser $parser
	 * 
	 * @return string
	 */
	public function render( Parser $parser ) {
		$ratings = $this->getRatings( $parser->getTitle() );
		
		$count = count( $ratings );
		$sum = array_sum( $ratings );
		
		$rating = new ReviewRating( array(
			'value' => $sum / $count
		) );
		
		return ReviewRating::getDisplayHTMLFor( $rating, $count );
	}
	
	/**
	 * 
	 * 
	 * @since 0.1
	 * 
	 * @param Title $title
	 * 
	 * @return array of floats
	 */
	protected function getRatings( Title $title ) {
		$conditions = array();
		
		$titleArg = null;
		
		if ( $this->parameters['page'] ) {
			$titleArg = Title::newFromText( $this->parameters['page'] );
		}
		
		if ( is_null( $titleArg ) ) {
			$titleArg = $title;
		}
		
		$conditions[Review::getPrefixedField( 'page_id' )] = $title->getArticleID();
		
		if ( $this->parameters['user'] ) {
			$user = User::newFromName( $this->parameters['user'] );
			
			if ( $user !== false ) {
				$conditions[Review::getPrefixedField( 'user_id' )] = $user->getId();
			}
		}
		
		$hasType = (bool)$this->parameters['type'];
		$dbr = wfGetDB( DB_SLAVE );
		
		if ( $hasType ) {
			$conditions[ReviewRating::getPrefixedField( 'type' )] = $this->parameters['type'];
			
			$result = $dbr->select(
				array( 'review_ratings', 'reviews' ),
				array( 'rating_value' ),
				$conditions,
				__METHOD__,
				array(),
				array(
					'reviews' => array( 'INNER JOIN', array( 'review_id=rating_review_id' ) ),
				)
			);
		}
		else {
			$result = $dbr->select(
				'reviews',
				array( 'review_rating' ),
				$conditions
			);
		}
		
		$results = array();
		
		foreach ( $result as $item ) {
			$results[] = $hasType ? (float)$item->rating_value : (float)$item->review_rating;
		}
		
		return $results;
	}
	
	/**
	 * Gets the parameters accepted by this tag extension.
	 * 
	 * @since 0.1
	 * 
	 * @param array $args
	 * 
	 * @return array
	 */
	protected function getTagParameters() {
		return array(
			'page' => array(),
			'user' => array(),
			'type' => array(),
		);
	}

}
