/**
 * Creates an es.DocumentModel object.
 * 
 * @class
 * @constructor
 * @param blocks {Array}
 * @param attributes {Object}
 * @property blocks {Array}
 * @property attributes {Object}
 */
es.DocumentModel = function( blocks, attributes ) {
	es.ModelContainer.call( this, 'blocks' );
	this.blocks = new es.AggregateArray( blocks || [] );
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

es.DocumentModel.prototype.getPlainObject = function() {
	var obj = {};
	if ( this.blocks.length ) {
		obj.blocks = [];
		for ( var i = 0; i < this.blocks.length; i++ ) {
			obj.blocks.push( this.blocks[i].getPlainObject() );
		}
	}
	if ( !$.isEmptyObject( this.attributes ) ) {
		obj.attributes = $.extend( true, {}, this.attributes );
	}
};

/**
 * Gets HTML serialization of document.
 * 
 * @method
 * @returns {String} HTML data
 */
es.DocumentModel.prototype.getHtml = function() {
	return $.map( this.blocks, function( i, block ) {
		return block.getHtml( { 'index': i } );
	} ).join( '\n' );
};

/**
 * Gets Wikitext serialization of document.
 * 
 * @method
 * @returns {String} Wikitext data
 */
es.DocumentModel.prototype.getWikitext = function() {
	return $.map( this.blocks, function( i, block ) {
		return block.getWikitext( { 'index': i } );
	} ).join( '\n' );
};

/**
 * Gets the size of the of the contents of all blocks.
 * 
 * @method
 * @returns {Integer}
 */
es.DocumentModel.prototype.getContentLength = function() {
	return this.blocks.getContentLength();
};

es.extend( es.DocumentModel, es.ModelContainer );
