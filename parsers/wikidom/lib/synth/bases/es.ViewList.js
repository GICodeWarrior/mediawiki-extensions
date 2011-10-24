/**
 * Creates an es.ViewList object.
 * 
 * View lists follow the operations performed on a model lists and keep a list of views,
 * each correlating to a model in the model list.
 *
 * This will override this.$ (important in case of multiple inheritance).
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param model {es.ModelList} Model to follow
 * @param typeName {String} Name to use in CSS classes and HTML element data
 * @param tagName {String} HTML element name to use (optional, default: "div")
 * @property $ {jQuery} Container element
 * @property items {Array} List of views, correlating to models in the model container
 */
es.ViewList = function( model, $element ) {
	es.EventEmitter.call( this );
	this.model = model;
	if ( !this.model ) {
		return;
	}
	this.$ = $element || $( '<div/>' );
	this.items = new es.AggregateArray();
	
	var list = this;
	
	this.relayUpdate = function() {
		list.emit( 'update' );
	};
	
	this.recycleItemView = function( itemModel, autoCreate ) {
		var itemView = list.lookupItemView( itemModel );
		if ( itemView ) {
			list.items.splice( list.items.indexOf( itemView ), 1 );
			itemView.$.detach();
		}
		if ( autoCreate && itemView === null ) {
			itemView = itemModel.createView();
		}
		return itemView;
	};
	
	this.model.on( 'prepend', function( itemModel ) {
		var itemView = list.recycleItemView( itemModel, true );
		itemView.list = list;
		itemView.on( 'update', list.relayUpdate );
		list.items.unshift( itemView );
		list.$.prepend( itemView.$ );
		list.emit( 'prepend', itemView );
		list.emit( 'update' );
	} );
	this.model.on( 'append', function( itemModel ) {
		var itemView = list.recycleItemView( itemModel, true );
		itemView.list = list;
		itemView.on( 'update', list.relayUpdate );
		list.items.push( itemView );
		list.$.append( itemView.$ );
		list.emit( 'append', itemView );
		list.emit( 'update' );
	} );
	this.model.on( 'insertBefore', function( itemModel, beforeModel ) {
		var beforeView = list.lookupItemView( beforeModel ),
			itemView = list.recycleItemView( itemModel, true );
		itemView.list = list;
		itemView.on( 'update', list.relayUpdate );
		if ( beforeView ) {
			list.items.splice( list.items.indexOf( beforeView ), 0, itemView );
			itemView.$.insertBefore( beforeView.$ );
		} else {
			list.items.unshift( itemView );
			list.$.prepend( itemView.$ );
		}
		list.emit( 'insertBefore', itemView, beforeView );
		list.emit( 'update' );
	} );
	this.model.on( 'insertAfter', function( itemModel, afterModel ) {
		var afterView = list.lookupItemView( afterModel ),
			itemView = list.recycleItemView( itemModel, true );
		itemView.list = list;
		itemView.on( 'update', list.relayUpdate );
		if ( afterView ) {
			list.items.splice( list.items.indexOf( afterView ) + 1, 0, itemView );
			itemView.$.insertAfter( afterView.$ );
		} else {
			list.items.push( itemView );
			list.$.append( itemView.$ );
		}
		list.emit( 'insertAfter', itemView, afterView );
		list.emit( 'update' );
	} );
	this.model.on( 'remove', function( itemModel ) {
		var itemView = list.recycleItemView( itemModel );
		itemView.list = null;
		itemView.removeListener( 'update', list.relayUpdate );
		list.emit( 'remove', itemView );
		list.emit( 'update' );
	} );
	
	// Auto-add items for existing items
	var itemModels = this.model.all();
	for ( var i = 0; i < itemModels.length; i++ ) {
		var itemView = itemModels[i].createView();
		itemView.list = list;
		itemView.on( 'update', this.relayUpdate );
		this.items.push( itemView );
		this.$.append( itemView.$ );
	}
};

es.ViewList.prototype.lookupItemView = function( itemModel ) {
	for ( var i = 0; i < this.items.length; i++ ) {
		if ( this.items[i].getModel() === itemModel ) {
			return this.items[i];
		}
	}
	return null;
};

/* Inheritance */
es.extend( es.ViewList, es.EventEmitter );