<?php

/**
 * Review control.
 *
 * @since 0.1
 *
 * @file ReviewsControl.php
 * @ingroup Reviews
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ReviewControl {

	protected $review;
	protected $context;
	protected $reload;
	
	public function __construct( Review $review = null, $reload = false ) {
		$this->review = $review;
		$this->reload = $reload;
	}
	
	public function addToContext( ContextSource &$context = null ) {
		$this->context = $context;
		
		$out = $context->getOutput();
		$out->addModules( 'reviews.review.control' );
		
		$attribs = array(
			'class' => 'review-control',
		);
		
		$title = is_null( $this->review ) ? $context->getTitle() : Title::newFromID( $this->review->getField( 'page_id' ) );
		$types = is_null( $title ) ? array() : ReviewRating::getTypesForTitleText( $title->getFullText() );
		
		if ( is_null( $this->review ) ) {
			$out->addHTML( Html::element( 'h2', array( 'id' => 'reviews-post' ), wfMsg( 'reviews-submission-post-title' ) ) );
			
			$ratings = array();
			
			foreach ( $types as $type ) {
				$ratings[$type] = false;
			}
			
			$review = array(
				'page_id' => $title->getArticleID(),
				'title' => '',
				'text' => '',
				'rating' => 0,
				'ratings' => $ratings
			);
		}
		else {
			$out->addHTML( Html::element( 'h2', array( 'id' => 'reviews-edit' ), wfMsg( 'reviews-submission-edit-title' ) ) );
			
			$review = $this->review->toArray( array( 'id', 'page_id', 'title', 'text', 'rating' ), false, $types );
		}
		
		$attribs['data-review'] = FormatJson::encode( $review );
		
		if ( $this->reload ) {
			$attribs['data-reload-target'] = $context->getTitle()->getLocalURL( array( 'action' => 'purge' ) );
		}
		
		$out->addHTML( Html::element( 'div', $attribs ) );
	}

}