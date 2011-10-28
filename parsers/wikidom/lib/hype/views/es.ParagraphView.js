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

es.ParagraphView.prototype.getRenderedPositionFromOffset = function( offset ) {
	var	position = this.contentView.getRenderedPositionFromOffset( offset ),
		offset = this.$content.offset();
	position.top += offset.top;
	position.left += offset.left;
	position.bottom += offset.top;
	return position;
};
