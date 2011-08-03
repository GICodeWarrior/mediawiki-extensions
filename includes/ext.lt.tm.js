/**
 * JavasSript for the Live Translate extension.
 * @see http://www.mediawiki.org/wiki/Extension:Live_Translate
 * 
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw <jeroendedauw at gmail dot com>
 */

window.liveTranslate = new Object();

( function( mw, lt ) {
	
	lt.memory = function( options ) {
		var _this = this;
		
		this.translations = false;
	};
	
	lt.memory.prototype = {
			
		canUseLocalStorage: function() {
			try {
				return 'localStorage' in window && window['localStorage'] !== null;
			} catch ( e ) {
				return false;
			}
		}
	
		hasLocalStorage: function() {
			if ( !_this.canUseLocalStorage() ) {
				return false;
			}
			
			var memory = localStorage.getItem( 'lt_memory' );
			debugger;
			return memory;
		}
		
		getMemoryHashes: function( callback ) {
			$.getJSON(
				wgScriptPath + '/api.php',
				{
					'action': 'translationmemories',
					'format': 'json',
					'props': 'version_hash'
				},
				function( data ) {
					if ( data.memories ) {
						callback( data.memories );
					}
					else {
						// TODO
					}
				}
			);		
		}
		
		localStorageIsValid: function() {
			if ( !_this.hasLocalStorage() ) {
				return false;
			}
			
			_this.getMemoryHashes();
		}
		
		obtainTranslationsFromServer: function() {
			var requestArgs = {
				'action': 'query',
				'format': 'json',
				'list': 'livetranslate',
				'ltlanguage': currentLang
			};
			
			if ( offset > 0 ) {
				requestArgs['ltcontinue'] = offset;
			}
			
			$.getJSON(
				wgScriptPath + '/api.php',
				requestArgs,
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
					
					if ( data['query-continue'] ) {
						obtainAndInsertTranslations( data['query-continue'].livetranslate.ltcontinue );
					}
					else {
						initiateTranslating();
					}
				}
			);
		}
		
		obtainTranslationsFromLS: function() {
			return JSON.parse( localStorage.getItem( 'lt_memory' ) );
		}
		
		writeTranslationsToLS: function() {
			localStorage.setItem( 'lt_memory', JSON.stringify( _this.translations ) )
		}
		
		getTranslations: function() {
			if ( _this.translations === false ) {
				if ( _this.canUseLocalStorage() && _this.localStorageIsValid() ) {
					_this.translations = _this.obtainTranslationsFromLS();
				}
				else {
					_this.translations = _this.obtainTranslationsFromServer();
					
					if ( _this.canUseLocalStorage() ) {
						_this.writeTranslationsToLS();
					}
				}				
			}
			
			return _this.translations;
		}
	
	};
	
}) ( window.mediaWiki, window.liveTranslate );
