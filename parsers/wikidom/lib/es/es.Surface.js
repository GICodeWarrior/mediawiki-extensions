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
	this.location = null;
	this.selection = new Selection();
	this.initialHorizontalCursorPosition = null;
	this.mouse = {
		'selecting': false,
		'clicks': 0,
		'clickDelay': 500,
		'clickTimeout': null,
		'clickX': null,
		'clickY': null
	};
	this.keyboard = {
		'selecting': false,
		'keydownTimeout': null
	};
	
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
	var $document = $(document);
	this.$input = $( '<input class="editSurface-input" />' )
		.prependTo( this.$ )
		.bind({
			'focus' : function() {
				$(document).bind({
					'mousemove.editSurface' : function(e) {
						return surface.onMouseMove( e );
					},
					'mouseup.editSurface' : function(e) {
						return surface.onMouseUp( e );
					},
					'keydown.editSurface' : function( e ) {
						return surface.onKeyDown( e );			
					},
					'keyup.editSurface' : function( e ) {
						return surface.onKeyUp( e );			
					},
				});
			},
			'blur': function( e ) {
				$document.unbind('.editSurface');
				surface.cursor.hide();
			}
		});
	
	$(window).resize( function() {
		surface.cursor.hide();
		surface.doc.updateBlocks();
	} );
	
	this.doc.on( 'update', function() {
		if ( surface.location && surface.location.block && !surface.drawSelection() ) {
			surface.cursor.show(
				surface.location.block.getPosition( surface.location.offset ),
				surface.location.block.$.offset()
			);
		}
	} );
	
	// First render
	this.$.append( this.doc.$ );
	this.doc.renderBlocks();
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
	var block = $block.data( 'block' ),
		blockPosition = $block.offset(),
		mousePosition = new Position( e.pageX - blockPosition.left, e.pageY - blockPosition.top );
	return new Location( block, block.getOffset( mousePosition ) );
};

Surface.prototype.onKeyDown = function( e ) {
	switch ( e.keyCode ) {
		case 16: // Shift
			this.shiftDown = true;
			if ( !this.keyboard.selecting ) {
				this.keyboard.selecting = true;
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
			if ( this.shiftDown && this.keyboard.selecting ) {
				this.selection.to = this.location;
			} else {
				this.selection = new Selection();
			}
			this.drawSelection();
			break;
		case 38: // Up arrow
			this.moveCursorUp();
			if ( this.shiftDown && this.keyboard.selecting ) {
				this.selection.to = this.location;
			} else {
				this.selection = new Selection();
			}
			this.drawSelection();
			break;
		case 39: // Right arrow
			this.initialHorizontalCursorPosition = null;
			this.moveCursorRight();
			if ( this.shiftDown && this.keyboard.selecting ) {
				this.selection.to = this.location;
			} else {
				this.selection = new Selection();
			}
			this.drawSelection();
			break;
		case 40: // Down arrow
			this.moveCursorDown();
			if ( this.shiftDown && this.keyboard.selecting ) {
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
			if ( this.keyboard.keydownTimeout ) {
				clearTimeout( this.keyboard.keydownTimeout );
			}
			var surface = this;
			this.keyboard.keydownTimeout = setTimeout( function () {
				var val = surface.$input.val();
				surface.$input.val( '' );
				if ( val.length > 0 ) {
					if ( surface.selection.from && surface.selection.to ) {
						var deleteSelection = surface.selection;
						deleteSelection.normalize();
						surface.location = surface.selection.start;
						surface.deleteContent( deleteSelection );
					}
					var insertLocation = surface.location;
					surface.selection = new Selection();
					surface.location = new Location(
						surface.location.block, surface.location.offset + val.length
					);
					surface.insertContent( insertLocation, val.split('') );
				}
			}, 10 );
			break;
	}
	return true;
};

Surface.prototype.onKeyUp = function( e ) {
	switch ( e.keyCode ) {
		case 16: // Shift
			this.shiftDown = false;
			if ( this.keyboard.selecting ) {
				this.keyboard.selecting = false;
			}
			break;
		case 17: // Control
			this.ctrlDown = false;
			break;
		default:		
			var surface = this;
			setTimeout( function() {
				//surface.cursor.show( surface.location.block.flow.getPosition( surface.location.offset ), surface.location.block.$.offset() );
			}, 0 );
			break;
	}
	return true;
};

Surface.prototype.handleBackspace = function() {
	if ( this.selection.from && this.selection.to ) {
		var deleteSelection = this.selection;
		deleteSelection.normalize();
		this.location = this.selection.start;
		this.selection = new Selection();
		this.deleteContent( deleteSelection );
	} else if ( this.location.offset > 0 ) {
		var deleteSelection = new Selection(
			new Location( this.location.block, this.location.offset - 1 ), this.location
		);
		this.selection = new Selection();
		this.location = deleteSelection.from;
		this.deleteContent( deleteSelection );
	}
};

Surface.prototype.handleDelete = function() {
	if ( this.selection.from && this.selection.to ) {
		var deleteSelection = this.selection;
		deleteSelection.normalize();
		this.location = this.selection.end;
		this.selection = new Selection();
		this.deleteContent( deleteSelection );
	} else if ( this.location.offset < block.getLength() - 1 ) {
		var deleteSelection = new Selection(
			new Location( this.location.block, this.location.offset + 1 ), this.location
		);
		this.selection = new Selection();
		this.location = deleteSelection.from;
		this.deleteContent( deleteSelection );
	}
};

Surface.prototype.onMouseDown = function( e ) {
	if ( e.button === 0 ) {
		clearTimeout( this.mouse.clickTimeout );
		if ( this.mouse.clickX === e.pageX && this.mouse.clickY === e.pageY ) {
			// Same location, keep counting
			this.mouse.clicks++;
			var surface = this;
			this.mouse.clickTimeout = setTimeout( function() {
				surface.mouse.clicks = 0;
			}, this.mouse.clickDelay );
		} else {
			// New location, start over
			this.mouse.clicks = 1;
			this.mouse.clickX = e.pageX;
			this.mouse.clickY = e.pageY;
		}
		this.location = this.getLocationFromEvent( e );
		switch ( this.mouse.clicks ) {
			case 1:
				// Clear selection and move cursor to nearest offset
				this.selection = new Selection( this.location );
				var cursorPosition = this.location.block.getPosition( this.location.offset );
				this.cursor.show( cursorPosition, this.location.block.$.offset() );
				this.$input.css( 'top', cursorPosition.top );
				this.mouse.selecting = true;
				this.drawSelection();
				this.cursor.show();
				break;
			case 2:
				// Select word offset is within
				var boundaries = this.location.block.getWordBoundaries( this.location.offset );
				this.selection = new Selection(
					new Location( this.location.block, boundaries.start ),
					new Location( this.location.block, boundaries.end )
				);
				this.drawSelection();
				break;
			case 3:
				// Select section within block offset is within
				var boundaries = this.location.block.getSectionBoundaries( this.location.offset );
				this.selection = new Selection(
					new Location( this.location.block, boundaries.start ),
					new Location( this.location.block, boundaries.end )
				);
				this.drawSelection();
				break;
		}
	}
	this.initialHorizontalCursorPosition = null;
	if ( !this.$input.is(':focus') ) {
		this.$input.focus();
	}
	return false;
};

Surface.prototype.onMouseMove = function( e ) {
	if ( e.button === 0 && this.mouse.selecting ) {
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
	this.mouse.selecting = false;
};

/**
 * Displays current selection behind document content.
 * 
 * @return {Boolean} If selection is visibly painted
 */
Surface.prototype.drawSelection = function() {
	var blockWidth;

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
				blockWidth = block.$.width();
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
			blockWidth = Math.max(
					from.location.block.$.width(),
					to.location.block.$.width()
				);
			var fromBlockOffset = from.location.block.$.offset(),
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
		return true;
	}
	this.$ranges.hide();
	return false;
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

Surface.prototype.insertContent = function( location, content ) {
	if ( typeof location === 'undefined' ) {
		location = this.location;
	}
	if ( !location.block || !location.offset ) {
		throw 'Invalid selection error. Properties for from and to locations expected.';
	}
	this.location.block.insertContent( location.offset, content );
};

Surface.prototype.deleteContent = function( selection ) {
	if ( typeof selection === 'undefined' ) {
		selection = this.selection;
	}
	if ( !selection.from || !selection.to ) {
		throw 'Invalid selection error. Properties for from and to locations expected.';
	}
	selection.normalize();
	var from = selection.start,
		to = selection.end;
	if ( from.block === to.block ) {
		// Single block deletion
		from.block.deleteContent( from.offset, to.offset );
	} else {
		// Multiple block deletion
		var block;
		for ( var i = from.block.getIndex(), end = to.block.getIndex(); i <= end; i++ ) {
			block = this.doc.blocks[i];
			if ( block === from.block ) {
				// From offset to length
				block.deleteContent( from.offset, block.getLength() );
			} else if ( block === to.block ) {
				// From 0 to offset
				block.deleteContent( 0, to.offset );
			} else {
				// Full coverage
				block.deleteContent( 0, block.getLength() );
			}
		}
	}
	// TODO: Merge first and last blocks that have been deleted from and remove blocks that have
	// been cleared entirely
};

/**
 * Applies an annotation to a given selection.
 * 
 * If a selection argument is not provided, the current selection will be annotated.
 * 
 * @param method {String} Way to apply annotation ("toggle", "add" or "remove")
 * @param annotation {Object} Annotation to apply
 * @param selection {Selection} Range to apply annotation to
 */
Surface.prototype.annotateContent = function( method, annotation, selection ) {
	if ( typeof selection === 'undefined' ) {
		selection = this.selection;
	}
	if ( !selection.from || !selection.to ) {
		throw 'Invalid selection error. Properties for from and to locations expected.';
	}
	selection.normalize();
	var from = selection.start,
		to = selection.end;
	if ( from.block === to.block ) {
		// Single block annotation
		from.block.annotateContent( method, annotation, from.offset, to.offset );
	} else {
		// Multiple block annotation
		var block;
		for ( var i = from.block.getIndex(), end = to.block.getIndex(); i <= end; i++ ) {
			block = this.doc.blocks[i];
			if ( block === from.block ) {
				// From offset to length
				block.annotateContent( method, annotation, from.offset, block.getLength() );
			} else if ( block === to.block ) {
				// From 0 to offset
				block.annotateContent( method, annotation, 0, to.offset );
			} else {
				// Full coverage
				block.annotateContent( method, annotation, 0, block.getLength() );
			}
		}
	}
};
