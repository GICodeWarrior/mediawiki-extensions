/**
 * Creates an es.ListView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewBranchNode}
 */
es.ListView = function( model ) {
	// Extension
	var view = es.extendObject( new es.DocumentViewBranchNode( model ), this );
	view.$.addClass( 'editSurface-listBlock' );
	return view;
};
