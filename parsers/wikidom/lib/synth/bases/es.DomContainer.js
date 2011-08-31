/**
 * Generic synchronized Object/Element container.
 * 
 * Items must extend es.DomContainerItem.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param listName {String} Property name for list of items
 * @param typeName {String} Name to use in CSS classes and HTML element data
 * @param tagName {String} HTML element name to use (optional, default: "div")
 * @property $ {jQuery} Container element
 */
es.DomContainer = function( listName, typeName, tagName ) {
	if ( typeof tagName !== 'string' ) {
		tagName = 'div';
	}
	this.$ = $( '<' + tagName + '/>' )
		.addClass( 'editSurface-' + typeName )
		.data( typeName, this );
	es.Container.call( this, listName );
	this.on( 'prepend', function( item ) {
		this.$.prepend( item.$ );
	} );
	this.on( 'append', function( item ) {
		this.$.append( item.$ );
	} );
	this.on( 'insertBefore', function( item, before ) {
		if ( before ) {
			item.$.insertBefore( before.$ );
		} else {
			this.$.append( item.$ );
		}
	} );
	this.on( 'insertAfter', function( item, after ) {
		if ( after ) {
			item.$.insertAfter( after.$ );
		} else {
			this.$.append( item.$ );
		}
	} );
	this.on( 'remove', function( item ) {
		item.$.detach();
	} );
};

/* Inheritance */

es.extend( es.DomContainer, es.Container );
