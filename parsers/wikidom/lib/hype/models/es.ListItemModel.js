/**
 * Creates an es.ListItemModel object.
 * 
 * @class
 * @constructor
 */
es.ListItemModel = function( length ) {
	// Inheritance
	es.DocumentModelNode.call( this, length );
};

/**
 * Creates a list item view for this model.
 * 
 * @returns {es.ListItemView}
 */
es.ListItemModel.prototype.createView = function() {
	// return new es.ListItemView( this );
};

/* Registration */

es.DocumentModel.nodeModels.listItem = es.ListItemModel;

/* Inheritance */

es.extend( es.ListItemModel, es.DocumentModelNode );
