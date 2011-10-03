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

/**
 * Creates a table view for this model.
 * 
 * @returns {es.TableView}
 */
es.TableModel.prototype.createView = function() {
	// return new es.TableView( this );
};

/* Registration */

es.DocumentModel.nodeModels.table = es.TableModel;

/* Inheritance */

es.extend( es.TableModel, es.DocumentModelNode );
