/**
 * Creates an es.ModelListItem object.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @property container {Object} Reference to container, if attached
 */
es.ModelListItem = function() {
	es.EventEmitter.call( this );
	this.container = null;
};

/* Methods */

es.ModelListItem.prototype.parent = function() {
	return this.container;
};

/**
 * Creates a view for this model
 */
es.ModelListItem.prototype.createView = function() {
	throw 'ModelListItem.createView not implemented in this subclass.';
};

/**
 * Attaches item to a container.
 * 
 * @method
 * @param container {es.Container} Container to attach to
 * @emits "attach" with container argument
 */
es.ModelListItem.prototype.attach = function( container ) {
	this.container = container;
	this.emit( 'attach', container );
};

/**
 * Detaches item from a container.
 * 
 * @method
 * @emits "detach" with container argument
 */
es.ModelListItem.prototype.detach = function() {
	var container = this.container;
	this.container = null;
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
es.ModelListItem.prototype.getIndex = function() {
	try {
		var index = this.container.indexOf( this );
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
es.ModelListItem.prototype.previous = function() {
	try {
		return this.container.get( this.container.indexOf( this ) - 1 );
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
es.ModelListItem.prototype.next = function() {
	try {
		return this.container.get( this.container.indexOf( this ) + 1 );
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
es.ModelListItem.prototype.isFirst = function() {
	try {
		return this.container.indexOf( this ) === 0;
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
es.ModelListItem.prototype.isLast = function() {
	try {
		return this.container.indexOf( this ) === this.container.getLength() - 1;
	} catch ( e ) {
		throw 'Missing container error. Can not get index of item in missing container. ' + e;
	}
};

/* Inheritance */

es.extend( es.ModelListItem, es.EventEmitter );
