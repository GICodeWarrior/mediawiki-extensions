/*@cc_on
(function(f) {
	window.setTimeout = f(window.setTimeout); // overwrites the global function!
	window.setInterval = f(window.setInterval); // overwrites the global function!
})(function(f) {
	return function(c, t) {
		var a = [].slice.call(arguments, 2); // gathers the extra args
		return f(function() {
			c.apply(this, a); // passes them to your function
		}, t);
	};
	});
@*/

/**
 * 
 * @param $container
 * @param document
 * @returns {Surface}
 */
function Surface( $container, document ) {
	this.$ = $container.addClass( 'editSurface' );
	this.document = document;
	this.rendered = false;
	this.location = null;
	this.selection = null;
	this.keydownInterval = null;
	this.initialHorizontalCursorPosition = null;
	this.render();
	
	this.state = {
		'selection': {
			'active': false
		}
	};
	
	var surface = this;

	this.$.bind({
		'mousedown' : function(e) {
			return surface.onMouseDown( e );
		},
		'mousemove' : function(e) {
			return surface.onMouseMove( e );
		},
		'mouseup' : function(e) {
			return surface.onMouseUp( e );
		}
	});
	
	// Cursor
	this.cursor = new Cursor();
	this.$.after( this.cursor.$ );
	
	// Hidden input
	this.$input = $( '<input class="editSurface-input" />' );
	this.$.prepend( this.$input );
	this.$input.bind({
		'keydown' : function( e ) {
			return surface.onKeyDown( e );			
		},
		'keyup' : function( e ) {
			return surface.onKeyUp( e );			
		},
		'blur': function( e ) {
			surface.cursor.hide();
		}
	});
}

Surface.prototype.onKeyDown = function( e ) {

	switch ( e.keyCode ) {
		case 37: // Left arrow
			this.initialHorizontalCursorPosition = null;
			this.moveCursorLeft();
			break;
		case 38: // Up arrow
			this.moveCursorUp();
			break;
		case 39: // Right arrow
			this.initialHorizontalCursorPosition = null;
			this.moveCursorRight();
			break;
		case 40: // Down arrow
			this.moveCursorDown();
			break;
		case 8: // Backspace
			this.initialHorizontalCursorPosition = null;
			this.handleBackspace();
			break;
		case 46: // Delete
			this.handleDelete();
			break;
		default:
			this.initialHorizontalCursorPosition = null;
			this.cursor.hide();
			if ( this.keydownInterval ) {
				clearTimeout( this.keydownInterval );
			}
			this.keydownInterval = setTimeout( function ( surface ) {
				var val = surface.$input.val();
				surface.$input.val( '' );
				if ( val.length > 0 ) {
					var location = surface.getLocation();
					location.block.insertContent( location.offset, val);
					location.offset++;
				}
			}, 0, this );
			break;
	}
	return true;
}

Surface.prototype.onKeyUp = function( e ) {
	var location = this.getLocation();
	this.cursor.show( location.block.flow.getPosition( location.offset ), location.block.$.offset() );
	return true;
}

Surface.prototype.handleBackspace = function() {
	var location = this.getLocation();
	if ( location.offset > 0 ) {
		location.block.deleteContent( location.offset - 1, location.offset );
		location.offset--;
		this.cursor.show( location.block.flow.getPosition( location.offset ), location.block.$.offset() );
	}
}

Surface.prototype.handleDelete = function() {
	var location = this.getLocation();
	if ( location.offset < location.block.getLength() - 1 ) {	
		location.block.deleteContent( location.offset, location.offset + 1);
		this.cursor.show( location.block.flow.getPosition( location.offset ), location.block.$.offset() );
	}
}

Surface.prototype.onMouseDown = function( e ) {
	this.initialHorizontalCursorPosition = null;
	
	var $target = $( e.target );
		$block = $target.is( '.editSurface-block' )
			? $target : $target.closest( '.editSurface-block' );
	// Not a block or child of a block? Find the nearest block...
	if( !$block.length ) {
		$blocks = this.$.find( '> .editSurface-document .editSurface-block' );
		$block = $blocks.first();
		$blocks.each( function() {
			// Stop looking when mouse is above top
			if ( e.pageY <= $(this).offset().top ) {
				return false;
			}
			$block = $(this);
		} );
	}
	var block = $block.data( 'block' )
		blockPosition = $block.offset()
		mousePosition = new Position( e.pageX - blockPosition.left, e.pageY - blockPosition.top )
		nearestOffset = block.flow.getOffset( mousePosition ),
		cursorPosition = block.flow.getPosition( nearestOffset );
	
	this.cursor.show( cursorPosition, blockPosition );
	this.$input.css( 'top', cursorPosition.top );
	this.location = new Location( block, nearestOffset );
	
	this.state.selection = {
		'active': true,
		'from': null,
		'to': null,
		'start': nearestOffset,
		'end': null
	};
	
	this.$input.focus();
	return false;
};

Surface.prototype.onMouseMove = function( e ) {
	var sel = this.state.selection;
	if ( sel.active ) {
		//
	}
};

Surface.prototype.onMouseUp = function( e ) {
	var sel = this.state.selection;
	if ( sel.active ) {
		sel.active = false;
	}
};

/**
 * Sets the selection to a new range.
 * 
 * @param from {Location} Start of selection
 * @param to {Location} End of selection
 */
Surface.prototype.setSelection = function( from, to ) {
	//
};

/**
 * Sets the selection to a new range.
 * 
 * @param from {Selection} Selection to apply
 */
Surface.prototype.setSelection = function( selection ) {
	//
};

/**
 * Gets the current document selection.
 * 
 * @returns {Selection}
 */
Surface.prototype.getSelection = function() {
	// return selection
};

/**
 * Gets the location of a position.
 * 
 * @param position {Position} Position to translate
 * @returns {Location}
 */
Surface.prototype.getLocation = function( position ) {
	return this.location;
};

/**
 * Moves the cursor to the nearest location directly above the current flowed line.
 */
Surface.prototype.moveCursorUp = function() {
	var location = this.getLocation(),
		position = location.block.getPosition( location.offset );
		
	if ( this.initialHorizontalCursorPosition ) {
		position.left = this.initialHorizontalCursorPosition;
	} else {
		this.initialHorizontalCursorPosition = position.left;
	}
		
	position.top = position.top - 1;
	if ( position.top < 0 ) {
		var previousBlock = location.block.previousBlock();
		if ( previousBlock ) {
			location.block = previousBlock;
			position.top += location.block.$.height();
		}
	}
	location.offset = location.block.getOffset( position );
	position = location.block.getPosition( location.offset );
	this.cursor.show( position, location.block.$.offset() );
};

/**
 * Moves the cursor to the nearest location directly below the current flowed line.
 */
Surface.prototype.moveCursorDown = function() {
	var location = this.getLocation()
		position = location.block.getPosition( location.offset );

	if ( this.initialHorizontalCursorPosition ) {
		position.left = this.initialHorizontalCursorPosition;
	} else {
		this.initialHorizontalCursorPosition = position.left;
	}

	position.top = position.bottom + 1;
	if ( position.top > location.block.$.height() ) {
		var nextBlock = location.block.nextBlock();
		if ( nextBlock ) {
			position.top -= location.block.$.height();
			location.block = nextBlock;
		}
	}
	location.offset = location.block.getOffset( position );
	position = location.block.getPosition( location.offset );
	this.cursor.show( position, location.block.$.offset() );
};

/**
 * Moves the cursor backward of the current position.
 */
Surface.prototype.moveCursorRight = function() {
	var location = this.getLocation();
	if ( location.offset < location.block.getLength() ) {
		location.offset++;
	} else {
		var next = location.block.nextBlock();
		if ( next ) {
			location.block = next;
			location.offset = 0;
		}
	}
	this.cursor.show(
		location.block.flow.getPosition( location.offset ),
		location.block.$.offset()
	);
};

/**
 * Moves the cursor forward of the current position.
 */
Surface.prototype.moveCursorLeft = function() {
	var location = this.getLocation();
	if ( location.offset > 0 ) {
		location.offset--;
	} else {
		var previous = location.block.previousBlock();
		if ( previous ) {
			location.block = previous;
			location.offset = location.block.getLength();
		}
	}
	this.cursor.show(
		location.block.flow.getPosition( location.offset ),
		location.block.$.offset()
	);
};

/**
 * Updates the rendered view.
 * 
 * @param from Location: Where to start re-flowing from (optional)
 */
Surface.prototype.render = function( from ) {
	if ( !this.rendered ) {
		this.rendered = true;
		this.$.append( this.document.$ );
		this.document.renderBlocks();
	} else {
		this.document.updateBlocks();
	}
};
