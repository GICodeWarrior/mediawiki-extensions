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
			words.push( $(v).text() );
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
		$.getJSON(
			'https://www.googleapis.com/language/translate/v2?callback=?',
			{
				'key': window.wgGoogleApiKey,
				'format': 'html',
				'q': '',//$( '#bodyContent' ).text(),
				'source': sourceLang,
				'target': targetLang,
			},
			function( response ) {
				if ( response.data ) {
					for ( i in response.data.translations ) {
						// TODO
						//alert( response.data.translations[i].translatedText );
					}					
				}
				else {
					if ( response.error ) {
						alert( response.error.message ); // TODO: i18n
					}
					else {
						// TODO: unknown error
					}
				}
				
				currentLang = targetLang;
				
				$( '#livetranslatebutton' ).attr( "disabled", false );
			}
		);		
	}
	
} ); })(jQuery);