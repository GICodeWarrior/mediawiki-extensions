/**
 * Generic Object container.
 * 
 * Child objects must extend es.EventEmitter.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param typeName {String} Property name to set references to this object to in child objects
 * @param listName {String} Property name for list of child objects
 * @param items {Array} List of initial items
 * @emits "append" when items argument causes items to be appended
 * @emits "update" when items argument causes items to be appended
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
	// Auto-append
	if ( $.isArray( items ) ) {
		for ( var i = 0; i < items.length; i++ ) {
			this.append( items[i] );
		}
	}
};

/* Methods */

/**
 * Gets the first item in the container.
 * 
 * @method
 * @returns {Object} First child object
 */
es.Container.prototype.first = function() {
	return this._list.length ? this._list[0] : null;
};

/**
 * Gets the last item in the container.
 * 
 * @method
 * @returns {Object} Last child object
 */
es.Container.prototype.last = function() {
	return this._list.length
		? this._list[this._list.length - 1] : null;
};

/**
 * Iterates over items, executing a callback for each.
 * 
 * Returning false in the callback will stop iteration.
 * 
 * @method
 * @param callback {Function} Function to call on each item which takes item and index arguments
 */
es.Container.prototype.each = function( callback ) {
	for ( var i = 0; i < this._list.length; i++ ) {
		if ( !callback( this._list[i], i ) ) {
			break;
		}
	}
};

/**
 * Adds an item to the end of the container.
 * 
 * Also inserts item's Element object to the DOM and adds a listener to its "update" events.
 * 
 * @method
 * @param item {Object} Item to append
 * @emits "update"
 */
es.Container.prototype.append = function( item ) {
	item[this._typeName] = this;
	var container = this;
	item.on( 'update', function() {
		container.emit( 'update' );
	} );
	this._list.push( item );
	this.emit( 'append', item );
	this.emit( 'update' );
};

/**
 * Adds an item to the beginning of the container.
 * 
 * Also inserts item's Element object to the DOM and adds a listener to its "update" events.
 * 
 * @method
 * @param item {Object} Item to prepend
 * @emits "update"
 */
es.Container.prototype.prepend = function( item ) {
	item[this._typeName] = this;
	var container = this;
	item.on( 'update', function() {
		container.emit( 'update' );
	} );
	this._list.unshift( item );
	this.emit( 'prepend', item );
	this.emit( 'update' );
};

/**
 * Adds an item to the container after an existing item.
 * 
 * Also inserts item's Element object to the DOM and adds a listener to its "update" events.
 * 
 * @method
 * @param item {Object} Item to insert
 * @param before {Object} Item to insert before, if null then item will be inserted at the end
 * @emits "update"
 */
es.Container.prototype.insertBefore = function( item, before ) {
	item[this._typeName] = this;
	var container = this;
	item.on( 'update', function() {
		container.emit( 'update' );
	} );
	if ( before ) {
		this._list.splice( before.getIndex(), 0, item );
	} else {
		this._list.push( item );
	}
	this.emit( 'insertBefore', item, before );
	this.emit( 'update' );
};
/**
 * Adds an item to the container after an existing item.
 * 
 * Also inserts item's Element object to the DOM and adds a listener to its "update" events.
 * 
 * @method
 * @param item {Object} Item to insert
 * @param after {Object} Item to insert after, if null item will be inserted at the end
 * @emits "update"
 */
es.Container.prototype.insertAfter = function( item, after ) {
	item[this._typeName] = this;
	var container = this;
	item.on( 'update', function() {
		container.emit( 'update' );
	} );
	if ( after ) {
		this._list.splice( after.getIndex() + 1, 0, item );
	} else {
		this._list.push( item );
	}
	this.emit( 'insertAfter', item, after );
	this.emit( 'update' );
};

/**
 * Removes an item from the container.
 * 
 * Also detaches item's Element object to the DOM and removes all listeners its "update" events.
 * 
 * @method
 * @param item {Object} Item to remove
 * @emits "update"
 */
es.Container.prototype.remove = function( item ) {
	item.removeAllListeners( 'update' );
	this._list.splice( item.getIndex(), 1 );
	item[this._typeName] = null;
	this.emit( 'remove', item );
	this.emit( 'update' );
};

/* Inheritance */

es.extend( es.Container, es.EventEmitter );
