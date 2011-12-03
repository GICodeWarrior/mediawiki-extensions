<?php

/**
 * Class to render reviews tags.
 * 
 * @since 0.1
 * 
 * @file ReviewsTag.php
 * @ingroup Reviews
 * 
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ReviewsTag {
	
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
	public function __construct( array $args, $contents = null ) {
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
	 * Renrder the survey div.
	 * 
	 * @since 0.1
	 * 
	 * @param Parser $parser
	 * 
	 * @return string
	 */
	public function render( Parser $parser ) {
		static $loadedJs = false;
		
		if ( !$loadedJs ) {
			$parser->getOutput()->addModules( 'ext.reviews.tag' );
			$parser->getOutput()->addHeadItem( 
				Skin::makeVariablesScript( array(  
					'wgReviewsSettings' => ReviewsSettings::getSettings()
				) )
			);
		}
		
		$reviews = $this->getReviews( $parser );
		
		if ( count( $reviews ) > 0 ) {
			return $this->getList( $reviews );
		}
		else {
			return is_null( $this->contents['default'] ) ? '' : $this->contents['default'];
		}
	}
	
	/**
	 * Get the reviews to display based on the provided arguments that are selection criteria.
	 * 
	 * @since 0.1
	 * 
	 * @param Parser $parser
	 * 
	 * @return array of Review
	 */
	protected function getReviews( Parser $parser ) {
		$conditions = array(
			'state' => array( Review::STATUS_NEW, Review::STATUS_REVIEWED )
		);
		
		if ( $this->contents['id'] ) {
			$conditions['id'] = $this->contents['id'];
		}
		
		if ( $this->contents['page'] ) {
			$title = Title::newFromText( $this->contents['page'] );
			
			if ( !is_null( $title ) ) {
				$conditions['page_id'] = $title->getArticleID();
			}
		}
		else {
			$conditions['page_id'] = $parser->getTitle()->getArticleID();
		}
		
		if ( $this->contents['user'] ) {
			$user = User::newFromName( $this->contents['user'] );
			
			if ( $user !== false ) {
				$conditions['user_id'] = $user->getId();
			}
		}
		
		return Review::select( null, $conditions );
	}
	
	/**
	 * Get the HTML for a list of reviews.
	 * 
	 * @since 0.1
	 * 
	 * @param array $reviews
	 * 
	 * @return string
	 */
	protected function getList( array /* of Review */ $reviews ) {
		$html = '';
		
		foreach ( $reviews as /* Review */ $review ) {
			$html .= $review->getHTML();
		}
		
		return $html;
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
			'id' => array( 'filter' => FILTER_VALIDATE_INT, 'options' => array( 'min_range' => 1 ) ),
			'page' => array(),
			'user' => array(),
			'default' => array(),
		);
	}

}
