/**
 * Creates an es.ListItemView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewLeafNode}
 * @param {es.ListItemModel} model List item model to view
 */
es.ListItemView = function( model ) {
	// Inheritance
	es.DocumentViewLeafNode.call( this, model );

	// Properties
	this.$icon = $( '<div class="editSurface-listItem-icon"></div>' ).prependTo( this.$ );
	
	// DOM Changes
	this.$.addClass( 'editSurface-listItem' );

	// Events
	this.on( 'update', this.setClasses );

	// Initialization
	this.setClasses();
};

es.ListItemView.prototype.setClasses = function() {
	// TODO: Unset previously set classes in case of switching from bullet list to numbered list
	// or changing indentation level
	var styles = this.model.getElementAttribute( 'styles' );
	this.$.addClass( 'editSurface-listItem-' + styles[ styles.length - 1 ] )
		.addClass( 'editSurface-listItem-level' + ( styles.length - 1 ) );
};

es.ListItemView.prototype.setNumber = function( number ) {
	this.$icon.text( number + '.' );
};

/* Inheritance */

es.extendClass( es.ListItemView, es.DocumentViewLeafNode );
