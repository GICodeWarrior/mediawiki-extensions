/**
 * 
 */
es.ParagraphBlockView = function( model ) {
	es.BlockView.call( this, 'paragraph' );
	this.model = model;
};

es.extend( es.ParagraphBlockView, es.BlockView );
