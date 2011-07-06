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
	
	this.$cursor = $( '<div class="editSurface-cursor"></div>' );
	this.$.after( this.$cursor );
}

Surface.prototype.onMouseDown = function( e ) {
	var $target = $( e.target );
		$block = $target.is( '.editSurface-block' ) ? $target : $target.closest( '.editSurface-block' ),
		block = $block.data( 'block' );
	
	if( !block ) {
		return false;
	}
	
	var position = new Position(e.pageX - $block.offset().left,
								e.pageY - $block.offset().top);
	var offset = block.flow.getOffset( position );
	this.setCursor( new Location( block, offset ) );
};

/**
 * Moves the cursor to a new location.
 * 
 * @param location {Location} Location to move the cursor to
 */
Surface.prototype.setCursor = function( location ) {
	this.location = location;
	
	var position = this.location.block.getPosition( this.location.offset );
	var offset = this.location.block.$.offset();

	this.$cursor.css({
		'left': position.left + offset.left,
		'top': position.top + offset.top
	}).show();
};

/**
 * Gets the current location of the cursor.
 * 
 * @returns {Location}
 */
Surface.prototype.getCursor = function() {
	// return location
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
	var location = this.getCursor();
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
	this.setCursor( location );
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
	var location = this.getCursor();
	if ( location.block.length < location.offset + 1 ) {
		location.offset++;
	} else {
		var next = location.block.next();
		if ( next ) {
			location.block = next;
			location.offset = 0;
		}
	}
	this.setCursor( location );
};

/**
 * Moves the cursor forward of the current position.
 */
Surface.prototype.moveCursorLeft = function() {
	var location = this.getCursor();
	if ( location.offset > 0 ) {
		location.offset--;
	} else {
		var previous = location.block.previous();
		if ( previous ) {
			location.block = previous;
			location.offset = location.block.length - 1;
		}
	}
	this.setCursor( location );
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
