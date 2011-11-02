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
	var classes = this.$.attr( 'class' ),
		styles = this.model.getElementAttribute( 'styles' );
	this.$
		// Remove any existing level classes
		.attr(
			'class',
			classes
				.replace( /editSurface-listItem-level[0-9]+/, '' )
				.replace( /editSurface-listItem-(bullet|number)/, '' )
		)
		// Set the list style class from the style on top of the stack
		.addClass( 'editSurface-listItem-' + styles[styles.length - 1] )
		// Set the list level class from the length of the stack
		.addClass( 'editSurface-listItem-level' + ( styles.length - 1 ) );
};

es.ListItemView.prototype.setNumber = function( number ) {
	this.$icon.text( number + '.' );
};

/* Inheritance */

es.extendClass( es.ListItemView, es.DocumentViewLeafNode );
