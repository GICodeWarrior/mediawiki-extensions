es.DocumentView = function( documentModel, surfaceView ) {
	var node = es.extendObject( new es.DocumentViewBranchNode( documentModel ), this );
	node.$.addClass( 'editSurface-document' );
	node.surfaceView = surfaceView;
	return node;
};

/**
 * Get the document offset of a position created from passed DOM event
 * 
 * @method
 * @param e {Event} Event to create es.Position from
 * @returns {Integer} Document offset
 */
es.DocumentView.prototype.getOffsetFromEvent = function( e ) {
	var position = es.Position.newFromEventPagePosition( e );
	return this.getOffsetFromRenderedPosition( position );
};