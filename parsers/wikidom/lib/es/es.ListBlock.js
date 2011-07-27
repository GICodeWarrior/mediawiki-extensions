/**
 * es.ListBlock
 * 
 * 
 * @class
 * @constructor
 * @extends {es.Block}
 * @param style {String} Type of list, either "number" or "bullet"
 * @param items {Array} List of es.ListBlockItems to append initially to the root list
 * @property list {es.ListBlockList}
 * @property $ {jQuery}
 */
es.ListBlock = function( style, items ) {
	es.Block.call( this );
	this.list = new es.ListBlockList( style, items );
	this.$ = this.list.$
		.addClass( 'editSurface-block' )
		.data( 'block', this );
	var block = this;
	this.list.on( 'update', function() {
		block.emit( 'update' );
	} );
};

/**
 * Creates a new list block object from Wikidom data.
 * 
 * @param wikidomList {Object} Wikidom data to convert from
 */
es.ListBlock.newFromWikidom = function( wikidomList ) {
	return new es.ListBlock( wikidomList.style, wikidomList.items );
};

/**
 * Gets the length of all block content.
 */
es.ListBlock.prototype.getLength = function() {
	// Compensate for n+1 virtual position on the last item's content
	return this.list.getLength() - 1;
};

/**
 * Inserts content into a block at an offset.
 * 
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
 * @param range {es.Range} Range of content to remove
 */
es.ListBlock.prototype.deleteContent = function( range ) {
	range.normalize();
	var location = this.list.getLocationFromOffset( range.start );
	location.item.flow.content.remove(
		new es.Range( location.offset, location.offset + range.getLength() )
	);
};

/**
 * Applies an annotation to a given range.
 * 
 * If a range arguments are not provided, all content will be annotated.
 * 
 * @param method {String} Way to apply annotation ("toggle", "add" or "remove")
 * @param annotation {Object} Annotation to apply
 * @param range {es.Range} Range of content to annotate
 */
es.ListBlock.prototype.annotateContent = function( method, annotation, range ) {
	range.normalize();

	var locationStart = this.list.getLocationFromOffset( range.start ),
		locationEnd = this.list.getLocationFromOffset( range.end );

	if ( locationStart.item == locationEnd.item ) {

		locationStart.item.content.annotate( method, annotation, locationStart.offset, locationStart.offset + range.end - range.start );		

	} else {
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
		
		locationStart.item.content.annotate( method, annotation, locationStart.offset, locationStart.item.content.getLength() );
		locationEnd.item.content.annotate( method, annotation, 0, locationEnd.offset);
		
		for ( var i = 0; i < itemsToAnnotate.length; i++ ) {
			itemsToAnnotate[i].content.annotate( method, annotation, 0, itemsToAnnotate[i].content.getLength());
		}
	}	
};

/**
 * Gets content within a range.
 * 
 * @param range {es.Range} Range of content to get
 */
es.ListBlock.prototype.getContent = function( range ) {
	// TODO: Implement me!
	return new Content();
};

/**
 * Gets content as plain text within a range.
 * 
 * @param range {Range} Range of text to get
 * @param render {Boolean} If annotations should have any influence on output
 */
es.ListBlock.prototype.getText = function( range ) {
	// TODO: Implement me!
	return '';
};

/**
 * Renders content into a container.
 */
es.ListBlock.prototype.renderContent = function( offset ) {
	this.list.renderContent( offset );
};

/**
 * Gets the offset of a position.
 * 
 * @param position {Integer} Offset to translate
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
 * @param offset {Integer} Offset to translate
 */
es.ListBlock.prototype.getPosition = function( offset ) {
	var location = this.list.getLocationFromOffset( offset )
		position = location.item.flow.getPosition( location.offset ),
		blockOffset = this.$.offset(),
		lineOffset = location.item.$line.find( '.editSurface-list-content' ).offset();
	
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
 * @param offset {Integer} Offset to find word nearest to
 * @return {Object} Range object of boundaries
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
 * @param offset {Integer} Offset to find section nearest to
 * @return {Object} Range object of boundaries
 */
es.ListBlock.prototype.getSectionBoundaries = function( offset ) {
	var location = this.list.getLocationFromOffset( offset ),
		start = offset - location.offset;
	return new es.Range( start, start + location.item.content.getLength() );
};

/**
 * Iteratively execute a callback on each item in the list.
 * 
 * Traversal is performed in a depth-first pattern, which is equivilant to a vertical scan of list
 * items. To stop traversal, return false within the callback function.
 * 
 * @param callback {Function} Function to execute for each item, accepts an item and index argument
 * @return {Boolean} Whether all items were traversed, or traversal was cut short
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

/**
 * Extend es.Block to support list block creation with es.Block.newFromWikidom
 */
es.Block.models.list = es.ListBlock;

es.extend( es.ListBlock, es.Block );
