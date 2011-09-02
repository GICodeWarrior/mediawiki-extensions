/**
 * Creates an es.ViewContainer object.
 * 
 * View containers follow the operations performed on a model container and keep a list of views,
 * each correlating to a model in the model container.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param containerModel {es.ModelContainer} Property name for list of items
 * @param typeName {String} Name to use in CSS classes and HTML element data
 * @param tagName {String} HTML element name to use (optional, default: "div")
 * @property $ {jQuery} Container element
 * @property views {Array} List of views, correlating to models in the model container
 */
es.ViewContainer = function( containerModel, typeName, tagName ) {
	es.EventEmitter.call( this );
	this.containerModel = containerModel;
	this.views = [];
	if ( typeof tagName !== 'string' ) {
		tagName = 'div';
	}
	this.$ = $( '<' + tagName + '/>' )
		.addClass( 'editSurface-' + typeName )
		.data( typeName, this );
	var container = this;
	this.containerModel.on( 'prepend', function( itemModel ) {
		var itemView = container.createItem( itemModel );
		container.views.unshift( itemView );
		container.$.prepend( itemView.$ );
		container.emit( 'prepend', itemView );
		container.emit( 'update' );
	} );
	this.containerModel.on( 'append', function( itemModel ) {
		var itemView = container.createItem( itemModel );
		container.views.push( itemView );
		container.$.append( itemView.$ );
		container.emit( 'append', itemView );
		container.emit( 'update' );
	} );
	this.containerModel.on( 'insertBefore', function( item, before ) {
		var itemView = container.createItemView( item ),
			beforeView = container.lookupItemView( before );
		if ( beforeView ) {
			container.views.splice( container.views.indexOf( beforeView ), 0, itemView );
			itemView.$.insertBefore( beforeView.$ );
		} else {
			container.views.unshift( itemView );
			container.$.prepend( itemView.$ );
		}
		container.emit( 'insertBefore', itemView, beforeView );
		container.emit( 'update' );
	} );
	this.containerModel.on( 'insertAfter', function( itemModel, afterModel ) {
		var itemView = container.createItemView( item ),
			afterView = container.lookupItemView( afterModel );
		if ( afterView ) {
			container.views.splice( container.views.indexOf( afterView ) + 1, 0, itemView );
			itemView.$.insertAfter( afterView.$ );
		} else {
			container.views.push( itemView );
			container.$.append( itemView.$ );
		}
		container.emit( 'insertAfter', itemView, afterView );
		container.emit( 'update' );
	} );
	this.containerModel.on( 'remove', function( itemModel ) {
		var itemView = container.lookupItemView( itemModel );
		container.views.splice( container.views.indexOf( itemView ), 1 );
		itemView.$.detach();
		container.emit( 'remove', itemView );
		container.emit( 'update' );
	} );
};

es.ViewContainer.prototype.lookupItemView = function( itemModel ) {
	for ( var i = 0; i < container.views.length; i++ ) {
		if ( this.views[i].getModel() === itemModel ) {
			return container.views[i];
		}
	}
	return null;
};

es.ViewContainer.prototype.createItemView = function( itemModel ) {
	throw 'es.ViewContainer.createItem not implemented in this subclass';
};

/* Inheritance */

es.extend( es.ViewContainer, es.EventEmitter );
