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
	
	// This is to enable a hack to decode quotes.
	var textAreaElement = document.createElement( 'textarea' );
	
	// For the "show original" feature.
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
	
	/**
	 * Queries the special words in the source language, finds them in the page,
	 * and wraps the into notranslate spans. Then initiates the translation process. 
	 */
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
	
	/**
	 * Initiates the translation process.
	 * First all special words are found and send to the local API,
	 * and then replaced by their translation in the response. Then
	 * the Google Translate translation is initiated.
	 */
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
	
	/**
	 * Shows the original page content, simply by setting the html to a stored copy of the original.
	 * Also re-binds the jQuery events, as they get lost when doing the html replace.
	 */
	showOriginal = function() {
		currentLang = window.sourceLang;
		$( '#bodyContent' ).html( originalHtml );
		$( '#livetranslatebutton' ).attr( "disabled", false ).text( mediaWiki.msg( 'livetranslate-button-translate' ) );		
		$( '#livetranslatebutton' ).click( setupTranslationFeatures );	
		$( '#ltrevertbutton' ).click( showOriginal );	
	}
	
	// Initial binding of the button click events.
	$( '#livetranslatebutton' ).click( setupTranslationFeatures );	
	$( '#ltrevertbutton' ).click( showOriginal );	
	
	/**
	 * Inserts notranslate spans around the words specified in the passed array in the page content.
	 * 
	 * @param {Array} words
	 */
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
	
	/**
	 * Finds the special words in the page contents by getting the contents of all
	 * notranslate spans and pushing them onto an array.
	 * 
	 * @returns {Array}
	 */ 
	function getSpecialWords() {
		var words = [];
		
		$.each($( '.notranslate' ), function( i, v ) {
			if ( $(v).attr( 'id' ) != 'livetranslatespan' ) {
				words.push( $(v).text() );
			}
		});
		
		return words;
	}
	
	/**
	 * Replaced the special words in the page content by looping over them,
	 * and checking if there is a matching translation in the provided object.
	 * 
	 * @param {object} translations
	 */
	function replaceSpecialWords( translations ) {
		$.each($(".notranslate"), function(i,v) {
			var currentText = $(v).text();
			if ( translations[currentText] ) {
				$(v).text( translations[currentText] );
			}
		});		
	}
	
	/**
	 * Initiates the Google Translate translation.
	 * 
	 * @param {string} sourceLang
	 * @param {string} targetLang
	 */
	function requestGoogleTranslate( sourceLang, targetLang ) {
		translateElement( $( '#bodyContent' ), sourceLang, targetLang );
	}
	
	/**
	 * Translates a single DOM element using Google Translate.
	 * Loops through child elements and recursivly calls itself to translate these.
	 * 
	 * TODO: be smarter with the requests, and make sure they don't get broken up unecesarrily.
	 * 
	 * @param {jQuery} element
	 * @param {string} sourceLang
	 * @param {string} targetLang
	 */
	function translateElement( element, sourceLang, targetLang ) {
		runningJobs++;
		
		var maxChunkLength = 500;
		
		element.contents().each( function() {
			// If it's a text node, then translate it.
			if ( this.nodeType == 3 && this.data != undefined && this.data.trim().length > 0 ) {
				runningJobs++;
				translateChunk(
					this.data.split( new RegExp( "(\\S.+?[.!?])(?=\\s+|$)", "gi" ) ),
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
	
	/**
	 * Determines a chunk to translate of an DOM elements contents and calls the Google Translate API.
	 * Then calls itself if there is any remaining word to be done.
	 * 
	 * @param {array} untranslatedScentances
	 * @param {array} chunks
	 * @param {integer} currentMaxSize
	 * @param {string} sourceLang
	 * @param {string} targetLang
	 * @param {jQuery} element
	 */
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

		var leadingSpace = chunk.substr( 0, 1 ) == ' ' ? ' ' : '';
		var tailingSpace = ( chunk.length > 1 && chunk.substr( chunk.length - 1, 1 ) == ' ' ) ? ' ' : '';
		
		google.language.translate(
			jQuery.trim( chunk ),
			sourceLang,
			targetLang,
			function(result) {
				if ( result.translation ) {
					chunks.push( leadingSpace + result.translation + tailingSpace );
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
	
	/**
	 * Should be called every time a DOM element has been translated.
	 * By use of the runningJobs var, completion of the translation process is detected,
	 * and further handled by this function.
	 * 
	 * @param {string} targetLang
	 */
	function handleTranslationCompletion( targetLang ) {
		if ( !--runningJobs ) {
			currentLang = targetLang;
			$( '#livetranslatebutton' ).attr( "disabled", false ).text( mediaWiki.msg( 'livetranslate-button-translate' ) );
			$( '#ltrevertbutton' ).css( 'display', 'inline' );
		}
	}
	
} ); })(jQuery);