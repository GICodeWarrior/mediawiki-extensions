jQuery( function( $ ) {
	function getSelectedTypes() {
		var types = [];
		$( '#fbd-filters-type-praise, #fbd-filters-type-confusion, #fbd-filters-type-issues' ).each( function() {
			if ( $(this).prop( 'checked' ) ) {
				types.push( $(this).val() );
			}
		} );
		return types;
	}
	
	function setCookies() {
		$.cookie( 'moodbar-feedback-types', getSelectedTypes().join( '|' ), { 'path': '/', 'expires': 7 } );
		$.cookie( 'moodbar-feedback-username', $( '#fbd-filters-username' ).val(), { 'path': '/', 'expires': 7 } );
	}
	
	function loadFromCookies() {
		var	cookieTypes = $.cookie( 'moodbar-feedback-types' );
			$username = $( '#fbd-filters-username' ),
			changed = false;
		if ( $username.val() == '' ) {
			var cookieUsername = $.cookie( 'moodbar-feedback-username' );
			if ( cookieUsername != '' ) {
				$username.val( cookieUsername );
				changed = true;
			}
		}
		
		if ( cookieTypes ) {
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
	
	function loadComments( mode ) {
		var	limit = 20,
			username = $( '#fbd-filters-username' ).val(),
			types = getSelectedTypes(),
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
		if ( types.length ) {
			reqData['mbctype'] = types.join( '|' );
		}
		if ( username.length ) {
			reqData['mbcuser'] = username;
		}
		
		$.ajax( mw.util.wikiScript( 'api' ), {
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
				
				// Drop the first element because it duplicates the last shown one
				comments.shift();
				len--;
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
	
	$( '#fbd-filters' ).children( 'form' ).submit( function( e ) {
		e.preventDefault();
		setCookies();
		loadComments( 'filter' );
	} );
	
	$( '#fbd-list-more' ).children( 'a' ).click( function( e ) {
		e.preventDefault();
		loadComments( 'more' );
	} );
	
	var filterType = $( '#fbd-filters' ).children( 'form' ).data( 'filtertype' );
	if ( filterType != 'filtered' ) {
		if ( loadFromCookies() && filterType != 'id' ) {
			loadComments( 'filter' );
		}
	}
} );
