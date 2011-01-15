// Debug
window.log = function( a, b ) {
	console.log( a, b );
};
if ( !window.Photocommons ) {
	window.Photocommons = {};
}

(function($){

	$.extend( Photocommons, {

		getQueryUrl: function( type, args ) {
			var queries = {
				'pagesearch' : function(q) {
					return {
						'action' : 'opensearch',
						'search' : q.search
					};
				},
				/* http://commons.wikimedia.org/w/api.php
					? action=query
					& generator=images
					& gimlimit=20
					& indexpageids=1
					& titles=Cat
					& redirects=1
					& prop=imageinfo
					& iiprop=url
					& iiurlwidth=200
				*/
				'pageimages' : function(q) {
					return {
						'action' : 'query',
						'generator' : 'images',
						'gimlimit' : '20',
						'indexpageids' : '1',
						'titles' : q.title,
						'redirects' : '1',
						'prop' : 'imageinfo',
						'iiprop' : 'url',
						'iiurlwidth' : q.width
					};
				}
			};

			if (!queries[type]) {
				throw new Error( 'Unknown query type' );
			}

			return Photocommons.makeUrl(queries[type](args));
		},
		makeUrl: function( args ) {
			// default arguments
			args = $.extend({
				'format' : 'json',
				'callback' : '!noencode!?'
			}, args);


			var	url = 'http://commons.wikimedia.org/w/api.php',
				first = true,
				key,
				value;
			for ( key in args ) {
				value = args[key];
				url += (first) ? '?' : '&';
				first = false;

				if ( value.indexOf( '!noencode!' ) === 0 && typeof value === 'string' ) {
					value = value.slice( 10 );
				} else {
					value = encodeURIComponent( value );
			}

			url += key + '=' + value;
			}
			return url;
		},
		init: function() {
			
			/* jQuery suggestions */
			$( '#wp-photocommons-search' ).suggestions( {
				fetch: function( query ) {
					var url = Photocommons.getQueryUrl( 'pagesearch', {
						'search' : query
					});
					log('query', query);
					log('url', url);
					$.getJSON( url, function( data ) {
						$( '#wp-photocommons-search' ).suggestions( 'suggestions', data[1] );
					});
				},
				cancel: function() {
					//...
				},
				maxRows: 0,
				result: {
					select: function( $result ) {
						var	value = $result.val(),
							url = Photocommons.getQueryUrl( 'pageimages', {
								'title' : value,
								'width' : '200'
							});

						$( '#wp-photocommons-images' ).empty();
						$( '#wp-photocommons-loading' ).show();						
						$.getJSON( url, function( data ) {
						
							if ( !data.query.pageids.length ) {
								$( '#wp-photocommons-images' ).html( 'No images found :(' );
							} else {
								$.each( data.query.pageids, function( key, pageid ) {
									var img = data.query.pages[pageid];
									if ( img.imageinfo && img.imageinfo[0] ) {
										$( '<img>' ).attr({
											'style': 'display:none',
											'src': img.imageinfo[0].thumburl,
											'title': img.title,
											'data-filename': img.title
										}).appendTo( '#wp-photocommons-images' ).fadeIn();
						
									}
								});
						
							}
						
							$( '#wp-photocommons-loading' ).hide();
						});
					}
				}
				
			} );

			/* jQuery UI Autosuggest*/
			/*
			$( '#wp-photocommons-search' ).autocomplete({

				select : function( event, ui ) {
					$( '#wp-photocommons-images' ).empty();
					$( '#wp-photocommons-loading' ).show();

					var url = Photocommons.getQueryUrl( 'pageimages', {
						'title' : ui.item.value,
						'width' : '200'
					});

					$.getJSON( url, function( data ) {

						if ( !data.query.pageids.length ) {
							$( '#wp-photocommons-images' ).html( 'No images found :(' );
						} else {
							$.each( data.query.pageids, function( key, pageid ) {
								var img = data.query.pages[pageid];
								if ( img.imageinfo && img.imageinfo[0] ) {
									$( '#wp-photocommons-images' ).append( '<img src="' + img.imageinfo[0].thumburl + '" style="display:none;"/>' ).find( 'img' ).fadeIn();

								}
							});

						}

						$( '#wp-photocommons-loading' ).hide();
					});
				}
			});
			*/
		}
	});

	// Init
	// FIXME
	$( document ).ready( Photocommons.init );

})(jQuery);