/**
 * Creates an es.SurfaceView object.
 * 
 * @class
 * @constructor
 */
es.SurfaceView = function( $container, model ) {
	this.$ = $container.addClass( 'editSurface' );
	this.model = model;
	
	// Initialize document view
	this.documentView = new es.DocumentView( this.model.getDocument() );
	this.$.append( this.documentView.$ );

	// Interaction state
	this.width = null;
	this.mouse = {
		selecting: false,
		clicks: 0,
		clickDelay: 500,
		clickTimeout: null,
		clickPosition: null,
		hotSpotRadius: 1
	};
	this.keyboard = {
		selecting: false,
		cursorAnchor: null,
		keydownTimeout: null,
		keys: {
			shift: false,
			control: false,
			command: false,
			alt: false
		}
	};
	this.selection = {
		from: 0,
		to: 0
	};
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
				$document.unbind( '.editSurface' );
				$document.bind({
					'mousemove.editSurface' : function(e) {
						return surfaceView.onMouseMove( e );
					},
					'mouseup.editSurface' : function(e) {
						return surfaceView.onMouseUp( e );
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
				$document.unbind( '.editSurface' );
				surfaceView.hideCursor();
			},
			'cut': function( e ) {
				return surfaceView.onCut( e );			
			},
			'copy': function( e ) {
				return surfaceView.onCopy( e );			
			},
			'paste': function( e ) {
				return surfaceView.onPaste( e );			
			}
		} ).focus();
	
	// Re-render when resizing horizontally
	$(window).resize( function() {
		surfaceView.hideCursor();
		var width = surfaceView.$.width();
		if ( surfaceView.width !== width ) {
			surfaceView.width = width;
			surfaceView.documentView.renderContent();
		}
	} );
	
	// First render
	this.documentView.renderContent();
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
	return true;
};

es.SurfaceView.prototype.onKeyUp = function( e ) {
	switch ( e.keyCode ) {
		case 16: // Shift
			this.keyboard.keys.shift = false;
			if ( this.keyboard.selecting ) {
				this.keyboard.selecting = false;
			}
			break;
		case 17: // Control
			this.keyboard.keys.control = false;
			break;
		case 18: // Alt
			this.keyboard.keys.alt = false;
			break;
		case 91: // Command
			this.keyboard.keys.command = false;
			break;
		default:
			break;
	}
	return true;
};

es.SurfaceView.prototype.onMouseDown = function( e ) {
	if ( e.button === 0 /* left mouse button */ ) {
		var	offset = this.documentView.getOffsetFromEvent( e );
		this.showCursor( offset );
		this.mouse.selecting = true;
		if ( !this.keyboard.keys.shift ) {
			this.selection.from = offset;
		}
		this.selection.to = offset;
		this.drawSelection();
	}
	if ( !this.$input.is( ':focus' ) ) {
		this.$input.focus().select();
	}
	this.cursor.initialLeft = null;
	return false;
};

es.SurfaceView.prototype.onMouseMove = function( e ) {
	if ( e.button === 0 /* left mouse button */ && this.mouse.selecting ) {
		this.hideCursor();
		this.selection.to = this.documentView.getOffsetFromEvent( e );
		if ( !this.drawSelection() ) {
			this.showCursor();
		}
	}
};

es.SurfaceView.prototype.onMouseUp = function( e ) {
	if ( e.button === 0 /* left mouse button */ && this.selection.to ) {
		if ( this.drawSelection() ) {
			this.hideCursor();
		}
	}
	this.mouse.selecting = false;
};

es.SurfaceView.prototype.onCut = function( e ) {
	// TODO: Keep a Content object copy of the selection
};

es.SurfaceView.prototype.onCopy = function( e ) {
	// TODO: Keep a Content object copy of the selection
};

es.SurfaceView.prototype.onPaste = function( e ) {
	// TODO: Respond to paste event, using the object copy if possible
};

es.SurfaceView.prototype.handleBackspace = function() {
	// TODO: Respond to backspace event
};

es.SurfaceView.prototype.handleDelete = function() {
	// TODO: Respond to delete event
};

es.SurfaceView.prototype.getInputContent = function() {
	// TODO: Get content from this.$input
};

es.SurfaceView.prototype.setInputContent = function( content ) {
	// TODO: Set the value of this.$input
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
		var position = this.documentView.getRenderedPosition( offset );
		this.cursor.$.css( {
			'left': position.left,
			'top': position.top,
			'height': position.bottom - position.top
		} ).show();
	} else {
		this.cursor.$.show();
	}

	if ( this.cursor.interval ) {
		clearInterval( this.cursor.interval );
	}
	this.cursor.interval = setInterval( function( surface ) {
		surface.cursor.$.css( 'display' ) == 'block'
			? surface.cursor.$.hide() : surface.cursor.$.show();
	}, 500, this );
};

/**
 * Hides the cursor.
 * 
 * @method
 */
es.SurfaceView.prototype.hideCursor = function( position ) {
	if( this.cursor.interval ) {
		clearInterval( this.cursor.interval );
	}
	this.cursor.$.hide();
};

es.SurfaceView.prototype.moveCursor = function( direction ) {
	if ( direction === 'left' ) {
		this.showCursor( this.cursor.offset - 1 );
		this.cursor.initialLeft = null;
	} else if ( direction === 'right' ) {
		this.showCursor( this.cursor.offset + 1 );
		this.cursor.initialLeft = null;
	} else if ( direction === 'up' || direction === 'down' ) {
		var currentPosition = this.documentView.getRenderedPosition( this.cursor.offset );
		if ( this.cursor.initialLeft === null ) {
			this.cursor.initialLeft = currentPosition.left;
		}
		var	fakePosition = new es.Position( this.cursor.initialLeft, currentPosition.top ),
			edgeCondition = ( direction == 'up' ) ? 0 : this.documentView.getLength(),
			offset,
			i = 1;

		do {
			if ( direction == 'up' ) {
				fakePosition.top -= i++ * 10;
			} else {
				fakePosition.top += i++ * 10;
			}
			offset = this.documentView.getOffsetFromPosition( fakePosition );
			fakePosition = this.documentView.getRenderedPosition( offset );
			fakePosition.left = this.cursor.initialLeft;
		} while ( currentPosition.top === fakePosition.top && offset !== edgeCondition )
		this.showCursor( this.documentView.getOffsetFromPosition( fakePosition ) );
	}
	return;
};

es.SurfaceView.prototype.drawSelection = function() {
	this.documentView.drawSelection( new es.Range( this.selection.from, this.selection.to ) );
	if ( this.selection.from !== this.selection.to ) {
		return true;
	} else {
		return false;
	}
};