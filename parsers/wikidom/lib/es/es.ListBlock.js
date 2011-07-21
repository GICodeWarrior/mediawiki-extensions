es.ListBlockList = function( style, items ) {
	// Convert items to es.ListBlockItem objects
	var listItems = [];
	for ( var i = 0; i < items.length; i++ ) {
		listItems.push( new es.ListBlockItem( items[i].line, items[i].lists || [] ) );
	}
	/*
	 * Initialize container
	 * 
	 * - Adds class to container: "editSurface-list"
	 * - Sets .data( 'list', this )
	 * - Adds this.items array
	 */
	es.Container.call( this, 'list', 'items', listItems );
	
	this.style = style;
}

/**
 * Renders content into a container.
 */
es.ListBlockList.prototype.renderContent = function( offset ) {
	// TODO: Abstract offset and use it when rendering
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].renderContent();
	}
};

es.extend( es.ListBlockList, es.Container );

es.ListBlockItem = function( line, lists ) {
	// Convert items to es.ListBlockItem objects
	var itemLists = [];
	for ( var i = 0; i < lists.length; i++ ) {
		itemLists.push( new es.ListBlockList( lists[i].style, lists[i].items || [] ) );
	}
	/*
	 * Initialize container
	 * 
	 * - Adds class to container: "editSurface-item"
	 * - Sets .data( 'item', this )
	 * - Adds this.lists array
	 */
	es.Container.call( this, 'item', 'lists', itemLists );
	
	this.$line = $( '<div class="editSurface-list-line"></div>' ).prependTo( this.$ );
	
	this.content = line ? es.Content.newFromLine( line ) : new es.Content();
	this.flow = new es.TextFlow( this.$line, this.content );
	var item = this;
	this.flow.on( 'render', function() {
		item.emit( 'update' );
	} );
}

es.ListBlockItem.prototype.renderContent = function( offset ) {
	// TODO: Abstract offset and use it when rendering
	this.flow.render();
	for ( var i = 0; i < this.lists.length; i++ ) {
		this.lists[i].renderContent();
	}
};

es.extend( es.ListBlockItem, es.Container );

es.ListBlock = function( style, items ) {
	es.Block.call( this );
	this.list = new es.ListBlockList( style, items );
	this.$ = this.list.$
		.addClass( 'editSurface-block' )
		.data( 'block', this );
}

es.ListBlock.newFromWikidom = function( wikidomList ) {
	return new es.ListBlock( wikidomList.style, wikidomList.items );
};

/**
 * Renders content into a container.
 */
es.ListBlock.prototype.renderContent = function( offset ) {
	this.list.renderContent( offset );
};

es.Block.models['list'] = es.ListBlock;

es.extend( es.ListBlock, es.Block );
