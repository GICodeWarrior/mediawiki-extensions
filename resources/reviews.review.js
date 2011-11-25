/**
 * JavasSript for the Reviews MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw, reviews ) {
	
	reviews.Review = function( data ) {
		var _this = this;
		
		this.fields = null;
		
		this.setup = function() {
			this.fields = data;
		};
		
		this.save = function( callback ) {
			var requestArgs = {
				'action': 'submitreview',
				'format': 'json',
				'token': mw.user.tokens.get( 'editToken' ),
				'page_id': this.fields.page_id,
				'title': this.fields.title,
				'text': this.fields.text,
				'rating': this.fields.rating,
				'ratings': $.toJSON( this.fields.ratings )
			};
			
			if ( this.fields.hasOwnProperty( 'id' ) ) {
				requestArgs.id = this.fields.id;
			}
			
			$.post(
				wgScriptPath + '/api.php',
				requestArgs,
				function( data ) {
					callback( data.hasOwnProperty( 'success' ) && data.success );
				}	
			);			
		};
		
		this.setup();
	};
	
	reviews.Review.prototype = {
		
		remove: function( callback ) {
			var requestArgs = {
				'action': 'deletereviews',
				'format': 'json',
				'token': mw.user.tokens.get( 'editToken' ),
				'ids': this.fields.id
			};
			
			$.post(
				wgScriptPath + '/api.php',
				requestArgs,
				function( data ) {
					callback( data.hasOwnProperty( 'success' ) && data.success );
				}	
			);	
		}
			
	};
	
})( window.jQuery, window.mediaWiki, window.reviews );