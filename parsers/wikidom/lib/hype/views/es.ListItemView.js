/**
 * Creates an es.ListItemView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewLeafNode}
 */
es.ListItemView = function( model ) {
	// Extension
	var view = es.extendObject( new es.DocumentViewLeafNode( model ), this );
	view.$icon = $( '<div class="editSurface-listItem-icon"></div>' ).prependTo( view.$ );
	view.$.addClass( 'editSurface-listItem' );
	view.on( 'update', view.setClasses );
	view.setClasses();
	return view;
};

es.ListItemView.prototype.setClasses = function() {
	// TODO: Unset previously set classes in case of switching from bullet list to numbered list
	// or changing indentation level
	var styles = this.model.getElementAttribute( 'styles' );
	this.$.addClass( 'editSurface-listItem-' + styles[ styles.length - 1 ] )
		.addClass( 'editSurface-listItem-level' + ( styles.length - 1 ) );
};