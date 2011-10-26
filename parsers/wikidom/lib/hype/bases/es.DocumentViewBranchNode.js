/**
 * Creates an es.DocumentViewBranchNode object.
 * 
 * @class
 * @constructor
 * @extends {es.ViewNode}
 * @param model {es.ModelNode} Model to observe
 * @param {jQuery} [$element] Element to use as a container
 */
es.DocumentViewBranchNode = function( model, $element ) {
	// Extension
	return $.extend( new es.ViewNode( model, $element ), this );
};

/* Methods */

/**
 * Render content.
 * 
 * @method
 */
es.DocumentViewBranchNode.prototype.renderContent = function() {
	for ( var i = 0; i < this.length; i++ ) {
		this[i].contentView.render();
	}
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param {es.Range} range Range of content to draw selection around
 */
es.DocumentViewBranchNode.prototype.drawSelection = function( range ) {
	var nodes = this.selectNodes( range, true ),
		i;
	for ( i = 0; i < nodes.on.length; i++ ) {
		nodes.on[i].node.drawSelection( nodes.on[i].range );
	}
	for ( i = 0; i < nodes.off.length; i++ ) {
		nodes.off[i].clearSelection();
	}
};

/**
 * Clear selection.
 * 
 * @method
 */
es.DocumentViewBranchNode.prototype.clearSelection = function() {
	for ( var i = 0; i < this.length; i++ ) {
		this[i].contentView.clearSelection();
	}
};

/**
 * Gets the nearest offset of a rendered position.
 * 
 * @method
 * @param {es.Position} position Position to get offset for
 * @returns {Integer} Offset of position
 */
es.DocumentViewBranchNode.prototype.getOffsetFromRenderedPosition = function( position ) {
	if ( this.length === 0 ) {
		return 0;
	}
	var node = this[0];
	for ( var i = 1; i < this.length; i++ ) {
		if ( this[i].$.offset().top > position.top ) {
			break;
		}
		node = this.items[i];
	}
	return node.getParent().getOffsetFromNode( node ) + node.getOffsetFromPosition( position );	
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param {Integer} offset Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.DocumentViewBranchNode.prototype.getRenderedPositionFromOffset = function( offset ) {
	var node = this.getNodeFromOffset( offset );
	if ( node !== null ) {
		return node.getRenderedPositionFromOffset( offset - this.getOffsetFromNode( node ) );
	}
	return null;
};
