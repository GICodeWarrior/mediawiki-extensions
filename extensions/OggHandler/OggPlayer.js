// This is a global configuration object which can embed multiple video instances
var wgOggPlayer = {
	'detectionDone': false,
	'vlc-activex': false,

	// List of players in order of preference
	// Downpreffed VLC because it crashes my browser all the damn time -- TS
	'players': ['cortado', 'quicktime-mozilla', 'quicktime-activex', 'vlc-mozilla', 'vlc-activex', 'oggPlugin', 'videoElement'],

	'clientSupports': { 'thumbnail' : true },
	'savedThumbs': {},

	// Configuration from MW
	'msg': {},
	'cortadoUrl' : '',
	'extPathUrl' : '',
	'showPlayerSelect': true,
	'controlsHeightGuess': 20, 

	/**
	 * Main entry point: initialise a video player
	 * Player will be created as a child of the given ID
	 * There may be multiple players in a document.
	 * Parameters are: id, videoUrl, width, height, length, linkUrl, isVideo
	 */
	'init': function ( player, params ) {
		elt = document.getElementById( params.id );

		// Save still image HTML
		if ( !(params.id in this.savedThumbs) ) {
			var thumb = document.createDocumentFragment();
			for ( i = 0; i < elt.childNodes.length; i++ ) {
				thumb.appendChild( elt.childNodes.item( i ).cloneNode( true ) );
			}
			this.savedThumbs[params.id] = thumb;
		}

		this.detect( elt );

		if ( !player ) {
			// See if there is a cookie specifying a preferred player
			var cookieName = "ogg_player=";
			var cookiePos = document.cookie.indexOf(cookieName);
			if (cookiePos > -1) {
				player = document.cookie.substr( cookiePos + cookieName.length );
				var semicolon = player.indexOf( ";" );
				if ( semicolon > -1 ) {
					player = player.substr( cookiePos, semicolon );
					if ( player == 'thumbnail' ) {
						// Can't select this one permanently
						player = false;
					}
				}
			}
		}

		if ( !this.clientSupports[player] )  {
			player = false;
		}

		if ( !player ) {
			for ( var i = 0; i < this.players.length; i++ ) {
				if ( this.clientSupports[this.players[i]] ) {
					player = this.players[i];
					break;
				}
			}
		}

		elt.innerHTML = '';
		switch ( player ) {
			case 'videoElement':
				this.embedVideoElement( elt, params );
				break;
			case 'oggPlugin':
				this.embedOggPlugin( elt, params );
				break;
			case 'vlc-mozilla':
				this.embedVlcPlugin( elt, params );
				break;
			case 'vlc-activex':
				this.embedVlcActiveX( elt, params );
				break;
			case 'cortado':
				this.embedCortado( elt, params );
				break;
			case 'quicktime-mozilla':
				this.embedQuicktimePlugin( elt, params );
				break;
			case 'thumbnail':
			default:
				if ( params.id in this.savedThumbs ) {
					elt.appendChild( this.savedThumbs[params.id].cloneNode( true ) );
				} else {
					elt.appendChild( document.createTextNode( 'Missing saved thumbnail for ' + params.id ) );
				}
				if ( player != 'thumbnail' ) {
					var div = document.createElement( 'div' );
					div.className = 'ogg-player-options';
					div.style.cssText = 'width: ' + ( params.width - 10 ) + 'px;';
					div.innerHTML = this.msg['ogg-no-player'];
					elt.appendChild( div );
					player = 'none';
				}
		}
		if ( player != 'thumbnail' ) {
			var optionsBox = this.makeOptionsBox( player, params );
			var optionsLink = this.makeOptionsLink( params.id );
			var div = document.createElement( 'div' );
			div.appendChild( optionsBox );
			div.appendChild( optionsLink );
			elt.appendChild( div );
		}
	},

	// Detect client capabilities
	'detect': function( elt ) {
		if (this.detectionDone) {
			return;
		}
		this.detectionDone = true;

		// navigator.javaEnabled() only tells us about preferences, we need to
		// search navigator.mimeTypes to see if it's installed
		var javaEnabled = navigator.javaEnabled();
		var uniqueMimesOnly = ( navigator.appName == 'Opera' );
		var invisibleJava = ( navigator.appName == 'Opera' );

		// Opera will switch off javaEnabled in preferences if java can't be found.
		// And it doesn't register an application/x-java-applet mime type like Mozilla does.
		if ( invisibleJava && javaEnabled ) {
			this.clientSupports['cortado'] = true;
		}

		// ActiveX plugins
		// VLC
		if ( this.testActiveX( 'VideoLAN.VLCPlugin.2' ) ) {
			this.clientSupports['vlc-activex'] = true;
		}
		// Java
		if ( javaEnabled && this.testActiveX( 'JavaWebStart.isInstalled' ) ) {
			this.clientSupports['cortado'] = true;
		}
		// QuickTime
		/*
		if ( this.testActiveX( 'QuickTimeCheckObject.QuickTimeCheck.1' ) ) {
			// TODO: Determine if it has XiphQT somehow...
		*/

		// <video> element
		elt.innerHTML = '<video id="testvideo"></video>\n';
		var testvideo = document.getElementById('testvideo');
		if (testvideo && testvideo.play) {
			this.clientSupports['videoElement'] = true;
		}

		// Mozilla plugins
		
		if(navigator.mimeTypes && navigator.mimeTypes.length > 0) {
			for ( var i = 0; i < navigator.mimeTypes.length; i++) {
				var type = navigator.mimeTypes[i].type;
				var semicolonPos = type.indexOf( ';' );
				if ( semicolonPos > -1 ) {
					type = type.substr( 0, semicolonPos );
				}

				var pluginName = navigator.mimeTypes[i].enabledPlugin ? navigator.mimeTypes[i].enabledPlugin.name : '';
				if ( !pluginName ) {
					// In case it is null or undefined
					pluginName = '';
				}
				if ( type == 'application/ogg' ) {
					if ( pluginName.toLowerCase() == 'vlc multimedia plugin' ) {
						this.clientSupports['vlc-mozilla'] = true;
					} else if ( pluginName.indexOf( 'QuickTime' ) > -1 ) {
						this.clientSupports['quicktime-mozilla'] = true;
					} else {
						this.clientSupports['oggPlugin'] = true;
					}
					continue;
				}
				if ( javaEnabled && type == 'application/x-java-applet' ) {
					this.clientSupports['cortado'] = true;
					continue;
				}
				if ( uniqueMimesOnly && type == 'application/x-vlc-plugin' ) {
					// Client does not define multiple mimeType entries for application/ogg
					this.clientSupports['vlc-mozilla'] = true;
				}
			}
		}
	},

	'testActiveX' : function ( name ) {
		var hasObj = true;
		try {
			// No IE, not a class called "name", it's a variable
			var obj = new ActiveXObject( '' + name );
		} catch ( e ) {
			hasObj = false;
		}
		return hasObj;
	},

	'addOption' : function ( select, value, text, selected ) {
			var option = document.createElement( 'option' );
			option.value = value;
			option.appendChild( document.createTextNode( text ) );
			if ( selected ) {
				option.selected = true;
			}
			select.appendChild( option );
	},

	'hx' : function ( s ) {
		if ( typeof s != 'String' ) {
			s = s.toString();
		}
		return s.replace( /&/g, '&amp;' )
			. replace( /</g, '&lt;' )
			. replace( />/g, '&gt;' );
	},

	'hq' : function ( s ) {
		return '"' + this.hx( s ) + '"';
	},

	'getMsg': function ( key ) {
		if ( ! (key in this.msg) ) {
			return '<' + key + '>';
		} else {
			return this.msg[key];
		}
	},

	'makeOptionsBox' : function ( selectedPlayer, params ) {
		var div, p, a, ul, li, button;

		div = document.createElement( 'div' );
		div.style.cssText = "width: " + ( params.width - 10 ) + "px; display: none;";
		div.className = 'ogg-player-options';
		div.id = params.id + '_options_box';
		div.align = 'center';

		ul = document.createElement( 'ul' );

		// Description page link
		if ( params.linkUrl ) {
			li = document.createElement( 'li' );
			a = document.createElement( 'a' );
			a.href = params.linkUrl;
			a.appendChild( document.createTextNode( this.msg['ogg-desc-link'] ) );
			li.appendChild( a );
			ul.appendChild( li );
		}

		// Download link
		li = document.createElement( 'li' );
		a = document.createElement( 'a' );
		a.href = params.videoUrl;
		a.appendChild( document.createTextNode( this.msg['ogg-download'] ) );
		li.appendChild( a );
		ul.appendChild( li );
		
		div.appendChild( ul );

		// Player list caption
		p = document.createElement( 'p' );
		p.appendChild( document.createTextNode( this.msg['ogg-use-player'] ) );
		div.appendChild( p );

		// Make player list
		ul = document.createElement( 'ul' );
		for ( var i = 0; i < this.players.length + 1; i++ ) {
			var player, playerMsg;
			if ( i == this.players.length ) {
				player = 'thumbnail';
				if ( params.isVideo ) {
					playerMsg = 'ogg-player-thumbnail';
				} else {
					playerMsg = 'ogg-player-soundthumb';
				}
			} else {
				player = this.players[i];
				// Skip unsupported players
				if ( ! this.clientSupports[player] ) {
					continue;
				}
				playerMsg = 'ogg-player-' + player;
			}

			// Make list item
			li = document.createElement( 'li' );
			if ( player == selectedPlayer ) {
				var strong = document.createElement( 'strong' );
				strong.appendChild( document.createTextNode( 
					this.msg[playerMsg] + ' ' + this.msg['ogg-player-selected'] ) );
				li.appendChild( strong );
			} else {
				a = document.createElement( 'a' );
				a.href = 'javascript:void("' + player + '")';
				a.onclick = this.makePlayerFunction( player, params );
				a.appendChild( document.createTextNode( this.msg[playerMsg] ) );
				li.appendChild( a );
			}
			ul.appendChild( li );
		}
		div.appendChild( ul );
		
		div2 = document.createElement( 'div' );
		div2.style.cssText = 'text-align: center;';
		button = document.createElement( 'button' );
		button.appendChild( document.createTextNode( this.msg['ogg-dismiss'] ) );
		button.onclick = this.makeDismissFunction( params.id );
		div2.appendChild( button );
		div.appendChild( div2 );

		return div;
	},

	'makeOptionsLink' : function ( id ) {
		var a = document.createElement( 'a' );
		a.href = 'javascript:void("options")';
		a.id = id + '_options_link';
		a.onclick = this.makeDisplayOptionsFunction( id );
		a.appendChild( document.createTextNode( this.msg['ogg-more'] ) );
		return a;
	},

	'setCssProperty' : function ( elt, prop, value ) {
		// Could use style.setProperty() here if it worked in IE
		var re = new RegExp( prop + ':[^;](;|$)' );
		if ( elt.style.cssText.search( re ) > -1 ) {
			elt.style.cssText = elt.style.cssText.replace( re, prop + ':' + value + '$1' );
		} else if ( elt.style.cssText == '' ) {
			elt.style.cssText = prop + ':' + value + ';';
		} else if ( elt.style.cssText[elt.style.cssText.length - 1] == ';' ) {
			elt.style.cssText += prop + ':' + value + ';';
		} else {
			elt.style.cssText += ';' + prop + ':' + value + ';';
		}
	},

	'makeDismissFunction' : function ( id ) {
		var this_ = this;
		return function () {
			var optionsLink = document.getElementById( id + '_options_link' );
			var optionsBox = document.getElementById( id + '_options_box' );
			this_.setCssProperty( optionsLink, 'display', 'inline' );
			this_.setCssProperty( optionsBox, 'display', 'none' );
		}
	},

	'makeDisplayOptionsFunction' : function ( id ) {
		var this_ = this;
		return function () {
			var optionsLink = document.getElementById( id + '_options_link' );
			var optionsBox = document.getElementById( id + '_options_box' );
			this_.setCssProperty( optionsLink, 'display', 'none' );
			this_.setCssProperty( optionsBox, 'display', 'block' );
		}
	},

	'makePlayerFunction' : function ( player, params ) {
		var this_ = this;
		return function () {
			if ( player != 'thumbnail' ) {
				document.cookie = "ogg_player=" + player;
			}
			this_.init( player, params );
		};
	},

	'newButton': function ( caption, image, callback ) {
		var elt = document.createElement('input');
		elt.type = 'image';
		elt.src = this.extPathUrl + '/' + image;
		elt.alt = elt.value = elt.title = this.msg[caption];
		elt.onclick = callback;
		return elt;
	},

	'newPlayButton': function ( videoElt ) {
		return this.newButton( 'ogg-play', 'play.png', function () { videoElt.play(); } );
	},

	'newPauseButton': function ( videoElt ) {
		return this.newButton( 'ogg-pause', 'pause.png', function () { videoElt.pause(); } );
	},

	'newStopButton': function ( videoElt ) {
		return this.newButton( 'ogg-stop', 'stop.png', function () { videoElt.stop(); } );
	},

	'embedVideoElement': function ( elt, params ) {
		var videoElt = document.createElement('video');
		videoElt.setAttribute( 'width', params.width );
		videoElt.setAttribute( 'height', params.height + this.controlsHeightGuess );
		videoElt.setAttribute( 'src', params.videoUrl );
		videoElt.setAttribute( 'autoplay', '1' );
		videoElt.setAttribute( 'controls', '1' );
		var div = document.createElement( 'div' );
		div.appendChild( videoElt );
		elt.appendChild( div );

		// Try to detect implementations that don't support controls
		// This works for the Opera test build
		if ( !videoElt.controls ) {
			div = document.createElement( 'div' );
			div.appendChild( this.newPlayButton( videoElt ) );
			div.appendChild( this.newPauseButton( videoElt ) );
			div.appendChild( this.newStopButton( videoElt ) );
			elt.appendChild( div );
			//videoElt.play();
		}
	},

	'embedOggPlugin': function ( elt, params ) {
		var id = elt.id + "_obj";
		elt.innerHTML += 
			"<div><object id=" + this.hq( id ) + 
			" type='application/ogg'" +
			" width=" + this.hq( params.width ) + 
			" height=" + this.hq( params.height + this.controlsHeightGuess ) + 
			" data=" + this.hq( params.videoUrl ) + "></object></div>";
	},

	'embedVlcPlugin' : function ( elt, params ) {
		var id = elt.id + "_obj";
		elt.innerHTML += 	
			"<div><object id=" + this.hq( id ) + 
			" type='application/x-vlc-plugin'" +
			" width=" + this.hq( params.width ) + 
			" height=" + this.hq( params.height ) + 
			" data=" + this.hq( params.videoUrl ) + "></object></div>";
		
		var videoElt = document.getElementById( id );
		var div = document.createElement( 'div' );
		// TODO: seek bar
		div.appendChild( this.newPlayButton( videoElt ) );
		div.appendChild( this.newPauseButton( videoElt ) );
		div.appendChild( this.newStopButton( videoElt ) );
		elt.appendChild( div );
	},

	'embedVlcActiveX' : function ( elt, params ) {
		var id = elt.id + "_obj";

		var html = 
			'<div><object id=' + this.hq( id ) + 
			' classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921"' + 
			' codebase="http://downloads.videolan.org/pub/videolan/vlc/latest/win32/axvlc.cab#Version=0,8,6,0"' + 
			' width=' + this.hq( params.width ) + 
			' height=' + this.hq( params.height ) + 
			' style="width: ' + this.hx( params.width ) + 'px; height: ' + this.hx( params.height ) + 'px;"' +
			">" + 
			'<param name="mrl" value=' + this.hq( params.videoUrl ) + '/>' + 
			'</object></div>';
		elt.innerHTML += html;

		var videoElt = document.getElementById( id );

		// IE says "sorry, I wasn't listening, what were the dimensions again?"
		if ( params.width && params.height ) {
			videoElt.width = params.width;
			videoElt.height = params.height;
			videoElt.style.width = params.width + 'px';
			videoElt.style.height = params.height + 'px';
		}
		var div = document.createElement( 'div' );
		// TODO: seek bar
		div.appendChild( this.newButton( 'ogg-play', 'play.png', function() { videoElt.playlist.play(); } ) );
		// FIXME: playlist.pause() doesn't work
		div.appendChild( this.newButton( 'ogg-stop', 'stop.png', function() { videoElt.playlist.stop(); } ) );
		elt.appendChild( div );
	},

	'embedCortado' : function ( elt, params ) {
		var statusHeight = 18;
		// Given extra vertical space, cortado centres the video and then overlays the status 
		// line, leaving an ugly black bar at the top. So we don't give it any.
		var playerHeight = params.height < statusHeight ? statusHeight : params.height;

		// Create the applet all at once
		// In Opera, document.createElement('applet') immediately creates
		// a non-working applet with unchangeable parameters, similar to the 
		// problem with IE and ActiveX. 
		var html =
		    '<applet code="com.fluendo.player.Cortado.class" ' +
		    '      width=' + this.hq( params.width ) +
		    '      height=' + this.hq( playerHeight ) + 
		    '      archive=' + this.hq( this.cortadoUrl ) + '>' +
		    '  <param name="url"  value=' + this.hq( params.videoUrl ) + '/>' +
		    '  <param name="duration"  value=' + this.hq( params.length ) + '/>' +
		    '  <param name="seekable"  value="true"/>' +
		    '  <param name="autoPlay" value="true"/>' +
		    '  <param name="showStatus"  value="show"/>' +
		    '  <param name="statusHeight"  value="' + statusHeight + '"/>' +
		    '</applet>';

		// Wrap it in an iframe to avoid hanging the rendering thread in FF 2.0 and similar
		if ( navigator.appName != "Microsoft Internet Explorer" ) {
			var iframeHtml = '<html><body>' + html + '</body></html>';
			var iframeJs = 'parent.wgOggPlayer.writeApplet(self, "' + iframeHtml.replace( /"/g, '\\"' ) + '");';
			var iframeUrl = 'javascript:' + encodeURIComponent( iframeJs );
				'document.write("' + iframeHtml.replace( /"/g, '\\"' ) + '");';
			html = '<iframe width=' + this.hq( params.width ) + 
				'     height=' + this.hq( playerHeight ) + 
				'     scrolling="no" frameborder="0" marginwidth="0" marginheight="0"' +
				'     src=' + this.hq( iframeUrl ) + '/>';
		}
		elt.innerHTML = '<div>' + html + '</div>';
	},

	'writeApplet' : function ( win, html ) {
		win.document.write( html );
		win.stop();
		// Disable autoplay on back button
		this_ = this;
		win.setTimeout( 
			function () { 
				this_.setParam( win.document.applets[0], 'autoPlay', '' ); 
			}, 
			1 
		);
	},

	'embedQuicktimePlugin': function ( elt, params ) {
		var id = elt.id + "_obj";
		var controllerHeight = 16; // by observation
		elt.innerHTML += 
			"<div><object id=" + this.hq( id ) + 
			" type='video/quicktime'" +
			" width=" + this.hq( params.width ) + 
			" height=" + this.hq( params.height + controllerHeight ) + 
			
			// See http://svn.wikimedia.org/viewvc/mediawiki?view=rev&revision=25605
			" data=" + this.hq( this.extPathUrl + '/null_file.mov' ) +
			">" + 
			// Scale, don't clip
			"<param name='SCALE' value='Aspect'/>" + 
			"<param name='AUTOPLAY' value='True'/>" +
			"<param name='src' value=" + this.hq( this.extPathUrl + '/null_file.mov' ) +  "/>" +
			"<param name='QTSRC' value=" + this.hq( params.videoUrl ) + "/>" +
			"</object></div>";

		// Disable autoplay on back button
		var this_ = this;
		window.setTimeout( 
			function () {
				var videoElt = document.getElementById( id );
				this_.setParam( videoElt, 'AUTOPLAY', 'False' );
			}, 3000 );
	},

	'addParam': function ( elt, name, value ) {
		var param = document.createElement( 'param' );
		param.setAttribute( 'name', name );
		param.setAttribute( 'value', value );
		elt.appendChild( param );
	},

	'setParam' : function ( elt, name, value ) {
		var params = elt.getElementsByTagName( 'param' );
		for ( var i = 0; i < params.length; i++ ) {
			if ( params[i].name.toLowerCase() == name.toLowerCase() ) {
				params[i].value = value;
				return;
			}
		}
		this.addParam( elt, name, value );
	}
};
// vim: ts=4 sw=4 noet cindent :
