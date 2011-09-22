/**
 * Creates an es.TableBlockCellView object.
 * 
 * @class
 * @extends {es.ViewListItem}
 * @constructor
 */
es.TableBlockCellView = function( model ) {
	es.ViewList.call( this, model, $( '<td>' ) );
	es.ViewListItem.call( this, model, this.$ );
	this.$.attr( this.model.attributes );
};

/* Methods */

es.TableBlockCellView.prototype.getOffsetFromPosition = function( position ) {
	var blockOffset;
	var itemHeight;
	
	for ( var i = 0; i < this.items.length; i++ ) {
		blockOffset = this.items[i].$.offset();
		if ( position.top >= blockOffset.top ) {
			itemHeight = this.items[i].$.height();
			if ( position.top < blockOffset.top + itemHeight ) {
				return this.items[i].getOffsetFromPosition( position );
			}
		}
	}
};


/**
 * Render content.
 * 
 * @method
 */
es.TableBlockCellView.prototype.renderContent = function() {
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].renderContent();
	}
};

/**
 * Gets offset within content of position.
 * 
 * @method
 * @param position {es.Position} Position to get offset for
 * @returns {Integer} Offset nearest to position
 */
es.TableBlockCellView.prototype.getContentOffset = function( position ) {
	// TODO
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param offset {Integer} Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.TableBlockCellView.prototype.getRenderedPosition = function( offset ) {
	// TODO
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param range {es.Range} Range of content to draw selection around
 */
es.TableBlockCellView.prototype.drawSelection = function( range ) {
	this.documentView.drawSelection( range );
};

/**
 * Gets length of contents.
 * 
 * @method
 * @returns {Integer} Length of content, including any virtual spaces within the block
 */
es.TableBlockCellView.prototype.getLength = function() {
	return this.documentView.getLength();
};

/**
 * Gets HTML rendering of block.
 * 
 * @method
 * @param options {Object} List of options, see es.DocumentView.getHtml for details
 * @returns {String} HTML data
 */
es.TableBlockCellView.prototype.getHtml = function( options ) {
	return es.Html.makeTag( 'td', this.model.attributes, this.documentView.getHtml() );
}

/* Inheritance */

es.extend( es.TableBlockCellView, es.ViewListItem );
es.extend( es.TableBlockCellView, es.ViewList );