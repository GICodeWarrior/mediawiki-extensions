/**
 * Creates an es.TableBlockModel object.
 * 
 * @class
 * @constructor
 * @param rows {Array}
 * @param attributes {Object}
 * @property cells {Array}
 * @property attributes {Object}
 */
es.TableBlockModel = function( rows, attributes ) {
	es.BlockModel.call( this, ['isDocumentContainer', 'isAggregate'] );
	this.rows = new es.ContentSeries( rows || [] );
	this.attributes = attributes || {};
};

/* Static Methods */

/**
 * Creates an TableBlockModel object from a plain object.
 * 
 * @method
 * @static
 * @param obj {Object}
 */
es.TableBlockModel.newFromPlainObject = function( obj ) {
	return new es.TableBlockModel(
		// Cells - if given, convert plain "item" objects to es.ListModelItem objects
		!$.isArray( obj.rows ) ? [] : $.map( obj.rows, function( row ) {
			return !$.isPlainObject( row ) ? null : es.TableBlockRowModel.newFromPlainObject( row )
		} )
		// Attributes - if given, make a deep copy of attributes
		!$.isPlainObject( obj.attributes ) ? {} : $.extend( true, {}, obj.attributes )
	);
};

/* Methods */

/**
 * Gets the length of all content.
 * 
 * @method
 * @returns {Integer} Length of all content
 */
es.TableBlockModel.prototype.getContentLength = function() {
	return this.rows.getContentLength();
};

/**
 * Gets a plain table block object.
 * 
 * @method
 * @returns obj {Object}
 */
es.TableBlockModel.prototype.getPlainObject = function() {
	var obj = { 'type': 'table' };
	if ( this.rows.length ) {
		obj.rows = $.map( this.rows, function( row ) {
			return row.getPlainObject();
		} );
	}
	if ( !$.isEmptyObject( this.attributes ) ) {
		obj.attributes = $.extend( true, {}. this.attributes );
	}
	return obj;
};

// Register constructor
es.BlockModel.constructors['table'] = es.TableBlockModel;

/* Inheritance */

es.extend( es.TableBlockModel, es.BlockModel );
