/**
 * JavasSript for the Live Translate extension.
 * @see http://www.mediawiki.org/wiki/Extension:Live_Translate
 * 
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

(function($) { $( document ).ready( function() {

	/*
	 * jQuery replaceText - v1.1 - 11/21/2009
	 * http://benalman.com/projects/jquery-replacetext-plugin/
	 * 
	 * Copyright (c) 2009 "Cowboy" Ben Alman
	 * Dual licensed under the MIT and GPL licenses.
	 * http://benalman.com/about/license/
	 */
	$.fn.replaceText=function(b,a,c){return this.each(function(){var f=this.firstChild,g,e,d=[];if(f){do{if(f.nodeType===3){g=f.nodeValue;e=g.replace(b,a);if(e!==g){if(!c&&/</.test(e)){$(f).before(e);d.push(f)}else{f.nodeValue=e}}}}while(f=f.nextSibling)}d.length&&$(d).remove()})}
	
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
	
	setupTranslationFeatures = function() {
		$( this ).attr( "disabled", true ).text( mediaWiki.msg( 'livetranslate-button-translating' ) );
		
		if ( originalHtml === false ) {
			$.getJSON(
				wgScriptPath + '/api.php',
				{
					'action': 'query',
					'format': 'json',
					'list': 'livetranslate',
					'ltlanguage': currentLang,
				},
				function( data ) {
					if ( data.words ) {
						insertNoTranslateTags( data.words );						
					}
					else if ( data.error && data.error.info ) {
						alert( data.error.info );
					}
					else {
						for ( i in data ) {
							alert( mediaWiki.msg( 'livetranslate-dictionary-error' ) );
							break;
						}
					}
					
					originalHtml = $( '#bodyContent' ).html();
					
					initiateTranslating();					
				}
			);			
		}
		else {
			initiateTranslating();
		}
	}
	
	function initiateTranslating() {
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
		$( '#livetranslatebutton' ).attr( "disabled", false ).text( mediaWiki.msg( 'livetranslate-button-translate' ) );		
		$( '#livetranslatebutton' ).click( setupTranslationFeatures );	
		$( '#ltrevertbutton' ).click( showOriginal );	
	}
	
	$( '#livetranslatebutton' ).click( setupTranslationFeatures );	
	$( '#ltrevertbutton' ).click( showOriginal );	
	
	function insertNoTranslateTags( words ) {
		for ( i in words ) {
			$( '#bodyContent *' ).replaceText( 
				new RegExp( "\\b" + words[i] + "\\b", "g" ),
				function( str ) {
					return '<span class="notranslate">' + str + '</span>'
				}
			);
		}
	}
	
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
		
		// Max chunk size is 500 - 2 for the anti-trim delimiters.
		var maxChunkLength = 498;
		
		element.contents().each( function() {
			// If it's a text node, then translate it.
			if ( this.nodeType == 3 && this.wholeText.trim().length > 0 ) {
				runningJobs++;
				translateChunk(
					this.wholeText.split( new RegExp( "(\\S.+?[.!?])(?=\\s+|$)", "gi" ) ),
					[],
					maxChunkLength,
					sourceLang,
					targetLang,
					this
				);
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
	
	function translateChunk( untranslatedScentances, chunks, currentMaxSize, sourceLang, targetLang, element ) {
		var remainingPart = false;
		var partToUse = false;
		var scentanceCount = 0;
		var currentLength = 0;
		
		for ( i in untranslatedScentances ) {
			scentanceCount++;
			
			if ( currentLength + untranslatedScentances[i].length < currentMaxSize ) {
				currentLength += untranslatedScentances[i].length;
			}
			else if ( untranslatedScentances[i].length > 0 ) {
				if ( currentLength == 0 ) {
					partToUse = untranslatedScentances[i].substr( 0, currentMaxSize - currentLength );
					remainingPart = untranslatedScentances[i].substr( currentMaxSize - currentLength );
				}
				
				break;
			}
		}
		
		var chunk = '';
		
		for ( i = 0; i < scentanceCount; i++ ) {
			var part = untranslatedScentances.shift();
			
			if ( i != scentanceCount - 1 || partToUse === false ) {
				chunk += part; 
			}
		}
		
		if ( remainingPart !== false ) {
			untranslatedScentances.unshift( remainingPart );
		}
		
		if ( partToUse !== false ) {
			chunk += partToUse;
		}
		
		if ( chunk.length == 0 ) {
			handleTranslationCompletion( targetLang );
			return;
		}
alert(chunk);
		google.language.translate(
			// Surround the text stuff so spaces and newlines don't get trimmed away.
			'|' + chunk + '|',
			sourceLang,
			targetLang,
			function(result) {
				if ( result.translation && result.translation.length >= 2 ) {
					// Remove the trim-preventing stuff and add the result to the chunks array.
					chunks.push( result.translation.substr( 1, result.translation.length -2 ) );
				}
				else {
					// If the translation failed, keep the original text.
					chunks.push( chunk );
				}
				
				if ( untranslatedScentances.length == 0 ) {
					// If the current chunk was smaller then the max size, node translation is complete, so update text.
					textAreaElement.innerHTML = chunks.join(); // This is a hack to decode quotes.
					element.replaceData( 0, element.length, textAreaElement.value );
					handleTranslationCompletion( targetLang );
				}
				else {
					// If there is more work to do, move on to the next chunk.
					translateChunk( untranslatedScentances, chunks, currentMaxSize, sourceLang, targetLang, element );
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