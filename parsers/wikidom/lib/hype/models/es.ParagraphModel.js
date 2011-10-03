/**
 * Creates an es.ParagraphModel object.
 * 
 * @class
 * @constructor
 */
es.ParagraphModel = function( length ) {
	// Extension
	return $.extend( new es.DocumentModelNode( length ), this );
};

/* Methods */

/**
 * Creates a paragraph view for this model.
 * 
 * @method
 * @returns {es.ParagraphView}
 */
es.ParagraphModel.prototype.createView = function() {
	// return new es.ParagraphView( this );
};

/* Registration */

es.DocumentModel.nodeModels.paragraph = es.ParagraphModel;
