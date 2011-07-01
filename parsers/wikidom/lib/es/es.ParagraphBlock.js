/**
 * 
 * @param lines {Array} List of line objects
 * @returns {ParagraphBlock}
 */
function ParagraphBlock( lines ) {
	Block.call( this );
	this.lines = lines || [];
	this.$ = $( '<div class="editSurface-block editSurface-paragraph"></div>' )
		.data( 'block', this );
	this.flow = new TextFlow( this.$ );
	this.updateText();
}

ParagraphBlock.prototype.updateText = function() {
	var text = [];
	for ( var i = 0; i < this.lines.length; i++ ) {
		text.push( this.lines[i].text );
	}
	this.flow.setText( text.join( '\n' ) );
};

/**
 * Inserts content into a block at an offset.
 * 
 * @param offset {Integer} Position to insert content at
 * @param content {Object} Content to insert
 */
ParagraphBlock.prototype.insertContent = function( offset, content ) {
	var lineOffset = 0;
	for ( var i = 0; i < this.lines.length; i++ ) {
		if ( this.lines[i].text.length < offset - lineOffset ) {
			this.lines[i].text = this.lines[i].text.substring( 0, offset - lineOffset )
				+ content
				+ this.lines[i].text.substring( offset - lineOffset )
			break;
		}
		lineOffset += line.text.length;
	}
	this.updateText();
};

/**
 * Deletes content in a block within a range.
 * 
 * @param offset {Integer} Position to start removing content from
 * @param length {Integer} Length of content to remove
 */
ParagraphBlock.prototype.deleteContent = function( offset, length ) {
	var start,
		end,
		from,
		to,
		line,
		lineOffset;
	for ( var i = 0; i < this.lines.length; i++ ) {
		line = this.lines[i];
		start = offset - lineOffset;
		end = start + length;
		if ( start >= 0 && start < line.text.length) {
			from = {
				'line': line,
				'index': i,
				'offset': start
			};
		}
		if ( end >= 0 && end < line.text.length) {
			to = {
				'line': line,
				'index': i,
				'offset': end
			};
		}
		lineOffset += line.text.length;
	}
	if ( from.index === to.index ) {
		from.line.text = from.line.text.substring( 0, from.line.offset )
			+ from.line.text.substring( to.line.offset );
	} else {
		// Replace "from" line with remaining content of "from" and "to" lines
		from.line.text = from.line.text.substring( 0, from.line.offset )
			+ to.line.text.substring( to.line.offset );
		// Remove lines after "from" up to and including "to"
		this.lines = this.lines.splice( from.index + 1, to.index - from.index );
	}
	this.updateText();
};

/**
 * Renders content into a container.
 * 
 * @param $container {jQuery Selection} Container to render into
 */
ParagraphBlock.prototype.renderContent = function() {
	this.flow.render();
};

/**
 * Gets the location of a position.
 * 
 * @param position {Position} Position to translate
 */
ParagraphBlock.prototype.getLocation = function( position ) {
	throw 'ParagraphBlock.getLocation not implemented in this subclass.';
};

/**
 * Gets the position of a location.
 * 
 * @param location {Location} Location to translate
 */
ParagraphBlock.prototype.getPosition = function( location ) {
	throw 'ParagraphBlock.getPosition not implemented in this subclass.';
};

extend( ParagraphBlock, Block );
