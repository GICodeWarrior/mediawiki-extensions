/**
 * Creates an es.TableRowModel object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentModelNode}
 * @param {Object} element Document data element of this node
 * @param {es.DocumentModelNode[]} contents List of child nodes to initially add
 */
es.TableRowModel = function( element, contents ) {
	// Inheritance
	es.DocumentModelNode.call( this, element, contents );
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

/* Inheritance */

es.extendClass( es.TableRowModel, es.DocumentModelNode );
