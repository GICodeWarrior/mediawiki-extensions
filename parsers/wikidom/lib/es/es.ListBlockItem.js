es.ListBlockItem = function( content, style, level ) {
	es.EventEmitter.call( this );

	this.content = content || new es.Content();
	this.$ = $( '<div class="editSurface-list-content"></div>' )
			.addClass( 'editSurface-item-level' + level );
	this.flow = new es.Flow( this.$, this.content );

	var listBlockItem = this;
	this.flow.on( 'render', function() {
		listBlockItem.emit( 'update' );
	} );
}

es.ListBlockItem.prototype.renderContent = function( offset ) {
	this.flow.render();
};

es.extend( es.ListBlockItem, es.EventEmitter );