// Add support for html5 / mwEmbed elements to IE
// For discussion and comments, see: http://remysharp.com/2009/01/07/html5-enabling-script/
'video audio source track'.replace(/\w+/g,function( n ){ document.createElement( n ) } );

/**
 * MwEmbedSupport includes shared mwEmbed utilities that either
 * wrap core mediawiki functionality or support legacy mwEmbed module code  
 * 
 * @license
 * mwEmbed
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * 
 * @copyright (C) 2010 Kaltura 
 * @author Michael Dale ( michael.dale at kaltura.com )
 * 
 * @url http://www.kaltura.org/project/HTML5_Video_Media_JavaScript_Library
 *
 * Libraries used include code license in headers
 * 
 * @dependencies  
 */

( function( mw, $ ) {

	/**
	 * Set the mwEmbedVersion
	 */
	window.MW_EMBED_VERSION = '1.1g';
	
	// Globals to pre-set ready functions in dynamic loading of mwEmbed
	if( typeof window.preMwEmbedReady == 'undefined'){
		window.preMwEmbedReady = [];	
	}
	// Globals to pre-set config values in dynamic loading of mwEmbed
	if( typeof window.preMwEmbedConfig == 'undefined') {
		window.preMwEmbedConfig = [];
	}
	
	/**
	 * Enables javascript modules and pages to target a "interfaces ready" state. 
	 * 
	 * This is different from jQuery(document).ready() ( jQuery ready is not
	 * friendly with dynamic includes and not friendly with core interface
	 * asynchronous build out. ) This allows core interface components to do async conditional
	 * load calls, and trigger a ready event once the javascript interface build out is complete
	 * 
	 * For example making <video> tags on the page have a video api even if the browser
	 * does not support html5 requires dynamic loading that can only happen once the page dom is
	 * ready 
	 * 
	 * @param {Function}
	 *            callback Function to run once DOM and jQuery are ready
	 */
	// mw.interfacesReadyFlag ( set to true once interfaces are ready )
	mw.interfacesReadyFlag = false; 
	
	mw.ready = function( callback ) {						
		if( mw.interfacesReadyFlag  === false ) {		
			// Add the callbcak to the onLoad function stack
			$( mw ).bind( 'InterfacesReady', callback );
		} else { 
			// If mwReadyFlag is already "true" issue the callback directly:
			callback();
		}		
	};
		// Once interfaces are ready update the mwReadyFlag
	$( mw ).bind('InterfacesReady', function(){ mw.interfacesReadyFlag  = true; } );	
	
	// Once the DOM is ready start setting up interfaces
	$( document ).ready(function(){
		$( mw ).triggerQueueCallback('SetupInterface', function(){
			// All interfaces have been setup trigger InterfacesReady event
			$( mw ).trigger( 'InterfacesReady' );
		});
	});

	
	/**
	 * Aliased functions 
	 * 
	 * Wrap mediaWiki functionality while we port over the libraries 
	 */
	mw.setConfig = function( name, value ){
		mediaWiki.config.set( name, value );
	};
	mw.getConfig = function( name, value ){
		return mediaWiki.config.get( name, value );
	};
	mw.setDefaultConfig = function( name, value ){
		if( mediaWiki.config.get( name ) === null ){
			mediaWiki.config.set( name, value );
		}
	};
	/**
	 * Aliased load function
	 */
	mw.load = function( resources, callback ){
		mediaWiki.loader.using( resources, callback, function(){
			// failed to load
			mw.log("Failed to load resources:"  + resources );
		});
	};	
	
	/**
	 * legacy support to get the mwEmbed resource path:
	 */
	mw.getMwEmbedPath = function(){
		if ( mediaWiki.config.get( 'wgLoadScript' ) ){
			return mediaWiki.config.get( 'wgLoadScript' ).replace('load.php', '');
		}
		return false;
	};
	
	/**
	 * Merge in a configuration value:
	 */
	mw.mergeConfig = function( name, value ){
		if( typeof name == 'object' ) {
			$j.each( name, function( inx, val) {
				mw.mergeConfig( inx, val );
			});
			return ;
		}
		var existingValue = mediaWiki.config.get( name );
		if( !existingValue || typeof existingValue == 'string'){
			mw.setConfig( name, value );
			return ;
		}
		if( typeof mediaWiki.config.get( name ) == 'object' ){
			if( $.isArray( existingValue) && $.isArray( value ) ){
				for( var i =0; i <  value.length ; i ++ ){
					existingValue.push( value[i] );
				}
				mw.setConfig( name, $.unique( existingValue ) );
			} else {
				mw.setConfig( name, $.extend( {}, existingValue, value) );
			}
			return ;
		}
	};

	/**
	* Check if an object is empty or if its an empty string. 
	*
	* @param {Object} object Object to be checked
	* @return {Boolean}
	*/
	mw.isEmpty = function( obj ) {
		if( typeof obj === 'string' ) {
			if( obj === '' ) return true;
			// Non empty string: 
			return false;
		}

		// If an array check length:
		if( Object.prototype.toString.call( obj ) === "[object Array]"
			&& obj.length === 0 ) {
			return true;
		}

		// Else check as an obj: 
		for( var i in obj ) { return false; }

		// Else obj is empty:
		return true;
	};

	/**
	* Opposite of mw.isEmpty
	*
	* @param {Object} object Object to be checked
	* @return {Boolean}
	*/
	mw.isFull = function( obj ) {
		return ! mw.isEmpty( obj );
	};

	/**
	 * Check if something is defined
	 * (inlineable?)
	 * @param {Object}
	 * @return boolean
	 */
	mw.isDefined = function( obj ) {
		return typeof obj !== 'undefined'; 
	};


	/**
	 * Upper-case the first letter of a string.
	 * @param string
	 * @return string with first letter uppercased.
	 */
	mw.ucfirst = function( s ) {
		return s.substring(0,1).toUpperCase() + s.substr(1);
	};
	
	/**
	 * gM ( get Message ) in js2 conflated jQuery return type with string return type
	 * Do a legacy check for input parameters and call the correct function. 
	 * 
	 * TODO Replace with new Neil's new parser functions 
	 */
	window.gM = function( key, args ){
		var paramaters = [];
		if( $.isArray( args ) ){
			paramaters = args;
		} else {
			paramaters = $.makeArray( arguments ).slice(1);
		}	
		
		var needsSpecialSwap = function( o ) {
			return ( typeof o === 'function' || o instanceof jQuery );
		};

		var getSwapId = function( index ) {
			return 'mw_message_swap_index_' + key + '_' + index;
		};

		var doSpecialSwap = false;	
		
		var	text = mediaWiki.messages.get( key );
		if( !text){
			return '<' + key + '>';
		}
		
		// replace links: 		
		text = text.replace( /\[(\S+)\s+([^\]]*)\]/g, function( matched, link, linkText ) {
			var indexIdAttribute = '';
			// Check if the link is a swap index or just a string
			if( link[0] == '$' ){
				var index = parseInt( link.replace(/\$/,''), 10 ) - 1;		    		
				// If the parameter is a text string directly replace it 
				if( typeof paramaters[ index ] == 'string' ){
					link =  paramaters[ index ];
				} else if ( needsSpecialSwap( paramaters[ index ] ) ) {
					link = '#';
					indexIdAttribute = ' id="' + getSwapId( index ) + '" ';
					doSpecialSwap = true;
				} else {
					throw new Error( 'Cannot substitute parameter with unrecognized type ' + typeof paramaters[index] );
				}
			}
			
			return '<a href="' + link + '" ' + indexIdAttribute + '>' + linkText + '</a>';
		});
		
		// Swap $1 replacements (not in a link):
		text = text.replace( /\$(\d+)/g, function( matched, indexString ) {
			var index = parseInt( indexString, 10 ) - 1;
			// Check the paramaters type
			if( paramaters[index] && needsSpecialSwap( paramaters[index] ) ) {
				doSpecialSwap = true;
				return '<span id="' + getSwapId( index ) + '></span>';
			} else {
				// directly swap in the index or a missing index indicator ( $1{int}
				return index in paramaters ? paramaters[index] : '$' + match;
			}
		} );
		
		// Create a parser object with default set of options:
		var parsedText = new mediaWiki.language.parser( text, {} );
		// Get the html representation of wikitext ( all that messages deal with right now ) 
		text = parsedText.getHTML();
		
		// If the parameters are jQuery objects or functions, we should now "swap" those objects in.
		if( doSpecialSwap ) {			
			// Add bindings to swap index and return binded html jQuery objects
			for( var index=0; index < paramaters.length; index++ ) {
				var parameter = paramaters[index];
				var $swapTarget = this.find( '#' + getSwapId( index ) );
				if ( ! $swapTarget.length ) {
					continue;
				}

				// if parameter was a function, simply add it to the click handler
				if( typeof parameter == 'function' ){
					$swapTarget.click( parameter );
				}
		
				// if parameter was a jQuery object, make it "wrap around" the text we have
				if( parameter instanceof jQuery ){			
					// make the jQuery parameter contain the same text as the swap target
					parameter.text( $swapTarget.text() );
					// replace the swap target with the jQuery parameter
					$swapTarget.replaceWith( parameter );
				}
			}
		}
		
		return text;
	};
	
	/**
	 * Utility Functions
	 */		
	
	/**
	 * A version comparison utility function Handles version of types
	 * {Major}.{MinorN}.{Patch}
	 * 
	 * Note this just handles version numbers not patch letters.
	 * 
	 * @param {String}
	 *            minVersion Minnium version needed
	 * @param {String}
	 *            clientVersion Client version to be checked
	 * 
	 * @return true if the version is at least of minVersion false if the
	 *         version is less than minVersion
	 */
	mw.versionIsAtLeast = function( minVersion, clientVersion ) {
		var minVersionParts = minVersion.split('.');
		var clientVersionParts = clientVersion.split('.');
		for( var i =0; i < minVersionParts.length; i++ ) {
			if( parseInt( clientVersionParts[i] ) > parseInt( minVersionParts[i] ) ) {
				return true;
			}
			if( parseInt( clientVersionParts[i] ) < parseInt( minVersionParts[i] ) ) {
				return false;
			}
		}
		// Same version:
		return true;
	};
	
	
	/**
	 * addLoaderDialog small helper for displaying a loading dialog
	 * 
	 * @param {String}
	 *            dialogHtml text Html of the loader msg
	 */
	mw.addLoaderDialog = function( dialogHtml ) {
		if( !dialogHtml ){
			dialogHtml = gM('mwe-loading');
		}
		$dialog = mw.addDialog({
			'title' : dialogHtml, 
			'content' : dialogHtml + '<br>' + 
				$('<div />')
				.loadingSpinner()
				.html() 
		});
		return $dialog;
	};
	
	
	
	/**
	 * Add a dialog window:
	 * 
	 * @param {Object} with following keys: 
	 *            title: {String} Title string for the dialog
	 *            content: {String} to be inserted in msg box
	 *            buttons: {Object} A button object for the dialog Can be a string
	 *            				for the close button
	 * 			  any jquery.ui.dialog option 
	 */
	mw.addDialog = function ( options ) {
		// Remove any other dialog
		$( '#mweDialog' ).remove();			
		
		if( !options){
			options = {};
		}
	
		// Extend the default options with provided options
		var options = $j.extend({
			'bgiframe': true,
			'draggable': true,
			'resizable': false,
			'modal': true
		}, options );
		
		if( ! options.title || ! options.content ){
			mw.log("Error: mwEmbed addDialog missing required options ( title, content ) ");
			return ;
		}
		
		// Append the dialog div on top:
		$( 'body' ).append( 
			$('<div />') 
			.attr( {
				'id' : "mweDialog",
				'title' : options.title
			})
			.css({
				'display': 'none'
			})
			.append( options.content )
		);
	
		// Build the uiRequest
		var uiRequest = [ 'jquery.ui.dialog' ];
		if( options.draggable ){
			uiRequest.push( 'jquery.ui.draggable' );
		}
		if( options.resizable ){
			uiRequest.push( 'jquery.ui.resizable' );
		}
		
		// Special button string 
		if ( typeof options.buttons == 'string' ) {
			var buttonMsg = options.buttons;
			buttons = { };
			options.buttons[ buttonMsg ] = function() {
				$( this ).dialog( 'close' );
			};
		}				
		
		// Load the dialog resources
		mw.load(uiRequest, function() {
			$( '#mweDialog' ).dialog( options );
		} );
		
		return $( '#mweDialog' );
	};
	
	/**
	 * Close the loader dialog created with addLoaderDialog
	 */
	mw.closeLoaderDialog = function() {		
		$( '#mweDialog' ).dialog( 'destroy' ).remove();
	};
	
	
} )( mediaWiki, jQuery );