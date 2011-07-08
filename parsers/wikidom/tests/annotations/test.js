module( 'Wiki DOM Annotations' );

/* Functions */

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

function renderText( text, renderedAnnotations ) {
	var out = '';
	var left = [];
	for (i in text) {
		var right = renderedAnnotations[i] || [];
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
		"text": "This is a test paragraph!",
		"annotations": [
			{
				"type": "italic",
				"range": {
					"start": 0,
					"stop": 4
				}
			},
			{
				"type": "xlink",
				"range": {
					"start": 8,
					"stop": 14
				},
				"data": {
					"url": "http://www.a.com"
				}
			},
			{
				"type": "bold",
				"range": {
					"start": 10,
					"stop": 14
				}
			}
		]
	},
	{
		"text": "Paragraphs can have more than one line.",
		"annotations": [
			{
				"type": "italic",
				"range": {
					"start": 11,
					"stop": 14
				}
			},
			{
				"type": "bold",
				"range": {
					"start": 20,
					"stop": 24
				}
			}
		]
	}
];

function convertAnnotations( lines ) {
	for ( var i in lines ) {
		var line = lines[i];
		line.charAnnotations = [];
		for ( var j in line.annotations ) {
			var annotation = line.annotations[j];
			for ( var k = annotation.range.start; k <= annotation.range.stop; k++ ) {
				if ( !line.charAnnotations[k] ) {
					line.charAnnotations[k] = [];
				}
				line.charAnnotations[k].push( annotation );
			}			
		}
	}
}

convertAnnotations( lines );

/* Tests */

test( 'Dummy test', function() {
	equals( 1, 1 );
} );
