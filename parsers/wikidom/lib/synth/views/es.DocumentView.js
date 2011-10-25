/**
 * Creates an es.DocumentView object.
 * 
 * @class
 * @extends {es.ViewList}
 * @constructor
 */
es.DocumentView = function( documentModel ) {
	es.ViewList.call( this, documentModel );
	this.$.addClass( 'editSurface-document' )
};

/* Methods */

/**
 * Render content.
 * 
 * @method
 */
es.DocumentView.prototype.renderContent = function() {
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].renderContent();
	}
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param range {es.Range} Range of content to draw selection around
 */
es.DocumentView.prototype.drawSelection = function( range ) {
	var views = this.items.select( range, null, true );
	for ( var i = 0; i < views.on.length; i++ ) {
		views.on[i].item.drawSelection( new es.Range( views.on[i].from, views.on[i].to ) );
	}
	for ( var i = 0; i < views.off.length; i++ ) {
		views.off[i].clearSelection();
	}
};

/**
 * Gets length of contents.
 * 
 * @method
 * @returns {Integer} Length of content, including virtual spaces between blocks
 */
es.DocumentView.prototype.getLength = function() {
	return this.items.getLengthOfItems();
};

/**
 * Get the document offset of a position created from passed DOM event
 * 
 * @method
 * @param e {Event} Event to create es.Position from
 * @returns {Integer} Document offset
 */
es.DocumentView.prototype.getOffsetFromEvent = function( e ) {
	var	$target = $( e.target ),
		$block = $target.is( '.editSurface-block' )
			? $target : $target.closest( '.editSurface-block' ),
		position = es.Position.newFromEventPagePosition( e );

	if( false && $block.length ) {
		var	block = $block.data( 'block' ),
			offset = block.getOffsetFromPosition( position );
		while ( typeof block.list !== 'undefined' ) {
			offset += block.list.items.offsetOf( block );
			block = block.list;
		}
		return offset;
	} else {
		//console.log(position.top);
		
		if (position.top - $(window).scrollTop() > window.innerHeight) {
			console.log("b " + position.top);
			position.top = window.innerHeight + $(window).scrollTop() + 10;
			console.log("j " + position.top);
		}

		
		return this.getOffsetFromPosition( position );
	}
};

/**
 * Get the document offset of a position
 * 
 * @method
 * @param position {es.Position} Position to translate
 * @returns {Integer} Document offset
 */
es.DocumentView.prototype.getOffsetFromPosition = function( position ) {
	if ( this.items.length === 0 ) {
		return 0;
	}

		if (position.top - $(window).scrollTop() > window.innerHeight) {
			console.log("b " + position.top);
			position.top = window.innerHeight + $(window).scrollTop() + 10;
			position.left = window.innerWidth;
			console.log("j " + position.top);
		}	
	
	
	var blockView = this.items[0];

	for ( var i = 1; i < this.items.length; i++ ) {
		if ( this.items[i].$.offset().top > position.top ) {
			break;
		}
		blockView = this.items[i];
	}

	return blockView.list.items.offsetOf( blockView ) + blockView.getOffsetFromPosition( position );
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param offset {Integer} Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.DocumentView.prototype.getRenderedPosition = function( offset ) {
	var item = this.items.lookup( offset );
	if ( item !== null ) {
		return item.getRenderedPosition( offset - this.items.offsetOf( item ) );
	}
	return null;
};

/**
 * Gets HTML rendering of document.
 * 
 * @method
 * @returns {String} HTML data
 */
es.DocumentView.prototype.getHtml = function() {
	var views = this.items;
	return es.Html.makeTag(
		'div',
		{ 'class': this.$.attr( 'class' ) },
		$.map( this.items, function( view, i ) {
			return view.getHtml( { 'singular': i === 0 && views.length == 1 } );
		} ).join( '' )
	);
};

/* Inheritance */

es.extend( es.DocumentView, es.ViewList );