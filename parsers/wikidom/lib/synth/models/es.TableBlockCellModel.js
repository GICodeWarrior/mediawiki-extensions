/**
 * Creates an es.TableBlockRowModel object.
 * 
 * @class
 * @constructor
 * @param doc {es.DocumentModel}
 * @param attributes {Object}
 * @property document {es.DocumentModel}
 * @property attributes {Object}
 */
es.TableBlockCellModel = function( doc, attributes ) {
	this.document = doc || null;
	this.attributes = attributes || {};
};

/**
 * Creates an TableBlockCellModel object from a plain object.
 * 
 * @method
 * @static
 * @param obj {Object}
 */
es.TableBlockCellModel.newFromPlainObject = function( obj ) {
	return new es.TableBlockRowModel(
		// Cells - if given, convert plain document object to es.DocumentModel objects
		!$.isArray( obj.document ) ? null : es.DocumentModel.newFromPlainObject( obj.document ),
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
 * Gets a plain table cell object.
 * 
 * @method
 * @returns obj {Object}
 */
es.TableBlockRowModel.prototype.getPlainObject = function() {
	var obj = {};
	if ( this.document ) {
		obj.document = this.document;
	}
	if ( !$.isEmptyObject( this.attributes ) ) {
		obj.attributes = $.extend( true, {}, this.attributes );
	}
	return obj;
};
