/**
 * Content selection, a pair of locations.
 * 
 * @class
 * @constructor
 * @param from {es.Location} Starting location
 * @param to {es.Location} Ending location
 * @property from {es.Location} Starting location
 * @property to {es.Location} Ending location
 * @property start {es.Location} Normalized starting location
 * @property end {es.Location} Normalized ending location
 */
es.Selection = function( from, to ) {
	this.from = from;
	this.to = to;
	this.start = from;
	this.end = to;
}

/* Methods */

/**
 * Sets start and end properties, ensuring start is always before end.
 * 
 * This should always be called before using the start or end properties. Do not call this unless
 * you are about to use these properties.
 * 
 * @method
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
 * @method
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
