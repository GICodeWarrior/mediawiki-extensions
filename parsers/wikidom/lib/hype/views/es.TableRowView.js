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

/**
 * Gets the nearest offset of a rendered position.
 * 
 * The only difference between this method and one in DocumentViewBranchNode is that it checks
 * 'left' property of position instead of 'top'. If such case will become more frequent lets
 * consider having private property in DocumentViewBranchNode which defines if horizontal
 * or vertical scanning should be executed.
 * 
 * @method
 * @param {es.Position} position Position to get offset for
 * @returns {Integer} Offset of position
 */
es.TableRowView.prototype.getOffsetFromRenderedPosition = function( position ) {
	if ( this.length === 0 ) {
		return 0;
	}
	var node = this[0];
	for ( var i = 1; i < this.length; i++ ) {
		if ( this[i].$.offset().left > position.left ) {
			break;
		}
		node = this[i];
	}
	return node.getParent().getOffsetFromNode( node, true ) +
		node.getOffsetFromRenderedPosition( position );	
};

