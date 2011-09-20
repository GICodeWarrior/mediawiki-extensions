/**
 * Creates an es.TableBlockRowView object.
 * 
 * @class
 * @constructor
 */
es.TableBlockRowView = function( model ) {
	es.ViewList.call( this, model, $( '<tr>' ) );
	es.ViewListItem.call( this, model, this.$ );	
	
	var classes = this.$.attr('class');
	for ( var name in this.model.attributes ) {
		this.$.attr( name, this.model.attributes[name] );
	}
	this.$.addClass(classes);
};

/**
 * Render content.
 */
es.TableBlockRowView.prototype.renderContent = function() {
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].renderContent();
	}
};

es.TableBlockRowView.prototype.getLength = function() {
	return this.items.getLengthOfItems();
};

es.TableBlockRowView.prototype.drawSelection = function( range ) {
	var selectedViews = this.items.select( range );
	for ( var i = 0; i < selectedViews.length; i++ ) {
		selectedViews[i].item.drawSelection(
			new es.Range( selectedViews[i].from, selectedViews[i].to )
		);
	}
};

/**
 * Gets HTML rendering of row.
 * 
 * @method
 * @param options {Object} List of options, see es.DocumentView.getHtml for details
 * @returns {String} HTML data
 */
es.TableBlockRowView.prototype.getHtml = function( options ) {
	return es.Html.makeTag( 'tr', this.model.attributes, $.map( this.items, function( view ) {
		return view.getHtml();
	} ).join( '' ) );
};

/* Inheritance */

es.extend( es.TableBlockRowView, es.ViewList );
es.extend( es.TableBlockRowView, es.ViewListItem );
