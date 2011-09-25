jQuery( function( $ ) {
	$( '#fbd-list-more').children( 'a' ).click( function( e ) {
		e.preventDefault();
		
		var	limit = 20,
			username = $( '#fbd-filters-username' ).val(),
			types = [],
			reqData;
		
		// Hide the "More" link and put in a spinner
		$( '#fbd-list-more' )
			.addClass( 'mw-ajax-loader' )
			.children( 'a' )
			.css( 'visibility', 'hidden' ); // using .hide() messes up the layout
		
		// Build the API request
		reqData = {
			'action': 'query',
			'list': 'moodbarcomments',
			'format': 'json',
			'mbcprop': 'formatted',
			'mbclimit': limit + 2, // we drop the first and last result
			'mbccontinue': $( '#fbd-list').find( 'li:last' ).data( 'mbccontinue' )
		};
		$( '#fbd-filters-type-praise, #fbd-filters-type-confusion, #fbd-filters-type-issues' ).each( function() {
			if ( $(this).prop( 'checked' ) ) {
				types.push( $(this).val() );
			}
		} );
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
					.css( 'visibility', 'visible' );
				
				if ( !data || !data.query || !data.query.moodbarcomments ) {
					$( '#fbd-list-more' ).text( mw.msg( 'moodbar-feedback-ajaxerror'  ) );
					return;
				}
				
				var 	comments = data.query.moodbarcomments,
					len = comments.length,
					$ul = $( '#fbd-list' ),
					moreResults = false,
					i;
				if ( len > 0 ) {
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
					$( '#fbd-list-more' ).text( mw.msg( 'moodbar-feedback-nomore' ) );
				}
			},
			'error': function( jqXHR, textStatus, errorThrown ) {
				$( '#fbd-list-more' )
					.removeClass( 'mw-ajax-loader' )
					.text( mw.msg( 'moodbar-feedback-ajaxerror'  ) );
			},
			'dataType': 'json'
		} );
	} );
} );
