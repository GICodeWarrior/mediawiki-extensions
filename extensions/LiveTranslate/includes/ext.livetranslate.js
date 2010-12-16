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
		var words = getSpecialWords();
		var newLang = $( '#livetranslatelang' ).val();
		
		$.getJSON(
			wgScriptPath + '/api.php',
			{
				'action': 'livetranslate',
				'format': 'json',
				'from': currentLang,
				'to': $( '#livetranslatelang' ).val(),
				'words': words.join( '|' ),
			},
			function( data ) {
				if ( data.translations ) {
					currentLang = newLang;
					replaceSpecialWords( data.translations );
				}
			}
		);
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
	
} ); })(jQuery);