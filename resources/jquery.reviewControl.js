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

		this.fieldName = function( name ) {
			return ( this.review.fields.id === false ? 'new-review' : this.review.fields.id ) + '-' + name;
		};
		
		this.buildInterface = function() {
			$this.html( $( '<input />' ).attr( {
				'type': 'text',
				'size': 45,
				'name': this.fieldName( 'title' )
			} ).text( this.review.fields.title ) );
			
			$this.append( $( '<textarea />' ).attr( {
				'name': this.fieldName( 'text' )
			} ).text( this.review.fields.text ) );			
		};
		
		this.setup = function() {
			var data = $this.attr( 'data-review' );
			data = data === undefined ? false : $.parseJSON( data );
			this.review = new reviews.Review( data, $.parseJSON( $this.attr( 'data-rating-types' ) ) );
			this.buildInterface();
		};
		
		this.readInputs = function() {
			
			this.review = new reviews.review(); // TODO
		};
		
		this.save = function() {
			this.readInputs();
			
			
			this.review.save( function() {
				
			} );
		};
		
		this.setup();

		return this;
	};

})( window.jQuery, window.mediaWiki, window.reviews );
