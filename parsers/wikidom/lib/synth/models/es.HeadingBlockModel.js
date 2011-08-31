/**
 * Creates an es.HeadingBlockModel object.
 * 
 * @class
 * @constructor
 * @param content {es.ContentModel}
 * @param level {Integer}
 * @property content {es.ContentModel}
 * @property level {Integer}
 */
es.HeadingBlockModel = function( content, level ) {
	es.BlockModel.call( this, ['hasContent', 'isAnnotatable'] );
	this.content = content || null;
	this.level = level || 0;
};

/* Static Methods */

/**
 * Creates an HeadingBlockModel object from a plain object.
 * 
 * @method
 * @static
 * @param obj {Object}
 */
es.HeadingBlockModel.newFromPlainObject = function( obj ) {
	return new es.HeadingBlockModel( obj.content, obj.level );
};

/* Methods */

/**
 * Gets the length of all content.
 * 
 * @method
 * @returns {Integer} Length of all content
 */
es.HeadingBlockModel.prototype.getContentLength = function() {
	return this.content.getLength();
};

/**
 * Gets a plain heading block object.
 * 
 * @method
 * @returns obj {Object}
 */
es.HeadingBlockModel.prototype.getPlainObject = function() {
	return { 'type': 'heading', 'content': this.content.getPlainObject(), 'level': this.level };
};

// Register constructor
es.BlockModel.constructors['heading'] = es.HeadingBlockModel;

/* Inheritance */

es.extend( es.HeadingBlockModel, es.BlockModel );
