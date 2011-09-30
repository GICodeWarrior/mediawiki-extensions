/**
 * Creates an es.TableBlockRowView object.
 * 
 * @class
 * @extends {es.ViewList}
 * @extends {es.ViewListItem}
 * @constructor
 */
es.TableBlockRowView = function( model ) {
	es.ViewList.call( this, model, $( '<tr>' ) );
	es.ViewListItem.call( this, model, this.$ );
	this.$.attr( this.model.attributes );
};

/* Methods */

/**
 * Render content.
 * 
 * @method
 */
es.TableBlockRowView.prototype.renderContent = function() {
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].renderContent();
	}
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param range {es.Range} Range of content to draw selection around
 */
es.TableBlockRowView.prototype.drawSelection = function( range ) {
	var views = this.items.select( range, null, true );

	for ( var i = 0; i < views.on.length; i++ ) {
		views.on[i].item.drawSelection( new es.Range( views.on[i].from, views.on[i].to ) );
	}
	for ( var i = 0; i < views.off.length; i++ ) {
		views.off[i].clearSelection();
	}
};

es.TableBlockRowView.prototype.clearSelection = function( range ) {
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].clearSelection();
	}
};

/**
 * Gets length of contents.
 * 
 * @method
 * @returns {Integer} Length of content, including any virtual spaces within the block
 */
es.TableBlockRowView.prototype.getLength = function() {
	return this.items.getLengthOfItems();
};

/**
 * Gets the offset of a position.
 * 
 * @method
 * @param position {es.Position} Position to translate
 * @returns {Integer} Offset nearest to position
 */
es.TableBlockRowView.prototype.getOffsetFromPosition = function( position ) {
	if ( this.items.length === 0 ) {
		return 0;
	}
	
	var cellView = this.items[0];

	for ( var i = 0; i < this.items.length; i++ ) {
		if ( this.items[i].$.offset().left >= position.left ) {
			break;
		}
		cellView = this.items[i];
	}
	
	return cellView.list.items.offsetOf( cellView ) + cellView.getOffsetFromPosition( position );
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param offset {Integer} Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.TableBlockRowView.prototype.getRenderedPosition = function( offset ) {
	// TODO
};

/**
 * Gets HTML rendering of block.
 * 
 * @method
 * @param options {Object} List of options, see es.DocumentView.getHtml for details
 * @returns {String} HTML data
 */
es.TableBlockRowView.prototype.getHtml = function( options ) {
	return es.Html.makeTag( 'tr', this.model.attributes, $.map( this.items, function( view ) {
		return view.getHtml();
	} ).join( '' ) );
};

/* Inheritance */

es.extend( es.TableBlockRowView, es.ViewList );
es.extend( es.TableBlockRowView, es.ViewListItem );