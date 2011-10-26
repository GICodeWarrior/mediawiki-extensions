/**
 * Creates an es.TableModel object.
 * 
 * @class
 * @constructor
 */
es.TableModel = function( element, length ) {
	// Extension
	return $.extend( new es.DocumentModelNode( element, length ), this );
};

/* Methods */

/**
 * Creates a table view for this model.
 * 
 * @method
 * @returns {es.TableView}
 */
es.TableModel.prototype.createView = function() {
	return new es.TableView( this );
};

/* Registration */

es.DocumentModel.nodeModels.table = es.TableModel;
