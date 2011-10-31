/**
 * Creates an es.DocumentViewBranchNode object.
 * 
 * @class
 * @constructor
 * @extends {es.ViewNode}
 * @param model {es.ModelNode} Model to observe
 * @param {jQuery} [$element] Element to use as a container
 */
es.DocumentViewBranchNode = function( model, $element, horizontal ) {
	this.horizontal = horizontal || false;
	// Extension
	return es.extendObject( new es.DocumentNode( new es.ViewNode( model, $element ) ), this );
};

/* Methods */

/**
 * Render content.
 * 
 * @method
 */
es.DocumentViewBranchNode.prototype.renderContent = function() {
	for ( var i = 0; i < this.length; i++ ) {
		this[i].renderContent();
	}
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param {es.Range} range Range of content to draw selection around
 */
es.DocumentViewBranchNode.prototype.drawSelection = function( range ) {
	var nodes = this.selectNodes( range, true );
	for ( var i = 0; i < this.length; i++ ) {
		if ( nodes.length && this[i] === nodes[0].node ) {
			for ( var j = 0; j < nodes.length; j++ ) {
				nodes[j].node.drawSelection( nodes[j].range );
				i++;
			}
		} else {
			this[i].clearSelection();
		}
	}
};

/**
 * Clear selection.
 * 
 * @method
 */
es.DocumentViewBranchNode.prototype.clearSelection = function() {
	for ( var i = 0; i < this.length; i++ ) {
		this[i].clearSelection();
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
		if ( this.horizontal && this[i].$.offset().left > position.left ) {
			break;
		} else if ( this[i].$.offset().top > position.top ) {
			break;			
		}
		node = this[i];
	}
	return node.getParent().getOffsetFromNode( node, true ) +
		node.getOffsetFromRenderedPosition( position ) + 1;
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param {Integer} offset Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.DocumentViewBranchNode.prototype.getRenderedPositionFromOffset = function( offset ) {
	var node = this.getNodeFromOffset( offset, true );
	if ( node !== null ) {
		return node.getRenderedPositionFromOffset(
			offset - this.getOffsetFromNode( node, true ) - 1
		);
	}
	return null;
};

/**
 * Gets the length of the content in the model.
 * 
 * @method
 * @returns {Integer} Length of content
 */
es.DocumentViewBranchNode.prototype.getElementLength = function() {
	return this.model.getElementLength();
};

es.DocumentViewBranchNode.prototype.getRenderedLineRange = function( offset ) {
	var node = this.getNodeFromOffset( offset, true );
	if ( node !== null ) {
		var nodeOffset = this.getOffsetFromNode( node, true );
		return es.Range.newFromTranslatedRange(
			node.getRenderedLineRange( offset - nodeOffset - 1 ),
			nodeOffset + 1
		);
	}
	return null;
};