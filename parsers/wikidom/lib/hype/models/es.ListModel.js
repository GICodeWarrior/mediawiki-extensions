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

/* Registration */

es.DocumentModel.nodeModels.list = es.listModel;

/* Inheritance */

es.extend( es.ListModel, es.DocumentModelNode );
