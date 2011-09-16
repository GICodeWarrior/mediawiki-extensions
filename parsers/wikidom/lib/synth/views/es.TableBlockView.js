/**
 * Creates an es.TableBlockView object.
 * 
 * @class
 * @constructor
 */
es.TableBlockView = function( model ) {
	es.ViewContainer.call( this, model, 'table', 'table' );
	es.BlockView.call( this, model, 'table', 'table' );
	
	var classes = this.$.attr('class');
	for ( var name in this.model.attributes ) {
		this.$.attr( name, this.model.attributes[name] );
	}
	this.$.addClass(classes);
};

/**
 * Render content.
 */
es.TableBlockView.prototype.renderContent = function() {
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].renderContent();
	}
};

es.TableBlockView.prototype.getLength = function() {
	return this.items.getLengthOfItems();
};

es.TableBlockView.prototype.drawSelection = function( range ) {
	var selectedViews = this.items.select( range );
	for ( var i = 0; i < selectedViews.length; i++ ) {
		selectedViews[i].item.drawSelection(
			new es.Range( selectedViews[i].from, selectedViews[i].to )
		);
	}
};

/**
 * Gets HTML rendering of block.
 * 
 * @method
 * @param options {Object} List of options, see es.DocumentView.getHtml for details
 * @returns {String} HTML data
 */
es.TableBlockView.prototype.getHtml = function( options ) {
	return es.Html.makeTag( 'table', this.model.attributes, $.map( this.items, function( view ) {
		return view.getHtml();
	} ).join( '' ) );
};

/* Inheritance */

es.extend( es.TableBlockView, es.ViewContainer );
es.extend( es.TableBlockView, es.BlockView );
