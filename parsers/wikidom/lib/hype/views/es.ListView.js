/**
 * Creates an es.ListView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewNode}
 */
es.ListView = function( model ) {
	// Extension
	var view = $.extend( new es.DocumentViewNode( model ), this );

	return view;
};

/* Methods */

/**
 * Render content.
 * 
 * @method
 */
es.ListView.prototype.renderContent = function() {
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
es.ListView.prototype.drawSelection = function( range ) {
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
es.ListView.prototype.clearSelection = function() {
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
es.ListView.prototype.getOffsetFromRenderedPosition = function( position ) {
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
es.ListView.prototype.getRenderedPositionFromOffset = function( offset ) {
	var node = this.getNodeFromOffset( offset );
	if ( node !== null ) {
		return node.getRenderedPositionFromOffset( offset - this.getOffsetFromNode( node ) );
	}
	return null;
};
