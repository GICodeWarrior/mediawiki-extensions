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
	<div class="articleFeedback-tab articleFeedback-tab-form articleFeedback-tab-current" rel="form">\
		<div class="articleFeedback-buffer"><msg key="form-tab-label" /></div>\
	</div>\
	<div class="articleFeedback-tab articleFeedback-tab-report " rel="report">\
		<div class="articleFeedback-buffer"><msg key="report-tab-label" /></div>\
	</div>\
</div>\
<div class="articleFeedback-panel">\
	<div class="articleFeedback-buffer">\
		<div class="articleFeedback-title articleFeedback-form"><msg key="form-panel-title" /></div>\
		<div class="articleFeedback-title articleFeedback-report"><msg key="report-panel-title" /></div>\
		<div class="articleFeedback-instructions articleFeedback-form"><msg key="form-panel-instructions" /></div>\
		<div class="articleFeedback-description articleFeedback-report"><msg key="report-panel-description" /></div>\
		<div style="clear:both;"></div>\
		<div class="articleFeedback-ratings">\
			<div class="articleFeedback-rating" rel="wellsourced">\
				<span class="articleFeedback-label" title-msg="field-wellsourced-tip"><msg key="field-wellsourced-label" /></span>\
				<div class="articleFeedback-rating-fields articleFeedback-form"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels articleFeedback-form"><label></label><label></label><label></label><label></label><label></label></div>\
			</div>\
			<div class="articleFeedback-rating" rel="neutral">\
				<span class="articleFeedback-label" title-msg="field-neutral-tip"><msg key="field-neutral-label" /></span>\
				<div class="articleFeedback-rating-fields articleFeedback-form"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels articleFeedback-form"><label></label><label></label><label></label><label></label><label></label></div>\
			</div>\
			<div class="articleFeedback-rating" rel="complete">\
				<span class="articleFeedback-label" title-msg="field-complete-tip"><msg key="field-complete-label" /></span>\
				<div class="articleFeedback-rating-fields articleFeedback-form"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels articleFeedback-form"><label></label><label></label><label></label><label></label><label></label></div>\
			</div>\
			<div class="articleFeedback-rating" rel="readable">\
				<span class="articleFeedback-label" title-msg="field-readable-tip"><msg key="field-readable-label" /></span>\
				<div class="articleFeedback-rating-fields articleFeedback-form"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels articleFeedback-form"><label></label><label></label><label></label><label></label><label></label></div>\
			</div>\
			<div style="clear:both;"></div>\
		</div>\
	</div>\
</div>\
<div class="articleFeedback-dialog" rel="survey">\
	<div class="articleFeedback-buffer">\
		<div class="articleFeedback-title">Take a survey?</div>\
	</div>\
</div>\
<div class="articleFeedback-dialog" rel="register">\
	<div class="articleFeedback-buffer">\
		<div class="articleFeedback-title">Create an account?</div>\
	</div>\
</div>\
<div class="articleFeedback-dialog" rel="edit">\
	<div class="articleFeedback-buffer">\
		<div class="articleFeedback-title">Edit a page?</div>\
	</div>\
</div>\
				' )
				.localize( { 'prefix': 'articlefeedback-beta-' } )
				.find( '[title]' )
					.tipsy( { 'gravity': 'sw', 'fade': true } )
					.end()
				// Hide report elements initially
				.find( '.articleFeedback-report' )
					.hide()
					.end()
				// Setup tab behavior
				.find( '.articleFeedback-tab' )
					.click( function( e ) {
						$(this).addClass( 'articleFeedback-tab-current' );
						context.$ui
							.find( '.articleFeedback-' + $(this).attr( 'rel' ) )
								.show()
								.end()
							.find( '.articleFeedback-tab' )
								.not( $(this) )
								.each( function() {
									$(this).removeClass( 'articleFeedback-tab-current' );
									context.$ui
										.find( '.articleFeedback-' + $(this).attr( 'rel' ) )
										.hide();
								} );
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
