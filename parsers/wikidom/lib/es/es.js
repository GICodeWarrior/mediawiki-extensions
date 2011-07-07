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
function extend( dst, src ) {
	var base = new src();
	for ( i in base ) {
		if ( typeof base[i] === 'function' && !( i in dst.prototype ) ) {
			dst.prototype[i] = base[i];
		}
	}
}

/**
 * Pixel position, a 2D position within a rendered document.
 * 
 * This can also support an optional bottom field, to represent a vertical line, such as a cursor.
 * 
 * @param left {Integer} Horizontal position
 * @param top {Integer} Vertical position (of top, if bottom is used)
 * @param bottom {Integer} Vertical position of bottom (optional)
 * @returns {Position}
 */
function Position( left, top, bottom ) {
	this.left = left || 0;
	this.top = top || 0;
	this.bottom = bottom || 0;
}

/**
 * Content location, an offset within a block.
 * 
 * @param block {Block} Location target
 * @param offset {Integer} Location offset
 * @returns {Location}
 */
function Location( block, offset ) {
	this.block = block;
	this.offset = offset || 0;
}

/**
 * Content selection, a pair of locations.
 * 
 * @param from {Location} Starting location
 * @param to {Location} Ending location
 * @returns {Selection}
 */
function Selection( from, to ) {
	this.from = from;
	this.to = to;
}

/**
 * Ensures that "from" is before "to".
 */
Selection.prototype.normalize = function() {
	if ( this.from.block.index() > this.to.block.index()
			|| ( this.from.block.index() === this.to.block.index()
					&& this.from.offset > this.to.offset ) ) {
		var from = sel.from;
		this.from = to;
		this.to = from;
	}
};

/**
 * Gets all blocks selected completely, between from and to.
 * 
 * If from and to are adjacent blocks, or the same block, the result will always be an empty array.
 * 
 * @returns {Array} List of blocks
 */
Selection.prototype.through = function() {
	var through = [];
	if ( this.from !== this.to && this.from.nextBlock() !== this.to ) {
		var next = this.from.nextBlock()
		while ( next && next !== this.to ) {
			through.push( next );
			next = next.nextBlock();
		}
	}
	return through;
};

function Content( data ) {
	this.setData( data );
}

Content.prototype.setData = function( data ) {
	// Data type detection
	if ( typeof data === 'string' ) {
		this.type = 'string';
	} else if ( $.isArray( data ) ) {
		
	} else if ( $.isPlainObject( data ) ) {
		if ( 'type' in data && '' ) {
			
		}
	}
	this.data = data;
};
