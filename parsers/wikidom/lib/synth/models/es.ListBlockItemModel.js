/**
 * Creates an es.ListBlockItemModel object.
 * 
 * @class
 * @constructor
 * @param content {es.ContentModel}
 * @param styles {Array}
 * @property content {es.ContentModel}
 * @property styles {Array}
 */
es.ListBlockItemModel = function( content, styles ) {
	es.ModelContainerItem.call( this, 'list' );
	this.content = content || null;
	this.styles = styles || ['bullet'];
};

/* Methods */

/**
 * Creates a view for this model
 */
es.ListBlockItemModel.prototype.createView = function() {
	return new es.ListBlockItemView( this );
};

/**
 * Gets the length of all content.
 * 
 * @method
 * @returns {Integer} Length of all content
 */
es.ListBlockItemModel.prototype.getContentLength = function() {
	return this.content.getLength();
};

/**
 * Gets a plain list block item object.
 * 
 * @method
 * @returns obj {Object}
 */
es.ListBlockItemModel.prototype.getPlainObject = function() {
	return { 'content': this.content.getPlainObject(), 'styles': this.styles.slice( 0 ) };
};

/* Inheritance */

es.extend( es.ListBlockItemModel, es.ModelContainerItem );