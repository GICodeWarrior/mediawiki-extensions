function Content( content ) {
	this.data = content || [];
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
		'open': '<span class="bold">',
		'close': '</span>',
	},
	'italic': {
		'open': '<span class="italic">',
		'close': '</span>',
	},
	'xlink': {
		'open': function( data ) {
			return '<span class="xlink" data-href="' + data.href + '">';
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
		out += right[0]
			// Tags
			.replace( /&/g, '&amp;' )
			.replace( /</g, '&lt;' )
			.replace( />/g, '&gt;' )
			// Quotes - probably not needed
			//.replace( /'/g, '&#039;' )
			//.replace( /"/g, '&quot;' )
			// Whitespace
			.replace( / /g, '&nbsp;' )
			.replace( /\n/g, '<span class="editSurface-whitespace">\\n</span>' )
			.replace( /\t/g, '<span class="editSurface-whitespace">\\t</span>' );
		
		left = right;		
	}
	
	return out;
}
