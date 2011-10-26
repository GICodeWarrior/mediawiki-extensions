/**
 * Creates an es.ParagraphView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewNode}
 */
es.ParagraphView = function( model ) {
	// Extension
	var view = $.extend( new es.DocumentViewNode( model ), this );

	// Content
	view.contentView = new es.ContentView( view.$, model );

	return view;
};

/* Methods */

/**
 * Render content.
 * 
 * @method
 */
es.ParagraphView.prototype.renderContent = function() {
	this.contentView.render();
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param {es.Range} range Range of content to draw selection around
 */
es.ParagraphView.prototype.drawSelection = function( range ) {
	this.contentView.drawSelection( range );
};

/**
 * Clear selection.
 * 
 * @method
 */
es.ParagraphView.prototype.clearSelection = function() {
	this.contentView.clearSelection();
};

/**
 * Gets the nearest offset of a rendered position.
 * 
 * @method
 * @param {es.Position} position Position to get offset for
 * @returns {Integer} Offset of position
 */
es.ParagraphView.prototype.getOffsetFromRenderedPosition = function( position ) {
	return this.contentView.getOffsetFromRenderedPosition( offset );
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param {Integer} offset Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.ParagraphView.prototype.getRenderedPositionFromOffset = function( offset ) {
	return this.contentView.getRenderedPositionFromOffset( offset );
};
