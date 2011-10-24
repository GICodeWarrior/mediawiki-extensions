/**
 * Creates an es.BlockView object.
 * 
 * @class
 * @extends {es.ViewListItem}
 * @abstract
 * @constructor
 * @param typeName {String} Name of block type (optional, default: "block")
 * @param tagName {String} HTML tag name to use in rendering (optional, default: "div")
 */
es.BlockView = function( blockModel, $element ) {
	es.ViewListItem.call( this, blockModel, $element );
	this.$.addClass( 'editSurface-block' );
	this.$.data( 'block', this );
};
/**
 * Render content.
 * 
 * @method
 */
es.BlockView.prototype.renderContent = function() {
	throw 'BlockView.renderContent not implemented in this subclass.';
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param range {es.Range} Range of content to draw selection around
 */
es.BlockView.prototype.drawSelection = function( range ) {
	throw 'BlockView.drawSelection not implemented in this subclass.';
};

/**
 * Clear selection
 * 
 * @method
 */
es.BlockView.prototype.clearSelection = function() {
	throw 'BlockView.clearSelection not implemented in this subclass.';
};

/**
 * Gets length of contents.
 * 
 * @method
 * @returns {Integer} Length of content, including any virtual spaces within the block
 */
es.BlockView.prototype.getLength = function() {
	throw 'BlockView.getLength not implemented in this subclass.';
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param offset {Integer} Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.BlockView.prototype.getRenderedPosition = function( offset ) {
	throw 'BlockView.getRenderedPosition not implemented in this subclass.';
};

/**
 * Gets HTML rendering of block.
 * 
 * @method
 * @param options {Object} List of options, see es.DocumentView.getHtml for details
 * @returns {String} HTML data
 */
es.BlockView.prototype.getHtml = function( options ) {
	throw 'BlockView.getHtml not implemented in this subclass.';
};

/* Inheritance */

es.extend( es.BlockView, es.ViewListItem );
