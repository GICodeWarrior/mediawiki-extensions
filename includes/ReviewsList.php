<?php

/**
 * Class to render review lists.
 * 
 * @since 0.1
 * 
 * @file ReviewsList.php
 * @ingroup Reviews
 * 
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ReviewsList {
	
	/**
	 * List of review parameters.
	 * 
	 * @since 0.1
	 * 
	 * @var array
	 */
	protected $parameters;
	
	protected $contents;
	
	protected $titleCondition = false;
	
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
	 * Renrder the reviews div.
	 * 
	 * @since 0.1
	 * 
	 * @param IContextSource $contextSource
	 * @param Parser $parser
	 * 
	 * @return string
	 */
	public function render( IContextSource $contextSource = null, Parser $parser = null ) {
		static $loadedJs = false;
		
		$source = false;
		
		if ( !is_null( $contextSource ) ) {
			$source = $contextSource;
		}
	
		if ( !is_null( $parser ) ) {
			$source = $parser;
		}
		
		if ( !$loadedJs ) {
			$js = Skin::makeVariablesScript( array(  
				'wgReviewsSettings' => ReviewsSettings::getSettings()
			) );
			
			$source->getOutput()->addModules( 'ext.reviews.list' );
			
			if ( is_null( $contextSource ) ) {
				$source->getOutput()->addHeadItem( $js );
			}
			else {
				$source->getOutput()->addHeadItem( 'wgReviewsSettings', $js );
			}
		}
		
		$reviews = $this->getReviews( $source->getTitle() );
		
		if ( count( $reviews ) > 0 ) {
			return $this->getList( $reviews, $source->getUser() );
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
	 * @param Title $title
	 * 
	 * @return array of Review
	 */
	protected function getReviews( Title $title ) {
		$conditions = array(
			'state' => array( Review::STATUS_NEW, Review::STATUS_REVIEWED )
		);
		
		if ( $this->parameters['id'] ) {
			$conditions['id'] = $this->parameters['id'];
		}
		
		if ( $this->parameters['page'] ) {
			$ids = array();
			
			if ( $this->titleCondition !== false ) {
				$ids[] = $this->titleCondition->getArticleID();
			}
			
			$title = Title::newFromText( $this->parameters['page'] );
			
			if ( !is_null( $title ) ) {
				$ids[] = $title->getArticleID();
			}
			
			if ( count( $ids ) > 0 ) {
				$conditions['page_id'] = $ids;
			}
		}
		else {
			$conditions['page_id'] = $title->getArticleID();
		}
		
		if ( $this->parameters['user'] ) {
			$user = User::newFromName( $this->parameters['user'] );
			
			if ( $user !== false ) {
				$conditions['user_id'] = $user->getId();
			}
		}
		
		return Review::select( null, $conditions );
	}
	
	public function limitToTitle( Title $title ) {
		$this->titleCondition = $title;
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
	protected function getList( array /* of Review */ $reviews, User $user ) {
		$html = '';
		
		foreach ( $reviews as /* Review */ $review ) {
			$html .= $review->getHTML( $user );
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
