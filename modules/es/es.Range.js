/**
 * Range of content.
 * 
 * @class
 * @constructor
 * @param from {Integer} Starting offset
 * @param to {Integer} Ending offset
 * @property from {Integer} Starting offset
 * @property to {Integer} Ending offset
 * @property start {Integer} Normalized starting offset
 * @property end {Integer} Normalized ending offset
 */
es.Range = function( from, to ) {
	this.from = from || 0;
	this.to = typeof to === 'undefined' ? this.from : to;
	this.normalize();
};

/**
 * Creates a new es.Range object that's a translated version of another.
 * 
 * @method
 * @param {es.Range} range Range to base new range on
 * @param {Integer} distance Distance to move range by
 * @returns {es.Range} New translated range
 */
es.Range.newFromTranslatedRange = function( range, distance ) {
	return new es.Range( range.from + distance, range.to + distance );
};

/* Methods */

/**
 * Gets a clone of this object.
 * 
 * @method
 * @returns {es.Range} Clone of range
 */
es.Range.prototype.clone = function() {
	return new es.Range( this.from, this.to );
};

/**
 * Checks if an offset is within this range.
 * 
 * @method
 * @param offset {Integer} Offset to check
 * @returns {Boolean} If offset is within this range
 */
es.Range.prototype.containsOffset = function( offset ) {
	this.normalize();
	return offset >= this.start && offset < this.end;
};

/**
 * Gets the length of the range.
 * 
 * @method
 * @returns {Integer} Length of range
 */
es.Range.prototype.getLength = function() {
	return Math.abs( this.from - this.to );
};

/**
 * Sets start and end properties, ensuring start is always before end.
 * 
 * This should always be called before using the start or end properties. Do not call this unless
 * you are about to use these properties.
 * 
 * @method
 */
es.Range.prototype.normalize = function() {
	if ( this.from < this.to ) {
		this.start = this.from;
		this.end = this.to;
	} else {
		this.start = this.to;
		this.end = this.from;
	}
};
