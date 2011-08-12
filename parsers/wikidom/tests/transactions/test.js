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

test( 'Insert and delete', 2, function() {
	var Op = es.Content.Operation,
		Tx = es.Content.Transaction;
	
	var tx = new Tx(
		content,
		new Op( 'retain', 5 ),
		new Op( 'insert', 'used to be' ),
		new Op( 'delete', 2 ),
		new Op( 'retain', 18 )		
	);
	
	equal( tx.commit( content ).getText(), 'This used to be a test paragraph!', 'Committing' );
	equal( tx.rollback( content ).getText(), 'This is a test paragraph!', 'Rolling back' );
} );
