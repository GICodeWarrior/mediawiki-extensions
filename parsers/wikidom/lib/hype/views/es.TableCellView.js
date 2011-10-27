/**
 * Creates an es.TableCellView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewBranchNode}
 */
es.TableCellView = function( model ) {
	// Extension
	var view = es.extendObject( new es.DocumentViewBranchNode( model, $( '<td>' ) ), this );
	view.$.attr( 'style', model.getElementAttribute( 'html/style' ) );
	return view;
};
