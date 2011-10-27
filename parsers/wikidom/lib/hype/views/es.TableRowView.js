/**
 * Creates an es.TableRowView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewBranchNode}
 */
es.TableRowView = function( model ) {
	// Extension
	return es.extendObject( new es.DocumentViewBranchNode( model ), this );
};
