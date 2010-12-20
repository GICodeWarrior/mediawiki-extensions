/**
 * JavasSript for the Live Translate extension.
 * @see http://www.mediawiki.org/wiki/Extension:Live_Translate
 * 
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function($) { $( document ).ready( function() {
	
	var currentLang = 'en'; // TODO
	
	// Compatibility with pre-RL code.
	// Messages will have been loaded into wgPushMessages.
	if ( typeof mediaWiki === 'undefined' ) {
		mediaWiki = new Object();
		
		mediaWiki.msg = function() {
			message = window.wgLTEMessages[arguments[0]];
			
			for ( var i = arguments.length - 1; i > 0; i-- ) {
				message = message.replace( '$' + i, arguments[i] );
			}
			
			return message;
		}
	}
	
	$('#livetranslatebutton').click(function() {
		$( this ).attr( "disabled", true );		
		
		var words = getSpecialWords();
		var newLang = $( '#livetranslatelang' ).val();
		
		if ( words.length == 0 ) {
			requestGoogleTranslate( currentLang, newLang );
		}
		else {
			$.getJSON(
				wgScriptPath + '/api.php',
				{
					'action': 'livetranslate',
					'format': 'json',
					'from': currentLang,
					'to': newLang,
					'words': words.join( '|' ),
				},
				function( data ) {
					if ( data.translations ) {
						replaceSpecialWords( data.translations );
						requestGoogleTranslate( currentLang, newLang );
					}
				}
			);			
		}

	});
	
	function getSpecialWords() {
		var words = [];
		
		$.each($( '.notranslate' ), function( i, v ) {
			if ( $(v).attr( 'id' ) != 'livetranslatespan' ) {
				words.push( $(v).text() );
			}
		});
		
		return words;
	}
	
	function replaceSpecialWords( translations ) {
		$.each($(".notranslate"), function(i,v) {
			var currentText = $(v).text();
			if ( translations[currentText] ) {
				$(v).text( translations[currentText] );
			}
		});		
	}
	
	function requestGoogleTranslate( sourceLang, targetLang ) {
		translateElement( $( '#bodyContent' ), sourceLang, targetLang );
	}
	
	function translateElement( element, sourceLang, targetLang ) {
		if ( element.children().length == 0 ) {
			
		}
		else {
			element.children().each( function() {
				if ( $.inArray( $( this ).attr( 'id' ), [ 'livetranslatediv', 'siteSub', 'jump-to-nav' ] ) == -1
					&& $.inArray( $( this ).attr( 'class' ), [ 'notranslate', 'printfooter' ] ) == -1
					&& $( this ).text().trim().length > 0 ) {
					translateChunk( $( this ).text(), [], 500, sourceLang, targetLang, $( this ) );
				}
			} );
		}
	}
	
	function translateChunk( untranslatedText, chunks, currentMaxSize, sourceLang, targetLang, element ) {
		var chunkSize = Math.min( untranslatedText.length, currentMaxSize );
		
		google.language.translate(
			untranslatedText.substr( 0, chunkSize ),
			sourceLang,
			targetLang,
			function(result) {
				if ( result.error ) {
					if ( result.error.code == '400' ) {
						translateChunk( untranslatedText, chunks, Math.ceil( currentMaxSize / 2 ), sourceLang, targetLang, element );
					}
				}
				else {
					chunks.push( result.translation );
					
					if ( chunkSize < currentMaxSize ) {
						element.text( chunks.join() ); // TODO: set actual content
					}
					else {
						translateChunk( untranslatedText.substr( chunkSize ), chunks, currentMaxSize, sourceLang, targetLang, element );
					}
				}
			}
		);	
	}
	
	function handleTranslationCompletion( translation, targetLang ) {
		alert(translation);
		//$( '#bodyContent' ).innerHTML = result.translation;
		
		currentLang = targetLang;
		
		$( '#livetranslatebutton' ).attr( "disabled", false );		
	}
	
} ); })(jQuery);