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
};

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
	if ( this.from.compareWith( this.to ) < 1 ) {
		this.start = this.from;
		this.end = this.to;
	} else {
		this.start = this.to;
		this.end = this.from;
	}
};
