/**
 * Creates an es.TableRowView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewBranchNode}
 */
es.TableRowView = function( model ) {
	// Extension
	var view = es.extendObject( new es.DocumentViewBranchNode( model, $( '<tr>' ) ), this );
	view.$.attr( 'style', model.getElementAttribute( 'html/style' ) );
	return view;
};
