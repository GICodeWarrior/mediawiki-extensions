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
