/**
 * Creates an es.ParagraphBlockView object.
 * 
 * @class
 * @extends {es.BlockView}
 * @constructor
 */
es.ParagraphBlockView = function( model ) {
	es.BlockView.call( this, model );
	this.$.addClass( 'editSurface-paragraphBlock' );
	this.contentView = new es.ContentView( this.$, this.model.content );
	var view = this;
	this.contentView.on( 'update', function() {
		view.emit('update');
	} );
};

/* Methods */

/**
 * Gets the offset of a position.
 * 
 * @method
 * @param position {es.Position} Position to translate
 * @returns {Integer} Offset nearest to position
 */
es.ParagraphBlockView.prototype.getOffsetFromPosition = function( position ) {
	var blockPosition = this.$.offset();
	position.left -= blockPosition.left;
	position.top -= blockPosition.top;
	return this.contentView.getOffset( position );
};

/**
 * Render content.
 * 
 * @method
 */
es.ParagraphBlockView.prototype.renderContent = function() {
	this.contentView.render();
};

/**
 * Gets offset within content of position.
 * 
 * @method
 * @param position {es.Position} Position to get offset for
 * @returns {Integer} Offset nearest to position
 */
es.ParagraphBlockView.prototype.getContentOffset = function( position ) {
	return this.contentView.getOffset( position );
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param offset {Integer} Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.ParagraphBlockView.prototype.getRenderedPosition = function( offset ) {
	return this.contentView.getPosition( position );
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param range {es.Range} Range of content to draw selection around
 */
es.ParagraphBlockView.prototype.drawSelection = function( range ) {
	this.contentView.drawSelection( range );
};

/**
 * Gets length of contents.
 * 
 * @method
 * @returns {Integer} Length of content, including any virtual spaces within the block
 */
es.ParagraphBlockView.prototype.getLength = function() {
	return this.model.getContentLength();
};

/**
 * Gets HTML rendering of block.
 * 
 * @method
 * @param options {Object} List of options, see es.DocumentView.getHtml for details
 * @returns {String} HTML data
 */
es.ParagraphBlockView.prototype.getHtml = function( options ) {
	var html = this.contentView.getHtml();
	if ( !options.singular ) {
		html = es.Html.makeTag( 'div', { 'class': this.$.attr( 'class' ) }, html );
	}
	return html;
};

/* Inheritance */

es.extend( es.ParagraphBlockView, es.BlockView );
