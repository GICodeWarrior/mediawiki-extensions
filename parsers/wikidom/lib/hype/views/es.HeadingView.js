/**
 * Creates an es.HeadingView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewLeafNode}
 */
es.HeadingView = function( model ) {
	// Extension
	var view = es.extendObject( new es.DocumentViewLeafNode( model, $('<h' + model.getElementAttribute( 'level' ) +'/>') ), this );
	view.$.addClass( 'editSurface-headingBlock' );
	return view;
};