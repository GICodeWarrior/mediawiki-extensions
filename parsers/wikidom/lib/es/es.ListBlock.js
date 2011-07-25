/**
 * es.ListBlock
 */
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

es.ListBlock.prototype.getText = function() {
	return '';
};

es.ListBlock.prototype.getLength = function() {
	return this.list.getLength();
};

/**
 * Renders content into a container.
 */
es.ListBlock.prototype.renderContent = function( offset ) {
	this.list.renderContent( offset );
};

es.ListBlock.prototype.getPosition = function( offset ) {
	var location = this.list.getLocationFromOffset( offset ),
		position = location.item.flow.getPosition( location.offset ),
		blockOffset = this.$.offset(),
		lineOffset = location.item.$line.find( '.editSurface-list-content' ).offset();

	position.top += lineOffset.top - blockOffset.top; 
	position.left += lineOffset.left - blockOffset.left;
	position.bottom += lineOffset.top - blockOffset.top;

	return position;
};

es.ListBlock.prototype.getOffset = function( position ) {
	var blockOffset = this.$.offset();
	position.top += blockOffset.top;
	position.left += blockOffset.left;
	return this.list.getOffsetFromPosition( position );
};

es.Block.models['list'] = es.ListBlock;

es.extend( es.ListBlock, es.Block );
