/**
 * Creates an es.DocumentView object.
 * 
 * @class
 * @extends {es.ViewList}
 * @constructor
 */
es.DocumentView = function( documentModel ) {
	es.ViewList.call( this, documentModel );
	this.$.addClass( 'editSurface-document' )
};

/* Methods */

es.DocumentView.prototype.getOffsetFromPosition = function( position ) {
	if ( this.items.length === 0 ) {
		return 0;
	}
	
	var blockView = this.items[0];

	for ( var i = 0; i < this.items.length; i++ ) {
		if ( this.items[i].$.offset().top >= position.top ) {
			break;
		}
		blockView = this.items[i];
	}
	
	return blockView.list.items.offsetOf( blockView ) + blockView.getOffsetFromPosition( position );
};

/**
 * Render content.
 * 
 * @method
 */
es.DocumentView.prototype.renderContent = function() {
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].renderContent();
	}
};

/**
 * Gets offset within content of position.
 * 
 * @method
 * @param position {es.Position} Position to get offset for
 * @returns {Integer} Offset nearest to position
 */
es.DocumentView.prototype.getContentOffset = function( position ) {
	// TODO
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param offset {Integer} Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.DocumentView.prototype.getRenderedPosition = function( offset ) {
	// TODO
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param range {es.Range} Range of content to draw selection around
 */
es.DocumentView.prototype.drawSelection = function( range ) {
	$('.editSurface-range').hide();
	var selectedViews = this.items.select( range );
	for ( var i = 0; i < selectedViews.length; i++ ) {
		selectedViews[i].item.drawSelection(
			new es.Range( selectedViews[i].from, selectedViews[i].to )
		);
	}
};

/**
 * Gets length of contents.
 * 
 * @method
 * @returns {Integer} Length of content, including virtual spaces between blocks
 */
es.DocumentView.prototype.getLength = function() {
	return this.items.getLengthOfItems();
};

/**
 * Gets HTML rendering of document.
 * 
 * @method
 * @returns {String} HTML data
 */
es.DocumentView.prototype.getHtml = function() {
	var views = this.items;
	return es.Html.makeTag(
		'div',
		{ 'class': this.$.attr( 'class' ) },
		$.map( this.items, function( view, i ) {
			return view.getHtml( { 'singular': i === 0 && views.length == 1 } );
		} ).join( '' )
	);
};

/* Inheritance */

es.extend( es.DocumentView, es.ViewList );
