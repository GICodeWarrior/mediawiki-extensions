/**
 * This plugin provides a way to build a wiki-text editing user interface around a textarea.
 * 
 * @example To intialize without any modules:
 * 		$j( 'div#edittoolbar' ).wikiEditor();
 * 
 * @example To initialize with one or more modules, or to add modules after it's already been initialized:
 * 		$j( 'textarea#wpTextbox1' ).wikiEditor( 'addModule', 'toolbar', { ... config ... } );
 * 
 */
( function( $ ) {

/**
 * Global static object for wikiEditor that provides generally useful functionality to all modules and contexts.
 */
$.wikiEditor = {
	/**
	 * For each module that is loaded, static code shared by all instances is loaded into this object organized by
	 * module name. The existance of a module in this object only indicates the module is available. To check if a
	 * module is in use by a specific context check the context.modules object.
	 */
	'modules': {},
	/**
	 * In some cases like with the iframe's HTML file, it's convienent to have a lookup table of all instances of the
	 * WikiEditor. Each context contains an instance field which contains a key that corrosponds to a reference to the
	 * textarea which the WikiEditor was build around. This way, by passing a simple integer you can provide a way back
	 * to a specific context.
	 */
	'instances': [],
	/**
	 * For each browser name, an array of conditions that must be met are supplied in [operaton, value]-form where
	 * operation is a string containing a JavaScript compatible binary operator and value is either a number to be
	 * compared with $.browser.versionNumber or a string to be compared with $.browser.version. If a browser is not
	 * specifically mentioned, we just assume things will work.
	 */
	'browsers': {
		// Left-to-right languages
		'ltr': {
			// The toolbar layout is broken in IE6
			'msie': [['>=', 7]],
			// jQuery UI appears to be broken in FF 2.0 - 2.0.0.4
			'firefox': [
				['>=', 2], ['!=', '2.0'], ['!=', '2.0.0.1'], ['!=', '2.0.0.2'], ['!=', '2.0.0.3'], ['!=', '2.0.0.4']
			],
			// Text selection bugs galore - this may be a different situation with the new iframe-based solution
			'opera': [['>=', 9.6]],
			// This should be checked again, but the usage of Safari 3.0 and lower is so small it's not a priority
			'safari': [['>=', 3.1]]
		},
		// Right-to-left languages
		'rtl': {
			// The toolbar layout is broken in IE 7 in RTL mode, and IE6 in any mode
			'msie': [['>=', 8]],
			// jQuery UI appears to be broken in FF 2.0 - 2.0.0.4
			'firefox': [
				['>=', 2], ['!=', '2.0'], ['!=', '2.0.0.1'], ['!=', '2.0.0.2'], ['!=', '2.0.0.3'], ['!=', '2.0.0.4']
			],
			// Text selection bugs galore - this may be a different situation with the new iframe-based solution
			'opera': [['>=', 9.6]],
			// This should be checked again, but the usage of Safari 3.0 and lower is so small it's not a priority
			'safari': [['>=', 3.1]]
		}
	},
	/**
	 * Path to images - this is a bit messy, and it would need to change if this code (and images) gets moved into the
	 * core - or anywhere for that matter...
	 */
	'imgPath' : wgScriptPath + '/extensions/UsabilityInitiative/images/wikiEditor/',
	/**
	 * Checks the current browser against the browsers object to determine if the browser has been black-listed or not.
	 * Because these rules are often very complex, the object contains configurable operators and can check against
	 * either the browser version number or string. This process also involves checking if the current browser is amung
	 * those which we have configured as compatible or not. If the browser was not configured as comptible we just go on
	 * assuming things will work - the argument here is to prevent the need to update the code when a new browser comes
	 * to market. The assumption here is that any new browser will be built on an existing engine or be otherwise so
	 * similar to another existing browser that things actually do work as expected. The merrits of this argument, which
	 * is essentially to blacklist rather than whitelist are debateable, but at this point we've decided it's the more
	 * "open-web" way to go.
	 */
	'isSupported': function() {
		// Check for and make use of a cached return value
		if ( typeof $.wikiEditor.supported != 'undefined' ) {
			return $.wikiEditor.supported;
		}
		// Check if we have any compatiblity information on-hand for the current browser
		if ( !( $.browser.name in $.wikiEditor.browsers[$( 'body' ).is( '.rtl' ) ? 'rtl' : 'ltr'] ) ) {
			// Assume good faith :) 
			return $.wikiEditor.supported = true;
		}
		// Check over each browser condition to determine if we are running in a compatible client
		var browser = $.wikiEditor.browsers[$( 'body' ).is( '.rtl' ) ? 'rtl' : 'ltr'][$.browser.name];
		for ( condition in browser ) {
			var op = browser[condition][0];
			var val = browser[condition][1];
			if ( typeof val == 'string' ) {
				if ( !( eval( '$.browser.version' + op + '"' + val + '"' ) ) ) {
					return $.wikiEditor.supported = false;
				}
			} else if ( typeof val == 'number' ) {
				if ( !( eval( '$.browser.versionNumber' + op + val ) ) ) {
					return $.wikiEditor.supported = false;
				}
			}
		}
		// Return and also cache the return value - this will be checked somewhat often
		return $.wikiEditor.supported = true;
	},
	/**
	 * Provides a way to extract messages from objects. Wraps the mw.usability.getMsg() function, which
	 * may eventually become a wrapper for some kind of core MW functionality.
	 * 
	 * @param object Object to extract messages from
	 * @param property String of name of property which contains the message. This should be the base name of the
	 * property, which means that in the case of the object { this: 'that', fooMsg: 'bar' }, passing property as 'this'
	 * would return the raw text 'that', while passing property as 'foo' would return the internationalized message
	 * with the key 'bar'.
	 */
	'autoMsg': function( object, property ) {
		// Accept array of possible properties, of which the first one found will be used
		if ( typeof property == 'object' ) {
			for ( i in property ) {
				if ( property[i] in object || property[i] + 'Msg' in object ) {
					property = property[i];
					break;
				}
			}
		}
		if ( property in object ) {
			return object[property];
		} else if ( property + 'Msg' in object ) {
			if ( typeof object[property + 'Msg' ] == 'object' ) {
				// [ messageKey, arg1, arg2, ... ]
				return mw.usability.getMsg.apply( mw.usability, object[property + 'Msg' ] );
			} else {
				return mw.usability.getMsg( object[property + 'Msg'] );
			}
		} else {
			return '';
		}
	},
	/**
	 * Provieds a way to extract a property of an object in a certain language, falling back on the property keyed as
	 * 'default'. If such key doesn't exist, the object itself is considered the actual value, which should ideally
	 * be the case so that you may use a string or object of any number of strings keyed by language with a default.
	 * 
	 * @param object Object to extract property from
	 * @param lang Language code, defaults to wgUserLanguage
	 */
	'autoLang': function( object, lang ) {
		return object[lang || wgUserLanguage] || object['default'] || object;
	},
	/**
	 * Provieds a way to extract the path of an icon in a certain language, automatically appending a version number for
	 * caching purposes and prepending an image path when icon paths are relative.
	 * 
	 * @param icon Icon object from e.g. toolbar config
	 * @param path Default icon path, defaults to $.wikiEditor.imgPath
	 * @param lang Language code, defaults to wgUserLanguage
	 */
	'autoIcon': function( icon, path, lang ) {
		var src = $.wikiEditor.autoLang( icon, lang );
		path = path || $.wikiEditor.imgPath;
		// Prepend path if src is not absolute
		if ( src.substr( 0, 7 ) != 'http://' && src.substr( 0, 8 ) != 'https://' && src[0] != '/' ) {
			src = path + src;
		}
		return src + '?' + wgWikiEditorIconVersion;
	}
};

/**
 * jQuery plugin that provides a way to initialize a wikiEditor instance on a textarea.
 */
$.fn.wikiEditor = function() {

// Skip any further work when running in browsers that are unsupported
if ( !$j.wikiEditor.isSupported() ) {
	return $(this);
}

/* Initialization */

// The wikiEditor context is stored in the element's data, so when this function gets called again we can pick up right
// where we left off
var context = $(this).data( 'wikiEditor-context' );
// On first call, we need to set things up, but on all following calls we can skip right to the API handling
if ( typeof context == 'undefined' ) {
	
	// Star filling the context with useful data - any jQuery selections, as usual should be named with a preceding $
	context = {
		// Reference to the textarea element which the wikiEditor is being built around
		'$textarea': $(this),
		// Container for any number of mutually exclusive views that are accessible by tabs
		'views': {},
		// Container for any number of module-specific data - only including data for modules in use on this context
		'modules': {},
		// General place to shouve bits of data into
		'data': {},
		// Unique numeric ID of this instance used both for looking up and differentiating instances of wikiEditor
		'instance': $.wikiEditor.instances.push( $(this) ) - 1,
		// Array mapping elements in the textarea to character offsets
		'offsets': null
	};
	
	/*
	 * Externally Accessible API
	 * 
	 * These are available using calls to $j(selection).wikiEditor( call, data ) where selection is a jQuery selection
	 * of the textarea that the wikiEditor instance was built around.
	 */
	
	context.api = {
		/**
		 * Activates a module on a specific context with optional configuration data.
		 * 
		 * @param data Either a string of the name of a module to add without any additional configuration parameters,
		 * or an object with members keyed with module names and valued with configuration objects.
		 */
		'addModule': function( context, data ) {
			var modules = {};
			if ( typeof data == 'string' ) {
				modules[data] = {};
			} else if ( typeof data == 'object' ) {
				modules = data;
			}
			for ( module in modules ) {
				// Check for the existance of an available module with a matching name and a create function
				if ( typeof module == 'string' && module in $.wikiEditor.modules ) {
					// Extend the context's core API with this module's own API calls
					if ( 'api' in $.wikiEditor.modules[module] ) {
						for ( call in $.wikiEditor.modules[module].api ) {
							// Modules may not overwrite existing API functions - first come, first serve
							if ( !( call in context.api ) ) {
								context.api[call] = $.wikiEditor.modules[module].api[call];
							}
						}
					}
					// Activate the module on this context
					if ( 'fn' in $.wikiEditor.modules[module] && 'create' in $.wikiEditor.modules[module].fn ) {
						// Add a place for the module to put it's own stuff
						context.modules[module] = {};
						// Tell the module to create itself on the context
						$.wikiEditor.modules[module].fn.create( context, modules[module] );
					}
				}
			}
		}
	};
	
	/* 
	 * Event Handlers
	 * 
	 * These act as filters returning false if the event should be ignored or returning true if it should be passed
	 * on to all modules. This is also where we can attach some extra information to the events.
	 */
	
	context.evt = {
		/**
		 * Filters change events, which occur when the user interacts with the contents of the iframe. The goal of this
		 * function is to both classify the scope of changes as 'division' or 'character' and to prevent further
		 * processing of events which did not actually change the content of the iframe.
		 */
		'change': function( event ) {
			event.data.scope = 'division';
			context.fn.purgeOffsets();
			return true;
		},
		'delayedChange': function( event ) {
			// Redirect - since we want the same functionality
			return context.evt.change( event );
		}
	};
	
	/* Internal Functions */
	
	context.fn = {
		/**
		 * Executes core event filters as well as event handlers provided by modules.
		 */
		'trigger': function( name, event ) {
			// Event is an optional argument, but from here on out, at least the type field should be dependable
			if ( typeof event == 'undefined' ) {
				event = { 'type': 'custom' };
			}
			// Ensure there's a place for extra information to live
			if ( typeof event.data == 'undefined' ) {
				event.data = {};
			}
			// Allow filtering to occur
			if ( name in context.evt ) {
				if ( !context.evt[name]( event ) ) {
					return false;
				}
			}
			// Pass the event around to all modules activated on this context
			for ( module in context.modules ) {
				if (
					module in $.wikiEditor.modules &&
					'evt' in $.wikiEditor.modules[module] &&
					name in $.wikiEditor.modules[module].evt
				) {
					$.wikiEditor.modules[module].evt[name]( context, event );
				}
			}
		},
		/**
		 * Adds a button to the UI
		 */
		'addButton': function( options ) {
			// Ensure that buttons and tabs are visible
			context.$controls.show();
			context.$buttons.show();
			return $( '<button />' )
				.text( $.wikiEditor.autoMsg( options, 'caption' ) )
				.click( options.action )
				.appendTo( context.$buttons );
		},
		/**
		 * Adds a view to the UI, which is accessed using a set of tabs. Views are mutually exclusive and by default a
		 * wikitext view will be present. Only when more than one view exists will the tabs will be visible.
		 */
		'addView': function( options ) {
			// Adds a tab
			function addTab( options ) {
				// Ensure that buttons and tabs are visible
				context.$controls.show();
				context.$tabs.show();
				// Return the newly appended tab
				return $( '<div></div>' )
					.attr( 'rel', 'wikiEditor-ui-view-' + options.name )
					.addClass( context.view == options.name ? 'current' : null )
					.append( $( '<a></a>' )
						.attr( 'href', '#' )
						.click( function( event ) {
							context.$ui.find( '.wikiEditor-ui-view' ).hide();
							context.$ui.find( '.' + $(this).parent().attr( 'rel' ) ).show();
							context.$tabs.find( 'div' ).removeClass( 'current' );
							$(this).parent().addClass( 'current' );
							$(this).blur();
							if ( 'init' in options && typeof options.init == 'function' ) {
								options.init( context );
							}
							event.preventDefault();
							return false;
						} )
						.text( $.wikiEditor.autoMsg( options, 'title' ) )
					)
					.appendTo( context.$tabs );
			}
			// Automatically add the previously not-needed wikitext tab
			if ( !context.$tabs.children().size() ) {
				addTab( { 'name': 'wikitext', 'titleMsg': 'wikieditor-wikitext-tab' } );
			}
			// Add the tab for the view we were actually asked to add
			addTab( options );
			// Return newly appended view
			return $( '<div></div>' )
				.addClass( 'wikiEditor-ui-view wikiEditor-ui-view-' + options.name )
				.hide()
				.appendTo( context.$ui );
		},
		'htmlToText': function( html ) {
			// We use this elaborate trickery for cross-browser compatibility
			// IE does overzealous whitespace collapsing for $( '<pre />' ).html( html );
			var $pre = $( '<pre>' +
				html
					.replace( /\r?\n/g, "" ) // IE7 inserts newlines before block elements
					.replace( /\<br[^\>]*\>/gi, "\n" )
					.replace( /&nbsp;/g, " " ) // We inserted these to prevent IE from collapsing spaces
					.replace( /\<p[^\>]*\>/gi, "\n" ) // IE uses </p><p> for user-inserted line breaks
					.replace( /\<\/p[^\>]*\>/gi, "" )
					.replace( /\<div[^\>]*\>/gi, "\n" ) // Webkit uses </p><p> for user-inserted line breaks
					.replace( /\<\/div[^\>]*\>/gi, "" )
				+ '</pre>' );
			// Get rid of the noincludes when getting text
			$pre.find( '.wikiEditor-noinclude' ).each( function() { $( this ).remove(); } );
			$pre.find( '.wikiEditor-tab' ).each( function() { $( this ).text( "\t" ) } );
			return $pre.text();
		},
		
		/*
		 * FIXME: This section needs attention! It doesn't really make sense given it's supposed to keep compatibility
		 * with the textSelection plugin, which works on character-based manipulations as opposed to the node-based
		 * manipulations we use for the iframe. It's debatable whether compatibility with this plugin is even being done
		 * well, or for that matter should be done at all.
		 */
		
		/**
		 * Gets the complete contents of the iframe (in plain text, not HTML)
		 */
		'getContents': function() {
			return context.fn.htmlToText( context.$content.html() );
		},
		/**
		 * Gets the currently selected text in the content
		 * DO NOT CALL THESE DIRECTLY, use .textSelection( 'functionname', options ) instead
		 */
		'getSelection': function() {
			var retval;
			if ( context.$iframe[0].contentWindow.getSelection ) {
				// Firefox and Opera
				retval = context.$iframe[0].contentWindow.getSelection();
			} else if ( context.$iframe[0].contentWindow.document.selection ) { // should come last; Opera!
				// IE
				retval = context.$iframe[0].contentWindow.document.selection.createRange();
			}
			if ( typeof retval.text != 'undefined' ) {
				// In IE8, retval.text is stripped of newlines, so we need to process retval.htmlText
				// to get a reliable answer. IE7 does get this right though
				// Run this fix for all IE versions anyway, it doesn't hurt
				retval = context.fn.htmlToText( retval.htmlText );
			} else if ( retval.toString ) {
				retval = retval.toString();
			}
			return retval;
		},
		/**
		 * Inserts text at the begining and end of a text selection, optionally inserting text at the caret when
		 * selection is empty.
		 * DO NOT CALL THESE DIRECTLY, use .textSelection( 'functionname', options ) instead
		 */
		'encapsulateSelection': function( options ) {
			var selText = $(this).textSelection( 'getSelection' );
			var selTextArr;
			var selectAfter = false;
			var pre = options.pre, post = options.post;
			if ( !selText ) {
				selText = options.peri;
				selectAfter = true;
			} else if ( options.replace ) {
				selText = options.peri;
			} else if ( selText.charAt( selText.length - 1 ) == ' ' ) {
				// Exclude ending space char
				// FIXME: Why?
				selText = selText.substring( 0, selText.length - 1 );
				post += ' ';
			}
			if ( options.splitlines ) {
				selTextArr = selText.split( /\n/ );
			}

			if ( context.$iframe[0].contentWindow.getSelection ) {
				// Firefox and Opera
				var range = context.$iframe[0].contentWindow.getSelection().getRangeAt( 0 );
				if ( options.ownline ) {
					var body = context.$content.get( 0 );
					// TODO: This'll probably break with syntax highlighting
					// When the selection starts at the beginning of a line, it'll have either
					// startOffset == 0 or startContainer == body
					if ( range.startOffset != 0 && range.startContainer != body ) {
						pre  = "\n" + options.pre;
					}
					// TODO: Will this still work with syntax highlighting?
					// When the selection ends at the end of a line, it'll have endContainer == body
					// and endOffset != 0
					if ( range.endContainer != body || range.endOffset == 0 ) {
						post += "\n";
					}
				}
				var insertText = "";
				if ( options.splitlines ) {
					for( var i = 0; i < selTextArr.length; i++ ) {
						insertText = insertText + pre + selTextArr[i] + post;
						if( i != selTextArr.length - 1 ) insertText += "\n"; 
					}
				} else {
					insertText = pre + selText + post;
				}
				var insertLines = insertText.split( "\n" );
				range.extractContents();
				// Insert the contents one line at a time - insertNode() inserts at the beginning, so this has to happen
				// in reverse order
				var lastNode;
				for ( var i = insertLines.length - 1; i >= 0; i-- ) {
					range.insertNode( context.$iframe[0].contentWindow.document.createTextNode( insertLines[i] ) );
					if ( i > 0 ) {
						lastNode = range.insertNode( context.$iframe[0].contentWindow.document.createElement( 'br' ) );
					}
				}
				if ( lastNode ) {
					context.fn.scrollToTop( lastNode );
				}
			} else if ( context.$iframe[0].contentWindow.document.selection ) {
				// IE
				context.$iframe[0].contentWindow.focus();
				var range = context.$iframe[0].contentWindow.document.selection.createRange();
				if ( options.ownline && range.moveStart ) {
					// Check if we're at the start of a line
					// If not, prepend a newline
					var range2 = context.$iframe[0].contentWindow.document.selection.createRange();
					range2.collapse();
					range2.moveStart( 'character', -1 );
					// FIXME: Which check is correct?
					if ( range2.text != "\r" && range2.text != "\n" && range2.text != "" ) {
						pre = "\n" + pre;
					}
					
					// Check if we're at the end of a line
					// If not, append a newline
					var range3 = context.$iframe[0].contentWindow.document.selection.createRange();
					range3.collapse( false );
					range3.moveEnd( 'character', 1 );
					if ( range3.text != "\r" && range3.text != "\n" && range3.text != "" ) {
						post += "\n";
					}
				}
				// TODO: Clean this up. Duplicate code due to the pre-existing browser specific structure of this function
				var insertText = "";
				if ( options.splitlines ) {
					for( var i = 0; i < selTextArr.length; i++ ) {
						insertText = insertText + pre + selTextArr[i] + post;
						if( i != selTextArr.length - 1 ) {
							insertText += "\n"; 
						}
					}
				} else {
					insertText = pre + selText + post;
				}
				// TODO: Maybe find a more elegant way of doing this like the Firefox code above?
				range.pasteHTML( insertText
						.replace( /\</g, '&lt;' )
						.replace( />/g, '&gt;' )
						.replace( /\r?\n/g, '<br />' )
				);
			}
			// Trigger the encapsulateSelection event (this might need to get named something else/done differently)
			$( context.$iframe[0].contentWindow.document ).trigger(
				'encapsulateSelection', [ pre, options.peri, post, options.ownline, options.replace ]
			);
			return context.$textarea;
		},
		/**
		 * Gets the position (in resolution of bytes not nessecarily characters) in a textarea
		 * DO NOT CALL THESE DIRECTLY, use .textSelection( 'functionname', options ) instead
		 */
		'getCaretPosition': function( options ) {
			// FIXME: Character-based functions aren't useful for the magic iframe - return character position?
		},
		/**
		 * Sets the selection of the content
		 * DO NOT CALL THESE DIRECTLY, use .textSelection( 'functionname', options ) instead
		 *
		 * @param start Character offset of selection start
		 * @param end Character offset of selection end
		 * @param startContainer Element in iframe to start selection in. If not set, start is a character offset
		 * @param endContainer Element in iframe to end selection in. If not set, end is a character offset
		 */
		'setSelection': function( options ) {
			var sc = options.startContainer, ec = options.endContainer;
			sc = sc && sc.jquery ? sc[0] : sc;
			ec = ec && ec.jquery ? ec[0] : ec;
			if ( context.$iframe[0].contentWindow.getSelection ) {
				// Firefox and Opera
				var start = options.start, end = options.end;
				if ( !sc || !ec ) {
					var s = context.fn.getOffset( start );
					var e = context.fn.getOffset( end );
					sc = s ? s.node : null;
					ec = e ? e.node : null;
					start = s ? s.offset : null;
					end = e ? e.offset : null;
				}
				if ( !sc || !ec ) {
					// The requested offset isn't in the offsets array
					// Give up
					return context.$textarea;
				}
				
				var sel = context.$iframe[0].contentWindow.getSelection();
				while ( sc.firstChild && sc.nodeName != '#text' ) {
					sc = sc.firstChild;
				}
				while ( ec.firstChild && ec.nodeName != '#text' ) {
					ec = ec.firstChild;
				}
				var range = context.$iframe[0].contentWindow.document.createRange();
				range.setStart( sc, start );
				range.setEnd( ec, end );
				sel.removeAllRanges();
				sel.addRange( range );
				context.$iframe[0].contentWindow.focus();
			} else if ( context.$iframe[0].contentWindow.document.body.createTextRange ) {
				// IE
				var range = context.$iframe[0].contentWindow.document.body.createTextRange();
				if ( sc ) {
					range.moveToElementText( sc );
				}
				range.moveStart( 'character', options.start );
				var range2 = context.$iframe[0].contentWindow.document.body.createTextRange();
				if ( ec ) {
					range2.moveToElementText( ec );
				}
				range2.collapse();
				range2.moveEnd( 'character', options.end );
				range.setEndPoint( 'EndToEnd', range2 );
				range.select();
			}
			return context.$textarea;
		},
		/**
		 * Scroll a textarea to the current cursor position. You can set the cursor position with setSelection()
		 * DO NOT CALL THESE DIRECTLY, use .textSelection( 'functionname', options ) instead
		 */
		'scrollToCaretPosition': function( options ) {
			// FIXME: context.$textarea.trigger( 'scrollToPosition' ) ?
		},
		/**
		 * Scroll an element to the top of the iframe
		 * DO NOT CALL THESE DIRECTLY, use .textSelection( 'functionname', options ) instead
		 *
		 * @param $element jQuery object containing an element in the iframe
		 * @param force If true, scroll the element even if it's already visible
		 */
		'scrollToTop': function( $element, force ) {
			var html = context.$content.closest( 'html' ),
				body = context.$content.closest( 'body' ),
				parentHtml = $( 'html' ),
				parentBody = $( 'body' );
			var y = $element.offset().top;
			if ( !$.browser.msie && ! $element.is( 'body' ) ) {
				y = parentHtml.scrollTop() > 0 ? y + html.scrollTop() - parentHtml.scrollTop() : y;
				y = parentBody.scrollTop() > 0 ? y + body.scrollTop() - parentBody.scrollTop() : y;
			}
			var topBound = html.scrollTop() > body.scrollTop() ? html.scrollTop() : body.scrollTop(),
				bottomBound = topBound + context.$iframe.height();
			if ( force || y < topBound || y > bottomBound ) {
					html.scrollTop( y );
					body.scrollTop( y );
				}
			$element.trigger( 'scrollToTop' );
		},
		/*
		 * End of wonky textSelection "compatible" section that needs attention.
		 */
		
		/**
		 * Get the first element before the selection matching a certain selector.
		 * @param selector Selector to match. Defaults to '*'
		 * @param strict If true, the element the selection starts in cannot match (default: false)
		 * @return jQuery object
		 */
		'beforeSelection': function( selector, strict ) {
			if ( typeof selector == 'undefined' ) {
				selector = '*';
			}
			var e, offset;
			if ( context.$iframe[0].contentWindow.getSelection ) {
				// Firefox and Opera
				var selection = context.$iframe[0].contentWindow.getSelection();
				// On load, webkit seems to not have a valid selection
				if ( selection.baseNode !== null ) {
					// Start at the selection's start and traverse the DOM backwards
					// This is done by traversing an element's children first, then the element itself, then its parent
					e = selection.getRangeAt( 0 ).startContainer;
					offset = selection.startOffset;
				} else {
					return $( [] );
				}
			} else if ( context.$iframe[0].contentWindow.document.selection ) {
				// IE
				// Because there's nothing like range.startContainer in IE, we need to do a DOM traversal
				// to find the element the start of the selection is in
				var range = context.$iframe[0].contentWindow.document.selection.createRange();
				// Set range2 to the text before the selection
				var range2 = context.$iframe[0].contentWindow.document.body.createTextRange();
				// For some reason this call throws errors in certain cases, e.g. when the selection is
				// not in the iframe
				try {
					range2.setEndPoint( 'EndToStart', range );
				} catch ( e ) {
					return $( [] );
				}
				var seekPos = context.fn.htmlToText( range2.htmlText ).length;
				var offset = context.fn.getOffset( seekPos );
				e = offset ? offset.node : null;
				offset = offset ? offset.offset : null;
				if ( !e ) {
					return $( [] );
				}
			}
			if ( e.nodeName != '#text' ) {
				// The selection is not in a textnode, but between two non-text nodes
				// (usually inside the <body> between two <br>s). Go to the rightmost
				// child of the node just before the selection
				var newE = e.firstChild;
				for ( var i = 0; i < offset - 1 && newE; i++ ) {
					newE = newE.nextSibling;
				}
				while ( newE && newE.lastChild ) {
					newE = newE.lastChild;
				}
				e = newE || e;
			}
			while ( e ) {
				if ( $( e ).is( selector ) && !strict )
					return $( e );
				var next = e.previousSibling;
				while ( next && next.lastChild ) {
					next = next.lastChild;
				}
				e = next || e.parentNode;
				strict = false;
			}
			return $( [] );
		},
		/**
		 * Get an object used to traverse the leaf nodes in the iframe DOM. This traversal skips leaf nodes
		 * inside an element with the wikiEditor-noinclude class.
		 *
		 * Usage:
		 * var t = context.fn.traverser( context.$content );
		 * // t.node is the first textnode, t.depth is its depth
		 * t.goNext();
		 * // t.node is the second textnode, t.depth is its depth
		 * // Trying to advance past the end will set t.node to null
		 */
		'traverser': function( start ) {
			function Traverser( node, depth, inP ) {
				this.node = node;
				this.depth = depth;
				this.inP = inP;
				this.next = function() {
					var p = this.node;
					var nextDepth = this.depth;
					var nextInP = this.inP;
					while ( p && !p.nextSibling ) {
						if ( p.nodeName == "P" ) {
							nextInP = false;
						}
						p = p.parentNode;
						nextDepth--;
						if ( nextDepth == 0 ) {
							// We're back at the start node
							p = null;
						}
					}
					p = p ? p.nextSibling : null;
					do {
						// Filter nodes with the wikiEditor-noinclude class
						// Don't use $( p ).hasClass( 'wikiEditor-noinclude' ) because
						// $() is slow in a tight loop
						while ( p && ( ' ' + p.className + ' ' ).indexOf( ' wikiEditor-noinclude ' ) != -1 ) {
							p = p.nextSibling;
						}
						if ( p && p.firstChild ) {
							p = p.firstChild;
							nextDepth++;
							if ( p.nodeName == "P" ) {
								nextInP = true;
							}
						}
					} while ( p && p.firstChild );
					return p ? new Traverser( p, nextDepth, nextInP ) : null;
				};
			}
			// Find the leftmost leaf node in the tree
			var node = start.jquery ? start.get( 0 ) : start;
			var depth = 0;
			var inP = node.nodeName == "P";
			do {
				// Filter nodes with the wikiEditor-noinclude class
				// Don't use $( p ).hasClass( 'wikiEditor-noinclude' ) because
				// $() is slow in a tight loop
				while ( node && ( ' ' + node.className + ' ' ).indexOf( ' wikiEditor-noinclude ' ) != -1 ) {
					node = node.nextSibling;
				}
				if ( node && node.firstChild ) {
					node = node.firstChild;
					depth++;
					if ( node.nodeName == "P" ) {
						inP = true;
					}
				}
			} while ( node && node.firstChild );
			return new Traverser( node, depth, inP );
		},
		'getOffset': function( offset ) {
			if ( !context.offsets ) {
				context.fn.refreshOffsets();
			}
			if ( offset in context.offsets ) {
				return context.offsets[offset];
			}
			// Our offset is not pre-cached. Find the highest offset below it and interpolate
			var lowerBound = -1;
			for ( var o in context.offsets ) {
				if ( o > offset ) {
					break;
				}
				lowerBound = o;
			}
			if ( !( lowerBound in context.offsets ) ) {
				// Weird edge case: either offset is too large or the document is empty
				return null;
			}
			var base = context.offsets[lowerBound];
			return context.offsets[offset] = {
				'node': base.node,
				'offset': base.offset + offset - o,
				'length': base.length,
				'depth': base.depth,
				'lastTextNode': base.lastTextNode,
				'lastTextNodeDepth': base.lastTextNodeDepth
			};
		},
		'purgeOffsets': function() {
			context.offsets = null;
		},
		'refreshOffsets': function() {
			context.offsets = [ ];
			var t = context.fn.traverser( context.$content );
			var pos = 0, lastTextNode = null, lastTextNodeDepth = null;
			while ( t ) {
				if ( t.node.nodeName != '#text' && t.node.nodeName != 'BR' ) {
					t = t.next();
					continue;
				}
				var nextPos = t.node.nodeName == '#text' ? pos + t.node.nodeValue.length : pos + 1;
				var nextT = t.next();
				var leavingP = t.inP && nextT && !nextT.inP;
				context.offsets[pos] = {
					'node': t.node,
					'offset': 0,
					'length': nextPos - pos + ( leavingP ? 1 : 0 ),
					'depth': t.depth,
					'lastTextNode': lastTextNode,
					'lastTextNodeDepth': lastTextNodeDepth
				};
				if ( leavingP ) {
					// <p>Foo</p> looks like "Foo\n", make it quack like it too
					// Basically we're faking the \n character much like we're treating <br>s
					context.offsets[nextPos] = {
						'node': t.node,
						'offset': nextPos - pos,
						'length': nextPos - pos + 1,
						'depth': t.depth,
						'lastTextNode': lastTextNode,
						'lastTextNodeDepth': lastTextNodeDepth
					};
				}
				pos = nextPos + ( leavingP ? 1 : 0 );
				if ( t.node.nodeName == '#text' ) {
					lastTextNode = t.node;
					lastTextNodeDepth = t.depth;
				}
				t = nextT;
			}
		}
	};
	
	/*
	 * Base UI Construction
	 * 
	 * The UI is built from several containers, the outer-most being a div classed as "wikiEditor-ui". These containers
	 * provide a certain amount of "free" layout, but in some situations procedural layout is needed, which is performed
	 * as a response to the "resize" event.
	 */
	
	// Encapsulate the textarea with some containers for layout
	context.$textarea
		.wrap( $( '<div></div>' ).addClass( 'wikiEditor-ui' ) )
		.wrap( $( '<div></div>' ).addClass( 'wikiEditor-ui-view wikiEditor-ui-view-wikitext' ) )
		.wrap( $( '<div></div>' ).addClass( 'wikiEditor-ui-left' ) )
		.wrap( $( '<div></div>' ).addClass( 'wikiEditor-ui-bottom' ) )
		.wrap( $( '<div></div>' ).addClass( 'wikiEditor-ui-text' ) );
	// Get references to some of the newly created containers
	context.$ui = context.$textarea.parent().parent().parent().parent().parent();
	context.$wikitext = context.$textarea.parent().parent().parent().parent();
	// Add in tab and button containers
	context.$wikitext
		.before(
			$( '<div></div>' ).addClass( 'wikiEditor-ui-controls' )
				.append( $( '<div></div>' ).addClass( 'wikiEditor-ui-tabs' ).hide() )
				.append( $( '<div></div>' ).addClass( 'wikiEditor-ui-buttons' ) )
		)
		.before( $( '<div style="clear:both;"></div>' ) );
	// Get references to some of the newly created containers
	context.$controls = context.$ui.find( '.wikiEditor-ui-buttons' ).hide();
	context.$buttons = context.$ui.find( '.wikiEditor-ui-buttons' );
	context.$tabs = context.$ui.find( '.wikiEditor-ui-tabs' );
	// Clear all floating after the UI
	context.$ui.after( $( '<div style="clear:both;"></div>' ) );
	// Attach a right container
	context.$wikitext.append( $( '<div></div>' ).addClass( 'wikiEditor-ui-right' ) );
	// Attach a top container to the left pane
	context.$wikitext.find( '.wikiEditor-ui-left' ).prepend( $( '<div></div>' ).addClass( 'wikiEditor-ui-top' ) );
	// Setup the intial view
	context.view = 'wikitext';
	// Trigger the "resize" event anytime the window is resized
	$( window ).resize( function( event ) { context.fn.trigger( 'resize', event ) } );
	// Create an iframe in place of the text area
	context.$iframe = $( '<iframe></iframe>' )
		.attr( {
			'frameBorder': 0,
			'border': 0,
			'src': wgScriptPath + '/extensions/UsabilityInitiative/js/plugins/jquery.wikiEditor.html?' +
				'instance=' + context.instance + '&ts=' + ( new Date() ).getTime(),
			'id': 'wikiEditor-iframe-' + context.instance
		} )
		.css( {
			'backgroundColor': 'white',
			'width': '100%',
			'height': context.$textarea.height(),
			'display': 'none',
			'overflow-y': 'scroll',
			'overflow-x': 'hidden'
		} )
		.insertAfter( context.$textarea )
		.load( function() {
			// Internet Explorer will reload the iframe once we turn on design mode, so we need to only turn it on
			// during the first run, and then bail
			if ( !this.isSecondRun ) {
				// Turn the document's design mode on
				context.$iframe[0].contentWindow.document.designMode = 'on';
				// Let the rest of this function happen next time around
				if ( $.browser.msie ) {
					this.isSecondRun = true;
					return;
				}
			}
			// Get a reference to the content area of the iframe
			context.$content = $( context.$iframe[0].contentWindow.document.body );
			// If we just do "context.$content.text( context.$textarea.val() )", Internet Explorer will strip out the
			// whitespace charcters, specifically "\n" - so we must manually encode the text and append it
			var html = context.$textarea.val().replace( /\</g, '&lt;' ).replace( /\>/g, '&gt;' );
			// We must do some extra processing on IE to avoid dirty diffs, specifically IE will collapse leading spaces
			if ( $.browser.msie ) {
				// Browser sniffing is not ideal, but executing this code on a non-broken browser doesn't cause harm
				if ( $.browser.versionNumber <= 7 ) {
					// Replace all spaces matching &nbsp; - IE <= 7 needs this because of its overzealous
					// whitespace collapsing;
					html = html.replace( / /g, "&nbsp;" );
				} else {
					// IE8 is happy if we just convert the first leading space to &nbsp;
					html = html.replace( /(^|\n) /g, "$1&nbsp;" );
				}
				html = html.replace( /\t/g, '<span class="wikiEditor-tab"></span>' );
			}
			context.$content.html( html.replace( /\r?\n/g, '<br />' ) );
			// Reflect direction of parent frame into child
			if ( $( 'body' ).is( '.rtl' ) ) {
				context.$content.addClass( 'rtl' ).attr( 'dir', 'rtl' );
			}
			// Activate the iframe, encoding the content of the textarea and copying it to the content of the iframe
			context.$textarea.attr( 'disabled', true );
			context.$textarea.hide();
			context.$iframe.show();
			// Let modules know we're ready to start working with the content
			context.fn.trigger( 'ready' );
			// Setup event handling on the iframe
			$( context.$iframe[0].contentWindow.document )
				.bind( 'keyup mouseup paste cut encapsulateSelection', function( event ) {
					context.fn.trigger( 'change', event );
				} )
				.delayedBind( 250, 'keyup mouseup paste cut encapsulateSelection', function( event ) {
					context.fn.trigger( 'delayedChange', event );
				} );
		} );
	// Attach a submit handler to the form so that when the form is submitted the content of the iframe gets decoded and
	// copied over to the textarea
	context.$textarea.closest( 'form' ).submit( function() {
		context.$textarea.attr( 'disabled', false );
		context.$textarea.val( context.$textarea.textSelection( 'getContents' ) );
	} );
	/* FIXME: This was taken from EditWarning.js - maybe we could do a jquery plugin for this? */
	// Attach our own handler for onbeforeunload which respects the current one
	context.fallbackWindowOnBeforeUnload = window.onbeforeunload;
	window.onbeforeunload = function() {
		context.$textarea.val( context.$textarea.textSelection( 'getContents' ) );
		return context.fallbackWindowOnBeforeUnload ? context.fallbackWindowOnBeforeUnload() : null;
	}
}

/* API Execution */

// Since javascript gives arguments as an object, we need to convert them so they can be used more easily
arguments = $.makeArray( arguments );
// There would need to be some arguments if the API is being called
if ( arguments.length > 0 ) {
	// Handle API calls
	var call = arguments.shift();
	if ( call in context.api ) {
		context.api[call]( context, typeof arguments[0] == 'undefined' ? {} : arguments[0] );
	}
}

// Store the context for next time, and support chaining
return $(this).data( 'wikiEditor-context', context );

}; } )( jQuery );
