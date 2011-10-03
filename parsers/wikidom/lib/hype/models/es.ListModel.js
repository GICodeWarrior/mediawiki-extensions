/**
 * Creates an es.ListModel object.
 * 
 * @class
 * @constructor
 */
es.ListModel = function( length ) {
	// Extension
	return $.extend( new es.DocumentModelNode( length ), this );
};

/* Methods */

/**
 * Creates a list view for this model.
 * 
 * @method
 * @returns {es.ListView}
 */
es.ListModel.prototype.createView = function() {
	// return new es.ListView( this );
};

/* Registration */

es.DocumentModel.nodeModels.list = es.ListModel;
