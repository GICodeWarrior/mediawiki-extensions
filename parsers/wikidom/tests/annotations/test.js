module( 'Wiki DOM Annotations' );

var lines = [
	{
		"text": "This is a test paragraph!",
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
		"text": "Paragraphs can have more than one line.",
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

var content = Content.newFromLines( lines );

/* Tests */

test( 'Content.substring', function() {
	expect( 5 );
	
	equal(
		content.substring( 3, 39 ),
		's is a test paragraph!\nParagraphs ca',
		'Returns correct plain text'
	);
	equal(
		content.substring( 39 ),
		'n have more than one line.',
		'Uses data length if end is not given'
	);
	equal(
		content.substring( -10, 10 ),
		'This is a ',
		'Clamps negetive start arguments'
	);
	equal(
		content.substring( 39, 100000000000 ),
		'n have more than one line.',
		'Clamps out of range end arguments'
	);
	equal(
		content.substring(),
		'This is a test paragraph!\nParagraphs can have more than one line.',
		'Called without arguments returns all text'
	);
} );

test( 'Content.getLength', function() {
	equals( content.getLength(), 65, 'Returns correct length' );
} )

test( 'Content.slice', function() {
	deepEqual(
		content.slice().data,
		[
			["T", { "type": "italic" }],
			["h", { "type": "italic" }],
			["i", { "type": "italic" }],
			["s", { "type": "italic" }],
			" ",
			"i",
			"s",
			" ",
			["a", { "type": "xlink", "data": { "url":"http://www.a.com" } }],
			[" ", { "type": "xlink", "data": { "url":"http://www.a.com" } }],
			["t", { "type": "xlink", "data": { "url":"http://www.a.com" } }, { "type": "bold" }],
			["e", { "type": "xlink", "data": { "url":"http://www.a.com" } }, { "type": "bold" }],
			["s", { "type": "xlink", "data": { "url":"http://www.a.com" } }, { "type": "bold" }],
			["t", { "type": "xlink", "data": { "url":"http://www.a.com" } }, { "type": "bold" }],
			" ",
			"p",
			"a",
			"r",
			"a",
			"g",
			"r",
			"a",
			"p",
			"h",
			"!",
			"\n",
			"P",
			"a",
			"r",
			"a",
			"g",
			"r",
			"a",
			"p",
			"h",
			"s",
			" ",
			["c", { "type": "italic" }],
			["a", { "type": "italic" }],
			["n", { "type": "italic" }],
			" ",
			"h",
			"a",
			"v",
			"e",
			" ",
			["m", { "type": "bold" }],
			["o", { "type": "bold" }],
			["r", { "type": "bold" }],
			["e", { "type": "bold" }],
			" ",
			"t",
			"h",
			"a",
			"n",
			" ",
			"o",
			"n",
			"e",
			" ",
			"l",
			"i",
			"n",
			"e",
			"."
		],
		'Called without arguments returns all data'
	);
	deepEqual(
		content.slice( 3, 10 ).data,
		[
			["s", { "type": "italic" }],
			" ",
			"i",
			"s",
			" ",
			["a", { "type": "xlink", "data": { "url":"http://www.a.com" } }],
			[" ", { "type": "xlink", "data": { "url":"http://www.a.com" } }]
		],
		'Called with start and end returns range of data'
	);
} );
