/**
 * Creates an es.TableModel object.
 * 
 * @class
 * @constructor
 */
es.TableModel = function( length ) {
	// Inheritance
	es.DocumentModelNode.call( this, length );
};

/* Registration */

es.DocumentModel.nodeModels.table = es.TableModel;

/* Inheritance */

es.extend( es.TableModel, es.DocumentModelNode );
