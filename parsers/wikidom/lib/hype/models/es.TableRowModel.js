/**
 * Creates an es.TableRowModel object.
 * 
 * @class
 * @constructor
 */
es.TableRowModel = function( element, length ) {
	// Extension
	return es.extendObject( new es.DocumentModelNode( element, length ), this );
};

/* Methods */

/**
 * Creates a table row view for this model.
 * 
 * @method
 * @returns {es.TableRowView}
 */
es.TableRowModel.prototype.createView = function() {
	return new es.TableRowView( this );
};

/* Registration */

es.DocumentModel.nodeModels.tableRow = es.TableRowModel;

es.DocumentModel.nodeRules.listItem = {
	'parents': ['table'],
	'children': ['tableCell']
};