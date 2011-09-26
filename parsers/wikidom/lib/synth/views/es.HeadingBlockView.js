es.HeadingBlockView = function( model ) {
	es.BlockView.call( this, model, $('<h' + model.level +'/>') );
	this.$.addClass( 'editSurface-headingBlock' );
	this.contentView = new es.ContentView( this.$, this.model.content );
	var view = this;
	this.contentView.on( 'update', function() {
		view.emit('update');
	} );
};

es.HeadingBlockView.prototype.drawSelection = function( range ) {
	this.contentView.drawSelection( range );
};

es.HeadingBlockView.prototype.clearSelection = function( range ) {
	this.contentView.clearSelection();
};

es.HeadingBlockView.prototype.renderContent = function() {
	this.contentView.render();
};

es.HeadingBlockView.prototype.getLength = function() {
	return this.model.getContentLength();
};

es.HeadingBlockView.prototype.getOffsetFromPosition = function( position ) {
	return this.contentView.getOffset( position );
};

es.extend( es.HeadingBlockView, es.BlockView );
