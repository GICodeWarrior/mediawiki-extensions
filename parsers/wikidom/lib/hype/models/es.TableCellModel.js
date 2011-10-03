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

/**
 * Creates a table cell view for this model.
 * 
 * @returns {es.TableCellView}
 */
es.TableCellModel.prototype.createView = function() {
	// return new es.TableCellView( this );
};

/* Registration */

es.DocumentModel.nodeModels.tableCell = es.TableCellModel;

/* Inheritance */

es.extend( es.TableCellModel, es.DocumentModelNode );
