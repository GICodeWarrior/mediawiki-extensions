/**
 * Creates an es.TableBlockCellView object.
 * 
 * @class
 * @extends {es.ViewListItem}
 * @constructor
 */
es.TableBlockCellView = function( model ) {
	es.ViewListItem.call( this, model, $( '<td>' ) );
	this.documentView = new es.DocumentView( this.model.documentModel );
	this.$.append( this.documentView.$ );
	this.$.attr( this.model.attributes );
};

/* Methods */

/**
 * Render content.
 * 
 * @method
 */
es.TableBlockCellView.prototype.renderContent = function() {
	this.documentView.renderContent();
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
