/**
 * Creates an es.ParagraphBlockView object.
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
	for ( var i = 0; i < this.views.length; i++ ) {
		this.views[i].renderContent();
	}
};

es.TableBlockView.prototype.getLength = function() {
	return this.views.getLengthOfItems();
};

es.TableBlockView.prototype.drawSelection = function( range ) {
	var selectedViews = this.views.select( range );
	for ( var i = 0; i < selectedViews.length; i++ ) {
		selectedViews[i].item.drawSelection(
			new es.Range( selectedViews[i].from, selectedViews[i].to )
		);
	}
};

/* Inheritance */

es.extend( es.TableBlockView, es.ViewContainer );
es.extend( es.TableBlockView, es.BlockView );
