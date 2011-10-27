/**
 * Creates an es.ParagraphView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewLeafNode}
 */
es.ParagraphView = function( model ) {
	// Extension
	return es.extendObject( new es.DocumentViewLeafNode( model ), this );
};
