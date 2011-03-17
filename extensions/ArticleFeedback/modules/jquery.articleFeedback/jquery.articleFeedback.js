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
	<div class="articleFeedback-buffer articleFeedback-ui">\
		<div class="articleFeedback-switch articleFeedback-switch-report articleFeedback-visibleWith-form" rel="report"><html:msg key="report-switch-label" /></div>\
		<div class="articleFeedback-switch articleFeedback-switch-form articleFeedback-visibleWith-report" rel="form"><html:msg key="form-switch-label" /></div>\
		<div class="articleFeedback-title articleFeedback-visibleWith-form"><html:msg key="form-panel-title" /></div>\
		<div class="articleFeedback-title articleFeedback-visibleWith-report"><html:msg key="report-panel-title" /></div>\
		<div class="articleFeedback-instructions articleFeedback-visibleWith-form"><html:msg key="form-panel-instructions" /></div>\
		<div class="articleFeedback-description articleFeedback-visibleWith-report"><html:msg key="report-panel-description" /></div>\
		<div style="clear:both;"></div>\
		<div class="articleFeedback-ratings"></div>\
		<div style="clear:both;"></div>\
		<div class="articleFeedback-expertise articleFeedback-visibleWith-form" >\
			<input type="checkbox" value="general" disabled="disabled" /><label class="articleFeedback-expertise-disabled"><html:msg key="form-panel-expertise" /></label>\
			<div class="articleFeedback-expertise-options">\
				<input type="checkbox" value="studies" /><label><html:msg key="form-panel-expertise-studies" /></label>\
				<input type="checkbox" value="profession" /><label><html:msg key="form-panel-expertise-profession" /></label>\
				<input type="checkbox" value="hobby" /><label><html:msg key="form-panel-expertise-hobby" /></label>\
				<input type="checkbox" value="other" /><label><html:msg key="form-panel-expertise-other" /></label>\
			</div>\
		</div>\
		<button class="articleFeedback-submit articleFeedback-visibleWith-form" type="submit" disabled><html:msg key="form-panel-submit" /></button>\
		<div class="articleFeedback-success articleFeedback-visibleWith-form"><span><html:msg key="form-panel-success" /></span></div>\
		<div style="clear:both;"></div>\
		<div class="articleFeedback-expiry articleFeedback-visibleWith-form">\
			<div class="articleFeedback-expiry-title"><html:msg key="form-panel-expiry-title" /></div>\
			<div class="articleFeedback-expiry-message"><html:msg key="form-panel-expiry-message" /></div>\
		</div>\
	</div>\
	<div class="articleFeedback-error"><div class="articleFeedback-error-message"><html:msg key="error" /></div></div>\
	<div class="articleFeedback-pitches"></div>\
	<div style="clear:both;"></div>\
</div>\
<div class="articleFeedback-lock"></div>\
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
		<div class="articleFeedback-pop">\
			<div class="articleFeedback-message"></div>\
			<div class="articleFeedback-body"></div>\
			<button class="articleFeedback-accept"></button>\
			<button class="articleFeedback-reject"></button>\
		</div>\
	</div>\
</div>\
		'
	},
	'fn': {
		'enableSubmission': function( state ) {
			var context = this;
			if ( state ) {
				// Reset and remove success message
				clearTimeout( context.successTimeout );
				context.$ui.find( '.articleFeedback-success span' ).fadeOut( 'fast' );
				// Enable
				context.$ui.find( '.articleFeedback-submit' ).button( { 'disabled': false } );
			} else {
				// Disable
				context.$ui.find( '.articleFeedback-submit' ).button( { 'disabled': true } );
			}
		},
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
		'enableExpertise': function( $expertise ) {
			$expertise
				.find( 'input:checkbox[value=general]' )
					.attr( 'disabled', false )
					.end()
				.find( '.articleFeedback-expertise-disabled' )
					.removeClass( 'articleFeedback-expertise-disabled' );
		},
		'submit': function() {
			var context = this;
			$.articleFeedback.fn.enableSubmission.call( context, false );
			context.$ui.find( '.articleFeedback-lock' ).show();
			// Build data from form values
			var data = {};
			for ( var key in context.options.ratings ) {
				var id = context.options.ratings[key].id;
				// Default to 0 if the radio set doesn't contain a checked element
				data['r' + id] = context.$ui.find( 'input[name=r' + id + ']:checked' ).val() || 0;
			}
			var expertise = [];
			context.$ui.find( '.articleFeedback-expertise input:checked' ).each( function() {
				expertise.push( $(this).val() );
			} );
			data.expertise = expertise.join( '|' );
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
					context.$ui.find( '.articleFeedback-lock' ).hide();
				},
				'error': function() {
					var context = this;
					mw.log( 'Form submission error' );
					context.$ui.find( '.articleFeedback-error' ).show();
				}
			} );
		},
		'executePitch': function( action ) {
			var $pitch = $(this).closest( '.articleFeedback-pitch' );
			$pitch
				.find( '.articleFeedback-accept, .articleFeedback-altAccept' )
					.button( { 'disabled': true } )
					.end()
				.find( '.articleFeedback-reject' )
					.attr( 'disabled', true );
			var key = $pitch.attr( 'rel' );
			// If a pitch's action returns true, hide the pitch and
			// re-enable the button
			if ( action.call( $(this) ) ) {
				$pitch
					.fadeOut()
					.find( '.articleFeedback-accept, .articleFeedback-altAccept' )
						.button( { 'disabled': false } )
						.end()
					.find( '.articleFeedback-reject' )
						.attr( 'disabled', false )
						.end()
					.closest( '.articleFeedback-panel' )
						.find( '.articleFeedback-ui' )
							.show();
			}
			return false;
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
					if ( !$.isArray( data.query.articlefeedback ) ) {
						mw.log( 'Report response error' );
						context.$ui.find( '.articleFeedback-error' ).show();
						return;
					}
					if ( data.query.articlefeedback.length && 'expertise' in data.query.articlefeedback[0] ) {
						var $expertise = context.$ui.find( '.articleFeedback-expertise' );
						var tags = data.query.articlefeedback[0].expertise.split( '|' );
						for ( var i = 0; i < tags.length; i++ ) {
							$expertise.find( 'input:checkbox[value=' + tags[i] + ']' )
								.attr( 'checked', true );
						}
						if ( $expertise.find( 'input:checkbox[value=general]:checked' ).size() ) {
							$expertise
								.each( function() {
									$.articleFeedback.fn.enableExpertise( $(this) );
								} )
								.find( '.articleFeedback-expertise-options' )
									.show();
						}
					}
					var expired = false;
					context.$ui.find( '.articleFeedback-rating' ).each( function() {
						var ratingData;
						// Try to get data provided for this rating
						if (
							data.query.articlefeedback.length &&
							typeof data.query.articlefeedback[0].ratings !== 'undefined'
						) {
							if ( 'status' in data.query.articlefeedback[0] ) {
								if ( data.query.articlefeedback[0].status == 'expired' ) {
									expired = true;
								}
							}
							if ( 'ratings' in data.query.articlefeedback[0] ) {
								var ratingsData = data.query.articlefeedback[0].ratings;
								var id = context.options.ratings[$(this).attr( 'rel' )].id;
								for ( var i = 0; i < ratingsData.length; i++ ) {
									if ( ratingsData[i].ratingid == id ) {
										ratingData = ratingsData[i];
									}
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
							// If any ratings exist, make sure expertise is enabled so users can suppliment their ratings.
							$.articleFeedback.fn.enableExpertise( context.$ui.find( '.articleFeedback-expertise' ) );
						}
						$.articleFeedback.fn.updateRating.call( $(this) );
					} );
					if ( expired ) {
						context.$ui
							.addClass( 'articleFeedback-expired' )
							.find( '.articleFeedback-expiry' )
								.slideDown( 'fast' );
					} else {
						context.$ui
							.removeClass( 'articleFeedback-expired' )
							.find( '.articleFeedback-expiry' )
								.slideUp( 'fast' );
					}
					// If being called just after a submit, we need to un-new the rating controls
					context.$ui.find( '.articleFeedback-rating-new' )
						.removeClass( 'articleFeedback-rating-new' );
				},
				'error': function() {
					var context = this;
					mw.log( 'Report loading error' );
					context.$ui.find( '.articleFeedback-error' ).show();
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
								.find( '.articleFeedback-rating-clear' )
									.attr( 'title', mw.msg( 'articlefeedback-form-panel-clear' ) )
									.end()
								.appendTo( $(this) );
						}
					} )
					.end()
				.find( '.articleFeedback-pitches' )
					.each( function() {
						for ( var key in context.options.pitches ) {
							var $pitch = $( $.articleFeedback.tpl.pitch )
								.attr( 'rel', key )
								.find( '.articleFeedback-title' )
									.text( mw.msg( context.options.pitches[key].title ) )
									.end()
								.find( '.articleFeedback-message' )
									.text( mw.msg( context.options.pitches[key].message ) )
									.end()
								.find( '.articleFeedback-body' )
									.text( mw.msg( context.options.pitches[key].body ) )
									.end()
								.find( '.articleFeedback-accept' )
									.text( mw.msg( context.options.pitches[key].accept ) )
									.click( function() {
										var $pitch = $(this).closest( '.articleFeedback-pitch' );
										return $.articleFeedback.fn.executePitch.call(
											$(this),
											context.options.pitches[$pitch.attr( 'rel' )].action
										);
									} )
									.button()
									.addClass( 'ui-button-green' )
									.end()
								.find( '.articleFeedback-reject' )
									.text( mw.msg( context.options.pitches[key].reject ) )
									.click( function() {
										var $pitch = $(this).closest( '.articleFeedback-pitch' );
										// Remember that the users rejected this, set a cookie to not
										// show this for 3 days
										$.cookie(
											'jquery.articleFeedback-pitch.' + $pitch.attr( 'rel' ),
											'hide',
											{ 'expires': 3 }
										);
										$pitch.fadeOut( 'fast', function() {
											context.$ui.find( '.articleFeedback-ui' ).show();
										} );
									} )
									.end()
									.appendTo( $(this) );
							if (
								typeof context.options.pitches[key].altAccept == 'string'
								&& typeof context.options.pitches[key].altAction == 'function'
							) {
								$pitch
									.find( '.articleFeedback-accept' )
										.after( '<button class="articleFeedback-altAccept"></button>' )
										.after(
											$( '<span class="articleFeedback-pitch-or"></span>' )
												.text( mw.msg( 'articlefeedback-pitch-or' ) )
										)
										.end()
									.find( '.articleFeedback-altAccept' )
										.text( mw.msg( context.options.pitches[key].altAccept ) )
										.click( function() {
											var $pitch = $(this).closest( '.articleFeedback-pitch' );
											return $.articleFeedback.fn.executePitch.call(
												$(this),
												context.options.pitches[$pitch.attr( 'rel' )].altAction
											);
										} )
										.button()
										.addClass( 'ui-button-green' );
							}
						}
					} )
					.end()
				.localize( { 'prefix': 'articlefeedback-' } )
				// Activate tooltips
				.find( '[title]' )
					.tipsy( {
						'gravity': 'sw',
						'center': false,
						'fade': true,
						'delayIn': 300,
						'delayOut': 100
					} )
					.end()
				.find( '.articleFeedback-expertise > input:checkbox' )
					.change( function() {
						var $options = context.$ui.find( '.articleFeedback-expertise-options' );
						if ( $(this).is( ':checked' ) ) {
							$options.slideDown( 'fast' );
						} else {
							$options.slideUp( 'fast', function() {
								$options.find( 'input:checkbox' ).attr( 'checked', false );
							} );
						}
					} )
					.end()
				.find( '.articleFeedback-expertise input:checkbox' )
					.each( function() {
						var id = 'articleFeedback-expertise-' + $(this).attr( 'value' );
						$(this)
							.click( function() {
								$.articleFeedback.fn.enableSubmission.call( context, true );
							} )
							.attr( 'id', id )
							.next()
								.attr( 'for', id );
					} )
					.end()
				// Buttonify the button
				.find( '.articleFeedback-submit' )
					.button()
					.addClass( 'ui-button-blue' )
					.click( function() {
						$.articleFeedback.fn.submit.call( context );
						var pitches = [];
						for ( var key in context.options.pitches ) {
							// Dont' bother checking the condition if there's a cookie that says
							// the user has rejected this within 3 days of right now
							var display = $.cookie( 'jquery.articleFeedback-pitch.' + key );
							if ( display !== 'hide' && context.options.pitches[key].condition() ) {
								pitches.push( key );
							}
						}
						if ( pitches.length ) {
							// Select randomly using equal distribution of available pitches
							var key = pitches[Math.round( Math.random() * ( pitches.length - 1 ) )];
							context.$ui.find( '.articleFeedback-pitches' )
								.css( 'width', context.$ui.width() )
								.find( '.articleFeedback-pitch[rel="' + key + '"]' )
									.fadeIn( 'fast' );
							context.$ui.find( '.articleFeedback-ui' ).hide();
							// Track that a pitch was presented
							if ( typeof $.trackActionWithInfo == 'function' ) {
								$.trackActionWithInfo( 'jquery.articlefeedback-pitch', key );
							}
						} else {
							// Give user some feedback that a save occured
							context.$ui.find( '.articleFeedback-success span' ).fadeIn( 'fast' );
							context.successTimeout = setTimeout( function() {
								context.$ui.find( '.articleFeedback-success span' )
									.fadeOut( 'slow' );
							}, 5000 );
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
						$.articleFeedback.fn.enableSubmission.call( context, true );
						if ( context.$ui.hasClass( 'articleFeedback-expired' ) ) {
							// Changing one means the rest will get submitted too
							context.$ui
								.removeClass( 'articleFeedback-expired' )
								.find( '.articleFeedback-rating' )
									.addClass( 'articleFeedback-rating-new' );
						}
						context.$ui
							.find( '.articleFeedback-expertise' )
								.each( function() {
									$.articleFeedback.fn.enableExpertise( $(this) );
								} );
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
						$.articleFeedback.fn.enableSubmission.call( context, true );
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
			context = { '$ui': $(this), 'options': { 'ratings': {}, 'pitches': {}, 'bucket': 0 } };
			// Allow customization through an options argument
			if ( typeof args[0] === 'object' ) {
				context = $.extend( true, context, { 'options': args[0] } );
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
