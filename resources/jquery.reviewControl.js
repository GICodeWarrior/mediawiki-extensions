/**
 * JavasSript for the Reviews MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw, reviews ) { $.fn.reviewControl = function( options ) {
	
	var settings = $.extend( {
		
	}, options );
	
	return this.each( function() {
		
		var _this = this;
		var $this = $( this );
		
		this.review = null;
		
		this.button = null;
		this.textInput = null;
		this.titleInput = null;

		this.fieldName = function( name ) {
			return 'review-' + ( typeof this.review.fields.id === 'undefined' ? 'new' : this.review.fields.id ) + '-' + name;
		};
		
		this.buildRatingsControl = function() {
			var ratings = this.review.fields.ratings;
			var $tr = $( '<tr>' ).html( '' );
			
			for ( rating in ratings ) {
				if ( ratings.hasOwnProperty( rating ) ) {
					$tr.append( $( '<td>' ).append(
						$( '<div>' )
							.attr( {
								'id': this.fieldName( 'ratingdiv' + rating ),
								'data-type': rating,
								'class': 'review-ratings-div'
							} )
							.html( reviews.htmlSelect(
								{ 1: 1, 2: 2, 3: 3, 4: 4, 5: 5 }, // TODO
								ratings[rating],
								{
									'name': this.fieldName( 'rating' + rating ),
									'id': this.fieldName( 'rating' + rating ),
									'class': 'review-specificratinginput'
								}
							) )
							.prepend( $( '<label>' ).attr( {
								'for': this.fieldName( 'ratingdiv' + rating ),
								'class': 'review-ratings-label'
							} ).text( rating ) )
						)
					);
				}
			}
			
			this.ratingsInput = $( '<div>' )
				.attr( { 'class': 'review-ratings-table-div' } )
				.html( $( '<table>' ).html( $tr ).attr( { 'class': 'review-ratings-table' } ) );
		};
		
		this.buildInterface = function() {
			this.titleInput = $( '<input>' ).attr( {
				'type': 'text',
				'size': 45,
				'name': this.fieldName( 'title' ),
				'class': 'review-titleinput'
			} ).val( this.review.fields.title );
			
			this.textInput = $( '<textarea>' ).attr( {
				'name': this.fieldName( 'text' ),
				'class': 'review-textinput'
			} ).text( this.review.fields.text );
			
			this.ratingInput = reviews.htmlSelect(
				{ 1: 1, 2: 2, 3: 3, 4: 4, 5: 5 }, // TODO
				this.review.fields.rating,
				{
					'name': this.fieldName( 'rating' ),
					'id': this.fieldName( 'rating' ),
					'class': 'review-ratinginput'
				}
			);
			
			this.ratingInput = $( '<div>' ).attr( {
				'id': this.fieldName( 'ratingdiv' ),
				'class': 'review-ratingdiv'
			} ).html( this.ratingInput );
			
			this.buildRatingsControl();
			
			this.button = $( '<button>' )
				.attr( { 'class': 'review-save' } )
				.button( { 'label': mw.msg( 'reviews-submission-submit' ) } )
				.click( function() {
					_this.save();
				} );
			
			this.successMessage = $( '<p>' )
				.text( mw.msg( 'reviews-submission-success' ) )
				.attr( { 
					'class': 'reviews-submission-success',
					'style': 'display: none;'
				} );
			
			$this.html( '' );
			
			$this.append(
				$( '<label>' ).attr( { 'for': this.fieldName( 'title' ) } ).text( mw.msg( 'reviews-submission-title' ) + ' ' ),
				this.titleInput
			).append( '<br>' );
			
			$this.append(
				$( '<label>' ).attr( { 'for': this.fieldName( 'text' ) } ).text( mw.msg( 'reviews-submission-text' ) ).append( '<br>' ),
				this.textInput
			).append( '<br>' );
			
			$this.append(
				this.ratingInput.prepend( $( '<label>' ).attr( {
					'for': this.fieldName( 'rating' ),
					'class': 'review-rating-label'
				} ).text( mw.msg( 'reviews-submission-rating' ) ) )
			);
			
			$this.append( this.ratingsInput );
			
			$this.append( $( '<div>' ).html( this.button ).append( this.successMessage ).attr( {
				'class': 'reviews-submission-submitdiv'
			} ) );
			
			$this.append( '<hr style="display: block; clear: both; visibility: hidden;" />' );
			
			this.ratingInput.stars( {
				inputType: 'select',
				cancelShow: false,
				callback: function(ui, type, value) {
					_this.review.fields.rating = parseInt( value );
				}
			} );
			
			$( '.review-ratings-div' ).stars( {
				inputType: 'select',
				cancelShow: false,
				callback: function(ui, type, value) {
					_this.review.fields.ratings[ui.element.attr( 'data-type' )] = parseInt( value );
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
					_this.successMessage.fadeIn( 'slow', function() {
//						setTimeout( function() {
//							_this.successMessage.fadeOut( 'slow' );
//						}, 60000 );
					} );
				}
				else {
					alert( 'Review could not be saved' ); // TODO
				}
				
				_this.button.button( 'enable' );
				_this.button.button( 'option', 'label', mw.msg( 'reviews-submission-submit' ) );
			} );
		};
		
		this.setup();
	} );

}; })( window.jQuery, window.mediaWiki, window.reviews );
