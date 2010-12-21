/**
 * JavasSript for the Live Translate extension.
 * @see http://www.mediawiki.org/wiki/Extension:Live_Translate
 * 
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function($) { $( document ).ready( function() {
	
	var currentLang = window.sourceLang;
	
	var runningJobs = 0;
	
	var textAreaElement = document.createElement( 'textarea' );
	
	var originalHtml = false;
	
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
	
	initiateTranslating = function() {
		if ( originalHtml === false ) {
			originalHtml = $( '#bodyContent' ).html();
		}		
		
		$( this ).attr( "disabled", true ).text( mediaWiki.msg( 'livetranslate-button-translating' ) );		
		
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
					}
					requestGoogleTranslate( currentLang, newLang );
				}
			);			
		}
	}
	
	showOriginal = function() {
		currentLang = window.sourceLang;
		$( '#bodyContent' ).html( originalHtml );
		$('#livetranslatebutton').click( initiateTranslating );	
		$('#ltrevertbutton').click( showOriginal );	
	}	
	
	$('#livetranslatebutton').click( initiateTranslating );	
	$('#ltrevertbutton').click( showOriginal );	
	
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
		runningJobs++;
		
		element.contents().each( function() {
			// If it's a text node, then translate it.
			if ( this.nodeType == 3 && this.wholeText.trim().length > 0 ) {
				runningJobs++;
				// Initiate translation of the text node. Max chunk size is 500 - 2 for the anti-trim delimiters.
				translateChunk( this.wholeText, [], 498, sourceLang, targetLang, this );
			}
			// If it's an html element, check to see if it should be ignored, and if not, apply function again.
			else if ( $.inArray( $( this ).attr( 'id' ), [ 'livetranslatediv', 'siteSub', 'jump-to-nav' ] ) == -1
				&& $.inArray( $( this ).attr( 'class' ), [ 'notranslate', 'printfooter' ] ) == -1
				&& $( this ).text().trim().length > 0 ) {
				translateElement( $( this ), sourceLang, targetLang );
			}
		} );
		
		handleTranslationCompletion( targetLang );
	}
	
	function translateChunk( untranslatedText, chunks, currentMaxSize, sourceLang, targetLang, element ) {
		var chunkSize = Math.min( untranslatedText.length, currentMaxSize );
		
		google.language.translate(
			// Surround the text stuff so spaces and newlines don't get trimmed away.
			'|' + untranslatedText.substr( 0, chunkSize ) + '|',
			sourceLang,
			targetLang,
			function(result) {
				if ( result.translation && result.translation.length >= 2 ) {
					// Remove the trim-preventing stuff and add the result to the chunks array.
					chunks.push( result.translation.substr( 1, result.translation.length -2 ) );
				}
				else {
					// If the translation failed, keep the original text.
					chunks.push( untranslatedText.substr( 0, chunkSize ) );
				}
				
				if ( chunkSize < currentMaxSize ) {
					// If the current chunk was smaller then the max size, node translation is complete, so update text.
					textAreaElement.innerHTML = chunks.join(); // This is a hack to decode quotes.
					element.replaceData( 0, element.length, textAreaElement.value );
					handleTranslationCompletion( targetLang );
				}
				else {
					// If there is more work to do, move on to the next chunk.
					translateChunk( untranslatedText.substr( chunkSize ), chunks, currentMaxSize, sourceLang, targetLang, element );
				}
			}
		);	
	}
	
	function handleTranslationCompletion( targetLang ) {
		if ( !--runningJobs ) {
			currentLang = targetLang;
			$( '#livetranslatebutton' ).attr( "disabled", false ).text( mediaWiki.msg( 'livetranslate-button-translate' ) );
			$('#ltrevertbutton').css( 'display', 'inline' );
		}
	}
	
} ); })(jQuery);