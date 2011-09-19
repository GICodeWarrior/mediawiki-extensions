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
	es.ModelListItem.call( this );
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

es.ListBlockItemModel.prototype.getLevel = function() {
	return this.styles.length - 1;
};

es.ListBlockItemModel.prototype.getStyle = function() {
	if ( typeof level === 'undefined') {
		return this.styles[this.styles.length - 1];
	} else {
		return this.styles[level];
	}
};

/**
 * Gets the length of all content.
 * 
 * @method
 * @returns {Integer} Length of all content
 */
es.ListBlockItemModel.prototype.getLength = function() {
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

es.extend( es.ListBlockItemModel, es.ModelListItem );