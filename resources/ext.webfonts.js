( function( $ ) { 

	function fontID( font ) {
		if ( typeof font !== 'string' ) {
			return font;
		}
		return 'webfont-' + font.toLowerCase().replace(/[_ ]/g, '-' ).replace(/[^-a-z]/g, '' );
	}

	$.webfonts = {

		oldconfig: false,
		config: $.webfonts.config,
		version: '0.1.2',
		fonts : [],
		set: function( font ) {
			if ( !font || font === 'none' ) {
				$.webfonts.reset();
				return;
			}

			if ( !( font in $.webfonts.config.fonts ) ) {
				mw.log( 'Requested unknown font', font );
				return;
			}
			var config = $.webfonts.config.fonts[font];

			// Load the style sheet for the font
			$.webfonts.addFont( font );
			
			// Save the current font and its size. Used for reset.
			if ( !$.webfonts.oldconfig ) {
				var $body = $( 'body' );
				$.webfonts.oldconfig = {
					fontFamily: $body.css( 'font-family' ),
					fontSize: $body.css( 'font-size' )
				};
			}

			// Set the font, fallback fonts.Need to change the fonts of Input Select and Textarea explicitly.
			$( 'body, input, select, textarea' ).css( 'font-family', '"' + font + '", Helvetica, Arial, sans-serif' );

			if ( 'normalization' in config ) {
				$( document ).ready( function() {
					$.webfonts.normalize( config.normalization );
				} );
			}
			// Store the font choise in cookie
			$.cookie( 'webfonts-font', font, { 'path': '/', 'expires': 30 } );

			// If we had reset the fonts for tags with lang attribute, apply the fonts again.
			$.webfonts.loadFontsForLangAttr();
		},

		/**
		 * Reset the font with old configuration
		 */
		reset: function() {
			$( 'body' ).css( {
				fontFamily: $.webfonts.oldconfig.fontFamily,
				fontSize: $.webfonts.oldconfig.fontSize
			});
			// We need to reset the font family of Input and Select explicitly.
			$( 'input, select' ).css( 'font-family', $.webfonts.oldconfig.fontFamily );

			// Reset the fonts applied for tags with lang attribute.
			$( '.webfonts-lang-attr' ).css( 'font-family', 'none' ).removeClass( 'webfonts-lang-attr' );

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
			var fontconfig = $.webfonts.config.fonts[fontFamily];
			var base = mw.config.get( 'wgExtensionAssetsPath' ) + '/WebFonts/fonts/';
			var fontFormats = [];
			var styleString =
				"<style type='text/css'>\n@font-face {\n"
				+ "\tfont-family: '"+fontFamily+"';\n";

			if ( 'eot' in fontconfig ) {
				styleString += "\tsrc: url('"+base+fontconfig.eot+"');\n";
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
				fontFormats.push( "\t\turl('"+base+fontconfig.woff+"') format('woff')" );
			}

			if ( 'svg' in fontconfig ) {
				fontFormats.push( "\t\turl('"+base+fontconfig.svg+"#"+fontFamily+"') format('svg')" );
			}

			if ( 'ttf' in fontconfig ) {
				fontFormats.push( "\t\turl('"+base+fontconfig.ttf+"') format('truetype')" );
			}
			
			styleString += fontFormats.join() + ";\n"
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
			if ( $.inArray( fontFamilyName, $.webfonts.fonts ) === -1 ) {
				// Check whether the requested font is available.
				if ( fontFamilyName in $.webfonts.config.fonts ) {
					$.webfonts.loadCSS( fontFamilyName );
					$.webfonts.fonts.push( fontFamilyName );
				}
			}
		},
		
		/**
		 * Setup the font selection menu.
		 * It also apply the font from cookie, if any.
		 */
		setup: function() {
			var config = [];
			var languages = $.webfonts.config.languages;
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
			$.webfonts.buildMenu( config );
			// See if there is a font in cookie if not first font is default font.
			var cookieFont = $.cookie( 'webfonts-font' );
			var selectedFont = null;
			// check whether this font is for the current userlang/contentlang
			if ( $.inArray( cookieFont, config ) !== -1 ) {
				selectedFont = cookieFont;
			}
			else{
				// We cannot use cookie font since it is not one of the fonts suitable 
				// for current language.
				selectedFont = config[0];
			}
			if ( selectedFont && selectedFont !== 'none' ) {
				$.webfonts.set( selectedFont );
				// Mark it as checked
				$( '#'+fontID( selectedFont ) ).prop( 'checked', true );
			}
			
			$.webfonts.loadFontsForFontFamilyStyle();
			$.webfonts.loadFontsForLangAttr();

			if ( $( '.webfonts-lang-attr' ).length && !$( '#webfonts-fontsmenu' ).length ) {
				// We need to show the reset option even if there is no font to show 
				// for the language, if there is lang attr based font embedding.
				 $.webfonts.buildMenu( config );
			}
		},
		
		/**
		 * Scan the page for tags with lang attr and load the default font
		 * for that language if available.
		 */
		loadFontsForLangAttr: function() {
			var languages = $.webfonts.config.languages;
			// If there are tags with lang attribute, 
			$( 'body' ).find( '*[lang]' ).each( function( index ) {
				// .. check the availability of font, add a font-family style if it does not have any
				if( languages[this.lang] && ( !this.style.fontFamily || this.style.fontFamily === 'none' ) ) {
					fontFamily = languages[this.lang][0];
					$.webfonts.addFont( fontFamily );
					$(this).css( 'font-family', fontFamily ).addClass( 'webfonts-lang-attr' );
				}
			});
			
		},
		
		/**
		 * Scan the page for tags with font-family style declarations
		 * If that font is available, embed it.
		 */
		loadFontsForFontFamilyStyle: function() {
			var languages = $.webfonts.config.languages;
			// If there are tags with font-family style definition, get a list of fonts to be loaded
			$( 'body' ).find( '*[style]' ).each( function( index ) {
				if( this.style.fontFamily ) {
					var fontFamilyItems = this.style.fontFamily.split( ',' );
					$.each( fontFamilyItems, function( index, fontFamily ) {
						// Remove the ' characters if any.
						fontFamily = fontFamily.replace( /'/g, '' );
						$.webfonts.addFont( fontFamily );
					});
				}
			});

		},
		
		/**
		 * Prepare the menu for the webfonts.
		 * @param config The webfont configuration.
		 */
		buildMenu: function(config) {
			var haveSchemes = false;
			// Build font dropdown
			var $fontsMenu = $( '<ul>' ).attr( 'id', 'webfonts-fontsmenu' );
			$fontsMenu.delegate( 'input:radio', 'change', function( e ) {
				$.webfonts.set( $(this).val() );
			} );
			for ( var scheme in config ) {
				var $fontLink = $( '<input type="radio" />' )
					.attr( 'name', 'font' ) 
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
				return;
			}

			var $resetLink = $( '<input type="radio" />' )
				.attr( 'name', 'font' )
				.attr( 'value', 'webfont-none' )
				.attr( 'id', 'webfont-none' )
				.click( function( e ) {
					$.webfonts.set( 'none' );
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

			var $div = $( '<div>' )
				.attr( 'id', 'webfonts-menu' )
				.addClass( 'webfontMenu' )
				.append( $( '<a>' ).prop( 'href', '#' ).text( mw.message( 'webfonts-load' ).escaped() ) )
				.append( $menuDiv );

			// This is the fonts link
			var $li = $( '<li>' )
				.attr( 'id', 'pt-webfont' )
				.append( $div );

			// If RTL, add to the right of top personal links. Else, to the left
			var fn = $( 'body' ).hasClass( 'rtl' ) ? 'append' : 'prepend';
			$( '#p-personal ul:first' )[fn]( $li );

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

	$( document ).ready( function() {
		$.webfonts.setup();
	} );

} ) ( jQuery );
