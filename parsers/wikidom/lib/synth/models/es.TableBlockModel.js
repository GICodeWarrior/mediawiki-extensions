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
	es.ModelList.call( this );

	if ( $.isArray( rows ) ) {
		for ( var i = 0; i < rows.length; i++ ) {
			this.append( rows[i] );
		}
	}

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
		// Cells - if given, convert plain row objects to es.TableBlockRowModel objects
		!$.isArray( obj.children ) ? [] : $.map( obj.children, function( row ) {
			return !$.isPlainObject( row ) ? null : es.TableBlockRowModel.newFromPlainObject( row );
		} ),
		// Attributes - if given, make a deep copy of attributes
		!$.isPlainObject( obj.attributes ) ? {} : $.extend( true, {}, obj.attributes )
	);
};

/* Methods */

/**
 * Creates a view for this model
 */
es.TableBlockModel.prototype.createView = function() {
	return new es.TableBlockView( this );
};

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
	/*
	var obj = { 'type': 'table' };
	if ( this.rows.length ) {
		obj.rows = $.map( this.rows, function( row ) {
			return row.getPlainObject();
		} );
	}
	if ( !$.isEmptyObject( this.attributes ) ) {
		obj.attributes = $.extend( true, {}, this.attributes );
	}
	return obj;
	*/
};

es.TableBlockModel.prototype.commit = function( transaction ) {
	// TODO
};

es.TableBlockModel.prototype.rollback = function( transaction ) {
	// TODO
};

es.TableBlockModel.prototype.prepareInsertContent = function( offset, content ) {
	// TODO
};

es.TableBlockModel.prototype.prepareRemoveContent = function( range ) {
	// TODO
};

es.TableBlockModel.prototype.prepareAnnotateContent = function( range, annotation ) {
	// TODO
};

es.TableBlockModel.prototype.insertContent = function( offset, content ) {
	// TODO
};

es.TableBlockModel.prototype.removeContent = function( range ) {
	// TODO
};

es.TableBlockModel.prototype.annotateContent = function( range, annotation ) {
	// TODO
};

// Register constructor
es.BlockModel.constructors.table = es.TableBlockModel.newFromPlainObject;

/* Inheritance */

es.extend( es.TableBlockModel, es.BlockModel );
es.extend( es.TableBlockModel, es.ModelList );
