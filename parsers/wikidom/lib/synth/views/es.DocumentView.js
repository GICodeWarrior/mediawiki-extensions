es.DocumentView = function( documentModel ) {
	es.ViewContainer.call( this, documentModel, 'blocks' );
};

/* Inheritance */

es.extend( es.DocumentView, es.ViewContainer );
