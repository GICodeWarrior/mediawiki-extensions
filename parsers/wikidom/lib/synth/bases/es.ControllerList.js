/**
 * Creates an es.ControllerList object.
 * 
 * Controller lists follow the structural changes of a list of views, keeping a list of controllers
 * in sync at all times.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param listView {es.ViewList} List of views to mimic
 * @property items {Array} List of controllers, correlating to the connected list of views
 */
es.ControllerList = function( listView ) {
	es.EventEmitter.call( this );
	this.listView = listView;
	if ( !this.listView ) {
		return;
	}
	this.items = new es.AggregateArray();
	var list = this;
	this.relayUpdate = function() {
		list.emit( 'update' );
	};
	function recycleItemController( itemView, autoCreate ) {
		var itemController = list.lookupItemController( itemView );
		if ( itemController ) {
			list.items.splice( list.items.indexOf( itemController ), 1 );
		}
		if ( autoCreate && itemController === null ) {
			itemController = itemView.createController();
		}
		return itemController;
	}
	this.listView.on( 'prepend', function( itemView ) {
		var itemController = recycleItemController( itemView, true );
		itemController.on( 'update', list.relayUpdate );
		list.items.unshift( itemController );
		list.emit( 'prepend', itemController );
		list.emit( 'update' );
	} );
	this.listView.on( 'append', function( itemView ) {
		var itemController = recycleItemController( itemView, true );
		itemController.on( 'update', list.relayUpdate );
		list.items.push( itemController );
		list.emit( 'append', itemController );
		list.emit( 'update' );
	} );
	this.listView.on( 'insertBefore', function( itemView, beforeView ) {
		var beforeController = list.lookupItemController( beforeView ),
			itemController = recycleItemController( itemView, true );
		itemController.on( 'update', list.relayUpdate );
		if ( beforeController ) {
			list.items.splice( list.items.indexOf( beforeController ), 0, itemController );
		} else {
			list.items.unshift( itemController );
		}
		list.emit( 'insertBefore', itemController, beforeController );
		list.emit( 'update' );
	} );
	this.listView.on( 'insertAfter', function( itemView, afterView ) {
		var afterController = list.lookupItemController( afterView ),
			itemController = recycleItemController( itemView, true );
		itemController.on( 'update', list.relayUpdate );
		if ( afterController ) {
			list.items.splice( list.items.indexOf( afterController ) + 1, 0, itemController );
		} else {
			list.items.push( itemController );
		}
		list.emit( 'insertAfter', itemController, afterController );
		list.emit( 'update' );
	} );
	this.listView.on( 'remove', function( itemView ) {
		var itemController = recycleItemController( itemView );
		itemController.removeListener( 'update', list.relayUpdate );
		list.emit( 'remove', itemController );
		list.emit( 'update' );
	} );
	// Auto-add items for existing items
	var itemViews = this.listView.all();
	for ( var i = 0; i < itemViews.length; i++ ) {
		var itemController = itemViews[i].createController();
		itemController.on( 'update', list.relayUpdate );
		this.items.push( itemController );
	}
};

es.ControllerList.prototype.lookupItemController = function( itemView ) {
	for ( var i = 0; i < this.items.length; i++ ) {
		if ( this.items[i].getView() === itemView ) {
			return this.items[i];
		}
	}
	return null;
};

/* Inheritance */

es.extend( es.ControllerList, es.EventEmitter );
