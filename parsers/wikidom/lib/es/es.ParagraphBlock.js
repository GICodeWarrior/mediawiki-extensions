/**
 * 
 * @extends {Block}
 * @param lines {Array} List of line objects
 * @returns {ParagraphBlock}
 */
function ParagraphBlock( lines ) {
	Block.call( this );
	this.content = Content.newFromLines( lines || [] );
	this.$ = $( '<div class="editSurface-block editSurface-paragraph"></div>' )
		.data( 'block', this );
	this.flow = new TextFlow( this.$, this.content );
	var block = this;
	this.flow.on( 'render', function() {
		block.emit( 'update' );
	} );
}

ParagraphBlock.prototype.getLength = function() {
	return this.content.getLength();
};

/**
 * Inserts content into a block at an offset.
 * 
 * @param offset {Integer} Position to insert content at
 * @param content {Object} Content to insert
 */
ParagraphBlock.prototype.insertContent = function( offset, content ) {
	this.content.insert( offset, content );
	this.flow.render( offset );
};

/**
 * Deletes content in a block within a range.
 * 
 * @param offset {Integer} Offset to start removing content from
 * @param length {Integer} Offset to start removing content to
 */
ParagraphBlock.prototype.deleteContent = function( start, end ) {
	// Normalize start/end
	if ( end < start ) {
		var tmp = end;
		end = start;
		start = tmp;
	}
	this.content.remove( start, end );
	this.flow.render( start );
};

/**
 * Renders content into a container.
 * 
 * @param $container {jQuery Selection} Container to render into
 */
ParagraphBlock.prototype.renderContent = function( offset ) {
	this.flow.render( offset );
};

/**
 * Gets the offset of a position.
 * 
 * @param position {Integer} Offset to translate
 */
ParagraphBlock.prototype.getOffset = function( position ) {
	return this.flow.getOffset( position );
};

/**
 * Gets the position of a location.
 * 
 * @param offset {Integer} Offset to translate
 */
ParagraphBlock.prototype.getPosition = function( offset ) {
	return this.flow.getPosition( offset );
};

/**
 * Applies an annotation to a given range.
 * 
 * If a range arguments are not provided, all content will be annotated.
 * 
 * @param method {String} Way to apply annotation ("toggle", "add" or "remove")
 * @param annotation {Object} Annotation to apply
 * @param start {Integer} Offset to begin annotating from
 * @param end {Integer} Offset to stop annotating to
 */
ParagraphBlock.prototype.annotateContent = function( method, annotation, start, end ) {
	this.content.annotate( method, annotation, start, end );
};

extend( ParagraphBlock, Block );
