/**
 * Creates an es.ListBlockView object.
 * 
 * @class
 * @extends {es.ViewList}
 * @extends {es.BlockView}
 * @constructor
 */
es.ListBlockView = function( model ) {
	es.ViewList.call( this, model );
	es.BlockView.call( this, model, this.$ );
	this.$.addClass( 'editSurface-listBlock' );
	var view = this;
	this.on( 'update', function() {
		view.enumerate();
	} );
};

/* Methods */

/**
 * Gets the offset of a position.
 * 
 * @method
 * @param position {es.Position} Position to translate
 * @returns {Integer} Offset nearest to position
 */
es.ListBlockView.prototype.getOffsetFromPosition = function( position ) {
	if ( this.items.length === 0 ) {
		return 0;
	}
	
	var listItemView = this.items[0];

	for ( var i = 0; i < this.items.length; i++ ) {
		if ( this.items[i].$.offset().top >= position.top ) {
			break;
		}
		listItemView = this.items[i];
	}
	
	return listItemView.list.items.offsetOf( listItemView ) + listItemView.getContentOffset( position );
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param range {es.Range} Range of content to draw selection around
 */
es.ListBlockView.prototype.drawSelection = function( range ) {
	var views = this.items.select( range, null, true );

	for ( var i = 0; i < views.on.length; i++ ) {
		views.on[i].item.drawSelection( new es.Range( views.on[i].from, views.on[i].to ) );
	}
	for ( var i = 0; i < views.off.length; i++ ) {
		views.off[i].clearSelection();
	}
};

es.ListBlockView.prototype.clearSelection = function( range ) {
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].clearSelection();
	}
};

/**
 * Render content.
 * 
 * @method
 */
es.ListBlockView.prototype.renderContent = function() {
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
es.ListBlockView.prototype.getContentOffset = function( position ) {
	// TODO
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param offset {Integer} Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.ListBlockView.prototype.getRenderedPosition = function( offset ) {
	// TODO
};

/**
 * Gets length of contents.
 * 
 * @method
 * @returns {Integer} Length of content, including any virtual spaces within the block
 */
es.ListBlockView.prototype.getLength = function() {
	return this.model.items.getLengthOfItems();
};

/**
 * Gets HTML rendering of block.
 * 
 * @method
 * @param options {Object} List of options, see es.DocumentView.getHtml for details
 * @returns {String} HTML data
 */
es.ListBlockView.prototype.getHtml = function( options ) {
	return es.Html.makeTag(
		'div',
		{ 'class': this.$.attr( 'class' ) },
		$.map( this.items, function( view ) {
			return view.getHtml();
		} ).join( '' )
	);
};

/**
 * Set the number labels of all ordered list items.
 * 
 * @method
 */
es.ListBlockView.prototype.enumerate = function() {
	var itemLevel,
		levels = [];

	for ( var i = 0; i < this.items.length; i++ ) {
		itemLevel = this.items[i].model.getLevel();
		levels = levels.slice(0, itemLevel + 1);
		if ( this.items[i].model.getStyle() === 'number' ) {
			if ( !levels[itemLevel] ) {
				levels[itemLevel] = 0;
			}
			this.items[i].setNumber( ++levels[itemLevel] );
		}
	}
};

/* Inheritance */

es.extend( es.ListBlockView, es.ViewList );
es.extend( es.ListBlockView, es.BlockView );
