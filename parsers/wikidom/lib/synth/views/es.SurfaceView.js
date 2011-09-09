/**
 * Creates an es.SurfaceView object.
 */
es.SurfaceView = function( $container, surfaceModel ) {
	this.$ = $container.addClass( 'editSurface' );
	this.model = surfaceModel;
	this.documentView = new es.DocumentView( this.model.getDocument() );
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
