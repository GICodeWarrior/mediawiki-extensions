<?php

class ReviewControl {

	protected $review;
	protected $context;
	
	public function __construct( Review $review = null ) {
		$this->review = $review;
	}
	
	public function addToContext( ContextSource &$context = null ) {
		$this->context = $context;
		
		$out = $context->getOutput();
		$out->addModules( 'reviews.review.control' );
		
		$attribs = array(
			'class' => 'review-control',
		);
		
		$pageId = is_null( $this->review ) ? $context->getTitle()->getArticleID() : $this->review->getField( 'page_id' );
		$types = ReviewRating::getTypesForPageID( $pageId );
		
		if ( is_null( $this->review ) ) {
			$ratings = array();
			
			foreach ( $types as $type ) {
				$ratings[$type] = false;
			}
			
			$review = array(
				'page_id' => $pageId,
				'title' => '',
				'text' => '',
				'rating' => 0,
				'ratings' => $ratings
			);
		} 
		else {
			$review = $this->review->toArray( array( 'id', 'page_id', 'title', 'text', 'rating' ), false, $types );
		}
		
		$attribs['data-review'] = FormatJson::encode( $review );
		
		$out->addHTML( Html::element( 'div', $attribs ) );
	}

}