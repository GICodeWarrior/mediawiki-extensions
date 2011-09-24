jQuery( function( $ ) {
	$( '#fbd-list-more a' ).click( function( e ) {
		e.preventDefault();
		
		// TODO spinner
		
		var	limit = 20,
			username = $( '#fbd-filters-username' ).val(),
			types = [],
			reqData = {
				'action': 'query',
				'list': 'moodbarcomments',
				'format': 'json',
				'mbcprop': 'formatted',
				'mbclimit': limit + 2, // we drop the first and last result
				'mbccontinue': $( '#fbd-list li:last' ).data( 'mbccontinue' )
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
		
		// TODO save jqXhr and protect against duplicate clicks causing concurrent requests
		$.ajax( mw.util.wikiScript( 'api' ), {
			'data': reqData,
			'success': function( data ) {
				if ( !data || !data.query || !data.query.moodbarcomments ) {
					// TODO error
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
				
				// TODO act on !moreResults
			},
			'error': function( jqXHR, textStatus, errorThrown ) {
				// TODO
			},
			'dataType': 'json'
		} );
	} );
} );
