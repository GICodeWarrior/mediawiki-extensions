/**
 * Creates an es.TableView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewBranchNode}
 */
es.TableView = function( model ) {
	// Extension
	var view = es.extendObject( new es.DocumentViewBranchNode( model, $( '<table>' ) ), this );
	view.$.attr( 'style', model.getElementAttribute( 'html/style' ) );
	view.$.addClass( 'editSurface-tableBlock' );
	return view;
};
