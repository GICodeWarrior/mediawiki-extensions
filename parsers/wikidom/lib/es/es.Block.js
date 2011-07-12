/**
 * 
 * @returns {Block}
 */
function Block() {
	this.document = null;
}

Block.prototype.getLength = function() {
	throw 'Block.getLength not implemented in this subclass.';
};

/**
 * Gets the index of the block within it's document.
 * 
 * @returns {Integer} Index of block
 */
Block.prototype.getIndex = function() {
	if ( !this.document ) {
		throw 'Missing document error. Block is not attached to a document.';
	}
	return this.document.blocks.indexOf( this );
};

/**
 * Gets the next block in the document.
 * 
 * @returns {Block|Null} Block directly proceeding this one, or null if none exists
 */
Block.prototype.nextBlock = function() {
	if ( !this.document ) {
		throw 'Missing document error. Block is not attached to a document.';
	}
	var index = this.index() + 1;
	return this.document.blocks.length > index ? this.document.blocks[index] : null;
};

/**
 * Gets the previous block in the document.
 * 
 * @returns {Block|Null} Block directly preceding this one, or null if none exists
 */
Block.prototype.previousBlock = function() {
	if ( !this.document ) {
		throw 'Missing document error. Block is not attached to a document.';
	}
	var index = this.index() - 1;
	return index >= 0 ? this.document.blocks[index] : null;
};

/**
 * Inserts content into a block at an offset.
 * 
 * @param offset {Integer} Position to insert content at
 * @param content {Object} Content to insert
 */
Block.prototype.insertContent = function( offset, content ) {
	throw 'Block.insertContent not implemented in this subclass.';
};

/**
 * Deletes content in a block within a range.
 * 
 * @param offset {Integer} Position to start removing content from
 * @param length {Integer} Length of content to remove
 */
Block.prototype.deleteContent = function( offset, length ) {
	throw 'Block.deleteContent not implemented in this subclass.';
};

/**
 * Renders content into a container.
 * 
 * @param $container {jQuery Selection} Container to render into
 */
Block.prototype.renderContent = function( $container ) {
	throw 'Block.renderContent not implemented in this subclass.';
};

/**
 * Updates the rendered content in a container.
 * 
 * @param $container {jQuery Selection} Container to update content in
 */
Block.prototype.updateContent = function( $container ) {
	throw 'Block.updateContent not implemented in this subclass.';
};

/**
 * Gets the offset of a position.
 * 
 * @param position {Integer} Offset to translate
 */
Block.prototype.getOffset = function( position ) {
	throw 'Block.getOffset not implemented in this subclass.';
};

/**
 * Gets the position of an offset.
 * 
 * @param offset {Integer} Offset to translate
 */
Block.prototype.getPosition = function( offset ) {
	throw 'Block.getPosition not implemented in this subclass.';
};
