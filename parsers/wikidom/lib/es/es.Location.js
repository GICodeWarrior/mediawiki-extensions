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
