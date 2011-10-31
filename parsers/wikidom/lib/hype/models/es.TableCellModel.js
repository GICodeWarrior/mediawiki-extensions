/**
 * Creates an es.TableCellModel object.
 * 
 * @class
 * @constructor
 */
es.TableCellModel = function( element, length ) {
	// Extension
	return es.extendObject( new es.DocumentModelNode( element, length ), this );
};

/* Methods */

/**
 * Creates a table cell view for this model.
 * 
 * @method
 * @returns {es.TableCellView}
 */
es.TableCellModel.prototype.createView = function() {
	return new es.TableCellView( this );
};

/* Registration */

es.DocumentModel.nodeModels.tableCell = es.TableCellModel;

es.DocumentModel.nodeRules.listItem = {
	'parents': ['tableRow'],
	'children': null
};