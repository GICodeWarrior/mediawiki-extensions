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
	var surfaceView = this,
		$document = $( document );

	// MouseDown on surface
	this.$.bind( {
		'mousedown' : function(e) {
			return surfaceView.onMouseDown( e );
		}
	} );
	
	// Hidden input
	this.$input = $( '<input class="editSurface-input" />' )
		.prependTo( this.$ )
		.bind( {
			'focus' : function() {
				console.log("focus");
				$document.unbind( '.editSurface' );
				$document.bind({
					'mousemove.editSurface' : function(e) {
						//return surfaceView.onMouseMove( e );
					},
					'mouseup.editSurface' : function(e) {
						//return surfaceView.onMouseUp( e );
					},
					'keydown.editSurface' : function( e ) {
						return surfaceView.onKeyDown( e );			
					},
					'keyup.editSurface' : function( e ) {
						return surfaceView.onKeyUp( e );			
					}
				});
			},
			'blur': function( e ) {
				console.log("blur");
				$document.unbind( '.editSurface' );
				surfaceView.hideCursor();
			}
		} ).focus();
	
	// First render
	this.documentView.renderContent();
};

es.SurfaceView.prototype.onMouseDown = function( e ) {
	var	offset = this.documentView.getOffsetFromEvent( e );
	this.showCursor( offset );
	if ( !this.$input.is( ':focus' ) ) {
		this.$input.focus().select();
	}
	return false;
};

es.SurfaceView.prototype.onKeyDown = function( e ) {
	switch ( e.keyCode ) {
		case 16: // Shift
			this.keyboard.keys.shift = true;
			break;
		case 17: // Control
			this.keyboard.keys.control = true;
			break;
		case 18: // Alt
			this.keyboard.keys.alt = true;
			break;
		case 91: // Command
			this.keyboard.keys.command = true;
			break;
		case 36: // Home
			break;
		case 35: // End
			break;
		case 37: // Left arrow
			this.moveCursor( 'left' );
			break;
		case 38: // Up arrow
			this.moveCursor( 'up' );
			break;
		case 39: // Right arrow
			this.moveCursor( 'right' );
			break;
		case 40: // Down arrow
			this.moveCursor( 'down' );
			break;
		case 8: // Backspace
			break;
		case 46: // Delete
			break;
		default: // Insert content (maybe)
			break;
	}
	return false;
};

es.SurfaceView.prototype.moveCursor = function( direction ) {
	if ( direction === 'left') {
		this.showCursor( this.documentView.getModel().getRelativeContentOffset( this.cursor.offset, -1 ) );
	} else if ( direction === 'right' ) {
		this.showCursor( this.documentView.getModel().getRelativeContentOffset( this.cursor.offset, 1 ) );
	} else if ( direction === 'up' || direction === 'down' ) {
		// ...
	}
};

/**
 * Shows the cursor in a new position.
 * 
 * @method
 * @param offset {Integer} Position to show the cursor at
 */
es.SurfaceView.prototype.showCursor = function( offset ) {
	if ( typeof offset !== 'undefined' ) {
		this.cursor.offset = offset;
		var position = this.documentView.getRenderedPositionFromOffset( this.cursor.offset );
		this.cursor.$.css( {
			'left': position.left,
			'top': position.top,
			'height': position.bottom - position.top
		} );
		this.$input.css({
			'top': position.top,
			'height': position.bottom - position.top
		});
	}
	
	this.cursor.$.show();

	// cursor blinking
	if ( this.cursor.interval ) {
		clearInterval( this.cursor.interval );
	}
	this.cursor.interval = setInterval( function( surface ) {
		surface.cursor.$.css( 'display', function( index, value ) {
			return value === 'block' ? 'none' : 'block';
		} );
	}, 500, this );
};

/**
 * Hides the cursor.
 * 
 * @method
 */
es.SurfaceView.prototype.hideCursor = function() {
	if( this.cursor.interval ) {
		clearInterval( this.cursor.interval );
	}
	this.cursor.$.hide();
};
