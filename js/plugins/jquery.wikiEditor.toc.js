/* TOC Module for wikiEditor */
( function( $ ) { $.wikiEditor.modules.toc = {

/**
 * API accessible functions
 */
api: {
	//
},
/**
 * Internally used functions
 */
fn: {
	/**
	 * Creates a table of contents module within a wikiEditor
	 * 
	 * @param {Object} context Context object of editor to create module in
	 * @param {Object} config Configuration object to create module from
	 */
	create: function( context, config ) {
		if ( '$toc' in context.modules ) {
			return;
		}
		context.modules.$toc = $( '<div />' )
			.addClass( 'wikiEditor-ui-toc' )
			.attr( 'id', 'wikiEditor-ui-toc' );
		// If we ask for this later (after we insert the TOC) then in IE this measurement will be incorrect
		var height = context.$ui.find( '.wikiEditor-ui-bottom' ).height()
		context.$ui.find( '.wikiEditor-ui-bottom' )
			.append( context.modules.$toc );
		context.modules.$toc.height(
			context.$ui.find( '.wikiEditor-ui-bottom' ).height()
		);
		// Make some css modifications to make room for the toc on the right...
		// Perhaps this could be configurable?
		context.modules.$toc.css( { 'width': $.wikiEditor.modules.toc.defaults.width, 'marginTop': -( height ) } );
		context.$ui.find( '.wikiEditor-ui-text' )
			.css( ( $( 'body.rtl' ).size() ? 'marginLeft' : 'marginRight' ), $.wikiEditor.modules.toc.defaults.width );
		// Add the TOC to the document
		$.wikiEditor.modules.toc.fn.build( context, config );
		context.$textarea
			.delayedBind( 250, 'mouseup scrollToPosition focus keyup encapsulateSelection change',
				function( event ) {
					var context = $(this).data( 'wikiEditor-context' );
					$(this).eachAsync( {
						bulk: 0,
						loop: function() {
							$.wikiEditor.modules.toc.fn.build( context );
							$.wikiEditor.modules.toc.fn.update( context );
						}
					} );
				}
			)
			.blur( function() {
				var context = $(this).data( 'wikiEditor-context' );
				context.$textarea.delayedBindCancel( 250,
					'mouseup scrollToPosition focus keyup encapsulateSelection change' );
				$.wikiEditor.modules.toc.fn.unhighlight( context );
			});
	},
 
	unhighlight: function( context ) {
		context.modules.$toc.find( 'div' ).removeClass( 'current' );
	},
	/**
	 * Highlight the section the cursor is currently within
	 * 
	 * @param {Object} context
	 */
	update: function( context ) {
		$.wikiEditor.modules.toc.fn.unhighlight( context );
		var position = context.$textarea.getCaretPosition();
		var section = 0;
		if ( context.data.outline.length > 0 ) {
			// If the caret is before the first heading, you must be in section
			// 0, and there is no need to look any farther - otherwise check
			// that the caret is before each section, and when it's not, we now
			// know what section it is in
			if ( !( position < context.data.outline[0].position - 1 ) ) {
				while (
					section < context.data.outline.length && context.data.outline[section].position - 1 < position
				) {
					section++;
				}
				section = Math.max( 0, section );
			}
			var sectionLink = context.modules.$toc.find( 'div.section-' + section );
			sectionLink.addClass( 'current' );
			
			// Scroll the highlighted link into view if necessary
			var relTop = sectionLink.offset().top - context.modules.$toc.offset().top;
			var scrollTop = context.modules.$toc.scrollTop();
			var divHeight = context.modules.$toc.height();
			var sectionHeight = sectionLink.height();
			if ( relTop < 0 )
				// Scroll up
				context.modules.$toc.scrollTop( scrollTop + relTop );
			else if ( relTop + sectionHeight > divHeight )
				// Scroll down
				context.modules.$toc.scrollTop( scrollTop + relTop + sectionHeight - divHeight );
		}
	},
	/**
	 * Builds table of contents
	 * 
	 * @param {Object} context
	 */
	build: function( context ) {
		/**
		 * Builds a structured outline from flat outline
		 * 
		 * @param {Object} outline Array of objects with level fields
		 */
		function buildStructure( outline, offset, level ) {
			if ( offset == undefined ) offset = 0;
			if ( level == undefined ) level = 1;
			var sections = [];
			for ( var i = offset; i < outline.length; i++ ) {
				if ( outline[i].nLevel == level ) {
					var sub = buildStructure( outline, i + 1, level + 1 );
					if ( sub.length ) {
						outline[i].sections = sub;
					}
					sections[sections.length] = outline[i];
				} else if ( outline[i].nLevel < level ) {
					break;
				}
			}
			return sections;
		}
		/**
		 * Bulds unordered list HTML object from structured outline
		 * 
		 * @param {Object} structure Structured outline
		 */
		function buildList( structure ) {
			var list = $( '<ul></ul>' );
			for ( i in structure ) {
				var div = $( '<div></div>' )
					.attr( 'href', '#' )
					.addClass( 'section-' + structure[i].index )
					.data( 'textbox', context.$textarea )
					.data( 'position', structure[i].position )
					.bind( 'mousedown', function( event ) {
						$(this).data( 'textbox' )
							.focus()
							.setSelection( $(this).data( 'position' ) )
							.scrollToCaretPosition( true );
						if ( typeof $.trackAction != 'undefined' )
							$.trackAction( 'ntoc.heading' );
						event.preventDefault();
					} )
					.text( structure[i].text );
				if ( structure[i].text == '' )
					div.html( '&nbsp;' );
				var item = $( '<li></li>' ).append( div );
				if ( structure[i].sections !== undefined ) {
					item.append( buildList( structure[i].sections ) );
				}
				list.append( item );
			}
			return list;
		}
		function buildCollapseBar() {
			$('.wikiEditor-ui-toc ul:first').css('width', '147px').css('margin-left', '19px').css('border-left', '1px solid #DDDDDD');
			var $collapseBar = $( '<div />' )
				.addClass( 'wikiEditor-ui-toc-collapse-open' )
				.attr( 'id', 'wikiEditor-ui-toc-collapse' )
				.data( 'oWidth', $.wikiEditor.modules.toc.defaults.width)
				.bind( 'mouseup', function() {
					var $e = $(this);
					var close = $e.hasClass( 'wikiEditor-ui-toc-collapse-open' );
					if( close ) {
						$( '#wikiEditor-ui-toc-collapse' )
							.removeClass( 'wikiEditor-ui-toc-collapse-open' );
						$e.parent()
							.animate( { 'width': $e.outerWidth() }, 'fast', function() {
									$(this).find( 'ul:first' ).hide();
								} )
							.prev()
							.animate( { 'marginRight': $e.outerWidth() + 1 }, 'fast', function() {
								$( '#wikiEditor-ui-toc-collapse' )
									.addClass( 'wikiEditor-ui-toc-collapse-closed' );
							});
					} else {
						$( '#wikiEditor-ui-toc-collapse' )
							.removeClass( 'wikiEditor-ui-toc-collapse-closed' );
						$e.siblings().show()
						.parent()
							.animate( { 'width': $e.data('oWidth') }, 'fast' )
							.prev()
							.animate( { 'marginRight': $e.data('oWidth') }, 'fast', function() {
								$( '#wikiEditor-ui-toc-collapse' )
									.addClass( 'wikiEditor-ui-toc-collapse-open' );
							});
					}
					
				});
			return $collapseBar;	
		}
		
		function drag( e ) {
			var mR = e.pageX - $('#wikiEditor-ui-bottom').offset().left;
			mR = $('#wikiEditor-ui-bottom').width() - mR;
			if( mR < 26 || mR >  $('#wikiEditor-ui-bottom').width() - 250) return false;
			$('#wikiEditor-ui-text').css('marginRight', mR+'px');
			$('#wikiEditor-ui-toc').css('width', mR+'px');
			return false;
		}
		function stopDrag( e ) {
			$()
			.unbind( 'mousemove', drag )
			.unbind( 'mouseup', stopDrag );
			context.modules.$toc.find( 'div' ).autoEllipse( { 'position': 'right', 'tooltip': true } );
			var mR = e.pageX - $('#wikiEditor-ui-bottom').offset().left;
			mR = $('#wikiEditor-ui-bottom').width() - mR;
			if(mR < 50 && wgNavigableTOCCollapseEnable){
				collapse();
			}else{
				$('#wikiEditor-ui-text textarea').trigger('mouseup');
			}
			return false;
		}
		
		function collapse() {
			if($('#wikiEditor-ui-toolbar .tab-toc').size()==0){
				$contentsTab = $('<span class="tab tab-toc" rel="characters"><a class="" href="#">Show Contents</a></span>')
				.hide()
				.bind('click', expand);

				$($contentsTab)
				.insertAfter('#wikiEditor-ui-toolbar .tabs');
			}
			
			$('#wikiEditor-ui-toolbar .tab-toc').show('fast');
			
			
			$('#wikiEditor-ui-toc')
			.animate({'width': '1px'}, 'fast', function() { $(this).hide(); } )
			.prev()
			.animate({'marginRight': '1px'}, 'fast', function() { $(this).css('marginRight', '-1px'); } );
		}
		
		function expand() {
			$('#wikiEditor-ui-toolbar .tab-toc')
			.hide('fast');
			$('#wikiEditor-ui-toc')
			.show()
			.animate({'width': $('#wikiEditor-ui-toc').data('openWidth')+'px'}, 'fast', function() { 
				$('#wikiEditor-ui-text textarea').trigger('mouseup');
			} )
			.prev()
			.animate({'marginRight': $('#wikiEditor-ui-toc').data('openWidth')+'px'}, 'fast' );
		}
		function buildResizeControls() {
			var $resizeControlVertical = $( '<div />' )
			.attr( 'id', 'wikiEditor-ui-toc-resize-vertical')
			.bind( 'mousedown', function() {
				$('#wikiEditor-ui-toc')
				.data('openWidth', $('#wikiEditor-ui-toc').width());
				$()
				.bind( 'mousemove', drag )
				.bind( 'mouseup', stopDrag );
			});
			var $resizeControlHorizontal = $( '<div />' )
			.attr( 'id', 'wikiEditor-ui-toc-resize-horizontal')
			.bind( 'mousedown', function() {
				.data('openWidth', $('#wikiEditor-ui-toc').width());
				$()
				.bind( 'mousemove', drag )
				.bind( 'mouseup', stopDrag );
			});
			
			return $resizeControlVertical.add($resizeControlHorizontal);
		}
		// Build outline from wikitext
		var outline = [];
		var wikitext = $.wikiEditor.fixOperaBrokenness( context.$textarea.val() );
		var headings = wikitext.match( /^={1,6}[^=\n][^\n]*={1,6}\s*$/gm );
		var offset = 0;
		headings = $.makeArray( headings );
		for ( var h = 0; h < headings.length; h++ ) {
			text = $.trim( headings[h] );
			// Get position of first occurence
			var position = wikitext.indexOf( text, offset );
			// Update offset to avoid stumbling on duplicate headings
			if ( position >= offset ) {
				offset = position + text.length;
			} else if ( position == -1 ) {
				// Not sure this is possible, or what should happen
				continue;
			}
			
			// Detect the starting and ending heading levels
			var startLevel = 0;
			for ( var c = 0; c < text.length; c++ ) {
				if ( text.charAt( c ) == '=' ) {
					startLevel++;
				} else {
					break;
				}
			}
			var endLevel = 0;
			for ( var c = text.length - 1; c >= 0; c-- ) {
				if ( text.charAt( c ) == '=' ) {
					endLevel++;
				} else {
					break;
				}
			}
			// Use the lowest number of =s as the actual level
			var level = Math.min( startLevel, endLevel );
			text = $.trim( text.substr( level, text.length - ( level * 2 ) ) );
			// Add the heading data to the outline
			outline[h] = { 'text': text, 'position': position, 'level': level, 'index': h + 1 };
		}
		// Normalize heading levels for list creation
		// This is based on Linker::generateTOC() so, it should behave like the
		// TOC on rendered articles does - which is considdered to be correct
		// at this point in time.
		var lastLevel = 0;
		var nLevel = 0;
		for ( var i = 0; i < outline.length; i++ ) {
			if ( outline[i].level > lastLevel ) {
				nLevel++;
			}
			else if ( outline[i].level < lastLevel ) {
				nLevel -= Math.max( 1, lastLevel - outline[i].level );
			}
			if ( nLevel <= 0 ) {
				nLevel = 1;
			}
			outline[i].nLevel = nLevel;
			lastLevel = outline[i].level;
		}
		// Recursively build the structure and add special item for
		// section 0, if needed
		var structure = buildStructure( outline );
		if ( $( 'input[name=wpSection]' ).val() == '' ) {
			structure.unshift( { 'text': wgPageName.replace(/_/g, ' '), 'level': 1, 'index': 0, 'position': 0 } );
		}
		context.modules.$toc.html( buildList( structure ) );

		if(wgNavigableTOCResizable) {
			context.modules.$toc.append( buildResizeControls() );
		}else if(wgNavigableTOCCollapseEnable){
			context.modules.$toc.append( buildCollapseBar() );
		}
		context.modules.$toc.find( 'div' ).autoEllipse( { 'position': 'right', 'tooltip': true } );
		// Cache the outline for later use
		context.data.outline = outline;
	}
}

}; 
$.wikiEditor.modules.toc.defaults = {
	width: "13em"
}
} ) ( jQuery );
