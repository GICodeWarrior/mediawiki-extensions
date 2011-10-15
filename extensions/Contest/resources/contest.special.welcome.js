/**
 * JavasSript for the Contest MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw ) { 
	
	$( document ).ready( function() {

		$( '#contest-challenges' ).contestChallenges(
			mw.config.get( 'ContestChallenges' ),
			mw.config.get( 'ContestConfig' )
		);
		
		$rules = $( '#contest-rules' );
		
		$div = $( '<div />' ).attr( {
			'style': 'display:none'
		} ).html( $( '<div />' ).attr( { 'id': 'contest-rules-div' } ).html( $rules.attr( 'data-rules' ) ) );
		
		// TODO: fix very ugly message construction.
		$a = $( '<a />' ).text( mw.msg( 'contest-welcome-rules-link' ) ).attr( { 'href': '#contest-rules-div' } );
		$p = $( '<p />' ).text( mw.msg( 'contest-welcome-rules' ) + ' ' ).append( $a ).append( '.' );
		
		$rules.html( $p ).append( $div );
		
		$a.fancybox( {
			'width'         : '85%',
			'height'        : '85%',
			'transitionIn'  : 'none',
			'transitionOut' : 'none',
			'type'          : 'inline',
			'autoDimensions': false
		} );
	} );

})( window.jQuery, window.mediaWiki );
