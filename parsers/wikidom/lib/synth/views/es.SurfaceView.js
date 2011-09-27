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
		'selecting': false,
		'clicks': 0,
		'clickDelay': 500,
		'clickTimeout': null,
		'clickPosition': null,
		'hotSpotRadius': 1
	};
	this.keyboard = {
		'selecting': false,
		'cursorAnchor': null,
		'keydownTimeout': null,
		'keys': {
			'shift': false,
			'control': false,
			'command': false,
			'alt': false
		}
	};
	
	this.selecting = false;
	this.from = this.to = 0;
	
	// Cursor
	this.blinkInterval = null;
	this.$cursor = $( '<div class="editSurface-cursor"></div>' ).appendTo( this.$ );
	
	// References for use in closures
	var surfaceView = this,
		$document = $(document);
	
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
				$document.unbind('.editSurface');
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
			break;
		case 38: // Up arrow
			break;
		case 39: // Right arrow
			break;
		case 40: // Down arrow
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
	var contentOffset = this.documentView.getOffsetFromEvent( e );

	this.from = contentOffset;
	this.selecting = true;

	if ( !this.$input.is(':focus') ) {
		this.$input.focus().select();
	}

	return false;
};

es.SurfaceView.prototype.onMouseMove = function( e ) {
	if (this.selecting ) {
		var contentOffset = this.documentView.getOffsetFromEvent( e );

		this.to = contentOffset;		
		this.documentView.drawSelection( new es.Range( this.from, this.to ) );
	}
	// TODO: Respond to mouse move event, updating selection while painting
};

es.SurfaceView.prototype.onMouseUp = function( e ) {
	this.selecting = false;
	// TODO: Respond to mouse up event, possibly ending selection painting
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

/* Inheritance */

es.SurfaceView.prototype.getLocationFromPosition = function( position ) {
	
};
