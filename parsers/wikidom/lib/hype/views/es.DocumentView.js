es.DocumentView = function( documentModel, surfaceView ) {
	var node = $.extend( new es.DocumentViewBranchNode( documentModel ), this );
	node.$.addClass( 'editSurface-document' );
	node.surfaceView = surfaceView;
	return node;
};