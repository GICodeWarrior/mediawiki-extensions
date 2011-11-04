/**
 * Creates an es.SurfaceView object.
 * 
 * @class
 * @constructor
 * @param {jQuery} $container DOM Container to render surface into
 * @param {es.SurfaceModel} model Surface model to view
 */
es.SurfaceView = function( $container, model ) {
	this.$ = $container.addClass( 'es-surfaceView' );
	this.$window = $( window );
	this.model = model;
	
	// Initialize document view
	this.documentView = new es.DocumentView( this.model.getDocument(), this );
	this.$.append( this.documentView.$ );

	// Interaction state
	this.mouse = {
		selecting: false,
		clicks: 0,
		clickDelay: 500,
		clickTimeout: null,
		clickPosition: null,
		hotSpotRadius: 1,
		lastMovePosition: null
	};
	this.cursor = {
		$: $( '<div class="es-surfaceView-cursor"></div>' ).appendTo( this.$ ),
		interval: null,
		initialLeft: null,
		initialBias: false
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
	this.selection = new es.Range();

	// References for use in closures
	var	surfaceView = this,
		$document = $( document );

	// MouseDown on surface
	this.$.on( {
		'mousedown' : function(e) {
			return surfaceView.onMouseDown( e );
		}
	} );
	
	// Hidden input
	this.$input = $( '<input class="es-surfaceView-input" />' )
		.prependTo( this.$ )
		.on( {
			'focus' : function() {
				//console.log("focus");
				$document.off( '.es-surfaceView' );
				$document.on({
					'mousemove.es-surfaceView': function(e) {
						return surfaceView.onMouseMove( e );
					},
					'mouseup.es-surfaceView': function(e) {
						return surfaceView.onMouseUp( e );
					},
					'keydown.es-surfaceView': function( e ) {
						return surfaceView.onKeyDown( e );			
					},
					'keyup.es-surfaceView': function( e ) {
						return surfaceView.onKeyUp( e );		
					}
				});
			},
			'blur': function( e ) {
				//console.log("blur");
				$document.off( '.es-surfaceView' );
				surfaceView.hideCursor();
			}
		} ).focus();
	
	// First render
	this.documentView.renderContent();

	this.dimensions = {
		width: this.$.width(),
		height: this.$window.height(),
		scrollTop: this.$window.scrollTop()
	};
	
	// Re-render when resizing horizontally
	this.$window.resize( function() {
		surfaceView.hideCursor();
		surfaceView.dimensions.height = surfaceView.$window.height();
		var width = surfaceView.$.width();
		if ( surfaceView.dimensions.width !== width ) {
			surfaceView.dimensions.width = width;
			surfaceView.documentView.renderContent();
		}
	} );
	
	this.$window.scroll( function() {
		surfaceView.dimensions.scrollTop = surfaceView.$window.scrollTop();
	} );
	
	this.documentView.on('update', function() {alert(1);});
};

es.SurfaceView.prototype.onMouseDown = function( e ) {
	if ( e.button === 0 /* left mouse button */ ) {
		this.mouse.selecting = true;
		this.selection.to = this.documentView.getOffsetFromEvent( e );
		
		if ( this.keyboard.keys.shift ) {
			this.documentView.drawSelection( this.selection );
			this.hideCursor();
		} else {
			this.documentView.clearSelection();
			this.selection.from = this.selection.to;
			var	position = es.Position.newFromEventPagePosition( e ),
				nodeView = this.documentView.getNodeFromOffset( this.selection.to, false );
			this.showCursor( position.left > nodeView.$.offset().left );
		}
	}
	if ( !this.$input.is( ':focus' ) ) {
		this.$input.focus().select();
	}
	this.cursor.initialLeft = null;
	return false;
};

es.SurfaceView.prototype.onMouseMove = function( e ) {
	if ( e.button === 0 /* left mouse button */ && this.mouse.selecting ) {
		this.selection.to = this.documentView.getOffsetFromEvent( e );
		this.documentView.drawSelection( this.selection );
		if ( this.selection.getLength() ) {
			this.hideCursor();
		}
	}
};

es.SurfaceView.prototype.onMouseUp = function( e ) {
	if ( e.button === 0 /* left mouse button */ ) {
		this.mouse.selecting = false;
	}
};

es.SurfaceView.prototype.onKeyDown = function( e ) {
	switch ( e.keyCode ) {
		case 16: // Shift
			this.keyboard.keys.shift = true;
			this.keyboard.selecting = true;
			break;
		case 17: // Control
			this.keyboard.keys.control = true;
			break;
		case 18: // Alt
			this.keyboard.keys.alt = true;
			break;
		case 91: // Left Command in WebKit
		case 93: // Right Command in WebKit
		case 224: // Command in FireFox
			this.keyboard.keys.command = true;
			break;
		case 36: // Home
			this.moveCursor( 'home' );
			break;
		case 35: // End
			this.moveCursor( 'end' );
			break;
		case 37: // Left arrow
			if ( this.keyboard.keys.command ) {
				this.moveCursor( 'home' );
			} else { 
				this.moveCursor( 'left' );
			}
			break;
		case 38: // Up arrow
			this.moveCursor( 'up' );
			break;
		case 39: // Right arrow
			if ( this.keyboard.keys.command ) {
				this.moveCursor( 'end' );
			} else { 
				this.moveCursor( 'right' );
			}
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
		case 91: // Left Command in WebKit
		case 93: // Right Command in WebKit
		case 224: // Command in FireFox
			this.keyboard.keys.command = false;
			break;
		default:
			break;
	}
	return true;
};

es.SurfaceView.prototype.moveCursor = function( instruction ) {
	this.selection.normalize();

	var from, to;

	if ( instruction === 'up' || instruction === 'down' ) {
		/*
		 * Looks for the in-document character position that would match up with the same horizontal
		 * position - jumping a few pixels up/down at a time until we reach the next/previous line
		 */

		var position = this.documentView.getRenderedPositionFromOffset( this.selection.to );
		if ( this.cursor.initialLeft === null ) {
			this.cursor.initialLeft = position.left;
		}

		var	fakePosition = new es.Position( this.cursor.initialLeft, position.top ),
			i = 0,
			step = instruction === 'up' ? -5 : 5,
			top = this.$.position().top;

		do {
			fakePosition.top += ++i * step;
			if ( fakePosition.top < top || fakePosition.top > top + this.dimensions.height ) {
				break;
			}
			fakePosition = this.documentView.getRenderedPositionFromOffset(
				this.documentView.getOffsetFromRenderedPosition( fakePosition )
			);
			fakePosition.left = this.cursor.initialLeft;
		} while ( position.top === fakePosition.top );

		to = this.documentView.getOffsetFromRenderedPosition( fakePosition );
		if ( !this.keyboard.keys.shift ) {
			from = to;
		}

	} else if ( instruction === 'left' ) {
		this.cursor.initialLeft = null;
		if ( !this.keyboard.keys.shift ) {
			from = to = this.documentView.getModel().getRelativeContentOffset(
				this.selection.getLength() ? this.selection.start : this.selection.to, -1 );
		} else {
			to = this.documentView.getModel().getRelativeContentOffset( this.selection.to, -1 );
		}
	} else if ( instruction === 'right' ) {
		this.cursor.initialLeft = null;
		if ( !this.keyboard.keys.shift ) {
			from = to = this.documentView.getModel().getRelativeContentOffset(
				this.selection.getLength() ? this.selection.end : this.selection.to, 1 );
		} else {
			to = this.documentView.getModel().getRelativeContentOffset( this.selection.to, 1 );
		}
	} else if ( instruction === 'home' ) {
		this.cursor.initialLeft = null;
		to = this.documentView.getRenderedLineRangeFromOffset(
			this.cursor.initialBias ?
				this.documentView.getModel().getRelativeContentOffset( this.selection.to, -1 ) :
					this.selection.to
		).start;
		if ( !this.keyboard.keys.shift ) {
			from = to;
		}
	} else if ( instruction === 'end' ) {
		this.cursor.initialLeft = null;
		to = this.documentView.getRenderedLineRangeFromOffset(
			this.cursor.initialBias ?
				this.documentView.getModel().getRelativeContentOffset( this.selection.to, -1 ) :
					this.selection.to
		).end;
		if ( !this.keyboard.keys.shift ) {
			from = to;
		}
	}

	if ( from === to ) {
		if ( this.selection.from !== this.selection.to ) {
			this.documentView.clearSelection();
		}
		this.selection.from = this.selection.to = to;
	} else {
		this.selection.to = to;
		this.documentView.drawSelection( this.selection );
	}

	if ( this.selection.from !== this.selection.to ) {
		this.hideCursor();
		if(instruction === 'home')
			this.cursor.initialBias = false;
		else if(instruction === 'end')
			this.cursor.initialBias = true;
	} else {
		this.showCursor( instruction === 'end' );
	}
};

/**
 * Shows the cursor in a new position.
 * 
 * @method
 * @param offset {Integer} Position to show the cursor at
 */
es.SurfaceView.prototype.showCursor = function( leftBias ) {	
	this.cursor.initialBias = leftBias ? true : false;
	var position = this.documentView.getRenderedPositionFromOffset(
		this.selection.to, leftBias
	);
	this.cursor.$.css( {
		'left': position.left,
		'top': position.top,
		'height': position.bottom - position.top
	} ).show();
	this.$input.css({
		'top': position.top,
		'height': position.bottom - position.top
	});

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
