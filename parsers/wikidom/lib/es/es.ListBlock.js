/**
 * Creates a list block.
 * 
 * @class
 * @constructor
 * @extends {es.Block}
 * @param list {es.ListBlockList} Flat list to initialize with
 * @property list {es.ListBlockList}
 * @property $ {jQuery}
 */
es.ListBlock = function( list ) {
	es.Block.call( this );

	this.list = list || new es.ListBlockList();
	
	this.$ = this.list.$
		.addClass( 'editSurface-block' )
		.data( 'block', this );
	
	var listBlock = this;	
	this.list.on( 'update', function() {
		listBlock.emit( 'update' );
	} );
};

/* Static Methods */

/**
 * Creates a new list block object from WikiDom data.
 * 
 * @static
 * @method
 * @param wikidomListBlock {Object} WikiDom data to convert from
 * @returns {es.ListBlock} EditSurface list block
 */
es.ListBlock.newFromWikiDomListBlock = function( wikidomListBlock ) {
	if ( wikidomListBlock.type !== 'list' ) {
		throw 'Invalid block type error. List block expected to be of type "list".';
	}
	return new es.ListBlock( es.ListBlockList.newFromWikiDomList( wikidomListBlock ) );
};

es.ListBlock.prototype.renderContent = function( offset ) {
	this.list.renderContent( offset );
};

/* Public Methods */

/**
 * Gets the offset of a position.
 * 
 * @method
 * @param position {es.Position} Position to translate
 * @returns {Integer} Offset nearest to position
 */
es.ListBlock.prototype.getOffset = function( position ) {
	if ( position.top < 0 ) {
		return 0;
	} else if ( position.top >= this.$.height() ) {
		return this.getLength();
	}
	
	var offset = 0,
		itemOffset,
		itemHeight,
		blockOffset = this.$.offset();

	position.top += blockOffset.top;
	position.left += blockOffset.left;
	
	for ( var i = 0; i < this.list.items.length; i++ ) {
		itemOffset = this.list.items[i].$content.offset();
		if ( position.top >= itemOffset.top ) {
			itemHeight = this.list.items[i].$content.height();
			if ( position.top < itemOffset.top + itemHeight ) {
				position.top -= itemOffset.top;
				position.left -= itemOffset.left;
				offset += this.list.items[i].flow.getOffset( position );
				break;
			}
		}
		offset += this.list.items[i].content.getLength() + 1;
	}
	return offset;
};

/**
 * Gets the position of an offset.
 * 
 * @method
 * @param offset {Integer} Offset to translate
 * @returns {es.Position} Position of offset
 */
es.ListBlock.prototype.getPosition = function( offset ) {
	var location = this.getLocationFromOffset( offset ),
		position = location.item.flow.getPosition( location.offset ),
		contentOffset = location.item.$content.offset(),
		blockOffset = this.$.offset();

	position.top += contentOffset.top - blockOffset.top;
	position.left += contentOffset.left - blockOffset.left;
	position.bottom += contentOffset.top - blockOffset.top;

	return position;
};

/**
 * Gets the flow line index within specific offset.
 * 
 * @method
 * @param offset {Integer} Offset
 * @returns {Integer} Line index
 */
es.ListBlock.prototype.getLineIndex = function( offset ) {
	var itemLength,
		globalOffset = 0,
		lineIndex = 0;

	for ( var i = 0; i < this.list.items.length; i++ ) {
		itemLength = this.list.items[i].content.getLength();
		if ( offset >= globalOffset && offset <= globalOffset + itemLength ) {
			lineIndex += this.list.items[i].flow.getLineIndex( offset - globalOffset );
			break;
		}
		globalOffset += itemLength + 1;
		lineIndex += this.list.items[i].flow.lines.length; // TODO: add method getLineCount() to es.Flow
	}
	return lineIndex;
};

/**
 * Gets a location from an offset.
 * 
 * @method
 * @param offset {Integer} Offset to get location for
 * @returns {Object} Location object with item and offset, where offset is local to item
 */
es.ListBlock.prototype.getLocationFromOffset = function( offset ) {
	var itemLength,
		globalOffset = 0;
	for ( var i = 0; i < this.list.items.length; i++ ) {
		itemLength = this.list.items[i].content.getLength();
		if ( offset >= globalOffset && offset <= globalOffset + itemLength ) {
			return {
				'item' : this.list.items[i],
				'offset' : offset - globalOffset
			}
		}
		globalOffset += itemLength + 1;
	}
	throw 'Offset is out of block range';
};

/**
 * Gets the length of all block content.
 * 
 * @method
 * @returns {Integer} Length of content
 */
es.ListBlock.prototype.getLength = function() {
	var length = 0;
	for ( var i = 0; i < this.list.items.length; i++ ) {
		length += this.list.items[i].content.getLength() + 1;
	}
	return length === 0 ? 0 : length - 1;
};

/**
 * Inserts content into a block at an offset.
 * 
 * @method
 * @param offset {Integer} Position to insert content at
 * @param content {Object} Content to insert
 */
es.ListBlock.prototype.insertContent = function( offset, content ) {
	var location = this.getLocationFromOffset( offset );
	location.item.flow.content.insert( location.offset, content );
};

es.ListBlock.prototype.getText = function( range, render ) {
	return "";
};

/* Registration */

/**
 * Extend es.Block to support list block creation with es.Block.newFromWikiDom
 */
es.Block.blockConstructors.list = es.ListBlock.newFromWikiDomListBlock;

/* Inheritance */
es.extend( es.ListBlock, es.Block );