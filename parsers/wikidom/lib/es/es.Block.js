/**
 * Base object for all blocks, providing basic shared functionality and stubs for required
 * implementations.
 * 
 * @extends {es.EventEmitter}
 * @returns {es.Block}
 */
es.Block = function() {
	es.EventEmitter.call( this );
	this.document = null;
}

/**
 * Association between block type-name and block constructor
 * 
 * @example "paragraph" => es.ParagraphBlock
 */
es.Block.models = {};

/**
 * Creates a new block object from Wikidom data.
 * 
 * @param wikidomBlock {Object} Wikidom data to convert from
 */
es.Block.newFromWikidom = function( wikidomBlock ) {
	if ( wikidomBlock.type in es.Block.models ) {
		return es.Block.models[wikidomBlock.type].newFromWikidom( wikidomBlock );
	} else {
		throw 'Unknown block type: ' + wikidomBlock.type;
	}
};

/**
 * Gets the index of the block within it's document.
 * 
 * @returns {Integer} Index of block
 */
es.Block.prototype.getIndex = function() {
	if ( !this.document ) {
		throw 'Missing document error. Block is not attached to a document.';
	}
	return this.document.blocks.indexOf( this );
};

/**
 * Gets the next block in the document.
 * 
 * @returns {es.Block|Null} Block directly proceeding this one, or null if none exists
 */
es.Block.prototype.nextBlock = function() {
	if ( !this.document ) {
		throw 'Missing document error. Block is not attached to a document.';
	}
	var index = this.getIndex() + 1;
	return this.document.blocks.length > index ? this.document.blocks[index] : null;
};

/**
 * Gets the previous block in the document.
 * 
 * @returns {es.Block|Null} Block directly preceding this one, or null if none exists
 */
es.Block.prototype.previousBlock = function() {
	if ( !this.document ) {
		throw 'Missing document error. Block is not attached to a document.';
	}
	var index = this.getIndex() - 1;
	return index >= 0 ? this.document.blocks[index] : null;
};

/**
 * Gets the length of all block content.
 */
es.Block.prototype.getLength = function() {
	throw 'Block.getLength not implemented in this subclass.';
};

/**
 * Inserts content into a block at an offset.
 * 
 * @param offset {Integer} Position to insert content at
 * @param content {Object} Content to insert
 */
es.Block.prototype.insertContent = function( offset, content ) {
	throw 'Block.insertContent not implemented in this subclass.';
};

/**
 * Deletes content in a block within a range.
 * 
 * @param range {es.Range} Range of content to remove
 */
es.Block.prototype.deleteContent = function( range ) {
	throw 'Block.deleteContent not implemented in this subclass.';
};

/**
 * Applies an annotation to a given range.
 * 
 * If a range arguments are not provided, all content will be annotated.
 * 
 * @param method {String} Way to apply annotation ("toggle", "add" or "remove")
 * @param annotation {Object} Annotation to apply
 * @param range {es.Range} Range of content to annotate
 */
es.Block.prototype.annotateContent = function( method, annotation, range ) {
	throw 'Block.annotateContent not implemented in this subclass.';
};

/**
 * Gets content within a range.
 * 
 * @param range {es.Range} Range of content to get
 */
es.Block.prototype.getContent = function( range) {
	throw 'Block.getContent not implemented in this subclass.';
};

/**
 * Gets content as plain text within a range.
 * 
 * @param range {es.Range} Range of text to get
 * @param render {Boolean} If annotations should have any influence on output
 */
es.Block.prototype.getText = function( range, render ) {
	throw 'Block.getText not implemented in this subclass.';
};

/**
 * Renders content into a container.
 */
es.Block.prototype.renderContent = function() {
	throw 'Block.renderContent not implemented in this subclass.';
};

/**
 * Gets the offset of a position.
 * 
 * @param position {Integer} Offset to translate
 */
es.Block.prototype.getOffset = function( position ) {
	throw 'Block.getOffset not implemented in this subclass.';
};

/**
 * Gets the position of an offset.
 * 
 * @param offset {Integer} Offset to translate
 */
es.Block.prototype.getPosition = function( offset ) {
	throw 'Block.getPosition not implemented in this subclass.';
};

/**
 * Gets the start and end points of the word closest a given offset.
 * 
 * @param offset {Integer} Offset to find word nearest to
 * @return {Object} Range object of boundaries
 */
es.Block.prototype.getWordBoundaries = function( offset ) {
	throw 'Block.getWordBoundaries not implemented in this subclass.';
};

/**
 * Gets the start and end points of the section closest a given offset.
 * 
 * @param offset {Integer} Offset to find section nearest to
 * @return {Object} Range object of boundaries
 */
es.Block.prototype.getSectionBoundaries = function( offset ) {
	throw 'Block.getSectionBoundaries not implemented in this subclass.';
};

es.extend( es.Block, es.EventEmitter );
