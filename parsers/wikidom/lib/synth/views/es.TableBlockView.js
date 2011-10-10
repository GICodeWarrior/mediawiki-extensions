/**
 * Creates an es.TableBlockView object.
 * 
 * @class
 * @extends {es.ViewList}
 * @extends {es.BlockView}
 * @constructor
 */
es.TableBlockView = function( model ) {
	es.ViewList.call( this, model, $( '<table>' ) );
	es.BlockView.call( this, model, this.$ );
	this.$.attr( 'style', this.model.attributes['html/style'] );
	this.$.addClass( 'editSurface-tableBlock' );
};

/* Methods */

/**
 * Render content.
 * 
 * @method
 */
es.TableBlockView.prototype.renderContent = function() {
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
es.TableBlockView.prototype.drawSelection = function( range ) {
	var views = this.items.select( range, null, true );

	for ( var i = 0; i < views.on.length; i++ ) {
		views.on[i].item.drawSelection( new es.Range( views.on[i].from, views.on[i].to ) );
	}
	for ( var i = 0; i < views.off.length; i++ ) {
		views.off[i].clearSelection();
	}
};

es.TableBlockView.prototype.clearSelection = function( range ) {
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
es.TableBlockView.prototype.getLength = function() {
	return this.items.getLengthOfItems();
};

/**
 * Gets the offset of a position.
 * 
 * @method
 * @param position {es.Position} Position to translate
 * @returns {Integer} Offset nearest to position
 */
es.TableBlockView.prototype.getOffsetFromPosition = function( position ) {
	if ( this.items.length === 0 ) {
		return 0;
	}
	
	var rowView = this.items[0];

	for ( var i = 0; i < this.items.length; i++ ) {
		if ( this.items[i].$.offset().top >= position.top ) {
			break;
		}
		rowView = this.items[i];
	}
	
	return rowView.list.items.offsetOf( rowView ) + rowView.getOffsetFromPosition( position );
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param offset {Integer} Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.TableBlockView.prototype.getRenderedPosition = function( offset ) {
	var item = this.items.lookup( offset );
	if ( item !== null ) {
		return item.getRenderedPosition( offset - this.items.offsetOf( item ) );
	}
	return null;
};

/**
 * Gets HTML rendering of block.
 * 
 * @method
 * @param options {Object} List of options, see es.DocumentView.getHtml for details
 * @returns {String} HTML data
 */
es.TableBlockView.prototype.getHtml = function( options ) {
	return es.Html.makeTag( 'table', this.model.attributes, $.map( this.items, function( view ) {
		return view.getHtml();
	} ).join( '' ) );
};

/* Inheritance */

es.extend( es.TableBlockView, es.ViewList );
es.extend( es.TableBlockView, es.BlockView );