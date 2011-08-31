/**
 * Creates an es.TableBlockRowModel object.
 * 
 * @class
 * @constructor
 * @param content {es.ContentModel}
 * @param styles {Array}
 * @property content {es.ContentModel}
 * @property styles {Array}
 */
es.TableBlockRowModel = function( cells, attributes ) {
	this.cells = new es.ContentSeries( cells || [] );
	this.attributes = attributes || {};
};

/**
 * Creates an TableBlockModel object from a plain object.
 * 
 * @method
 * @static
 * @param obj {Object}
 */
es.TableBlockRowModel.newFromPlainObject = function( obj ) {
	return new es.TableBlockRowModel(
		// Cells - if given, convert plain "item" objects to es.ListModelItem objects
		!$.isArray( obj.cells ) ? [] : $.map( obj.cells, function( cell ) {
			return !$.isPlainObject( cell ) ? null : es.DocumentModel.newFromPlainObject( cell )
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
es.TableBlockRowModel.prototype.getContentLength = function() {
	return this.cells.getContentLength();
};

/**
 * Gets a plain list block item object.
 * 
 * @method
 * @returns obj {Object}
 */
es.TableBlockRowModel.prototype.getPlainObject = function() {
	var obj = {};
	if ( this.cells.length ) {
		obj.cells = $.map( this.cells, function( cell ) {
			return cell.getPlainObject();
		} );
	}
	if ( !$.isEmptyObject( this.attributes ) ) {
		obj.attributes = $.extend( true, {}. this.attributes );
	}
	return obj;
};
