/**
 * Creates an es.ParagraphModel object.
 * 
 * @class
 * @constructor
 */
es.ParagraphModel = function( length ) {
	// Inheritance
	es.DocumentModelNode.call( this, length );
};

/**
 * Creates a paragraph view for this model.
 * 
 * @returns {es.ParagraphView}
 */
es.ParagraphModel.prototype.createView = function() {
	// return new es.ParagraphView( this );
};

/* Registration */

es.DocumentModel.nodeModels.paragraph = es.ParagraphModel;

/* Inheritance */

es.extend( es.ParagraphModel, es.DocumentModelNode );
