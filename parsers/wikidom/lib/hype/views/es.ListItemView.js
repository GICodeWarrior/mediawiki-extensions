/**
 * Creates an es.ListItemView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewLeafNode}
 */
es.ListItemView = function( model ) {
	// Extension
	return $.extend( new es.DocumentViewLeafNode( model ), this );
};
