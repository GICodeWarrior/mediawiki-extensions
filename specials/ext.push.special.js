/**
 * JavasSript for Special:Push in the Push extension.
 * @see http://www.mediawiki.org/wiki/Extension:Push
 * 
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function($) { $( document ).ready( function() {
	
	// Compatibility with pre-RL code.
	// Messages will have been loaded into wgPushMessages.
	if ( typeof mediaWiki === 'undefined' ) {
		mediaWiki = new Object();
		
		mediaWiki.msg = function() {
			message = window.wgPushMessages[arguments[0]];
			
			for ( var i = arguments.length - 1; i > 0; i-- ) {
				message = message.replace( '$' + i, arguments[i] );
			}
			
			return message;
		}
	}

	var resultList = $('#pushResultList');
	
	var targets = [];
	for (targetName in window.wgPushTargets) targets.push( window.wgPushTargets[targetName] ); 
	
	var pages = window.wgPushPages;
	
	var requestAmount = Math.min( pages.length, window.wgPushWorkerCount );
	var batchSize = Math.min( targets.length, window.wgPushBatchSize );
	
	for ( i = requestAmount; i > 0; i-- ) {
		initiateNextPush();
	}
	
	function initiateNextPush() {
		var page = pages.pop();
		
		if ( page ) {
			startPush( page, 0, null );
		}
		else if ( !--requestAmount ) {
			showCompletion();
		}
	}
	
	function startPush( pageName, targetOffset, listItem ) {
		if ( targetOffset == 0 ) {
			var listItem = $( '<li />' );
			listItem.text( mediaWiki.msg( 'push-special-item-pushing', pageName ) );
			
			var box = $('#pushResultDiv');
			var innerBox = $('#pushResultDiv > .innerResultBox');
			var atBottom = Math.abs(innerBox.offset().top) + box.height() + box.offset().top >= innerBox.outerHeight();
			
			resultList.append( listItem );
			
			if ( atBottom ) {
				box.attr( {'scrollTop': box.attr( 'scrollHeight' )} );
			}
		}
		
		var currentBatchLimit = Math.min( targetOffset + batchSize, targets.length );
		var currentBatchStart = targetOffset;
		
		if ( targetOffset < targets.length ) {
			listItem.text( listItem.text() + '...' );
			
			targetOffset = currentBatchLimit;
			
			$.getJSON(
				wgScriptPath + '/api.php',
				{
					'action': 'push',
					'format': 'json',
					'page': pageName,
					'targets': targets.slice( currentBatchStart, currentBatchLimit ).join( '|' )
				},
				function( data ) {
					if ( data.error ) {
						handleError( listItem, pageName, data.error );
					}
					else {
						startPush( pageName, targetOffset, listItem );
					}
				}
			);			
		}
		else {
			listItem.text( mediaWiki.msg( 'push-special-item-completed', pageName ) );
			listItem.css( 'color', 'darkgray' );
			initiateNextPush();				
		}
	}
	
	function showCompletion() {
		resultList.append( $( '<li />' ).append( $( '<b />' ).text( mediaWiki.msg( 'push-special-push-done' ) ) ) );
	}
	
	function handleError( listItem, pageName, error ) {
		listItem.text( mediaWiki.msg( 'push-special-item-failed', pageName, error.info ) );
		listItem.css( 'color', 'darkred' );
		initiateNextPush();	
	}
	
} ); })(jQuery);