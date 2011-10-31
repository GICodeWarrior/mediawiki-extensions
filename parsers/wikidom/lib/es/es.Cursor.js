/**
 * Blinking cursor.
 * 
 * @class
 * @constructor
 * @property blinkInterval {Interval} Blink interval
 * @property $ {jQuery} Cursor element
 */
es.Cursor = function() {
	this.blinkInterval = null;
	this.$ = $( '<div class="editSurface-cursor"></div>' );
};

/**
 * Shows the cursor in a new position.
 * 
 * @method
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
	
	if ( this.blinkInterval ) {
		clearInterval( this.blinkInterval );
	}
	var that = this;
	this.blinkInterval = setInterval( function() {
		if ( that.$.css( 'display' ) === 'block' ) {
			that.$.hide();
		} else {
			that.$.show();
		}
	}, 500 );
};

/**
 * Hides the cursor.
 * 
 * @method
 */
es.Cursor.prototype.hide = function() {
	if( this.blinkInterval ) {
		clearInterval( this.blinkInterval );
	}
	this.$.hide();
};
