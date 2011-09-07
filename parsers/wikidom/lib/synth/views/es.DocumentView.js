es.DocumentView = function( documentModel ) {
	es.ViewContainer.call( this, documentModel, 'blocks' );
};

es.DocumentView.prototype.createItemView = function( itemModel ) {
	return itemModel.createView();
};

/* Inheritance */

es.extend( es.DocumentView, es.ViewContainer );
