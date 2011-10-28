es.SurfaceView = function( $container, model ) {
	this.$ = $container.addClass( 'editSurface' );
	this.$window = $( window );
	this.model = model;
	
	// Initialize document view
	this.documentView = new es.DocumentView( this.model.getDocument(), this );
	this.$.append( this.documentView.$ );
	
	this.cursor = {
		$: $( '<div class="editSurface-cursor"></div>' ).appendTo( this.$ ),
		interval: null,
		offset: null,
		initialLeft: null
	};
	
	// References for use in closures
	var surfaceView = this;

	// MouseDown on surface
	this.$.bind( {
		'mousedown' : function(e) {
			return surfaceView.onMouseDown( e );
		}
	} );
	
	// First render
	this.documentView.renderContent();
};

es.SurfaceView.prototype.onMouseDown = function( e ) {
	var	offset = this.documentView.getOffsetFromEvent( e );
	var position = this.documentView.getRenderedPositionFromOffset( offset );
	
	this.cursor.$.css( {
			'left': position.left,
			'top': position.top,
			'height': position.bottom - position.top
		} ).show();
};
