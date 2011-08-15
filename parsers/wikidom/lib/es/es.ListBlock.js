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
	
	this.list.traverseItems( function( item, index ) {
		itemOffset = item.$content.offset();
		itemHeight = item.$content.height();
		if ( position.top >= itemOffset.top && position.top < itemOffset.top + itemHeight ) {
			position.top -= itemOffset.top;
			position.left -= itemOffset.left;
			offset += item.flow.getOffset( position );
			return false;
		}
		offset += item.content.getLength() + 1;
	} );

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

es.ListBlock.prototype.getLineIndex = function( offset ) {
	var globalOffset = 0,
		lineIndex = 0,
		itemLength;

	this.list.traverseItems( function( item, index ) {
		itemLength = item.content.getLength();
		if ( offset >= globalOffset && offset <= globalOffset + itemLength ) {
			lineIndex += item.flow.getLineIndex( offset - globalOffset );
			return false;
		}
		globalOffset += itemLength + 1;
		lineIndex += item.flow.lines.length;
	} );

	return lineIndex;
};

es.ListBlock.prototype.getText = function( range, render ) {
	return "";
};

/**
 * Gets a location from an offset.
 * 
 * @method
 * @param offset {Integer} Offset to get location for
 * @returns {Object} Location object with item and offset, where offset is local to item
 */
es.ListBlock.prototype.getLocationFromOffset = function( offset ) {
	var globalOffset = 0,
		itemLength,
		location;
	
	this.list.traverseItems( function( item, index ) {
		itemLength = item.content.getLength();
		if ( offset >= globalOffset && offset <= globalOffset + itemLength ) {
			location = {
				'item' : item,
				'offset' : offset - globalOffset
			};
			return false;
		}
		globalOffset += itemLength + 1;
	} );
	
	return location;
};

/* Registration */

/**
 * Extend es.Block to support list block creation with es.Block.newFromWikiDom
 */
es.Block.blockConstructors.list = es.ListBlock.newFromWikiDomListBlock;

/* Inheritance */
es.extend( es.ListBlock, es.Block );