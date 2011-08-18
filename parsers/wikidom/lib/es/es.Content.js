/**
 * Annotated content.
 * 
 * Content objects are wrappers around arrays of plain or annotated characters. Data in this form
 * is ultimately equivalent to but more efficient to work with than WikiDom line objects (plain text
 * paired with offset annotation), especially when performing substring operations. Content can be
 * derived from or converted to one or more WikiDom line objects.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param data {Array} List of plain or annotated characters
 * @property data {Array} List of plain or annotated characters
 */
es.Content = function( data, attributes ) {
	es.EventEmitter.call( this );
	this.data = data || [];
	this.attributes = attributes || {};
};

/* Static Members */

/**
 * List of annotation rendering implementations.
 * 
 * Each supported annotation renderer must have an open and close property, each either a string or
 * a function which accepts a data argument.
 * 
 * @static
 * @member
 */
es.Content.annotationRenderers = {
	'template': {
		'open': function( data ) {
			return '<span class="editSurface-format-object">' + data.html;
		},
		'close': '</span>',
	},
	'bold': {
		'open': '<span class="editSurface-format-bold">',
		'close': '</span>',
	},
	'italic': {
		'open': '<span class="editSurface-format-italic">',
		'close': '</span>',
	},
	'size': {
		'open': function( data ) {
			return '<span class="editSurface-format-' + data.type + '">';
		},
		'close': '</span>',
	},
	'script': {
		'open': function( data ) {
			return '<span class="editSurface-format-' + data.type + '">';
		},
		'close': '</span>',
	},
	'xlink': {
		'open': function( data ) {
			return '<span class="editSurface-format-link" data-href="' + data.href + '">';
		},
		'close': '</span>'
	},
	'ilink': {
		'open': function( data ) {
			return '<span class="editSurface-format-link" data-title="' + data.title + '">';
		},
		'close': '</span>'
	}
};

/**
 * Mapping of character and HTML entities or renderings.
 * 
 * @static
 * @member
 */
es.Content.htmlCharacters = {
	'&': '&amp;',
	'<': '&lt;',
	'>': '&gt;',
	'\'': '&#039;',
	'"': '&quot;',
	' ': '&nbsp;',
	'\n': '<span class="editSurface-whitespace">&#182;</span>',
	'\t': '<span class="editSurface-whitespace">&#8702;</span>'
};

/* Static Methods */

/**
 * Creates a new Content object from plain text.
 * 
 * @static
 * @method
 * @param text {String} Text to convert
 * @returns {es.Content} EditSurface content object containing converted text
 */
es.Content.newFromText = function( text ) {
	return new es.Content( text.split('') );
};

/**
 * Creates a new Content object from a WikiDom line object.
 * 
 * @static
 * @method
 * @param wikidomLine {Object} WikiDom compatible line object - @see Content.convertLine
 * @returns {es.Content} EditSurface content object containing data derived from the WikiDom line
 */
es.Content.newFromWikiDomLine = function( wikidomLine ) {
	return new es.Content( es.Content.convertWikiDomLine( wikidomLine ) );
};

/**
 * Creates a new Content object from a list of WikiDom line objects.
 * 
 * This plural version of Content.newFromLine inserts non-annotated new line characters between
 * lines, preserving the divisions between the original line objects. When Content objects are
 * converted to WikiDom line objects, these new line characters are used to split the content data
 * into multiple line objects, thus making a clean round trip possible.
 * 
 * @static
 * @method
 * @param wikidomLines {Array} List of WikiDom compatible line objects
 * @returns {es.Content} New content object containing data derived from the WikiDom line
 */
es.Content.newFromWikiDomLines = function( wikidomLines ) {
	var data = [];
	var i;
	for ( i = 0; i < wikidomLines.length; i++ ) {
		data = data.concat( es.Content.convertWikiDomLine( wikidomLines[i] ) );
		if ( i < wikidomLines.length - 1 ) {
			data.push( '\n' );
		}
	}
	return new es.Content( data );
};

/**
 * Gets content data from a WikiDom line object, which uses a series of offset-based annotations to
 * supplement plain text.
 * 
 * @static
 * @method
 * @param wikidomLine {Object} WikiDom compatible line object, containing text and optionally
 * annotations properties, the latter of which being an array of annotation objects including range
 * information
 * @returns {Array} List of plain or annotated characters
 */
es.Content.convertWikiDomLine = function( wikidomLine ) {
	if ( !wikidomLine ) {
		return [];
	}
	// Convert string to array of characters
	var data = wikidomLine.text.split('');
	var i;
	for ( i in wikidomLine.annotations ) {
		var src = wikidomLine.annotations[i];
		// Build simplified annotation object
		var dst = { 'type': src.type };
		if ( 'data' in src ) {
			dst.data = es.copyObject( src.data );
		}
		// Apply annotation to range
		var k;
		if ( src.range.start < 0 ) {
			// TODO: This is invalid data! Throw error?
			src.range.start = 0;
		}
		if ( src.range.end > data.length ) {
			// TODO: This is invalid data! Throw error?
			src.range.end = data.length;
		}
		for ( k = src.range.start; k < src.range.end; k++ ) {
			// Auto-convert to array
			typeof data[k] === 'string' && ( data[k] = [data[k]] );
			// Append 
			data[k].push( dst );
		}
	}
	return data;
};

/**
 * Gets a rendered opening or closing of an annotation.
 * 
 * Tag nesting is handled using a stack, which keeps track of what is currently open. A common stack
 * argument should be used while rendering content.
 * 
 * @static
 * @method
 * @param bias {String} Which side of the annotation to render, either "open" or "close"
 * @param annotation {Object} Annotation to render
 * @param stack {Array} List of currently open annotations
 * @returns {String} Rendered annotation
 */
es.Content.renderAnnotation = function( bias, annotation, stack ) {
	var renderers = es.Content.annotationRenderers,
		type = annotation.type,
		out = '';
	if ( type in renderers ) {
		if ( bias === 'open' ) {
			// Add annotation to the top of the stack
			stack.push( annotation );
			// Open annotation
			out += typeof renderers[type]['open'] === 'function'
				? renderers[type]['open']( annotation.data )
				: renderers[type]['open'];
		} else {
			if ( stack[stack.length - 1] === annotation ) {
				// Remove annotation from top of the stack
				stack.pop();
				// Close annotation
				out += typeof renderers[type]['close'] === 'function'
					? renderers[type]['close']( annotation.data )
					: renderers[type]['close'];
			} else {
				// Find the annotation in the stack
				var depth = stack.indexOf( annotation );
				if ( depth === -1 ) {
					throw 'Invalid stack error. An element is missing from the stack.';
				}
				// Close each already opened annotation
				for ( var i = stack.length - 1; i >= depth + 1; i-- ) {
					out += typeof renderers[stack[i].type]['close'] === 'function'
						? renderers[stack[i].type]['close']( stack[i].data )
						: renderers[stack[i].type]['close'];
				}
				// Close the buried annotation
				out += typeof renderers[type]['close'] === 'function'
					? renderers[type]['close']( annotation.data )
					: renderers[type]['close'];
				// Re-open each previously opened annotation
				for ( var i = depth + 1; i < stack.length; i++ ) {
					out += typeof renderers[stack[i].type]['open'] === 'function'
						? renderers[stack[i].type]['open']( stack[i].data )
						: renderers[stack[i].type]['open'];
				}
				// Remove the annotation from the middle of the stack
				stack.splice( depth, 1 );
			}
		}
	}
	return out;
};

/* Methods */

/**
 * Gets the length of the content data.
 * 
 * @method
 * @returns {Integer} Length of content data
 */
es.Content.prototype.getLength = function() {
	return this.data.length; 
};

/**
 * Gets the value of an attribute.
 * 
 * @method
 * @param name {String} Name of attribute to get value for
 * @returns {Mixed} Value of attribute, or undefined if attribute does not exist
 */
es.Content.prototype.getAttribute = function( name ) {
	return this.attributes[name];
};

/**
 * Sets the value of an attribute.
 * 
 * @method
 * @param name {String} Name of attribute to set value for
 * @param value {Mixed} Value to set attribute to
 */
es.Content.prototype.setAttribute = function( name, value ) {
	this.attributes[name] = value;
};

/**
 * Gets plain text version of the content within a specific range.
 * 
 * Range arguments (start and end) are clamped if out of range.
 * 
 * TODO: Implement render option, which will allow annotations to influence output, such as an
 * image outputing it's URL
 * 
 * @method
 * @param range {es.Range} Range of text to get
 * @param start {Integer} Optional beginning of range, if omitted range will begin at 0
 * @param end {Integer} Optional end of range, if omitted range will end a this.data.length
 * @param render {Boolean} If annotations should have any influence on output
 * @returns {String} Text within given range
 */
es.Content.prototype.getText = function( range, render ) {
	if ( !range ) {
		range = new es.Range( 0, this.data.length );
	} else {
		range.normalize();
	}
	// Copy characters
	var text = '';
	var i;
	for ( i = range.start; i < range.end; i++ ) {
		// If not using in IE6 or IE7 (which do not support array access for strings) use this..
		// text += this.data[i][0];
		// Otherwise use this...
		text += typeof this.data[i] === 'string' ? this.data[i] : this.data[i][0];
	}
	return text;
};

/**
 * Gets a new Content object containing content data within a specific range.
 * 
 * Range arguments (start and end) are clamped if out of range.
 * 
 * @method
 * @param range {es.Range} Range of content to get
 * @returns {es.Content} New content object containing content within range
 */
es.Content.prototype.getContent = function( range ) {
	if ( !range ) {
		range = new es.Range( 0, this.data.length );
	}
	range.normalize();
	return new es.Content( this.data.slice( range.start, range.end ) );
};

/**
 * Gets content data within a specific range.
 * 
 * @method
 * @param range {es.Range} Range of content to get
 * @returns {Array} Array of plain text and annotated characters within range
 */
es.Content.prototype.getData = function( range ) {
	if ( !range ) {
		range = new es.Range( 0, this.data.length );
	}
	range.normalize();
	return this.data.slice( range.start, range.end );
};

/**
 * Inserts content data at a specific position.
 * 
 * Inserted content will inherit annotations from neighboring content.
 * 
 * @method
 * @param offset {Integer} Position to insert content at
 * @param content {Array} Content data to insert
 * @emits "insert" with offset and content data properties
 * @emits "change" with type:"insert" data property
 */
es.Content.prototype.insert = function( offset, content, autoAnnotate ) {
	if ( autoAnnotate ) {
		// TODO: Prefer to not take annotations from a neighbor that's a space character
		var neighbor = this.data[Math.max( offset - 1, 0 )];
		if ( $.isArray( neighbor ) ) {
			var annotations = neighbor.slice( 1 );
			var i;
			for ( i = 0; i < content.length; i++ ) {
				if ( typeof content[i] === 'string' ) {
					content[i] = [content[i]];
				}
				content[i] = content[i].concat( annotations );
			}
		}
	}
	Array.prototype.splice.apply( this.data, [offset, 0].concat( content ) );
	this.emit( 'insert', {
		'offset': offset,
		'content': content
	} );
	this.emit( 'change', { 'type': 'insert' } );
};

/**
 * Removes content data within a specific range.
 * 
 * @method
 * @param range {Range} Range of content to remove
 * @emits "remove" with range data property
 * @emits "change" with type:"remove" data property
 */
es.Content.prototype.remove = function( range ) {
	range.normalize();
	this.data.splice( range.start, range.getLength() );
	this.emit( 'remove', {
		'range': range
	} );
	this.emit( 'change', { 'type': 'remove' } );
};

/**
 * Gets a list of indexes within the content data which use a given annotation.
 * 
 * Strict coverage may be used to compare not only annotation types, but also their data. Since new
 * line characters are never annotated, they are always considered covered.
 * 
 * @method
 * @param range {es.Range} Range of content to analyze
 * @param annotation {Object} Annotation to compare with
 * @param strict {Boolean} Optionally compare annotation data as well as type
 * @returns {Array} List of indexes of covered characters within content data
 */
es.Content.prototype.coverageOfAnnotation = function( range, annotation, strict ) {
	var coverage = [];
	var i, index;
	for ( i = range.start; i < range.end; i++ ) {
		index = this.indexOfAnnotation( i, annotation );
		if ( typeof this.data[i] !== 'string' && index !== -1 ) {
			if ( strict ) {
				if ( es.compareObjects( this.data[i][index].data, annotation.data ) ) {
					coverage.push( i );
				}
			} else {
				coverage.push( i );
			}
		} else if ( this.data[i] === '\n' ) {
			coverage.push( i );
		}
	}
	return coverage;
};

/**
 * Gets the first index within an annotated character that matches a given annotation.
 * 
 * Strict coverage may be used to compare not only annotation types, but also their data.
 * 
 * @method
 * @param offset {Integer} Index of character within content data to find annotation within
 * @param annotation {Object} Annotation to compare with
 * @param strict {Boolean} Optionally compare annotation data as well as type
 * @returns {Integer} Index of first instance of annotation in content
 */
es.Content.prototype.indexOfAnnotation = function( offset, annotation, strict ) {
	var annotatedChar = this.data[offset];
	var i;
	if ( typeof annotatedChar !== 'string' ) {
		for ( i = 1; i < this.data[offset].length; i++ ) {
			if ( annotatedChar[i].type === annotation.type ) {
				if ( strict ) {
					if ( es.compareObjects( annotatedChar[i].data, annotation.data ) ) {
						return i;
					}
				} else {
					return i;
				}
			}
		}
	}
	return -1;
};

/**
 * Applies an annotation to content data within a given range.
 * 
 * If a range arguments are not provided, all content will be annotated. New line characters are
 * never annotated. The add method will replace and the remove method will delete any existing
 * annotations with the same type as the annotation argument, regardless of their data properties.
 * The toggle method will use add if any of the content within the range is not already covered by
 * the annotation, or remove if all of it is.
 * 
 * @method
 * @param method {String} Way to apply annotation ("toggle", "add" or "remove")
 * @param annotation {Object} Annotation to apply
 * @param range {es.Range} Range of content to annotate
 * @emits "annotate" with method, annotation and range data properties
 * @emits "change" with type:"annotate" data property
 */
es.Content.prototype.annotate = function( method, annotation, range ) {
	// Support calling without a range argument, using the full content range as default
	if ( !range ) {
		range = new es.Range( 0, this.data.length );
	} else {
		range.normalize();
	}
	/*
	 * Because content data is an array of either strings containing a single character each or
	 * references to arrays containing a single character string followed by a series of references
	 * to annotation objects, making a "copy" by slicing content data will cause references to
	 * annotated characters in the content data to be shared between the original and the "copy". To
	 * ensure that modifications to annotated characters in the content data do not affect the data
	 * of other content objects, annotated characters must be sliced individually. This is too
	 * expensive to do on all content on every copy, so we only do it when we are going to modify
	 * the annotation information, and on a few annotated characters as possible.
	 */
	for ( var i = range.start; i < range.end; i++ ) {
		if ( typeof this.data[i] !== 'string' ) {
			this.data[i] = this.data[i].slice( 0 );
		}
		i++;
	}
	/*
	 * Support toggle method by automatically choosing add or remove based on the coverage of the 
	 * content being annotated; if the content is not covered or partially covered add will be used,
	 * if the content is completely covered, remove will be used.
	 */
	if ( method === 'toggle' ) {
		var coverage = this.coverageOfAnnotation( range, annotation, false );
		if ( coverage.length === range.getLength() ) {
			var strictCoverage = this.coverageOfAnnotation( range, annotation, true );
			method = strictCoverage.length === coverage.length ? 'remove' : 'add';
		} else {
			method = 'add';
		}
	}
	if ( method === 'add' ) {
		var duplicate;
		for ( var i = range.start; i < range.end; i++ ) {
			duplicate = -1;
			if ( typeof this.data[i] === 'string' ) {
				// Never annotate new lines
				if ( this.data[i] === '\n' ) {
					continue;
				}
				// Auto-convert to annotated character format
				this.data[i] = [this.data[i]];
			} else {
				// Detect duplicate annotation
				duplicate = this.indexOfAnnotation( i, annotation );
			}
			if ( duplicate === -1 ) {
				// Append new annotation
				this.data[i].push( annotation );
			} else {
				// Replace existing annotation
				this.data[i][duplicate] = annotation;
			}
		}
	} else if ( method === 'remove' ) {
		for ( var i = range.start; i < range.end; i++ ) {
			if ( typeof this.data[i] !== 'string' ) {
				if ( annotation.type === 'all' ) {
					// Remove all annotations by converting the annotated character to a plain
					// character
					this.data[i] = this.data[i][0];
				}
				// Remove all matching instances of annotation
				var j;
				while ( ( j = this.indexOfAnnotation( i, annotation ) ) !== -1 ) {
					this.data[i].splice( j, 1 );
				}
				// Auto-convert to plain character format
				if ( this.data[i].length === 1 ) {
					this.data[i] = this.data[i][0];
				}
			}
		}
	}
	this.emit( 'annotate', {
		'method': method,
		'annotation': annotation,
		'range': range
	} );
	this.emit( 'change', { 'type': 'annotate' } );
};

/**
 * Gets an HTML rendering of a range of content data.
 * 
 * @method
 * @param start {Integer} Beginning of range
 * @param end {Integer} End of range
 * @param {String} Rendered HTML of content data
 */
es.Content.prototype.render = function( range ) {
	if ( range ) {
		return this.getContent( range ).render();
	}
	var out = '',
		left = '',
		right,
		leftPlain,
		rightPlain,
		i, j, // iterators
		stack = [];
	for ( i = 0; i < this.data.length; i++ ) {
		right = this.data[i];
		leftPlain = typeof left === 'string';
		rightPlain = typeof right === 'string';
		if ( !leftPlain && rightPlain ) {
			// [formatted][plain] pair, close any annotations for left
			for ( j = 1; j < left.length; j++ ) {
				out += es.Content.renderAnnotation( 'close', left[j], stack );
			}
		} else if ( leftPlain && !rightPlain ) {
			// [plain][formatted] pair, open any annotations for right
			for ( j = 1; j < right.length; j++ ) {
				out += es.Content.renderAnnotation( 'open', right[j], stack );
			}
		} else if ( !leftPlain && !rightPlain ) {
			// [formatted][formatted] pair, open/close any differences
			for ( j = 1; j < left.length; j++ ) {
				if ( right.indexOf( left[j] ) === -1 ) {
					out += es.Content.renderAnnotation( 'close', left[j], stack );
				}
			}
			for ( j = 1; j < right.length; j++ ) {
				if ( left.indexOf( right[j] ) === -1 ) {
					out += es.Content.renderAnnotation( 'open', right[j], stack );
				}
			}
		}
		
		out += right[0] in es.Content.htmlCharacters
			? es.Content.htmlCharacters[right[0]] : right[0];
		left = right;		
	}
	// close all remaining tags at the end of the content
	if ( !rightPlain && right ) {
		for ( j = 1; j < right.length; j++ ) {
			out += es.Content.renderAnnotation( 'close', right[j], stack );
		}
	}
	return out;
};

/**
 * Gets the start and end points of the word closest a given offset.
 * 
 * @method
 * @param offset {Integer} Offset to find word nearest to
 * @returns {Object} Range object of boundaries
 */
es.Content.prototype.getWordBoundaries = function( offset ) {
	if ( offset < 0 || offset > this.data.length ) {
		throw 'Out of bounds error. Offset expected to be >= 0 and <= to ' + this.data.length;
	}
	var start = offset,
		end = offset,
		char;
	while ( start > 0 ) {
		start--;
		char = ( typeof this.data[start] === 'string' ? this.data[start] : this.data[start][0] );
		if ( char.match( /\B/ ) ) {
			start++;
			break;
		}
	}
	while ( end < this.data.length ) {
		char = ( typeof this.data[end] === 'string' ? this.data[end] : this.data[end][0] );
		if ( char.match( /\B/ ) ) {
			break;
		}
		end++;
	}
	return new es.Range( start, end );
};

/**
 * Helper function for Content.getWikiDomLines()
 * 
 * @method
 */
es.Content.prototype.handleAnnotation = function( bias, stack, index, annotation ) {
	if ( bias === 'open' ) {
		var newAnnotation = es.copyObject( annotation );
		newAnnotation.range = {
			start: index
		};
		stack.push( newAnnotation );	
	} else {
		for ( var i = stack.length - 1; i >= 0; i-- ) {
			if ( !stack[i].range.end ) {
				if ( annotation ) {
					if ( stack[i].type === annotation.type && es.compareObjects( stack[i].data, annotation.data ) ) {
						stack[i].range.end = index;
						break;
					}
				} else {
					stack[i].range.end = index;
				}
			}
		}
	}
};

/**
 * Get WikiDom line objects from content.
 * 
 * @method
 * @returns {Array} List of WikiDom line objects
 */
es.Content.prototype.getWikiDomLines = function() {
	var left = '',
		right,
		leftPlain,
		rightPlain,
		i, j, k, // iterators
		lines = [],
		line = null,
		offset = 0;

	for ( i = 0; i < this.data.length; i++ ) {
		
		if ( line == null ) {
			line = { text : '', annotations : [] };
		}
		
		right = this.data[i];
		leftPlain = typeof left === 'string';
		rightPlain = typeof right === 'string';
		
		if ( rightPlain && right == "\n" ) {
			this.handleAnnotation( 'close', line.annotations, i - offset );
			lines.push(line);
			line = null;
			offset = i + 1;
			left = '';
			continue;
		}
		
		if ( !leftPlain && rightPlain ) {
			// [formatted][plain] pair, close any annotations for left
			this.handleAnnotation( 'close', line.annotations, i - offset );
		} else if ( leftPlain && !rightPlain ) {
			// [plain][formatted] pair, open any annotations for right
			for ( j = 1; j < right.length; j++ ) {
				this.handleAnnotation( 'open', line.annotations, i - offset, right[j] );
			}
		} else if ( !leftPlain && !rightPlain ) {
			// [formatted][formatted] pair, open/close any differences
			for ( j = 1; j < left.length; j++ ) {
				if ( this.indexOfAnnotation( i , left[j], true ) === -1 ) {
					this.handleAnnotation( 'close', line.annotations, i - offset, left[j] );
				}
			}
			for ( j = 1; j < right.length; j++ ) {
				if ( this.indexOfAnnotation( i - 1, right[j], true ) === -1 ) {
					this.handleAnnotation( 'open', line.annotations, i - offset, right[j] );
				}
			}
		}

		line.text += rightPlain ? right : right[0];
		left = right;		
	}

	if ( line != null ) {
		this.handleAnnotation( 'close', line.annotations, i - offset );
		lines.push( line );
	}
	return lines;	
};

/* Inheritance */

es.extend( es.Content, es.EventEmitter );
