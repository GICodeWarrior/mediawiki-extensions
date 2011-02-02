// Add support for html5 / mwEmbed elements to IE
// For discussion and comments, see: http://remysharp.com/2009/01/07/html5-enabling-script/
'video audio source track'.replace(/\w+/g,function( n ){ document.createElement( n ) } );

/**
 * mwEmbedSupport includes shared mwEmbed utilities that either
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
	 * mw.ready is equivalent to calling:  
	 * $j(mw).bind( 'InterfacesReady', callback );
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
	mw.ready = function( callback ) {						
		if( mw.interfacesReadyFlag  === false ) {		
			// Add the callbcak to the onLoad function stack
			$j( mw ).bind( 'InterfacesReady', callback );
		} else { 
			// If mwReadyFlag is already "true" issue the callback directly:
			callback();
		}		
	};
	
	// mw.interfacesReadyFlag ( set to true once interfaces are ready )
	mw.interfacesReadyFlag = false; 
	
	// Once interfaces are ready update the mwReadyFlag
	$j( mw ).bind('InterfacesReady', function(){ mw.interfacesReadyFlag  = true } );	
	
	// Once the DOM is ready start setting up interfaces
	$j( document ).ready(function(){
		$j( mw ).triggerQueueCallback('SetupInterface', function(){
			// All interfaces have been setup trigger InterfacesReady event
			$j( mw ).trigger( 'InterfacesReady' );
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
		if( ! mediaWiki.config.get( name ) ){
			mediaWiki.config.set( name, value );
		}
	};
	mw.load = function( resources, callback ){
		mediaWiki.loader.using( resources, callback, function(){
			// failed to load
		});
	};	
	
	/**
	 * legacy support to get the mwEmbed resource path:
	 */
	mw.getMwEmbedPath = function(){
		 return mediaWiki.config.get( 'wgLoadScript' ).replace('load.php', '');
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
		if( !mediaWiki.config.get( name )){
			mw.setConfig( name, value );
			return ;
		}
		if( typeof mediaWiki.config.get( name ) == 'object' ){
			mw.setConfig( name, $.extend( mediaWiki.config.get( name ), value ) );
		}		
	};

	/**
	 * gM ( get Message ) in js2 conflated jQuery return type with string return type
	 * Do a legacy check for input parameters and 'do the right thing' 
	 */
	window.gM = function( key, args ){
		var paramaters = [];
		if( $.isArray( args ) ){
			paramaters = args;
		} else {
			paramaters = $.makeArray( arguments ).slice(1);
		}
		
		// Check if we have to use the jquery method or can use the native get msg support
		for(var i=0;i < paramaters.length; i++){
			var param = paramaters[i];
			if( typeof param == 'function' || param instanceof jQuery ){
				// TODO use mwMessage response
				return $j( '<span />').text( mediaWiki.msg( key, paramaters) );
			}
		};
		// Else use normal mediaWiki string based gM
		return mediaWiki.msg( key, paramaters);
	};
	
	/**
	 * Utility Functions
	 * 
	 * TOOD some of these utility functions are used in the upload Wizard, break them out into 
	 * associated files. 
	 */		
	/**
	 * parseUri 1.2.2 (c) Steven Levithan <stevenlevithan.com> MIT License
	 */
	mw.parseUri = function (str) {
		var	o   = mw.parseUri.options,
			m   = o.parser[o.strictMode ? "strict" : "loose"].exec(str),
			uri = {},
			i   = 14;
	
		while (i--) uri[o.key[i]] = m[i] || "";
	
		uri[o.q.name] = {};
		uri[o.key[12]].replace(o.q.parser, function ($0, $1, $2) {
			if ($1) uri[o.q.name][$1] = $2;
		});
	
		return uri;
	};
	
	/**
	 * getAbsoluteUrl takes a src and returns the absolute location given the
	 * document.URL or a contextUrl param
	 * 
	 * @param {String}
	 *            src path or url
	 * @param {String}
	 *            contextUrl The domain / context for creating an absolute url
	 *            from a relative path
	 * @return {String} absolute url
	 */
	mw.absoluteUrl = function( src, contextUrl ) {
	
		var parsedSrc = mw.parseUri( src );
	
		// Source is already absolute return:
		if( parsedSrc.protocol != '') {
			return src;
		}
	
		// Get parent Url location the context URL
		if( !contextUrl ) {
			contextUrl = document.URL;
		}
		var parsedUrl = mw.parseUri( contextUrl );
	
		// Check for IE local file that does not flip the slashes
		if( parsedUrl.directory == '' && parsedUrl.protocol == 'file' ){
			// pop off the file
			var fileUrl = contextUrl.split( '\\');
			fileUrl.pop();
			return 	fileUrl.join('\\') + '\\' + src;
		}
	
		// Check for leading slash:
		if( src.indexOf( '/' ) === 0 ) {
			return parsedUrl.protocol + '://' + parsedUrl.authority + src;
		}else{
			return parsedUrl.protocol + '://' + parsedUrl.authority + parsedUrl.directory + src;
		}
	};
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
	 * Parse URI function
	 * 
	 * For documentation on its usage see:
	 * http://stevenlevithan.com/demo/parseuri/js/
	 */
	mw.parseUri.options = {
		strictMode: false,
		key: ["source", "protocol", "authority", "userInfo", "user", "password", "host",
				"port", "relative", "path", "directory", "file", "query", "anchor"],
		q: {
			name: "queryKey",
			parser: /(?:^|&)([^&=]*)=?([^&]*)/g
		},
		parser: {
			strict: /^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
			loose:  /^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/
		}
	};
	
	/**
	 * Given a float number of seconds, returns npt format response. ( ignore
	 * days for now )
	 * 
	 * @param {Float}
	 *            sec Seconds
	 * @param {Boolean}
	 *            show_ms If milliseconds should be displayed.
	 * @return {Float} String npt format
	 */
	mw.seconds2npt = function( sec, show_ms ) {
		if ( isNaN( sec ) ) {
			mw.log("Warning: trying to get npt time on NaN:" + sec);			
			return '0:00:00';
		}
		
		var tm = mw.seconds2Measurements( sec );
				
		// Round the number of seconds to the required number of significant
		// digits
		if ( show_ms ) {
			tm.seconds = Math.round( tm.seconds * 1000 ) / 1000;
		} else {
			tm.seconds = Math.round( tm.seconds );
		}
		if ( tm.seconds < 10 ){
			tm.seconds = '0' +	tm.seconds;
		}
		if( tm.hours == 0 ){
			hoursStr = '';
		} else {
			if ( tm.minutes < 10 )
				tm.minutes = '0' + tm.minutes;
			
			hoursStr = tm.hours + ":"; 
		}
		return hoursStr + tm.minutes + ":" + tm.seconds;
	};
	
	/**
	 * Given seconds return array with 'days', 'hours', 'min', 'seconds'
	 * 
	 * @param {float}
	 *            sec Seconds to be converted into time measurements
	 */
	mw.seconds2Measurements = function ( sec ){
		var tm = {};
		tm.days = Math.floor( sec / ( 3600 * 24 ) );
		tm.hours = Math.floor( sec / 3600 );
		tm.minutes = Math.floor( ( sec / 60 ) % 60 );
		tm.seconds = sec % 60;
		return tm;
	};
	
	/**
	 * Take hh:mm:ss,ms or hh:mm:ss.ms input, return the number of seconds
	 * 
	 * @param {String}
	 *            npt_str NPT time string
	 * @return {Float} Number of seconds
	 */
	mw.npt2seconds = function ( npt_str ) {
		if ( !npt_str ) {
			// mw.log('npt2seconds:not valid ntp:'+ntp);
			return 0;
		}
		// Strip {npt:}01:02:20 or 32{s} from time if present
		npt_str = npt_str.replace( /npt:|s/g, '' );
	
		var hour = 0;
		var min = 0;
		var sec = 0;
	
		times = npt_str.split( ':' );
		if ( times.length == 3 ) {
			sec = times[2];
			min = times[1];
			hour = times[0];
		} else if ( times.length == 2 ) {
			sec = times[1];
			min = times[0];
		} else {
			sec = times[0];
		}
		// Sometimes a comma is used instead of period for ms
		sec = sec.replace( /,\s?/, '.' );
		// Return seconds float
		return parseInt( hour * 3600 ) + parseInt( min * 60 ) + parseFloat( sec );
	};
	
	/**
	 * addLoaderDialog small helper for displaying a loading dialog
	 * 
	 * @param {String}
	 *            dialogHtml text Html of the loader msg
	 */
	mw.addLoaderDialog = function( dialogHtml ) {
		$dialog = mw.addDialog( {
			'title' : dialogHtml, 
			'content' : dialogHtml + '<br>' + 
				$j('<div />')
				.loadingSpinner()
				.html() 
		});
		return $dialog;
	};
	
	
	
	/**
	 * Add a (temporary) dialog window:
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
		$j( '#mwTempLoaderDialog' ).remove();			
		
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
		$j( 'body' ).append( 
			$j('<div />') 
			.attr( {
				'id' : "mwTempLoaderDialog",
				'title' : options.title
			})
			.css({
				'display': 'none'
			})
			.append( options.content )
		);
	
		// Build the uiRequest
		var uiRequest = [ '$j.ui.dialog' ];
		if( options.draggable ){
			uiRequest.push( '$j.ui.draggable' );
		}
		if( options.resizable ){
			uiRequest.push( '$j.ui.resizable' );
		}
		
		// Special button string 
		if ( typeof options.buttons == 'string' ) {
			var buttonMsg = options.buttons;
			buttons = { };
			options.buttons[ buttonMsg ] = function() {
				$j( this ).dialog( 'close' );
			};
		}				
		
		// Load the dialog resources
		mw.load([
			[
				'$j.ui'
			],
			uiRequest
		], function() {
			$j( '#mwTempLoaderDialog' ).dialog( options );
		} );
		return $j( '#mwTempLoaderDialog' );
	};
	
	/**
	 * Close the loader dialog created with addLoaderDialog
	 */
	mw.closeLoaderDialog = function() {		
		$j( '#mwTempLoaderDialog' ).dialog( 'destroy' ).remove();
	};
	
	// MOVE TO jquery.client
	// move to jquery.client
	mw.isIphone = function(){
		return ( navigator.userAgent.indexOf('iPhone') != -1 && ! mw.isIpad() );
	};
	// Uses hack described at:
	// http://www.bdoran.co.uk/2010/07/19/detecting-the-iphone4-and-resolution-with-javascript-or-php/
	mw.isIphone4 = function(){
		return ( mw.isIphone() && ( window.devicePixelRatio && window.devicePixelRatio >= 2 ) );		
	};
	mw.isIpod = function(){
		return (  navigator.userAgent.indexOf('iPod') != -1 );
	};
	mw.isIpad = function(){
		return ( navigator.userAgent.indexOf('iPad') != -1 );
	};
	// Android 2 has some restrictions vs other mobile platforms
	mw.isAndroid2 = function(){		
		return ( navigator.userAgent.indexOf( 'Android 2.') != -1 );
	};
	
	/**
	 * Fallforward system by default prefers flash.
	 * 
	 * This is separate from the EmbedPlayer library detection to provide
	 * package loading control NOTE: should be phased out in favor of browser
	 * feature detection where possible
	 * 
	 */
	mw.isHTML5FallForwardNative = function(){
		if( mw.isMobileHTML5() ){
			return true;
		}
		// Check for url flag to force html5:
		if( document.URL.indexOf('forceMobileHTML5') != -1 ){
			return true;
		}
		// Fall forward native:
		// if the browser supports flash ( don't use html5 )
		if( mw.supportsFlash() ){
			return false;
		}
		// No flash return true if the browser supports html5 video tag with
		// basic support for canPlayType:
		if( mw.supportsHTML5() ){
			return true;
		}
		
		return false;
	};
	
	mw.isMobileHTML5 = function(){
		// Check for a mobile html5 user agent:
		if ( mw.isIphone() || 
			 mw.isIpod() || 
			 mw.isIpad() ||
			 mw.isAndroid2()
		){
			return true;
		}
		return false;
	};
	mw.supportsHTML5 = function(){
		// Blackberry is evil in its response to canPlayType calls.
		if( navigator.userAgent.indexOf('BlackBerry') != -1 ){
			return false ;
		}
		var dummyvid = document.createElement( "video" );
		if( dummyvid.canPlayType ) {
			return true;
		}
		return false;	
	};
	
	mw.supportsFlash = function(){
		// Check if the client does not have flash and has the video tag
		if ( navigator.mimeTypes && navigator.mimeTypes.length > 0 ) {
			for ( var i = 0; i < navigator.mimeTypes.length; i++ ) {
				var type = navigator.mimeTypes[i].type;
				var semicolonPos = type.indexOf( ';' );
				if ( semicolonPos > -1 ) {
					type = type.substr( 0, semicolonPos );
				}
				if (type == 'application/x-shockwave-flash' ) {
					// flash is installed
					return true;
				}
			}
		}

		// for IE:
		var hasObj = true;
		if( typeof ActiveXObject != 'undefined' ){
			try {
				var obj = new ActiveXObject( 'ShockwaveFlash.ShockwaveFlash' );
			} catch ( e ) {
				hasObj = false;
			}
			if( hasObj ){
				return true;
			}
		}
		return false;
	};
	
	
} )( mediaWiki, jQuery );