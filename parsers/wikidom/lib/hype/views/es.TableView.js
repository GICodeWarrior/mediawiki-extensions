/**
 * Creates an es.TableView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewBranchNode}
 */
es.TableView = function( model ) {
	// Extension
	return es.extendObject( new es.DocumentViewBranchNode( model ), this );
};
