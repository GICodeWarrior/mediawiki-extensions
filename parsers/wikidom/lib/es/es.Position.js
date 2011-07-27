/**
 * Pixel position, a 2D position within a rendered document.
 * 
 * This can also support an optional bottom field, to represent a vertical line, such as a cursor.
 * 
 * @param left {Integer} Horizontal position
 * @param top {Integer} Vertical top position
 * @param bottom {Integer} Vertical bottom position of bottom (optional, default: top)
 * @returns {es.Position}
 */
es.Position = function( left, top, bottom ) {
	this.left = left || 0;
	this.top = top || 0;
	this.bottom = bottom || this.top;
};

es.Position.newFromEventScreenPosition = function( event ) {
	return new es.Position( event.screenX, event.screenY );
};

es.Position.newFromEventPagePosition = function( event ) {
	return new es.Position( event.pageX, event.pageY );
};

es.Position.newFromEventLayerPosition = function( event ) {
	return new es.Position( event.layerX, event.layerY );
};

es.Position.prototype.at = function( position ) {
	return this.left === position.left && this.top === position.top;
};

es.Position.prototype.perpendicularWith = function( position ) {
	return this.left === position.left || this.top === position.top;
};

es.Position.prototype.levelWith = function( position ) {
	return this.top === position.top;
};

es.Position.prototype.plumbWith = function( position ) {
	return this.left === position.left;
};

es.Position.prototype.near = function( position, range ) {
	var x = this.left - position.left,
		y = this.top - position.top;
	return Math.sqrt( x * x, y * y ) <= range;
};

es.Position.prototype.above = function( position ) {
	return this.bottom < position.top;
};

es.Position.prototype.below = function( position ) {
	return this.top > position.bottom;
};

es.Position.prototype.leftOf = function( left ) {
	return this.left < left;
};

es.Position.prototype.rightOf = function( left ) {
	return this.left > left;
};
