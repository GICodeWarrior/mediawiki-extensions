/**
 * 
 * @extends {es.Block}
 * @param lines {Array} List of line objects
 * @returns {es.ParagraphBlock}
 */
es.ParagraphBlock = function( lines ) {
	es.Block.call( this );
	this.content = es.Content.newFromLines( lines || [] );
	this.$ = $( '<div class="editSurface-block editSurface-paragraph"></div>' )
		.data( 'block', this );
	this.flow = new es.TextFlow( this.$, this.content );
	var block = this;
	this.flow.on( 'render', function() {
		block.emit( 'update' );
	} );
}

es.ParagraphBlock.newFromWikidom = function( wikidomBlock ) {
	return new es.ParagraphBlock( wikidomBlock.lines );
};

es.ParagraphBlock.prototype.getLength = function() {
	return this.content.getLength();
};

/**
 * Inserts content into a block at an offset.
 * 
 * @param offset {Integer} Position to insert content at
 * @param content {Object} Content to insert
 */
es.ParagraphBlock.prototype.insertContent = function( offset, content ) {
	this.content.insert( offset, content );
};

/**
 * Deletes content in a block within a range.
 * 
 * @param offset {Integer} Offset to start removing content from
 * @param length {Integer} Offset to start removing content to
 */
es.ParagraphBlock.prototype.deleteContent = function( start, end ) {
	// Normalize start/end
	if ( end < start ) {
		var tmp = end;
		end = start;
		start = tmp;
	}
	this.content.remove( start, end );
};

/**
 * Renders content into a container.
 * 
 * @param $container {jQuery Selection} Container to render into
 */
es.ParagraphBlock.prototype.renderContent = function( offset ) {
	this.flow.render( offset );
};

/**
 * Gets the offset of a position.
 * 
 * @param position {Integer} Offset to translate
 */
es.ParagraphBlock.prototype.getOffset = function( position ) {
	return this.flow.getOffset( position );
};

/**
 * Gets the position of a location.
 * 
 * @param offset {Integer} Offset to translate
 */
es.ParagraphBlock.prototype.getPosition = function( offset ) {
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
es.ParagraphBlock.prototype.annotateContent = function( method, annotation, start, end ) {
	this.content.annotate( method, annotation, start, end );
};

/**
 * Gets the start and end points of the word closest a given offset.
 * 
 * @param offset {Integer} Offset to find word nearest to
 * @return {Object} Range object of boundaries
 */
es.ParagraphBlock.prototype.getWordBoundaries = function( offset ) {
	return this.content.getWordBoundaries( offset );
};

/**
 * Gets the start and end points of the section closest a given offset.
 * 
 * For a paragraph, there's only one section.
 * 
 * @param offset {Integer} Offset to find section nearest to
 * @return {Object} Range object of boundaries
 */
es.ParagraphBlock.prototype.getSectionBoundaries = function( offset ) {
	return new es.Range( 0, this.content.getLength() );
};

es.Block.models['paragraph'] = es.ParagraphBlock; 

es.extend( es.ParagraphBlock, es.Block );