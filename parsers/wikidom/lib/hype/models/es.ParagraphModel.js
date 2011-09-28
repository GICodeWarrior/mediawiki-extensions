/**
 * Creates an es.ParagraphModel object.
 * 
 * @class
 * @constructor
 */
es.ParagraphModel = function( length ) {
	// Inheritance
	es.DocumentModelNode.call( length );
};

/* Inheritance */

es.extend( es.ParagraphModel, es.DocumentModelNode );
