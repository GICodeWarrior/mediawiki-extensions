/**
 * JavasSript for the Education Program MediaWiki extension.
 * @see https://www.mediawiki.org/wiki/Extension:Education_Program
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw ) { 

	$( document ).ready( function() {
		
		$( '#bodyContent' ).find( '[type="submit"]' ).button();
		
		$( '#cancelEdit' ).click( function() {
			window.location = $( this ).attr( 'target-url' );
		} );
		
	} );
	
})( window.jQuery, window.mediaWiki );