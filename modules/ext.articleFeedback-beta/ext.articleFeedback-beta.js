/*
 * Script for Article Feedback (beta)
 */

( function( $, mw ) {

$.articleFeedback = {
	'fn': {
		'build': function( context ) {
			context.$ui
				.addClass( 'articleFeedback articleFeedback-form' )
				// Append HTML
				.append( '\
<div class="articleFeedback-tabs">\
	<div class="articleFeedback-tab articleFeedback-tab-current" rel="form">\
		<div class="articleFeedback-buffer"><msg key="form-tab-label" /></div>\
	</div>\
	<div class="articleFeedback-tab" rel="report">\
		<div class="articleFeedback-buffer"><msg key="report-tab-label" /></div>\
	</div>\
</div>\
<div class="articleFeedback-panel" rel="form">\
	<div class="articleFeedback-buffer">\
		<div class="articleFeedback-title"><msg key="form-panel-title" /></div>\
		<div class="articleFeedback-instructions"><msg key="form-panel-instructions" /></div>\
		<div style="clear:both;"></div>\
		<div class="articleFeedback-ratings">\
			<div class="articleFeedback-rating" rel="wellsourced">\
				<span class="articleFeedback-label" title-msg="field-wellsourced-tip"><msg key="field-wellsourced-label" /></span>\
				<div class="articleFeedback-rating-fields"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels"><label></label><label></label><label></label><label></label><label></label></div>\
			</div>\
			<div class="articleFeedback-rating" rel="neutral">\
				<span class="articleFeedback-label" title-msg="field-neutral-tip"><msg key="field-neutral-label" /></span>\
				<div class="articleFeedback-rating-fields"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels"><label></label><label></label><label></label><label></label><label></label></div>\
			</div>\
			<div class="articleFeedback-rating" rel="complete">\
				<span class="articleFeedback-label" title-msg="field-complete-tip"><msg key="field-complete-label" /></span>\
				<div class="articleFeedback-rating-fields"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels"><label></label><label></label><label></label><label></label><label></label></div>\
			</div>\
			<div class="articleFeedback-rating" rel="readable">\
				<span class="articleFeedback-label" title-msg="field-readable-tip"><msg key="field-readable-label" /></span>\
				<div class="articleFeedback-rating-fields"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels"><label></label><label></label><label></label><label></label><label></label></div>\
			</div>\
			<div style="clear:both;"></div>\
		</div>\
	</div>\
</div>\
<div class="articleFeedback-panel" rel="report">\
	<div class="articleFeedback-buffer">\
		<div class="articleFeedback-title"><msg key="report-panel-title" /></div>\
	</div>\
</div>\
				' )
				.localize( { 'prefix': 'articlefeedback-beta-' } )
				.find( '[title]' )
					.tipsy( { 'gravity': 'sw', 'fade': true } )
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
		}
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
