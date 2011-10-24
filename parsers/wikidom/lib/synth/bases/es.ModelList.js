/**
 * Creates an es.ModelList object.
 * 
 * Child objects must extend es.ModelListItem.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @property items {Array} list of items
 */
es.ModelList = function() {
	es.EventEmitter.call( this );
	this.items = new es.AggregateArray();
	var container = this;
	this.relayUpdate = function() {
		container.emit( 'update' );
	};
};

/* Methods */

/**
 * Gets an item at a specific index.
 * 
 * @method
 * @returns {Object} Child object at index
 */
es.ModelList.prototype.get = function( index ) {
	return this.items[index] || null;
};

/**
 * Gets all items.
 * 
 * @method
 * @returns {Array} List of all items.
 */
es.ModelList.prototype.all = function() {
	return this.items;
};

/**
 * Gets the number of items in container.
 * 
 * @method
 * @returns {Integer} Number of items in container
 */
es.ModelList.prototype.getLength = function() {
	return this.items.length;
};

/**
 * Gets the index of an item.
 * 
 * @method
 * @returns {Integer} Index of item, -1 if item is not in container
 */
es.ModelList.prototype.indexOf = function( item ) {
	return this.items.indexOf( item );
};

/**
 * Gets the first item in the container.
 * 
 * @method
 * @returns {Object} First item
 */
es.ModelList.prototype.first = function() {
	return this.items.length ? this.items[0] : null;
};

/**
 * Gets the last item in the container.
 * 
 * @method
 * @returns {Object} Last item
 */
es.ModelList.prototype.last = function() {
	return this.items.length ? this.items[this.items.length - 1] : null;
};

/**
 * Iterates over items, executing a callback for each.
 * 
 * Returning false in the callback will stop iteration.
 * 
 * @method
 * @param callback {Function} Function to call on each item which takes item and index arguments
 */
es.ModelList.prototype.each = function( callback ) {
	for ( var i = 0; i < this.items.length; i++ ) {
		if ( callback( this.items[i], i ) === false ) {
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
es.ModelList.prototype.append = function( item ) {
	var parent = item.parent();
	if ( parent === this ) {
		this.items.splice( this.indexOf( item ), 1 );
	} else if ( parent ) {
		parent.remove( item );
	}
	this.items.push( item );
	item.on( 'update', this.relayUpdate );
	item.attach( this );
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
es.ModelList.prototype.prepend = function( item ) {
	var parent = item.parent();
	if ( parent === this ) {
		this.items.splice( this.indexOf( item ), 1 );
	} else if ( parent ) {
		parent.remove( item );
	}
	this.items.unshift( item );
	item.on( 'update', this.relayUpdate );
	item.attach( this );
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
es.ModelList.prototype.insertBefore = function( item, before ) {
	var parent = item.parent();
	if ( parent === this ) {
		this.items.splice( this.indexOf( item ), 1 );
	} else if ( parent ) {
		parent.remove( item );
	}
	if ( before ) {
		this.items.splice( this.items.indexOf( before ), 0, item );
	} else {
		this.items.unshift( item );
	}
	item.on( 'update', this.relayUpdate );
	item.attach( this );
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
es.ModelList.prototype.insertAfter = function( item, after ) {
	var parent = item.parent();
	if ( parent === this ) {
		this.items.splice( this.indexOf( item ), 1 );
	} else if ( parent ) {
		parent.remove( item );
	}
	if ( after ) {
		this.items.splice( this.items.indexOf( after ) + 1, 0, item );
	} else {
		this.items.push( item );
	}
	item.on( 'update', this.relayUpdate );
	item.attach( this );
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
es.ModelList.prototype.remove = function( item ) {
	item.removeListener( 'update', this.relayUpdate );
	this.items.splice( this.indexOf( item ), 1 );
	item.detach();
	this.emit( 'remove', item );
	this.emit( 'update' );
};

/* Inheritance */

es.extend( es.ModelList, es.EventEmitter );
