/**
 * AJAX code for Special:MoodBarFeedback
 */
jQuery( function( $ ) {
	/**
	 * Saved form state
	 */
	var formState = { types: [], username: '' };
	
	/**
	 * Save the current form state to formState
	 */
	function saveFormState() {
		formState.types = getSelectedTypes();
		formState.username = $( '#fbd-filters-username' ).val();
	}
	
	/**
	 * Figure out which comment type filters have been selected.
	 * @return array of comment types
	 */
	function getSelectedTypes() {
		var types = [];
		$( '#fbd-filters-type-praise, #fbd-filters-type-confusion, #fbd-filters-type-issues' ).each( function() {
			if ( $(this).prop( 'checked' ) ) {
				types.push( $(this).val() );
			}
		} );
		return types;
	}
	
	/**
	 * Set the moodbar-feedback-types and moodbar-feedback-username cookies based on formState.
	 * This function uses the form state saved in formState, so you may want to call saveFormState() first.
	 */
	function setCookies() {
		$.cookie( 'moodbar-feedback-types', formState.types.join( '|' ), { 'path': '/', 'expires': 7 } );
		$.cookie( 'moodbar-feedback-username', formState.username, { 'path': '/', 'expires': 7 } );
	}
	
	/**
	 * Load the form state from the moodbar-feedback-types and moodbar-feedback-username cookies.
	 * This assumes the form is currently blank.
	 * @return bool True if the form is no longer blank (i.e. at least one value was changed), false otherwise
	 */
	function loadFromCookies() {
		var	cookieTypes = $.cookie( 'moodbar-feedback-types' ),
			$username = $( '#fbd-filters-username' ),
			changed = false;
		if ( $username.val() == '' ) {
			var cookieUsername = $.cookie( 'moodbar-feedback-username' );
			if ( cookieUsername != '' && cookieUsername !== null ) {
				$username.val( cookieUsername );
				changed = true;
			}
		}
		
		if ( cookieTypes ) {
			// Because calling .indexOf() on an array doesn't work in all browsers,
			// we'll use cookieTypes.indexOf( '|valueWereLookingFor' ) . In order for
			// that to work, we need to prepend a pipe first.
			cookieTypes = '|' + cookieTypes;
			$( '#fbd-filters-type-praise, #fbd-filters-type-confusion, #fbd-filters-type-issues' ).each( function() {
				if ( !$(this).prop( 'checked' ) && cookieTypes.indexOf( '|' + $(this).val() ) != -1 ) {
					$(this).prop( 'checked', true );
					changed = true;
				}
			} );
		}
		return changed;
	}
	
	/**
	 * Show a message in the box that normally contains the More link.
	 * This will hide the more link, remove any existing <span>s,
	 * and add a <span> with the supplied text.
	 * @param text string Message text
	 */
	function showMessage( text ) {
		$( '#fbd-list-more' )
			.children( 'a' )
			.hide()
			.end()
			.children( 'span' )
			.remove() // Remove any previous messages
			.end()
			.append( $( '<span>' ).text( text ) );
	}
	
	/**
	 * Load a set of 20 comments into the list. In 'filter' mode, the list is
	 * blanked before the new comments are loaded. In 'more' mode, the comments are
	 * loaded at the end of the existing set.
	 * 
	 * This function uses the form state saved in formState, so you may want to call saveFormState() first.
	 * 
	 * @param mode string Either 'filter' or 'more'
	 */
	function loadComments( mode ) {
		var	limit = 20,
			reqData;
		
		if ( mode == 'filter' ) {
			$( '#fbd-list' ).empty();
		}
		// Hide the "More" link and put in a spinner
		$( '#fbd-list-more' )
			.show() // may have been output with display: none;
			.addClass( 'mw-ajax-loader' )
			.children( 'a' )
			.css( 'visibility', 'hidden' ) // using .hide() cuts off the spinner
			.show() // showMessage() may have called .hide()
			.end()
			.children( 'span' )
			.remove(); // Remove any message added by showMessage()
		
		// Build the API request
		// FIXME: in 'more' mode, changing the filters then clicking More will use the wrong criteria
		reqData = {
			'action': 'query',
			'list': 'moodbarcomments',
			'format': 'json',
			'mbcprop': 'formatted',
			'mbclimit': limit + 2 // we drop the first and last result
		};
		if ( mode == 'more' ) {
			reqData['mbccontinue'] = $( '#fbd-list').find( 'li:last' ).data( 'mbccontinue' );
		}
		if ( formState.types.length ) {
			reqData['mbctype'] = formState.types.join( '|' );
		}
		if ( formState.username.length ) {
			reqData['mbcuser'] = formState.username;
		}
		
		$.ajax( {
			'url': mw.util.wikiScript( 'api' ),
			'data': reqData,
			'success': function( data ) {
				// Remove the spinner and restore the "More" link
				$( '#fbd-list-more' )
					.removeClass( 'mw-ajax-loader' )
					.children( 'a' )
					.css( 'visibility', 'visible' ); // Undo visibility: hidden;
				
				if ( !data || !data.query || !data.query.moodbarcomments ) {
					showMessage( mw.msg( 'moodbar-feedback-ajaxerror' ) );
					return;
				}
				
				var 	comments = data.query.moodbarcomments,
					len = comments.length,
					$ul = $( '#fbd-list' ),
					moreResults = false,
					i;
				if ( len == 0 ) {
					if ( mode == 'more' ) {
						showMessage( mw.msg( 'moodbar-feedback-nomore' ) );
					} else {
						showMessage( mw.msg( 'moodbar-feedback-noresults' ) );
					}
					return;
				}
				
				if ( mode == 'more' ) {
					// Drop the first element because it duplicates the last shown one
					comments.shift();
					len--;
				}
				if ( len > limit ) {
					// Drop any elements past the limit. We do know there are more results now
					len = limit;
					moreResults = true;
				}
				
				for ( i = 0; i < len; i++ ) {
					$ul.append( comments[i].formatted );
				}
				
				if ( !moreResults ) {
					if ( mode == 'more' ) {
						showMessage( mw.msg( 'moodbar-feedback-nomore' ) );
					} else {
						$( '#fbd-list-more' ).hide();
					}
				}
			},
			'error': function( jqXHR, textStatus, errorThrown ) {
				$( '#fbd-list-more' ).removeClass( 'mw-ajax-loader' );
				showMessage( mw.msg( 'moodbar-feedback-ajaxerror'  ) );
			},
			'dataType': 'json'
		} );
	}
	
	/**
	 * Show a hidden comment
	 */
	function showHiddenComment(e) {
		var $item = $(this).closest('.fbd-item');
		var cont = $item.attr('data-mbccontinue');
		
		var request = {
			'action' : 'query',
			'list' : 'moodbarcomments',
			'format' : 'json',
			'mbcprop' : 'formatted|hidden',
			'mbclimit' : 1,
			'mbccontinue' : cont
		};
		
		$.post( mw.util.wikiScript('api'), request,
			function( data ) {
				var $content = $j(data.query.moodbarcomments[0].formatted);
				$item.replaceWith($content);
			}, 'json' );
		
		e.preventDefault();
	}
	
	// On-load stuff
	
	$('.fbd-item-show a').live( 'click', showHiddenComment );
	
	$( '#fbd-filters' ).children( 'form' ).submit( function( e ) {
		e.preventDefault();
		saveFormState();
		setCookies();
		loadComments( 'filter' );
	} );
	
	$( '#fbd-list-more' ).children( 'a' ).click( function( e ) {
		e.preventDefault();
		// We don't call saveFormState() here because we want to use the state of the form
		// at the time it was last filtered. Otherwise, you would see strange behavior if
		// you changed the form state then clicked More.
		loadComments( 'more' );
	} );
	
	saveFormState();
	var filterType = $( '#fbd-filters' ).children( 'form' ).data( 'filtertype' );
	// If filtering already happened on the PHP side, don't load the form state from cookies
	if ( filterType != 'filtered' ) {
		// Don't do an AJAX filter if we're on an ID view, or if the form is still blank after loadFromCookies()
		if ( loadFromCookies() && filterType != 'id' ) {
			saveFormState();
			loadComments( 'filter' );
		}
	}
} );
