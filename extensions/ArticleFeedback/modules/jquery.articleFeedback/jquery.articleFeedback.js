/*
 * Script for Article Feedback Plugin
 */

( function( $, mw ) {

/**
 * Article Feedback jQuery Plugin Support Code
 */
$.articleFeedback = {
	'tpl': {
		'ui': '\
<div class="articleFeedback-panel">\
	<div class="articleFeedback-buffer">\
		<div class="articleFeedback-switch articleFeedback-switch-report articleFeedback-visibleWith-form" rel="report"><html:msg key="report-switch-label" /></div>\
		<div class="articleFeedback-switch articleFeedback-switch-form articleFeedback-visibleWith-report" rel="form"><html:msg key="form-switch-label" /></div>\
		<div class="articleFeedback-title articleFeedback-visibleWith-form"><html:msg key="form-panel-title" /></div>\
		<div class="articleFeedback-title articleFeedback-visibleWith-report"><html:msg key="report-panel-title" /></div>\
		<div class="articleFeedback-instructions articleFeedback-visibleWith-form"><html:msg key="form-panel-instructions" /></div>\
		<div class="articleFeedback-description articleFeedback-visibleWith-report"><html:msg key="report-panel-description" /></div>\
		<div style="clear:both;"></div>\
		<div class="articleFeedback-ratings"></div>\
		<div style="clear:both;"></div>\
		<button class="articleFeedback-submit articleFeedback-visibleWith-form" type="submit" disabled><html:msg key="form-panel-submit" /></button>\
		<div style="clear:both;"></div>\
	</div>\
</div>\
		',
		'rating': '\
<div class="articleFeedback-rating">\
	<div class="articleFeedback-label"></div>\
	<div class="articleFeedback-rating-fields articleFeedback-visibleWith-form"><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /><input type="radio" /></div>\
	<div class="articleFeedback-rating-labels articleFeedback-visibleWith-form"><label></label><label></label><label></label><label></label><label></label><div class="articleFeedback-rating-clear"></div></div>\
	<div class="articleFeedback-rating-average articleFeedback-visibleWith-report"></div>\
	<div class="articleFeedback-rating-meter articleFeedback-visibleWith-report"><div></div></div>\
	<div class="articleFeedback-rating-count articleFeedback-visibleWith-report"></div>\
	<div style="clear:both;"></div>\
</div>\
		',
		'pitch': '\
<div class="articleFeedback-pitch">\
	<div class="articleFeedback-buffer">\
		<div class="articleFeedback-title"></div>\
		<div class="articleFeedback-message"></div>\
		<button class="articleFeedback-accept"></button>\
		<button class="articleFeedback-reject"></button>\
	</div>\
</div>\
		'
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
			// Lock the submit button -- TODO: lock the star inputs too
			context.$ui.find( '.articleFeedback-submit' ).button( { 'disabled': true } );
			
			// Build data from form values
			var data = {};
			for ( var key in context.options.ratings ) {
				var id = context.options.ratings[key].id;
				// Default to 0 if the radio set doesn't contain a checked element
				data['r' + id] = context.$ui.find( 'input[name=r' + id + ']:checked' ).val() || 0;
			}
			$.ajax( {
				'url': mw.config.get( 'wgScriptPath' ) + '/api.php',
				'type': 'POST',
				'dataType': 'json',
				'context': context,
				'data': $.extend( data, {
					'action': 'articlefeedback',
					'format': 'json',
					'anontoken': mw.user.id(),
					'pageid': mw.config.get( 'wgArticleId' ),
					'revid': mw.config.get( 'wgCurRevisionId' ),
					'bucket': context.options.bucket
				} ),
				'success': function( data ) {
					var context = this;
					$.articleFeedback.fn.load.call( context );
				},
				'error': function() {
					var context = this;
					mw.log( '<submitForm error />' );
				}
			} );
		},
		'load': function() {
			var context = this;
			$.ajax( {
				'url': mw.config.get( 'wgScriptPath' ) + '/api.php',
				'type': 'GET',
				'dataType': 'json',
				'context': context,
				'data': {
					'action': 'query',
					'format': 'json',
					'list': 'articlefeedback',
					'afpageid': mw.config.get( 'wgArticleId' ),
					'afanontoken': mw.user.id(),
					'afuserrating': 1
				},
				'success': function( data ) {
					var context = this;
					if ( typeof data.query.articlefeedback == 'undefined' ) {
						// TODO: Something more clever, and useful, about this error
						mw.log( '<loadReport success with bad data />' );
						return;
					}
					context.$ui.find( '.articleFeedback-rating' ).each( function() {
						var ratingData;
						// Try to get data provided for this rating
						if (
							data.query.articlefeedback.length &&
							typeof data.query.articlefeedback[0].ratings !== 'undefined'
						) {
							var ratingsData = data.query.articlefeedback[0].ratings;
							var id = context.options.ratings[$(this).attr( 'rel' )].id;
							for ( var i = 0; i < ratingsData.length; i++ ) {
								if ( ratingsData[i].ratingid == id ) {
									ratingData = ratingsData[i];
								}
							}
						}
						if ( typeof ratingData === 'undefined' || ratingData.total == 0 ) {
							// Setup in "no ratings" mode
							$(this)
								.find( '.articleFeedback-rating-average' )
									.html( '&nbsp;' )
									.end()
								.find( '.articleFeedback-rating-meter div' )
									.css( 'width', 0 )
									.end()
								.find( '.articleFeedback-rating-count' )
									.text( mw.msg( 'articlefeedback-report-empty' ) )
									.end()
								.find( 'input' )
									.attr( 'checked', false );
						} else {
							// Setup using ratingData
							var average = ratingData.total / ratingData.count;
							$(this)
								.find( '.articleFeedback-rating-average' )
									.text( Math.floor( average ) + '.' +
										Math.round( ( average % 1 ) * 10 ) )
									.end()
								.find( '.articleFeedback-rating-meter div' )
									.css( 'width', Math.round( average * 21 ) + 'px' )
									.end()
								.find( '.articleFeedback-rating-count' )
									.text( mw.msg(
										'articlefeedback-report-ratings', ratingData.count
									) )
									.end()
								.find( 'input[value="' + ratingData.userrating + '"]' )
									.attr( 'checked', true );
						}
						$.articleFeedback.fn.updateRating.call( $(this) );
					} );
					// If being called just after a submit, we need to un-new the rating controls
					context.$ui.find( '.articleFeedback-rating-new' )
						.removeClass( 'articleFeedback-rating-new' );
				},
				'error': function() {
					var context = this;
					mw.log( '<loadReport error />' );
				}
			} );
		},
		'build': function() {
			var context = this;
			context.$ui
				.addClass( 'articleFeedback' )
				// Insert and localize HTML
				.append( $.articleFeedback.tpl.ui )
				.find( '.articleFeedback-ratings' )
					.each( function() {
						for ( var key in context.options.ratings ) {
							$( $.articleFeedback.tpl.rating )
								.attr( 'rel', key )
								.find( '.articleFeedback-label' )
									.attr( 'title', mw.msg( context.options.ratings[key].tip ) )
									.text( mw.msg( context.options.ratings[key].label ) )
									.end()
								.appendTo( $(this) );
						}
					} )
					.end()
				.each( function() {
					for ( var key in context.options.pitches ) {
						$( $.articleFeedback.tpl.pitch )
							.attr( 'rel', key )
							.find( '.articleFeedback-title' )
								.text( mw.msg( context.options.pitches[key].title ) )
								.end()
							.find( '.articleFeedback-message' )
								.text( mw.msg( context.options.pitches[key].message ) )
								.end()
							.find( '.articleFeedback-accept' )
								.text( mw.msg( context.options.pitches[key].accept ) )
								.click( function() {
									var $pitch = $(this).closest( '.articleFeedback-pitch' );
									var key = $pitch.attr( 'rel' );
									context.options.pitches[key].action();
									$pitch.fadeOut();
								} )
								.button()
								.end()
							.find( '.articleFeedback-reject' )
								.text( mw.msg( context.options.pitches[key].reject ) )
								.click( function() {
									// Remember that the users rejected this, set a cookie to not
									// show this for 3 days
									$(this).closest( '.articleFeedback-pitch' ).fadeOut();
								} )
								.end()
						.appendTo( $(this) );
					}
				} )
				.localize( { 'prefix': 'articlefeedback-' } )
				// Activate tooltips
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
						for ( var key in context.options.pitches ) {
							// Dont' bother checking the condition if there's a cookie that says
							// the user has rejected this within 3 days of right now
							if ( context.options.pitches[key].condition() ) {
								context.$ui
									.find( '.articleFeedback-pitch[rel="' + key + '"]' )
										.show();
								break;
							}
						}
					} )
					.end()
				// Hide report elements initially
				.find( '.articleFeedback-visibleWith-report' )
					.hide()
					.end()
				// Connect labels and fields
				.find( '.articleFeedback-rating' )
					.each( function( rating ) {
						var rel = $(this).attr( 'rel' );
						var id = 'articleFeedback-rating-field-' + rel + '-';
						$(this)
							.find( '.articleFeedback-rating-fields input' )
								.attr( 'name', rel )
								.each( function( field ) {
									$(this).attr( {
										'value': field + 1,
										'name': 'r' + ( rating + 1 ),
										'id': id + ( field + 1 )
									} );
								} )
								.end()
							.find( '.articleFeedback-rating-labels label' )
								.each( function( i ) {
									$(this).attr( 'for', id + ( i + 1 ) );
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
								.addClass( 'articleFeedback-rating-label-hover-head' )
								.prevAll( 'label' )
									.addClass( 'articleFeedback-rating-label-hover-tail' );
						},
						function() {
							$(this)
								.removeClass( 'articleFeedback-rating-label-hover-head' )
								.prevAll( 'label' )
									.removeClass( 'articleFeedback-rating-label-hover-tail' );
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

/**
 * Article Feedback jQuery Plugin
 * 
 * Can be called with an options object like...
 * 
 * 	$( ... ).articleFeedback( {
 * 		'bucket': 1, // Numeric identifier of the bucket being used, which is logged on submit
 * 		'ratings': {
 * 			'rating-name': {
 * 				'id': 1, // Numeric identifier of the rating, same as the rating_id value in the db
 * 				'label': 'msg-key-for-label', // String of message key for label
 * 				'tip': 'msg-key-for-tip', // String of message key for tip
 * 			},
 *			// More ratings here...
 * 		}
 * 	} );
 * 
 * Rating IDs need to match up to the contents of your article_feedback_ratings table, which is a
 * lookup table containing rating IDs and message keys used for translating rating IDs into string;
 * and be included in $wgArticleFeedbackRatings, which is an array of allowed IDs.
 */
$.fn.articleFeedback = function() {
	var args = arguments;
	$(this).each( function() {
		var context = $(this).data( 'articleFeedback-context' );
		if ( !context ) {
			// Create context
			context = { '$ui': $(this), 'options': { 'ratings': {}, 'pitches': {},'bucket': 0 } };
			// Allow customization through an options argument
			if ( typeof args[0] === 'object' ) {
				context = $.extend( context, { 'options': args[0] } );
			}
			// Build user interface
			$.articleFeedback.fn.build.call( context );
			// Save context
			$(this).data( 'articleFeedback-context', context );
		}
	} );
	return $(this);
};

} )( jQuery, mediaWiki );
