es.SurfaceController = function( surfaceView ) {
	this.view = surfaceView;
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
	
	// MouseDown on surface
	this.view.$.bind( {
		'mousedown' : function(e) {
			return surface.onMouseDown( e );
		}
	} );
	
	// Hidden input
	var controller = this,
		$document = $(document);
	this.$input = $( '<input class="editSurface-input" />' )
		.prependTo( this.view.$ )
		.bind( {
			'focus' : function() {
				$(document).bind({
					'mousemove.editSurface' : function(e) {
						return controller.onMouseMove( e );
					},
					'mouseup.editSurface' : function(e) {
						return controller.onMouseUp( e );
					},
					'keydown.editSurface' : function( e ) {
						return controller.onKeyDown( e );			
					},
					'keyup.editSurface' : function( e ) {
						return controller.onKeyUp( e );			
					}
				});
			},
			'blur': function( e ) {
				$document.unbind('.editSurface');
				controller.hideCursor();
			},
			'cut': function( e ) {
				return controller.onCut( e );			
			},
			'copy': function( e ) {
				return controller.onCopy( e );			
			},
			'paste': function( e ) {
				return controller.onPaste( e );			
			}
		} );
	
	$(window).resize( function() {
		controller.view.hideCursor();
		controller.view.renderContent();
	} );
};

es.SurfaceController.prototype.onKeyDown = function( e ) {
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

es.SurfaceController.prototype.onKeyUp = function( e ) {
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

es.SurfaceController.prototype.onMouseDown = function( e ) {
	// TODO: Respond to mouse down event, moving cursor and possibly beginning selection painting
	return false;
};

es.SurfaceController.prototype.onMouseMove = function( e ) {
	// TODO: Respond to mouse move event, updating selection while painting
};

es.SurfaceController.prototype.onMouseUp = function( e ) {
	// TODO: Respond to mouse up event, possibly ending selection painting
};

es.SurfaceController.prototype.onCut = function( e ) {
	// TODO: Keep a Content object copy of the selection
};

es.SurfaceController.prototype.onCopy = function( e ) {
	// TODO: Keep a Content object copy of the selection
};

es.SurfaceController.prototype.onPaste = function( e ) {
	// TODO: Respond to paste event, using the object copy if possible
};

es.SurfaceController.prototype.handleBackspace = function() {
	// TODO: Respond to backspace event
};

es.SurfaceController.prototype.handleDelete = function() {
	// TODO: Respond to delete event
};

es.SurfaceController.prototype.getInputContent = function() {
	// TODO: Get content from this.$input
};

es.SurfaceController.prototype.setInputContent = function( content ) {
	// TODO: Set the value of this.$input
};

es.SurfaceController.prototype.getLocationFromEvent = function( e ) {
	var $target = $( e.target ),
		$block = $target.is( '.editSurface-block' )
			? $target : $target.closest( '.editSurface-block' );
	// Not a block or child of a block? Find the nearest block...
	if( !$block.length ) {
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
