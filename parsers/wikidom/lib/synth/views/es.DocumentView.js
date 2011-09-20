/**
 * Creates an es.DocumentView object.
 * 
 * @class
 * @constructor
 */
es.DocumentView = function( documentModel ) {
	es.ViewList.call( this, documentModel );
	this.$.addClass( 'editSurface-document' )
};

/**
 * Render content.
 */
es.DocumentView.prototype.renderContent = function() {
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].renderContent();
	}
};

es.DocumentView.prototype.drawSelection = function( range ) {
	var selectedViews = this.items.select( range );
	for ( var i = 0; i < selectedViews.length; i++ ) {
		selectedViews[i].item.drawSelection(
			new es.Range( selectedViews[i].from, selectedViews[i].to )
		);
	}
};

es.DocumentView.prototype.getLength = function( ) {
	return this.items.getLengthOfItems();
};

/**
 * Gets HTML rendering of document.
 * 
 * @method
 * @returns {String} HTML data
 */
es.DocumentView.prototype.getHtml = function() {
	var views = this.items;
	return es.Html.makeTag(
		'div',
		{ 'class': this.$.attr( 'class' ) },
		$.map( this.items, function( view, i ) {
			return view.getHtml( { 'singular': i === 0 && views.length == 1 } );
		} ).join( '' )
	);
};

/* Inheritance */

es.extend( es.DocumentView, es.ViewList );
