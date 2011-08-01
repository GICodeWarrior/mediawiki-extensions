/**
 * List item.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @extends {es.Container}
 * @param content {es.Content} Item content
 * @param lists {Array} List of item sub-lists
 * @property content {es.Content} Item content
 * @property lists {Array} List of item sub-lists
 * @property $line {jQuery} Line element
 * @property $content {jQuery} Content element
 * @property flow {es.TextFlow} Text flow object for content
 */
es.ListBlockItem = function( content, lists ) {
	es.EventEmitter.call( this );
	es.Container.call( this, 'item', 'lists', lists, 'li' );
	this.content = content || new es.Content();
	this.$line = $( '<div class="editSurface-list-line"></div>' );
	this.$content = $( '<div class="editSurface-list-content"></div>' );
	this.$.prepend( this.$line.append( this.$content ) );
	this.flow = new es.TextFlow( this.$content, this.content );
	var listBlockItem = this;
	this.flow.on( 'render', function() {
		listBlockItem.emit( 'update' );
	} );
}

/* Static Methods */

/**
 * Creates an EditSurface list item object from a WikiDom list item object.
 * 
 * @static
 * @method
 * @param wikidomListItem {Object} WikiDom list item
 * @returns {es.ListBlockItem} EditSurface list block item
 */
es.ListBlockItem.newFromWikiDomListItem = function( wikidomListItem ) {
	// Convert items to es.ListBlockItem objects
	var lists = [];
	if ( wikidomListItem.lists ) {
		for ( var i = 0; i < wikidomListItem.lists.length; i++ ) {
			lists.push( es.ListBlockList.newFromWikiDomList( wikidomListItem.lists[i] ) );
		}
	}
	return new es.ListBlockItem( es.Content.newFromWikiDomLine( wikidomListItem.line ), lists );
};

/* Methods */

/**
 * Gets the index of the item within it's list.
 * 
 * TODO: Move to es.Container
 * 
 * @method
 * @returns {Integer} Index of item
 */
es.ListBlockItem.prototype.getIndex = function() {
	return this.list._list.indexOf( this );
};

/**
 * Gets the length of content in both the line and sub-lists.
 * 
 * @method
 * @returns {Integer} Length of content 
 */
es.ListBlockItem.prototype.getLength = function() {
	var length = this.content.getLength() + 1;
	for ( var i = 0; i < this.lists.length; i++ ) {
		length += this.lists[i].getLength();
	}
	return length;
};

/**
 * Gets a location from an offset.
 * 
 * @method
 * @param offset {Integer} Offset to get location for
 * @returns {Object} Location object with item and offset properties, where offset is local
 * to item.
 */
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

/**
 * Gets an offset within the item from a position.
 * 
 * @method
 * @param position {es.Position} Position to translate
 * @returns {Integer} Offset nearest position
 * @returns {Null} If offset could not be found
 */
es.ListBlockItem.prototype.getOffsetFromPosition = function( position ) {
	var itemOffset = this.$.offset(),
		itemHeight = this.$.height(),
		offset = null,
		globalOffset = null;

	if ( position.top >= itemOffset.top && position.top < itemOffset.top + itemHeight ) {
		if ( position.top < itemOffset.top + this.$line.height() ) {
			position.top -= itemOffset.top;
			position.left -= itemOffset.left;
			return globalOffset + this.flow.getOffset( position );
		}
		
		for ( var i = 0; i < this.lists.length; i++ ) {
			offset = this.lists[i].getOffsetFromPosition( position );
			if ( offset != null ) {
				return globalOffset + offset + this.content.getLength() + 1;
			} else {
				globalOffset += this.lists[i].getLength();
			}
		}
	}
	return null;
};

/**
 * Renders content and sub-lists.
 * 
 * @method
 * @param offset {Integer} Offset to render from if possible
 */
es.ListBlockItem.prototype.renderContent = function( offset ) {
	// TODO: Abstract offset and use it when rendering
	this.flow.render();
	for ( var i = 0; i < this.lists.length; i++ ) {
		this.lists[i].renderContent();
	}
};

/* Inheritance */

es.extend( es.ListBlockItem, es.EventEmitter );
es.extend( es.ListBlockItem, es.Container );
