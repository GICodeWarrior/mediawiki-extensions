/**
 * Creates an es.ParagraphBlockView object.
 */
es.ListBlockItemView = function( model ) {
	es.ViewContainerItem.call( this, model, 'listItem' );
	this.$icon = $( '<div class="editSurface-listItem-icon"></div>' );
	this.$content = $( '<div class="editSurface-listItem-content"></div>' );
	this.$
		.append( this.$icon )
		.append( this.$content )
		.addClass( 'editSurface-listItem-' + this.model.styles[this.model.styles.length - 1] )
		.addClass( 'editSurface-listItem-level' + ( this.model.styles.length - 1 ) );
	this.contentView = new es.ContentView( this.$content, this.model.content );
	var view = this;
	this.contentView.on( 'update', function() {
		view.emit( 'update' );
	} );
};

/**
 * Render content.
 */
es.ListBlockItemView.prototype.renderContent = function() {
	this.contentView.render();
};

es.ListBlockItemView.prototype.setNumber = function( number ) {
	this.$icon.text( number + '.' );
};

/**
 * Gets offset within content of position.
 */
es.ListBlockItemView.getContentOffset = function( position ) {
	return this.contentView.getOffset( position );
};

/**
 * Gets rendered position of offset within content.
 */
es.ListBlockItemView.getRenderedPosition = function( offset ) {
	return this.contentView.getPosition( position );
};

/**
 * Gets rendered line index of offset within content.
 */
es.ListBlockItemView.getRenderedLineIndex = function( offset ) {
	return this.contentView.getLineIndex( position );
};

es.ListBlockItemView.prototype.getLength = function() {
	return this.model.getLength();
};

es.ListBlockItemView.prototype.drawSelection = function( range ) {
	this.contentView.drawSelection( range );
};

es.extend( es.ListBlockItemView, es.ViewContainerItem );
