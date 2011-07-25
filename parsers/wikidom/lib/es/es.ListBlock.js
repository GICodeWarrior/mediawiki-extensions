/**
 * es.ListBlock
 */
es.ListBlock = function( style, items ) {
	es.Block.call( this );
	this.list = new es.ListBlockList( style, items );
	this.$ = this.list.$
		.addClass( 'editSurface-block' )
		.data( 'block', this );
}

es.ListBlock.newFromWikidom = function( wikidomList ) {
	return new es.ListBlock( wikidomList.style, wikidomList.items );
};

es.ListBlock.prototype.getText = function() {
	return '';
};

es.ListBlock.prototype.getLength = function() {
	// Compensate for n+1 virtual position on the last item's content
	return this.list.getLength() - 1;
};

/**
 * Renders content into a container.
 */
es.ListBlock.prototype.renderContent = function( offset ) {
	this.list.renderContent( offset );
};

es.ListBlock.prototype.getPosition = function( offset ) {
	var location = this.list.getLocationFromOffset( offset )
		position = location.item.flow.getPosition( location.offset ),
		blockOffset = this.$.offset(),
		lineOffset = location.item.$line.find( '.editSurface-list-content' ).offset();
	
	position.top += lineOffset.top - blockOffset.top; 
	position.left += lineOffset.left - blockOffset.left;
	position.bottom += lineOffset.top - blockOffset.top;
	
	// Recursively walk the tree of list items and their lists, depth first, until we get to the
	// same item as location.item, incrementing position.line for each line that occurs before it
	var stack = [{ 'list': this.list, 'index': 0 }],
		list,
		item,
		pop,
		parent;
	while ( stack.length ) {
		iteration = stack[stack.length - 1];
		pop = true;
		while ( iteration.index < iteration.list.items.length ) {
			item = iteration.list.items[iteration.index++];
			if ( item === location.item ) {
				return position;
			}
			position.line += item.flow.lines.length;
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
	return position;
};

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

es.Block.models['list'] = es.ListBlock;

es.extend( es.ListBlock, es.Block );
