/**
 * Creates an es.ListBlockModel object.
 * 
 * @class
 * @constructor
 * @param items {Array}
 * @property items {Array}
 */
es.ListBlockModel = function( items ) {
	es.BlockModel.call( this, ['hasContent', 'isAnnotatable', 'isAggregate'] );
	this.items = new es.ContentSeries( items || [] );
};

/* Static Methods */

/**
 * Converts a plain object tree-structure of a list with items, each containing content and one or
 * more lists to a flat array of es.ListBlockItemModel objects.
 * 
 * This is a helper function for es.ListBlockModel.newFromPlainObject. Parent list styles are
 * retained in the styles array of the es.ListBlockItemModel objects.
 * 
 * If a plain list object does not have a style property, "bullet" will be used by default.
 * 
 * @method
 * @static
 * @param obj {Object}
 * @param styles {Array}
 */
es.ListBlockModel.flattenPlainObject = function( obj, styles ) {
	if ( !$.isArray( styles ) ) {
		styles = [];
	}
	styles.push( obj.style || 'bullet' );
	var items = [];
	if ( $.isArray( obj.items ) ) {
		$.each( obj.items, function( item ) {
			if ( $.isPlainObject( item.content ) ) {
				items.push(
					new es.ListBlockItemModel(
						es.ContentModel.newFromPlainObject( item.content ),
						styles.slice( 0 )
					)
				);
			}
			if ( $.isArray( item.lists ) ) {
				$.each( item.lists, function( list ) {
					items = items.concat( es.ListBlockList.flattenList( list, styles ) );
				} );
			}
		} );
	}
	styles.pop();
	return items;
};

/**
 * Creates an es.ListBlockModel object from a plain object.
 * 
 * @method
 * @static
 * @param obj {Object}
 */
es.ListBlockModel.newFromPlainObject = function( obj ) {
	return new es.ListBlockModel(
		// Items - if given, convert plain "list" object from a tree structure to a flat array of
		// es.ListBlockItemModel objects
		!$.isArray( obj.items ) ? [] : es.ListBlockModel.flattenPlainObject( obj )
	);
};

/* Methods */

/**
 * Gets the length of all content.
 * 
 * @method
 * @returns {Integer} Length of all content
 */
es.ListBlockModel.prototype.getContentLength = function() {
	return this.items.getContentLength();
};

/**
 * Gets a plain list block object.
 * 
 * @method
 * @returns obj {Object}
 */
es.ListBlockModel.prototype.getPlainObject = function() {
	var obj = { 'type': 'list' };
	if ( this.items.length ) {
		obj.items = [];
		for ( var i = 0; i < this.items.length; i++ ) {
			obj.items.push( this.items[i].getPlainObject() );
		}
	}
	return obj;
};

// Register constructor
es.BlockModel.constructors['list'] = es.ListBlockModel;

/* Inheritance */

es.extend( es.ListBlockModel, es.BlockModel );
