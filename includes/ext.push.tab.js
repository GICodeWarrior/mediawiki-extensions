/**
 * JavasSript for the Push tab in the Push extension.
 * @see http://www.mediawiki.org/wiki/Extension:Push
 * 
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function($) { $( document ).ready( function() {
	
	// Compatibility with pre-RL code.
	// Messages will have been loaded into wgPushMessages.
	if ( typeof mediaWiki === 'undefined' ) {
		mediaWiki = new Object();
		
		mediaWiki.msg = function( message ) {
			return window.wgPushMessages[message];
		}
	}
	
	$('.push-button').click(function() {
		this.disabled = true;
		this.innerHTML = mediaWiki.msg( 'push-button-pushing' );
		
		initiatePush(
			this,
			$('#pageName').attr('value'),
			$(this).attr( 'pushtarget' )
		);
	});
	
	$('#push-all-button').click(function() {
		this.disabled = true;
		this.innerHTML = mediaWiki.msg( 'push-button-pushing' );
		$.each($(".push-button"), function(i,v) {
			$(v).click();
		});
	});	
	
	function initiatePush( sender, pageName, targetUrl ) {
		$.getJSON(
			wgScriptPath + '/api.php',
			{
				'action': 'push',
				'format': 'json',
				'page': pageName,
				'targets': targetUrl
			},
			function( data ) {
				alert('.');
				if ( data.error ) {
					alert('');
					handleError( sender, targetUrl, data.error );
				}
				else {
					alert('.');
					sender.innerHTML = mediaWiki.msg( 'push-button-completed' );
					setTimeout( function() {reEnableButton( sender );}, 1000 );
				}
			}
		); 		
	}
	
	function reEnableButton( button ) {
		button.innerHTML = mediaWiki.msg( 'push-button-text' );
		button.disabled = false;
		
		var pushAllButton = $('#push-all-button');
		
		// If there is a "push all" button, make sure to reset it
		// when all other buttons have been reset.
		if ( typeof pushAllButton !== "undefined" ) {
			var hasDisabled = false;
			
			$.each($(".push-button"), function(i,v) {
				if ( v.disabled ) {
					hasDisabled = true;
				}
			});
			
			if ( !hasDisabled ) {
				pushAllButton.attr( "disabled", false );
				pushAllButton.text( mediaWiki.msg( 'push-button-all' ) );
			}
		}
	}
	
	function handleError( sender, targetUrl, error ) {
		alert( error.info );
		sender.innerHTML = mediaWiki.msg( 'push-button-failed' );		
	}
	
} ); })(jQuery);