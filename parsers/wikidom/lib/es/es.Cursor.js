/**
 * 
 * @returns {Cursor}
 */
function Cursor( surface ) {
	this.surface = surface;
	this.cursorInterval = null;
	this.$cursor = $( '<div class="editSurface-cursor"></div>' );
	this.surface.$.after( this.$cursor );
}

/**
 * Shows the cursor in a new location.
 * 
 * @param location {Location} Location to show the cursor in
 */
Cursor.prototype.show = function( location ) {
	this.surface.location = location;
	
	var position = this.surface.location.block.getPosition( this.surface.location.offset );
	var offset = this.surface.location.block.$.offset();
	
	this.$cursor.css({
		'left': position.left + offset.left,
		'top': position.top + offset.top
	}).show();
	
	if( this.cursorInterval ) {
		clearInterval( this.cursorInterval );
	}
	this.cursorInterval = setInterval( function( cursor ) {
			cursor.$cursor.css( 'display' ) == 'block' ? cursor.$cursor.hide() : cursor.$cursor.show();
	}, 500, this );
};

/**
 * Hides the cursor.
 * 
 * @returns {Location}
 */
Cursor.prototype.hide = function() {
	if( this.cursorInterval ) {
		clearInterval( this.cursorInterval );
	}
	this.$cursor.hide()
};

/**
 * Gets the current location of the cursor.
 * 
 * @returns {Location}
 */
Cursor.prototype.get = function() {
	return this.surface.location;
};