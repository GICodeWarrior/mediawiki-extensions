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

/* Inheritance */

es.extend( es.DocumentView, es.ViewContainer );
