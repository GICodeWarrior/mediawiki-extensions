/**
 * Creates an es.ListItemView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewNode}
 */
es.ListItemView = function( model ) {
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
es.ListItemView.prototype.renderContent = function() {
	this.contentView.render();
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param {es.Range} range Range of content to draw selection around
 */
es.ListItemView.prototype.drawSelection = function( range ) {
	this.contentView.drawSelection( range );
};

/**
 * Clear selection.
 * 
 * @method
 */
es.ListItemView.prototype.clearSelection = function() {
	this.contentView.clearSelection();
};

/**
 * Gets the nearest offset of a rendered position.
 * 
 * @method
 * @param {es.Position} position Position to get offset for
 * @returns {Integer} Offset of position
 */
es.ListItemView.prototype.getOffsetFromRenderedPosition = function( position ) {
	return this.contentView.getOffsetFromRenderedPosition( offset );
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param {Integer} offset Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.ListItemView.prototype.getRenderedPositionFromOffset = function( offset ) {
	return this.contentView.getRenderedPositionFromOffset( offset );
};
