/**
 * Creates an es.TableBlockRowModel object.
 * 
 * @class
 * @constructor
 * @param cells {Array}
 * @param attributes {Object}
 * @property cells {Array}
 * @property attributes {Object}
 */
es.TableBlockRowModel = function( cells, attributes ) {
	es.ModelContainerItem.call( this, 'table' );
	es.ModelContainer.call( this );
	
	if ( $.isArray( cells ) ) {
		for ( var i = 0; i < cells.length; i++ ) {
			this.append( cells[i] );
		}
	}

	this.attributes = attributes || {};
};

/**
 * Creates an TableBlockRowModel object from a plain object.
 * 
 * @method
 * @static
 * @param obj {Object}
 */
es.TableBlockRowModel.newFromPlainObject = function( obj ) {
	return new es.TableBlockRowModel(
		// Cells - if given, convert plain cell objects to es.TableBlockCellModel objects
		!$.isArray( obj.cells ) ? [] : $.map( obj.cells, function( cell ) {
			return !$.isPlainObject( cell ) ? null
				: es.TableBlockCellModel.newFromPlainObject( cell )
		} ),
		// Attributes - if given, make a deep copy of attributes
		!$.isPlainObject( obj.attributes ) ? {} : $.extend( true, {}, obj.attributes )
	);
};

/* Methods */

/**
 * Creates a view for this model
 */
es.TableBlockRowModel.prototype.createView = function() {
	return new es.TableBlockRowView( this );
};

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
 * Gets a plain table row object.
 * 
 * @method
 * @returns obj {Object}
 */
es.TableBlockRowModel.prototype.getPlainObject = function() {
	/*
	var obj = {};
	if ( this.cells.length ) {
		obj.cells = $.map( this.cells, function( cell ) {
			return cell.getPlainObject();
		} );
	}
	if ( !$.isEmptyObject( this.attributes ) ) {
		obj.attributes = $.extend( true, {}, this.attributes );
	}
	return obj;
	*/
};

/**
 * Gets HTML serialization of row.
 * 
 * @method
 * @returns {String} HTML data
 */
es.TableBlockRowModel.prototype.getHtml = function() {
	
};

/**
 * Gets Wikitext serialization of row.
 * 
 * @method
 * @returns {String} Wikitext data
 */
es.TableBlockRowModel.prototype.getWikitext = function() {
	
};

/* Inheritance */

es.extend( es.TableBlockRowModel, es.ModelContainerItem );
es.extend( es.TableBlockRowModel, es.ModelContainer );