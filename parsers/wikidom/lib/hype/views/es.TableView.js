/**
 * Creates an es.TableView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewBranchNode}
 */
es.TableView = function( model ) {
	// Extension
	return $.extend( new es.DocumentViewBranchNode( model ), this );
};
