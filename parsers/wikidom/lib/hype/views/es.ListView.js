/**
 * Creates an es.ListView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewBranchNode}
 */
es.ListView = function( model ) {
	// Extension
	return es.extendObject( new es.DocumentViewBranchNode( model ), this );
};
