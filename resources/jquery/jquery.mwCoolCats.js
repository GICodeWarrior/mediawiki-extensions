/** 
 * Simple predictive typing category adder for Mediawiki.
 * Relies on globals: wgScriptPath, wgNamespaceIds, wgFormattedNamespaces
 * Add to the page and then use getWikiText() to get wiki text representing the categories.
 */
( function ( $j ) { $j.fn.mwCoolCats = function( options ) {

	debugger;
	var defaults = {
		buttontext: 'Add',
		hiddenCats: [],
		cats: []
	};

	var settings = $j.extend( {}, defaults, options );

	// usually Category:Foo
	var categoryNamespace = wgFormattedNamespaces[wgNamespaceIds['category']];

	var $container;
	return this.each( function() {
		var _this = $j( this );
		_this.addClass( 'categoryInput' );

		_this.suggestions( {
			'fetch': _fetchSuggestions,
			'cancel': function() {
				var req = $j( this ).data( 'request' );
				// XMLHttpRequest.abort is unimplemented in IE6, also returns nonstandard value of "unknown" for typeof
				if ( req && ( typeof req.abort !== 'unknown' ) && ( typeof req.abort !== 'undefined' ) && req.abort ) {
					req.abort();
				}
			}
		} );
		_this.suggestions();

		_this.wrap('<div class="cat-widget"></div>');
		$container = _this.parent(); // set to the cat-widget class we just wrapped
		$container.append( $j( '<button type="button">'+settings.buttontext+'</button>' ) 
				.click( function(e) {
				e.stopPropagation(); 
				e.preventDefault(); 
				_processInput();
				return false;
				}) );
		$container.prepend('<ul class="cat-list pkg"></ul>');

		//XXX ensure this isn't blocking other stuff needed.
		_this.parents('form').submit( function() {
			_processInput();
		});
		
		_this.keyup(function(e) { 
			if(e.keyCode == 13) { 
				e.stopPropagation(); 
				e.preventDefault(); 
				_processInput();
			} 
		});

		this.getWikiText = function() {
			return _getCats().map( function() { return '[[' + categoryNamespace + ':' + this + ']]'; } )
				 .toArray()
				 .join( "\n" );
		};

		// initialize with some categories, if so configured
		$j.each( settings.cats, function( i, cat ) { _insertCat( cat ); } );
		$j.each( settings.hiddenCats, function( i, cat ) { _insertCat( cat, true ); } );

		_processInput();
	} );
	
	function _processInput() {	
		var $input = $container.find( 'input' );
		_insertCat( $j.trim( $input.val() ) );
		$input.val("");
	}

	function _insertCat( cat, isHidden ) {
		if ( mw.isEmpty( cat ) || _containsCat( cat ) ) { 
			return; 
		}
		var $li = $j( '<li/>' ).addClass( 'cat' );
		var $anchor = $j( '<a/>' ).addClass( 'cat' ).append( cat );
		$li.append( $anchor );		
		if ( isHidden ) {
			$li.hide();
		} else {
			$anchor.attr( { target: "_new", href: _catLink( cat ) } );
			$li.append( $j.fn.removeCtrl( null, 'mwe-upwiz-category-remove', function() { $li.remove(); } ) );
		}
		$container.find( 'ul' ).append( $li );
	}

	function _catLink( cat ) {
		var catLink = 
			encodeURIComponent( categoryNamespace ) 
			+ ':'
			+ encodeURIComponent( mw.ucfirst( cat.replace(/ /g, '_' ) ) );

		// wgServer typically like 'http://commons.prototype.wikimedia.org'	
		// wgArticlePath typically like '/wiki/$1'
		if ( ! ( mw.isEmpty( wgServer ) && mw.isEmpty( wgArticlePath ) ) ) {
			catLink = wgServer + wgArticlePath.replace( /\$1/, catLink );
		}

		return catLink;
	}

	function _getCats() {
		return $container.find('ul li a.cat').map( function() { return $j.trim( this.text ); } );
	}

	function _containsCat( cat ) {
		return _getCats().filter( function() { return this == cat; } ).length !== 0;
	}

	function _fetchSuggestions( query ) {
		var _this = this;
		var request = $j.ajax( {
			url: wgScriptPath + '/api.php',
			data: {
				'action': 'query',
				'list': 'allpages',
				'apnamespace': wgNamespaceIds['category'],
				'apprefix': $j( this ).val(),
				'format': 'json'
			},
			dataType: 'json',
			success: function( data ) {
				// Process data.query.allpages into an array of titles
				var pages = data.query.allpages;
				var titleArr = [];

				$j.each( pages, function( i, page ) {
					var title = page.title.split( ':', 2 )[1];
					titleArr.push( title );
				} );

				$j( _this ).suggestions( 'suggestions', titleArr );
			}
		} );

		$j( _this ).data( 'request', request );
	}

}; } )( jQuery );
