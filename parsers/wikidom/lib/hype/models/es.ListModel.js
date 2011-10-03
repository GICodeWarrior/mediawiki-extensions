/**
 * Creates an es.ListModel object.
 * 
 * @class
 * @constructor
 */
es.ListModel = function( length ) {
	// Inheritance
	es.DocumentModelNode.call( this, length );
};

/**
 * Creates a list view for this model.
 * 
 * @returns {es.ListView}
 */
es.ListModel.prototype.createView = function() {
	// return new es.ListView( this );
};

/* Registration */

es.DocumentModel.nodeModels.list = es.listModel;

/* Inheritance */

es.extend( es.ListModel, es.DocumentModelNode );
