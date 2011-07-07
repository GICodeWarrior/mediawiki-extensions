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

Block.prototype.getLength = function() {
	return this.flow.length;
};

/**
 * Update text given to the flow object
 */
ParagraphBlock.prototype.updateText = function() {
	var text = [];
	for ( var i = 0; i < this.lines.length; i++ ) {
		text.push( this.lines[i].text );
	}
	this.flow.setText( text.join( '' ) );
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
		if ( offset >= lineOffset && offset < lineOffset + this.lines[i].text.length ) {
			this.lines[i].text = this.lines[i].text.substring( 0, offset - lineOffset )
				+ content.toString()
				+ this.lines[i].text.substring( offset - lineOffset )
			break;
		}
		lineOffset += this.lines[i].text.length;
	}
	this.updateText();
	this.flow.render();
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
	var line,
		length,
		from,
		to;
	for ( var i = 0; i < this.lines.length && !(from && to); i++ ) {
		line = this.lines[i];
		length = line.text.length;
		if ( !from && start <= length) {
			from = {
				'line': line,
				'index': i,
				'offset': start
			};
		}
		if ( !to && end <= length) {
			to = {
				'line': line,
				'index': i,
				'offset': end
			};
		}
		start -= length;
		end -= length;
	}
	if ( from.index === to.index ) {
		from.line.text = from.line.text.substring( 0, from.offset )
			+ from.line.text.substring( to.offset );
	} else {
		// Replace "from" line with remaining content of "from" and "to" lines
		from.line.text = from.line.text.substring( 0, from.offset )
			+ to.line.text.substring( to.offset );
		// Remove lines after "from" up to and including "to"
		this.lines.splice( from.index + 1, to.index - from.index );
	}
	this.updateText();
	this.flow.render();
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

extend( ParagraphBlock, Block );
