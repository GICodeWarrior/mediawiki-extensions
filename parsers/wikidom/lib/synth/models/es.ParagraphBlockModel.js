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
	this.content = content || new es.ContentModel();
	var model = this;
	this.content.on( 'change', function() {
		model.emit( 'update' );
	} );
};

/* Static Members */

/**
 * Registry of serializers, mapping symbolic format type names to serialization functions.
 * 
 * Functions added to this object should accept block and options arguments.
 * 
 * @member
 * @static
 * @type {Object}
 */
es.ParagraphBlockModel.serializers = {};

/* Static Methods */

/**
 * Creates an ParagraphBlockModel object from a plain object.
 * 
 * @method
 * @static
 * @param obj {Object}
 */
es.ParagraphBlockModel.newFromPlainObject = function( obj ) {
	return new es.ParagraphBlockModel( es.ContentModel.newFromPlainObject( obj.content ) );
};

/* Methods */

/**
 * Creates a view for this model
 */
es.ParagraphBlockModel.prototype.createView = function() {
	return new es.ParagraphBlockView( this );
};

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

es.ParagraphBlockModel.prototype.commit = function( transaction ) {
	// TODO
};

es.ParagraphBlockModel.prototype.rollback = function( transaction ) {
	// TODO
};

es.ParagraphBlockModel.prototype.prepareInsertContent = function( offset, content ) {
	// TODO
};

es.ParagraphBlockModel.prototype.prepareRemoveContent = function( range ) {
	// TODO
};

es.ParagraphBlockModel.prototype.prepareAnnotateContent = function( range, annotation ) {
	// TODO
};

es.ParagraphBlockModel.prototype.insertContent = function( offset, content ) {
	// TODO
};

es.ParagraphBlockModel.prototype.removeContent = function( range ) {
	// TODO
};

es.ParagraphBlockModel.prototype.annotateContent = function( range, annotation ) {
	// TODO
};

// Register constructor
es.BlockModel.constructors.paragraph = es.ParagraphBlockModel.newFromPlainObject;

/* Inheritance */

es.extend( es.ParagraphBlockModel, es.BlockModel );
