/**
 * Creates an es.ListView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewBranchNode}
 */
es.ListView = function( model ) {
	// Extension
	var view = es.extendObject( new es.DocumentViewBranchNode( model ), this );
	view.$.addClass( 'editSurface-listBlock' );
	view.on( 'update', view.enumerate );
	view.enumerate();
	return view;
};



/**
 * Set the number labels of all ordered list items.
 * 
 * @method
 */
es.ListView.prototype.enumerate = function() {
	var styles,
		levels = [];

	for ( var i = 0; i < this.length; i++ ) {
		styles = this[i].model.getElementAttribute( 'styles' );
		levels = levels.slice( 0, styles.length );
		if ( styles[ styles.length - 1 ] === 'number' ) {
			if ( !levels[ styles.length - 1 ] ) {
				levels[ styles.length - 1 ] = 0;
			}
			this[i].setNumber( ++levels[ styles.length - 1 ] );
		}
	}
};