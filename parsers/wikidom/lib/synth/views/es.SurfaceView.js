/**
 * Creates an es.SurfaceView object.
 */
es.SurfaceView = function( $container, surfaceModel ) {
	this.$ = $container.addClass( 'editSurface' );
	this.model = surfaceModel;
	this.documentView = new es.DocumentView( this.model.getDocument() );
	this.$.append( this.documentView.$ );
	this.width = null;
	
	// Selection
	this.$ranges = $( '<div class="editSurface-ranges"></div>' ).prependTo( this.$ );
	this.$rangeStart = $( '<div class="editSurface-range"></div>' ).appendTo( this.$ranges );
	this.$rangeFill = $( '<div class="editSurface-range"></div>' ).appendTo( this.$ranges );
	this.$rangeEnd = $( '<div class="editSurface-range"></div>' ).appendTo( this.$ranges );
	
	// Cursor
	this.blinkInterval = null;
	this.$cursor = $( '<div class="editSurface-cursor"></div>' ).appendTo( this.$ );
	
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

/**
 * Shows the cursor in a new position.
 * 
 * @method
 * @param position {Position} Position to show the cursor at
 * @param offset {Position} Offset to be added to position
 */
es.SurfaceView.prototype.showCursor = function( position, offset ) {
	if ( position ) {
		if ( $.isPlainObject( offset ) ) {
			position.left += offset.left;
			position.top += offset.top;
			position.bottom += offset.top;
		}
		this.$cursor.css( {
			'left': position.left,
			'top': position.top,
			'height': position.bottom - position.top
		} ).show();
	} else {
		this.$cursor.show();
	}
	
	if ( this.blinkInterval ) {
		clearInterval( this.blinkInterval );
	}
	var $cursor = this.$cursor;
	this.blinkInterval = setInterval( function() {
		$cursor.$.css( 'display' ) === 'block' ? $cursor.$.hide() : $cursor.$.show();
	}, 500 );
};

/**
 * Hides the cursor.
 * 
 * @method
 */
es.SurfaceView.prototype.hideCursor = function() {
	if( this.blinkInterval ) {
		clearInterval( this.blinkInterval );
	}
	this.$cursor.hide();
};
