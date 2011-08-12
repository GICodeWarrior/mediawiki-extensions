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

	var globalOffset = 0,
		i,
		itemOffset,
		itemHeight,
		blockOffset = this.$.offset();

	position.top += blockOffset.top;
	position.left += blockOffset.left;

	for( i = 0; i < this.list.items.length; i++ ) {
		itemOffset = this.list.items[i].$content.offset();
		itemHeight = this.list.items[i].$content.height();

		if ( position.top >= itemOffset.top && position.top < itemOffset.top + itemHeight ) {
			position.top -= itemOffset.top;
			position.left -= itemOffset.left;
			return globalOffset + this.list.items[i].flow.getOffset( position );
		}
		
		globalOffset += this.list.items[i].content.getLength() + 1;
	}
};

/**
 * Gets the position of an offset.
 * 
 * @method
 * @param offset {Integer} Offset to translate
 * @returns {es.Position} Position of offset
 */
es.ListBlock.prototype.getPosition = function( offset ) {
	var globalOffset = 0,
		i,
		itemLength,
		position,
		contentOffset,
		blockOffset = this.$.offset();
	
	for( i = 0; i < this.list.items.length; i++ ) {
		itemLength = this.list.items[i].content.getLength();
		if ( offset >= globalOffset && offset < globalOffset + itemLength ) {
			position = this.list.items[i].flow.getPosition( offset - globalOffset );
			contentOffset = this.list.items[i].$content.offset();
			
			position.top += contentOffset.top - blockOffset.top;
			position.left += contentOffset.left - blockOffset.left;
			position.bottom += contentOffset.top - blockOffset.top;
			
			position.line = i;
			
			return position;
		}
		globalOffset += itemLength + 1;
	}
};

/* Registration */

/**
 * Extend es.Block to support list block creation with es.Block.newFromWikiDom
 */
es.Block.blockConstructors.list = es.ListBlock.newFromWikiDomListBlock;

/* Inheritance */
es.extend( es.ListBlock, es.Block );