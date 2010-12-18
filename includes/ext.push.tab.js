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
			var isHidden = $('#txtTemplateList').css( 'opacity' ) == 0;
			
			if ( isHidden ) {
				$('#txtTemplateList').css( 'display', 'inline' );
			}
			
			$('#txtTemplateList').fadeTo( 
				isHidden? 'slow' : 'fast',
				1
			);
		},
		function() {
			$('#txtTemplateList').fadeTo( 'fast', 0.5 )
		}
	);
	
	$('#divIncTemplates').click(function() {
		setIncludeFilesText();
	});
	
	$('#divIncFiles').hover(
		function() {
			var isHidden = $('#txtFileList').css( 'opacity' ) == 0;
			
			if ( isHidden ) {
				$('#txtFileList').css( 'display', 'inline' );
				setIncludeFilesText();
			}
			
			$('#txtFileList').fadeTo( 
					isHidden ? 'slow' : 'fast',
				1
			);
		},
		function() {
			$('#txtFileList').fadeTo( 'fast', 0.5 )
		}
	);	
	
	function setIncludeFilesText() {
		if ( $('#checkIncFiles').length != 0 ) {
			var files = window.wgPushPageFiles;

			if ( $('#checkIncTemplates').attr('checked') ) {
				files = files.concat( window.wgPushTemplateFiles );
			} 

			$('#txtFileList').text(
				files.length > 0 ? 
					mediaWiki.msg( 'push-tab-embedded-files', files.join( ', ' ) ) // TODO: i18n 
					: mediaWiki.msg( 'push-tab-no-embedded-files' )
			);			
		}
	}
	
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
						$( '#targetlink' + targetId ).attr( {'class': ''} );
						
						var revision = data.query.pages[first].revisions[0];
						var dateTime = revision.timestamp.split( 'T' );

						var message = mediaWiki.msg(
							'push-tab-last-edit',
							revision.user,
							dateTime[0],
							dateTime[1].replace( 'Z', '' )
						);
					}
					
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
		initiateImagePush( button, targetUrl, targetName );
	}
	
	function initiateImagePush( sender, targetUrl, targetName ) {
		var images = window.wgPushPageFiles.concat( window.wgPushTemplateFiles );
		
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
				
				for ( i in data ) {
					if ( data[i].error ) {
						handleError( sender, targetUrl, { info: mediaWiki.msg( 'push-tab-err-filepush', data[i].error.info ) } );
						fail = true;
						break;
					}
					else if ( !data[i].upload ) {
						handleError( sender, targetUrl, { info: mediaWiki.msg( 'push-tab-err-filepush-unknown' ) } );
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
		
		getRemoteArticleInfo( $(button).attr( 'targetid' ), $(button).attr( 'pushtarget' ) );
		
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