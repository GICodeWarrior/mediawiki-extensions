
// Wrap in mediaWiki 
( function( mw ) {

	// Add MediaWikiSupportPlayer dependency on players with mwtitle 
	$( mw ).bind( 'EmbedPlayerUpdateDependencies', function( event, embedPlayer, dependencySet ){
		if( $( embedPlayer ).attr( 'data-mwtitle' ) ){
			$.merge( dependencySet, ['MediaWikiSupportPlayer'] );
		}
	});
	
} )( window.mediaWiki );