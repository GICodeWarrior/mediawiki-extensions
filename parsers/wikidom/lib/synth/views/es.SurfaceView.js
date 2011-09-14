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

es.SurfaceView.prototype.getLocationFromEvent = function( e ) {
	var $target = $( e.target ),
		$block = $target.is( '.editSurface-block' )
			? $target : $target.closest( '.editSurface-block' );
	// Not a block or child of a block? Find the nearest block...
	if ( !$block.length ) {
		var $blocks = this.$.find( '> .editSurface-document .editSurface-block' );
		$block = $blocks.first();
		$blocks.each( function() {
			// Stop looking when mouse is above top
			if ( e.pageY <= $(this).offset().top ) {
				return false;
			}
			$block = $(this);
		} );
	}
	var block = $block.data( 'block' ),
		blockPosition = $block.offset();
	return new es.Location(
		block,
		block.getOffset(
			new es.Position(
				e.pageX - blockPosition.left,
				e.pageY - blockPosition.top
			)
		)
	);
};

es.SurfaceView.prototype.getLocationFromOffset = function( offset ) {
	
};

es.SurfaceView.prototype.getLocationFromPosition = function( position ) {
	
};
