es.ListBlockList = function( items ) {
	es.Container.call( this, 'list', 'items', items );
};

es.ListBlockList.newFromWikiDomList = function( wikidomList ) {
	var items = [];
	es.ListBlockList.flattenList( wikidomList, items, 0 );
	return new es.ListBlockList( items );
};

es.ListBlockList.prototype.renderContent = function( offset ) {
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].renderContent();
	}
};

es.ListBlockList.flattenList = function( wikidomList, items, level ) {
	for ( var i = 0; i < wikidomList.items.length; i++ ) {
		items.push(
			new es.ListBlockItem(
				es.Content.newFromWikiDomLine( wikidomList.items[i].line ),
				wikidomList.style,
				level
			)
		);
		if ( wikidomList.items[i].lists ) {
			level++;
			for ( var j = 0; j < wikidomList.items[i].lists.length; j++ ) {
				es.ListBlockList.flattenList( wikidomList.items[i].lists[j], items, level );
			}
			level--;
		}
	}
};

es.extend( es.ListBlockList, es.Container );
