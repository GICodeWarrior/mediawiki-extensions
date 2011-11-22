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
			return 'review-' + ( typeof this.review.fields.id === 'undefined' ? 'new' : this.review.fields.id ) + '-' + name;
		};
		
		this.buildInterface = function() {
			this.titleInput = $( '<input />' ).attr( {
				'type': 'text',
				'size': 45,
				'name': this.fieldName( 'title' )
			} ).val( this.review.fields.title );
			
			this.textInput = $( '<textarea />' ).attr( {
				'name': this.fieldName( 'text' )
			} ).text( this.review.fields.text );
			
			this.ratingInput = reviews.htmlSelect(
				{ 1: 1, 2: 2, 3: 3, 4: 4, 5: 5 }, // TODO
				this.review.fields.rating,
				{ 'name': this.fieldName( 'rating' ), 'id': this.fieldName( 'rating' ) }
			);
			
			this.ratingInput = $( '<div />' ).attr( 'id', this.fieldName( 'ratingdiv' ) ).html( this.ratingInput );

			this.button = $( '<button />' )
				.button( { 'label': mw.msg( 'reviews-submission-submit' ) } )
				.click( function() {
					_this.save();
				} );
			
			$this.html( '' );
			$this.append( this.titleInput, this.textInput, this.ratingInput, this.button );
			
			this.ratingInput.stars( {
				inputType: 'select',
				cancelShow: false,
				callback: function(ui, type, value) {
					_this.review.fields.rating = parseInt( value );
				}
			} );
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
			this.button.button( 'option', 'label', mw.msg( 'reviews-submission-saving' ) );
			
			this.review.save( function( success ) {
				if ( success ) {
					// TODO
				}
				else {
					alert( 'Review could not be saved' ); // TODO
				}
				
				_this.button.button( 'enable' );
				_this.button.button( 'option', 'label', mw.msg( 'reviews-submission-submit' ) );
			} );
		};
		
		this.setup();

		return this;
	};

})( window.jQuery, window.mediaWiki, window.reviews );
