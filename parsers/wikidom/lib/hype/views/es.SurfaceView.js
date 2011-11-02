/**
 * Creates an es.SurfaceView object.
 * 
 * @class
 * @constructor
 * @param {jQuery} $container DOM Container to render surface into
 * @param {es.SurfaceModel} model Surface model to view
 */
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
				//console.log("focus");
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
				//console.log("blur");
				$document.unbind( '.editSurface' );
				surfaceView.hideCursor();
			}
		} ).focus();
	
	// First render
	this.documentView.renderContent();
};

es.SurfaceView.boundaryTest = /([ \-\t\r\n\f])/;

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
	//
};

es.SurfaceView.prototype.moveCursor = function( instruction ) {
	if ( instruction === 'left') {
		this.showCursor( this.documentView.getModel().getRelativeContentOffset( this.cursor.offset, -1 ) );
	} else if ( instruction === 'right' ) {
		this.showCursor( this.documentView.getModel().getRelativeContentOffset( this.cursor.offset, 1 ) );
	} else if ( instruction === 'up' || instruction === 'down' ) {
		// ...
	} else if ( instruction === 'home' ) {
		this.showCursor( this.documentView.getRenderedLineRange( this.cursor.offset ).start );
	} else if ( instruction === 'end' ) {
		var end = this.documentView.getRenderedLineRange( this.cursor.offset ).end
		var data = this.documentView.getModel().data;
		if ( es.DocumentModel.isContentData( data, end ) ) {
			while( es.SurfaceView.boundaryTest.exec( data[ end - 1 ] ) ) {
				end--;
			}
		}
		this.showCursor( end );
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
