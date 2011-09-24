/**
 * Creates an es.ModelItem object.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @property {es.ModelList} list Reference to list this item is in
 */
es.ModelItem = function() {
	es.EventEmitter.call( this );
	this.list = null;
};

/* Methods */

/**
 * Creates a view for this model.
 * 
 * @method
 * @returns {es.ViewItem} New item view associated with this item model
 */
es.ModelItem.prototype.createView = function() {
	throw 'ModelItem.createView not implemented in this subclass:' + this.constructor;
};

/**
 * Gets a reference to the list this item is in.
 * 
 * @method
 * @returns {es.ModelList} Reference to this list this item is in
 */
es.ModelItem.prototype.getList = function() {
	return this.list;
};

/**
 * Gets the index of this item within the list that it's in.
 * 
 * @method
 * @returns {Integer} Index of item in it's list, -1 if not in a list
 */
es.ModelItem.prototype.getIndex = function() {
	if ( this.list ) {
		return this.list.indexOf( this );
	}
	return -1;
};

/**
 * Attaches item to a list.
 * 
 * @method
 * @param {es.Container} list Container to attach to
 * @emits attach (list)
 */
es.ModelItem.prototype.attach = function( list ) {
	this.list = list;
	this.emit( 'attach', list );
};

/**
 * Detaches item from a list.
 * 
 * @method
 * @emits detach (list)
 */
es.ModelItem.prototype.detach = function() {
	var list = this.list;
	this.list = null;
	this.emit( 'detach', list );
};

/**
 * Gets the previous item in list.
 * 
 * @method
 * @returns {es.ModelItem} Previous item, or undefined if none exists
 */
es.ModelItem.prototype.getPreviousItem = function() {
	if ( this.list ) {
		return this.list[this.list.indexOf( this ) - 1];
	}
};

/**
 * Gets the next item in list.
 * 
 * @method
 * @returns {Object} Next item, or undefined if none exists
 */
es.ModelItem.prototype.getNextItem = function() {
	if ( this.list ) {
		return this.list[this.list.indexOf( this ) + 1];
	}
};

/**
 * Checks if this item is the first in it's list.
 * 
 * @method
 * @returns {Boolean} If item is in a list and is also the first item in that list
 */
es.ModelItem.prototype.isFirstItem = function() {
	if ( this.list ) {
		return this === this.list.getFirstItem();
	}
	return false;
};

/**
 * Checks if this item is the last in it's list.
 * 
 * @method
 * @returns {Boolean} If item is in a list and is also the last item in that list
 */
es.ModelItem.prototype.isLastItem = function() {
	if ( this.list ) {
		return this === this.list.getLastItem();
	}
	return false;
};

/* Inheritance */

es.extend( es.ModelItem, es.EventEmitter );
