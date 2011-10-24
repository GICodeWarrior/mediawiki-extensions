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
	es.ModelList.call( this );
	if ( $.isArray( items ) ) {
		for ( var i = 0; i < items.length; i++ ) {
			this.append( items[i] );
		}
	}
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
	styles.push( obj.attributes.style || 'bullet' );
	var items = [];
	if ( $.isArray( obj.children ) ) {
		$.each( obj.children, function( i, item ) {
			if ( $.isPlainObject( item.content ) ) {
				items.push(
					new es.ListBlockItemModel(
						es.ContentModel.newFromPlainObject( item.content ),
						styles.slice( 0 )
					)
				);
			}
			if ( $.isArray( item.children ) ) {
				$.each( item.children, function( i, list ) {
					items = items.concat( es.ListBlockModel.flattenPlainObject( list, styles ) );
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
		!$.isArray( obj.children ) ? [] : es.ListBlockModel.flattenPlainObject( obj )
	);
};

/* Methods */

/**
 * Creates a view for this model
 */
es.ListBlockModel.prototype.createView = function() {
	return new es.ListBlockView( this );
};

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

es.ListBlockModel.prototype.commit = function( transaction ) {
	// TODO
};

es.ListBlockModel.prototype.rollback = function( transaction ) {
	// TODO
};

es.ListBlockModel.prototype.prepareInsertContent = function( offset, content ) {
	// TODO
};

es.ListBlockModel.prototype.prepareRemoveContent = function( range ) {
	// TODO
};

es.ListBlockModel.prototype.prepareAnnotateContent = function( range, annotation ) {
	// TODO
};

es.ListBlockModel.prototype.insertContent = function( offset, content ) {
	// TODO
};

es.ListBlockModel.prototype.removeContent = function( range ) {
	// TODO
};

es.ListBlockModel.prototype.annotateContent = function( range, annotation ) {
	// TODO
};

// Register constructor
es.BlockModel.constructors.list = es.ListBlockModel.newFromPlainObject;

/* Inheritance */

es.extend( es.ListBlockModel, es.BlockModel );
es.extend( es.ListBlockModel, es.ModelList );
