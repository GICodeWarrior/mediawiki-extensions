/**
 * Creates an es.BlockView object.
 * 
 * @class
 * @extends {es.DomContainerItem}
 * @abstract
 * @constructor
 * @param typeName {String} Name of block type (optional, default: "block")
 * @param tagName {String} HTML tag name to use in rendering (optional, default: "div")
 */
es.BlockView = function( blockModel, typeName, tagName ) {
	es.ViewContainerItem.call( this, blockModel, typeName || 'block', tagName || 'div' );
	this.$.addClass( 'editSurface-block' );
};

/**
 * Render content.
 */
es.BlockView.prototype.renderContent = function() {
	throw 'BlockView.renderContent not implemented in this subclass.';
};

/**
 * Gets offset within content of position.
 */
es.BlockView.getContentOffset = function( position ) {
	throw 'BlockView.getContentOffset not implemented in this subclass.';
};

/**
 * Gets rendered position of offset within content.
 */
es.BlockView.getRenderedPosition = function( offset ) {
	throw 'BlockView.getRenderedPosition not implemented in this subclass.';
};

/**
 * Gets rendered line index of offset within content.
 */
es.BlockView.getRenderedLineIndex = function( offset ) {
	throw 'BlockView.getRenderedLineIndex not implemented in this subclass.';
};

/**
 * Gets rendered line index of offset within content.
 */
es.BlockView.getRenderedLineRange = function( offset ) {
	throw 'BlockView.getRenderedLineRange not implemented in this subclass.';
};

es.extend( es.BlockView, es.ViewContainerItem );
