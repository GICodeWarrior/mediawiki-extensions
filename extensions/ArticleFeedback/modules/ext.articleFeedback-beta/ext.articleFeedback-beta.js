/*
 * Script for Article Feedback (beta)
 */

( function( $, mw ) {

$.articleFeedback = {
	'cfg': {
		'msgPrefix': 'articlefeedback-beta-',
	},
	'fn': {
		'build': function( context ) {
			// Base user interface
			context.$ui
				.addClass( 'articleFeedback articleFeedback-form' )
				.append( '\
					<div class="articleFeedback-tabs">\
						<div class="articleFeedback-tab articleFeedback-tab-current" rel="form">\
							<div class="articleFeedback-buffer"></div>\
						</div>\
						<div class="articleFeedback-tab" rel="report">\
							<div class="articleFeedback-buffer"></div>\
						</div>\
					</div>\
					<div class="articleFeedback-panel" rel="form">\
						<div class="articleFeedback-buffer"></div>\
					</div>\
					<div class="articleFeedback-panel" rel="report">\
						<div class="articleFeedback-buffer"></div>\
					</div>\
				' )
				// Handles
				.find( '.articleFeedback-tab' )
					.each( function() {
						$(this).find( '.articleFeedback-buffer' )
							.text( $.articleFeedback.fn.msg(
								$(this).attr( 'rel' ) + '-tab-label' ) );
					} )
					.end()
				// Form
				.find( '.articleFeedback-panel[rel=form] .articleFeedback-buffer' )
					.append( $( '<div class="articleFeedback-title"></div>' )
						.text( $.articleFeedback.fn.msg( 'form-panel-title' ) ) )
					.append( $( '<div class="articleFeedback-instructions"></div>' )
						.text( $.articleFeedback.fn.msg( 'form-panel-instructions' ) ) )
					.end()
				// Report
				.find( '.articleFeedback-panel[rel=report]' )
					.hide()
					.find( '.articleFeedback-buffer' )
						.append( $( '<div class="articleFeedback-title"></div>' )
							.text( $.articleFeedback.fn.msg( 'report-panel-title' ) ) )
						.end()
					.end()
				// Add open/close tabrs
				.find( '.articleFeedback-tab' )
					.click( function( e ) {
						// Hide artifacts of animation until animation is complete, then restore it
						context.$ui
							.find( '.articleFeedback-panel[rel!=' + $(this).attr( 'rel' ) +']' )
								.hide()
								.end()
							.find( '.articleFeedback-panel[rel=' + $(this).attr( 'rel' ) +']' )
								.show()
								.end()
							.find( '.articleFeedback-tab[rel=' + $(this).attr( 'rel' ) +']' )
								.addClass( 'articleFeedback-tab-current' )
								.end()
							.find( '.articleFeedback-tab[rel!=' + $(this).attr( 'rel' ) +']' )
								.removeClass( 'articleFeedback-tab-current' );
						e.preventDefault();
						return false;
					} );
		},
		'msg': function() {
			if ( arguments.length ) {
				arguments[0] = $.articleFeedback.cfg.msgPrefix + arguments[0];
			}
			return mediaWiki.msg.apply( mediaWiki, arguments );
		},
	}
};

$.fn.articleFeedback = function( method, data ) {
	$(this).each( function() {
		var context = $(this).data( 'articleFeedback-context' );
		if ( !context ) {
			// Create context
			context = { '$ui': $(this) };
			// Build user interface
			$.articleFeedback.fn.build( context );
			// Save context
			$(this).data( 'articleFeedback-context', context );
		}
		// Proceed with handling input
	} );
	return $(this);
};

} )( jQuery, mediaWiki );

$( '#catlinks' ).before( $( '<div></div>' ).articleFeedback() );
