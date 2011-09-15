es.DocumentView = function( documentModel ) {
	es.ViewContainer.call( this, documentModel, 'document' );
};

/**
 * Render content.
 */
es.DocumentView.prototype.renderContent = function() {
	for ( var i = 0; i < this.views.length; i++ ) {
		this.views[i].renderContent();
	}
};

es.DocumentView.prototype.drawSelection = function( range ) {
	var selectedViews = this.views.select( range );
	for ( var i = 0; i < selectedViews.length; i++ ) {
		selectedViews[i].item.drawSelection(
			new es.Range( selectedViews[i].from, selectedViews[i].to )
		);
	}
};

es.DocumentView.prototype.getLength = function( ) {
	return this.views.getLengthOfItems();
};

/* Inheritance */

es.extend( es.DocumentView, es.ViewContainer );
