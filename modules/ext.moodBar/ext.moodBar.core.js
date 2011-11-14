/**
 * Front-end scripting core for the MoodBar MediaWiki extension
 *
 * @author Timo Tijhof, 2011
 */
( function( $ ) {

	var mb = mw.moodBar;
	$.extend( mb, {

		tpl: {
			overlayBase: '\
				<div id="mw-moodBar-overlayWrap"><div id="mw-moodBar-overlay">\
					<div id="mw-moodBar-pokey"></div>\
					<span class="mw-moodBar-overlayClose"><a href="#"><html:msg key="moodbar-close" /></a></span>\
					<div class="mw-moodBar-overlayContent"></div>\
				</div></div>',
			userinput: '\
					<div class="mw-moodBar-overlayTitle"><span><html:msg key="INTROTITLE" /></span></div>\
					<div class="mw-moodBar-types-container">\
						<div class="mw-moodBar-types"></div>\
					</div>\
					<div class="mw-moodBar-form">\
						<div class="mw-moodBar-formTitle">\
							<span class="mw-moodBar-formNote"><span id="mw-moodBar-charCount"></span><html:msg key="moodbar-form-note-dynamic" /></span>\
							<html:msg key="moodbar-form-title" />\
						</div>\
						<div class="mw-moodBar-formInputs">\
							<textarea rows="3" maxlength="140" id="mw-moodBar-feedbackInput" class="mw-moodBar-formInput" /></textarea>\
							<div class="mw-moodBar-privacy"></div>\
							<input type="button" class="mw-moodBar-formSubmit" disabled="disabled" />\
						</div>\
					</div>\
					<span class="mw-moodBar-overlayWhat">\
						<a href="#" title-msg="tooltip-moodbar-what">\
							<span class="mw-moodBar-overlayWhatTrigger"></span>\
							<span class="mw-moodBar-overlayWhatLabel"><html:msg key="moodbar-what-label" /></span>\
						</a>\
						<div class="mw-moodBar-overlayWhatContent"></div>\
					</span>',
			type: '\
				<span class="mw-moodBar-type mw-moodBar-type-$1" rel="$1">\
					<span class="mw-moodBar-typeTitle"><html:msg key="moodbar-type-$1-title" /></span>\
				</span>',
			loading: '\
				<div class="mw-moodBar-state mw-moodBar-state-loading">\
					<div class="mw-moodBar-state-title"><html:msg key="moodbar-loading-title" /></div>\
					<div class="mw-moodBar-state-subtitle"><html:msg key="moodbar-loading-subtitle" /></div>\
				</div>',
			success: '\
				<div class="mw-moodBar-state mw-moodBar-state-success">\
					<div class="mw-moodBar-state-title"><html:msg key="moodbar-success-title" /></div>\
					<div class="mw-moodBar-state-subtitle"><html:msg key="moodbar-success-subtitle" /></div>\
				</div>',
			error: '\
				<div class="mw-moodBar-state mw-moodBar-state-error">\
					<div class="mw-moodBar-state-title"><html:msg key="moodbar-error-title" /></div>\
					<div class="mw-moodBar-state-subtitle"><html:msg key="moodbar-error-subtitle" /></div>\
				</div>'
		},

		event: {
			trigger: function( e ) {
				e.preventDefault();
				if ( mb.ui.overlay.is( ':hidden' ) ) {
					mb.swapContent( mb.tpl.userinput );
					mb.ui.overlay.show();
				} else {
					mb.ui.overlay.hide();
				}
			},
			
			disable: function( e ) {
				e.preventDefault();
				$.cookie(
					mb.cookiePrefix() + 'disabled',
					'1',
					{ 'path': '/', 'expires': Number( mb.conf.disableExpiration ) }
				);
				mb.ui.overlay.fadeOut( 'fast' );
				mb.ui.trigger.fadeOut( 'fast' );
			}
		},

		feedbackItem: {
			comment: '',
			bucket: mb.conf.bucketKey,
			type: 'unknown',
			callback: function( data ) {
				if ( data && data.moodbar && data.moodbar.result === 'success' ) {
					mb.swapContent( mb.tpl.success );
					setTimeout( function() {
						mb.ui.overlay.fadeOut();
					}, 3000 );
				} else {
					mb.swapContent( mb.tpl.error );
				}
			}
		},

		prepareUserinputContent: function( overlay ) {
			overlay
				// Populate type selector
				.find( '.mw-moodBar-types' )
					.append( function() {
						var	$mwMoodBarTypes = $( this ),
							elems = [];
						$.each( mb.conf.validTypes, function( id, type ) {
							elems.push(
								$( mb.tpl.type.replace( /\$1/g, type ) )
									.localize()
									.click( function( e ) {
										var $el = $( this );
										//mb.ui.overlay.find( '.mw-moodBar-formSubmit').removeAttr('disabled');
										mb.ui.overlay.find( '.mw-moodBar-formInput' ).focus();
										$mwMoodBarTypes.addClass( 'mw-moodBar-types-select' );
										mb.feedbackItem.type = $el.attr( 'rel' );
										$el.addClass( 'mw-moodBar-selected' );
										$el.parent()
											.find( '.mw-moodBar-selected' )
												.not( $el )
												.removeClass( 'mw-moodBar-selected' );
										mb.validate();
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
					.click( function( e ) {
						e.preventDefault();
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
							var	message, linkMessage, link,
								disableMsg, disableLink, out;

							message = mw.msg( 'moodbar-what-content' );
							linkMessage = mw.msg( 'moodbar-what-link' );
							link = mw.html.element( 'a', {
									'href': mb.conf.infoUrl,
									'title': linkMessage
								}, linkMessage );

							out = mw.html.escape( message )
								.replace( /\$1/, link );
							out = mw.html.element( 'p', {},
								new mw.html.Raw( out )
							);
							
							disableMsg = mw.msg( 'moodbar-disable-link' )
							disableLink = mw.html.element( 'a', {
								'href' : '#',
								'class' : 'mw-moodBar-disable'
							}, disableMsg );
							
							out += mw.html.element( 'p', {},
								new mw.html.Raw( disableLink )
							);
							
							return out;
						}
					)
					.find('.mw-moodBar-disable')
					.click( mb.event.disable )
					.end()
					.end()
				.find( '.mw-moodBar-privacy' )
					.html(
						function() {
							var message, linkMessage, link;

							message = mw.msg( 'moodbar-privacy' );
							linkMessage = mw.msg( 'moodbar-privacy-link' );
							link = mw.html.element( 'a', {
									'href': mb.conf.privacyUrl,
									'title': linkMessage
								}, linkMessage );

							return mw.html.escape( message )
								.replace( /\$1/, link );
						}
					)
					.end()
				// set up character count
				.find( '.mw-moodBar-formNote' )
					.html(
						function() {
							var message, counterElement;
							message = mw.msg( 'moodbar-form-note-dynamic' );							
							counterElement = mw.html.element( 'span', {
									'id': 'mw-moodBar-charCount',
								} );
							return mw.html.escape( message )
								.replace( /\$1/, counterElement );
						}
					)
					.end()

					
				// Submit
				.find( '.mw-moodBar-formSubmit' )
					.val( mw.msg( 'moodbar-form-submit' ) )
					.click( function() {
						mb.feedbackItem.comment = mb.ui.overlay.find( '.mw-moodBar-formInput' ).val();
						if(mb.feedbackItem.comment){
							mb.swapContent( mb.tpl.loading );
							$.moodBar.submit( mb.feedbackItem );
						}
					} )
					.end()
					
				// Keypress
				.find( '#mw-moodBar-feedbackInput' )
					.keyup( function(event) {							
						mb.validate();
					})
					.end();
			
				// Set up character counter
				// This is probably not the right way to do this.
				$( '#mw-moodBar-feedbackInput' ).NobleCount('#mw-moodBar-charCount', {max_chars:140});
			
		},

		core: function() {

			// Create overlay
			mb.ui.overlay = $( mb.tpl.overlayBase )
				.localize()
				// Bind close-toggle
				.find( '.mw-moodBar-overlayClose' )
					.click( mb.event.trigger )
					.end();
			mb.swapContent( mb.tpl.userinput );

			mb.ui.overlay.appendTo( 'body' );
			mb.ui.overlay.show();
			
			// Get the width of the types element, and add 100px
			// 52px in known margins, 58px seems to be a necessary
			// fudge factor, plus 30px so the close button doesn't collide
			// with the rounded corners
			var newWidth = mb.ui.overlay
					.find('.mw-moodBar-types')
					.width() + 140;
			var titleWidth = mb.ui.overlay
					.find('.mw-moodBar-overlayTitle span')
					.width() + 100;
			
			if ( newWidth < titleWidth ) {
				newWidth = titleWidth;
			}
			
 			mb.ui.overlay.width(newWidth);
			mb.ui.overlay.hide();
			
			// Bind triger
			mb.ui.trigger.click( mb.event.trigger );
		},

		swapContent: function( tpl ) {
			var	sitenameParams = [mw.config.get( 'wgSiteName' )], // Cache common params
				msgOptions = {
					keys: {
						INTROTITLE: 'moodbar-intro-' + mb.conf.bucketKey
					},
					params: {
						INTROTITLE: sitenameParams,
						'moodbar-loading-subtitle': sitenameParams,
						'moodbar-success-subtitle': sitenameParams,
						'moodbar-error-subtitle': sitenameParams
					}
				};

			mb.ui.overlay
				.find( '.mw-moodBar-overlayContent' )
					.html( tpl )
					.localize( msgOptions );

			if ( tpl == mb.tpl.userinput ) {
				mb.prepareUserinputContent( mb.ui.overlay );
			}
			return true;
		},
		
		validate: function() {
			if( $( '#mw-moodBar-feedbackInput' ).val() !== "" && $( '.mw-moodBar-selected').length ) {
				mb.ui.overlay.find( '.mw-moodBar-formSubmit').removeAttr('disabled');
			} else {
				mb.ui.overlay.find( '.mw-moodBar-formSubmit').attr({'disabled':'true'});		
			}
		}
	} );

	if ( !mb.isDisabled() ) {
		mb.core();
	}

} )( jQuery );
