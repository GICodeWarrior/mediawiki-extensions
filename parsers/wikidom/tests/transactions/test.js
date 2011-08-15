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
	var transactions = {
		'by calling constructor manually': new es.Content.Transaction(
			content,
			new es.Content.Operation.Retain( 5 ),
			new es.Content.Operation.Insert( es.Content.newFromText( 'used to be' ) ),
			new es.Content.Operation.Remove( 2 ),
			new es.Content.Operation.Retain( 18 )
		),
		'using es.Content.Transaction.newFromReplace': new es.Content.Transaction.newFromReplace(
			content, new es.Range( 5, 7), new es.Content.newFromText( 'used to be' )
		)
	};
	var before = content.getData(),
		after = [
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
		];
	for ( var method in transactions ) {
		var transaction = transactions[method];
		deepEqual(
			transaction.commit( content ).getData(),
			after,
			'Committing transaction built with ' + method
		);
		deepEqual(
			transaction.rollback( content ).getData(),
			before,
			'Rolling back transaction built ' + method
		);
	}
} );

/*
test( 'Annotating', 4, function() {
	var transactions = {
		'by calling constructor manually': new es.Content.Transaction(
			content,
			new es.Content.Operation( 'retain', 4 ),
			new es.Content.Operation( 'begin', { 'type': 'italic' } ),
			new es.Content.Operation( 'retain', 3 ),
			new es.Content.Operation( 'end', { 'type': 'italic' } ),
			new es.Content.Operation( 'retain', 18 )		
		),
		'using es.Content.Transaction.newFromAnnotate': new es.Content.Transaction.newFromAnnotate(
			content, new es.Range( 4, 7), 'add', { 'type': 'italic' }
		)
	};
	var before = content.getData(),
		after = [
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
		];
	for ( var method in transactions ) {
		var transaction = transactions[method];
		deepEqual(
			transaction.commit( content ).getData(),
			after,
			'Committing transaction built with ' + method
		);
		deepEqual(
			transaction.rollback( content ).getData(),
			before,
			'Rolling back transaction built ' + method
		);
	}
} );
*/