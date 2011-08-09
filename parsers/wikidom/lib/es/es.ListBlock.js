/**
 * Creates a list block.
 * 
 * @class
 * @constructor
 * @extends {es.Block}
 * @param list {es.ListBlockList} Root list to initialize with
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
 * @param wikidomParagraphBlock {Object} WikiDom data to convert from
 * @returns {es.ListBlock} EditSurface list block
 */
es.ListBlock.newFromWikiDomListBlock = function( wikidomListBlock ) {
	if ( wikidomListBlock.type !== 'list' ) {
		throw 'Invalid block type error. List block expected to be of type "list".';
	}
	return new es.ListBlock( es.ListBlockList.newFromWikiDomList( wikidomListBlock ) );
};

/* Methods */

/**
 * Gets the length of all block content.
 * 
 * @method
 * @returns {Integer} Length of content
 */
es.ListBlock.prototype.getLength = function() {
	// Compensate for n+1 virtual position on the last item's content
	return this.list.getLength() - 1;
};

/**
 * Inserts content into a block at an offset.
 * 
 * @method
 * @param offset {Integer} Position to insert content at
 * @param content {Object} Content to insert
 */
es.ListBlock.prototype.insertContent = function( offset, content ) {
	var location = this.list.getLocationFromOffset( offset );
	location.item.flow.content.insert( location.offset, content );
};

/**
 * Deletes content in a block within a range.
 * 
 * @method
 * @param range {es.Range} Range of content to remove
 */
es.ListBlock.prototype.deleteContent = function( range ) {
	range.normalize();

	var locationStart = this.list.getLocationFromOffset( range.start ),
		locationEnd = this.list.getLocationFromOffset( range.end );
	
	if ( locationStart.item == locationEnd.item ) {

		locationStart.item.content.remove(
			new es.Range( locationStart.offset, locationStart.offset + range.getLength() )
		);
		
	} else {
		var contentToAppend = locationEnd.item.flow.content.getContent(
			new es.Range(
				locationEnd.offset,
				locationEnd.item.flow.content.getLength()
			)
		);
		locationStart.item.flow.content.remove(
			new es.Range( locationStart.offset, locationStart.item.flow.content.getLength() )
		);
		locationStart.item.flow.content.insert( locationStart.offset, contentToAppend.data );

		var itemsToDelete;
		this.traverseItems( function( item, index ) {
			if ( $.isArray( itemsToDelete ) ) {
				itemsToDelete.push( item );
			}
			if ( item == locationEnd.item ) {
				return false;
			}
			if ( item == locationStart.item ) {
				itemsToDelete = [];
			}
		} );

		for ( var i = itemsToDelete.length - 1; i >= 0; i-- ) {
			if ( itemsToDelete[i].getLength() - 1 === itemsToDelete[i].flow.content.getLength() ) {
				itemsToDelete[i].list.remove(itemsToDelete[i]);
			} else {
				itemsToDelete[i].flow.content.remove( new es.Range( 0, itemsToDelete[i].flow.content.getLength() ) );
			}
		}

		/*
		var start = locationEnd.item;
		while(start) {
			start = start.list.item;
			console.log("-")
		}
		*/
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
	var locationStart = this.list.getLocationFromOffset( range.start ),
		locationEnd = this.list.getLocationFromOffset( range.end );
	
	if ( locationStart.item == locationEnd.item ) {
		// annotating content within one item
		locationStart.item.content.annotate(
			method,
			annotation,
			new es.Range( locationStart.offset, locationStart.offset + range.end - range.start )
		);
	} else {
		// annotating content across multiple items

		// collect all items to be later annotate - you can not modify during traversing
		var itemsToAnnotate;
		this.traverseItems( function( item, index ) {
			if ( item == locationEnd.item ) {
				return false;
			}
			if ( $.isArray( itemsToAnnotate ) ) {
				itemsToAnnotate.push( item );
			}
			if ( item == locationStart.item ) {
				itemsToAnnotate = [];
			}
		} );

		// annotate content in the first item - from offset to end
		locationStart.item.content.annotate(
			method,
			annotation,
			new es.Range( locationStart.offset, locationStart.item.content.getLength() )
		);

		// annotate content in the last item - from beginning to offset
		locationEnd.item.content.annotate(
			method,
			annotation,
			new es.Range( 0, locationEnd.offset )
		);

		// annotate content in all items in between first and last items
		for ( var i = 0; i < itemsToAnnotate.length; i++ ) {
			itemsToAnnotate[i].content.annotate(
				method,
				annotation,
				new es.Range( 0, itemsToAnnotate[i].content.getLength() )
			);
		}
	}	
};

/**
 * Gets content within a range.
 * 
 * @method
 * @param range {es.Range} Range of content to get
 * @returns {es.Content} Content within range
 */
es.ListBlock.prototype.getContent = function( range ) {
	// TODO: Implement me!
	return new es.Content();
};

/**
 * Gets content as plain text within a range.
 * 
 * @method
 * @param range {Range} Range of text to get
 * @param render {Boolean} If annotations should have any influence on output
 * @returns {String} Text within range
 */
es.ListBlock.prototype.getText = function( range ) {
	// TODO: Implement me!
	return '';
};

/**
 * Renders content into a container.
 * 
 * @method
 * @param offset {Integer} Offset to render from, if possible
 */
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
	var blockOffset = this.$.offset();
	position.top += blockOffset.top;
	position.left += blockOffset.left;
	return this.list.getOffsetFromPosition( position );
};

/**
 * Gets the position of an offset.
 * 
 * @method
 * @param offset {Integer} Offset to translate
 * @returns {es.Position} Position of offset
 */
es.ListBlock.prototype.getPosition = function( offset ) {
	var location = this.list.getLocationFromOffset( offset )
		position = location.item.flow.getPosition( location.offset ),
		blockOffset = this.$.offset(),
		lineOffset = location.item.$content.offset();
	
	position.top += lineOffset.top - blockOffset.top; 
	position.left += lineOffset.left - blockOffset.left;
	position.bottom += lineOffset.top - blockOffset.top;
	
	this.traverseItems( function( item ) {
		if ( item === location.item ) {
			return false;
		}
		position.line += item.flow.lines.length;
	} );
	return position;
};

/**
 * Gets the start and end points of the word closest a given offset.
 * 
 * @method
 * @param offset {Integer} Offset to find word nearest to
 * @returns {Object} Range object of boundaries
 */
es.ListBlock.prototype.getWordBoundaries = function( offset ) {
	var location = this.list.getLocationFromOffset( offset );
	var boundaries = location.item.flow.content.getWordBoundaries( location.offset );
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
	var location = this.list.getLocationFromOffset( offset ),
		start = offset - location.offset;
	return new es.Range( start, start + location.item.content.getLength() );
};

es.ListBlock.prototype.getLineBoundaries = function( offset ) {
	var location = this.list.getLocationFromOffset( offset ),
		line;
	
	for ( var i = 0; i < location.item.flow.lines.length; i++ ) {
		line = location.item.flow.lines[i];
		if ( location.offset >= line.range.start && location.offset < line.range.end ) {
			break;
		}
	}
	
	return new es.Range(
		( offset - location.offset ) + line.range.start,
		( offset - location.offset ) + ( line.range.end < location.item.content.getLength() ? line.range.end - 1 : line.range.end )
	);
};

/**
 * Iteratively execute a callback on each item in the list.
 * 
 * Traversal is performed in a depth-first pattern, which is equivilant to a vertical scan of list
 * items. To stop traversal, return false within the callback function.
 * 
 * @method
 * @param callback {Function} Function to execute for each item, accepts an item and index argument
 * @returns {Boolean} Whether all items were traversed, or traversal was cut short
 */
es.ListBlock.prototype.traverseItems = function( callback ) {
	var stack = [{ 'list': this.list, 'index': 0 }],
		list,
		item,
		pop,
		parent,
		index = 0;
	while ( stack.length ) {
		iteration = stack[stack.length - 1];
		pop = true;
		while ( iteration.index < iteration.list.items.length ) {
			item = iteration.list.items[iteration.index++];
			if ( callback( item, index++ ) === false ) {
				return false;
			}
			if ( item.lists.length ) {
				parent = stack.length;
				for ( var i = 0; i < item.lists.length; i++ ) {
					stack.push( { 'list': item.lists[i], 'index': 0, 'parent': parent } );
				}
				pop = false;
				break;
			}
		}
		if ( pop ) {
			if ( iteration.parent ) {
				stack = stack.slice( 0, iteration.parent );
			} else {
				stack.pop();
			}
		}
	}
	return true;
};

/* Registration */

/**
 * Extend es.Block to support list block creation with es.Block.newFromWikiDom
 */
es.Block.blockConstructors.list = es.ListBlock.newFromWikiDomListBlock;

/* Inheritance */

es.extend( es.ListBlock, es.Block );
