/**
 * Creates an es.ParagraphBlockView object.
 */
es.TableBlockCellView = function( model ) {
	es.ViewContainerItem.call( this, model, 'cell', 'td' );
	
	this.documentView = new es.DocumentView( this.model.documentModel );
	this.$.append( this.documentView.$ );

	var classes = this.$.attr('class');
	for ( var name in this.model.attributes ) {
		this.$.attr( name, this.model.attributes[name] );
	}
	this.$.addClass(classes);
};

/**
 * Render content.
 */
es.TableBlockCellView.prototype.renderContent = function() {
	//debugger;
	this.documentView.renderContent();
};

es.extend( es.TableBlockCellView, es.ViewContainerItem );
