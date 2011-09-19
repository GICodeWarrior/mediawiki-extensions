/**
 * Generic synchronized Object/Element container item.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param typeName {String} Name to use in CSS classes and HTML element data
 * @param tagName {String} HTML element name to use (optional, default: "div")
 * @property $ {jQuery} Container element
 */
es.ViewListItem = function( model, typeName, tagName ) {
	es.EventEmitter.call( this );
	this.model = model;
	if ( typeof typeName !== 'string' ) {
		typeName = 'viewListItem';
	}
	if ( typeof tagName !== 'string' ) {
		tagName = 'div';
	}
	
	if ( !this.$ ) {
		this.$ = $( '<' + tagName + '/>' );
	}
	this.$.addClass( 'editSurface-' + typeName ).data( typeName, this );
};

es.ViewListItem.prototype.getModel = function() {
	return this.model;
};

/**
 * Gets the index of this item within it's container.
 * 
 * This method simply delegates to the model.
 * 
 * @method
 * @returns {Integer} Index of item in it's container
 */
es.ViewListItem.prototype.getIndex = function() {
	return this.model.getIndex();
};

/* Inheritance */

es.extend( es.ViewListItem, es.EventEmitter );
