/**
 * Creates an es.ParagraphModel object.
 * 
 * @class
 * @constructor
 */
es.ParagraphModel = function( length ) {
	// Inheritance
	es.DocumentModelNode.call( length );
	es.ModelItem.call( this );
};

/* Inheritance */

es.extend( es.ParagraphModel, es.DocumentModelNode );
es.extend( es.ParagraphModel, es.ModelItem );
