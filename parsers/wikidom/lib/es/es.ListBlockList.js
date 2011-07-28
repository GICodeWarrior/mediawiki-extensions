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
	es.Container.call( this, 'list', 'items', items );
	this.style = style || 'bullet';
};

/* Static Methods */

es.ListBlockList.newFromWikidom = function( wikidomList ) {
	var items = [];
	for ( var i = 0; i < wikidomList.items.length; i++ ) {
		items.push( es.ListBlockItem.newFromWikidom( wikidomList.items[i] ) );
	}
	return new es.ListBlockList( wikidomList.style, items );
};

/* Methods */

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
