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
	this.$ = $container;
	this.document = document;
	this.rendered = false;
	this.location = null;
	this.render();

	var surface = this;

	this.$.bind({
		'mousedown' : function(e) {
			return surface.onMouseDown( e );
		}
	});
	
	// Cursor
	this.cursor = new Cursor( this );
	
	// Hidden input
	this.$input = $( '<input/>' );
	this.$.before( this.$input );
	this.$input.bind({
		'keydown' : function(e) {
			return surface.onKeyDown( e );			
		}
	});
}

Surface.prototype.onKeyDown = function( e ) {
	switch ( e.keyCode ) {
		case 37: // Left arrow
			this.moveCursorLeft();
			break;
		case 38: // Up arrow
			this.moveCursorUp();
			break;
		case 39: // Right arrow
			this.moveCursorRight();
			break;
		case 40: // Down arrow
			this.moveCursorDown();
			break;

	}
	return true;
}

Surface.prototype.onMouseDown = function( e ) {
	var $target = $( e.target );
		$block = $target.is( '.editSurface-block' )
			? $target : $target.closest( '.editSurface-block' );
	// Not a block or child of a block? Find the nearest block...
	if( !$block.length ) {
		var minDistance;
		this.$.find( '> .editSurface-document .editSurface-block' ).each( function() {
			var top = $(this).offset().top,
				bottom = top + $(this).height();
			// Inside test
			if ( e.pageY >= top && e.pageY < bottom ) {
				$block = $(this);
				return false;
			}
			// Distance test
			var distance = Math.abs( e.pageY - top );
			if ( typeof minDistance === 'undefined' || distance < minDistance ) {
				minDistance = distance;
				$block = $(this);
			}
		} );
	}
	var block = $block.data( 'block' )
		blockOffset = $block.offset()
		position = new Position( e.pageX - blockOffset.left, e.pageY - blockOffset.top )
		offset = block.flow.getOffset( position );
	this.cursor.show( new Location( block, offset ) );
	this.$input.focus();
	return false;
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
	// return location
};

/**
 * Gets the position of a location.
 * 
 * @param location {Location} Location to translate
 * @returns {Position}
 */
Surface.prototype.getPosition = function( location ) {
	// return position
};

/**
 * Moves the cursor to the nearest location directly above the current flowed line.
 */
Surface.prototype.moveCursorUp = function() {
	var location = this.cursor.get();
	var below = this.getPosition( location );
	var minDistance;
	while ( location.block.previous() && location.offset > 0 ) {
		location.offset--;
		if ( location.offset === -1 ) {
			location.block = block.previous();
		}
		var above = this.getPosition( location );
		if ( above.y < below.y ) {
			var distance = below.x - above.x;
			if ( minDistance > distance ) {
				location.offset++;
				break;
			} else {
				minDistance = distance;
			}
		}
	}
	this.cursor.show( location );
};

/**
 * Moves the cursor to the nearest location directly below the current flowed line.
 */
Surface.prototype.moveCursorDown = function() {
	var location = this.getCursor();
	var above = this.getPosition( location );
	var minDistance;
	while ( location.block.next() && location.offset < location.block.length ) {
		location.offset++;
		if ( location.offset = location.block.length ) {
				location.block = block.next();
		}
		var below = this.getPosition( location );
		if ( above.y < below.y ) {
			var distance = below.x - above.x;
			if ( minDistance > distance ) {
				location.offset++;
				break;
			} else {
				minDistance = distance;
			}
		}
	}
	this.setCursor( location );
};

/**
 * Moves the cursor backward of the current position.
 */
Surface.prototype.moveCursorRight = function() {
	var location = this.cursor.get();
	if ( location.block.getLength() > location.offset + 1 ) {
		location.offset++;
	} else {
		var next = location.block.nextBlock();
		if ( next ) {
			location.block = next;
			location.offset = 0;
		}
	}
	this.cursor.show( location );
};

/**
 * Moves the cursor forward of the current position.
 */
Surface.prototype.moveCursorLeft = function() {
	var location = this.cursor.get();
	if ( location.offset > 0 ) {
		location.offset--;
	} else {
		var previous = location.block.previousBlock();
		if ( previous ) {
			location.block = previous;
			location.offset = location.block.getLength() - 1;
		}
	}
	this.cursor.show( location );
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
