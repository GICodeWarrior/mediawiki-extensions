window.log = function(a){
	console.log(a);
}

if ( !window.Photocommons ) {
	window.Photocommons = {};
}

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
					'iiurlwidth' : q.width,
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
		
		var url = 'http://commons.wikimedia.org/w/api.php';
		var first = true;
		for (var key in args) {
			var value = args[key];
			url += (first) ? '?' : '&';
			first = false;
		
			if (value.indexOf( '!noencode!' ) === 0 && typeof value === 'string' ) {
				value = value.slice(10);
			} else {
				value = encodeURIComponent(value);
		}
		
		url += key + '=' + value;
		}
		return url;
	},
	init: function() {

		$( '#wp-photocommons-search' ).autocomplete({
			source : function(request, response) {
				var url = Photocommons.getQueryUrl( 'pagesearch', {
					'search' : $( '#wp-photocommons-search' ).val()
				});
			
				$.getJSON(url, function(data) {
					response(data[1]);
				});
			},
		
			select : function(event, ui) {
				$( '#wp-photocommons-images' ).empty();
				$( '#wp-photocommons-loading' ).show();
				
				var url = Photocommons.getQueryUrl( 'pageimages', {
					'title' : ui.item.value,
					'width' : '200'
				});
				
				$.getJSON(url, function(data) {

					if ( !data.query.pageids.length ) {
						$( '#wp-photocommons-images' ).html( 'No images found :(' );
					} else {
						$.each(data.query.pageids, function(key,pageid){
							var img = data.query.pages[pageid];
							if ( img.imageinfo && img.imageinfo[0] ) {
								$( '#wp-photocommons-images' ).append( '<img src="' + img.imageinfo[0].thumburl + '" style="display:none;"/>' ).find( 'img' ).fadeIn();

							}
						})					
					
					}				
					
					$( '#wp-photocommons-loading' ).hide();
				});
			}
		});
	}
});

// Init
$( document ).ready( Photocommons.init );