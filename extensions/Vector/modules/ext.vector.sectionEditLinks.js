/*
 * Section Edit Links for Vector
 */
( function( $, mw ) {

if ( mw.config.get( 'wgVectorSectionEditLinksBucketTest', false ) ) {
	var bucket = $.cookie( 'ext.vector.sectionEditLinks-bucket' );
	if ( bucket === null ) {
		// Percentage chance of being tracked
		var odds = Math.min( 100, Math.max( 0,
			Number( mw.config.get( 'wgVectorSectionEditLinksLotteryOdds', 0 ) )
		) );
		// 0 = not tracked, 1 = tracked with old version, 2 = tracked with new version
		bucket = ( Math.random() * 100 ) < odds ? Number( Math.random() < 0.5 ) + 1 : 0;
		$.cookie( 'ext.vector.sectionEditLinks-bucket', bucket, { 'path': '/', 'expires': 30 } );
		// If we are going to track this person from now on, let's also track which bucket we put
		// them into and when
		if ( bucket > 0 && 'trackActionWithInfo' in $ ) {
			$.trackActionWithInfo( 'ext.vector.sectionEditLinks-bucket', bucket );
		}
	}
}
if ( bucket > 0 ) {
	// Transform the targets of section edit links to route through the click tracking API
	$( 'span.editsection a' ).each( function() {
		var session = $.cookie( 'clicktracking-session' );
		var editUrl = $( this ).attr( 'href' );
		editUrl += ( editUrl.indexOf( '?' ) >= 0 ? '&' : '?' ) + $.param( {
			'clicktrackingsession': session,
			'clicktrackingevent': 'ext.vector.sectionEditLinks-bucket' + bucket + '-save'
		} );
		$(this).attr( 'href', mediaWiki.config.get( 'wgScriptPath' ) + '/api.php?' + $.param( {
			'action': 'clicktracking',
			'eventid': 'ext.vector.sectionEditLinks-bucket' + bucket + '-click',
			'token': session,
			'redirectto': editUrl
		} ) );
	} );
	if ( bucket == 2 ) {
		// Move the link over to be next to the heading text and style it with an icon
		$( 'span.mw-headline' ).each( function() {
			$(this)
				.after(
					$( '<span class="editsection vector-editLink"></span>' )
						.append(
							$(this)
								.prev( 'span.editsection' )
								.find( 'a' )
									.each( function() {
										var text = $(this).text();
										$(this).text(
											text.substr( 0, 1 ).toUpperCase() + text.substr( 1 )
										);
									} )
									.detach()
						)
				)
				.prev( 'span.editsection' )
					.remove();
		} );
	}
}

} )( jQuery, mediaWiki );
