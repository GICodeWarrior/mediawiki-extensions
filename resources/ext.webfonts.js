( function( $ ) { 

	function fontID( font ) {
		if ( typeof font !== 'string' ) {
			return font;
		}
		return 'webfont-' + font.toLowerCase().replace(/[_ ]/g, '-' ).replace(/[^-a-z]/g, '' );
	}

	mw.webfonts = {

		oldconfig: false,
		config: { fonts: {}, languages: {} },
		version: '0.1.2',
		fonts : [],
		set: function( font ) {
			if ( !font || font === 'none' ) {
				mw.webfonts.reset();
				return;
			}

			if ( !( font in mw.webfonts.config.fonts ) ) {
				mw.log( 'Requested unknown font', font );
				return;
			}
			var config = mw.webfonts.config.fonts[font];

			// Load the style sheet for the font
			mw.webfonts.addFont( font );
			
			// Save the current font and its size. Used for reset.
			if ( !mw.webfonts.oldconfig ) {
				var $body = $( 'body' );
				mw.webfonts.oldconfig = {
					fontFamily: $body.css( 'font-family' ),
					fontSize: $body.css( 'font-size' )
				};
			}

			// Set the font, fallback fonts.Need to change the fonts of Input Select and Textarea explicitly.
			$( 'body, input, select, textarea' ).css( 'font-family', '"' + font + '", Helvetica, Arial, sans-serif' );

			if ( 'normalization' in config ) {
				$( document ).ready( function() {
					mw.webfonts.normalize( config.normalization );
				} );
			}
			// Store the font choise in cookie
			$.cookie( 'webfonts-font', font, { 'path': '/', 'expires': 30 } );

			// If we had reset the fonts for tags with lang attribute, apply the fonts again.
			mw.webfonts.loadFontsForLangAttr();
		},

		/**
		 * Reset the font with old configuration
		 */
		reset: function() {
			$( 'body' ).css( {
				fontFamily: mw.webfonts.oldconfig.fontFamily,
				fontSize: mw.webfonts.oldconfig.fontSize
			});
			// We need to reset the font family of Input and Select explicitly.
			$( 'input, select' ).css( 'font-family', mw.webfonts.oldconfig.fontFamily );

			// Reset the fonts applied for tags with lang attribute.
			$( '.webfonts-lang-attr' ).css( 'font-family', '' ).removeClass( 'webfonts-lang-attr' );

			// Remove the cookie
			$.cookie( 'webfonts-font', 'none', { 'path': '/', 'expires': 30 } );
		},

		/**
		 * Does a find replace of string on the page.
		 * @param normalization_rules hashmap of replacement rules.
		 */
		normalize: function( normalizationRules ) {
			$.each( normalizationRules, function( search, replace ) {
				var searchPattern = new RegExp( search, 'g' );
				return $( '*' ).each( function() {
					var node = this.firstChild,
						 val, newVal;
					if ( node ) {
						do {
							if ( node.nodeType === 3 ) {
								val = node.nodeValue;
								newVal = val.replace( searchPattern, replace );
								if ( newVal !== val ) {
									node.nodeValue = newVal;
								}
							}
						} while ( node = node.nextSibling );
					}
				} );
			} );
		},

		/**
		 * Construct the CSS required for the font-family, inject it to the head of the body
		 * so that it gets loaded.
		 * @param fontFamily The font-family name
		 */
		loadCSS: function( fontFamily ) {
			var fontconfig = mw.webfonts.config.fonts[fontFamily];
			var base = mw.config.get( 'wgExtensionAssetsPath' ) + '/WebFonts/fonts/';
			var fontFormats = [];
			var version = "0.0";
			if ( 'version' in fontconfig ) {
				version = fontconfig.version;
			}
			var versionSuffix = "?version=" + version + '&20111213';
			var styleString =
				"<style type='text/css'>\n@font-face {\n"
				+ "\tfont-family: '"+fontFamily+"';\n";

			if ( 'eot' in fontconfig ) {
				styleString += "\tsrc: url('" + base+ fontconfig.eot + versionSuffix+ "');\n";
			}

			styleString += "\tsrc: ";
			 // If the font is present locally, use it.
			var ua = navigator.userAgent;
			if( ua.match( /Android 2\.3/ ) == null ) {
				// Android 2.3.x does not respect local() syntax.  
				// http://code.google.com/p/android/issues/detail?id=10609
				styleString += "local('"+fontFamily+"'),";
			}
			
			if ( 'woff' in fontconfig ) {
				fontFormats.push( "\t\turl('" + base + fontconfig.woff + versionSuffix + "') format('woff')" );
			}

			if ( 'svg' in fontconfig ) {
				fontFormats.push( "\t\turl('" + base + fontconfig.svg + versionSuffix + "#" + fontFamily + "') format('svg')" );
			}

			if ( 'ttf' in fontconfig ) {
				fontFormats.push( "\t\turl('" + base + fontconfig.ttf + versionSuffix + "') format('truetype')" );
			}
			
			styleString += fontFormats.join() + ";\n";
			styleString += "\tfont-weight: normal;\n}\n</style>\n";

			//inject the css to the head of the page.
			$( styleString ).appendTo( 'head' );
		},
		
		/**
		 * Add a font to the page.
		 * This method ensures that css are not duplicated and
		 * keep track of added fonts.
		 * @param fontFamilyName {String} The font-family name
		 */
		addFont: function( fontFamilyName ) {
			// Avoid duplicate loading
			if ( $.inArray( fontFamilyName, mw.webfonts.fonts ) === -1 ) {
				// Check whether the requested font is available.
				if ( fontFamilyName in mw.webfonts.config.fonts ) {
					mw.webfonts.loadCSS( fontFamilyName );
					mw.webfonts.fonts.push( fontFamilyName );
				}
			}
		},
		
		/**
		 * Setup the font selection menu.
		 * It also apply the font from cookie, if any.
		 */
		setup: function() {
			// Blacklist some browsers that are known to have issues with font rendering
			if ( navigator.appName === 'Microsoft Internet Explorer' ) {
				var ua = navigator.userAgent;
				if ( /MSIE 6/i.test( ua ) ) {
					// IE6 has not font fallbacks
					return;
				} else if ( /MSIE 8/i.test( ua ) && /Windows NT 5.1/i.test( ua ) ) {
					// IE8 on XP has occasional gibberish bug
					return;
				}
			}
			
			var config = [];
			var languages = mw.webfonts.config.languages;
			var requested = [mw.config.get( 'wgUserVariant' ), mw.config.get( 'wgContentLanguage' ), mw.config.get( 'wgUserLanguage' )];

			for ( var i = 0; i < requested.length; i++ ) {
				if ( requested[i] in languages ) {
					var fonts = languages[requested[i]];
					for ( var j = 0; j < fonts.length; j++ ) {
						if ( $.inArray( fonts[j], config ) === -1 ) {
							config.push( fonts[j] );
						}
					}
				}
			}

			// Build font dropdown
			mw.webfonts.buildMenu( config );
			// See if there is a font in cookie if not first font is default font.
			var cookieFont = $.cookie( 'webfonts-font' );
			var selectedFont = null;
			// check whether this font is for the current userlang/contentlang
			if ( $.inArray( cookieFont, config ) !== -1 || cookieFont === 'none' ) {
				selectedFont = cookieFont;
			}
			else{
				// We cannot use cookie font since it is not one of the fonts suitable 
				// for current language.
				selectedFont = config[0];
			}
			if ( selectedFont ) {
				mw.webfonts.set( selectedFont );
				// Mark it as checked
				$( '#'+fontID( selectedFont ) ).prop( 'checked', true );
			}
			
			mw.webfonts.loadFontsForFontFamilyStyle();
			mw.webfonts.loadFontsForLangAttr();

			if ( $( '.webfonts-lang-attr' ).length && !$( '#webfonts-fontsmenu' ).length ) {
				// We need to show the reset option even if there is no font to show 
				// for the language, if there is lang attr based font embedding.
				 mw.webfonts.buildMenu( config );
			}
		},
		
		/**
		 * Scan the page for tags with lang attr and load the default font
		 * for that language if available.
		 */
		loadFontsForLangAttr: function() {
			var languages = mw.webfonts.config.languages;
			var requested = [mw.config.get( 'wgUserVariant' ), mw.config.get( 'wgContentLanguage' ), mw.config.get( 'wgUserLanguage' )];
			var fontFamily = false;
			// If there are tags with lang attribute, 
			$( 'body' ).find( '*[lang]' ).each( function( index ) {
				// If the lang attribute value is same as one of
				// contentLang,useLang, variant, no need to do this.
				if( $.inArray( this.lang , requested ) === -1 ) {
					// check the availability of font, add a font-family style if it does not have any
					if( languages[this.lang] && ( !this.style.fontFamily || this.style.fontFamily === 'none' ) ) {
						fontFamily = languages[this.lang][0];
						mw.webfonts.addFont( fontFamily );
						$(this).css( 'font-family', fontFamily ).addClass( 'webfonts-lang-attr' );
					}
				}
			});
		},
		
		/**
		 * Scan the page for tags with font-family style declarations
		 * If that font is available, embed it.
		 */
		loadFontsForFontFamilyStyle: function() {
			var languages = mw.webfonts.config.languages;
			// If there are tags with font-family style definition, get a list of fonts to be loaded
			$( 'body' ).find( '*[style]' ).each( function( index ) {
				if( this.style.fontFamily ) {
					var fontFamilyItems = this.style.fontFamily.split( ',' );
					$.each( fontFamilyItems, function( index, fontFamily ) {
						// Remove the ' characters if any.
						fontFamily = fontFamily.replace( /'/g, '' );
						mw.webfonts.addFont( fontFamily );
					});
				}
			});

		},
		
		/**
		 * Prepare the div containing menu items.
		 * @param config The webfont configuration.
		 */
		buildMenuItems: function ( config ){
			var haveSchemes = false;
			// Build font dropdown
			var $fontsMenu = $( '<ul>' ).attr( 'id', 'webfonts-fontsmenu' );
			$fontsMenu.delegate( 'input:radio', 'click', function( ) {
				mw.webfonts.set( $(this).val() );
			} );
			for ( var scheme in config ) {
				var $fontLink = $( '<input type="radio" name="font" />' )
					.attr( 'id', fontID( config[scheme] ) )
					.val( config[scheme] );

				var $fontLabel =  $( '<label>' )
					.attr( 'for',fontID(config[scheme] ) )
					.append( $fontLink )
					.append( config[scheme] );

				var $fontMenuItem = $( '<li>' )
					.val( config[scheme] )
					.append( $fontLabel );

				haveSchemes = true;

				$fontsMenu.append( $fontMenuItem );

			}

			if ( !haveSchemes &&  !$( '.webfonts-lang-attr' ).length ) {
				// No schemes available, and no tags with lang attr
				// with fonts loaded. Don't show the menu.
				return null;
			}

			var $resetLink = $( '<input type="radio" name="font" />' )
				.attr( 'value', 'webfont-none' )
				.attr( 'id', 'webfont-none' )
				.click( function( e ) {
					mw.webfonts.set( 'none' );
				});

			var $resetLabel = $( '<label>' )
				.attr( 'for', 'webfont-none' )
				.append( $resetLink )
				.append( mw.message( 'webfonts-reset' ).escaped() );

			var $resetLinkItem = $( '<li>' )
				.val( 'none' )
				.append( $resetLabel );

			$fontsMenu.append( $resetLinkItem );

			var $menuDiv = $( '<div>' )
				.attr( 'id', 'webfonts-fonts' )
				.addClass( 'menu' )
				.append( $fontsMenu )
				.append();
			return $menuDiv;
		},
		/**
		 * Prepare the menu for the webfonts.
		 * @param config The webfont configuration.
		 */
		buildMenu: function(config) {
			var $menuItemsDiv = mw.webfonts.buildMenuItems( config );
			if( $menuItemsDiv === null ) {
				return;
			}
			var $menu = $( '<div>' )
				.attr( 'id', 'webfonts-menu' )
				.addClass( 'webfontMenu' )
				.append( $menuItemsDiv );
			var $link = $( '<a>' )
				.prop( 'href', '#' )
				.text( mw.msg( 'webfonts-load' ) )
				.attr( 'title', mw.msg( 'webfonts-menu-tooltip' ) );
			// This is the fonts link
			var $li = $( '<li>' ).attr( 'id', 'pt-webfont' ).append( $link );
			// If RTL, add to the right of top personal links. Else, to the left
			var fn = $( 'body' ).hasClass( 'rtl' ) ? 'append' : 'prepend';
			$( '#p-personal ul:first' )[fn]( $li );
			$( 'body' ).prepend( $menu );
			$li.click( function( event ) {
				$menuItemsDiv.css( 'left', $li.offset().left );
				if( $menu.hasClass( 'open' ) ){
					$menu.removeClass( 'open' );
				} else{
					$( 'div.open' ).removeClass( 'open' );
					$menu.addClass( 'open' );
					event.stopPropagation();
				}
			} );
			$( 'html' ).click( function() {
				$menu.removeClass( 'open' );
			} );
			// Workaround for IE bug - ActiveX components like input fields coming on top of everything.
			// @todo Is there a better solution other than hiding it on hover?
			if ( $.browser.msie ) { 
				$( '#webfonts-menu' ).hover( function() {
					$( '#searchform' ).css({ visibility: 'hidden' } );
				}, function( ) { 
					$( '#searchform' ).css( { visibility: 'visible' } );
				} );
			}
		}
	};

} ) ( jQuery );
