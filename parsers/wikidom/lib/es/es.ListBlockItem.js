/**
 * List item.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @extends {es.Container}
 * @param line {es.Content} Item content
 * @param lists {Array} List of item sub-lists
 * @property lists {Array}
 * @property $line
 * @property $content
 * @property content
 * @property flow
 */
es.ListBlockItem = function( line, lists ) {
	es.EventEmitter.call( this );
	es.Container.call( this, 'item', 'lists', lists );
	this.content = line || new es.Content();
	this.$line = $( '<div class="editSurface-list-line"></div>' );
	this.$content = $( '<div class="editSurface-list-content"></div>' );
	this.$.prepend( this.$line.append( this.$content ) );
	this.flow = new es.TextFlow( this.$content, this.content );
	this.flow.on( 'render', function() {
		this.emit( 'update' );
	} );
}

/* Static Methods */

es.ListBlockItem.newFromWikidom = function( wikidomItem ) {
	// Convert items to es.ListBlockItem objects
	var lists = [];
	if ( wikidomItem.lists ) {
		for ( var i = 0; i < wikidomItem.lists.length; i++ ) {
			lists.push( es.ListBlockList.newFromWikidom( wikidomItem.lists[i] ) );
		}
	}
	return new es.ListBlockItem( es.Content.newFromLine( wikidomItem.line ), lists );
};

/* Methods */

/**
 * Gets the index of the item within it's list.
 * 
 * @returns {Integer} Index of item
 */
es.ListBlockItem.prototype.getIndex = function() {
	return this.list._list.indexOf( this );
};

es.ListBlockItem.prototype.getLength = function() {
	var length = this.content.getLength() + 1;
	for ( var i = 0; i < this.lists.length; i++ ) {
		length += this.lists[i].getLength();
	}
	return length;
};

es.ListBlockItem.prototype.getLocationFromOffset = function( offset ) {
	var contentLength = this.content.getLength() + 1;
	
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

	if ( position.top >= itemOffset.top && position.top < itemOffset.top + itemHeight ) {
		if ( position.top < itemOffset.top + this.$line.height() ) {
			position.top -= itemOffset.top;
			position.left -= itemOffset.left;
			position.left += this.$.parent().offset().left - itemOffset.left;
			return globalOffset + this.flow.getOffset( position );
		}
		
		for ( var i = 0; i < this.lists.length; i++ ) {
			offset =  this.lists[i].getOffsetFromPosition( position );
			if ( offset != null ) {
				return globalOffset + offset + this.content.getLength() + 1;
			} else {
				globalOffset += this.lists[i].getLength();
			}
		}
	}
	return null;
};

es.ListBlockItem.prototype.renderContent = function( offset ) {
	// TODO: Abstract offset and use it when rendering
	this.flow.render();
	for ( var i = 0; i < this.lists.length; i++ ) {
		this.lists[i].renderContent();
	}
};

es.extend( es.ListBlockItem, es.EventEmitter );
es.extend( es.ListBlockItem, es.Container );
