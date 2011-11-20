/**
 * JavasSript for the Reviews MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw, reviews ) {
	
	reviews.Rating = function( data ) {
		console.log( data );
	};
	
	reviews.Rating.prototype = {
		
	};
	
})( window.jQuery, window.mediaWiki, window.reviews );