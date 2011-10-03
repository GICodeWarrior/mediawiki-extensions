/**
 * Creates an es.ListItemModel object.
 * 
 * @class
 * @constructor
 */
es.ListItemModel = function( length ) {
	// Extension
	return $.extend( new es.DocumentModelNode( length ), this );
};

/* Methods */

/**
 * Creates a list item view for this model.
 * 
 * @method
 * @returns {es.ListItemView}
 */
es.ListItemModel.prototype.createView = function() {
	// return new es.ListItemView( this );
};

/* Registration */

es.DocumentModel.nodeModels.listItem = es.ListItemModel;
