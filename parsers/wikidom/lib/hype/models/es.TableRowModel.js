/**
 * Creates an es.TableRowModel object.
 * 
 * @class
 * @constructor
 */
es.TableRowModel = function( length ) {
	// Inheritance
	es.DocumentModelNode.call( this, length );
};

/* Registration */

es.DocumentModel.nodeModels.tableRow = es.TableRowModel;

/* Inheritance */

es.extend( es.TableRowModel, es.DocumentModelNode );
