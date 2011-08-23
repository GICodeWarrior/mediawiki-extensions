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
	
	this.enumerate();
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

es.ListBlock.prototype.enumerate = function() {
	var itemLevel,
		levels = [];

	for ( var i = 0; i < this.list.items.length; i++ ) {
		itemLevel = this.list.items[i].getLevel();
		levels = levels.slice(0, itemLevel + 1);
		
		if ( this.list.items[i].getStyle() === 'number' ) {
			if ( !levels[itemLevel] ) {
				levels[itemLevel] = 0;
			}
			this.list.items[i].setNumber( ++levels[itemLevel] );
		}
	}
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
		lineIndex += this.list.items[i].flow.lines.length; // TODO: add method getLineCount() to es.ContentFlow
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
 * Gets the start and end points of the word closest a given offset.
 * 
 * @method
 * @param offset {Integer} Offset to find word nearest to
 * @returns {Object} Range object of boundaries
 */
es.ListBlock.prototype.getWordBoundaries = function( offset ) {
	var location = this.getLocationFromOffset( offset ),
		boundaries = location.item.flow.content.getWordBoundaries( location.offset );
	boundaries.start += offset - location.offset; 
	boundaries.end += offset - location.offset;
	return boundaries;
};

/**
 * Gets the start and end points of the section closest a given offset.
 * 
 * @method
 * @param offset {Integer} Offset to find section nearest to
 * @returns {Object} Range object of boundaries
 */
es.ListBlock.prototype.getSectionBoundaries = function( offset ) {
	var location = this.getLocationFromOffset( offset ),
		start = offset - location.offset;
	return new es.Range( start, start + location.item.content.getLength() );
};

/**
 * Inserts content into a block at an offset.
 * 
 * @method
 * @param offset {Integer} Position to insert content at
 * @param content {Object} Content to insert
 * @param autoAnnotate {Boolean} Content to insert
 */
es.ListBlock.prototype.insertContent = function( offset, content, autoAnnotate ) {
	var location = this.getLocationFromOffset( offset );
	location.item.flow.content.insert( location.offset, content, autoAnnotate );
};

/**
 * Deletes content in a block within a range.
 * 
 * @method
 * @param range {es.Range} Range of content to remove
 */
es.ListBlock.prototype.deleteContent = function( range ) {
	range.normalize();
	
	var locationStart = this.getLocationFromOffset( range.start ),
		locationEnd = this.getLocationFromOffset( range.end );

	if ( locationStart.item === locationEnd.item ) {
		// delete content within one item
		locationStart.item.content.remove(
			new es.Range( locationStart.offset, locationStart.offset + range.getLength() )
		);		
	} else {
		// delete content across multiple items
		
		// delete selected content from first selected item
		locationStart.item.content.remove(
			new es.Range(
				locationStart.offset,
				locationStart.item.content.getLength()
			)
		);

		// grab not selected content from last selected item and append it to first selected item
		locationStart.item.content.insert( locationStart.offset, locationEnd.item.content.getContent(
			new es.Range(
				locationEnd.offset,
				locationEnd.item.content.getLength()
			)
		).data );

		// delete all selected items except first one
		var deleting = false;
		for ( var i = 0; i < this.list.items.length; i++ ) {
			if ( this.list.items[i] === locationStart.item ) {
				deleting = true;
				continue;
			} else if ( this.list.items[i] === locationEnd.item ) {
				this.list.items[i].list.remove( this.list.items[i] );
				break;
			}
			if ( deleting ) {
				this.list.items[i].list.remove( this.list.items[i] );
				i--;
			}
		}
		
		this.enumerate();
	}
};

/**
 * Applies an annotation to a given range.
 * 
 * If a range arguments are not provided, all content will be annotated.
 * 
 * @method
 * @param method {String} Way to apply annotation ("toggle", "add" or "remove")
 * @param annotation {Object} Annotation to apply
 * @param range {es.Range} Range of content to annotate
 */
es.ListBlock.prototype.annotateContent = function( method, annotation, range ) {
	range.normalize();
	
	var locationStart = this.getLocationFromOffset( range.start ),
		locationEnd = this.getLocationFromOffset( range.end );

	if ( locationStart.item === locationEnd.item ) {
		// annotate content within one item
		locationStart.item.content.annotate(
			method,
			annotation,
			new es.Range( locationStart.offset, locationStart.offset + range.getLength() )
		);
	} else {
		// annotate content across multiple items
		
		// annotate content in the first item - from offset to end
		locationStart.item.content.annotate(
			method,
			annotation,
			new es.Range(
				locationStart.offset,
				locationStart.item.content.getLength()
			)
		);

		// annotate content in the last item - from beginning to offset
		locationEnd.item.content.annotate(
			method,
			annotation,
			new es.Range(
				0,
				locationEnd.offset
			)
		);
		
		// annotate all content in selected items except first and last one
		var annotating = false;
		for ( var i = 0; i < this.list.items.length; i++ ) {
			if ( this.list.items[i] === locationStart.item ) {
				annotating = true;
				continue;
			} else if ( this.list.items[i] === locationEnd.item ) {
				break;
			}
			if ( annotating ) {
				this.list.items[i].content.annotate(
					method,
					annotation,
					new es.Range(
						0,
						this.list.items[i].content.getLength()
					)
				);
			}
		}
	}
};

es.ListBlock.prototype.getText = function( range, render ) {
	return "";
};

es.ListBlock.prototype.getWikiDom = function() {

};

/* Registration */

/**
 * Extend es.Block to support list block creation with es.Block.newFromWikiDom
 */
es.Block.blockConstructors.list = es.ListBlock.newFromWikiDomListBlock;

/* Inheritance */
es.extend( es.ListBlock, es.Block );