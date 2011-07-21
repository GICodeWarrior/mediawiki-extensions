es.List = function( style, items ) {
	this.style = style;
	this.listItems = [];
	
	for ( var i = 0; i < items.length; i++ ) {
		this.listItems.push( new es.ListItem( items[i].line, items[i].lists || [] ) );
	}
}

es.ListItem = function( line, lists ) {
	this.line = line;
	this.lists = [];

	for ( var i = 0; i < lists.length; i++ ) {
		this.lists.push( new es.List( lists[i].style, lists[i].items ));
	}
}

es.ListBlock = function( style, items ) {
//	var list = new es.List( style, items );
}

es.extend( es.ListBlock, es.Block );
