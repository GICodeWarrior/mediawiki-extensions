module( 'Wiki DOM Annotations' );

/* Functions */

function multiLineSubstring( lines, start, end ) {
	var result = {
			'text': '',
			'charAnnotations': []
		},
		line,
		left = 0,
		right,
		from,
		to;
	for ( var l = 0; l < lines.length; l++ ) {
		line = lines[l];
		right = left + line.text.length;
		if ( start >= left && start < right ) {
			from = start - left;
			to = end < right ? end - left : line.text.length;
		} else if ( from !== undefined && to !== undefined ) {
			from = 0;
			to = end < right ? end - left : line.text.length;
		}
		if ( from !== undefined && to !== undefined ) {
			result.text += line.text.substring( from, to );
			for ( var c = from; c < to; c++ ) {
				line.charAnnotations[c] && ( result.charAnnotations[left + c] = line.charAnnotations[c] );
			}
		}
		left = right;
	}
	return result;
}

function diff( a, b ) {
	var result = [];
	for ( var i = 0; i < b.length; i++ ) {
		if ( a.indexOf( b[i] ) === -1 ) {
			result.push( b[i] );
		}
	}
	return result;
}

function openAnnotations( annotations ) {
	// TODO: Something...
	return '';
}

function closeAnnotations( annotations ) {
	// TODO: Something...
	return '';
}

function renderText( text, charAnnotations ) {
	var out = '';
	var left = [];
	for (i in text) {
		var right = charAnnotations[i] || [];
		out += openAnnotations( diff( left, right ) );
		out += text[i];
		out += closeAnnotations( diff( right, left ) );
		right = left;
	}
	return out;
}

/* Test Data */

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

function convertAnnotations( lines ) {
	for ( var i in lines ) {
		
		var line = lines[i];

		line.content = [];
		
		for ( var j in line.text ) {
			line.content[j] = [line.text[j]];
		}
		
		for ( var j in line.annotations ) {
			var annotation = line.annotations[j];
			
			for ( var k = annotation.range.start; k <= annotation.range.end; k++ ) {
				line.content[k].push( annotation );
			}
		}

	}
}
convertAnnotations( lines );

/* Tests */

test( 'Multiline substrings produce correct plain text', function() {
	equals( multiLineSubstring( lines, 3, 39 ).text, 's is a test paragraph!\nParagraphs ca' );
} );
