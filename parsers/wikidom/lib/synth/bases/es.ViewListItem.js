/**
 * Generic synchronized Object/Element container item.
 * This will override this.$ (important in case of multiple inheritance).
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param $element {jQuery} jQuery object to use
 * @property $ {jQuery} Container element
 */
es.ViewListItem = function( model, $element ) {
	es.EventEmitter.call( this );
	this.model = model;
	this.$ = $element || $( '<div/>' );
};

es.ViewListItem.prototype.getModel = function() {
	return this.model;
};

/**
 * Gets the index of this item within it's list.
 * 
 * This method simply delegates to the model.
 * 
 * @method
 * @returns {Integer} Index of item in it's container
 */
es.ViewListItem.prototype.getIndex = function() {
	return this.model.getIndex();
};

/* Inheritance */

es.extend( es.ViewListItem, es.EventEmitter );