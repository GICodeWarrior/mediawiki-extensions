/**
 * Flowing text renderer.
 * 
 * TODO: Cleanup code and comments
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param $container {jQuery} Element to render into
 * @param content {es.Content} Initial content to render
 * @property $ {jQuery}
 * @property content {es.Content}
 * @property boundaries {Array}
 * @property lines {Array}
 * @property width {Integer}
 * @property bondaryTest {RegExp}
 * @property widthCache {Object}
 * @property renderState {Object}
 */
es.TextFlow = function( $container, content ) {
	// Inheritance
	es.EventEmitter.call( this );
	
	// Members
	this.$ = $container;
	this.content = content || new es.Content();
	this.boundaries = [];
	this.lines = [];
	this.width = null;
	this.boundaryTest = /([ \-\t\r\n\f])/g;
	this.widthCache = {};
	this.renderState = {};
	
	// Events
	var flow = this;
	this.content.on( 'insert', function( args ) {
		flow.scanBoundaries();
		flow.render( args.offset );
	} );
	this.content.on( 'remove', function( args ) {
		flow.scanBoundaries();
		flow.render( args.start );
	} );
	this.content.on( 'annotate', function( args ) {
		flow.scanBoundaries();
		flow.render( args.start );
	} );
	
	// Initialization
	this.scanBoundaries();
}

/**
 * Gets offset within content closest to of a given position.
 * 
 * Position is assumed to be local to the container the text is being flowed in.
 * 
 * @param position {Object} Position to find offset for
 * @param position.left {Integer} Horizontal position in pixels
 * @param position.top {Integer} Vertical position in pixels
 * @return {Integer} Offset within content nearest the given coordinates
 */
es.TextFlow.prototype.getOffset = function( position ) {
	/*
	 * Line finding
	 * 
	 * If the position is above the first line, the offset will always be 0, and if the position is
	 * below the last line the offset will always be {this.content.length}. All other vertical
	 * vertical positions will fall inside of one of the lines.
	 */
	var lineCount = this.lines.length;
	// Positions above the first line always jump to the first offset
	if ( !lineCount || position.top < 0 ) {
		return 0;
	}
	// Find which line the position is inside of
	var i = 0,
		top = 0;
	while ( i < lineCount ) {
		top += this.lines[i].height;
		if ( position.top <= top ) {
			break;
		}
		i++;
	}
	// Positions below the last line always jump to the last offset
	if ( i == lineCount ) {
		return this.content.getLength();
	}
	// Alias current line object
	var line = this.lines[i];
	
	/*
	 * Offset finding
	 * 
	 * Now that we know which line we are on, we can just use the "fitCharacters" method to get the
	 * last offset before "position.left".
	 * 
	 * TODO: The offset needs to be chosen based on nearest offset to the cursor, not offset before
	 * the cursor.
	 */
	var $ruler = $( '<div class="editSurface-ruler"></div>' ).appendTo( this.$ ),
		ruler = $ruler[0],
		fit = this.fitCharacters( line.range, ruler, position.left );
	ruler.innerHTML = this.content.render( new es.Range( line.range.start, fit.end ) );
	var left = ruler.clientWidth;
	ruler.innerHTML = this.content.render( new es.Range( line.range.start, fit.end + 1 ) );
	var right = ruler.clientWidth;
	var center = Math.round( left + ( ( right - left ) / 2 ) );
	$ruler.remove();
	// Reset RegExp object's state
	this.boundaryTest.lastIndex = 0;
	return Math.min(
		// If the position is right of the center of the character it's on top of, increment offset
		fit.end + ( position.left >= center ? 1 : 0 ),
		// If the line ends in a non-boundary character, decrement offset
		line.range.end + ( this.boundaryTest.exec( line.text.substr( -1 ) ) ? -1 : 0 )
	);
};

/**
 * Gets position coordinates of a given offset.
 * 
 * Offsets are boundaries between plain or annotated characters within content. Results are given in
 * left, top and bottom positions, which could be used to draw a cursor, highlighting, etc.
 * 
 * @param offset {Integer} Offset within content
 * @return {Object} Object containing left, top and bottom properties, each positions in pixels
 */
es.TextFlow.prototype.getPosition = function( offset ) {
	/*
	 * Range validation
	 * 
	 * Rather than clamping the range, which can hide errors, exceptions will be thrown if offset is
	 * less than 0 or greater than the length of the content.
	 */
	if ( offset < 0 ) {
		throw 'Out of range error. Offset is expected to be greater than or equal to 0.';
	} else if ( offset > this.content.getLength() ) {
		throw 'Out of range error. Offset is expected to be less than or equal to text length.';
	}
	
	/*
	 * Line finding
	 * 
	 * It's possible that a more efficient method could be used here, but the number of lines to be
	 * iterated through will rarely be over 100, so it's unlikely that any significant gains will be
	 * had. Plus, as long as we are iterating over each line, we can also sum up the top and bottom
	 * positions, which is a nice benefit of this method.
	 */
	var line,
		lineCount = this.lines.length,
		position = {
			'left': 0,
			'top': 0,
			'bottom': 0,
			'line': 0
		};
	while ( position.line < lineCount ) {
		line = this.lines[position.line];
		if ( line.range.containsOffset( offset ) ) {
			position.bottom = position.top + line.height;
			break;
		}
		position.top += line.height;
		position.line++;
	}
	
	/*
	 * Virtual n+1 position
	 * 
	 * To allow access to position information of the right side of the last character on the last
	 * line, a virtual n+1 position is supported. Offsets beyond this virtual position will cause
	 * an exception to be thrown.
	 */
	if ( position.line === lineCount ) {
		position.line--;
		position.bottom = position.top;
		position.top -= line.height;
	}
	
	/*
	 * Offset measuring
	 * 
	 * Since the left position will be zero for the first character in the line, so we can skip
	 * measuring for those cases.
	 */
	if ( line.range.start < offset ) {
		var $ruler = $( '<div class="editSurface-ruler"></div>' ).appendTo( this.$ ),
			ruler = $ruler[0];
		ruler.innerHTML = this.content.render( new es.Range( line.range.start, offset ) );
		position.left = ruler.clientWidth;
		$ruler.remove();
	}
	
	return position;
};

/**
 * Updates the word boundary cache, which is used for word fitting.
 */
es.TextFlow.prototype.scanBoundaries = function() {
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
	var text = this.content.getText();
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
	if ( end < text.length || this.boundaries.length === 1 ) {
		this.boundaries.push( text.length );
	}
};

/**
 * Renders a batch of lines and then yields execution before rendering another batch.
 * 
 * In cases where a single word is too long to fit on a line, the word will be "virtually" wrapped,
 * causing them to be fragmented. Word fragments are rendered on their own lines, except for their
 * remainder, which is combined with whatever proceeding words can fit on the same line.
 */
es.TextFlow.prototype.renderIteration = function( limit ) {
	var rs = this.renderState,
		iteration = 0,
		fractional = false,
		lineStart = this.boundaries[rs.wordOffset],
		lineEnd,
		wordFit = null,
		charOffset = 0,
		charFit = null,
		wordCount = this.boundaries.length;
	while ( ++iteration <= limit && rs.wordOffset < wordCount - 1 ) {
		wordFit = this.fitWords( new es.Range( rs.wordOffset, wordCount - 1 ), rs.ruler, rs.width );
		fractional = false;
		if ( wordFit.width > rs.width ) {
			// The first word didn't fit, we need to split it up
			charOffset = lineStart;
			var lineOffset = rs.wordOffset;
			rs.wordOffset++;
			lineEnd = this.boundaries[rs.wordOffset];
			do {
				charFit = this.fitCharacters(
					new es.Range( charOffset, lineEnd ), rs.ruler, rs.width
				);
				// If we were able to get the rest of the characters on the line OK
				if ( charFit.end === lineEnd) {
					// Try to fit more words on the line
					wordFit = this.fitWords(
						new es.Range( rs.wordOffset, wordCount - 1 ),
						rs.ruler,
						rs.width - charFit.width
					);
					if ( wordFit.end > rs.wordOffset ) {
						lineOffset = rs.wordOffset;
						rs.wordOffset = wordFit.end;
						charFit.end = lineEnd = this.boundaries[rs.wordOffset];
					}
				}
				this.appendLine( new es.Range( charOffset, charFit.end ), lineOffset, fractional );
				// Move on to another line
				charOffset = charFit.end;
				// Mark the next line as fractional
				fractional = true;
			} while ( charOffset < lineEnd );
		} else {
			lineEnd = this.boundaries[wordFit.end];
			this.appendLine( new es.Range( lineStart, lineEnd ), rs.wordOffset, fractional );
			rs.wordOffset = wordFit.end;
		}
		lineStart = lineEnd;
	}
	// Only perform on actual last iteration
	if ( rs.wordOffset >= wordCount - 1 ) {
		// Cleanup
		rs.$ruler.remove();
		this.lines = rs.lines;
		this.$.find( '.editSurface-line[line-index=' + ( this.lines.length - 1 ) + ']' )
			.nextAll()
			.remove();
		rs.timeout = undefined;
		this.emit( 'render' );
	} else {
		rs.ruler.innerHTML = '';
		var flow = this;
		rs.timeout = setTimeout( function() {
			flow.renderIteration( 3 );
		}, 0 );
	}
};

/**
 * Renders text into a series of HTML elements, each a single line of wrapped text.
 * 
 * The offset parameter can be used to reduce the amount of work involved in re-rendering the same
 * text, but will be automatically ignored if the text or width of the container has changed.
 * 
 * Rendering happens asynchronously, and yields execution between iterations. Iterative rendering
 * provides the JavaScript engine an ability to process events between rendering batches of lines,
 * allowing rendering to be interrupted and restarted if changes to content are happening before
 * rendering of all lines is complete.
 * 
 * @param offset {Integer} Offset to re-render from, if possible (not yet implemented)
 */
es.TextFlow.prototype.render = function( offset ) {
	var rs = this.renderState;
	
	// Check if rendering is currently underway
	if ( rs.timeout !== undefined ) {
		// Cancel the active rendering process
		clearTimeout( rs.timeout );
		// Cleanup
		rs.$ruler.remove();
	}
	
	// Clear caches that were specific to the previous render
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
	rs.ruler = rs.$ruler.addClass('editSurface-ruler')[0];
	
	// Ignore offset optimization if the width has changed or the text has never been flowed before
	if (this.width !== rs.width) {
		offset = undefined;
	}
	this.width = rs.width;
	
	// Reset the render state
	if ( offset ) {
		var gap,
			currentLine = this.lines.length - 1;
		for ( var i = this.lines.length - 1; i >= 0; i-- ) {
			var line = this.lines[i];
			if ( line.range.start < offset && line.range.end > offset ) {
				currentLine = i;
			}
			if ( ( line.range.end < offset && !line.fractional ) || i === 0 ) {
				rs.lines = this.lines.slice( 0, i );
				rs.wordOffset = line.wordOffset;
				gap = currentLine - i;
				break;
			}
		}
		this.renderIteration( 2 + gap );
	} else {
		rs.lines = [];
		rs.wordOffset = 0;
		this.renderIteration( 3 );
	}
};

/**
 * Adds a line containing a given range of text to the end of the DOM and the "lines" array.
 * 
 * @param range {es.Range} Range of content to append
 * @param start {Integer} Beginning of text range for line
 * @param end {Integer} Ending of text range for line
 * @param wordOffset {Integer} Index within this.words which the line begins with
 * @param fractional {Boolean} If the line begins in the middle of a word
 */
es.TextFlow.prototype.appendLine = function( range, wordOffset, fractional ) {
	var rs = this.renderState,
		lineCount = rs.lines.length;
	$line = this.$.children( '[line-index=' + lineCount + ']' );
	if ( !$line.length ) {
		$line = $( '<div class="editSurface-line" line-index="' + lineCount + '"></div>' );
		this.$.append( $line );
	}
	$line[0].innerHTML = this.content.render( range );
	// Collect line information
	rs.lines.push({
		'text': this.content.getText( range ),
		'range': range,
		'width': $line.outerWidth(),
		'height': $line.outerHeight(),
		'wordOffset': wordOffset,
		'fractional': fractional
	});
	// Disable links within content
	$line.find( '.editSurface-format-object a' )
		.mousedown( function( e ) {
			e.preventDefault();
		} )
		.click( function( e ) {
			e.preventDefault();
		} );
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
 * @param range {es.Range} Range of content to try to fit
 * @param ruler {HTMLElement} Element to take measurements with
 * @param width {Integer} Maximum width to allow the line to extend to
 * @return {Integer} Last index within "words" that contains a word that fits
 */
es.TextFlow.prototype.fitWords = function( range, ruler, width ) {
	var offset = range.start,
		start = range.start,
		end = range.end,
		charOffset = this.boundaries[offset],
		middle,
		lineWidth,
		cacheKey;
	do {
		// Place "middle" directly in the center of "start" and "end"
		middle = Math.ceil( ( start + end ) / 2 );
		charMiddle = this.boundaries[middle];

		// Measure and cache width of substring
		cacheKey = charOffset + ':' + charMiddle;
		// Prepare the line for measurement using pre-escaped HTML
		ruler.innerHTML = this.content.render( new es.Range( charOffset, charMiddle ) );
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
	// Check if we ended by moving end to the left of middle
	if ( end === middle - 1 ) {
		// A final measurement is required
		var charStart = this.boundaries[start];
		ruler.innerHTML = this.content.render( new es.Range( charOffset, charStart ) );
		lineWidth = this.widthCache[charOffset + ':' + charStart] = ruler.clientWidth;
	}
	return { 'end': start, 'width': lineWidth };
};

/**
 * Gets the index of the boundary of the last character that fits inside the line
 * 
 * Results are given as an object containing both an index and a width, the later of which can be
 * used to detect when the first character was too long to fit on a line. In such cases the result
 * will contain the index of the first character and it's width.
 * 
 * @param range {es.Range} Range of content to try to fit
 * @param ruler {HTMLElement} Element to take measurements with
 * @param width {Integer} Maximum width to allow the line to extend to
 * @return {Integer} Last index within "text" that contains a character that fits
 */
es.TextFlow.prototype.fitCharacters = function( range, ruler, width ) {
	var offset = range.start,
		start = range.start,
		end = range.end,
		middle,
		lineWidth,
		cacheKey;
	do {
		// Place "middle" directly in the center of "start" and "end"
		middle = Math.ceil( ( start + end ) / 2 );
		
		// Measure and cache width of substring
		cacheKey = offset + ':' + middle;
		if ( cacheKey in this.widthCache ) {
			lineWidth = this.widthCache[cacheKey];
		} else {
			// Fill the line with a portion of the text, escaped as HTML
			ruler.innerHTML = this.content.render( new es.Range( offset, middle ) );
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
	// Check if we ended by moving end to the left of middle
	if ( end === middle - 1 ) {
		// Try for cache hit
		cacheKey = offset + ':' + start;
		if ( cacheKey in this.widthCache ) {
			lineWidth = this.widthCache[cacheKey];
		} else {
			// A final measurement is required
			ruler.innerHTML = this.content.render( new es.Range( offset, start ) );
			lineWidth = this.widthCache[cacheKey] = ruler.clientWidth;
		}
	}
	return { 'end': start, 'width': lineWidth };
};

es.extend( es.TextFlow, es.EventEmitter );
