/**
 * JavasSript for the Ratings extension.
 * @see http://www.mediawiki.org/wiki/Extension:Ratings
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function($) { $( document ).ready( function() {

	var canRate = true; // TODO
	
	if ( !canRate && !window.wgRatingsShowDisabled ) {
		// If the user is not allowed to rate and ratings should not be
		// shown disabled for unauthorized users, simply don't bother any setup.
		return;
	}
	
	/**
	 * Self executing function to setup the rating stars on the page.
	 * This is done by finding all inputs belonging to a single rating
	 * element and initiating them as a rating element.
	 */	
	(function setupRatingElements() {
		var groups = [];
		
		$.each($(".starrating"), function(i,v) {
			groups.push( $(this).attr( 'name' ) );
		});
		
		groups = $.unique( groups );
		
		for ( i in groups ) {
			$( "input[name='" + groups[i] + "']" ).rating({
				callback: function( value, link ){
					var self = $(this);
					submitRating( self.attr( 'page' ), self.attr( 'tag' ), value );
				},
			});
		}
		
		$( '.starrating-div' ).css( 'display', 'inline' );
		
		if ( canRate ) {
			initGetRatings();
		}
		else {
			$.each($(".starrating"), function(i,v) {
				var self = $(this);
				
				if ( typeof self.attr( 'page' ) != 'undefined' ) {
					self.rating( 'disable' );
				}
			});				
		}
		
	})();
	
	/**
	 * Self executing function to set the current values of the rating elements.
	 * This is done by finding all tags for all pages that should
	 * be displayed and then gathering this data via the API to show
	 * the current vote values.
	 */
	function initGetRatings() {
		var ratings = {};
		
		$.each($(".starrating"), function(i,v) {
			var self = $(this);
			
			if ( typeof self.attr( 'page' ) != 'undefined' ) {
				if ( !ratings[self.attr( 'page' )] ) {
					ratings[self.attr( 'page' )] = [];
				}
				
				ratings[self.attr( 'page' )].push( self.attr( 'tag' ) );				
			}
		});
		
		for ( i in ratings ) {
			getRatingsForPage( i, $.unique( ratings[i] ) );
		}
	}
	
	/**
	 * Obtain the vote values for a set of tags of a single page,
	 * and then find and update the corresponding rating stars.
	 * 
	 * @param {string} page
	 * @param {Array} tags
	 */
	function getRatingsForPage( page, tags ) {
		$.getJSON(
			wgScriptPath + '/api.php',
			{
				'action': 'query',
				'format': 'json',
				'list': 'ratings',
				'qrpage': page,
				'qrtags': tags.join( '|' )
			},
			function( data ) {
				if ( data.userratings ) {
					initRatingElementsForPage( page, data.userratings );
				}
				else {
					// TODO
				}
			}
		); 		
	}
	
	/**
	 * Loop over all rating elements for the page and set their value when available.
	 * 
	 * @param {string} page
	 * @param {Array} tagValues
	 */	
	function initRatingElementsForPage( page, tagValues ) {
		$.each($(".starrating"), function(i,v) {
			var self = $(this);
			
			if ( typeof self.attr( 'page' ) != 'undefined' && self.attr( 'page' ) == page ) {
				if ( typeof tagValues[self.attr( 'tag' )] != 'undefined' ) {
					self.rating( 'select', tagValues[self.attr( 'tag' )], false );
				}
			}
		});		
	}
	
	/**
	 * Submit a rating.
	 * 
	 * @param {string} page
	 * @param {string} tag
	 * @param {integer} value
	 */
	function submitRating( page, tag, value ) {
		$.post(
			wgScriptPath + '/api.php',
			{
				'action': 'dorating',
				'format': 'json',
				'pagename': page,
				'tag': tag,
				'value': value
			},
			function( data ) {
				if ( data.error && data.error.info ) {
					alert( data.error.info );
				}				
				else if ( data.result.success ) {
					// TODO
				}
				else {
					alert( 'Failed to submit rating' ) // TODO
				}
			},
			'json'
		);
	}
	
} ); })(jQuery);