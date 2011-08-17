module( 'Content Transactions' );

var lines = [
	{
		"text": "This is a test paragraph!",
		"annotations": [
		    // Make "This" italic
			{
				"type": "italic",
				"range": {
					"start": 0,
					"end": 4
				}
			},
		    // Make "a test" a link
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
		    // Make "test" bold
			{
				"type": "bold",
				"range": {
					"start": 10,
					"end": 14
				}
			}
		]
	}
];

var content = es.Content.newFromWikiDomLines( lines );

/* Tests */

test( 'Insert, retain and remove', 4, function() {
	var before = content.getContent(),
		after = new es.Content( [
			["T", { "type": "italic" }],
			["h", { "type": "italic" }],
			["i", { "type": "italic" }],
			["s", { "type": "italic" }],
			" ",
			"u",
			"s",
			"e",
			"d",
			" ",
			"t",
			"o",
			" ",
			"b",
			"e",
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
			"!"
		] );
	
	var tx = new es.Content.Transaction(),
		insertion = es.Content.newFromText( 'used to be' ),
		removal = content.getContent( new es.Range( 5, 7 ) );
	
	tx.add( 'retain', 5 );
	tx.add( 'insert', insertion );
	tx.add( 'remove', removal );
	tx.add( 'retain', 18 );
	
	var committed = tx.commit( content );
	equal( committed.getText(), after.getText(), 'Committing' );
	deepEqual( committed.getData(), after.getData(), 'Committing' );
	var rolledback = tx.rollback( committed );
	equal( rolledback.getText(), before.getText(), 'Rolling back' );
	deepEqual( rolledback.getData(), before.getData(), 'Rolling back' );
} );

test( 'Annotating', 4, function() {
	var before = content.getContent(),
		after = new es.Content( [
			["T", { "type": "italic" }],
			["h", { "type": "italic" }],
			["i", { "type": "italic" }],
			["s", { "type": "italic" }],
			[" ", { "type": "italic" }],
			["i", { "type": "italic" }],
			["s", { "type": "italic" }],
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
			"!"
		] );
	
	var tx = new es.Content.Transaction(),
		annotation = { 'method': 'add', 'annotation': { 'type': 'italic' } };
	
	tx.add( 'retain', 4 );
	tx.add( 'start', annotation );
	tx.add( 'retain', 3 );
	tx.add( 'end', annotation );
	tx.add( 'retain', 18 );
	
	var committed = tx.commit( content );
	
	equal( committed.getText(), after.getText(), 'Committing' );
	deepEqual( committed.getData(), after.getData(), 'Committing' );
	var rolledback = tx.rollback( committed );
	equal( rolledback.getText(), before.getText(), 'Rolling back' );
	deepEqual( rolledback.getData(), before.getData(), 'Rolling back' );
} );
