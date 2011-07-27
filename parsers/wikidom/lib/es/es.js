/**
 * EditSurafce namespace.
 * 
 * All classes and functions will be attached to this object to keep the global namespace clean.
 */
var es = {};

/**
 * Extends a constructor with prototype of another.
 * 
 * When using this, it's required to include a call to the constructor of the parent class as the
 * first code in the child class's constructor.
 * 
 * @example
 *     // Define parent class
 *     function Foo() {
 *     }
 *     // Define child class
 *     function Bar() {
 *         // Call parent constructor
 *         Foo.call( this );
 *     }
 *     // Extend prototype
 *     extend( Bar, Foo );
 * 
 * @param dst {Function} Class to copy prototype members to
 * @param src {Function} Class to copy prototype members from
 */
es.extend = function( dst, src ) {
	var base = new src();
	var i; // iterator

	for ( i in base ) {
		if ( typeof base[i] === 'function' && !( i in dst.prototype ) ) {
			dst.prototype[i] = base[i];
		}
	}
}

/**
 * Range of content.
 * 
 * @param start {Integer} Starting point
 * @param end {Integer} Ending point
 * @returns {es.Range}
 */
es.Range = function( start, end ) {
	this.start = start || null;
	this.end = end || null;
}

/**
 * Pixel position, a 2D position within a rendered document.
 * 
 * This can also support an optional bottom field, to represent a vertical line, such as a cursor.
 * 
 * @param left {Integer} Horizontal position
 * @param top {Integer} Vertical top position
 * @param bottom {Integer} Vertical bottom position of bottom (optional, default: top)
 * @returns {es.Position}
 */
es.Position = function( left, top, bottom ) {
	this.left = left || 0;
	this.top = top || 0;
	this.bottom = bottom || this.top;
};

es.Position.newFromEventScreenPosition = function( event ) {
	return new es.Position( event.screenX, event.screenY );
};

es.Position.newFromEventPagePosition = function( event ) {
	return new es.Position( event.pageX, event.pageY );
};

es.Position.newFromEventLayerPosition = function( event ) {
	return new es.Position( event.layerX, event.layerY );
};

es.Position.prototype.at = function( position ) {
	return this.left === position.left && this.top === position.top;
};

es.Position.prototype.perpendicularWith = function( position ) {
	return this.left === position.left || this.top === position.top;
};

es.Position.prototype.levelWith = function( position ) {
	return this.top === position.top;
};

es.Position.prototype.plumbWith = function( position ) {
	return this.left === position.left;
};

es.Position.prototype.near = function( position, range ) {
	var x = this.left - position.left,
		y = this.top - position.top;
	return Math.sqrt( x * x, y * y ) <= range;
};

es.Position.prototype.above = function( position ) {
	return this.bottom < position.top;
};

es.Position.prototype.below = function( position ) {
	return this.top > position.bottom;
};

es.Position.prototype.leftOf = function( left ) {
	return this.left < left;
};

es.Position.prototype.rightOf = function( left ) {
	return this.left > left;
};

/**
 * Content location, an offset within a block.
 * 
 * @param block {es.Block} Location target
 * @param offset {Integer} Location offset
 * @returns {es.Location}
 */
es.Location = function( block, offset ) {
	this.block = block;
	this.offset = offset || 0;
}

/**
 * Content selection, a pair of locations.
 * 
 * @param from {es.Location} Starting location
 * @param to {es.Location} Ending location
 * @returns {es.Selection}
 */
es.Selection = function( from, to ) {
	this.from = from;
	this.to = to;
	this.start = from;
	this.end = to;
}

/**
 * Ensures that "from" is before "to".
 */
es.Selection.prototype.normalize = function() {
	if ( this.from.block.getIndex() < this.to.block.getIndex()
			|| ( this.from.block === this.to.block && this.from.offset < this.to.offset ) ) {
		this.start = this.from;
		this.end = this.to;
	} else {
		this.start = this.to;
		this.end = this.from;
	}
};

/**
 * Gets all blocks selected completely, between from and to.
 * 
 * If from and to are adjacent blocks, or the same block, the result will always be an empty array.
 * 
 * @returns {Array} List of blocks
 */
es.Selection.prototype.through = function() {
	var through = [];
	if ( this.from !== this.to && this.from.nextBlock() !== this.to ) {
		var next = this.from.nextBlock();
		while ( next && next !== this.to ) {
			through.push( next );
			next = next.nextBlock();
		}
	}
	return through;
};

es.Content = function( data ) {
	this.setData( data );
}

es.Content.prototype.setData = function( data ) {
	// Data type detection
	if ( typeof data === 'string' ) {
		this.type = 'string';
	} else if ( $.isArray( data ) ) {
		// TODO
	} else if ( $.isPlainObject( data ) ) {
		if ( 'type' in data && '' ) {
			// TODO
		}
	}
	this.data = data;
};
