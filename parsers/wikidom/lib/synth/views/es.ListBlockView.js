/**
 * Creates an es.ListBlockView object.
 * 
 * @class
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

/**
 * Render content.
 */
es.ListBlockView.prototype.renderContent = function() {
	for ( var i = 0; i < this.items.length; i++ ) {
		this.items[i].renderContent();
	}
};

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

/**
 * Gets offset within content of position.
 */
es.ListBlockView.getContentOffset = function( position ) {
	//return this.contentView.getOffset( position );
};

/**
 * Gets rendered position of offset within content.
 */
es.ListBlockView.getRenderedPosition = function( offset ) {
	//return this.contentView.getPosition( position );
};

/**
 * Gets rendered line index of offset within content.
 */
es.ListBlockView.getRenderedLineIndex = function( offset ) {
	//return this.contentView.getLineIndex( position );
};

es.ListBlockView.prototype.getLength = function() {
	return this.model.items.getLengthOfItems();
};

es.ListBlockView.prototype.drawSelection = function( range ) {
	var selectedViews = this.items.select( range );
	for ( var i = 0; i < selectedViews.length; i++ ) {
		selectedViews[i].item.drawSelection(
			new es.Range( selectedViews[i].from, selectedViews[i].to )
		);
	}
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

/* Inheritance */

es.extend( es.ListBlockView, es.ViewList );
es.extend( es.ListBlockView, es.BlockView );
