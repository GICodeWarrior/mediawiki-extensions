/**
 * Creates an es.Location object.
 * 
 * Locations describe an offset within an aggregate target, including a reference to the target.
 * 
 * @class
 * @constructor
 * @param target {Object} Target offset is within
 * @param offset {Integer} Offset within target
 * @property target {Object} Target offset is within
 * @property offset {Integer} Offset within target (optional, default: 0)
 */
es.Location = function( target, offset ) {
	this.target = target;
	this.offset = offset || 0;
};

/**
 * Compares location with another.
 * 
 * This method expects targets to support a getIndex method, which returns an integer representing
 * the target's offset within a container.
 * 
 * @method
 * @param location {es.Location} Location to compare with
 * @returns {Integer} -1 if this is before the argument, 0 if at the same place or 1 if after
 */
es.Location.prototype.compareWith = function( location ) {
	var a = this,
		b = location;
	if ( a === b ) {
		return 0;
	}
	var aIndex = this.block.getIndex(),
		bIndex = location.block.getIndex();
	if ( aIndex < bIndex || ( aIndex === bIndex && a.offset < b.offset ) ) {
		return -1;
	} else if ( aIndex > bIndex || ( aIndex === bIndex && a.offset > b.offset )  ) {
		return 1;
	}
	return 0;
};
