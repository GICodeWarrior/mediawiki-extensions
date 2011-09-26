/**
 * Creates an es.ListBlockItemView object.
 * 
 * @class
 * @extends {es.ViewListItem}
 * @constructor
 */
es.ListBlockItemView = function( model ) {
	es.ViewListItem.call( this, model );
	this.$.addClass( 'editSurface-listItem' );
	this.$icon = $( '<div class="editSurface-listItem-icon"></div>' );
	this.$content = $( '<div class="editSurface-listItem-content"></div>' );
	this.$
		.append( this.$icon )
		.append( this.$content )
		.addClass( 'editSurface-listItem-' + this.model.styles[this.model.styles.length - 1] )
		.addClass( 'editSurface-listItem-level' + ( this.model.styles.length - 1 ) );
	this.contentView = new es.ContentView( this.$content, this.model.content );
	var view = this;
	this.contentView.on( 'update', function() {
		view.emit( 'update' );
	} );
};

/* Methods */


/**
 * Render content.
 * 
 * @method
 */
es.ListBlockItemView.prototype.renderContent = function() {
	this.contentView.render();
};

/**
 * Gets offset within content of position.
 * 
 * @method
 * @param position {es.Position} Position to get offset for
 * @returns {Integer} Offset nearest to position
 */
es.ListBlockItemView.prototype.getContentOffset = function( position ) {
	return this.contentView.getOffset( position );
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param offset {Integer} Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.ListBlockItemView.prototype.getRenderedPosition = function( offset ) {
	return this.contentView.getPosition( position );
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param range {es.Range} Range of content to draw selection around
 */
es.ListBlockItemView.prototype.drawSelection = function( range ) {
	this.contentView.drawSelection( range );
};

es.ListBlockItemView.prototype.clearSelection = function() {
	this.contentView.clearSelection();
};

/**
 * Gets length of contents.
 * 
 * @method
 * @returns {Integer} Length of content, including any virtual spaces within the block
 */
es.ListBlockItemView.prototype.getLength = function() {
	return this.model.getLength();
};

/**
 * Gets HTML rendering of block.
 * 
 * @method
 * @param options {Object} List of options, see es.DocumentView.getHtml for details
 * @returns {String} HTML data
 */
es.ListBlockItemView.prototype.getHtml = function( options ) {
	return es.Html.makeTag(
		'div',
		{ 'class': this.$.attr( 'class' ) },
		this.contentView.getHtml()
	);
}

/**
 * Sets the number label of the item, used for unordered lists
 * 
 * @method
 */
es.ListBlockItemView.prototype.setNumber = function( number ) {
	this.$icon.text( number + '.' );
};

/* Inheritance */

es.extend( es.ListBlockItemView, es.ViewListItem );
