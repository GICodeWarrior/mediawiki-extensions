/**
 * Range of content.
 * 
 * @param start {Integer} Starting point
 * @param end {Integer} Ending point
 * @returns {es.Range}
 * @property to {Integer}
 * @property from {Integer}
 * @property start {Integer}
 * @property end {Integer}
 */
es.Range = function( from, to ) {
	this.set( from, to );
};

es.Range.prototype.set = function( from, to ) {
	this.from = from || 0;
	this.to = to || from;
	this.normalize();
}

es.Range.prototype.getLength = function() {
	return Math.abs( this.from - this.to );
};

es.Range.prototype.normalize = function() {
	if ( this.from < this.to ) {
		this.start = this.from;
		this.end = this.to;
	} else {
		this.start = this.to;
		this.end = this.from;
	}
};
