/*
 * Script for Article Feedback (beta)
 */

$.articleFeedback = {
	'fn': {
		'buildForm': function() {
			
		},
		'buildReport': function() {
			
		},
		'buildRatingControl': function() {
			
		},
		'buildChart': function() {
			
		}
	},
	'evt': {
		
	},
	'cfg': {
		
	}
};

$.fn.articleFeedback = function( method, data ) {
	$(this).each( function() {
		var context = $(this).data( 'articleFeedback-context' );
		if ( !context || typeof context == 'undefined' ) {
			context = {
				$ui = $(this);
			};
			// Setup user interface
			$ui.append( /* */ );
			// Save context
			$(this).data( 'articleFeedback-context', context );
		}
		// Proceed with handling input
	} );
	return $(this);
}
