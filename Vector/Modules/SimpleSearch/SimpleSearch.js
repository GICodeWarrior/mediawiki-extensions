/* JavaScript for SimpleSearch extension */

// Disable mwsuggest.js on searchInput 
if ( typeof os_autoload_inputs !== 'undefined' && os_autoload_forms !== 'undefined' ) {
	os_autoload_inputs = [];
	os_autoload_forms = [];
}

js2AddOnloadHook( function() {
	// Only use this function in conjuction with the Vector skin
	if( skin != 'vector' ) {
		return;
	}
	// Add form submission handler
	$j( 'div#simpleSearch > input#searchInput' )
		.each( function() {
			$j( '<label></label>' )
				.text( gM( 'vector-simplesearch-search' ) )
				.css({
					'display': 'none',
					'position' : 'absolute',
					'bottom': 0,
					'padding': '0.25em',
					'color': '#999999',
					'cursor': 'text'
				})
				.css( ( $j( 'body.rtl' ).size() > 0 ? 'right' : 'left' ), 0 )
				.click( function() {
					$j(this).parent().find( 'input#searchInput' ).focus();
				})
				.appendTo( $j(this).parent() );
			if ( $j(this).val() == '' ) {
				$j(this).parent().find( 'label' ).show();
			}
		})
		.focus( function() {
			$j(this).parent().find( 'label' ).hide();
		})
		.blur( function() {
			if ( $j(this).val() == '' ) {
				$j(this).parent().find( 'label' ).show();
			}
		});
	$j( '#searchInput, #searchInput2, #powerSearchText, #searchText' ).suggestions( {
		fetch: function( query ) {
			var $this = $j(this);
			var request = $j.ajax( {
				url: wgScriptPath + '/api.php',
				data: {
					'action': 'opensearch',
					'search': query,
					'namespace': 0,
					'suggest': ''
				},
				dataType: 'json',
				success: function( data ) {
					$this.suggestions( 'suggestions', data[1] );
				}
			});
			$j(this).data( 'request', request );
		},
		cancel: function () {
			var request = $j(this).data( 'request' );
			// If the delay setting has caused the fetch to have not even happend yet, the request object will
			// have never been set
			if ( request && typeof request.abort == 'function' ) {
				request.abort();
				$j(this).removeData( 'request' );
			}
		},
		result: {
			select: function( $textbox ) {
				$textbox.closest( 'form' ).submit();
			}
		},
		delay: 120
	} );
	$j( '#searchInput' ).suggestions( {
		result: {
			select: function( $textbox ) {
				$textbox.closest( 'form' ).submit();
			}
		},
		special: {
			render: function( query ) {
				var perfectMatch = false;
				$j(this).closest( '.suggestions' ).find( '.suggestions-results div' ).each( function() {
					if ( $j(this).data( 'text' ) == query ) {
						perfectMatch = true;
					}
				} );
				if ( perfectMatch ) {
					if ( $j(this).children().size() == 0  ) {
						$j(this).show();
						$label = $j( '<div />' )
							.addClass( 'special-label' )
							.text( gM( 'vector-simplesearch-containing' ) )
							.appendTo( $j(this) );
						$query = $j( '<div />' )
							.addClass( 'special-query' )
							.text( query )
							.appendTo( $j(this) );
						$query.autoEllipse();
					} else {
						$j(this).find( '.special-query' )
							.empty()
							.text( query )
							.autoEllipse();
					}
				} else {
					$j(this).hide();
					$j(this).empty();
				}
			},
			select: function( $textbox ) {
				$textbox.closest( 'form' ).append(
					$j( '<input />' ).attr( { 'type': 'hidden', 'name': 'fulltext', 'value': 1 } )
				);
				$textbox.closest( 'form' ).submit();
			}
		},
		$region: $j( '#simpleSearch' )
	} );
});