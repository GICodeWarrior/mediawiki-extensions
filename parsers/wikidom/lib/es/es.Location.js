/**
 * Offset within a block.
 * 
 * @class
 * @constructor
 * @param block {es.Block} Block offset is within
 * @param offset {Integer} Offset within block
 * @property block {es.Block} Block offset is within
 * @property offset {Integer} Offset within block (optional, default: 0)
 */
es.Location = function( block, offset ) {
	this.block = block;
	this.offset = offset || 0;
};

/**
 * Compares location with another.
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
