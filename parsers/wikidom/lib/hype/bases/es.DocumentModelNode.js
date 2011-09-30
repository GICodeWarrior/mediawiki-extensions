/**
 * Creates an es.DocumentModelNode object.
 * 
 * @class
 * @constructor
 * @param {Integer} contentLength Length of contents
 * @property {Integer} contentLength Length of contents
 */
es.DocumentModelNode = function( contentLength ) {
	// Inheritance
	es.ModelNode.call( this );
	
	// Properties
	this.contentLength = contentLength || 0;
};

/* Methods */

es.DocumentModelNode.getContentLength = function() {
	return this.contentLength;
};

/* Inheritance */

es.extend( es.DocumentModelNode, es.ModelNode );
