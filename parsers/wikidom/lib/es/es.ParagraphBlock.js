/**
 * Paragraph block.
 * 
 * @class
 * @constructor
 * @extends {es.Block}
 * @param content {es.Content} Paragraph content
 * @property content {es.Content} Paragraph content
 * @property $ {jQuery} Container element
 * @property flow {es.Flow} Text flow object
 */
es.ParagraphBlock = function( content ) {
	es.Block.call( this );
	this.content = content || new es.Content();
	this.$ = $( '<div class="editSurface-block editSurface-paragraph"></div>' )
		.data( 'block', this );
	this.flow = new es.Flow( this.$, this.content );
	var block = this;
	this.flow.on( 'render', function() {
		block.emit( 'update' );
	} );
};

/* Static Methods */

/**
 * Creates a new list block object from WikiDom data.
 * 
 * @static
 * @method
 * @param wikidomParagraphBlock {Object} WikiDom data to convert from
 * @returns {es.ParagraphBlock} EditSurface paragraph block
 * @throws "Invalid block type error" if block type is not "paragraph"
 */
es.ParagraphBlock.newFromWikiDomParagraphBlock = function( wikidomParagraphBlock ) {
	if ( wikidomParagraphBlock.type !== 'paragraph' ) {
		throw 'Invalid block type error. Paragraph block expected to be of type "paragraph".';
	}
	return new es.ParagraphBlock( es.Content.newFromWikiDomLines( wikidomParagraphBlock.lines ) );
};

/* Methods */

/**
 * Gets the length of all block content.
 * 
 * @method
 * @param {Integer} Length of content
 */
es.ParagraphBlock.prototype.getLength = function() {
	return this.content.getLength();
};

/**
 * Inserts content into a block at an offset.
 * 
 * @method
 * @param offset {Integer} Position to insert content at
 * @param content {Object} Content to insert
 * @param autoAnnotate {Boolean} Content to insert
 */
es.ParagraphBlock.prototype.insertContent = function( offset, content, autoAnnotate ) {
	this.content.insert( offset, content, autoAnnotate );
};

/**
 * Deletes content in a block within a range.
 * 
 * @method
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
 * @method
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
 * @method
 * @param range {es.Range} Range of content to get
 * @returns {es.Content} Content within range
 */
es.ParagraphBlock.prototype.getContent = function( range ) {
	return this.content.getContent( range );
};

/**
 * Gets content as plain text within a range.
 * 
 * @method
 * @param range {es.Range} Range of text to get
 * @param render {Boolean} If annotations should have any influence on output
 * @returns {String} Text within range
 */
es.ParagraphBlock.prototype.getText = function( range, render ) {
	return this.content.getText( range, render );
};

/**
 * Renders content into a container.
 * 
 * @method
 * @param offset {Integer} Offset to begin rendering from, if possible
 */
es.ParagraphBlock.prototype.renderContent = function( offset ) {
	this.flow.render( offset );
};

/**
 * Gets the offset of a position.
 * 
 * @method
 * @param position {es.Position} Position to translate
 * @returns {Integer} Offset nearest to position
 */
es.ParagraphBlock.prototype.getOffset = function( position ) {
	return this.flow.getOffset( position );
};

/**
 * Gets the position of a location.
 * 
 * @method
 * @param offset {Integer} Offset to translate
 * @returns {es.Position} Position of offset
 */
es.ParagraphBlock.prototype.getPosition = function( offset ) {
	return this.flow.getPosition( offset );
};

es.ParagraphBlock.prototype.getLineIndex = function( offset ) {
	return this.flow.getLineIndex( offset );
};

/**
 * Gets the start and end points of the word closest a given offset.
 * 
 * @method
 * @param offset {Integer} Offset to find word nearest to
 * @returns {Object} Range object of boundaries
 */
es.ParagraphBlock.prototype.getWordBoundaries = function( offset ) {
	return this.content.getWordBoundaries( offset );
};

/**
 * Gets the start and end points of the section closest a given offset.
 * 
 * For a paragraph, there's only one section.
 * 
 * @method
 * @param offset {Integer} Offset to find section nearest to
 * @returns {Object} Range object of boundaries
 */
es.ParagraphBlock.prototype.getSectionBoundaries = function( offset ) {
	return new es.Range( 0, this.content.getLength() );
};

es.ParagraphBlock.prototype.getLineBoundaries = function( offset ) {
	var line;
	for ( var i = 0; i < this.flow.lines.length; i++ ) {
		line = this.flow.lines[i];
		if ( offset >= line.range.start && offset < line.range.end ) {
			break;
		}
	}
	return new es.Range(
		line.range.start,
		line.range.end < this.getLength() ? line.range.end - 1 : line.range.end
	);
};

es.ParagraphBlock.prototype.getWikiDom = function() {
	return {
		'type': 'paragraph',
		'lines': this.content.getWikiDomLines()
	};
};

/* Registration */

/**
 * Extend es.Block to support paragraph block creation with es.Block.newFromWikiDom
 */
es.Block.blockConstructors.paragraph = es.ParagraphBlock.newFromWikiDomParagraphBlock;

/* Inheritance */

es.extend( es.ParagraphBlock, es.Block );
