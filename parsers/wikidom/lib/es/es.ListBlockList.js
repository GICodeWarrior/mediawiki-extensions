/**
 * es.ListBlockList
 */
es.ListBlockList = function( style, items ) {
	// Inheritance
	es.EventEmitter.call( this );
	
	// Convert items to es.ListBlockItem objects
	var listItems = [],
		list = this;
	for ( var i = 0; i < items.length; i++ ) {
		listItems.push( new es.ListBlockItem( items[i].line, items[i].lists || [] ) );
		listItems[i].on( 'update', function() {
			list.emit( 'update' );
		} );
	}

	/*
	 * Initialize container
	 * 
	 * - Adds class to container: "editSurface-list"
	 * - Sets .data( 'list', this )
	 * - Adds this.items array
	 */
	es.Container.call( this, 'list', 'items', listItems );
	
	this.style = style;
}

es.ListBlockList.prototype.getLength = function() {
	var length = 0;
	for ( var i = 0; i < this.items.length; i++ ) {
		length += this.items[i].getLength();
	}
	return length;
};

es.ListBlockList.prototype.getLocationFromOffset = function( offset ) {
	var itemOffset = 0,
		itemLength;
	for ( var i = 0; i < this.items.length; i++ ) {
		itemLength = this.items[i].getLength();
		if ( offset >= itemOffset && offset < itemOffset + itemLength ) {
			return this.items[i].getLocationFromOffset( offset - itemOffset );
		}
		itemOffset += itemLength;
	}
};

es.ListBlockList.prototype.getOffsetFromPosition = function( position ) {
	var itemOffset = null,
		globalOffset = null;
	
	for ( var i = 0; i < this.items.length; i++ ) {
		itemOffset = this.items[i].getOffsetFromPosition( position );
		
		if ( itemOffset !== null ) {
			return globalOffset + itemOffset;
		} else {
			globalOffset += this.items[i].getLength();
		}
	}
};

/**
 * Renders content into a container.
 */
es.ListBlockList.prototype.renderContent = function( offset ) {
	// TODO: Abstract offset and use it when rendering
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].renderContent();
	}
};

es.extend( es.ListBlockList, es.EventEmitter );
es.extend( es.ListBlockList, es.Container );