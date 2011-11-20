/**
 * JavasSript for the Reviews MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Reviews
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw, reviews ) {
	
	reviews.Review = function( data, ratingTypes ) {
		var _this = this;
		
		this.fields = null;
		this.ratings = null;
		
		this.setup = function() {
			if ( data === false ) {
				this.fields = {
					'id': false,
					'title': '',
					'text': ''
				};
				
				for ( var i = ratingTypes.length - 1; i >= 0; i-- ) {
					this.ratings[ratingTypes[i]] = false;
				}
			}
			else {
				debugger;
			}
		};
		
		this.save = function( callback ) {
			requestArgs = {
				'action': 'submitreview',
				'format': 'json',
				'token': mw.user.tokens.get( 'editToken' ),
				// TODO
			};
			
			$.post(
				wgScriptPath + '/api.php',
				requestArgs,
				function( data ) {
					callback();
				}	
			);			
		};
		
		this.setup();
	};
	
	reviews.Review.prototype = {
		
	};
	
})( window.jQuery, window.mediaWiki, window.reviews );