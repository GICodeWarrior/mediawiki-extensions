/**
 * Creates an es.ListItemView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewLeafNode}
 */
es.ListItemView = function( model ) {
	// Extension
	return es.extendObject( new es.DocumentViewLeafNode( model ), this );
};
