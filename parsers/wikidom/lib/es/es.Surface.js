/**
 * 
 * @param $container
 * @param doc
 * @returns {Surface}
 */
function Surface( $container, doc ) {
	var surface = this;
	
	this.$ = $container.addClass( 'editSurface' );
	this.doc = doc;
	this.rendered = false;
	this.location = null;
	this.selection = new Selection();
	this.mouseSelecting = false;
	this.keyboardSelecting = false;
	this.keydownTimeout = null;
	this.initialHorizontalCursorPosition = null;

	// MouseDown on surface
	this.$.bind({
		'mousedown' : function(e) {
			return surface.onMouseDown( e );
		}
	});

	// Selection
	this.$ranges = $( '<div class="editSurface-ranges"></div>' ).prependTo( this.$ );
	this.$rangeStart = $( '<div class="editSurface-range"></div>' ).appendTo( this.$ranges );
	this.$rangeFill = $( '<div class="editSurface-range"></div>' ).appendTo( this.$ranges );
	this.$rangeEnd = $( '<div class="editSurface-range"></div>' ).appendTo( this.$ranges );
	
	// Cursor
	this.cursor = new Cursor();
	this.$.append( this.cursor.$ );
	
	// Hidden input
	this.$input = $( '<input class="editSurface-input" />' )
		.prependTo( this.$ )
		.bind({
			'focus' : function() {
				$(document).bind({
					'mousemove.es' : function(e) {
						return surface.onMouseMove( e );
					},
					'mouseup.es' : function(e) {
						return surface.onMouseUp( e );
					},
					'keydown.es' : function( e ) {
						return surface.onKeyDown( e );			
					},
					'keyup.es' : function( e ) {
						return surface.onKeyUp( e );			
					},
				});		
			},
			'blur': function( e ) {
				$(document).unbind('mousemove.es');
				$(document).unbind('mouseup.es');			
				$(document).unbind('keydown.es');
				$(document).unbind('keyup.es');			
				surface.cursor.hide();
			}
		});

	$(window).resize( function() {
		surface.render( 0, function() {
			surface.drawSelection();
		} );
	} );
	
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
		case 16: // Shift
			this.shiftDown = true;
			if ( !this.keyboardSelecting ) {
				this.keyboardSelecting = true;
				if ( !this.selection.to ) {
					this.selection = new Selection( this.location );
				}
				this.drawSelection();
			}
			break;		
		case 17: // Control
			this.ctrlDown = true;
			break;
		case 37: // Left arrow
			this.initialHorizontalCursorPosition = null;
			this.moveCursorLeft();
			if ( this.shiftDown && this.keyboardSelecting ) {
				this.selection.to = this.location;
			} else {
				this.selection = new Selection();
			}
			this.drawSelection();
			break;
		case 38: // Up arrow
			this.moveCursorUp();
			if ( this.shiftDown && this.keyboardSelecting ) {
				this.selection.to = this.location;
			} else {
				this.selection = new Selection();
			}
			this.drawSelection();
			break;
		case 39: // Right arrow
			this.initialHorizontalCursorPosition = null;
			this.moveCursorRight();
			if ( this.shiftDown && this.keyboardSelecting ) {
				this.selection.to = this.location;
			} else {
				this.selection = new Selection();
			}
			this.drawSelection();
			break;
		case 40: // Down arrow
			this.moveCursorDown();
			if ( this.shiftDown && this.keyboardSelecting ) {
				this.selection.to = this.location;
			} else {
				this.selection = new Selection();
			}
			this.drawSelection();
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
			var surface = this;
			this.keydownTimeout = setTimeout( function () {
				var val = surface.$input.val();
				surface.$input.val( '' );
				if ( val.length > 0 ) {
					var location = surface.getLocation();
					location.block.insertContent( location.offset, val.split(''));
					location.offset += val.length;
					surface.selection = new Selection();
					surface.drawSelection();
				}
			}, 10 );
			break;
	}
	return true;
}

Surface.prototype.onKeyUp = function( e ) {
	switch ( e.keyCode ) {
		case 16: // Shift
			this.shiftDown = false;
			if ( this.keyboardSelecting ) {
				this.keyboardSelecting = false;
			}
			break;
		case 17: // Control
			this.ctrlDown = false;
			break;
		default:		
			var surface = this;
			setTimeout( function() {
				surface.cursor.show( surface.location.block.flow.getPosition( surface.location.offset ), surface.location.block.$.offset() );
			}, 0 );
			break;
	}
	return true;
}

Surface.prototype.handleBackspace = function() {
	var block = this.location.block,
		offset = this.location.offset;
		
	if ( offset > 0 ) {
		block.deleteContent( offset - 1, offset );
		offset--;
		this.cursor.show( block.flow.getPosition( offset ), block.$.offset() );
	}
	this.selection = new Selection();
	this.drawSelection();
	this.location = new Location( block, offset );
}

Surface.prototype.handleDelete = function() {
	var block = this.location.block,
		offset = this.location.offset;
	
	if ( offset < block.getLength() - 1 ) {	
		block.deleteContent( offset, offset + 1);
		this.cursor.show( block.flow.getPosition( offset ), block.$.offset() );
	}
	this.selection = new Selection();
	this.drawSelection();
	this.location = new Location( block, offset );
};

Surface.prototype.onMouseDown = function( e ) {
	if ( e.button === 0 ) {
		this.location = this.getLocationFromEvent( e );
		this.selection = new Selection( this.location );
		var cursorPosition = this.location.block.getPosition( this.location.offset );
		this.cursor.show( cursorPosition, this.location.block.$.offset() );
		this.$input.css( 'top', cursorPosition.top );
		this.mouseSelecting = true;
		this.drawSelection();
		this.cursor.show();
	}
	this.initialHorizontalCursorPosition = null;
	if ( !this.$input.is(':focus') ) {
		this.$input.focus();
	}
	return false;
};

Surface.prototype.onMouseMove = function( e ) {
	if ( e.button === 0 && this.mouseSelecting ) {
		this.cursor.hide();
		this.selection.to = this.getLocationFromEvent( e );
		this.drawSelection();
	}
};

Surface.prototype.onMouseUp = function( e ) {
	if ( e.button === 0 && this.selection.to ) {
		this.location = this.selection.to;
		this.drawSelection();
		this.cursor.hide();
	}
	this.mouseSelecting = false;
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
	var block = this.location.block,
		offset = this.location.offset,
		position = block.getPosition( offset );
		
	if ( this.initialHorizontalCursorPosition ) {
		position.left = this.initialHorizontalCursorPosition;
	} else {
		this.initialHorizontalCursorPosition = position.left;
	}
		
	position.top = position.top - 1;
	if ( position.top < 0 ) {
		var previousBlock = block.previousBlock();
		if ( previousBlock ) {
			block = previousBlock;
			position.top += block.$.height();
		}
	}
	offset = block.getOffset( position );
	position = block.getPosition( offset );
	this.cursor.show( position, block.$.offset() );
	
	this.location = new Location( block, offset );
};

/**
 * Moves the cursor to the nearest location directly below the current flowed line.
 */
Surface.prototype.moveCursorDown = function() {
	var block = this.location.block,
		offset = this.location.offset,
		position = block.getPosition( offset );

	if ( this.initialHorizontalCursorPosition ) {
		position.left = this.initialHorizontalCursorPosition;
	} else {
		this.initialHorizontalCursorPosition = position.left;
	}

	position.top = position.bottom + 1;
	if ( position.top > block.$.height() ) {
		var nextBlock = block.nextBlock();
		if ( nextBlock ) {
			position.top -= block.$.height();
			block = nextBlock;
		}
	}
	offset = block.getOffset( position );
	position = block.getPosition( offset );
	this.cursor.show( position, block.$.offset() );
	
	this.location = new Location( block, offset );
};

/**
 * Moves the cursor backward of the current position.
 */
Surface.prototype.moveCursorRight = function() {
	var block = this.location.block,
		offset = this.location.offset;
	
	if ( offset < block.getLength() ) {
		offset++;
	} else {
		var next = block.nextBlock();
		if ( next ) {
			block = next;
			offset = 0;
		}
	}
	this.cursor.show(
		block.flow.getPosition( offset ),
		block.$.offset()
	);
	
	this.location = new Location( block, offset );
};

/**
 * Moves the cursor forward of the current position.
 */
Surface.prototype.moveCursorLeft = function() {
	var block = this.location.block,
		offset = this.location.offset;

	if ( offset > 0 ) {
		offset--;
	} else {
		var previous = block.previousBlock();
		if ( previous ) {
			block = previous;
			offset = block.getLength();
		}
	}
	this.cursor.show(
		block.flow.getPosition( offset ),
		block.$.offset()
	);
	
	this.location = new Location( block, offset );
};

/**
 * Updates the rendered view.
 * 
 * @param offset Location: Where to start re-flowing from (optional)
 */
Surface.prototype.render = function( offset, callback ) {
	if ( !this.rendered ) {
		this.rendered = true;
		this.$.append( this.doc.$ );
		this.doc.renderBlocks( offset, callback );
	} else {
		this.doc.updateBlocks( offset, callback );
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
	var surface = this;
	if ( selection.from && selection.to ) {
		selection.normalize();
		var from = selection.start,
			to = selection.end;
		if ( from.block === to.block ) {
			// Single block annotation
			from.block.annotateContent( annotation, from.offset, to.offset );
			from.block.renderContent( function() {
				surface.drawSelection();
			} );
		} else {
			// Multiple block annotation
			for ( var i = from.block.getIndex(), end = to.block.getIndex(); i <= end; i++ ) {
				var block = this.doc.blocks[i];
				if ( block === from.block ) {
					// From offset to length
					block.annotateContent( annotation, from.offset, block.getLength() );
					block.renderContent( function() {
						surface.drawSelection();
					} );
				} else if ( block === to.block ) {
					// From 0 to offset
					block.annotateContent( annotation, 0, to.offset );
					block.renderContent( function() {
						surface.drawSelection();
					} );
				} else {
					// Full coverage
					block.annotateContent( annotation, 0, block.getLength() );
					block.renderContent( function() {
						surface.drawSelection();
					} );
				}
			}
		}
	}
};
