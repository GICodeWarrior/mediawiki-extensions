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
					"offset": 0,
					"length": 4
				}
			},
			{
				"type": "xlink",
				"range": {
					"offset": 8,
					"length": 6
				},
				"data": {
					"url": "http://www.a.com"
				}
			},
			{
				"type": "bold",
				"range": {
					"offset": 10,
					"length": 4
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
					"offset": 11,
					"length": 3
				}
			},
			{
				"type": "bold",
				"range": {
					"offset": 20,
					"length": 4
				}
			}
		]
	}
];

/* Tests */

test( 'Dummy test', function() {
	equals( 1, 1 );
} );
