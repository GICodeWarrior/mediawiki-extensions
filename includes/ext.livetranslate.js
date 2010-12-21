/**
 * JavasSript for the Live Translate extension.
 * @see http://www.mediawiki.org/wiki/Extension:Live_Translate
 * 
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function($) { $( document ).ready( function() {
	
	var currentLang = 'en'; // TODO
	
	var runningJobs = 0;
	
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
		runningJobs++;
		
		element.contents().each( function() {
			// If it's a text node, then translate it.
			if ( this.nodeType == 3 && this.wholeText.trim().length > 0 ) {
				runningJobs++;
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
				if ( result.translation.length >= 2 ) {
					// Remove the trim-preventing stuff and add the result to the chunks array.
					chunks.push( result.translation.substr( 1, result.translation.length -2 ) );
				}
				
				if ( chunkSize < currentMaxSize ) {
					element.replaceWholeText( chunks.join() );
					handleTranslationCompletion( targetLang );
				}
				else {
					translateChunk( untranslatedText.substr( chunkSize ), chunks, currentMaxSize, sourceLang, targetLang, element );
				}
			}
		);	
	}
	
	function handleTranslationCompletion( targetLang ) {
		if ( !--runningJobs ) {
			currentLang = targetLang;
			$( '#livetranslatebutton' ).attr( "disabled", false );				
		}
	}
	
} ); })(jQuery);