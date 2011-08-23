/**
 * Creates a list block list.
 * 
 * @class
 * @constructor
 * @extends {es.Container}
 * @param list {es.ListBlockItem} Flat list to initialize with
 */
es.ListBlockList = function( items ) {
	es.DomContainer.call( this, 'list', 'items', items );
};

/* Static Methods */

/**
 * Creates a new list block list object from WikiDom data.
 * 
 * @static
 * @method
 * @param wikidomList {Object} WikiDom data to convert from
 * @returns {es.ListBlockList} List block list
 */
es.ListBlockList.newFromWikiDomList = function( wikidomList ) {
	var items = [],
		styles = [];
	es.ListBlockList.flattenList( wikidomList, items, styles );
	return new es.ListBlockList( items );
};

es.ListBlockList.flattenList = function( wikidomList, items, styles ) {
	styles.push( wikidomList.style );
	for ( var i = 0; i < wikidomList.items.length; i++ ) {
		if ( typeof wikidomList.items[i].line !== 'undefined' ) {
			items.push(
				new es.ListBlockItem(
					es.Content.newFromWikiDomLine( wikidomList.items[i].line ),
					styles.slice(0)
				)
			);
		}
		if ( wikidomList.items[i].lists ) {
			for ( var j = 0; j < wikidomList.items[i].lists.length; j++ ) {
				es.ListBlockList.flattenList( wikidomList.items[i].lists[j], items, styles );
			}
		}
	}
	styles.pop();
};

/* Public Methods */

es.ListBlockList.prototype.renderContent = function( offset ) {
	// TODO: If offset is passed then render only item containing that offset
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].renderContent();
	}
};

/* Inheritance */
es.extend( es.ListBlockList, es.DomContainer );
