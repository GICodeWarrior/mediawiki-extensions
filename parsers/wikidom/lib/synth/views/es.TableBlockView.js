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

es.extend( es.TableBlockView, es.ViewContainer );
es.extend( es.TableBlockView, es.BlockView );
