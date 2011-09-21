/**
 * Creates an es.DocumentModel object.
 * 
 * @class
 * @constructor
 * @param items {Array}
 * @param attributes {Object}
 * @property items {Array}
 * @property attributes {Object}
 */
es.DocumentModel = function( blocks, attributes ) {
	es.ModelList.call( this );
	this.items = new es.AggregateArray( blocks || [] );
	this.attributes = attributes || {};
};

/* Static Methods */

/**
 * Creates an es.DocumentModel object from a plain object.
 * 
 * @method
 * @static
 * @param obj {Object}
 */
es.DocumentModel.newFromPlainObject = function( obj ) {
	var types = es.BlockModel.constructors;
	return new es.DocumentModel(
		// Blocks - if given, convert all plain "block" objects to es.WikiDom* objects
		!$.isArray( obj.blocks ) ? [] : $.map( obj.blocks, function( block ) {
			return es.BlockModel.newFromPlainObject( block );
		} ),
		// Attributes - if given, make a deep copy of attributes
		!$.isPlainObject( obj.attributes ) ? {} : $.extend( true, {}, obj.attributes )
	);
};

/* Methods */

es.DocumentModel.prototype.commit = function( transaction ) {
	// commit transaction
};

es.DocumentModel.prototype.rollback = function( transaction ) {
	// rollback transaction
};

es.DocumentModel.prototype.prepareInsertContent = function( offset, content ) {
	// generate transaction
};

es.DocumentModel.prototype.prepareRemoveContent = function( range ) {
	// generate transaction
};

es.DocumentModel.prototype.prepareAnnotateContent = function( range, annotation ) {
	// generate transaction
};

es.DocumentModel.prototype.getPlainObject = function() {
	var obj = {};
	if ( this.items.length ) {
		obj.blocks = [];
		for ( var i = 0; i < this.items.length; i++ ) {
			obj.blocks.push( this.items[i].getPlainObject() );
		}
	}
	if ( !$.isEmptyObject( this.attributes ) ) {
		obj.attributes = $.extend( true, {}, this.attributes );
	}
};

/**
 * Gets the size of the of the contents of all blocks.
 * 
 * @method
 * @returns {Integer}
 */
es.DocumentModel.prototype.getContentLength = function() {
	return this.items.getContentLength();
};

es.extend( es.DocumentModel, es.ModelList );
