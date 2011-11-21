/**
 * Creates an es.SurfaceView object.
 * 
 * @class
 * @constructor
 * @param {jQuery} $container DOM Container to render surface into
 * @param {es.SurfaceModel} model Surface model to view
 */
es.SurfaceView = function( $container, model ) {
	// References for use in closures
	var	_this = this,
		$document = $( document );

	es.EventEmitter.call( this );

	this.$ = $container.addClass( 'es-surfaceView' );
	this.$window = $( window );
	this.model = model;
	this.selection = new es.Range();

	// Mac uses different mapping for keyboard shortcuts	
	this.mac = navigator.userAgent.match(/mac/i) ? true : false;

	this.model.getDocument().on( 'update', function() {
		_this.emit( 'update' );
	} );

	this.previousSelection = null;
	this.emitSelect = function() {
		if ( _this.previousSelection ) {
			if (
				_this.previousSelection.from !== _this.selection.from || 
				_this.previousSelection.to !== _this.selection.to
			) {
				_this.emit( 'select', _this.selection.clone() );
				_this.previousSelection = _this.selection.clone();
			}
			// Mouse movement that doesn't change selection points will terminate here
		} else {
			_this.previousSelection = _this.selection.clone();
		}
	};

	// Initialize document view
	this.documentView = new es.DocumentView( this.model.getDocument(), this );
	this.$.append( this.documentView.$ );

	// History
	this.history = new es.HistoryModel( this.documentView.getModel() );

	// Interaction state
	
	// There are three different selection modes available for mouse. Selection of:
	// * 1 - chars
	// * 2 - words
	// * 3 - nodes (e.g. paragraph, listitem)
	//
	// In case of 2 and 3 selectedRange stores the range of original selection caused by double
	// or triple mousedowns.
	this.mouse = {
		selectingMode: null,
		selectedRange: null
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
		keys: { shift: false }
	};

	// MouseDown and DoubleClick on surface
	this.$.on( {
		'mousedown' : function(e) {
			return _this.onMouseDown( e );
		}
	} );

	// Hidden input
	this.$input = $( '<textarea class="es-surfaceView-textarea" />' )
		.prependTo( this.$ )
		.on( {
			'focus' : function() {
				$document.off( '.es-surfaceView' );
				$document.on({
					'mousemove.es-surfaceView': function(e) {
						return _this.onMouseMove( e );
					},
					'mouseup.es-surfaceView': function(e) {
						return _this.onMouseUp( e );
					},
					'keydown.es-surfaceView': function( e ) {
						return _this.onKeyDown( e );			
					},
					'keyup.es-surfaceView': function( e ) {
						return _this.onKeyUp( e );		
					}
				});
			},
			'blur': function( e ) {
				$document.off( '.es-surfaceView' );
				_this.hideCursor();
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
	// TODO: Instead of re-rendering on every single 'resize' event wait till user is done with
	// resizing - can be implemented with setTimeout
	this.$window.resize( function() {
		_this.hideCursor();
		_this.dimensions.height = _this.$window.height();
		var width = _this.$.width();
		if ( _this.dimensions.width !== width ) {
			_this.dimensions.width = width;
			_this.documentView.renderContent();
		}
	} );

	this.$window.scroll( function() {
		_this.dimensions.scrollTop = _this.$window.scrollTop();
	} );
};

/* Methods */

es.SurfaceView.prototype.onMouseDown = function( e ) {
	if ( e.button === 0 ) { // left mouse button

		this.selection.normalize();

		var offset = this.documentView.getOffsetFromEvent( e );

		if ( e.originalEvent.detail === 1 ) { // single click
			this.mouse.selectingMode = 1; // used in mouseMove handler

			if ( this.keyboard.keys.shift && offset !== this.selection.from ) {
				// extend current or create new selection
				this.selection.to = offset;
			} else {
				if ( this.selection.to !== this.selection.from ) {
					// clear the selection if there was any
					this.documentView.clearSelection();
				}
				this.selection.from = this.selection.to = offset;

				var	position = es.Position.newFromEventPagePosition( e ),
					nodeView = this.documentView.getNodeFromOffset( offset, false );
				this.cursor.initialBias = position.left > nodeView.contentView.$.offset().left;
			}

		} else if ( e.originalEvent.detail === 2 ) { // double click
			this.mouse.selectingMode = 2; // used in mouseMove handler
			
			var wordRange = this.documentView.getModel().getWordBoundaries( offset );
			if( wordRange ) {
				this.selection = wordRange;
				this.mouse.selectedRange = this.selection.clone();
			}

		} else if ( e.originalEvent.detail >= 3 ) { // triple click
			this.mouse.selectingMode = 3; // used in mouseMove handler

			var node = this.documentView.getNodeFromOffset( offset ),
				nodeOffset = this.documentView.getOffsetFromNode( node, false );

			this.selection.from = this.documentView.getModel().getRelativeContentOffset(
				nodeOffset,
				1
			);
			this.selection.to = this.documentView.getModel().getRelativeContentOffset(
				nodeOffset + node.getElementLength(),
				-1
			);
			this.mouse.selectedRange = this.selection.clone();
		}

		if ( this.selection.from === this.selection.to ) {
			this.showCursor();
		} else {
			this.hideCursor();
			this.documentView.drawSelection( this.selection );
		}
	}

	if ( !this.$input.is( ':focus' ) ) {
		this.$input.focus().select();
	}
	this.cursor.initialLeft = null;
	this.emitSelect();
	return false;
};

es.SurfaceView.prototype.onMouseMove = function( e ) {
	if ( e.button === 0 && this.mouse.selectingMode ) { // left mouse button and in selecting mode

		var offset = this.documentView.getOffsetFromEvent( e );

		if ( this.mouse.selectingMode === 1 ) { // selection of chars
			this.selection.to = offset;
		} else if ( this.mouse.selectingMode === 2 ) { // selection of words
			var wordRange = this.documentView.getModel().getWordBoundaries( offset );
			if ( wordRange ) {
				if ( wordRange.to <= this.mouse.selectedRange.from ) {
					this.selection.from = wordRange.from;
					this.selection.to = this.mouse.selectedRange.to;
				} else {
					this.selection.from = this.mouse.selectedRange.from;
					this.selection.to = wordRange.to;
				}
			} else {
				this.selection.to = offset;
			}
		} else if ( this.mouse.selectingMode === 3 ) {

			this.mouse.selectingMode = 3; // used in mouseMove handler

			var nodeRange = this.documentView.getRangeFromNode(
				this.documentView.getNodeFromOffset( offset )
			);
			if ( nodeRange.to <= this.mouse.selectedRange.from ) {
				this.selection.from = this.documentView.getModel().getRelativeContentOffset(
					nodeRange.from,
					1
				);
				this.selection.to = this.mouse.selectedRange.to;
			} else {
				this.selection.from = this.mouse.selectedRange.from;
				this.selection.to = this.documentView.getModel().getRelativeContentOffset(
					nodeRange.to,
					-1
				);
			}	
		}

		this.emitSelect();
		
		this.documentView.drawSelection( this.selection );
		if ( this.selection.from !== this.selection.to ) {
			this.hideCursor();
		}
	}
};

es.SurfaceView.prototype.onMouseUp = function( e ) {
	if ( e.button === 0 ) { // left mouse button 
		this.mouse.selectingMode = this.mouse.selectedRange = null;
	}
};

es.SurfaceView.prototype.onKeyDown = function( e ) {
	this.selection.normalize();

	switch ( e.keyCode ) {
		case 16: // Shift
			this.keyboard.keys.shift = true;
			this.keyboard.selecting = true;
			break;
		case 36: // Home
			this.moveCursor( 'left', 'line' );
			break;
		case 35: // End
			this.moveCursor( 'right', 'line' );
			break;
		case 37: // Left arrow
			if ( !this.mac ) {
				if ( e.ctrlKey ) {
					this.moveCursor( 'left', 'word' );
				} else {
					this.moveCursor( 'left', 'char' );
				}
			} else {
				if ( e.metaKey || e.ctrlKey ) {
					this.moveCursor( 'left', 'line' );
				} else  if ( e.altKey ) {
					this.moveCursor( 'left', 'word' );
				} else {
					this.moveCursor( 'left', 'char' );
				}
			}
			break;
		case 38: // Up arrow
			if ( !this.mac ) {
				if ( e.ctrlKey ) {
					this.moveCursor( 'up', 'unit' );
				} else {
					this.moveCursor( 'up', 'char' );
				}
			} else {
				if ( e.altKey ) {
					this.moveCursor( 'up', 'unit' );
				} else {
					this.moveCursor( 'up', 'char' );
				}
			}
			break;
		case 39: // Right arrow
			if ( !this.mac ) {
				if ( e.ctrlKey ) {
					this.moveCursor( 'right', 'word' );
				} else {
					this.moveCursor( 'right', 'char' );
				}
			} else {
				if ( e.metaKey || e.ctrlKey ) {
					this.moveCursor( 'right', 'line' );
				} else  if ( e.altKey ) {
					this.moveCursor( 'right', 'word' );
				} else {
					this.moveCursor( 'right', 'char' );
				}
			}
			break;
		case 40: // Down arrow
			if ( !this.mac ) {
				if ( e.ctrlKey ) {
					this.moveCursor( 'down', 'unit' );
				} else {
					this.moveCursor( 'down', 'char' );
				}
			} else {
				if ( e.altKey ) {
					this.moveCursor( 'down', 'unit' );
				} else {
					this.moveCursor( 'down', 'char' );
				}
			}
			break;
		case 8: // Backspace
			this.handleDelete( true );
			break;
		case 46: // Delete
			this.handleDelete();
			break;
		case 13: // Enter
			this.handleEnter();
			e.preventDefault();
			break;
		case 90: // z (undo)
			if ( e.ctrlKey ) {
				this.history.undo();
				break;
			}
		case 89: // y (redo)
			if ( e.ctrlKey ) {
				this.history.redo();
				break;
			}
		default: // Insert content (maybe)
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

es.SurfaceView.prototype.onKeyUp = function( e ) {
	switch ( e.keyCode ) {
		case 16: // Shift
			this.keyboard.keys.shift = false;
			if ( this.keyboard.selecting ) {
				this.keyboard.selecting = false;
			}
			break;
		default:
			break;
	}
	return true;
};

es.SurfaceView.prototype.handleDelete = function( backspace ) {
	var	sourceOffset,
		targetOffset,
		sourceSplitableNode,
		targetSplitableNode,
		tx;
	if ( this.selection.from === this.selection.to ) {
		if ( backspace ) {
			sourceOffset = this.selection.to;
			targetOffset = this.documentView.getModel().getRelativeContentOffset(
				sourceOffset,
				-1
			);
		} else {
			sourceOffset = this.documentView.getModel().getRelativeContentOffset(
				this.selection.to,
				1
			);
			targetOffset = this.selection.to;
		}

		var	sourceNode = this.documentView.getNodeFromOffset( sourceOffset, false ),
			targetNode = this.documentView.getNodeFromOffset( targetOffset, false );
	
		if ( sourceNode.model.getElementType() === targetNode.model.getElementType() ) {
			sourceSplitableNode = es.DocumentViewNode.getSplitableNode( sourceNode );
			targetSplitableNode = es.DocumentViewNode.getSplitableNode( targetNode );
		}
	
		this.selection.from = this.selection.to = targetOffset;
		this.showCursor();
	
		if ( sourceNode === targetNode ||
			( typeof sourceSplitableNode !== 'undefined' &&
			sourceSplitableNode.getParent()  === targetSplitableNode.getParent() ) ) {
			tx = this.documentView.getModel().prepareRemoval(
				new es.Range( targetOffset, sourceOffset )
			);
			this.history.commit( tx );
		} else {
			tx = this.documentView.getModel().prepareInsertion(
				targetOffset, sourceNode.model.getContent()
			);
			this.history.commit( tx );
			
			var nodeToDelete = sourceNode;
			es.DocumentNode.traverseUpstream( nodeToDelete, function( node ) {
				if ( node.getParent().children.length === 1 ) {
					nodeToDelete = sourceNode.getParent();
				} else {
					return false;
				}
			} );
			var range = new es.Range();
			range.from = this.documentView.getOffsetFromNode( nodeToDelete, false );
			range.to = range.from + nodeToDelete.getElementLength();
			tx = this.documentView.getModel().prepareRemoval( range );
			this.history.commit( tx );
		}
	} else {
		// selection removal
		tx = this.documentView.getModel().prepareRemoval( this.selection );
		this.history.commit( tx );
		this.documentView.clearSelection();
		this.selection.from = this.selection.to = this.selection.start;
		this.showCursor();
	}
};

es.SurfaceView.prototype.handleEnter = function() {
	if ( this.selection.from !== this.selection.to ) {
		this.handleDelete();
	}
	var	node = this.documentView.getNodeFromOffset( this.selection.to, false ),
		nodeOffset = this.documentView.getOffsetFromNode( node, false );

	if (
		nodeOffset + node.getContentLength() + 1 === this.selection.to &&
		node ===  es.DocumentViewNode.getSplitableNode( node )
	) {
		var tx = this.documentView.model.prepareInsertion(
			nodeOffset + node.getElementLength(),
			[ { 'type': 'paragraph' }, { 'type': '/paragraph' } ]
		);
		this.history.commit( tx );
		this.selection.from = this.selection.to = nodeOffset + node.getElementLength() + 1;
		this.showCursor();		
	} else {
		var	stack = [],
			splitable = false;

		es.DocumentNode.traverseUpstream( node, function( node ) {
			var elementType = node.model.getElementType();
			if (
				splitable === true &&
				es.DocumentView.splitRules[ elementType ].children === true
			) {
				return false;
			}
			stack.splice(
				stack.length / 2,
				0,
				{ 'type': '/' + elementType },
				{
					'type': elementType,
					'attributes': es.copyObject( node.model.element.attributes )
				}
			);
			splitable = es.DocumentView.splitRules[ elementType ].self;
		} );
		var tx = this.documentView.model.prepareInsertion( this.selection.to, stack );
		this.history.commit( tx );
		this.selection.from = this.selection.to =
			this.documentView.getModel().getRelativeContentOffset( this.selection.to, 1 );
		this.showCursor();
	}
};

es.SurfaceView.prototype.insertFromInput = function() {
	var val = this.$input.val();
	this.$input.val( '' );
	if ( val.length > 0 ) {
		var tx;
		if ( this.selection.from != this.selection.to ) {
			tx = this.documentView.getModel().prepareRemoval( this.selection );
			this.history.commit( tx );
			this.documentView.clearSelection();
			this.selection.from = this.selection.to =
				Math.min( this.selection.from, this.selection.to );
		}
		tx = this.documentView.getModel().prepareInsertion( this.selection.from, val.split('') );
		this.history.commit( tx );
		this.selection.from += val.length;
		this.selection.to += val.length;
		this.showCursor();
	}
};

/**
 * @param {String} direction up | down | left | right
 * @param {String} unit char | word | line | node | page
 */
es.SurfaceView.prototype.moveCursor = function( direction, unit ) {
	if ( direction !== 'up' && direction !== 'down' ) {
		this.cursor.initialLeft = null;
	}

	var to,
		offset;

	switch ( direction ) {
		case 'left':
		case 'right':
			switch ( unit ) {
				case 'char':
				case 'word':
					if ( this.keyboard.keys.shift || this.selection.from === this.selection.to ) {
						offset = this.selection.to;
					} else {
						offset = direction === 'left' ? this.selection.start : this.selection.end;
					}
					to = this.documentView.getModel().getRelativeContentOffset(
							offset,
							direction === 'left' ? -1 : 1
					);
					if ( unit === 'word' ) {
						var wordRange = this.documentView.getModel().getWordBoundaries(
							direction === 'left' ? to : offset
						);
						if ( wordRange ) {
							to = direction === 'left' ? wordRange.start : wordRange.end;
						}
					}
					break;
				case 'line':
					offset = this.cursor.initialBias ?
						this.documentView.getModel().getRelativeContentOffset(
							this.selection.to,
							-1) :
								this.selection.to;
					var range = this.documentView.getRenderedLineRangeFromOffset( offset );
					to = direction === 'left' ? range.start : range.end;
					break;
			}
			break;
		case 'up':
		case 'down':
			switch ( unit ) {
				case 'unit':
					var toNode = null;
					this.documentView.getModel().traverseLeafNodes(
						function( node  ) {
							if ( toNode === null) {
								toNode = node;
							} else {
								toNode = node;
								return false;
							}
						},
						this.documentView.getNodeFromOffset( this.selection.to, false ).getModel(),
						direction === 'up' ? true : false
					);
					to = this.documentView.getModel().getOffsetFromNode( toNode, false ) + 1;
					break;
				case 'char':
					/*
					 * Looks for the in-document character position that would match up with the
					 * same horizontal position - jumping a few pixels up/down at a time until we
					 * reach the next/previous line
					 */
					var position = this.documentView.getRenderedPositionFromOffset(
						this.selection.to,
						this.cursor.initialBias
					);
					
					if ( this.cursor.initialLeft === null ) {
						this.cursor.initialLeft = position.left;
					}
					var	fakePosition = new es.Position( this.cursor.initialLeft, position.top ),
						i = 0,
						step = direction === 'up' ? -5 : 5,
						top = this.$.position().top;

					this.cursor.initialBias = position.left > this.documentView.getNodeFromOffset(
						this.selection.to, false
					).contentView.$.offset().left;

					do {
						fakePosition.top += ++i * step;
						if ( fakePosition.top < top ) {
							break;
						} else if (
							fakePosition.top > top + this.dimensions.height +
								this.dimensions.scrollTop
						) {
							break;
						}
						fakePosition = this.documentView.getRenderedPositionFromOffset(
							this.documentView.getOffsetFromRenderedPosition( fakePosition ),
							this.cursor.initialBias
						);
						fakePosition.left = this.cursor.initialLeft;
					} while ( position.top === fakePosition.top );
					to = this.documentView.getOffsetFromRenderedPosition( fakePosition );
					break;
			}
			break;		
	}

	if( direction != 'up' && direction != 'down' ) {
		this.cursor.initialBias = direction === 'right' && unit === 'line' ? true : false;
	}

	if ( this.keyboard.keys.shift && this.selection.from !== to) {
		this.selection.to = to;
		this.documentView.drawSelection( this.selection );
		this.hideCursor();
	} else {
		if ( this.selection.from !== this.selection.to ) { 
			this.documentView.clearSelection();
		}
		this.selection.from = this.selection.to = to;
		this.showCursor();
	}
	this.emitSelect();	
};

/**
 * Shows the cursor in a new position.
 * 
 * @method
 * @param offset {Integer} Position to show the cursor at
 */
es.SurfaceView.prototype.showCursor = function() {	
	var position = this.documentView.getRenderedPositionFromOffset(
		this.selection.to, this.cursor.initialBias
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

	// Auto scroll to cursor
	var inputTop = this.$input.offset().top,
		inputBottom = inputTop + position.bottom - position.top;	
	if ( inputTop < this.dimensions.scrollTop ) {
		this.$window.scrollTop( inputTop );
	} else if ( inputBottom > ( this.dimensions.scrollTop + this.dimensions.height ) ) {
		this.$window.scrollTop( inputBottom - this.dimensions.height );
	}

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

/* Inheritance */

es.extendClass( es.SurfaceView, es.EventEmitter );