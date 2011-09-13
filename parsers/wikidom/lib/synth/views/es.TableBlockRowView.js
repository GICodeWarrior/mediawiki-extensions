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

es.extend( es.TableBlockRowView, es.ViewContainer );
es.extend( es.TableBlockRowView, es.ViewContainerItem );
