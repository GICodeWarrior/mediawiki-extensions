/**
 * Generic synchronized Object/Element container.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param typeName {String}
 * @param listName {String}
 * @param items {Array} List of items
 * @property _typeName {String}
 * @property _listName {String}
 * @property _list {Array}
 * @property $ {jQuery}
 */
es.Container = function( typeName, listName, items ) {
	es.EventEmitter.call( this );
	if ( typeof typeName !== 'string' ) {
		typeName = 'container';
	}
	if ( typeof listName !== 'string' ) {
		listName = 'items';
	}
	this._typeName = typeName;
	this._listName = listName;
	this._list = this[listName] = [];
	this.$ = $( '<div></div>' )
		.addClass( 'editSurface-' + typeName )
		.data( typeName, this );
	// Auto-append
	if ( $.isArray( items ) ) {
		for ( var i = 0; i < items.length; i++ ) {
			this.append( items[i] );
		}
	}
}

/**
 * Gets the first item in the container.
 * 
 * @returns {Object}
 */
es.Container.prototype.first = function() {
	return this._list.length ? this._list[0] : null;
};

/**
 * Gets the last item in the container.
 * 
 * @returns {Object}
 */
es.Container.prototype.last = function() {
	return this._list.length
		? this._list[this._list.length - 1] : null;
};

/**
 * Adds an item to the end of the container.
 * 
 * @param {Object} Item to append
 */
es.Container.prototype.append = function( item ) {
	item[this._typeName] = this;
	var container = this;
	item.on( 'update', function() {
		container.emit( 'update' );
	} );
	this._list.push( item );
	this.$.append( item.$ );
	this.emit( 'update' );
};

/**
 * Adds an item to the beginning of the container.
 * 
 * @param {Object} Item to prepend
 */
es.Container.prototype.prepend = function( item ) {
	item[this._typeName] = this;
	var container = this;
	item.on( 'update', function() {
		container.emit( 'update' );
	} );
	this._list.unshift( item );
	this.$.prepend( item.$ );
	this.emit( 'update' );
};

/**
 * Adds an item to the container after an existing item.
 * 
 * @param item {Object} Item to insert
 * @param before {Object} Item to insert before, if null then item will be inserted at the end
 */
es.Container.prototype.insertBefore = function( item, before ) {
	item[this._typeName] = this;
	var container = this;
	item.on( 'update', function() {
		container.emit( 'update' );
	} );
	if ( before ) {
		this._list.splice( before.getIndex(), 0, item );
		item.$.insertBefore( before.$ );
	} else {
		this._list.push( item );
		this.$.append( item.$ );
	}
	this.emit( 'update' );
};
/**
 * Adds an item to the container after an existing item.
 * @param item {Object} Item to insert
 * @param after {Object} Item to insert after, if null then item will be inserted at the end
 */
es.Container.prototype.insertAfter = function( item, after ) {
	item[this._typeName] = this;
	var container = this;
	item.on( 'update', function() {
		container.emit( 'update' );
	} );
	if ( after ) {
		this._list.splice( after.getIndex() + 1, 0, item );
		item.$.insertAfter( after.$ );
	} else {
		this._list.push( item );
		this.$.append( item.$ );
	}
	this.emit( 'update' );
};

/**
 * Removes an item from the container.
 * 
 * @param {Object} Item to remove
 */
es.Container.prototype.remove = function( item ) {
	item.removeAllListeners( 'update' );
	this._list.splice( item.getIndex(), 1 );
	item[this._typeName] = null;
	item.$.detach();
	this.emit( 'update' );
};

es.extend( es.Container, es.EventEmitter );
