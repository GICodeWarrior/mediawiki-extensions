/**
 * JavasSript for the Reviews MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw, reviews ) { $.fn.reviewRating = function( options ) {
	
	var settings = $.extend( {
		
	} );
	
	return this.each( function() {

		var _this = this;
		var $this = $( _this );
		
		this.setup = function() {
			$this.html( $( '<p>' ).text( $this.attr( 'data-type' ) + ': ' ) );
			
			$this.append( reviews.htmlSelect(
				{ 1: 1, 2: 2, 3: 3, 4: 4, 5: 5 }, // TODO
				parseInt( $this.attr( 'data-value' ) ), { }
			) );
			
			$this.stars( {
				inputType: 'select',
				cancelShow: false,
				disabled: true
			} );
		};
	
		this.setup();
	
	});
	
}; })( window.jQuery, window.mediaWiki, window.reviews );
