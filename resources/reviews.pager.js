/**
 * JavasSript for the Reviews MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw ) { 

	$( document ).ready( function() {
		
		$.each( $( '.reviews-state-controls' ), function( i, e ) { 
			$( e ).reviewState();
		} );
		
		$( '.review-rating-display' ).reviewRating();
		
	} );
	
})( window.jQuery, window.mediaWiki );
