es.ListBlockItem = function( content, style, level ) {
	es.EventEmitter.call( this );

	this.content = content || new es.Content();
	this.$ = $( '<div class="editSurface-listItem editSurface-listItem-content"></div>' )
			.addClass( 'editSurface-listItem-level' + level )
			.addClass( 'editSurface-listItem-' + style );
	this.flow = new es.Flow( this.$, this.content );
	// Listen to render events and trigger update event upstream
	var listBlockItem = this;
	this.flow.on( 'render', function() {
		listBlockItem.emit( 'update' );
	} );
}

es.ListBlockItem.prototype.setLevel = function( level ) {
	this.$.removeClass( 'editSurface-listItem-level' + this.level );
	this.level = level;
	this.$.addClass( 'editSurface-listItem-level' + this.level );
};

es.ListBlockItem.prototype.setStyle = function( style ) {
	this.$.removeClass( 'editSurface-listItem-' + this.style );
	this.style = style;
	this.$.addClass( 'editSurface-listItem-' + this.style );
};

es.ListBlockItem.prototype.renderContent = function( offset ) {
	this.flow.render();
};

es.extend( es.ListBlockItem, es.EventEmitter );