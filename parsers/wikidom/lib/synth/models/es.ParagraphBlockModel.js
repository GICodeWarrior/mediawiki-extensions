/**
 * Creates an es.ParagraphBlockModel object.
 * 
 * @class
 * @constructor
 * @param content {es.ContentModel}
 * @property content {es.ContentModel}
 */
es.ParagraphBlockModel = function( content ) {
	es.BlockModel.call( this, ['hasContent', 'isAnnotatable'] );
	this.content = content || null;
};

/* Static Methods */

/**
 * Creates an ParagraphBlockModel object from a plain object.
 * 
 * @method
 * @static
 * @param obj {Object}
 */
es.ParagraphBlockModel.newFromPlainObject = function( obj ) {
	return new es.ParagraphBlockModel( es.ContentModel.newFromPlainObject( obj ) );
};

/* Methods */

/**
 * Gets the length of all content.
 * 
 * @method
 * @returns {Integer} Length of all content
 */
es.ParagraphBlockModel.prototype.getContentLength = function() {
	return this.content.getLength();
};

/**
 * Gets a plain paragraph block object.
 * 
 * @method
 * @returns obj {Object}
 */
es.ParagraphBlockModel.prototype.getPlainObject = function() {
	return { 'type': 'paragraph', 'content': this.content.getPlainObject() };
};

// Register constructor
es.BlockModel.constructors['paragraph'] = es.ParagraphBlockModel;

/* Inheritance */

es.extend( es.ParagraphBlockModel, es.BlockModel );
