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
		
		this.save = function() {
			requestArgs = {
				'action': 'submitreview',
				'format': 'json',
				'token': $( this ).attr( 'survey-data-token' ),
			};
			
			$.post(
				wgScriptPath + '/api.php',
				requestArgs,
				function( data ) {
					callback();
					// TODO
				}	
			);
		};
		
	};
	
	reviews.Review.prototype = {
		
	};
	
})( window.jQuery, window.mediaWiki, window.reviews );