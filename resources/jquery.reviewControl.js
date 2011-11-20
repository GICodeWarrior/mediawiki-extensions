/**
 * JavasSript for the Reviews MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw, reviews ) {

	$.fn.reviewControl = function() {
		var _this = this;
		var $this = $( this );
		
		this.review = null;

		this.setup = function() {
			var data = $this.attr( 'data-review' );
			this.review = new reviews.Review( data === undefined ? false : $.parseJSON( data ) );
			
		};
		
		this.setup();

		return this;
	};

})( window.jQuery, window.mediaWiki, window.reviews );
