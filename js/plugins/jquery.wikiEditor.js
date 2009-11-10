/**
 * This plugin provides a way to build a user interface around a textarea. You
 * can build the UI from a confguration..
 * 	$j( 'div#edittoolbar' ).wikiEditor(
 * 		{ 'modules': { 'toolbar': { ... config ... } } }
 * 	);
 * ...and add modules after it's already been initialized...
 * 	$j( 'textarea#wpTextbox1' ).wikiEditor(
 * 		'addModule', 'toc', { ... config ... }
 *	);
 * ...using the API, which is still be finished.
 */
( function( $ ) {

$.wikiEditor = {
	'modules': {},
	'instances': [],
	/**
	 * For each browser name, an array of conditions that must be met are supplied in [operaton, value] form where
	 * operation is a string containing a JavaScript compatible binary operator and value is either a number to be
	 * compared with $.browser.versionNumber or a string to be compared with $.browser.version
	 */
	'browsers': {
		'ltr': {
			'msie': [['>=', 7]],
			'firefox': [
				['>=', 2],
				['!=', '2.0'],
				['!=', '2.0.0.1'],
				['!=', '2.0.0.2'],
				['!=', '2.0.0.3'],
				['!=', '2.0.0.4']
			],
			'opera': [['>=', 9.6]],
			'safari': [['>=', 3.1]]
		},
		'rtl': {
			'msie': [['>=', 8]],
			'firefox': [
				['>=', 2],
				['!=', '2.0'],
				['!=', '2.0.0.1'],
				['!=', '2.0.0.2'],
				['!=', '2.0.0.3'],
				['!=', '2.0.0.4']
			],
			'opera': [['>=', 9.6]],
			'safari': [['>=', 3.1]]
		}
	},
	/**
	 * Path to images - this is a bit messy, and it would need to change if
	 * this code (and images) gets moved into the core - or anywhere for
	 * that matter...
	 */
	'imgPath' : wgScriptPath + '/extensions/UsabilityInitiative/images/wikiEditor/',
	'isSupportKnown': function() {
		return $.browser.name in $.wikiEditor.browsers[$( 'body.rtl' ).size() ? 'rtl' : 'ltr'];
	},
	'isSupported': function() {
		if ( !$.wikiEditor.isSupportKnown ) {
			// Assume good faith :)
			return true;
		}
		var browser = $.wikiEditor.browsers[$( 'body.rtl' ).size() ? 'rtl' : 'ltr'][$.browser.name];
		for ( condition in browser ) {
			var op = browser[condition][0];
			var val = browser[condition][1];
			if ( typeof val == 'string' ) {
				if ( !( eval( '$.browser.version' + op + '"' + val + '"' ) ) ) {
					return false;
				}
			} else if ( typeof val == 'number' ) {
				if ( !( eval( '$.browser.versionNumber' + op + val ) ) ) {
					return false;
				}
			}
		}
		return true;
	},
	// Wraps gM from js2, but allows raw text to supercede
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
			return gM( object[property + 'Msg'] );
		} else {
			return '';
		}
	},
	'fixOperaBrokenness': function( s ) {
		/*
		// This function works around Opera's
		// broken newline handling in textareas.
		// .val() has \n while selection functions
		// treat newlines as \r\n
		
		if ( typeof $.isOperaBroken == 'undefined' && $.wikiEditor.instances.length > 0 ) {
			// Create a textarea inside a div
			// with zero area, to hide it properly
			var div = $( '<div />' )
				.height( 0 )
				.width( 0 )
				.insertBefore( $.wikiEditor.instances[0] );
			var textarea = $( '<textarea></textarea>' )
				.height( 0 )
				.appendTo( div )
				.val( "foo\r\nbar" );
			// Try to search&replace bar --> BAR
			var index = textarea.val().indexOf( 'bar' );
			textarea.select();
			textarea.setSelection( index, index + 3 );
			textarea.encapsulateSelection( '', 'BAR', '', false, true );
			if ( textarea.val().substr( -4 ) != 'BARr' )
				$.isOperaBroken = false;
			else
				$.isOperaBroken = true;
			div.remove();
		}
		if ( $.isOperaBroken )
			s = s.replace( /\n/g, "\r\n" );
		*/
		return s;
	}
};

$.fn.wikiEditor = function() {

/* Initialization */

// The wikiEditor context is stored in the element, so when this function
// gets called again we can pick up where we left off
var context = $(this).data( 'wikiEditor-context' );

if ( typeof context == 'undefined' ) {
	
	/* Base UI Construction */
	
	var instance = $.wikiEditor.instances.length;
	context = { '$textarea': $(this), 'modules': {}, 'data': {}, 'instance': instance };
	$.wikiEditor.instances[instance] = $(this);
	// Encapsulate the textarea with some containers for layout
	$(this)
		.wrap( $( '<div></div>' ).addClass( 'wikiEditor-ui' ) )
		.wrap( $( '<div></div>' ).addClass( 'wikiEditor-ui-left' ) )
		.wrap( $( '<div></div>' ).addClass( 'wikiEditor-ui-bottom' ) )
		.wrap( $( '<div></div>' ).addClass( 'wikiEditor-ui-text' ) );	
	// Get a reference to the outer container
	context.$ui = $(this).parent().parent().parent().parent();
	context.$ui.after( $( '<div style="clear:both;"></div>' ) );
	// Attach a right container
	context.$ui.append( $( '<div></div>' ).addClass( 'wikiEditor-ui-right' ) );
	// Attach a top container to the left pane
	context.$ui.find( '.wikiEditor-ui-left' ).prepend( $( '<div></div>' ).addClass( 'wikiEditor-ui-top' ) );
	
	/* Magic IFRAME Construction */
	
	// Create an iframe in place of the text area
	context.$iframe = $( '<iframe></iframe>' )
		.attr( 'frameborder', 0 )
		.css( {
			'backgroundColor': 'white',
			'width': '100%',
			'height': context.$textarea.height(),
			'display': 'none',
			'overflow-y': 'scroll',
			'overflow-x': 'hidden',
		})
		.insertAfter( context.$textarea );
	
	/*
	 * For whatever strange reason, this code needs to be within a timeout or it doesn't work - it seems to be that
	 * the DOM manipulation to add the iframe happens asynchronously and this code that depends on it actually being
	 * finished doesn't function on the right reference.
	 */
	setTimeout( function() {
		// Setup the iframe with a basic document
		context.$iframe[0].contentWindow.document.open();
		context.$iframe[0].contentWindow.document.write(
			'<html><head><title>wikiEditor</title></head><body style="margin:0;padding:0;width:100%;height:100%;">' +
			'<pre style="margin:0;padding:0;width:100%;height:100%;white-space:pre-wrap;"></pre></body></html>'
		);
		context.$iframe[0].contentWindow.document.close();
		// Turn the document's design mode on
		context.$iframe[0].contentWindow.document.designMode = 'on';
		// Get a reference to the content area of the iframe 
		context.$content = context.$iframe.contents().find( 'body > pre' );
		
		/* Magic IFRAME Activation */
		
		// Activate the iframe, encoding the content of the textarea and copying it to the content of the iframe
		context.$textarea.attr( 'disabled', true );
		// We need to properly escape any HTML entities like &amp;, &lt; and &gt; so they end up as visible
		// characters rather than actual HTML tags in the code editor container.
		context.$content.text( context.$textarea.val() );
		context.$textarea.hide();
		context.$iframe.show();
	}, 1 );
	
	// Attach a submit handler to the form so that when the form is submitted the content of the iframe gets decoded and
	// copied over to the textarea
	context.$textarea.closest( 'form' ).submit( function() {
		context.$textarea.attr( 'disabled', false );
		context.$textarea.val( context.$textarea.getSelection( 'getContents' ) );
	} );
	
	/* This is probably only a textarea issue, thus no longer needed
	 * 
	// Some browsers don't restore the cursor position on refocus properly
	// Do it for them
	$(this)
		.focus( function() {
			var pos = $(this).data( 'wikiEditor-cursor' );
			if ( pos )
				$(this).setSelection( pos[0], pos[1] );
			$(this).data( 'wikiEditor-cursor', false );
		})
		.blur( function() {
			$(this).data( 'wikiEditor-cursor', $(this).getCaretPosition( true ) );
		});
	*/
	
	// Create a set of standard methods for internal and external use
	context.api = {
		/**
		 * Accepts either a string of the name of a module to add without any
		 * additional configuration parameters, or an object with members keyed with
		 * module names and valued with configuration objects
		 */
		'addModule': function( context, data ) {
			// A safe way of calling an API function on a module
			function callModuleApi( module, call, data ) {
				if (
					module in $.wikiEditor.modules &&
					'fn' in $.wikiEditor.modules[module] &&
					call in $.wikiEditor.modules[module].fn
				) {
					$.wikiEditor.modules[module].fn[call]( context, data );
				}
			}
			if ( typeof data == 'string' ) {
				callModuleApi( data, 'create', {} );
			} else if ( typeof data == 'object' ) {
				for ( module in data ) {
					if ( typeof module == 'string' ) {
						callModuleApi( module, 'create', data[module] );
					}
				}
			}
		}
	};
	// Allow modules to extend the API
	for ( module in $.wikiEditor.modules ) {
		if ( 'api' in $.wikiEditor.modules[module] ) {
			for ( call in $.wikiEditor.modules[module].api ) {
				// Modules may not overwrite existing API functions - first come,
				// first serve
				if ( !( call in context.api ) ) {
					context.api[call] = $.wikiEditor.modules[module].api[call];
				}
			}
		}
	}
	/* Create a set of functions for interacting with the editor content
	 * DO NOT CALL THESE DIRECTLY, use .textSelection( 'functionname', options ) instead
	 */
	context.fn = {
		/*
		 * When finishing these functions, take a look at jquery.textSelection.js because this is designed to be API
		 * compatible with those functions. The key difference is that these perform actions on a designMode iframe
		 */
		
		/**
		 * Gets the complete contents of the iframe
		 */
		'getContents': function() {
			// We use .html() instead of .text() so HTML entities are handled right
			// Setting the HTML of the textarea doesn't work on all browsers, use a dummy <div> instead
			return $( '<div />' )
				.html( context.$content.html().replace( /\<br\>/g, "\n" ) )
				.text();
		},
		/**
		 * Gets the currently selected text in the content
		 */
		'getSelection': function() {
			var userSelection;
			if (window.getSelection) {
				userSelection = window.getSelection();
			}
			else if (document.selection) { // should come last; Opera!
				userSelection = document.selection.createRange();
			}
			var selectedText = userSelection;
			if (userSelection.text){
				selectedText = userSelection.text;
			}
			return selectedText;
		},
		/**
		 * Inserts text at the begining and end of a text selection, optionally inserting text at the caret when
		 * selection is empty.
		 */
		'encapsulateSelection': function( options ) {
			// ...
			// Scroll the textarea to the inserted text
			//?.scrollToCaretPosition();
			// Trigger the encapsulateSelection event (this might need to get named something else/done differently)
			//context.$textarea.trigger( 'encapsulateSelection', [ pre, peri, post, ownline, replace ] );
		},
		/**
		 * Gets the position (in resolution of bytes not nessecarily characters) in a textarea
		 */
		'getCaretPosition': function( options ) {
			// ...
			//reurn character position
		},
		/**
		 * Sets the selection of the content
		 * 
		 * @param start Character offset of selection start
		 * @param end Character offset of selection end
		 */
		'setSelection': function( options ) {
			// ...
		},
		/**
		 * Scroll a textarea to the current cursor position. You can set the cursor position with setSelection()
		 */
		'scrollToCaretPosition': function( options ) {
			// ...
			//context.$textarea.trigger( 'scrollToPosition' );
		}
	};
}

// If there was a configuration passed, it's assumed to be for the addModule
// API call
if ( arguments.length > 0 && typeof arguments[0] == 'object' ) {
	context.api.addModule( context, arguments[0] );
} else {
	// Since javascript gives arguments as an object, we need to convert them
	// so they can be used more easily
	arguments = $.makeArray( arguments );
	if ( arguments.length > 0 ) {
		// Handle API calls
		var call = arguments.shift();
		if ( call in context.api ) {
			context.api[call]( context, arguments[0] == undefined ? {} : arguments[0] );
		}
	}
}

// Store the context for next time, and support chaining
return $(this).data( 'wikiEditor-context', context );

}; } )( jQuery );