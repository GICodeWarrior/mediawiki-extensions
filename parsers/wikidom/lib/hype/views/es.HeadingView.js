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

es.HeadingView.prototype.getRenderedPositionFromOffset = function( offset ) {
	var	position = this.contentView.getRenderedPositionFromOffset( offset ),
		offset = this.$content.offset();
	position.top += offset.top;
	position.left += offset.left;
	position.bottom += offset.top;
	return position;
};