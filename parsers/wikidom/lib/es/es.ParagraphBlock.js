/**
 * Paragraph block.
 * 
 * @class
 * @constructor
 * @extends {es.Block}
 * @param lines {Array} List of Wikidom line objects
 * @property content {es.Content}
 * @property $ {jQuery}
 * @property flow {es.TextFlow}
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
};

/* Static Methods */

/**
 * Creates a new list block object from Wikidom data.
 * 
 * @param wikidomList {Object} Wikidom data to convert from
 */
es.ParagraphBlock.newFromWikidom = function( wikidomBlock ) {
	return new es.ParagraphBlock( wikidomBlock.lines );
};

/* Methods */

/**
 * Gets the length of all block content.
 */
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
 * @param range {es.Range} Range of content to remove
 */
es.ParagraphBlock.prototype.deleteContent = function( range ) {
	this.content.remove( range );
};

/**
 * Applies an annotation to a given range.
 * 
 * If a range arguments are not provided, all content will be annotated.
 * 
 * @param method {String} Way to apply annotation ("toggle", "add" or "remove")
 * @param annotation {Object} Annotation to apply
 * @param range {es.Range} Range of content to annotate
 */
es.ParagraphBlock.prototype.annotateContent = function( method, annotation, range ) {
	this.content.annotate( method, annotation, range );
};

/**
 * Gets content within a range.
 * 
 * @param start {Integer} Offset to get content from
 * @param end {Integer} Offset to get content to
 */
es.Block.prototype.getContent = function( range ) {
	return this.content.getContent( range );
};

/**
 * Gets content as plain text within a range.
 * 
 * @param range {es.Range} Range of text to get
 * @param render {Boolean} If annotations should have any influence on output
 */
es.Block.prototype.getText = function( range, render ) {
	return this.content.getText( range, render );
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

/* Registration */

/**
 * Extend es.Block to support paragraph block creation with es.Block.newFromWikidom
 */
es.Block.models.paragraph = es.ParagraphBlock;

/* Inheritance */

es.extend( es.ParagraphBlock, es.Block );
