/**
 * JavasSript for the IncludeWP  extension.
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
			message = window.wgIncWPMessages[arguments[0]];
			
			for ( var i = arguments.length - 1; i > 0; i-- ) {
				message = message.replace( '$' + i, arguments[i] );
			}
			
			return message;
		}
	}
	
	var pages = {};
	
	$.each($(".includewp-loading"), function(i,v) {
		loadPage( $(v) );
	});		
	
	function loadPage( sender ) {
		$.getJSON(
			sender.attr( 'wiki' ) + '/api.php?callback=?',
			{
				'action': 'query',
				'format': 'json',
				'prop': 'revisions',
				'rvprop':'timestamp|content',
				'titles': sender.attr( 'page' ),
				'redirects': 1
			},
			function( data ) {
				if ( data.query ) {
					for ( pageWikiID in data.query.pages ) {
						getPlaintext( sender, data.query.pages[pageWikiID].revisions[0]["*"] );
						break;
					}
				}
				else {
					sender.html( '<b>' + mediaWiki.msg( 'includewp-loading-failed' ) + '</b>' );
				}
			}
		);		
	}
	
	function getPlaintext( sender, rawWikiText ) {
		var pageId = sender.attr( 'pageid' );
		var pageName = sender.attr( 'page' );
		
		$.post(
			wgScriptPath + '/api.php',
			{
				'action': 'includewp',
				'format': 'json',
				'text': rawWikiText,
				'pagename': pageName
			},
			function( data ) {
				var plainText = data.shift();
				if ( plainText ) {
					sender.slideUp( 'slow' );
					pages[pageName] = plainText;
					showPageFragment( pageName, pageId );
					showCopyright( pageName, pageId );
				}
				else {
					sender.html( '<b>' + mediaWiki.msg( 'includewp-loading-failed' ) + '</b>' );
				}
			},
			'json'
		);
	}
	
	function showPageFragment( pageName, pageId ) {
		var paragraphEnd = pages[pageName].search( '</p>' );
		$( '#includewp-article-' + pageId )
			.html( pages[pageName].substr( 0, paragraphEnd ) + '</p>' )
			.append( $( '<a />' ).text( mediaWiki.msg( 'includewp-show-full-page' ) ).addClass( 'incwp-more' ).attr( 'href', '#' ).click( function() { showFullPage( pageName, pageId ) } ) );
	} 

	function showFullPage( pageName, pageId ) {
		$( '#includewp-article-' + pageId ).html( pages[pageName] );
	}
	
	function showCopyright( pageName, pageId ) {
		var licenceHtml = mediaWiki.msg( // TODO: make non WP-specific
				'includewp-licence-notice',
				'Wikipedia',
				'http://en.wikipedia.org/wiki/' + pageName,
				pageName,
				'http://creativecommons.org/licenses/by-sa/3.0/',
				'CC-BY-SA',
				'http://en.wikipedia.org/wiki/' + pageName + '?action=history'
		);
		
		$( '#includewp-copyright-' + pageId ).html( licenceHtml );
	}
	
} ); })(jQuery);