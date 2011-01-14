// Debug
window.log = (console && console.log) ? console.log : function(){};

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
			
			'pageimages' : function(q) {
				return {
					'action' : 'query',
					'prop' : 'images',
					'indexpageids' : '1',
					'titles' : q.title
				};
			},
			
			'thumbs' : function(q) {
				return {
					'action' : 'query',
					'prop' : 'imageinfo',
					'iiprop' : 'url',
					'iiurlwidth' : q.width,
					'indexpageids' : '1',
					'titles' : q.image
				};
			}
		};
		
		if (!queries[type]) {
			throw new Error('Unknown query type');
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
		
			if (value.indexOf('!noencode!') === 0 && typeof value === 'string') {
				value = value.slice(10);
			} else {
				value = encodeURIComponent(value);
		}
		
		url += key + '=' + value;
		}
		return url;
	},
	init: function() {

		$('#wp-photocommons-search').autocomplete({
			source : function(request, response) {
				var url = Photocommons.getQueryUrl('pagesearch', {
					'search' : $('#wp-photocommons-search').val()
				});
			
				$.getJSON(url, function(data) {
					response(data[1]);
				});
			},
		
			select : function(event, ui) {
				$('#wp-photocommons-images').empty();
				$('#wp-photocommons-loading').show();
				
				var url = Photocommons.getQueryUrl('pageimages', {
					'title' : ui.item.value
				});
				
				$.getJSON(url, function(data) {
					var pageid = data.query.pageids[0],
					query = data.query.pages[pageid].images;
					
					if (!query) {
						$('#wp-photocommons-images').html('No images found :(');
					}
					
					$.each(query, function() {
						var url = Photocommons.getQueryUrl('thumbs', {
							width : '200',
							image : this.title
						});
						
						$.getJSON(url, function(data) {
							var pageid = data.query.pageids[0],
							src = data.query.pages[pageid].imageinfo[0].thumburl;
							$('#wp-photocommons-images').append('<img src="' + src + '" style="display:none;"/>').find('img').fadeIn();
						});
					});
					
					$('#wp-photocommons-loading').hide();
				});
			}
		});
	}
});

// Init
$( document ).ready( Photocommons.init );