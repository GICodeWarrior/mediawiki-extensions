/**
 * Creates an es.ParagraphBlockView object.
 */
es.ListBlockItemView = function( model ) {
	es.BlockView.call( this, model, 'item' );
	this.contentView = new es.ContentView( this.$, this.model.content );
};

/**
 * Render content.
 */
es.ListBlockItemView.prototype.renderContent = function() {
	this.contentView.render();
};

/**
 * Gets offset within content of position.
 */
es.ListBlockItemView.getContentOffset = function( position ) {
	return this.contentView.getOffset( position );
};

/**
 * Gets rendered position of offset within content.
 */
es.ListBlockItemView.getRenderedPosition = function( offset ) {
	return this.contentView.getPosition( position );
};

/**
 * Gets rendered line index of offset within content.
 */
es.ListBlockItemView.getRenderedLineIndex = function( offset ) {
	return this.contentView.getLineIndex( position );
};

es.extend( es.ListBlockItemView, es.BlockView );
