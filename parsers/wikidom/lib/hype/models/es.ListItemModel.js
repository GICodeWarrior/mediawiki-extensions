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

/* Registration */

es.DocumentModel.nodeModels.listItem = es.ListItemModel;

/* Inheritance */

es.extend( es.ListItemModel, es.DocumentModelNode );
