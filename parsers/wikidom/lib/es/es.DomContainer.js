/**
 * Generic synchronized Object/Element container.
 * 
 * Child objects must extend es.EventEmitter.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param typeName {String} Property name to set references to this object to in child objects
 * @param listName {String} Property name for list of child objects
 * @param items {Array} List of initial items
 * @emits "update" when items argument causes items to be appended
 * @emits "append" when items argument causes items to be appended
 * @property $ {jQuery} Container element
 */
es.DomContainer = function( typeName, listName, items, tagName ) {
	if ( typeof tagName !== 'string' ) {
		tagName = 'div';
	}
	this.$ = $( '<' + tagName + '/>' )
		.addClass( 'editSurface-' + typeName )
		.data( typeName, this );
	es.Container.call( this, typeName, listName );
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
	// Auto-append - must do our own, not use the one es.Content() give us, so that the events will
	// be called when items are appended
	if ( $.isArray( items ) ) {
		for ( var i = 0; i < items.length; i++ ) {
			this.append( items[i] );
		}
	}
};

/* Inheritance */

es.extend( es.DomContainer, es.Container );
