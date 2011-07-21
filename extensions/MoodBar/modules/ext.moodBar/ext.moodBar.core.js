/**
 * Front-end scripting core for the MoodBar MediaWiki extension
 *
 * @author Timo Tijhof, 2011
 */
( function( $ ) {

	var mb = mw.moodBar;
	$.extend( mb, {

		tpl: {
			overlay: '\
				<div id="mw-moodBar-overlayWrap"><div id="mw-moodBar-overlay">\
					<span class="mw-moodBar-overlayClose"><a href="#"><html:msg key="moodbar-close" /></a></span>\
					<div class="mw-moodBar-overlayTitle"><html:msg key="moodbar-intro-using" /></div>\
					<div class="mw-moodBar-types"></div>\
					<div class="mw-moodBar-form">\
						<div class="mw-moodBar-formTitle">\
							<span class="mw-moodBar-formNote"><html:msg key="moodbar-form-note" /></span>\
							<html:msg key="moodbar-form-title" />\
						</div>\
						<textarea maxlength="140" class="mw-moodBar-formInput" /></textarea>\
						<input type="button" class="mw-moodBar-formSubmit" />\
						\
					</div>\
					<span class="mw-moodBar-overlayWhat">\
						<a title-msg="tooltip-moodbar-what">\
							<span class="mw-moodBar-overlayWhatTrigger"></span>\
							<span class="mw-moodBar-overlayWhatLabel"><html:msg key="moodbar-what-label" /></span>\
						</a>\
						<div class="mw-moodBar-overlayWhatContent"></div>\
					</span>\
				</div></div>',
			type: '\
				<div class="mw-moodBar-type mw-moodBar-type-$1" rel="$1">\
					<span class="mw-moodBar-typeTitle"><html:msg key="moodbar-type-$1-title" /></span>\
				</div>'
		},

		event: {
			trigger: function( e ) {
				e.preventDefault();
				if ( !mb.ui.overlay.is( ':visible' ) ) {
					mb.ui.overlay.show();
				} else {
					mb.ui.overlay.hide();
				}
			}
		},

		feedbackItem: {
			comment: '',
			bucket: mb.conf.bucketKey,
			type: 'unknown',
			callback: function( data ) {
				if ( data && data.moodbar && data.moodbar.result === 'success' ) {
					alert(1);
				} else {
					alert(0);
				}
			}
		},

		core: function() {
			var msgOptions = { params: {} };
			msgOptions.params['moodbar-intro-using'] = [mw.config.get( 'wgSiteName' )];

			// Create overlay
			mb.ui.overlay = $( mb.tpl.overlay )
				// Handle all html:msgs
				.localize( msgOptions )
				// Bind close-toggle
				.find( '.mw-moodBar-overlayClose' )
					.click( mb.event.trigger )
					.end()
				// Populate type selector
				.find( '.mw-moodBar-types' )
					.append( function() {
						var	$mwMoodBarTypes = $(this),
							elems = [];
						$.each( mb.conf.validTypes, function( id, type ) {
							elems.push(
								$( mb.tpl.type.replace( /\$1/g, type ) )
									.localize()
									.click( function( e ) {
										var $el = $( this );
										mb.ui.overlay.find( '.mw-moodBar-form' ).slideDown( 'fast' );
										$mwMoodBarTypes.addClass( 'mw-moodBar-types-select' );
										mb.feedbackItem.type = $el.attr( 'rel' );
										$el.addClass( 'mw-moodBar-selected' );
										$el.parent()
											.find( '.mw-moodBar-selected' )
												.not( $el )
												.removeClass( 'mw-moodBar-selected' );
									} )
									.get( 0 )
							);
						} );
						return elems;
					} )
					.hover( function() {
						$( this ).addClass( 'mw-moodBar-types-hover' );
					}, function() {
						$( this ).removeClass( 'mw-moodBar-types-hover' );
					} )
					.end()
				// Link what-button
				.find( '.mw-moodBar-overlayWhatTrigger' )
					.text( mw.msg( 'moodbar-what-collapsed' ) )
					.end()
				.find( '.mw-moodBar-overlayWhat > a' )
					.click( function() {
						mb.ui.overlay
							.find( '.mw-moodBar-overlayWhatContent' )
								.each( function() {
									var	$el = $( this ),
										$trigger = mb.ui.overlay.find( '.mw-moodBar-overlayWhatTrigger' );
									if ( $el.is( ':visible' ) ) {
										$el.slideUp( 'fast' );
										$trigger.html( mw.msg( 'moodbar-what-collapsed' ) );
									} else {
										$el.slideDown( 'fast' );
										$trigger.html( mw.msg( 'moodbar-what-expanded' ) );
									}
								} )
					} )
					.end()
				.find( '.mw-moodBar-overlayWhatContent' )
					.html(
						function() {
							var message, linkMessage, link;

							message = mw.message( 'moodbar-what-content' );
							linkMessage = mw.msg( 'moodbar-what-link' );
							link = mw.html.element( 'a', {
									'href': mb.conf.infoUrl,
									'title': linkMessage
								}, linkMessage );

							return message.escaped().replace( /\$1/, link );
						}
					)
					.end()
				// Submit
				.find( '.mw-moodBar-formSubmit' )
					.val( mw.msg( 'moodbar-form-submit' ) )
					.click( function() {
						mb.feedbackItem.comment = mb.ui.overlay.find( 'mw-moodBar-formInput' ).val();
					} )
					.end();

			mb.ui.overlay
				// Inject overlay
				.appendTo( 'body' )
				// Fix the width after the icons and titles are localized and inserted
				.width( function( i, width ) {
					return width;
				} );

			// Bind triger
			mb.ui.trigger.click( mb.event.trigger );
		}
	} );

	mb.core();

} )( jQuery );
