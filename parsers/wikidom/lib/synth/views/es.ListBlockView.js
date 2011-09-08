/**
 * Creates an es.ParagraphBlockView object.
 */
es.ListBlockView = function( model ) {
	es.ViewContainer.call( this, model, 'items' );
	es.BlockView.call( this, model, 'list' );
};

/**
 * Render content.
 */
es.ListBlockView.prototype.renderContent = function() {
	for ( var i = 0; i < this.views.length; i++ ) {
		this.views[i].renderContent();
	}
};

/**
 * Gets offset within content of position.
 */
es.ListBlockView.getContentOffset = function( position ) {
	//return this.contentView.getOffset( position );
};

/**
 * Gets rendered position of offset within content.
 */
es.ListBlockView.getRenderedPosition = function( offset ) {
	//return this.contentView.getPosition( position );
};

/**
 * Gets rendered line index of offset within content.
 */
es.ListBlockView.getRenderedLineIndex = function( offset ) {
	//return this.contentView.getLineIndex( position );
};

es.extend( es.ListBlockView, es.ViewContainer );
es.extend( es.ListBlockView, es.BlockView );
