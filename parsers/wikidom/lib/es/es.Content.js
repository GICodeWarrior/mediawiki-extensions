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

Content.prototype.render = function( start, end ) {
	if ( start || end ) {
		return this.slice( start, end ).render();
	}

	// TODO: Find a better place for this function
	function diff( a, b ) {
		var result = [];
		for ( var i = 1; i < b.length; i++ ) {
			if ( a.indexOf( b[i] ) === -1 ) {
				result.push( b[i] );
			}
		}
		return result;
	}
	
	function openAnnotations( annotations ) {
		var out = '';
		for ( var i = 0; i < annotations.length; i++ ) {
			switch (annotations[i].type) {
				case 'bold':
					out += '<b>';
					break;
				case 'italic':
					out += '<i>';
					break;
			}
		}
		return out;		
	}

	function closeAnnotations ( annotations ) {
		var out = '';
		for ( var i = 0; i < annotations.length; i++ ) {
			switch (annotations[i].type) {
				case 'bold':
					out += '</b>';
					break;
				case 'italic':
					out += '</i>';
					break;
			}
		}
		return out;		
	}
	
	var left = [],
		right,
		out = '';
	
	for ( var i = 0; i < this.data.length; i++ ) {
		right = this.data[i] || [];

		if ( typeof right == 'string' ) {
			right = [right];
		}
		
		var diffout = diff( left, right );
		//debugger;
		out += openAnnotations( diffout );
		
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
		
		out += closeAnnotations( diff( right, left ) );
		left = right;		
	}
	
	return out;
}
