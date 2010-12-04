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
			context.$ui
				.addClass( 'articleFeedback articleFeedback-form' )
				// Append HTML
				.append( '\
<div class="articleFeedback-tabs">\
	<div class="articleFeedback-tab articleFeedback-tab-current" rel="form">\
		<div class="articleFeedback-buffer" msg-text="form-tab-label"></div>\
	</div>\
	<div class="articleFeedback-tab" rel="report">\
		<div class="articleFeedback-buffer" msg-text="report-tab-label"></div>\
	</div>\
</div>\
<div class="articleFeedback-panel" rel="form">\
	<div class="articleFeedback-buffer">\
		<div class="articleFeedback-title" msg-text="form-panel-title"></div>\
		<div class="articleFeedback-instructions" msg-text="form-panel-instructions"></div>\
		<div style="clear:both;"></div>\
		<div class="articleFeedback-ratings">\
			<div class="articleFeedback-rating" rel="wellsourced">\
				<span class="articleFeedback-label" msg-text="field-wellsourced-label" msg-tip="field-wellsourced-tip"></span>\
				<div class="articleFeedback-rating-fields"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels"><label></label><label></label><label></label><label></label><label></label></div>\
			</div>\
			<div class="articleFeedback-rating" rel="neutral">\
				<span class="articleFeedback-label" msg-text="field-neutral-label" msg-tip="field-neutral-tip"></span>\
				<div class="articleFeedback-rating-fields"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels"><label></label><label></label><label></label><label></label><label></label></div>\
			</div>\
			<div class="articleFeedback-rating" rel="complete">\
				<span class="articleFeedback-label" msg-text="field-complete-label" msg-tip="field-complete-tip"></span>\
				<div class="articleFeedback-rating-fields"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels"><label></label><label></label><label></label><label></label><label></label></div>\
			</div>\
			<div class="articleFeedback-rating" rel="readable">\
				<span class="articleFeedback-label" msg-text="field-readable-label" msg-tip="field-readable-tip"></span>\
				<div class="articleFeedback-rating-fields"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels"><label></label><label></label><label></label><label></label><label></label></div>\
			</div>\
			<div style="clear:both;"></div>\
		</div>\
	</div>\
</div>\
<div class="articleFeedback-panel" rel="report">\
	<div class="articleFeedback-buffer">\
		<div class="articleFeedback-title" msg-text="report-panel-title"></div>\
	</div>\
</div>\
				' )
				// Insert messages
				.find( '[msg-text]' )
					.each( function() {
						$(this).text( $.articleFeedback.fn.msg( $(this).attr( 'msg-text' ) ) );
					} )
					.end()
				.find( '[msg-tip]' )
					.each( function() {
						$(this)
							.attr( 'title', $.articleFeedback.fn.msg( $(this).attr( 'msg-tip' ) ) )
							.tipsy( { 'gravity': 'sw', 'fade': true } );
					} )
					.end()
				// Setup tab behavior
				.find( '.articleFeedback-tab' )
					.click( function( e ) {
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
