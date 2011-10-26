/**
 * Creates an es.DocumentViewNode object.
 * 
 * es.DocumenViewNode is a simple wrapper around es.ViewNode, which adds functionality for view
 * nodes to be used for rendering content in a document.
 * 
 * @class
 * @constructor
 * @extends {es.ViewNode}
 * @param model {es.ModelNode} Model to observe
 * @param {jQuery} [$element] Element to use as a container
 */
es.DocumentViewNode = function( model, $element ) {
	// Extension
	var node = $.extend( new es.ViewNode( model, $element ), this );
	//
	return node;
};

/* Methods */

/**
 * Render content or child nodes.
 * 
 * @method
 */
es.DocumentViewNode.prototype.renderContent = function() {
	throw 'DocumentViewNode.renderContent not implemented in this subclass.';
};

/**
 * Draw selection around a given range, or delegate selection drawing to child nodes.
 * 
 * @method
 * @param range {es.Range} Range of content to draw selection around
 */
es.DocumentViewNode.prototype.drawSelection = function( range ) {
	throw 'DocumentViewNode.drawSelection not implemented in this subclass.';
};

/**
 * Clear selection, or delegate selection clearing to child nodes.
 * 
 * @method
 */
es.DocumentViewNode.prototype.clearSelection = function() {
	throw 'DocumentViewNode.clearSelection not implemented in this subclass.';
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param offset {Integer} Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.DocumentViewNode.prototype.getRenderedPosition = function( offset ) {
	throw 'DocumentViewNode.getRenderedPosition not implemented in this subclass.';
};
