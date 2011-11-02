/**
 * Creates an es.TableView object.
 * 
 * @class
 * @constructor
 * @extends {es.DocumentViewBranchNode}
 * @param {es.TableModel} model Table model to view
 */
es.TableView = function( model ) {
	// Inheritance
	es.DocumentViewBranchNode.call( this, model, $( '<table>' ) );
	
	// DOM Changes
	this.$
		.attr( 'style', model.getElementAttribute( 'html/style' ) )
		.addClass( 'es-tableView' );
};

/* Inheritance */

es.extendClass( es.TableView, es.DocumentViewBranchNode );
