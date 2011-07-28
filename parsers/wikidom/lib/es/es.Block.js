/**
 * Document block.
 * 
 * Base object for all blocks, providing basic shared functionality and stubs for required
 * implementations.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @property document {es.Document}
 */
es.Block = function() {
	es.EventEmitter.call( this );
	this.document = null;
}

/* Static Members */

/**
 * Association between block type-name and block constructor
 * 
 * @static
 * @member
 * @example "paragraph" => es.ParagraphBlock
 */
es.Block.models = {};

/* Static Methods */

/**
 * Creates a new block object from Wikidom data.
 * 
 * @static
 * @method
 * @param wikidomBlock {Object} Wikidom data to convert from
 */
es.Block.newFromWikidom = function( wikidomBlock ) {
	if ( wikidomBlock.type in es.Block.models ) {
		return es.Block.models[wikidomBlock.type].newFromWikidom( wikidomBlock );
	} else {
		throw 'Unknown block type: ' + wikidomBlock.type;
	}
};

/* Methods */

/**
 * Gets the index of the block within it's document.
 * 
 * @method
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
 * @method
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
 * @method
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
 * 
 * @method
 * @returns {Integer} Length of block content
 */
es.Block.prototype.getLength = function() {
	throw 'Block.getLength not implemented in this subclass.';
};

/**
 * Inserts content into a block at an offset.
 * 
 * @method
 * @param offset {Integer} Position to insert content at
 * @param content {Object} Content to insert
 */
es.Block.prototype.insertContent = function( offset, content ) {
	throw 'Block.insertContent not implemented in this subclass.';
};

/**
 * Deletes content in a block within a range.
 * 
 * @method
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
 * @method
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
 * @method
 * @param range {es.Range} Range of content to get
 * @returns {es.Content} Content within range
 */
es.Block.prototype.getContent = function( range ) {
	throw 'Block.getContent not implemented in this subclass.';
};

/**
 * Gets content as plain text within a range.
 * 
 * @method
 * @param range {es.Range} Range of text to get
 * @param render {Boolean} If annotations should have any influence on output
 * @returns {String} Text within range
 */
es.Block.prototype.getText = function( range, render ) {
	throw 'Block.getText not implemented in this subclass.';
};

/**
 * Renders content into a container.
 * 
 * @method
 * @returns {String} Rendered content in HTML format
 */
es.Block.prototype.renderContent = function() {
	throw 'Block.renderContent not implemented in this subclass.';
};

/**
 * Gets the offset of a position.
 * 
 * @method
 * @param position {es.Position} Position to translate
 * @returns {Integer} Offset of position
 */
es.Block.prototype.getOffset = function( position ) {
	throw 'Block.getOffset not implemented in this subclass.';
};

/**
 * Gets the position of an offset.
 * 
 * @method
 * @param offset {Integer} Offset to translate
 * @returns {es.Position} Position of offset
 */
es.Block.prototype.getPosition = function( offset ) {
	throw 'Block.getPosition not implemented in this subclass.';
};

/**
 * Gets the start and end points of the word closest a given offset.
 * 
 * @method
 * @param offset {Integer} Offset to find word nearest to
 * @return {es.Range} Range object of boundaries
 */
es.Block.prototype.getWordBoundaries = function( offset ) {
	throw 'Block.getWordBoundaries not implemented in this subclass.';
};

/**
 * Gets the start and end points of the section closest a given offset.
 * 
 * @method
 * @param offset {Integer} Offset to find section nearest to
 * @return {es.Range} Range object of boundaries
 */
es.Block.prototype.getSectionBoundaries = function( offset ) {
	throw 'Block.getSectionBoundaries not implemented in this subclass.';
};

/* Inheritance */

es.extend( es.Block, es.EventEmitter );
