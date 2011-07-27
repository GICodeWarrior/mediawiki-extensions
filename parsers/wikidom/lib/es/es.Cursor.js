/**
 * Blinking cursor.
 * 
 * @class
 * @constructor
 * @property cursorInterval {Interval}
 * @property $ {jQuery}
 */
es.Cursor = function() {
	this.cursorInterval = null;
	this.$ = $( '<div class="editSurface-cursor"></div>' );
}

/**
 * Shows the cursor in a new position.
 * 
 * @param position {Position} Position to show the cursor at
 * @param offset {Position} Offset to be added to position
 */
es.Cursor.prototype.show = function( position, offset ) {
	if ( position ) {
		if ( $.isPlainObject( offset ) ) {
			position.left += offset.left;
			position.top += offset.top;
			position.bottom += offset.top;
		}
		this.$.css({
			'left': position.left,
			'top': position.top,
			'height': position.bottom - position.top
		}).show();
	} else {
		this.$.show();
	}
	
	if ( this.cursorInterval ) {
		clearInterval( this.cursorInterval );
	}
	this.cursorInterval = setInterval( function( cursor ) {
		cursor.$.css( 'display' ) == 'block'
			? cursor.$.hide() : cursor.$.show();
	}, 500, this );
};

/**
 * Hides the cursor.
 */
es.Cursor.prototype.hide = function() {
	if( this.cursorInterval ) {
		clearInterval( this.cursorInterval );
	}
	this.$.hide();
};
