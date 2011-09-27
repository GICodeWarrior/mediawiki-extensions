/**
 * Creates an es.DocumentModelNode object.
 * 
 * @class
 * @constructor
 * @param {es.DocumentModel} documentModel Document model this node is a part of
 * @param {Integer} contentLength Length of contents
 * @property {es.DocumentModel} documentModel Document model this node is a part of
 * @property {Integer} contentLength Length of contents
 */
es.DocumentModelNode = function( documentModel, contentLength ) {
	// Inheritance
	es.ModelList.call( this );
	es.ModelItem.call( this );
	// Properties
	this.documentModel = documentModel;
	this.contentLength = contentLength || 0;
	// Events
	this.on( 'update', function() {
		// Recalculate length when child nodes change
		this.contentLength = 0;
		for ( var i = 0; i < this.length, i++ ) {
			this.contentLength += this[i].getElementLength();
		}
	} );
};

/* Methods */

es.DocumentModelNode.getContentLength = function() {
	return this.contentLength;
};

es.DocumentModelNode.getElementLength = function() {
	return this.contentLength + 2;
};

es.DocumentModelNode.getContent = function( range ) {
	return this.documentModel.getContent( this );
};

/* Inheritance */

es.extend( es.DocumentModelNode, es.ModelList );
es.extend( es.DocumentModelNode, es.ModelItem );
