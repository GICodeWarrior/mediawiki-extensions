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
	var surface = this;
	
	this.$ = $container.addClass( 'editSurface' );
	this.document = document;
	this.rendered = false;
	this.location = null;
	this.selection = new Selection();
	this.selecting = false;
	this.keydownTimeout = null;
	this.initialHorizontalCursorPosition = null;
	
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
	
	// Selection
	this.$ranges = $( '<div class="editSurface-ranges"></div>' ).prependTo( this.$ );
	this.$rangeStart = $( '<div class="editSurface-range"></div>' ).appendTo( this.$ranges );
	this.$rangeFill = $( '<div class="editSurface-range"></div>' ).appendTo( this.$ranges );
	this.$rangeEnd = $( '<div class="editSurface-range"></div>' ).appendTo( this.$ranges );
	
	// Cursor
	this.cursor = new Cursor();
	this.$.after( this.cursor.$ );
	
	// Hidden input
	this.$input = $( '<input class="editSurface-input" />' )
		.prependTo( this.$ )
		.bind({
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
	
	// First render
	this.render();
}

Surface.prototype.getLocationFromEvent = function( e ) {
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
		mousePosition = new Position( e.pageX - blockPosition.left, e.pageY - blockPosition.top );
	return new Location( block, block.getOffset( mousePosition ) );
};

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
			if ( this.keydownTimeout ) {
				clearTimeout( this.keydownTimeout );
			}
			this.keydownTimeout = setTimeout( function ( surface ) {
				var val = surface.$input.val();
				surface.$input.val( '' );
				if ( val.length > 0 ) {
					var location = surface.getLocation();
					location.block.insertContent( location.offset, val.split(''));
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
};

Surface.prototype.onMouseDown = function( e ) {
	if ( e.button === 0 ) {
		this.location = this.getLocationFromEvent( e );
		this.selection = new Selection( this.location );
		var cursorPosition = this.location.block.getPosition( this.location.offset );
		this.cursor.show( cursorPosition, this.location.block.$.offset() );
		this.$input.css( 'top', cursorPosition.top );
		this.selecting = true;
		this.drawSelection();
		this.cursor.show();
	}
	this.initialHorizontalCursorPosition = null;
	this.$input.focus();
	return false;
};

Surface.prototype.onMouseMove = function( e ) {
	this.cursor.hide();
	if ( e.button === 0 && this.selecting ) {
		this.selection.to = this.getLocationFromEvent( e );
		this.drawSelection();
	}
};

Surface.prototype.onMouseUp = function( e ) {
	if ( e.button === 0 && this.selecting ) {
		this.selecting = false;
		this.drawSelection();
		this.cursor.hide();
	}
};

/**
 * Displays current selection behind document content.
 */
Surface.prototype.drawSelection = function() {
	if ( this.selection.from && this.selection.to ) {
		this.selection.normalize();
		var from = {
				'location': this.selection.start,
				'position': this.selection.start.block.getPosition( this.selection.start.offset )
			},
			to = {
				'location': this.selection.end,
				'position': this.selection.end.block.getPosition( this.selection.end.offset )
			};
		if ( from.location.block === to.location.block ) {
			var block = from.location.block,
				blockOffset = block.$.offset();
			if ( from.location.offset === to.location.offset ) {
				// No selection, just hide them all
				this.$rangeStart.hide();
				this.$rangeFill.hide();
				this.$rangeEnd.hide();
			} else if ( from.position.line === to.position.line ) {
				// Single line selection
				this.$rangeStart
					.css( {
						'top': blockOffset.top + from.position.top,
						'left': blockOffset.left + from.position.left,
						'width': to.position.left - from.position.left,
						'height': from.position.bottom - from.position.top
					} )
					.show();
				this.$rangeFill.hide();
				this.$rangeEnd.hide();
			} else {
				// Multiple line selection
				var blockWidth = block.$.width();
				this.$rangeStart
					.css( {
						'top': blockOffset.top + from.position.top,
						'left': blockOffset.left + from.position.left,
						'width': blockWidth - from.position.left,
						'height': from.position.bottom - from.position.top
					} )
					.show();
				this.$rangeEnd
					.css( {
						'top': blockOffset.top + to.position.top,
						'left': blockOffset.left,
						'width': to.position.left,
						'height': to.position.bottom - to.position.top
					} )
					.show();
				if ( from.position.line + 1 < to.position.line ) {
					this.$rangeFill
						.css( {
							'top': blockOffset.top + from.position.bottom,
							'left': blockOffset.left,
							'width': blockWidth,
							'height': to.position.top - from.position.bottom
						} )
						.show();
				} else {
					this.$rangeFill.hide();
				}
			}
		} else {
			// Multiple block selection
			var blockWidth = Math.max(
					from.location.block.$.width(),
					to.location.block.$.width()
				)
				fromBlockOffset = from.location.block.$.offset(),
				toBlockOffset = to.location.block.$.offset(),
				blockLeft = Math.min( fromBlockOffset.left, toBlockOffset.left );
			this.$rangeStart
				.css( {
					'top': fromBlockOffset.top + from.position.top,
					'left': blockLeft + from.position.left,
					'width': blockWidth - from.position.left,
					'height': from.position.bottom - from.position.top
				} )
				.show();
			this.$rangeEnd
				.css( {
					'top': toBlockOffset.top + to.position.top,
					'left': blockLeft,
					'width': to.position.left,
					'height': to.position.bottom - to.position.top
				} )
				.show();
			this.$rangeFill
				.css( {
					'top': fromBlockOffset.top + from.position.bottom,
					'left': blockLeft,
					'width': blockWidth,
					'height': ( toBlockOffset.top + to.position.top )
						- ( fromBlockOffset.top + from.position.bottom )
				} )
				.show();
		}
		this.$ranges.show();
	} else {
		this.$ranges.hide();
	}
};

/**
 * Sets the selection to a new range.
 * 
 * @param from {Selection} Selection to apply
 */
Surface.prototype.setSelection = function( selection ) {
	this.selection = selection;
};

/**
 * Gets the current document selection.
 * 
 * @returns {Selection}
 */
Surface.prototype.getSelection = function() {
	return this.selection;
};

/**
 * Gets the current cursor location.
 * 
 * @returns {Location}
 */
Surface.prototype.getLocation = function() {
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

/**
 * Applies an annotation to a given selection.
 * 
 * If a selection argument is not provided, the current selection will be annotated.
 * 
 * @param annotation {Object} Annotation to apply
 * @param selection {Selection} Range to apply annotation to
 */
Surface.prototype.annotateContent= function( annotation, selection ) {
	if ( selection === undefined ) {
		selection = this.selection;
	}
	if ( selection.from && selection.to ) {
		selection.normalize();
		var from = selection.start,
			to = selection.end;
		if ( from.block === to.block ) {
			// Single block annotation
			from.block.annotateContent( annotation, from.offset, to.offset );
			from.block.renderContent();
		} else {
			// Multiple block annotation
			for ( var i = from.block.getIndex(), end = to.block.getIndex(); i <= end; i++ ) {
				var block = this.document.blocks[i];
				if ( block === from.block ) {
					// From offset to length
					block.annotateContent( annotation, from.offset, block.getLength() );
					block.renderContent();
				} else if ( block === to.block ) {
					// From 0 to offset
					block.annotateContent( annotation, 0, to.offset );
					block.renderContent();
				} else {
					// Full coverage
					block.annotateContent( annotation, 0, block.getLength() );
					block.renderContent();
				}
			}
		}
	}
	this.drawSelection();
};
