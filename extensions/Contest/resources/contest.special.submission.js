/**
 * JavasSript for the Contest MediaWiki extension.
 * @see https://secure.wikimedia.org/wikipedia/mediawiki/wiki/Extension:Contest
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function( $, mw ) { 
	
	$( document ).ready( function() {

		$( '.mw-htmlform-submit' ).button();
		
	} );

})( window.jQuery, window.mediaWiki );