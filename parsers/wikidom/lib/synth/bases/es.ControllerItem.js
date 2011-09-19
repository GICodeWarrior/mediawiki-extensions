/**
 * Creates an es.ControllerItem object.
 * 
 * Controller item objects are controllers for individual models in a model list.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @property itemView {es.ModelItem} Model this controller is connected to
 */
es.ViewContainerItem = function( itemView ) {
	es.EventEmitter.call( this );
	this.itemView = itemView;
};

/**
 * Gets the model this controller is connected to.
 * 
 * @method
 * @returns {es.ModelItem} Model this controller is connected to
 */
es.ControllerItem.prototype.getModel = function() {
	return this.itemView.getModel();
};

/**
 * Gets the view this controller is connected to.
 * 
 * @method
 * @returns {es.ViewItem} View this controller is connected to
 */
es.ControllerItem.prototype.getView = function() {
	return this.itemView;
};

/**
 * Gets the index of this item within it's container.
 * 
 * This method simply delegates to the model.
 * 
 * @method
 * @returns {Integer} Index of item in it's container
 */
es.ControllerItem.prototype.getIndex = function() {
	return this.itemView.getModel().getIndex();
};

/* Inheritance */

es.extend( es.ControllerItem, es.EventEmitter );
