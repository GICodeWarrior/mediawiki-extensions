/**
 * JavasSript for the Reviews MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw, reviews ) { 

	$( document ).ready( function() {
		
		$( '.reviews-state-controls' ).reviewState();
		
		$( '.reviews-delete-button' ).button().click( function() {
			if ( confirm( mw.msg( 'reviews-reviews-delete-confirm' ) ) ) {
				var $this = $( this );
				var review = new reviews.Review( { 'id': $this.attr( 'data-review-id' ) } );
				$this.button( 'disable' );
				
				review.remove( function( success ) {
					if ( success ) {
						window.location = $this.attr( 'data-completion-url' );
					}
					else {
						// TODO
						alert( 'The review could not be removed.' );
						$this.button( 'enable' );
					}
				} );
			}
		} );
		
		$( '.review-rating-display' ).reviewRating();
		
	} );
	
})( window.jQuery, window.mediaWiki, window.reviews );
