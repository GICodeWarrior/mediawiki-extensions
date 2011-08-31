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
	this.content = content || null;
	this.styles = styles || ['bullet'];
};

/* Methods */

/**
 * Gets the length of all content.
 * 
 * @method
 * @returns {Integer} Length of all content
 */
es.ListBlockItemModel.prototype.getContentLength = function() {
	return content.getLength();
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

/**
 * Gets a sum of cell content lengths.
 * 
 * @method
 * @returns {Integer}
 */
es.TableBlockRowModel.prototype.getLength = function() {
	return this.cells.getLength();
};
