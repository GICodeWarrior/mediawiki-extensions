/**
 * Wikitext document editing surface.
 * 
 * TODO: Cleanup code and comments
 * 
 * @class
 * @constructor
 * @param $container {jQuery}
 * @param doc {es.Document}
 * @property $ {jQuery}
 * @property doc {es.Document}
 * @property location {es.Location}
 * @property selection {es.Selection}
 * @property initialHorizontalPosition {Integer}
 * @property mouse {Object}
 * @property keyboard {Object}
 * @property $ranges {jQuery}
 * @property $rangeStart {jQuery}
 * @property $rangeFill {jQuery}
 * @property $rangeEnd {jQuery}
 * @property cursor {es.Cursor}
 * @property $input {jQuery}
 */
es.Surface = function( $container, doc ) {
	var surface = this;
	
	this.$ = $container.addClass( 'editSurface' );
	this.doc = doc;
	this.location = null;
	this.selection = new es.Selection();
	this.initialHorizontalCursorPosition = null;
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
		'keydownTimeout': null,
		'keys': {
			'shift': false,
			'control': false,
			'command': false,
			'alt': false
		}
	};
	
	// MouseDown on surface
	this.$.bind( {
		'mousedown' : function(e) {
			return surface.onMouseDown( e );
		}
	} );
	
	// Selection
	this.$ranges = $( '<div class="editSurface-ranges"></div>' ).prependTo( this.$ );
	this.$rangeStart = $( '<div class="editSurface-range"></div>' ).appendTo( this.$ranges );
	this.$rangeFill = $( '<div class="editSurface-range"></div>' ).appendTo( this.$ranges );
	this.$rangeEnd = $( '<div class="editSurface-range"></div>' ).appendTo( this.$ranges );
	
	// Cursor
	this.cursor = new es.Cursor();
	this.$.append( this.cursor.$ );
	
	// Hidden input
	var $document = $(document);
	this.$input = $( '<input class="editSurface-input" />' )
		.prependTo( this.$ )
		.bind( {
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
			},
			'cut': function( e ) {
				return surface.onCut( e );			
			},
			'copy': function( e ) {
				return surface.onCopy( e );			
			},
			'paste': function( e ) {
				return surface.onPaste( e );			
			}
		} );
	
	$(window).resize( function() {
		surface.cursor.hide();
		surface.doc.renderBlocks();
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

es.Surface.prototype.getLocationFromEvent = function( e ) {
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
		mousePosition = new es.Position( e.pageX - blockPosition.left, e.pageY - blockPosition.top );
	return new es.Location( block, block.getOffset( mousePosition ) );
};

es.Surface.prototype.onKeyDown = function( e ) {
	switch ( e.keyCode ) {
		case 16: // Shift
			this.keyboard.keys.shift = true;
			if ( !this.keyboard.selecting ) {
				this.keyboard.selecting = true;
				if ( !this.selection.to ) {
					this.selection = new es.Selection( this.location );
				}
				this.drawSelection();
			}
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
		case 37: // Left arrow
			this.initialHorizontalCursorPosition = null;
			this.moveCursorLeft();
			if ( this.keyboard.keys.shift && this.keyboard.selecting ) {
				this.selection.to = this.location;
			} else {
				this.selection = new es.Selection();
			}
			this.drawSelection();
			break;
		case 38: // Up arrow
			this.moveCursorUp();
			if ( this.keyboard.keys.shift && this.keyboard.selecting ) {
				this.selection.to = this.location;
			} else {
				this.selection = new es.Selection();
			}
			this.drawSelection();
			break;
		case 39: // Right arrow
			this.initialHorizontalCursorPosition = null;
			this.moveCursorRight();
			if ( this.keyboard.keys.shift && this.keyboard.selecting ) {
				this.selection.to = this.location;
			} else {
				this.selection = new es.Selection();
			}
			this.drawSelection();
			break;
		case 40: // Down arrow
			this.moveCursorDown();
			if ( this.keyboard.keys.shift && this.keyboard.selecting ) {
				this.selection.to = this.location;
			} else {
				this.selection = new es.Selection();
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
			if ( this.keyboard.keys.control || this.keyboard.keys.alt || this.keyboard.keys.command ) {
				break;
			}
			this.initialHorizontalCursorPosition = null;
			this.cursor.hide();
			if ( this.keyboard.keydownTimeout ) {
				clearTimeout( this.keyboard.keydownTimeout );
			}
			var surface = this;
			this.keyboard.keydownTimeout = setTimeout( function () {
				surface.insertFromInput();
			}, 10 );
			break;
	}
	return true;
};

es.Surface.prototype.insertFromInput = function() {
	var val = this.$input.val();
	this.$input.val( '' );
	if ( val.length > 0 ) {
		if ( this.selection.from && this.selection.to ) {
			var deleteSelection = this.selection;
			deleteSelection.normalize();
			this.location = this.selection.start;
			this.deleteContent( deleteSelection );
		}
		var insertLocation = this.location;
		this.selection = new es.Selection();
		this.location = new es.Location(
			this.location.block, this.location.offset + val.length
		);
		this.insertContent( insertLocation, val.split('') );
	}
};

es.Surface.prototype.onCut = function( e ) {
	// TODO: Keep a Content object copy of the selection
};

es.Surface.prototype.onCopy = function( e ) {
	// TODO: Keep a Content object copy of the selection
};

es.Surface.prototype.onPaste = function( e ) {
	// TODO: If clipboard data is same as previous copy, use the Content object version
	var surface = this;
	// Catch content just AFTER paste
	setTimeout( function() {
		surface.insertFromInput();
	}, 0 );
};

es.Surface.prototype.onKeyUp = function( e ) {
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

es.Surface.prototype.handleBackspace = function() {
	if ( this.selection.from && this.selection.to ) {
		var deleteSelection = this.selection;
		deleteSelection.normalize();
		this.location = this.selection.start;
		this.selection = new es.Selection();
		this.deleteContent( deleteSelection );
	} else if ( this.location.offset > 0 ) {
		var deleteSelection = new es.Selection(
			new es.Location( this.location.block, this.location.offset - 1 ), this.location
		);
		deleteSelection.normalize();
		this.selection = new es.Selection();
		this.location = deleteSelection.start;
		this.deleteContent( deleteSelection );
	}
};

es.Surface.prototype.handleDelete = function() {
	if ( this.selection.from && this.selection.to ) {
		var deleteSelection = this.selection;
		deleteSelection.normalize();
		this.location = this.selection.start;
		this.selection = new es.Selection();
		this.deleteContent( deleteSelection );
	} else if ( this.location.offset < this.location.block.getLength() ) {
		var deleteSelection = new es.Selection(
			new es.Location( this.location.block, this.location.offset + 1 ), this.location
		);
		deleteSelection.normalize();
		this.selection = new es.Selection();
		this.location = deleteSelection.start;
		this.deleteContent( deleteSelection );
	}
};

es.Surface.prototype.onMouseDown = function( e ) {
	if ( e.button === 0 ) {
		clearTimeout( this.mouse.clickTimeout );
		var clickPosition = es.Position.newFromEventPagePosition( e );
		if ( this.mouse.clickPosition &&
				clickPosition.near( this.mouse.clickPosition, this.mouse.hotSpotRadius ) ) {
			// Same location, keep counting
			this.mouse.clicks++;
			var surface = this;
			this.mouse.clickTimeout = setTimeout( function() {
				surface.mouse.clicks = 0;
				surface.mouse.clickPosition = null;
			}, this.mouse.clickDelay );
		} else {
			// New location, start over
			this.mouse.clicks = 1;
			this.mouse.clickPosition = clickPosition;
		}
		this.location = this.getLocationFromEvent( e );
		switch ( this.mouse.clicks ) {
			case 1:
				if ( this.keyboard.keys.shift ) {
					this.selection = new es.Selection( this.selection.from, this.location );
				} else {
					// Clear selection and move cursor to nearest offset
					this.selection = new es.Selection( this.location );
				}
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
				this.selection = new es.Selection(
					new es.Location( this.location.block, boundaries.start ),
					new es.Location( this.location.block, boundaries.end )
				);
				this.drawSelection();
				break;
			case 3:
				// Select section within block offset is within
				var boundaries = this.location.block.getSectionBoundaries( this.location.offset );
				this.selection = new es.Selection(
					new es.Location( this.location.block, boundaries.start ),
					new es.Location( this.location.block, boundaries.end )
				);
				this.drawSelection();
				break;
		}
	}
	this.initialHorizontalCursorPosition = null;
	if ( !this.$input.is(':focus') ) {
		this.$input.focus().select();
	}
	return false;
};

es.Surface.prototype.onMouseMove = function( e ) {
	if ( e.button === 0 && this.mouse.selecting ) {
		this.cursor.hide();
		this.selection.to = this.getLocationFromEvent( e );
		this.drawSelection();
	}
};

es.Surface.prototype.onMouseUp = function( e ) {
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
es.Surface.prototype.drawSelection = function() {
	var blockWidth,
		text = '';
	
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
			text += from.location.block.getText(
				new es.Range( from.location.offset, to.location.offset )
			);
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
			// TODO: Get text from multiple-block selection
		}
		this.$input.val( text ).select();
		this.$ranges.show();
		return true;
	}
	this.$input.val( text ).select();
	this.$ranges.hide();
	return false;
};

/**
 * Sets the selection to a new es.Range.
 * 
 * @param from {es.Selection} Selection to apply
 */
es.Surface.prototype.setSelection = function( selection ) {
	this.selection = selection;
};

/**
 * Gets the current document selection.
 * 
 * @returns {es.Selection}
 */
es.Surface.prototype.getSelection = function() {
	return this.selection;
};

/**
 * Gets the current cursor location.
 * 
 * @returns {es.Location}
 */
es.Surface.prototype.getLocation = function() {
	return this.location;
};

/**
 * Moves the cursor to the nearest location directly above the current flowed line.
 */
es.Surface.prototype.moveCursorUp = function() {
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
	
	this.location = new es.Location( block, offset );
};

/**
 * Moves the cursor to the nearest location directly below the current flowed line.
 */
es.Surface.prototype.moveCursorDown = function() {
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
	
	this.location = new es.Location( block, offset );
};

/**
 * Moves the cursor forward of the current position.
 */
es.Surface.prototype.moveCursorRight = function() {
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
		block.getPosition( offset ),
		block.$.offset()
	);
	
	this.location = new es.Location( block, offset );
};

/**
 * Moves the cursor backward of the current position.
 */
es.Surface.prototype.moveCursorLeft = function() {
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
		block.getPosition( offset ),
		block.$.offset()
	);
	
	this.location = new es.Location( block, offset );
};

es.Surface.prototype.insertContent = function( location, content ) {
	if ( typeof location === 'undefined' ) {
		location = this.location;
	}
	if ( typeof location.block === 'undefined' || typeof location.offset === 'undefined' ) {
		throw 'Invalid selection error. Properties for from and to locations expected.';
	}
	this.location.block.insertContent( location.offset, content );
};

es.Surface.prototype.deleteContent = function( selection ) {
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
		from.block.deleteContent( new es.Range( from.offset, to.offset ) );
	} else {
		// Multiple block deletion
		var block;
		for ( var i = from.block.getIndex(), end = to.block.getIndex(); i <= end; i++ ) {
			block = this.doc.blocks[i];
			if ( block === from.block ) {
				// From offset to length
				block.deleteContent( new es.Range( from.offset, block.getLength() ) );
			} else if ( block === to.block ) {
				// From 0 to offset
				block.deleteContent( new es.Range( 0, to.offset ) );
			} else {
				// Full coverage
				block.deleteContent( new es.Range( 0, block.getLength() ) );
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
 * @param selection {es.Selection} Range to apply annotation to
 */
es.Surface.prototype.annotateContent = function( method, annotation, selection ) {
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
		from.block.annotateContent( method, annotation, new es.Range( from.offset, to.offset ) );
	} else {
		// Multiple block annotation
		var block;
		for ( var i = from.block.getIndex(), end = to.block.getIndex(); i <= end; i++ ) {
			block = this.doc.blocks[i];
			if ( block === from.block ) {
				// From offset to length
				block.annotateContent(
					method, annotation, new es.Range( from.offset, block.getLength() )
				);
			} else if ( block === to.block ) {
				// From 0 to offset
				block.annotateContent( method, annotation, new es.Range( 0, to.offset ) );
			} else {
				// Full coverage
				block.annotateContent( method, annotation, new es.Range( 0, block.getLength() ) );
			}
		}
	}
};
