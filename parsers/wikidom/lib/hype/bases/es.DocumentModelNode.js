/**
 * Creates an es.DocumentModelNode object.
 * 
 * @class
 * @constructor
 * @param {Integer} contentLength Length of contents
 * @property {Integer} contentLength Length of contents
 */
es.DocumentModelNode = function( contentLength ) {
	// Properties
	this.contentLength = contentLength || 0;
};

/* Methods */

es.DocumentModelNode.getContentLength = function() {
	return this.contentLength;
};

es.DocumentModelNode.getElementLength = function() {
	return this.contentLength + 2;
};
