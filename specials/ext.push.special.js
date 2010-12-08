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
		
		mediaWiki.msg = function( message ) {
			return window.wgPushMessages[message];
		}
	}

	var resultList = $('#pushResultList');
	
	var targets = window.wgPushTargets;
	var pages = window.wgPushPages;
	var revs = window.wgPushRevs;
	var requestAmount = Math.min( pages.length, window.wgPushWorkerCount );
	
	var pageTargets = [];
	
	for ( i = requestAmount; i > 0; i-- ) {
		initiateNextPush();
	}
	
	function initiateNextPush() {
		var page = pages.pop();
		
		if ( page ) {
			startPush( page );
		}
		else if ( !--requestAmount ) {
			showCompletion();
		}
	}
	
	function startPush( pageName ) {
		var listItem = $( '<li />' );
		listItem.text( pageName );
		
		resultList.append( listItem );
		$('#pushResultDiv').attr( {'scrollTop': $('#pushResultDiv').attr( 'scrollHeight' )} );
		
		getLocalArtcileAndContinue( listItem, pageName );
	}
	
	function showCompletion() {
		resultList.append( $( '<li />' ).append( $( '<b />' ).text( mediaWiki.msg( 'push-special-push-done' ) ) ) );
	}
	
	function getLocalArtcileAndContinue( listItem, pageName ) {
		listItem.text( msgReplace( 'push-special-item-getting', pageName ) );
		
		$.getJSON(
			wgScriptPath + '/api.php',
			{
				'action': 'query',
				'format': 'json',
				'prop': 'revisions',
				'rvprop': 'timestamp|user|comment|content',
				'titles': pageName,
				'rvstartid': revs[pageName],
				'rvendid': revs[pageName],				
			},
			function( data ) {
				if ( data.error ) {
					handleError( listItem, pageName, data.error );
				}
				else {
					for (first in data.query.pages) break;
					var remainingTargets = [];
					for (targetName in targets) remainingTargets.push( targetName );
					initiateEdit( listItem, pageName, data.query.pages[first], remainingTargets );
				}
			}
		); 		
	}
	
	function initiateEdit( listItem, pageName, page, remainingTargets ) {
		targetName = remainingTargets.pop();
		
		if ( targetName ) {
			getEditTokenAndContinue( listItem, pageName, targets[targetName], targetName, page, remainingTargets );
		}
		else {
			listItem.text( msgReplace( 'push-special-item-completed', pageName ) );
			listItem.css( 'color', 'darkgray' );
			initiateNextPush();			
		}
	}
	
	function getEditTokenAndContinue( listItem, pageName, targetUrl, targetName, page, remainingTargets ) {
		listItem.text( msgReplace( 'push-special-item-pushing-to', pageName, targetName ) );
		
		$.getJSON(
			targetUrl + '/api.php',
			{
				'action': 'query',
				'format': 'json',
				'intoken': 'edit',
				'prop': 'info',
				'titles': page.title,
			},
			function( data ) {
				if ( data.error ) {
					handleError( listItem, pageName, data.error );
				}
				else {
					for (first in data.query.pages) break;
					doPush( listItem, pageName, targetUrl, page, data.query.pages[first].edittoken, remainingTargets );
				}
			}
		); 
	}	
	
	function doPush( listItem, pageName, targetUrl, page, token, remainingTargets ) {
		var summary = msgReplace(
			'push-import-revision-message',
			$('#siteName').attr('value'),
			page.revisions[0].user,
			page.revisions[0].comment ? msgReplace( 'push-import-revision-comment', page.revisions[0].comment ) : ''
		);
		
		$.post( 
			targetUrl + '/api.php',
			{
				'action': 'edit',
				'format': 'json',
				'token': token,
				'title': page.title,
				'summary': summary,
				'text': page.revisions[0].*
			},
			function( data ) {
				if ( data.error ) {
					handleError( listItem, pageName, data.error );
				}
				else {
					initiateEdit( listItem, pageName, page, remainingTargets );
				}
			}
		);	
	}
	
	function handleError( listItem, pageName, error ) {
		listItem.text( msgReplace( 'push-special-item-failed', pageName, error.info ) );
		initiateNextPush();	
	}
	
	function msgReplace() {
		message = mediaWiki.msg( arguments[0] );
		for ( var i = arguments.length - 1; i > 0; i-- ) {
			message = message.replace( '$' + i, arguments[i] );
		}
		return message;
	}
	
} ); })(jQuery);