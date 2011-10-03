/**
 * Creates an es.TableCellModel object.
 * 
 * @class
 * @constructor
 */
es.TableCellModel = function( length ) {
	// Inheritance
	es.DocumentModelNode.call( this, length );
};

/* Registration */

es.DocumentModel.nodeModels.tableCell = es.TableCellModel;

/* Inheritance */

es.extend( es.TableCellModel, es.DocumentModelNode );
