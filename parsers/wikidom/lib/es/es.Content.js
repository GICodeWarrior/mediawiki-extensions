function Content( content ) {
	this.data = content || [];
};

Content.compareObjects = function( a, b ) {
	for ( var key in a ) {
		if ( typeof a[key] !== typeof b[key] ) {
			return false
		} else if ( typeof a[key] === 'string' || typeof a[key] === 'number' ) {
			if ( a[key] !== b[key] ) {
				return false;
			}
		} else if ( $.isPlainObject( a[key] ) ) {
			if ( !Content.compareObjects( a[key], b[key] ) ) {
				return false;
			}
		}
	}
	return true;
};

Content.copyObject = function( src ) {
	var dst = {};
	for ( var key in src ) {
		if ( typeof src[key] === 'string' || typeof src[key] === 'number' ) {
			dst[key] = src[key];
		} else if ( $.isPlainObject( src[key] ) ) {
			dst[key] = Content.copyObject( src[key] );
		}
	}
	return dst;
};

Content.convertLine = function( line ) {
	// Convert string to array of characters
	var data = line.text.split('');
	for ( var i in line.annotations ) {
		var src = line.annotations[i];
		// Build simplified annotation object
		var dst = { 'type': src.type };
		if ( 'data' in src ) {
			dst.data = Content.copyObject( src.data );
		}
		// Apply annotation to range
		for ( var k = src.range.start; k < src.range.end; k++ ) {
			// Auto-convert to array
			typeof data[k] === 'string' && ( data[k] = [data[k]] );
			// Append 
			data[k].push( dst );
		}
	}
	return data;
};

Content.newFromLine = function( line ) {
	return new Content( Content.convertLine( line ) );
};

Content.newFromLines = function( lines ) {
	var data = [];
	for ( var i = 0; i < lines.length; i++ ) {
		data = data.concat( Content.convertLine( lines[i] ) );
		if ( i < lines.length - 1 ) {
			data.push( '\n' );
		}
	}
	return new Content( data );
};

Content.prototype.substring = function( start, end ) {
	// Wrap values
	start = Math.max( 0, start || 0 );
	if ( end === undefined ) {
		end = this.data.length;
	} else {
		end = Math.min( this.data.length, end )
	}
	// Copy characters
	var text = '';
	for ( var i = start; i < end; i++ ) {
		// If not using in IE6 or IE7 (which do not support array access for strings) use this..
		// text += this.data[i][0];
		// Otherwise use this...
		text += typeof this.data[i] === 'string' ? this.data[i] : this.data[i][0];
	}
	return text;
};

Content.prototype.slice = function( start, end ) {
	return new Content( this.data.slice( start, end ) );
};

Content.prototype.insert = function( start, insert ) {
	// TODO: Prefer to not take annotations from a neighbor that's a space character
	var neighbor = this.data[Math.max( start - 1, 0 )];
	if ( $.isArray( neighbor ) ) {
		var annotations = neighbor.slice( 1 );
		for ( var i = 0; i < insert.length; i++ ) {
			if ( typeof insert[i] === 'string' ) {
				insert[i] = [insert[i]];
			}
			insert[i] = insert[i].concat( annotations );
		}
	}
	Array.prototype.splice.apply( this.data, [start, 0].concat( insert ) )
};

Content.prototype.remove = function( start, end ) {
	this.data.splice( start, end - start );
};

Content.prototype.getLength = function() {
	return this.data.length; 
};

Content.annotationRenderers = {
	'bold': {
		'open': '<span class="editSurface-format-bold">',
		'close': '</span>',
	},
	'italic': {
		'open': '<span class="editSurface-format-italic">',
		'close': '</span>',
	},
	'small': {
		'open': '<span class="editSurface-format-small">',
		'close': '</span>',
	},
	'super': {
		'open': '<span class="editSurface-format-super">',
		'close': '</span>',
	},
	'sub': {
		'open': '<span class="editSurface-format-sub">',
		'close': '</span>',
	},
	'xlink': {
		'open': function( data ) {
			return '<span class="editSurface-format-xlink" data-href="' + data.href + '">';
		},
		'close': '</span>'
	}
};

Content.renderAnnotation = function( bias, annotation, stack ) {
	var renderers = Content.annotationRenderers,
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

/**
 * Applies an annotation to a given range.
 * 
 * If a range arguments are not provided, all content will be annotated.
 * 
 * @param annotation {Object} Annotation to apply
 * @param start {Integer} Offset to begin annotating from
 * @param end {Integer} Offset to stop annotating to
 */
Content.prototype.annotate = function( annotation, start, end ) {
	start = Math.max( start, 0 );
	end = Math.min( end, this.data.length );
	for ( var i = start; i < end; i++ ) {
		switch ( annotation.method ) {
			case 'add':
				var duplicate = false;
				if ( typeof this.data[i] === 'string' ) {
					this.data[i] = [this.data[i]];
				} else {
					for ( var j = 1; j < this.data[i].length; j++ ) {
						if ( this.data[i][j].type === annotation.type 
								&& Content.compareObjects(
									this.data[i][j].data, annotation.data
								)
						) {
							duplicate = true;
						}
					}
				}
				if ( !duplicate ) {
					this.data[i].push( annotation );
				}
				break;
			case 'remove':
				if ( typeof this.data[i] !== 'string' ) {
					if ( annotation.type === 'all' ) {
						this.data[i] = this.data[i][0];
					} else {
						for ( var j = 1; j < this.data[i].length; j++ ) {
							if ( this.data[i][j].type === annotation.type 
									&& Content.compareObjects(
										this.data[i][j].data, annotation.data
									)
							) {
								this.data[i].splice( j, 1 );
								j--;
							}
						}
					}
				}
				break;
			case 'toggle':
				var on = true;
				if ( typeof this.data[i] !== 'string' ) {
					for ( var j = 1; j < this.data[i].length; j++ ) {
						if ( this.data[i][j].type === annotation.type 
								&& Content.compareObjects(
									this.data[i][j].data, annotation.data
								)
						) {
							this.data[i].splice( j, 1 );
							j--;
							on = false;
						}
					}
				}
				if ( on ) {
					if ( typeof this.data[i] === 'string' ) {
						this.data[i] = [this.data[i]];
					}
					this.data[i].push( annotation );
				}
				break;
		}
	}
};

Content.htmlCharacters = {
	'&': '&amp;',
	'<': '&lt;',
	'>': '&gt;',
	'\'': '&#039;',
	'"': '&quot;',
	' ': '&nbsp;',
	'\n': '<span class="editSurface-whitespace">&#182;</span>',
	'\t': '<span class="editSurface-whitespace">&#8702;</span>'
};

Content.prototype.render = function( start, end ) {
	if ( start || end ) {
		return this.slice( start, end ).render();
	}
	var out = '',
		left = '',
		right,
		leftPlain,
		rightPlain,
		stack = [];
	for ( var i = 0; i < this.data.length; i++ ) {
		right = this.data[i];
		leftPlain = typeof left === 'string';
		rightPlain = typeof right === 'string';
		if ( !leftPlain && rightPlain ) {
			// [formatted][plain] pair, close any annotations for left
			for ( var j = 1; j < left.length; j++ ) {
				out += Content.renderAnnotation( 'close', left[j], stack );
			}
		} else if ( leftPlain && !rightPlain ) {
			// [plain][formatted] pair, open any annotations for right
			for ( var j = 1; j < right.length; j++ ) {
				out += Content.renderAnnotation( 'open', right[j], stack );
			}
		} else if ( !leftPlain && !rightPlain ) {
			// [formatted][formatted] pair, open/close any differences
			for ( var j = 1; j < left.length; j++ ) {
				if ( right.indexOf( left[j] ) === -1 ) {
					out += Content.renderAnnotation( 'close', left[j], stack );
				}
			}
			for ( var j = 1; j < right.length; j++ ) {
				if ( left.indexOf( right[j] ) === -1 ) {
					out += Content.renderAnnotation( 'open', right[j], stack );
				}
			}
		}
		out += right[0] in Content.htmlCharacters ? Content.htmlCharacters[right[0]] : right[0];
		left = right;		
	}
	
	return out;
}
