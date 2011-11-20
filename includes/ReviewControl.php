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
			'data-rating-types' => FormatJson::encode( ReviewRating::getTypesForContext( $this->context ) )
		);
		
		if ( !is_null( $this->review ) ) {
			$attribs['data-review'] = FormatJson::encode( $this->review->toArray() );
		}
		
		$out->addHTML( Html::element( 'div', $attribs ) );
	}

}