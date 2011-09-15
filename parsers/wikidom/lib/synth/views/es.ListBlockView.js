/**
 * Creates an es.ParagraphBlockView object.
 */
es.ListBlockView = function( model ) {
	es.ViewContainer.call( this, model, 'list' );
	es.BlockView.call( this, model, 'list' );
	var view = this;
	this.on( 'update', function() {
		view.enumerate();
	} );
};

/**
 * Render content.
 */
es.ListBlockView.prototype.renderContent = function() {
	for ( var i = 0; i < this.views.length; i++ ) {
		this.views[i].renderContent();
	}
};

es.ListBlockView.prototype.enumerate = function() {
	var itemLevel,
		levels = [];

	for ( var i = 0; i < this.views.length; i++ ) {
		itemLevel = this.views[i].model.getLevel();
		levels = levels.slice(0, itemLevel + 1);
		if ( this.views[i].model.getStyle() === 'number' ) {
			if ( !levels[itemLevel] ) {
				levels[itemLevel] = 0;
			}
			this.views[i].setNumber( ++levels[itemLevel] );
		}
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

es.ListBlockView.prototype.getLength = function() {
	return this.model.items.getLengthOfItems();
};

es.ListBlockView.prototype.drawSelection = function( range ) {
	var selectedViews = this.views.select( range );
	for ( var i = 0; i < selectedViews.length; i++ ) {
		selectedViews[i].item.drawSelection(
			new es.Range( selectedViews[i].from, selectedViews[i].to )
		);
	}
};

es.extend( es.ListBlockView, es.ViewContainer );
es.extend( es.ListBlockView, es.BlockView );
