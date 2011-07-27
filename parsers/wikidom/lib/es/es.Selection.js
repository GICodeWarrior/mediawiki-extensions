/**
 * Content selection, a pair of locations.
 * 
 * @class
 * @constructor
 * @param from {es.Location} Starting location
 * @param to {es.Location} Ending location
 * @property from {es.Location}
 * @property to {es.Location}
 * @property start {es.Location}
 * @property end {es.Location}
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
