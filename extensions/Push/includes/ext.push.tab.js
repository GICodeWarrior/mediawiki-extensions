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
		
		mediaWiki.msg = function() {
			message = window.wgPushMessages[arguments[0]];
			
			for ( var i = arguments.length - 1; i > 0; i-- ) {
				message = message.replace( '$' + i, arguments[i] );
			}
			
			return message;
		}
	}
	
	var pages;
	var imageRequestMade = false;
	var images = false;
	var imagePushRequests = [];
	
	$.each($(".push-button"), function(i,v) {
		getRemoteArticleInfo( $(v).attr( 'targetid' ), $(v).attr( 'pushtarget' ) );
	});	
	
	$('.push-button').click(function() {
		this.disabled = true;
		this.innerHTML = mediaWiki.msg( 'push-button-pushing' );
		
		var errorDiv = $( '#targeterrors' + $(this).attr( 'targetid' ) );
		errorDiv.fadeOut( 'fast' );			
		
		if ( $('#checkIncTemplates').attr('checked') ) {
			pages = window.wgPushTemplates;
			pages.unshift( $('#pageName').attr('value') );
		}
		else {
			pages = [$('#pageName').attr('value')];
		}
		
		initiatePush(
			this,
			pages,
			$(this).attr( 'pushtarget' ),
			$(this).attr( 'targetname' )
		);
		
		if ( $('#checkIncFiles').length != 0 && $('#checkIncFiles').attr('checked') && !imageRequestMade ) {
			getIncludedImages();
		}
	});
	
	$('#push-all-button').click(function() {
		this.disabled = true;
		this.innerHTML = mediaWiki.msg( 'push-button-pushing' );
		$.each($(".push-button"), function(i,v) {
			$(v).click();
		});
	});	
	
	$('#divIncTemplates').hover(
		function() {
			$('#txtTemplateList').fadeTo( 
				( $('#txtTemplateList').css( 'opacity' ) == 0 ? 'slow' : 'fast' ),
				1
			);
		},
		function() {
			$('#txtTemplateList').fadeTo( 'fast', 0.5 )
		}
	);
	
	function getRemoteArticleInfo( targetId, targetUrl ) {
		$.getJSON(
			targetUrl + '/api.php?callback=?',
			{
				'action': 'query',
				'format': 'json',
				'prop': 'revisions',
				'rvprop': 'timestamp|user|comment',
				'titles': $('#pageName').attr('value'),
			},
			function( data ) {
				if ( data.query ) {
					var infoDiv = $( '#targetinfo' + targetId );
					
					for ( first in data.query.pages ) break;
					
					if ( first == '-1' ) {
						$( '#targetlink' + targetId ).attr( {'class': 'new'} );
						var message = mediaWiki.msg( 'push-tab-not-created' );
					}
					else {
						var revision = data.query.pages[first].revisions[0];
						var dateTime = revision.timestamp.split( 'T' );

						var message = mediaWiki.msg(
							'push-tab-last-edit',
							revision.user,
							dateTime[0],
							dateTime[1].replace( 'Z', '' )
						);
					}
					
					infoDiv.css( 'color', 'darkgray' );
					infoDiv.text( message );
					infoDiv.fadeIn( 'slow' );
				}
			}
		);
	}
	
	function initiatePush( sender, pages, targetUrl, targetName ) {
		$.getJSON(
			wgScriptPath + '/api.php',
			{
				'action': 'push',
				'format': 'json',
				'page': pages.join( '|' ),
				'targets': targetUrl
			},
			function( data ) {
				if ( data.error ) {
					handleError( sender, targetUrl, data.error );
				}
				else if ( data.length > 0 && data[0].edit && data[0].edit.captcha ) {
					handleError( sender, targetUrl, { info: mediaWiki.msg( 'push-err-captacha', targetName ) } );
				}
				else {
					if ( $('#checkIncFiles').length != 0 && $('#checkIncFiles').attr('checked') ) {
						setButtonToImgPush( sender, targetUrl, targetName );
					}
					else {
						sender.innerHTML = mediaWiki.msg( 'push-button-completed' );
						setTimeout( function() {reEnableButton( sender, targetUrl, targetName );}, 1000 );
					}
				}
			}
		); 	
	}
	
	function setButtonToImgPush( button, targetUrl, targetName ) {
		button.innerHTML = mediaWiki.msg( 'push-button-pushing-files' );
		imagePushRequests.push( { 'sender': button, 'targetUrl': targetUrl, 'targetName': targetName } );
		startImagesPush();			
	}
	
	function getIncludedImages() {
		imageRequestMade = true;
		
		$.getJSON(
			wgScriptPath + '/api.php',
			{
				'action': 'query',
				'prop': 'images',
				'format': 'json',
				'titles': pages.join( '|' ), 
			},
			function( data ) {
				if ( data.query ) {
					images = [];
					
					for ( page in data.query.pages ) {
						for ( var i = data.query.pages[page].images.length - 1; i >= 0; i-- ) {
							if ( $.inArray( data.query.pages[page].images[i].title, images ) == -1 ) {
								images.push( data.query.pages[page].images[i].title );
							}
						}
					}
					
					startImagesPush();
				}
				else {
					// TODO
				}
			}
		);		
	}
	
	function startImagesPush() {
		if ( images !== false ) {
			var req;
			while ( req = imagePushRequests.pop() ) {
				initiateImagePush( req.sender, req.targetUrl, req.targetName );
			}			
		}
	}
	
	function initiateImagePush( sender, targetUrl, targetName ) {
		$.getJSON(
			wgScriptPath + '/api.php',
			{
				'action': 'pushimages',
				'format': 'json',
				'images': images.join( '|' ), 
				'targets': targetUrl
			},
			function( data ) {
				var fail = false;
				
				for ( i in data.upload ) {
					if ( data.error ) {
						handleError( sender, targetUrl, data.error );
						fail = true;
						break;
					}
					else if ( !data.upload ) {
						handleError( sender, targetUrl, { info: 'Unknown error' } ); // TODO
						fail = true;
						break;
					}		
				}
				
				if ( !fail ) {
					sender.innerHTML = mediaWiki.msg( 'push-button-completed' );
					setTimeout( function() {reEnableButton( sender, targetUrl, targetName );}, 1000 );
				}
			}
		);			
	}
	
	function reEnableButton( button, targetUrl, targetName ) {
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
		var errorDiv = $( '#targeterrors' + $(sender).attr( 'targetid' ) );

		errorDiv.text( error.info );
		errorDiv.fadeIn( 'slow' );			
		
		sender.innerHTML = mediaWiki.msg( 'push-button-failed' );	
		setTimeout( function() {reEnableButton( sender );}, 2500 );
	}
	
} ); })(jQuery);