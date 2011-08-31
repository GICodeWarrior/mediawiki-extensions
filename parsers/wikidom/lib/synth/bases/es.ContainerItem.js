/**
 * Generic Object container item.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param containerName {String} Name of container type
 * @property [containerName] {Object} Reference to container, if attached
 */
es.ContainerItem = function( containerName ) {
	es.EventEmitter.call( this );
	if ( typeof containerName !== 'string' ) {
		containerName = 'container';
	}
	this._containerName = containerName;
	this[this._containerName] = null;
};

/* Methods */

es.ContainerItem.prototype.parent = function() {
	return this[this._containerName];
};

/**
 * Attaches item to a container.
 * 
 * @method
 * @param container {es.Container} Container to attach to
 * @emits "attach" with container argument
 */
es.ContainerItem.prototype.attach = function( container ) {
	this[this._containerName] = container;
	this.emit( 'attach', container );
};

/**
 * Detaches item from a container.
 * 
 * @method
 * @emits "detach" with container argument
 */
es.ContainerItem.prototype.detach = function() {
	var container = this[this._containerName];
	this[this._containerName] = null;
	this.emit( 'detach', container );
};

/**
 * Gets the previous item in container.
 * 
 * @method
 * @returns {Object} Previous item, or null if none exists
 * @throws Missing container error if getting the previous item item failed
 */
es.ContainerItem.prototype.previous = function() {
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
es.ContainerItem.prototype.next = function() {
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
es.ContainerItem.prototype.isFirst = function() {
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
es.ContainerItem.prototype.isLast = function() {
	try {
		return this[this._containerName].indexOf( this )
			=== this[this._containerName].getLength() - 1;
	} catch ( e ) {
		throw 'Missing container error. Can not get index of item in missing container. ' + e;
	}
};

/* Inheritance */

es.extend( es.ContainerItem, es.EventEmitter );
