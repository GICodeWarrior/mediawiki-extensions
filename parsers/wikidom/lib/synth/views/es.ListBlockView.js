/**
 * Creates an es.ParagraphBlockView object.
 */
es.ListBlockView = function( model ) {
	es.ViewContainer.call( this, model, 'list' );
	es.ViewContainerItem.call( this, model, 'list' );
	this.contentView = new es.ContentView( this.$, this.model.content );
};

/**
 * Render content.
 */
es.ListBlockView.prototype.renderContent = function() {
	this.contentView.render();
};

/**
 * Gets offset within content of position.
 */
es.ListBlockView.getContentOffset = function( position ) {
	return this.contentView.getOffset( position );
};

/**
 * Gets rendered position of offset within content.
 */
es.ListBlockView.getRenderedPosition = function( offset ) {
	return this.contentView.getPosition( position );
};

/**
 * Gets rendered line index of offset within content.
 */
es.ListBlockView.getRenderedLineIndex = function( offset ) {
	return this.contentView.getLineIndex( position );
};

es.extend( es.ListBlockView, es.ViewContainer );
es.extend( es.ListBlockView, es.ViewContainerItem );
