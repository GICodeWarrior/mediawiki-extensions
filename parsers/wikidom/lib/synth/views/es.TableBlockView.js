/**
 * Creates an es.TableBlockView object.
 * 
 * @class
 * @extends {es.ViewList}
 * @extends {es.BlockView}
 * @constructor
 */
es.TableBlockView = function( model ) {
	es.ViewList.call( this, model, $( '<table>' ) );
	es.BlockView.call( this, model, this.$ );
	this.$.attr( this.model.attributes );
	this.$.addClass( 'editSurface-tableBlock' );
};

/* Methods */

/**
 * Gets the offset of a position.
 * 
 * @method
 * @param position {es.Position} Position to translate
 * @returns {Integer} Offset nearest to position
 */
es.TableBlockView.prototype.getOffsetFromPosition = function( position ) {
	if ( this.items.length === 0 ) {
		return 0;
	}
	
	var rowView = this.items[0];

	for ( var i = 0; i < this.items.length; i++ ) {
		if ( this.items[i].$.offset().top >= position.top ) {
			break;
		}
		rowView = this.items[i];
	}
	
	return rowView.list.items.offsetOf( rowView ) + rowView.getOffsetFromPosition( position );
};

/**
 * Render content.
 * 
 * @method
 */
es.TableBlockView.prototype.renderContent = function() {
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
es.TableBlockView.prototype.getContentOffset = function( position ) {
	// TODO
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param offset {Integer} Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.TableBlockView.prototype.getRenderedPosition = function( offset ) {
	// TODO
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param range {es.Range} Range of content to draw selection around
 */
es.TableBlockView.prototype.drawSelection = function( range ) {
	var selectedViews = this.items.select( range );
	for ( var i = 0; i < selectedViews.length; i++ ) {
		selectedViews[i].item.drawSelection(
			new es.Range( selectedViews[i].from, selectedViews[i].to )
		);
	}
};

/**
 * Gets length of contents.
 * 
 * @method
 * @returns {Integer} Length of content, including any virtual spaces within the block
 */
es.TableBlockView.prototype.getLength = function() {
	return this.items.getLengthOfItems();
};

/**
 * Gets HTML rendering of block.
 * 
 * @method
 * @param options {Object} List of options, see es.DocumentView.getHtml for details
 * @returns {String} HTML data
 */
es.TableBlockView.prototype.getHtml = function( options ) {
	return es.Html.makeTag( 'table', this.model.attributes, $.map( this.items, function( view ) {
		return view.getHtml();
	} ).join( '' ) );
}

/* Inheritance */

es.extend( es.TableBlockView, es.ViewList );
es.extend( es.TableBlockView, es.BlockView );
