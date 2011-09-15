/**
 * Creates an es.ParagraphBlockView object.
 */
es.TableBlockRowView = function( model ) {
	es.ViewContainer.call( this, model, 'row', 'tr' )
	es.ViewContainerItem.call( this, model, 'tr' );
	
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
	for ( var i = 0; i < this.views.length; i++ ) {
		this.views[i].renderContent();
	}
};

es.TableBlockRowView.prototype.getLength = function() {
	return this.views.getLengthOfItems();
};

es.TableBlockRowView.prototype.drawSelection = function( range ) {
	var selectedViews = this.views.select( range );
	for ( var i = 0; i < selectedViews.length; i++ ) {
		selectedViews[i].item.drawSelection(
			new es.Range( selectedViews[i].from, selectedViews[i].to )
		);
	}
};

/* Inheritance */

es.extend( es.TableBlockRowView, es.ViewContainer );
es.extend( es.TableBlockRowView, es.ViewContainerItem );
