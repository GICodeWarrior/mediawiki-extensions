/**
 * Creates an es.ModelContainerItem object.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param containerName {String} Name of container type
 * @property [containerName] {Object} Reference to container, if attached
 */
es.ModelContainerItem = function( containerName ) {
	es.EventEmitter.call( this );
	if ( typeof containerName !== 'string' ) {
		containerName = 'container';
	}
	this._containerName = containerName;
	this[this._containerName] = null;
};

/* Methods */

es.ModelContainerItem.prototype.parent = function() {
	return this[this._containerName];
};

/**
 * Creates a view for this model
 */
es.ModelContainerItem.prototype.createView = function() {
	throw 'ModelContainerItem.createView not implemented in this subclass.';
};

/**
 * Attaches item to a container.
 * 
 * @method
 * @param container {es.Container} Container to attach to
 * @emits "attach" with container argument
 */
es.ModelContainerItem.prototype.attach = function( container ) {
	this[this._containerName] = container;
	this.emit( 'attach', container );
};

/**
 * Detaches item from a container.
 * 
 * @method
 * @emits "detach" with container argument
 */
es.ModelContainerItem.prototype.detach = function() {
	var container = this[this._containerName];
	this[this._containerName] = null;
	this.emit( 'detach', container );
};

/**
 * Gets the index of this item within it's container.
 * 
 * @method
 * @returns {Integer} Index of item in it's container
 * @throws Unknown item error if this item is not in it's container
 * @throws Missing container error if this container can't be accessed.
 */
es.ModelContainerItem.prototype.getIndex = function() {
	try {
		var index = this[this._containerName].indexOf( this );
		if ( index === -1 ) {
			throw 'Unknown item error. Can not get index of item that is not in a container. ' + e;
		}
		return index;
	} catch ( e ) {
		throw 'Missing container error. Can not get index of item in missing container. ' + e;
	}
};

/**
 * Gets the previous item in container.
 * 
 * @method
 * @returns {Object} Previous item, or null if none exists
 * @throws Missing container error if getting the previous item item failed
 */
es.ModelContainerItem.prototype.previous = function() {
	try {
		return this[this._containerName].get( this[this._containerName].indexOf( this ) - 1 );
	} catch ( e ) {
		throw 'Missing container error. Can not get previous item in missing container. ' + e;
	}
};

/**
 * Gets the next item in container.
 * 
 * @method
 * @returns {Object} Next item, or null if none exists
 * @throws Missing container error if getting the next item item failed
 */
es.ModelContainerItem.prototype.next = function() {
	try {
		return this[this._containerName].get( this[this._containerName].indexOf( this ) + 1 );
	} catch ( e ) {
		throw 'Missing container error. Can not get next item in missing container. ' + e;
	}
};

/**
 * Checks if this item is the first in it's container.
 * 
 * @method
 * @returns {Boolean} If item is the first in it's container
 * @throws Missing container error if getting the index of this item failed
 */
es.ModelContainerItem.prototype.isFirst = function() {
	try {
		return this[this._containerName].indexOf( this ) === 0;
	} catch ( e ) {
		throw 'Missing container error. Can not get index of item in missing container. ' + e;
	}
};

/**
 * Checks if this item is the last in it's container.
 * 
 * @method
 * @returns {Boolean} If item is the last in it's container
 * @throws Missing container error if getting the index of this item failed
 */
es.ModelContainerItem.prototype.isLast = function() {
	try {
		return this[this._containerName].indexOf( this )
			=== this[this._containerName].getLength() - 1;
	} catch ( e ) {
		throw 'Missing container error. Can not get index of item in missing container. ' + e;
	}
};

/* Inheritance */

es.extend( es.ModelContainerItem, es.EventEmitter );
