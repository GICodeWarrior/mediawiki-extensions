/**
 * Creates an es.HeadingModel object.
 * 
 * @class
 * @constructor
 */
es.HeadingModel = function( element, length ) {
	// Extension
	return es.extendObject( new es.DocumentModelNode( element, length ), this );
};

/* Methods */

/**
 * Creates a heading view for this model.
 * 
 * @method
 * @returns {es.ParagraphView}
 */
es.HeadingModel.prototype.createView = function() {
	return new es.HeadingView( this );
};

/* Registration */

es.DocumentModel.nodeModels.heading = es.HeadingModel;

es.DocumentModel.nodeRules.heading = {
	'parents': null,
	'children': []
};
