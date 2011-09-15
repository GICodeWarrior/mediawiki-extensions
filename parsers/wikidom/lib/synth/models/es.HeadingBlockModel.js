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
 * Creates a view for this model
 */
es.HeadingBlockModel.prototype.createView = function() {
	return new es.HeadingBlockView( this );
};

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

/**
 * Gets HTML serialization of block.
 * 
 * @method
 * @returns {String} HTML data
 */
es.HeadingBlockModel.prototype.getHtml = function() {
	return es.AnnotationSerializer.buildXmlTag( 'h' + this.level, {}, this.content.getHtml() );
};

/**
 * Gets Wikitext serialization of block.
 * 
 * @method
 * @returns {String} Wikitext data
 */
es.HeadingBlockModel.prototype.getWikitext = function() {
	var symbols = es.AnnotationSerializer.repeatString( '=', this.level );
	return symbols + this.content.getHtml() + symbols;
};

// Register constructor
es.BlockModel.constructors['heading'] = es.HeadingBlockModel;

/* Inheritance */

es.extend( es.HeadingBlockModel, es.BlockModel );
