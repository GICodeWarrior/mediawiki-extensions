/**
 * Creates an es.ParagraphView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewLeafNode}
 */
es.ParagraphView = function( model ) {
	// Extension
	return $.extend( new es.DocumentViewLeafNode( model ), this );
};
