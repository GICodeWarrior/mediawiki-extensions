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
	 * Self executing function to setup the allrating rating elements on the page.
	 */	
	(function setupRatingElements() {
		$.each($(".allrating"), function(i,v) {
			var self = $(this);
			
			self.allRating({
				onClickEvent: function(input) {
					// TODO
				},
				showHover: false
			});
		});
	})();
	
	
} ); })(jQuery);