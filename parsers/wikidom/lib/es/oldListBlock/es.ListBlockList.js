/**
 * Number or bullet list.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @extends {es.Container}
 * @param style {String} Style of list, either "number" or "bullet"
 * @param items {Array} List of es.ListBlockItem objects to initialize list with
 * @property style {String} Style of list
 * @property items {Array} List of es.ListBlockItem objects
 */
es.ListBlockList = function( style, items ) {
	es.EventEmitter.call( this );
	es.Container.call( this, 'list', 'items', items, 'ul' );
	this.style = style || 'bullet';
	if ( this.style == 'number' ) {
		this.$.css('list-style', 'decimal');
	}
};

/* Static Methods */

/**
 * Creates an EditSurface list object from a WikiDom list object.
 * 
 * @static
 * @method
 * @param wikidomListItem {Object} WikiDom list item
 * @returns {es.ListBlockItem} EditSurface list block item
 */
es.ListBlockList.newFromWikiDomList = function( wikidomList ) {
	var items = [];
	for ( var i = 0; i < wikidomList.items.length; i++ ) {
		items.push( es.ListBlockItem.newFromWikiDomListItem( wikidomList.items[i] ) );
	}
	return new es.ListBlockList( wikidomList.style, items );
};

/* Methods */

/**
 * Gets the length of content in both the line and sub-lists.
 * 
 * @method
 * @returns {Integer} Length of content 
 */
es.ListBlockList.prototype.getLength = function() {
	var length = 0;
	for ( var i = 0; i < this.items.length; i++ ) {
		length += this.items[i].getLength();
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

/**
 * Gets an offset within the list from a position.
 * 
 * @method
 * @param position {es.Position} Position to translate
 * @returns {Integer} Offset nearest position
 * @returns {Null} If offset could not be found
 */
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
 * Renders items.
 * 
 * @method
 * @param offset {Integer} Offset to render from if possible
 */
es.ListBlockList.prototype.renderContent = function( offset ) {
	// TODO: Abstract offset and use it when rendering
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].renderContent();
	}
};

/* Inheritance */

es.extend( es.ListBlockList, es.EventEmitter );
es.extend( es.ListBlockList, es.Container );
