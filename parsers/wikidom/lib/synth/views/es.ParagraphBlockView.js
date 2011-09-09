/**
 * Creates an es.ParagraphBlockView object.
 */
es.ParagraphBlockView = function( model ) {
	es.BlockView.call( this, model, 'paragraph' );
	this.contentView = new es.ContentView( this.$, this.model.content );
	var view = this;
	this.contentView.on( 'update', function() {
		view.emit('update');
	} );
};

/**
 * Render content.
 */
es.ParagraphBlockView.prototype.renderContent = function() {
	this.contentView.render();
};

/**
 * Gets offset within content of position.
 */
es.ParagraphBlockView.getContentOffset = function( position ) {
	return this.contentView.getOffset( position );
};

/**
 * Gets rendered position of offset within content.
 */
es.ParagraphBlockView.getRenderedPosition = function( offset ) {
	return this.contentView.getPosition( position );
};

/**
 * Gets rendered line index of offset within content.
 */
es.ParagraphBlockView.getRenderedLineIndex = function( offset ) {
	return this.contentView.getLineIndex( position );
};

es.extend( es.ParagraphBlockView, es.BlockView );
