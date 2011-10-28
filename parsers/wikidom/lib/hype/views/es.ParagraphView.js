/**
 * Creates an es.ParagraphView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewLeafNode}
 */
es.ParagraphView = function( model ) {
	// Extension
	var view = es.extendObject( new es.DocumentViewLeafNode( model ), this );
	view.$.addClass( 'editSurface-paragraphBlock' );
	return view;
};