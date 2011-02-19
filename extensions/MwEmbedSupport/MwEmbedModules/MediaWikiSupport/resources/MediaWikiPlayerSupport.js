
( function( mw, $ ) {
	
	/** 
	 * Merge in the default video attributes supported by embedPlayer:
	 */
	mw.mergeConfig( 'EmbedPlayer.Attributes', {
		// A apiTitleKey for looking up subtitles, credits and related videos
		"data-mwtitle" : null,
	
		// The apiProvider where to lookup the title key
		"data-mwprovider" : null
	});
	
	// Add mediaWiki player support to target embedPlayer 
	$( mw ).bind( 'EmbedPlayerNewPlayer', function( event, embedPlayer ){
		mw.addMediaWikiPlayerSupport( embedPlayer );
	});
	
	/**
	 * Master function to add mediaWiki support to embedPlayer 
	 */
	mw.addMediaWikiPlayerSupport = function( embedPlayer ){
		
		// Set some local variables: 
		if( ! $( embedPlayer).attr( 'data-mwtitle' ) ){			
			return false;
		} else {
			var apiTitleKey = $( embedPlayer).attr( 'data-mwtitle');
			// legacy support ( set as attribute ) 
			embedPlayer.apiTitleKey = apiTitleKey;
		}
		// Set local apiProvider via config if not defined
		var apiProvider = $( embedPlayer ).attr('data-mwprovider');
		if( !apiProvider ){
			apiProvider = mw.getConfig( 'EmbedPlayer.ApiProvider' );
		}
		
		/**
		 * Loads mediaWiki sources for a given embedPlayer
		 * @param {function} callback Function called once player sources have been added 
		 */
		function loadPlayerSources( callback ){
			// Setup the request
			var request = {
				'prop': 'imageinfo',
				// In case the user added File: or Image: to the apiKey:
				'titles': 'File:' + unescape( apiTitleKey ).replace( /^(File:|Image:)/ , '' ),
				'iiprop': 'url|size|dimensions|metadata',
				'iiurlwidth': embedPlayer.getWidth(),
				'redirects' : true // automatically resolve redirects
			};

			// Run the request:
			mw.getJSON( mw.getApiProviderURL( apiProvider ), request, function( data ){
				if ( data.query.pages ) {
					for ( var i in data.query.pages ) {
						if( i == '-1' ) {
							callback( false );
							return ;
						}
						var page = data.query.pages[i];
					}
				} else {
					callback( false );
					return ;
				}
				// Make sure we have imageinfo:
				if( ! page.imageinfo || !page.imageinfo[0] ){
					callback( false );
					return ;
				}
				var imageinfo = page.imageinfo[0];
				
				// TODO these should call public methods rather than update internals: 
				
				// Update the poster
				embedPlayer.poster = imageinfo.thumburl;

				// Add the media src
				embedPlayer.mediaElement.tryAddSource(
					$('<source />')
					.attr( 'src', imageinfo.url )
					.get( 0 )
				);

				// Set the duration
				if( imageinfo.metadata[2]['name'] == 'length' ) {
					embedPlayer.duration = imageinfo.metadata[2]['value'];
				}

				// Set the width height
				// Make sure we have an accurate aspect ratio
				if( imageinfo.height != 0 && imageinfo.width != 0 ) {
					embedPlayer.height = parseInt( embedPlayer.width * ( imageinfo.height / imageinfo.width ) );
				}

				// Update the css for the player interface
				$( embedPlayer ).css( 'height', embedPlayer.height);

				callback();
			});
		}
	

		/**
		* Build a clip credit from the resource wikiText page
		*
		* TODO parse the resource page template
		*
		* @parm {String} wikiText Resource wiki text page contents
		*/
		function doCreditLine( articleUrl ){
			// Get the title str			
			var titleStr = apiTitleKey.replace(/_/g, ' ');

			var imgWidth = ( embedPlayer.controlBuilder.getOverlayWidth() < 250 )? 45 : 90;

			return $( '<div/>' ).addClass( 'creditline' )
				.append(
					$('<a/>').attr({
						'href' : articleUrl,
						'title' : titleStr
					}).html(
						$('<img/>').attr( {
							'border': 0,
							'src' : embedPlayer.poster
						} ).css( {
							'width' : imgWidth,
							'height': parseInt( imgWidth * ( embedPlayer.height / embedPlayer.width ) )
						} )
					)
				)
				.append(
					$('<span>').html(
						gM( 'mwe-embedplayer-credit-title' ,
							// We use a div container to easily get at the built out link
							$('<div>').html(
								$('<a/>').attr({
									'href' : articleUrl,
									'title' : titleStr
								}).text( titleStr )
							).html()
						)
					)
				);
		};
		
		/**
		 * Issues a request to populate the credits box
		 */
		var $creditsCache = false;
		function showCredits( $target, callback ){
			if( $creditsCache ){
				$target.html( $creditsCache );
				callback( true );
				return;
			}
			// Setup shortcuts:
			var apiUrl = mw.getApiProviderURL( apiProvider );
			var fileTitle = 'File:' + unescape( apiTitleKey).replace(/File:|Image:/, '');
			
			// Get the image info
			var request = {
				'prop' : 'imageinfo',
				'titles' : fileTitle,
				'iiprop' : 'url'
			};
			var articleUrl = '';
			mw.getJSON( apiUrl, request, function( data ){
				if ( data.query.pages ) {
					for ( var i in data.query.pages ) {
						var imageProps = data.query.pages[i];						
						// Check properties for "missing"
						if( imageProps.imageinfo && imageProps.imageinfo[0] && imageProps.imageinfo[0].descriptionurl ){
							$creditsCache = doCreditLine( imageProps.imageinfo[0].descriptionurl );
							// Found page
							$target.html( $creditsCache );
							callback( true );
							return ;
						}
					}
				}
				// failed
				callback( false );
			} );
		};
		
		/**
		 * Adds embedPlayer Bindings
		 */				
		// Show credits when requested
		$( embedPlayer ).bind('ShowCredits', function( event, $target, callback){
			// Only request the credits once: 
			showCredits( $target, callback);			
		});
				
		$( embedPlayer ).bind('CheckPlayerSourcesEvent', function(event, callback){
			// Only load source if none are available:
			if( embedPlayer.mediaElement.sources.length == 0 ){
				loadPlayerSources( callback );
			} else {
				// No source to load, issue callback directly
				callback();
			}
		});
		
		$( embedPlayer ).bind('GetShareIframeCode', function(event, callback){
			if( data-mwprovider )
			// Check the embedPlayer title key: 
			iframeSrc =  $( embedPlayer).attr( 'data-mwtitle')
		});
	};
		
} )( window.mediaWiki, window.jQuery );