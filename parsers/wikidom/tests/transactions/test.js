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
			new es.Content.Operation( 'retain', 5 ),
			new es.Content.Operation( 'insert', 'used to be' ),
			new es.Content.Operation( 'remove', 2 ),
			new es.Content.Operation( 'retain', 18 )		
		),
		'using es.Content.Transaction.newFromReplace': new es.Content.Transaction.newFromReplace(
			content, new es.Range( 5, 7), 'used to be'
		)
	};
	for ( var method in transactions ) {
		var transaction = transactions[method];
		equal(
			transaction.commit( content ).getText(),
			'This used to be a test paragraph!',
			'Committing transaction built with ' + method
		);
		equal(
			transaction.rollback( content ).getText(),
			'This is a test paragraph!',
			'Rolling back transaction built ' + method
		);
	}
} );
