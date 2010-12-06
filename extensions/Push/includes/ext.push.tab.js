/**
 * JavasSript for the Push tab in the Push extension.
 * @see http://www.mediawiki.org/wiki/Extension:Push
 * 
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

$( document ).ready( function() {
	
	$('.push-button').click(function() {
		this.disabled = true;
		this.innerHTML = mediaWiki.msg( 'push-button-pushing' );
		
		getTokenAndDoPush( this, $(this).attr( 'pushtarget' ) );
	});
	
	function getTokenAndDoPush( sender, targetUrl ) {
		$.getJSON(
			targetUrl + '/api.php',
			{
				'action': 'query',
				'format': 'json',
				'intoken': 'edit',
				'prop': 'info',
				'titles': 'Test page', // TODO
			},
			function( data ) {
				if ( data.error ) {
					alert( data.error.info );
					sender.innerHTML = mediaWiki.msg( 'push-button-failed' );
				}
				else {
					sender.innerHTML = sender.innerHTML + '.';
					for (first in data.query.pages) break;
					doPush( sender, targetUrl, data.query.pages[first].edittoken );
				}
			}
		); 
	

	}
	
	function doPush( sender, targetUrl, token ) {
		$.post( 
			targetUrl + '/api.php',
			{
				'action': 'edit',
				'format': 'json',
				'token': token,
				'title': 'Test page', // TODO
				'summary': 'Pushed content', // TODO
				'text': 'Test push content' // TODO
			},
			function( data ) {
				if ( data.error ) {
					alert( data.error.info );
					sender.innerHTML = mediaWiki.msg( 'push-button-failed' );
				}
				else {
					sender.innerHTML = mediaWiki.msg( 'push-button-completed' );
				}
			}
		);		
	}
	
} );
