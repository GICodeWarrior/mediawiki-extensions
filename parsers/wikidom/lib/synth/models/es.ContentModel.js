/**
 * Creates an es.ContentModel object.
 * 
 * @class
 * @constructor
 * @param text {String}
 * @param annotations {Array}
 * @property text {String}
 * @property annotations {Array}
 */
es.ContentModel = function( data, attributes ) {
	es.EventEmitter.call( this );
	this.data = data || [];
	this.attributes = attributes || {};
};

/* Static Methods */

/**
 * Creates an es.ContentModel object from plain text.
 * 
 * @static
 * @method
 * @param text {String} Text to convert
 * @returns {es.ContentModel} Content object containing converted text
 */
es.Content.newFromText = function( text ) {
	return new es.ContentModel( text.split('') );
};

/**
 * Creates an es.ContentModel object from a plain content object.
 * 
 * A plain content object contains plain text and a series of annotations to be applied to ranges of
 * the text.
 * 
 * @example
 * var content = es.ContentModel.newFromPlainObject( {
 *     'text': '1234',
 *     'attributes': {
 *         'type': 'list',
 *         'styles': ['bullet']
 *     },
 *     'annotations': [
 *         // Makes "23" bold
 *         {
 *             'type': 'bold',
 *             'range': {
 *                 'start': 1,
 *                 'end': 3
 *             }
 *         }
 *     ]
 * } );
 * 
 * @static
 * @method
 * @param obj {Object} Plain content object, containing a "text" property and optionally
 * an "annotations" property, the latter of which being an array of annotation objects including
 * range information
 * @returns {es.ContentModel}
 */
es.ContentModel.newFromPlainObject = function( obj ) {
	var data,
		attributes;
	if ( !$.isPlainObject( obj ) ) {
		// Use empty content
		data = [];
	} else {
		// Convert string to array of characters
		data = obj.text.split('');
		// Set attributes
		attributes = !$.isPlainObject( obj.attributes ) ? {} : $.extend( true, {}, obj.attributes );
		// Render annotations
		if ( $.isArray( obj.annotations ) ) {
			$.each( obj.annotations, function( src ) {
				// Build simplified annotation object
				var dst = { 'type': src.type };
				if ( 'data' in src ) {
					dst.data = es.copyObject( src.data );
				}
				// Apply annotation to range
				if ( src.range.start < 0 ) {
					// TODO: This is invalid data! Throw error?
					src.range.start = 0;
				}
				if ( src.range.end > data.length ) {
					// TODO: This is invalid data! Throw error?
					src.range.end = data.length;
				}
				for ( var i = src.range.start; i < src.range.end; i++ ) {
					// Auto-convert to array
					typeof data[i] === 'string' && ( data[i] = [data[i]] );
					// Append 
					data[i].push( dst );
				}
			} );
		}
	}
	return new es.ContentModel( data, attributes );
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
 * image outputting it's URL
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
 * Gets an es.ContentModel object containing data within a specific range.
 * 
 * @method
 * @param range {es.Range} Range of content to get
 * @returns {es.ContentModel} Content object containing data within range
 */
es.Content.prototype.getContent = function( range ) {
	if ( !range ) {
		range = new es.Range( 0, this.data.length );
	}
	range.normalize();
	return new es.Content( this.data.slice( range.start, range.end ) );
};

/**
 * Gets data within a specific range.
 * 
 * @method
 * @param range {es.Range} Range of data to get
 * @returns {Array} Array of plain text and/or annotated characters within range
 */
es.Content.prototype.getData = function( range ) {
	if ( !range ) {
		range = new es.Range( 0, this.data.length );
	}
	range.normalize();
	return this.data.slice( range.start, range.end );
};

/**
 * Checks if a range of content contains any floating objects.
 * 
 * @method
 * @param range {es.Range} Range of content to check
 * @returns {Boolean} If there's any floating objects in range
 */
es.Content.prototype.hasFloatingObjects = function( range ) {
	if ( !range ) {
		range = new es.Range( 0, this.data.length );
	}
	range.normalize();
	for ( var i = 0; i < this.data.length; i++ ) {
		if ( this.data[i].length > 1 ) {
			for ( var j = 1; j < this.data[i].length; j++ ) {
				var isFloating = es.Content.annotationRenderers[this.data[i][j].type].float;
				if ( isFloating && typeof isFloating === 'function' ) {
					isFloating = isFloating( this.data[i][j].data );
				}
				if ( isFloating ) {
					return true;
				}
			}
		}
	}
	return false;
};

/**
 * Gets the start and end points of the word closest to a given offset.
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
		character;
	while ( start > 0 ) {
		start--;
		character = ( typeof this.data[start] === 'string' ? this.data[start] : this.data[start][0] );
		if ( character.match( /\B/ ) ) {
			start++;
			break;
		}
	}
	while ( end < this.data.length ) {
		character = ( typeof this.data[end] === 'string' ? this.data[end] : this.data[end][0] );
		if ( character.match( /\B/ ) ) {
			break;
		}
		end++;
	}
	return new es.Range( start, end );
};

/**
 * Get a plain content object.
 * 
 * @method
 * @returns {Object}
 */
es.Content.prototype.getPlainObject = function() {
	var stack = [];
	// Text and annotations
	function start( offset, annotation ) {
		stack.push( $.extend( true, {}, annotation, { 'range': { 'start': offset } } ) );
	}
	function end( offset, annotation ) {
		for ( var i = stack.length - 1; i >= 0; i-- ) {
			if ( !stack[i].range.end ) {
				if ( annotation ) {
					if ( stack[i].type === annotation.type
							&& es.compareObjects( stack[i].data, annotation.data ) ) {
						stack[i].range.end = offset;
						break;
					}
				} else {
					stack[i].range.end = offset;
				}
			}
		}
	}
	var left = '',
		right,
		leftPlain,
		rightPlain,
		i, j, k, // iterators
		obj = { 'text': '' },
		offset = 0;
	for ( i = 0; i < this.data.length; i++ ) {
		right = this.data[i];
		leftPlain = typeof left === 'string';
		rightPlain = typeof right === 'string';
		// Open or close annotations
		if ( !leftPlain && rightPlain ) {
			// [formatted][plain] pair, close any annotations for left
			end( i - offset );
		} else if ( leftPlain && !rightPlain ) {
			// [plain][formatted] pair, open any annotations for right
			for ( j = 1; j < right.length; j++ ) {
				start( i - offset, right[j] );
			}
		} else if ( !leftPlain && !rightPlain ) {
			// [formatted][formatted] pair, open/close any differences
			for ( j = 1; j < left.length; j++ ) {
				if ( this.indexOfAnnotation( i , left[j], true ) === -1 ) {
					end( i - offset, left[j] );
				}
			}
			for ( j = 1; j < right.length; j++ ) {
				if ( this.indexOfAnnotation( i - 1, right[j], true ) === -1 ) {
					start( i - offset, right[j] );
				}
			}
		}
		obj.text += rightPlain ? right : right[0];
		left = right;		
	}
	if ( this.data.length ) {
		end( i - offset );
	}
	if ( stack.length ) {
		obj.annotation = stack;
	}
	// Copy attributes if there are any set
	if ( !$.isEmptyObject( this.attributes ) ) {
		obj.attributes = $.extend( true, {}, this.attributes );
	}
	return obj;
};

/**
 * Gets a list of indexes of annotated characters which have a given annotation applied to them.
 * 
 * Comparison is done first by type, and optionally also by data values (strict), not by reference
 * identity, thus considering annotations with identical values to be identical, even if they are
 * different objects.
 * 
 * TODO: Since new line characters are never annotated, they are always considered covered - this
 * may not be ideal behavior. Consider solutions of returning more logical results.
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
 * Comparison is done first by type, and optionally also by data values (strict), not by reference
 * identity, thus considering annotations with identical values to be identical, even if they are
 * different objects.
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
 * Inserts content data at a specific position.
 * 
 * Inserted content can inherit annotations from neighboring content (autoAnnotate).
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
 * Removes all content data.
 * 
 * @method
 * @emits "clear"
 * @emits "change" with type:"clear" data property
 */
es.Content.prototype.clear = function() {
	this.data = [];
	this.emit( 'clear' );
	this.emit( 'change', { 'type': 'clear' } );
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
	 * Content isolation
	 * 
	 * Because content data is an array of either strings containing a single character each or
	 * references to arrays containing a single character string followed by a series of references
	 * to annotation objects, making a "copy" by slicing content data will cause references to
	 * annotated characters in the content data to be shared between the original and the "copy". To
	 * ensure that modifications to annotated characters in the content data do not affect the data
	 * of other content objects, annotated characters must be sliced individually. This is too
	 * expensive to do on all content on every copy, so we only do it when we are going to modify
	 * the annotation information, and on as few annotated characters as possible.
	 */
	for ( var i = range.start; i < range.end; i++ ) {
		if ( typeof this.data[i] !== 'string' ) {
			this.data[i] = this.data[i].slice( 0 );
		}
	}
	/*
	 * Support toggle method by automatically choosing add or remove based on the coverage of the 
	 * content being annotated; if the content is not covered or partially covered "add" will be
	 * used, if the content is completely covered, "remove" will be used.
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

es.extend( es.ContentModel, es.EventEmitter );
