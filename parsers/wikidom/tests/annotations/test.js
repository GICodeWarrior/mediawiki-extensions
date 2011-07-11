module( 'Wiki DOM Annotations' );

var lines = [
	{
		"text": "This is a test paragraph!\n",
		"annotations": [
			{
				"type": "italic",
				"range": {
					"start": 0,
					"end": 4
				}
			},
			{
				"type": "xlink",
				"range": {
					"start": 8,
					"end": 14
				},
				"data": {
					"url": "http://www.a.com"
				}
			},
			{
				"type": "bold",
				"range": {
					"start": 10,
					"end": 14
				}
			}
		]
	},
	{
		"text": "Paragraphs can have more than one line.\n",
		"annotations": [
			{
				"type": "italic",
				"range": {
					"start": 11,
					"end": 14
				}
			},
			{
				"type": "bold",
				"range": {
					"start": 20,
					"end": 24
				}
			}
		]
	}
];

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

var content = Content.newFromLines( lines );

/* Tests */

test( 'Content.substring returns correct plain text', function() {
	equal( content.substring( 3, 39 ), 's is a test paragraph!\nParagraphs ca' );
} );

test( 'Content.substring uses data length if end is not given', function() {
	equal( content.substring( 39 ), 'n have more than one line.\n' );
} );

test( 'Content.substring clamps out of range values', function() {
	equal( content.substring( -10, 10 ), 'This is a ' );
} );

test( 'Content.substring called without arguments returns all text', function() {
	equal(
		content.substring(),
		'This is a test paragraph!\nParagraphs can have more than one line.\n'
	);
} );
