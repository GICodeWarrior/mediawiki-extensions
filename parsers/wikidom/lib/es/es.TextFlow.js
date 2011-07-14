/**
 * Renders and provides access to flowed text.
 * 
 * @extends {EventEmitter}
 * @param $container {jQuery Selection} Element to render into
 * @returns {TextFlow}
 */
function TextFlow( $container, content ) {
	EventEmitter.call( this );
	this.$ = $container;
	this.content = content || new Content();
	this.boundaries = [];
	this.lines = [];
	this.width = null;
	this.boundaryTest = /([ \-\t\r\n\f])/g;
	this.widthCache = {};
	this.renderState = {};
	
	var flow = this;
	this.content.on( 'change', function() {
		flow.scanBoundaries();
	} );
	this.content.on( 'insert', function( args ) {
		flow.render( args.offset );
	} );
	this.content.on( 'remove', function( args ) {
		flow.render( args.start );
	} );
	this.content.on( 'annotate', function( args ) {
		flow.render( args.start );
	} );
	this.scanBoundaries();
	this.render();
}

/**
 * Gets offset within content closest to of a given position.
 * 
 * @pthis.content.render {Integer} Horizontal position in pixels
 * @param y {Integer} Vertical position in pixels
 * @return {Integer} Offset within content nearest the given coordinates
 */
TextFlow.prototype.getOffset = function( position ) {
	var lineCount = this.lines.length,
		line = 0,
		offset = 0,
		top = 0;
	
	/*
	 * Line finding
	 * 
	 * It's possible that a more efficient method could be used here, but the number of lines to be
	 * iterated through will rarely be over 100, so it's unlikely that any significant gains will be
	 * had. Plus, as long as we are iterating over each line, we can also sum up the top and bottom
	 * positions, which is a nice benefit of this method.
	 */
	while ( line < lineCount ) {
		top += this.lines[line].height;
		if ( position.top <= top ) {
			break;
		}
		line++;
	}
	
	/*
	 * Offset finding
	 * 
	 * Now that we know which line we are on, we can just use the "fitCharacters" method to get the
	 * last offset before "position.left".
	 * 
	 * TODO: The offset needs to be chosen based on nearest offset to the cursor, not offset before
	 * the cursor.
	 */
	var virtual = line < this.lines.length - 1
		&& this.boundaryTest.exec( this.lines[line].text.substr( -1 ) ) ? -1 : 0;
	line = Math.min( line, this.lines.length - 1 );
	var $ruler = $( '<div class="editSurface-ruler"></div>' ).appendTo( this.$ ),
		ruler = $ruler[0],
		fit = this.fitCharacters(
			this.lines[line].start, this.lines[line].end, ruler, position.left
		);
	ruler.innerHTML = this.content.render( this.lines[line].start, fit.end );
	var left = ruler.clientWidth;
	ruler.innerHTML = this.content.render( this.lines[line].start, fit.end + 1 );
	var right = ruler.clientWidth;
	var center = Math.round( left + ( ( right - left ) / 2 ) );
	$ruler.remove();
	// Reset RegExp object's state
	this.boundaryTest.lastIndex = 0;
	return Math.min(
		fit.end + ( position.left >= center ? 1 : 0 ),
		this.lines[line].end + virtual
	);
};

/**
 * Gets position coordinates of a given offset.
 * 
 * Offsets are boundaries between content. Results are given in left, top and bottom positions,
 * which could be used to draw a cursor, highlighting painting, etc.
 * 
 * @param offset {Integer} Offset within content
 * @return {Object} Object containing left, top and bottom properties, each positions in pixels
 */
TextFlow.prototype.getPosition = function( offset ) {
	if ( offset < 0 ) {
		throw 'Out of range error. Offset is expected to be greater than or equal to 0.';
	}
	var line = 0,
		lineCount = this.lines.length,
		position = {
			'left': 0,
			'top': 0,
			'bottom': 0
			// 'line': (set later on)
		};
	
	/*
	 * Line finding
	 * 
	 * It's possible that a more efficient method could be used here, but the number of lines to be
	 * iterated through will rarely be over 100, so it's unlikely that any significant gains will be
	 * had. Plus, as long as we are iterating over each line, we can also sum up the top and bottom
	 * positions, which is a nice benefit of this method.
	 */
	while ( line < lineCount ) {
		if ( offset >= this.lines[line].start && offset < this.lines[line].end ) {
			position.bottom = position.top + this.lines[line].height;
			break;
		}
		position.top += this.lines[line].height;
		line++;
	}

	/*
	 * Virtual n+1 position
	 * 
	 * To allow access to position information of the right side of the last character on the last
	 * line, a virtual n+1 position is supported. Offsets beyond this virtual position will cause
	 * an exception to be thrown.
	 */
	if ( line === lineCount ) {
		if ( offset !== this.lines[line - 1].end + 1 ) {
			line--;
			position.bottom = position.top;
			position.top -= this.lines[line].height;
		} else {
			throw 'Out of range error. Offset is expected to be less than or equal to text length.';
		}
	}
	position.line = line;
	
	/*
	 * Offset measuring
	 * 
	 * Since the left position will be zero for the first character in the line, so we can skip
	 * measuring for those cases.
	 */
	if ( this.lines[line].start < offset ) {
		var $ruler = $( '<div class="editSurface-ruler"></div>' ).appendTo( this.$ ),
			ruler = $ruler[0];
		ruler.innerHTML = this.content.render( this.lines[line].start, offset );
		position.left = ruler.clientWidth;
		$ruler.remove();
	}

	return position;
};

TextFlow.prototype.scanBoundaries = function() {
	/*
	 * Word boundary scan
	 * 
	 * To perform binary-search on words, rather than characters, we need to collect word boundary
	 * offsets into an array. The offset of the right side of the breaking character is stored, so
	 * the gaps between stored offsets always include the breaking character at the end.
	 * 
	 * To avoid encoding the same words as HTML over and over while fitting text to lines, we also
	 * build a list of HTML escaped strings for each gap between the offsets stored in the
	 * "boundaries" array. Slices of the "words" array can be joined, producing the escaped HTML of
	 * the words.
	 */
	var text = this.content.substring();
	// Purge "boundaries" and "words" arrays
	this.boundaries = [0];
	// Reset RegExp object's state
	this.boundaryTest.lastIndex = 0;
	// Iterate over each word+boundary sequence, capturing offsets and encoding text as we go
	var match,
		end;
	while ( match = this.boundaryTest.exec( text ) ) {
		// Include the boundary character in the range
		end = match.index + 1;
		// Store the boundary offset
		this.boundaries.push( end );
	}
	// If the last character is not a boundary character, we need to append the final range to the
	// "boundaries" and "words" arrays
	if ( end < text.length ) {
		this.boundaries.push( text.length );
	}
};

TextFlow.prototype.renderIteration = function() {
	var rs = this.renderState,
		iteration = 0;
	while ( ++iteration <= rs.iterationLimit && rs.wordOffset < rs.wordCount - 1 ) {
		rs.wordFit = this.fitWords( rs.wordOffset, rs.wordCount - 1, rs.ruler, rs.width );
		if ( rs.wordFit.width > rs.width ) {
			// The first word didn't fit, we need to split it up
			rs.charOffset = rs.lineStart;
			rs.wordOffset++;
			rs.lineEnd = this.boundaries[rs.wordOffset];
			do {
				rs.charFit = this.fitCharacters( rs.charOffset, rs.lineEnd, rs.ruler, rs.width );
				// If we were able to get the rest of the characters on the line OK
				if ( rs.charFit.end === rs.lineEnd) {
					// Try to fit more words on the line
					rs.wordFit = this.fitWords(
						rs.wordOffset, rs.wordCount - 1, rs.ruler, rs.width - rs.charFit.width
					);
					if ( rs.wordFit.end > rs.wordOffset ) {
						rs.wordOffset = rs.wordFit.end;
						rs.charFit.end = rs.lineEnd = this.boundaries[rs.wordOffset];
					}
				}
				this.appendLine( rs.charOffset, rs.charFit.end );
				// Move on to another line
				rs.charOffset = rs.charFit.end;
			} while ( rs.charOffset < rs.lineEnd );
		} else {
			rs.wordOffset = rs.wordFit.end;
			rs.lineEnd = this.boundaries[rs.wordOffset];
			this.appendLine( rs.lineStart, rs.lineEnd );
		}
		rs.lineStart = rs.lineEnd;
	}
	// Only perform on actual last iteration
	if ( rs.wordOffset >= rs.wordCount - 1 ) {
		// Cleanup
		rs.$ruler.remove();
		this.$.find( '.editSurface-line[line-index=' + ( this.lines.length - 1 ) + ']' )
			.nextAll()
			.remove();
		rs.timeout = undefined;
		this.emit( 'render' );
	} else {
		rs.ruler.innerHTML = '';
		var flow = this;
		rs.timeout = setTimeout( function() {
			flow.renderIteration();
		}, 0 );
	}
};

/**
 * Renders text into a series of HTML elements, each a single line of wrapped text.
 * 
 * In cases where a single word is too long to fit on a line, the word will be "virtually" wrapped,
 * causing them to be fragmented. Word fragments are rendered on their own lines, except for their
 * remainder, which is combined with whatever proceeding words can fit on the same line.
 * 
 * The offset parameter can be used to reduce the amount of work involved in re-rendering the same
 * text, but will be automatically ignored if the text or width of the container has changed.
 * 
 * @param offset {Integer} Offset to re-render from, if possible (not yet implemented)
 */
TextFlow.prototype.render = function( offset ) {
	var rs = this.renderState;
	
	// Stop iterating from last render
	if ( rs.timeout !== undefined ) {
		clearTimeout( rs.timeout );
		// Cleanup
		rs.$ruler.remove();
	}
	
	this.widthCache = {};
	
	/*
	 * Container measurement
	 * 
	 * To get an accurate measurement of the inside of the container, without having to deal with
	 * inconsistencies between browsers and box models, we can just create an element inside the
	 * container and measure it.
	 */
	rs.$ruler = $( '<div>&nbsp;</div>' ).appendTo( this.$ );
	rs.width = rs.$ruler.innerWidth();
	
	// TODO: Take offset into account
	// Ignore offset optimization if the width has changed or the text has never been flowed before
	//if (this.width !== width) {
	//	offset = undefined;
	//}
	
	// TODO: Take offset into account and only work from there
	
	this.lines = [];
	// Iterate over each word that will fit in a line, appending them to the DOM as we go
	
	rs.wordOffset = 0;
	rs.lineStart = 0;
	rs.lineEnd = 0;
	rs.wordFit = null;
	rs.charOffset = 0;
	rs.charFit = null;
	rs.wordCount = this.boundaries.length;
	rs.ruler = rs.$ruler.addClass('editSurface-ruler')[0];
	rs.iterationLimit = 3;
	
	this.renderIteration();
};

/**
 * Adds a line containing a given range of text to the end of the DOM and the "lines" array.
 * 
 * @param start {Integer} Beginning of text range for line
 * @param end {Integer} Ending of text range for line
 */
TextFlow.prototype.appendLine = function( start, end ) {
	$line = this.$.find( '.editSurface-line[line-index=' + this.lines.length + ']' );
	if ( !$line.length ) {
		$line = $( '<div class="editSurface-line" line-index="' + this.lines.length + '"></div>' )
			.appendTo( this.$ );
	}
	$line[0].innerHTML = this.content.render( start, end );
	// Collect line information
	this.lines.push({
		'text': this.content.substring( start, end ),
		'start': start,
		'end': end,
		'width': $line.outerWidth(),
		'height': $line.outerHeight()
	});
};

/**
 * Gets the index of the boundary of last word that fits inside the line
 * 
 * The "words" and "boundaries" arrays provide linear access to the offsets around non-breakable
 * areas within the text. Using these, we can perform a binary-search for the best fit of words
 * within a line, just as we would with characters.
 * 
 * Results are given as an object containing both an index and a width, the later of which can be
 * used to detect when the first word was too long to fit on a line. In such cases the result will
 * contain the index of the boundary of the first word and it's width.
 * 
 * TODO: Because limit is most likely given as "words.length", it may be possible to improve the
 * efficiency of this code by making a best guess and working from there, rather than always
 * starting with [offset .. limit], which usually results in reducing the end position in all but
 * the last line, and in most cases more than 3 times, before changing directions.
 * 
 * @param start {Integer} Index within "words" to begin fitting from
 * @param end {Integer} Index within "words" to stop fitting to
 * @param ruler {HTMLElement} Element to take measurements with
 * @param width {Integer} Maximum width to allow the line to extend to
 * @return {Integer} Last index within "words" that contains a word that fits
 */
TextFlow.prototype.fitWords = function( start, end, ruler, width ) {
	var offset = start,
		middle,
		lineWidth,
		cacheKey;
	do {
		// Place "middle" directly in the center of "start" and "end"
		middle = Math.ceil( ( start + end ) / 2 );

		cacheKey = this.boundaries[offset] + ':' + this.boundaries[middle];

		// Prepare the line for measurement using pre-escaped HTML
		ruler.innerHTML = this.content.render( this.boundaries[offset], this.boundaries[middle] );
		// Test for over/under using width of the rendered line
		this.widthCache[cacheKey] = lineWidth = ruler.clientWidth;

		// Test for over/under using width of the rendered line
		if ( lineWidth > width ) {
			// Detect impossible fit (the first word won't fit by itself)
			if (middle - offset === 1) {
				start = middle;
				break;
			}
			// Words after "middle" won't fit
			end = middle - 1;
		} else {
			// Words before "middle" will fit
			start = middle;
		}
	} while ( start < end );
	return { 'end': start, 'width': lineWidth };
};

/**
 * Gets the index of the boundary of the last character that fits inside the line
 * 
 * Results are given as an object containing both an index and a width, the later of which can be
 * used to detect when the first character was too long to fit on a line. In such cases the result
 * will contain the index of the first character and it's width.
 * 
 * @param start {Integer} Index within "text" to begin fitting from
 * @param end {Integer} Index within "text" to stop fitting to
 * @param ruler {HTMLElement} Element to take measurements with
 * @param width {Integer} Maximum width to allow the line to extend to
 * @return {Integer} Last index within "text" that contains a character that fits
 */
TextFlow.prototype.fitCharacters = function( start, end, ruler, width ) {
	var offset = start,
		middle,
		lineWidth,
		cacheKey;
	do {
		// Place "middle" directly in the center of "start" and "end"
		middle = Math.ceil( ( start + end ) / 2 );
		
		cacheKey = offset + ':' + middle;
		
		if ( cacheKey in this.widthCache ) {
			lineWidth = this.widthCache[cacheKey];
		} else {
			// Fill the line with a portion of the text, escaped as HTML
			ruler.innerHTML = this.content.render( offset, middle );
			// Test for over/under using width of the rendered line
			this.widthCache[cacheKey] = lineWidth = ruler.clientWidth;
		}

		if ( lineWidth > width ) {
			// Detect impossible fit (the first character won't fit by itself)
			if (middle - offset === 1) {
				start = middle - 1;
				break;
			}
			// Words after "middle" won't fit
			end = middle - 1;
		} else {
			// Words before "middle" will fit
			start = middle;
		}
	} while ( start < end );
	return { 'end': start, 'width': lineWidth };
};

extend( TextFlow, EventEmitter );
