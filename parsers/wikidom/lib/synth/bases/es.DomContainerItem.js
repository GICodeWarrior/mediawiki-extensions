/**
 * Generic synchronized Object/Element container item.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param containerName {String} Name of container type
 * @param typeName {String} Name to use in CSS classes and HTML element data
 * @param tagName {String} HTML element name to use (optional, default: "div")
 * @property $ {jQuery} Container element
 */
es.DomContainerItem = function( containerName, typeName, tagName ) {
	if ( typeof tagName !== 'string' ) {
		tagName = 'div';
	}
	this.$ = $( '<' + tagName + '/>' )
		.addClass( 'editSurface-' + typeName )
		.data( typeName, this );
	
	es.ContainerItem.call( this, containerName );
};

/* Inheritance */

es.extend( es.DomContainerItem, es.ContainerItem );
