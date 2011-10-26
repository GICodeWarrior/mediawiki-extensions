es.SurfaceView = function( $container, model ) {
	this.$ = $container.addClass( 'editSurface' );
	this.$window = $( window );
	this.model = model;
	
	// Initialize document view
	this.documentView = new es.DocumentView( this.model.getDocument(), this );
	this.$.append( this.documentView.$ );

	// First render
	this.documentView.renderContent();
};