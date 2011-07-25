/**
 * es.ListBlockItem
 */
es.ListBlockItem = function( line, lists ) {
	// Convert items to es.ListBlockItem objects
	var itemLists = [];
	for ( var i = 0; i < lists.length; i++ ) {
		itemLists.push( new es.ListBlockList( lists[i].style, lists[i].items || [] ) );
	}
	/*
	 * Initialize container
	 * 
	 * - Adds class to container: "editSurface-item"
	 * - Sets .data( 'item', this )
	 * - Adds this.lists array
	 */
	es.Container.call( this, 'item', 'lists', itemLists );
	
	this.$line = $( '<div class="editSurface-list-line"></div>' ).prependTo( this.$ )
	this.$content = $( '<div class="editSurface-list-content"></div>' ).appendTo( this.$line );
	
	this.content = line ? es.Content.newFromLine( line ) : new es.Content();
	this.flow = new es.TextFlow( this.$content, this.content );
	var item = this;
	this.flow.on( 'render', function() {
		item.emit( 'update' );
	} );
}

es.ListBlockItem.prototype.getLength = function() {
	var length = this.content.getLength();
	for ( var i = 0; i < this.lists.length; i++ ) {
		length += this.lists[i].getLength();
	}
	return length;
};

es.ListBlockItem.prototype.getLocationFromOffset = function( offset ) {
	var contentLength = this.content.getLength();
	
	if ( offset < contentLength ) {
		return {
			'item': this,
			'offset': offset
		};
	}
	
	offset -= contentLength;
	
	var listOffset = 0,
		listLength;
	for ( var i = 0; i < this.lists.length; i++ ) {
		listLength = this.lists[i].getLength();
		if ( offset >= listOffset && offset < listOffset + listLength ) {
			return this.lists[i].getLocationFromOffset( offset - listOffset );
		}
		listOffset += listLength;
	}
};

es.ListBlockItem.prototype.getOffsetFromPosition = function( position ) {
	var itemOffset = this.$.offset(),
		itemHeight = this.$.height(),
		offset = null,
		globalOffset = null;

	if ( position.top > itemOffset.top && position.top < itemOffset.top + itemHeight ) {
		if ( position.top < itemOffset.top + this.$line.height() ) {
			position.top -= itemOffset.top;
			position.left -= itemOffset.left;
			position.left += this.$.parent().offset().left - itemOffset.left;
			return globalOffset + this.flow.getOffset( position );
		}
		
		for ( var i = 0; i < this.lists.length; i++ ) {
			offset =  this.lists[i].getOffsetFromPosition( position );
			if ( offset != null ) {
				return globalOffset + offset + this.content.getLength();
			} else {
				globalOffset += this.lists[i].getLength();
			}
		}
	}
};

es.ListBlockItem.prototype.renderContent = function( offset ) {
	// TODO: Abstract offset and use it when rendering
	this.flow.render();
	for ( var i = 0; i < this.lists.length; i++ ) {
		this.lists[i].renderContent();
	}
};

es.extend( es.ListBlockItem, es.Container );
