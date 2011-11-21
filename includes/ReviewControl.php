<?php

class ReviewControl {

	protected $review;
	protected $context;
	
	public function __construct( Review $review = null ) {
		$this->review = $review;
	}
	
	public function addToContext( ContextSource &$context ) {
		$this->context = &$context;
		
		$out = $context->getOutput();
		$out->addModules( 'reviews.review.control' );
		
		$attribs = array(
			'class' => 'review-control',
		);
		
		$types = ReviewRating::getTypesForContext( $this->context );
		
		if ( is_null( $this->review ) ) {
			$ratings = array();
			
			foreach ( $types as $type ) {
				$ratings[$type] = false;
			}
			
			$review = array(
				'page_id' => $context->getTitle()->getArticleID(),
				'title' => '',
				'text' => '',
				'rating' => 0,
				'ratings' => $ratings
			);
		} 
		else {
			$review = $this->review->toArray( array( 'page_id', 'title', 'text', 'rating' ), null, $types );
		}
		
		$attribs['data-review'] = FormatJson::encode( $review );
		
		$out->addHTML( Html::element( 'div', $attribs ) );
	}

}