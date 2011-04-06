(function($){

	$.webfonts = {

		/* Version number */
		oldconfig: false,
		version: "0.1.2",
		set: function( font ) {
			if ( font === "none" ) {
				$.webfonts.reset();
				return;
			}
					
			var config = mw.config.get( "wgWebFonts" );
			if ( !font in config.fonts ) {
				console.log( "Requested unknown font", font );
				return;
			} else {
				//console.log( "Loaded font", font, config.fonts[font] );
				config = config.fonts[font];
			}
			
			var styleString = 
				"<style type='text/css'>\n@font-face {\n"
				+ "\tfont-family: '"+font+"';\n";
			if ( 'eot' in config ) {
				styleString += "\tsrc: url('"+config.eot+"');\n";
			}
			styleString += "\tsrc: local('☺'),";
			
			if ( 'woff' in config ) {
				styleString += "\t\turl('"+config.woff+"') format('woff'),";
			}
			if ( 'ttf' in config ) {
				styleString += "\t\turl('"+config.ttf+"') format('truetype');\n";
			}
			
			styleString += "\tfont-weight: normal;\n}\n</style>\n";
			
			$(styleString).appendTo("head" );
			//console.log( "Loaded css", styleString);
			if ( !$.webfonts.oldconfig ) {
				$.webfonts.oldconfig = {
					"font-family": $("body").css('font-family'),
					"font-size":   $("body").css('font-size')
				}
			}
			// Do we want to restrict font to only text marked in given language?
			$("body").css('font-family', "'"+ font +"'");
			if ( 'size' in config ) {
				$("body").css('font-size', config.size);
			}
			
			if ( 'normalization' in config ) {
					$(document).ready(function() {
						$.webfonts.normalize(config.normalization);
						//console.log( "Registered normalization rules", config.normalization);
				});
			}
			//set the font option in cookie
			$.cookie( 'webfonts-font', font, { 'path': '/', 'expires': 30 } );
		},

		reset: function(){
			$("body").css('font-family', $.webfonts.oldconfig["font-family"]);
			$("body").css('font-size', $.webfonts.oldconfig["font-size"]);
			$.cookie( 'webfonts-font', 'none' );
		},

		normalize: function(normalization_rules){
			$.each(normalization_rules, function(key, value) { 
				$.webfonts._replace(key, value);
			});
		},

		_replace: function(string1, string2) {
			$("*").each(function() { 
				if($(this).children().length==0) { 
					$(this).text($(this).text().replace(string1, string2)); 
				} 
				//FIXME does not work on all nodes
			});
		},
		
		setup: function() {
			
			var config = mw.config.get( "wgWebFontsAvailable" );
			// Build font dropdown
			$select = $( '<ul />' );
			for ( var scheme in config ) {
				$fontlink = $( '<a />' )
					.css( { "font-size": "1.2em" } )
					.text( config[scheme] );
					
				$fontItem = $( '<li />' )
					.val( config[scheme] )
					.append( $fontlink );
					
				haveSchemes = true;
				//some closure trick :)
				(function (font) {
					$fontlink.click( function( event ) {
						$.webfonts.set( font );
					})
				}) (config[scheme]);

				$select.append($fontItem);
			}
			$fontlink = $( '<a />' )
				.text( 'Reset' )
				.css( { "font-size": "1.2em" } )
				.click( function( event ) {
					$.webfonts.set( 'none');
				});	
			$fontItem = $( '<li />' )
				.val( 'none')
				.append( $fontlink );
				
			$select.append($fontItem);

			if ( !haveSchemes ) {
				// No schemes available, don't show the tool
				return;
			}
			
			var $menudiv = $( '<div />' )
			.addClass( 'menu' )
			.append( $select )
			.append();
			
			var $div = $( '<div />' )
			.addClass( 'vectorMenu' )
			.append( "<a href='#'>"+ mw.msg("webfonts-load")+"</a>")
			.css( {'background-image':'none'} )
			.css( { margin: 0, padding:0, "font-size": "100%" } )
			.append( $menudiv )
			.append();
			var $li = $( '<li />' )
			.append( $div );
			$( '#p-personal ul' ).prepend( $li );
			
			//see if there is a font in cookie
			cookie_font = $.cookie('webfonts-font');
			
			if(cookie_font == null){
				$.webfonts.set( config[0]);
			}
			else{
				if (cookie_font !=='none'){
					$.webfonts.set( cookie_font);
				}
			}
			
		}


	}
	
	$( document ).ready( function() {
		$.webfonts.setup();
	} );

})(jQuery);
