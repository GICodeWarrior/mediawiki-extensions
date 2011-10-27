es.DocumentView = function( documentModel, surfaceView ) {
	var node = es.extendObject( new es.DocumentViewBranchNode( documentModel ), this );
	node.$.addClass( 'editSurface-document' );
	node.surfaceView = surfaceView;
	return node;
};