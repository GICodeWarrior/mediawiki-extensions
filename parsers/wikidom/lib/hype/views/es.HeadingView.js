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

	// Events
	this.on( 'update', this.setClasses );

	// Initialization
	this.setClasses();
};

/* Methods */

es.HeadingView.prototype.setClasses = function() {
	var classes = this.$.attr( 'class' ),
		level = this.model.getElementAttribute( 'level' );
	this.$
		// Remove any existing level classes
		.attr( 'class', classes.replace( /editSurface-headingBlock-level[1-6]/, '' ) )
		// Add a new level class
		.addClass( 'editSurface-headingBlock-level' + level );
};

/* Inheritance */

es.extendClass( es.HeadingView, es.DocumentViewLeafNode );
