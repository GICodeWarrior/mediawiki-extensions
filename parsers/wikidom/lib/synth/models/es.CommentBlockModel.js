/**
 * Creates an es.CommentBlockModel object.
 * 
 * @class
 * @constructor
 * @param text {String}
 * @property text {String}
 */
es.CommentBlockModel = function( text ) {
	es.BlockModel.call( this, ['hasContent'] );
	this.text = text || '';
};

/* Static Methods */

/**
 * Creates an CommentBlockModel object from a plain object.
 * 
 * @method
 * @static
 * @param obj {Object}
 */
es.CommentBlockModel.newFromPlainObject = function( obj ) {
	return new es.CommentBlockModel( obj.text );
};

/* Methods */

/**
 * Creates a view for this model
 */
es.CommentBlockModel.prototype.createView = function() {
	return new es.CommentBlockView( this );
};

/**
 * Gets the length of all content.
 * 
 * @method
 * @returns {Integer} Length of all content
 */
es.CommentBlockModel.prototype.getContentLength = function() {
	return this.text.length;
};

/**
 * Gets text content.
 * 
 * @method
 * @returns {String} Plain text content
 */
es.CommentBlockModel.prototype.getText = function() {
	return this.text;
};

/**
 * Gets a plain comment block object.
 * 
 * @method
 * @returns obj {Object}
 */
es.CommentBlockModel.prototype.getPlainObject = function() {
	return { 'type': 'comment', 'text': this.text };
};

// Register constructor
es.BlockModel.constructors.comment = es.CommentBlockModel;

/* Inheritance */

es.extend( es.CommentBlockModel, es.BlockModel );
