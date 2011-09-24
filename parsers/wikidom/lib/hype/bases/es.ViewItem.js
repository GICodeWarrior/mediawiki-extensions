/**
 * Generic synchronized Object/Element container item.
 * This will override this.$ (important in case of multiple inheritance).
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param {jQuery} $element jQuery object to use
 * @property {jQuery} $ Container element
 */
es.ViewItem = function( model, $element ) {
	es.EventEmitter.call( this );
	this.model = model;
	this.$ = $element || $( '<div/>' );
	this.list = null;
};

/**
 * Gets a reference to the model this item observes.
 * 
 * @method
 * @returns {es.ModelList} Reference to the model this item observes
 */
es.ViewItem.prototype.getModel = function() {
	return this.model;
};

/**
 * Gets a reference to the list this item is in.
 * 
 * @method
 * @returns {es.ModelList} Reference to this list this item is in
 */
es.ViewItem.prototype.getList = function() {
	return this.list;
};

/**
 * Gets the index of this item within it's list.
 * 
 * This method simply delegates to the model.
 * 
 * @method
 * @returns {Integer} Index of item in it's container
 */
es.ViewItem.prototype.getIndex = function() {
	return this.model.getIndex();
};

/**
 * Attaches item to a list.
 * 
 * @method
 * @param {es.Container} list Container to attach to
 * @emits attach (list)
 */
es.ViewItem.prototype.attach = function( list ) {
	this.list = list;
	this.emit( 'attach', list );
};

/**
 * Detaches item from a list.
 * 
 * @method
 * @emits detach (list)
 */
es.ViewItem.prototype.detach = function() {
	var list = this.list;
	this.list = null;
	this.emit( 'detach', list );
};

/* Inheritance */

es.extend( es.ViewItem, es.EventEmitter );