/**
 * Creates an es.HeadingView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewLeafNode}
 * @param {es.HeadingModel} model Heading model to view
 */
es.HeadingView = function( model ) {
	// Inheritance
	es.DocumentViewLeafNode.call( this, model, $( '<h' + model.getElementAttribute( 'level' )  + '>') );

	// DOM Changes
	this.$.addClass( 'editSurface-headingBlock' );
};

/* Inheritance */

es.extendClass( es.HeadingView, es.DocumentViewLeafNode );
