/**
 * Creates an es.DocumentViewLeafNode object.
 * 
 * @class
 * @constructor
 * @extends {es.ViewNode}
 * @param model {es.ModelNode} Model to observe
 * @param {jQuery} [$element] Element to use as a container
 */
es.DocumentViewLeafNode = function( model, $element ) {
	// Extension
	var node = es.extendObject( new es.DocumentNode( new es.ViewNode( model, $element ) ), this );
	
	// Content
	node.$content = $( '<div class="editSurface-content"></div>' ).appendTo( node.$ );
	node.contentView = new es.ContentView( node.$content, model );
	
	return node;
};

/* Methods */

/**
 * Render content.
 * 
 * @method
 */
es.DocumentViewLeafNode.prototype.renderContent = function() {
	this.contentView.render();
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param {es.Range} range Range of content to draw selection around
 */
es.DocumentViewLeafNode.prototype.drawSelection = function( range ) {
	this.contentView.drawSelection( range );
};

/**
 * Clear selection.
 * 
 * @method
 */
es.DocumentViewLeafNode.prototype.clearSelection = function() {
	this.contentView.clearSelection();
};

/**
 * Gets the nearest offset of a rendered position.
 * 
 * @method
 * @param {es.Position} position Position to get offset for
 * @returns {Integer} Offset of position
 */
es.DocumentViewLeafNode.prototype.getOffsetFromRenderedPosition = function( position ) {
	return this.contentView.getOffsetFromRenderedPosition( position );
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param {Integer} offset Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.DocumentViewLeafNode.prototype.getRenderedPositionFromOffset = function( offset ) {
	var	position = this.contentView.getRenderedPositionFromOffset( offset ),
		offset = this.$content.offset();
	position.top += offset.top;
	position.left += offset.left;
	position.bottom += offset.top;
	return position;
};

/**
 * Gets the length of the content in the model.
 * 
 * @method
 * @returns {Integer} Length of content
 */
es.DocumentViewLeafNode.prototype.getElementLength = function() {
	return this.model.getElementLength();
};

es.DocumentViewLeafNode.prototype.getRenderedLineRange = function( offset ) {
	return this.contentView.getRenderedLineRange( offset );
};