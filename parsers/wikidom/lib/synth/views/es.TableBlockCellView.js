/**
 * Creates an es.TableBlockCellView object.
 * 
 * @class
 * @constructor
 */
es.TableBlockCellView = function( model ) {
	es.ViewListItem.call( this, model, $( '<td>' ) );
	this.documentView = new es.DocumentView( this.model.documentModel );
	this.$.append( this.documentView.$ );
	this.$.attr( this.model.attributes );
};

/**
 * Render content.
 */
es.TableBlockCellView.prototype.renderContent = function() {
	this.documentView.renderContent();
};

es.TableBlockCellView.prototype.getLength = function() {
	return this.documentView.getLength();
};

es.TableBlockCellView.prototype.drawSelection = function( range ) {
	this.documentView.drawSelection( range );
};

/**
 * Gets HTML rendering of cell.
 * 
 * @method
 * @param options {Object} List of options, see es.DocumentView.getHtml for details
 * @returns {String} HTML data
 */
es.TableBlockCellView.prototype.getHtml = function( options ) {
	return es.Html.makeTag( 'td', this.model.attributes, this.documentView.getHtml() );
};

/* Inheritance */

es.extend( es.TableBlockCellView, es.ViewListItem );
