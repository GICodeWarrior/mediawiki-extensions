/*
 * Script for Article Feedback (beta)
 */

( function( $, mw ) {

$.articleFeedback = {
	'cfg': {
		'indexes': {
			'wellsourced': 1,
			'neutral': 2,
			'complete': 3,
			'readable': 4
		},
		'fields': {
			'1': 'wellsourced',
			'2': 'neutral',
			'3': 'complete',
			'4': 'readable'
		}
	},
	'fn': {
		'updateRating': function() {
			var $rating = $(this);
			$rating.find( 'label' ).removeClass( 'articleFeedback-rating-label-full' );
			var $label = $rating
				.find( 'label[for=' + $rating.find( 'input:radio:checked' )
					.attr( 'id' ) + ']' );
			if ( $label.length ) {
				$label
					.prevAll( 'label' )
						.add( $label )
							.addClass( 'articleFeedback-rating-label-full' )
							.end()
						.end()
					.nextAll( 'label' )
						.removeClass( 'articleFeedback-rating-label-full' );
				$rating.find( '.articleFeedback-rating-clear' ).show();
			} else {
				$rating.find( '.articleFeedback-rating-clear' ).hide();
			}
		},
		'submit': function() {
			var context = this;
			// Clear out the stale message
			
			// Lock the star inputs & submit button
			context.$ui.find( 'button[type=submit]' ).button( { 'disabled': true } );
			
			// Build data from form values
			var data = {};
			context.$ui.find( '.articleFeedback-rating' ).each( function() {
				var value = $(this).find( 'input:radio:checked' ).val();
				// Clamp irregular values
				if ( value < 1 || value > 5 ) {
					value = 0;
				}
				data['r' + $.articleFeedback.cfg.indexes[$(this).attr( 'rel' )]] = value;
			} );
			$.ajax( {
				'url': mediaWiki.config.get( 'wgScriptPath' ) + '/api.php',
				'type': 'POST',
				'dataType': 'json',
				'context': context,
				'data': $.extend( data, {
					'action': 'articlefeedback',
					'format': 'json',
					'anontoken': mediaWiki.user.sessionId(),
					'userid': mediaWiki.user.sessionId(),
					'pageid': mediaWiki.config.get( 'wgArticleId' ),
					'revid': mediaWiki.config.get( 'wgCurRevisionId' ),
				} ),
				'success': function( data ) {
					var context = this;
					$.articleFeedback.fn.load.call( context );
				},
				'error': function() {
					var context = this;
					console.log( '<submitForm error />' );
				}
			} );
		},
		'load': function() {
			var context = this;
			$.ajax( {
				'url': mediaWiki.config.get( 'wgScriptPath' ) + '/api.php',
				'type': 'GET',
				'dataType': 'json',
				'context': context,
				'data': {
					'action': 'query',
					'format': 'json',
					'list': 'articlefeedback',
					'afpageid': mediaWiki.config.get( 'wgArticleId' ),
					'afanontoken': mediaWiki.user.sessionId(),
					'afuserrating': mediaWiki.user.sessionId()
				},
				'success': function( data ) {
					var context = this;
					
					console.log( data );
					
					if ( typeof data.query.articlefeedback == undefined ) {
						// ERROR!
						console.log( '<loadReport success with bad data />' );
						return;
					}
					if ( !data.query.articlefeedback.length ) {
						// No ratings here yet
						context.$ui.find( '.articleFeedback-rating-meter div' ).hide();
						return;
					}
					// Update form and report
					var ratings = data.query.articlefeedback[0].ratings;
					for ( var i = 0; i < ratings.length; i++ ) {
						var field = $.articleFeedback.cfg.fields[ratings[i].ratingid];
						var rating = ratings[i].userrating;
						var count = ratings[i].count;
						var $rating =
							context.$ui.find( '.articleFeedback-rating[rel="' + field + '"]' );
						if ( count > 0 ) {
							var average = Math.max( Math.min( ratings[i].total / count, 5 ), 0 );
							var text = ( average - ( average % 1 ) ) + '.' +
								Math.round( ( average % 1 ) * 10 );
							$rating
								.find( '.articleFeedback-rating-average' )
									.text( text )
									.end()
								.find( '.articleFeedback-rating-meter div' )
									.css( 'width', Math.round( average * 20 ) + 'px' )
									.end()
								.find( '.articleFeedback-rating-count' )
									.text(
										'(' + count + ') ' +
										mediaWiki.msg( 'articlefeedback-beta-report-ratings' )
									)
									.end()
								.find( 'input[value="' + rating + '"]' )
									.attr( 'checked', true );
						} else {
							$rating
								.find( '.articleFeedback-rating-average' )
									.text( '' )
									.end()
								.find( '.articleFeedback-rating-meter div' )
									.css( 'width', 0 )
									.end()
								.find( '.articleFeedback-rating-count' )
									.text( mediaWiki.msg( 'articlefeedback-beta-report-empty' ) )
									.end()
								.find( 'input' )
									.attr( 'checked', false );
						}
						$.articleFeedback.fn.updateRating.call( $rating );
					}
					// If being called just after a submit, we need to un-new the rating controls
					context.$ui.find( '.articleFeedback-rating-new' )
						.removeClass( 'articleFeedback-rating-new' );
				},
				'error': function() {
					var context = this;
					console.log( '<loadReport error />' );
				}
			} );
		},
		'build': function() {
			var context = this;
			context.$ui
				.addClass( 'articleFeedback articleFeedback-visibleWith-form' )
				// Append HTML
				.append( '\
<div class="articleFeedback-panel">\
	<div class="articleFeedback-buffer">\
		<div class="articleFeedback-switch articleFeedback-switch-report articleFeedback-visibleWith-form" rel="report"><msg key="report-switch-label" /></div>\
		<div class="articleFeedback-switch articleFeedback-switch-form articleFeedback-visibleWith-report" rel="form"><msg key="form-switch-label" /></div>\
		<div class="articleFeedback-title articleFeedback-visibleWith-form"><msg key="form-panel-title" /></div>\
		<div class="articleFeedback-title articleFeedback-visibleWith-report"><msg key="report-panel-title" /></div>\
		<div class="articleFeedback-instructions articleFeedback-visibleWith-form"><msg key="form-panel-instructions" /></div>\
		<div class="articleFeedback-description articleFeedback-visibleWith-report"><msg key="report-panel-description" /></div>\
		<div style="clear:both;"></div>\
		<div class="articleFeedback-ratings">\
			<div class="articleFeedback-rating" rel="wellsourced">\
				<div class="articleFeedback-label" title-msg="field-wellsourced-tip"><msg key="field-wellsourced-label" /></div>\
				<div class="articleFeedback-rating-fields articleFeedback-visibleWith-form"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels articleFeedback-visibleWith-form"><label></label><label></label><label></label><label></label><label></label><div class="articleFeedback-rating-clear"></div></div>\
				<div class="articleFeedback-rating-average articleFeedback-visibleWith-report"></div>\
				<div class="articleFeedback-rating-meter articleFeedback-visibleWith-report"><div></div></div>\
				<div class="articleFeedback-rating-count articleFeedback-visibleWith-report"></div>\
				<div style="clear:both;"></div>\
			</div>\
			<div class="articleFeedback-rating" rel="neutral">\
				<div class="articleFeedback-label" title-msg="field-neutral-tip"><msg key="field-neutral-label" /></div>\
				<div class="articleFeedback-rating-fields articleFeedback-visibleWith-form"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels articleFeedback-visibleWith-form"><label></label><label></label><label></label><label></label><label></label><div class="articleFeedback-rating-clear"></div></div>\
				<div class="articleFeedback-rating-average articleFeedback-visibleWith-report"></div>\
				<div class="articleFeedback-rating-meter articleFeedback-visibleWith-report"><div></div></div>\
				<div class="articleFeedback-rating-count articleFeedback-visibleWith-report"></div>\
				<div style="clear:both;"></div>\
			</div>\
			<div class="articleFeedback-rating" rel="complete">\
				<div class="articleFeedback-label" title-msg="field-complete-tip"><msg key="field-complete-label" /></div>\
				<div class="articleFeedback-rating-fields articleFeedback-visibleWith-form"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels articleFeedback-visibleWith-form"><label></label><label></label><label></label><label></label><label></label><div class="articleFeedback-rating-clear"></div></div>\
				<div class="articleFeedback-rating-average articleFeedback-visibleWith-report"></div>\
				<div class="articleFeedback-rating-meter articleFeedback-visibleWith-report"><div></div></div>\
				<div class="articleFeedback-rating-count articleFeedback-visibleWith-report"></div>\
				<div style="clear:both;"></div>\
			</div>\
			<div class="articleFeedback-rating" rel="readable">\
				<div class="articleFeedback-label" title-msg="field-readable-tip"><msg key="field-readable-label" /></div>\
				<div class="articleFeedback-rating-fields articleFeedback-visibleWith-form"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
				<div class="articleFeedback-rating-labels articleFeedback-visibleWith-form"><label></label><label></label><label></label><label></label><label></label><div class="articleFeedback-rating-clear"></div></div>\
				<div class="articleFeedback-rating-average articleFeedback-visibleWith-report"></div>\
				<div class="articleFeedback-rating-meter articleFeedback-visibleWith-report"><div></div></div>\
				<div class="articleFeedback-rating-count articleFeedback-visibleWith-report"></div>\
				<div style="clear:both;"></div>\
			</div>\
			<div style="clear:both;"></div>\
		</div>\
		<button class="articleFeedback-submit articleFeedback-visibleWith-form" type="submit" disabled><msg key="form-panel-submit" /></button>\
		<div style="clear:both;"></div>\
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
					.tipsy( {
						'gravity': 'nw',
						'center': false,
						'fade': true,
						'delayIn': 300,
						'delayOut': 100
					} )
					.end()
				// Buttonify the button
				.find( '.articleFeedback-submit' )
					.button()
					.click( function() {
						$.articleFeedback.fn.submit.call( context );
					} )
					.end()
				// Hide report elements initially
				.find( '.articleFeedback-visibleWith-report' )
					.hide()
					.end()
				// Connect labels and fields
				.find( '.articleFeedback-rating' )
					.each( function( databaseId ) {
						var rel = $(this).attr( 'rel' );
						var htmlId = 'articleFeedback-rating-field-' + $(this).attr( 'rel' ) + '-';
						$(this)
							.find( '.articleFeedback-rating-fields input' )
								.attr( 'name', rel )
								.each( function( i ) {
									$(this).attr( {
										'value': i + 1,
										'name': 'rating[' + databaseId + ']',
										'id': htmlId + ( i + 1 )
									} );
								} )
								.end()
							.find( '.articleFeedback-rating-labels label' )
								.each( function( i ) {
									$(this).attr( 'for', htmlId + ( i + 1 ) );
								} );
					} )
					.end()
				// Setup switch behavior
				.find( '.articleFeedback-switch' )
					.click( function( e ) {
						context.$ui
							.find( '.articleFeedback-visibleWith-' + $(this).attr( 'rel' ) )
								.show()
								.end()
							.find( '.articleFeedback-switch' )
								.not( $(this) )
								.each( function() {
									context.$ui
										.find( '.articleFeedback-visibleWith-' + $(this).attr( 'rel' ) )
										.hide();
								} );
						e.preventDefault();
						return false;
					} )
					.end()
				// Setup rating behavior
				.find( '.articleFeedback-rating-labels label' )
					.hover(
						function() {
							$(this)
								.addClass( 'articleFeedback-rating-label-hover' )
								.prevAll( 'label' )
									.andSelf()
										.addClass( 'articleFeedback-rating-label-full' );
						},
						function() {
							$(this).removeClass( 'articleFeedback-rating-label-hover' );
							$.articleFeedback.fn.updateRating.call(
								$(this).closest( '.articleFeedback-rating' )
							);
						}
					)
					.mousedown( function() {
						context.$ui
							.find( '.articleFeedback-submit' )
								.button( { 'disabled': false } );
						$(this)
							.closest( '.articleFeedback-rating' )
								.addClass( 'articleFeedback-rating-new' )
								.end()
							.addClass( 'articleFeedback-rating-label-down' )
							.nextAll()
								.removeClass( 'articleFeedback-rating-label-full' )
								.end()
							.parent()
								.find( '.articleFeedback-rating-clear' )
									.show();
					} )
					.mouseup( function() {
						$(this).removeClass( 'articleFeedback-rating-label-down' );
					} )
					.end()
				.find( '.articleFeedback-rating-clear' )
					.click( function() {
						context.$ui
							.find( '.articleFeedback-submit' )
								.button( { 'disabled': false } );
						$(this).hide();
						var $rating = $(this).closest( '.articleFeedback-rating' );
						$rating.find( 'input:radio' ).attr( 'checked', false );
						$.articleFeedback.fn.updateRating.call( $rating );
					} );
			// Show initial form and report values
			$.articleFeedback.fn.load.call( context );
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
			$.articleFeedback.fn.build.call( context );
			// Save context
			$(this).data( 'articleFeedback-context', context );
		}
		// Proceed with processing method and data
	} );
	return $(this);
};

$( '#catlinks' ).before( $( '<div></div>' ).articleFeedback() );

} )( jQuery, mediaWiki );
