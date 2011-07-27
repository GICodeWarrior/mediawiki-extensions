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
}
