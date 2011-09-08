/**
 * Creates an es.SurfaceView object.
 */
es.SurfaceView = function( $container, documentModel ) {
	this.$ = $container.addClass( 'editSurface' );
	this.documentModel = documentModel;
	this.documentView = new es.DocumentView( this.documentModel );
	this.$.append( this.documentView.$ );
	this.width = null;
	
	var surface = this;
	$(window).resize( function() {
		var width = surface.$.width();
		if ( surface.width !== width ) {
			surface.width = width;
			surface.documentView.renderContent();
		}
	} );
	
	// First render
	this.documentView.renderContent();
};
