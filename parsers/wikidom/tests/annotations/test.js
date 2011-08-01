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
				"data": {
					"url": "http://www.a.com"
				},
				"range": {
					"start": 8,
					"end": 14
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

var content = es.Content.newFromWikiDomLines( lines );

/* Tests */

test( 'Content modification', 13, function() {

	content.on( 'change', function( args ) {
		ok( true, 'Change events get triggered after ' + args.type + ' events' );
	} );

	content.on( 'insert', function( args ) {
		ok( true, 'Insert events get triggered' );
		equal( args.offset, 5, 'Insert events have correct offsets' );
		deepEqual( args.content, ['a', 'b', 'c'], 'Insert events have correct content' );
		deepEqual( content.data.slice( 5, 8 ), ['a', 'b', 'c'], 'Content is inserted correctly' );
		// +1 change event
	} );

	content.on( 'annotate', function( args ) {
		ok( true, 'Annotate events get triggered' );
		equal( args.method, 'add', 'Annotate events have correct method' );
		deepEqual( args.annotation, { 'type': 'italic' }, 'Annotate events have correct annotation' );
		deepEqual(
			content.data.slice( 4, 8 ),
			[' ', ['a', { 'type': 'italic' }], 'b', 'c'],
			'Content is annotated correctly'
		);
		// +1 change event
	} );

	content.on( 'remove', function( args ) {
		ok( true, 'Remove events get triggered' );
		deepEqual(
			content.data.slice( 4, 8 ),
			[' ', 'i', 's', ' '],
			'Content is removed correctly'
		);
		// +1 change event
	} );

	content.insert( 5, ['a', 'b', 'c'] );
	content.annotate( 'add', { 'type': 'italic' }, new es.Range( 5, 6 ) );
	content.remove( new es.Range( 5, 8 ) );
} );


/*

test( 'Content export', 2, function() {

	deepEqual(
		content.getLines(),
		lines,
		'Content.getLines returns correct array of all lines'
	);

	var lines1 = [
		{
			"text": "test1",
			"annotations": [
				{
					"type": "bold",
					"range": {
						"start": 0,
						"end": 4
					}
				},
				{
					"type": "italic",
					"range": {
						"start": 2,
						"end": 4
					}
				}
			]
		},
		{
			"text": "test2",
			"annotations": [
				{
					"type": "bold",
					"range": {
						"start": 0,
						"end": 4
					}
				},
				{
					"type": "italic",
					"range": {
						"start": 0,
						"end": 2
					}
				}
				
			]
		}
	];

	deepEqual(
		es.Content.newFromLines( lines1 ).getLines(),
		lines1,
		'Content.getLines returns correct array of all lines for annotations overlapping between lines'
	);
	

} );

test( 'Content access', 8, function() {

	equal(
		content.substring( 3, 39 ),
		's is a test paragraph!\nParagraphs ca',
		'Content.substring returns correct plain text when called with start and end arguments'
	);
	equal(
		content.substring( 39 ),
		'n have more than one line.',
		'Content.substring uses data length if called without end argument'
	);
	equal(
		content.substring( -10, 10 ),
		'This is a ',
		'Content.substring clamps negetive start arguments'
	);
	equal(
		content.substring( 39, 100000000000 ),
		'n have more than one line.',
		'Content.substring clamps out of range end arguments'
	);
	equal(
		content.substring(),
		'This is a test paragraph!\nParagraphs can have more than one line.',
		'Content.substring returns all text when called without arguments'
	);
	equal( content.getLength(), 65, 'Content.getLength returns correct length' );
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
		'Content.slice returns all data when called without arguments'
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
		'Content.slice returns correct range of data when called with start and end arguments'
	);
} );
*/