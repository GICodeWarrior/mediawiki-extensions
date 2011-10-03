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

/* Methods */

/**
 * Creates a table row view for this model.
 * 
 * @returns {es.TableRowView}
 */
es.TableRowModel.prototype.createView = function() {
	// return new es.TableRowView( this );
};

/* Registration */

es.DocumentModel.nodeModels.tableRow = es.TableRowModel;

/* Inheritance */

es.extend( es.TableRowModel, es.DocumentModelNode );
