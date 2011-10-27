/**
 * Creates an es.TableCellView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewBranchNode}
 */
es.TableCellView = function( model ) {
	// Extension
	return es.extendObject( new es.DocumentViewBranchNode( model ), this );
};
