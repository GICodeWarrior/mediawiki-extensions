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
		
		this.button = null;
		this.textInput = null;
		this.titleInput = null;

		this.fieldName = function( name ) {
			return 'review-' + ( this.review.fields.id === false ? 'new' : this.review.fields.id ) + '-' + name;
		};
		
		this.buildInterface = function() {
			this.titleInput =  $( '<input />' ).attr( {
				'type': 'text',
				'size': 45,
				'name': this.fieldName( 'title' )
			} ).val( this.review.fields.title );
			
			this.textInput =  $( '<textarea />' ).attr( {
				'name': this.fieldName( 'text' )
			} ).text( this.review.fields.text );

			this.button = $( '<button />' )
				.button( { 'label': mw.msg( 'reviews-submission-submit' ) } )
				.click( function() {
					_this.save();
				} );
			
			$this.html( '' );
			$this.append( this.titleInput, this.textInput, this.button );
		};
		
		this.setup = function() {
			this.review = new reviews.Review( $.parseJSON( $this.attr( 'data-review' ) ) );
			this.buildInterface();
		};
		
		this.readInputs = function() {
			this.review.fields.title = this.titleInput.val();
			this.review.fields.text = this.textInput.val();
		};
		
		this.save = function() {
			this.readInputs();
			
			this.button.button( 'disable' );
			
			this.review.save( function() {
				this.button.button( 'enable' );
			} );
		};
		
		this.setup();

		return this;
	};

})( window.jQuery, window.mediaWiki, window.reviews );
