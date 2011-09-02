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
es.ViewContainerItem = function( model, typeName, tagName ) {
	es.EventEmitter.call( this );
	this.model = model;
	if ( typeof tagName !== 'string' ) {
		tagName = 'div';
	}
	this.$ = $( '<' + tagName + '/>' )
		.addClass( 'editSurface-' + typeName )
		.data( typeName, this );
};

es.ViewContainerItem.prototype.getModel = function() {
	return this.model;
};

/* Inheritance */

es.extend( es.ViewContainerItem, es.EventEmitter );
