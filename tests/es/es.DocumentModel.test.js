module( 'es/models' );

test( 'es.DocumentModel.getData', 1, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( esTest.obj );
	
	// Test 1
	deepEqual( documentModel.getData(), esTest.data, 'Flattening plain objects results in correct data' );
} );

test( 'es.DocumentModel.getChildren', 1, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( esTest.obj );

	function equalLengths( a, b ) {
		if ( a.length !== b.length ) {
			return false;
		}
		for ( var i = 0; i < a.length; i++ ) {
			if ( a[i].getContentLength() !== b[i].getContentLength() ) {
				console.log( 'mismatched content lengths', a[i], b[i] );
				return false;
			}
			aIsBranch = typeof a[i].getChildren === 'function';
			bIsBranch = typeof b[i].getChildren === 'function';
			if ( aIsBranch !== bIsBranch ) {
				return false;
			}
			if ( aIsBranch && !equalLengths( a[i].getChildren(), b[i].getChildren() ) ) {
				return false;
			}
		}
		return true;
	}
	
	// Test 1
	ok(
		equalLengths( documentModel.getChildren(), esTest.tree ),
		'Nodes in the model tree contain correct lengths'
	);
} );

test( 'es.DocumentModel.getRelativeContentOffset', 7, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( esTest.obj );
	
	// Test 1
	equal(
		documentModel.getRelativeContentOffset( 1, 1 ),
		2,
		'getRelativeContentOffset advances forwards through the inside of elements'
	);
	// Test 2
	equal(
		documentModel.getRelativeContentOffset( 2, -1 ),
		1,
		'getRelativeContentOffset advances backwards through the inside of elements'
	);
	// Test 3
	equal(
		documentModel.getRelativeContentOffset( 3, 1 ),
		4,
		'getRelativeContentOffset uses the offset after the last character in an element'
	);
	// Test 3
	equal(
		documentModel.getRelativeContentOffset( 1, -1 ),
		1,
		'getRelativeContentOffset treats the begining a document as a non-content offset'
	);
	// Test 4
	equal(
		documentModel.getRelativeContentOffset( 32, 1 ),
		32,
		'getRelativeContentOffset treats the end a document as a non-content offset'
	);
	// Test 5
	equal(
		documentModel.getRelativeContentOffset( 4, 1 ),
		9,
		'getRelativeContentOffset advances forwards between elements'
	);
	// Test 6
	equal(
		documentModel.getRelativeContentOffset( 32, -1 ),
		25,
		'getRelativeContentOffset advances backwards between elements'
	);
} );

test( 'es.DocumentModel.getContent', 6, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( esTest.obj ),
		childNodes = documentModel.getChildren();

	// Test 1
	deepEqual(
		childNodes[0].getContent( new es.Range( 1, 3 ) ),
		[
			['b', { 'type': 'textStyle/bold', 'hash': '#textStyle/bold' }],
			['c', { 'type': 'textStyle/italic', 'hash': '#textStyle/italic' }]
		],
		'getContent can return an ending portion of the content'
	);

	// Test 2
	deepEqual(
		childNodes[0].getContent( new es.Range( 0, 2 ) ),
		['a', ['b', { 'type': 'textStyle/bold', 'hash': '#textStyle/bold' }]],
		'getContent can return a beginning portion of the content'
	);
	
	// Test 3
	deepEqual(
		childNodes[0].getContent( new es.Range( 1, 2 ) ),
		[['b', { 'type': 'textStyle/bold', 'hash': '#textStyle/bold' }]],
		'getContent can return a middle portion of the content'
	);
	
	// Test 4
	try {
		childNodes[0].getContent( new es.Range( -1, 3 ) );
	} catch ( negativeIndexError ) {
		ok( true, 'getContent throws exceptions when given a range with start < 0' );
	}
	
	// Test 5
	try {
		childNodes[0].getContent( new es.Range( 0, 4 ) );
	} catch ( outOfRangeError ) {
		ok( true, 'getContent throws exceptions when given a range with end > length' );
	}
	
	// Test 6
	deepEqual( childNodes[2].getContent(), ['h'], 'Content can be extracted from nodes' );
} );

test( 'es.DocumentModel.getIndexOfAnnotation', 3, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( esTest.obj );
	
	var bold = { 'type': 'textStyle/bold', 'hash': '#textStyle/bold' },
		italic = { 'type': 'textStyle/italic', 'hash': '#textStyle/italic' },
		nothing = { 'type': 'nothing', 'hash': '#nothing' },
		character = ['a', bold, italic];
	
	// Test 1
	equal(
		es.DocumentModel.getIndexOfAnnotation( character, bold ),
		1,
		'getIndexOfAnnotation get the correct index'
	);
	
	// Test 2
	equal(
		es.DocumentModel.getIndexOfAnnotation( character, italic ),
		2,
		'getIndexOfAnnotation get the correct index'
	);
	
	// Test 3
	equal(
		es.DocumentModel.getIndexOfAnnotation( character, nothing ),
		-1,
		'getIndexOfAnnotation returns -1 if the annotation was not found'
	);
} );

test( 'es.DocumentModel.getWordBoundaries', 2, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( esTest.obj );
	deepEqual(
		documentModel.getWordBoundaries( 2 ),
		new es.Range( 1, 4 ),
		'getWordBoundaries returns range around nearest whole word'
	);
	strictEqual(
		documentModel.getWordBoundaries( 5 ),
		null,
		'getWordBoundaries returns null when given non-content offset'
	);
} );

test( 'es.DocumentModel.getAnnotationBoundaries', 2, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( esTest.obj );
	deepEqual(
		documentModel.getAnnotationBoundaries( 2, { 'type': 'textStyle/bold' } ),
		new es.Range( 2, 3 ),
		'getWordBoundaries returns range around content covered by annotation'
	);
	strictEqual(
		documentModel.getAnnotationBoundaries( 1, { 'type': 'textStyle/bold' } ),
		null,
		'getWordBoundaries returns null if offset is not covered by annotation'
	);
} );

test( 'es.DocumentModel.getAnnotationsFromOffset', 4, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( esTest.obj );
	deepEqual(
		documentModel.getAnnotationsFromOffset( 1 ),
		[],
		'getAnnotationsFromOffset returns empty array for non-annotated content'
	);
	deepEqual(
		documentModel.getAnnotationsFromOffset( 2 ),
		[{ 'type': 'textStyle/bold', 'hash': '#textStyle/bold' }],
		'getAnnotationsFromOffset returns annotations of annotated content correctly'
	);
	deepEqual(
		documentModel.getAnnotationsFromOffset( 3 ),
		[{ 'type': 'textStyle/italic', 'hash': '#textStyle/italic' }],
		'getAnnotationsFromOffset returns annotations of annotated content correctly'
	);
	deepEqual(
		documentModel.getAnnotationsFromOffset( 0 ),
		[],
		'getAnnotationsFromOffset returns empty array when given a non-content offset'
	);
} );

test( 'es.DocumentModel.prepareElementAttributeChange', 4, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( esTest.obj );

	// Test 1
	deepEqual(
		documentModel.prepareElementAttributeChange( 0, 'set', 'test', 1234 ).getOperations(),
		[
			{ 'type': 'attribute', 'method': 'set', 'key': 'test', 'value': 1234  },
			{ 'type': 'retain', 'length': 34 }
		],
		'prepareElementAttributeChange retains data after attribute change for first element'
	);
	
	// Test 2
	deepEqual(
		documentModel.prepareElementAttributeChange( 5, 'set', 'test', 1234 ).getOperations(),
		[
			{ 'type': 'retain', 'length': 5 },
			{ 'type': 'attribute', 'method': 'set', 'key': 'test', 'value': 1234 },
			{ 'type': 'retain', 'length': 29 }
		],
		'prepareElementAttributeChange retains data before and after attribute change'
	);
	
	// Test 3
	try {
		documentModel.prepareElementAttributeChange( 1, 'set', 'test', 1234 );
	} catch ( invalidOffsetError ) {
		ok(
			true,
			'prepareElementAttributeChange throws an exception when offset is not an element'
		);
	}
	
	// Test 4
	try {
		documentModel.prepareElementAttributeChange( 4, 'set', 'test', 1234 );
	} catch ( closingElementError ) {
		ok(
			true,
			'prepareElementAttributeChange throws an exception when offset is a closing element'
		);
	}
} );

test( 'es.DocumentModel.prepareContentAnnotation', 1, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( esTest.obj );

	// Test 1
	deepEqual(
		documentModel.prepareContentAnnotation(
			new es.Range( 1, 4 ), 'set', { 'type': 'textStyle/bold' }
		).getOperations(),
		[
			{ 'type': 'retain', 'length': 1 },
			{
				'type': 'annotate',
				'method': 'set',
				'bias': 'start',
				'annotation': { 'type': 'textStyle/bold', 'hash': '#textStyle/bold' }
			},
			{ 'type': 'retain', 'length': 1 },
			{
				'type': 'annotate',
				'method': 'set',
				'bias': 'stop',
				'annotation': { 'type': 'textStyle/bold', 'hash': '#textStyle/bold' }
			},
			{ 'type': 'retain', 'length': 1 },
			{
				'type': 'annotate',
				'method': 'set',
				'bias': 'start',
				'annotation': { 'type': 'textStyle/bold', 'hash': '#textStyle/bold' }
			},
			{ 'type': 'retain', 'length': 1 },
			{
				'type': 'annotate',
				'method': 'set',
				'bias': 'stop',
				'annotation': { 'type': 'textStyle/bold', 'hash': '#textStyle/bold' }
			},
			{ 'type': 'retain', 'length': 30 }
		],
		'prepareContentAnnotation skips over content that is already set or cleared'
	);
} );

test( 'es.DocumentModel.prepareRemoval', 5, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( esTest.obj );

	// Test 1
	deepEqual(
		documentModel.prepareRemoval( new es.Range( 1, 4 ) ).getOperations(),
		[
			{ 'type': 'retain', 'length': 1 },
			{
				'type': 'remove',
				'data': [
					'a',
					['b', { 'type': 'textStyle/bold', 'hash': '#textStyle/bold' }],
					['c', { 'type': 'textStyle/italic', 'hash': '#textStyle/italic' }]
				]
			},
			{ 'type': 'retain', 'length': 30 }
		],
		'prepareRemoval includes the content being removed'
	);
	
	// Test 2
	deepEqual(
		documentModel.prepareRemoval( new es.Range( 17, 22 ) ).getOperations(),
		[
			{ 'type': 'retain', 'length': 17 },
			{
				'type': 'remove',
				'data': [
					{ 'type': 'listItem', 'attributes': { 'styles': ['bullet', 'bullet'] } },
					{ 'type': 'paragraph' },
					'f',
					{ 'type': '/paragraph' },
					{ 'type': '/listItem' }
				]
			},
			{ 'type': 'retain', 'length': 12 }
		],
		'prepareRemoval removes entire elements'
	);
	
	// Test 3
	deepEqual(
		documentModel.prepareRemoval( new es.Range( 21, 23 ) ).getOperations(),
		[
			{ 'type': 'retain', 'length': 21 },
			{
				'type': 'remove',
				'data': [
					{ 'type': '/listItem' },
					{ 'type': 'listItem', 'attributes': { 'styles': ['number'] } }
				]
			},
			{ 'type': 'retain', 'length': 11 }
		],
		'prepareRemoval merges two list items'
	);

	// Test 4
	deepEqual(
		documentModel.prepareRemoval( new es.Range( 3, 9 ) ).getOperations(),
		[
			{ 'type': 'retain', 'length': 3 },
			{
				'type': 'remove',
				'data': [
					['c', { 'type': 'textStyle/italic', 'hash': '#textStyle/italic' }]
				]
			},
			{ 'type': 'retain', 'length': 30 }
		],
		'prepareRemoval works across structural nodes'
	);

	// Test 4
	deepEqual(
		documentModel.prepareRemoval( new es.Range( 3, 24 ) ).getOperations(),
		[
			{ 'type': 'retain', 'length': 3 },
			{
				'type': 'remove',
				'data': ['c', { 'type': 'textStyle/italic', 'hash': '#textStyle/italic' }]
			},
			{ 'type': 'retain', 'length': 4 },
			{
				'type': 'remove',
				'data': [{ 'type': 'paragraph' }, 'd', { 'type': '/paragraph' }]
			},
			{ 'type': 'retain', 'length': 1 },
			{
				'type': 'remove',
				'data': [
					{ 'type': 'listItem', 'attributes': { 'styles': ['bullet'] } },
					{ 'type': 'paragraph' },
					'e',
					{ 'type': '/paragraph' },
					{ 'type': '/listItem' },
					{ 'type': 'listItem', 'attributes': { 'styles': ['bullet', 'bullet'] } },
					{ 'type': 'paragraph' },
					'f',
					{ 'type': '/paragraph' },
					{ 'type': '/listItem' }
				]
			},
			{ 'type': 'retain', 'length': 13 }
		],
		'prepareRemoval strips and drops correctly when working accross structural nodes'
	);
} );

test( 'es.DocumentModel.prepareInsertion', 11, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( esTest.obj );

	// Test 1
	deepEqual(
		documentModel.prepareInsertion( 1, ['d', 'e', 'f'] ).getOperations(),
		[
			{ 'type': 'retain', 'length': 1 },
			{ 'type': 'insert', 'data': ['d', 'e', 'f'] },
			{ 'type': 'retain', 'length': 33 }
		],
		'prepareInsertion retains data up to the offset and includes the content being inserted'
	);
	
	// Test 2
	deepEqual(
		documentModel.prepareInsertion(
			5, [{ 'type': 'paragraph' }, 'd', 'e', 'f', { 'type': '/paragraph' }]
		).getOperations(),
		[
			{ 'type': 'retain', 'length': 5 },
			{
				'type': 'insert',
				'data': [{ 'type': 'paragraph' }, 'd', 'e', 'f', { 'type': '/paragraph' }]
			},
			{ 'type': 'retain', 'length': 29 }
		],
		'prepareInsertion inserts a paragraph between two structural elements'
	);
	
	// Test 3
	deepEqual(
		documentModel.prepareInsertion( 5, ['d', 'e', 'f'] ).getOperations(),
		[
			{ 'type': 'retain', 'length': 5 },
			{
				'type': 'insert',
				'data': [{ 'type': 'paragraph' }, 'd', 'e', 'f', { 'type': '/paragraph' }]
			},
			{ 'type': 'retain', 'length': 29 }
		],
		'prepareInsertion wraps unstructured content inserted between elements in a paragraph'
	);
	
	// Test 4
	deepEqual(
		documentModel.prepareInsertion(
			5, [{ 'type': 'paragraph' }, 'd', 'e', 'f']
		).getOperations(),
		[
			{ 'type': 'retain', 'length': 5 },
			{
				'type': 'insert',
				'data': [{ 'type': 'paragraph' }, 'd', 'e', 'f', { 'type': '/paragraph' }]
			},
			{ 'type': 'retain', 'length': 29 }
		],
		'prepareInsertion completes opening elements in inserted content'
	);
	
	// Test 5
	deepEqual(
		documentModel.prepareInsertion(
			2, [ { 'type': 'table' }, { 'type': '/table' } ]
		).getOperations(),
		[
			{ 'type': 'retain', 'length': 2 },
			{
				'type': 'insert',
				'data': [
					{ 'type': '/paragraph' },
					{ 'type': 'table' },
					{ 'type': '/table' },
					{ 'type': 'paragraph' }
				]
			},
			{ 'type': 'retain', 'length': 32 }
		],
		'prepareInsertion splits up paragraph when inserting a table in the middle'
	);
	
	// Test 6
	deepEqual(
		documentModel.prepareInsertion(
			2, [ 'f', 'o', 'o', { 'type': '/paragraph' }, { 'type': 'paragraph' }, 'b', 'a', 'r' ]
		).getOperations(),
		[
			{ 'type': 'retain', 'length': 2 },
			{
				'type': 'insert',
				'data': [
					'f',
					'o',
					'o',
					{ 'type': '/paragraph' },
					{ 'type': 'paragraph' },
					'b',
					'a',
					'r'
				]
			},
			{ 'type': 'retain', 'length': 32 }
		],
		'prepareInsertion splits paragraph when inserting a paragraph closing and opening inside it'
	);
	
	// Test 7
	deepEqual(
		documentModel.prepareInsertion(
			0, [ { 'type': 'paragraph' }, 'f', 'o', 'o', { 'type': '/paragraph' } ]
		).getOperations(),
		[
			{
				'type': 'insert',
				'data': [ { 'type': 'paragraph' }, 'f', 'o', 'o', { 'type': '/paragraph' } ]
			},
			{ 'type': 'retain', 'length': 34 }
		],
		'prepareInsertion inserts at the beginning, then retains up to the end'
	);
	
	// Test 8
	deepEqual(
		documentModel.prepareInsertion(
			34, [ { 'type': 'paragraph' }, 'f', 'o', 'o', { 'type': '/paragraph' } ]
		).getOperations(),
		[
			{ 'type': 'retain', 'length': 34 },
			{
				'type': 'insert',
				'data': [ { 'type': 'paragraph' }, 'f', 'o', 'o', { 'type': '/paragraph' } ]
			}
		],
		'prepareInsertion inserts at the end'
	);
	
	// Test 9
	raises(
		function() {
			documentModel.prepareInsertion(
				-1,
				[ { 'type': 'paragraph' }, 'f', 'o', 'o', { 'type': '/paragraph' } ]
			);
		},
		/^Offset -1 out of bounds/,
		'prepareInsertion throws exception for negative offset'
	);
	
	// Test 10
	raises(
		function() {
			documentModel.prepareInsertion(
				35,
				[ { 'type': 'paragraph' }, 'f', 'o', 'o', { 'type': '/paragraph' } ]
			);
		},
		/^Offset 35 out of bounds/,
		'prepareInsertion throws exception for offset past the end'
	);
	
	// Test 11
	raises(
		function() {
			documentModel.prepareInsertion(
				5,
				[{ 'type': 'paragraph' }, 'a', { 'type': 'listItem' }, { 'type': '/paragraph' }]
			);
		},
		/^Input is malformed: expected \/listItem but got \/paragraph at index 3$/,
		'prepareInsertion throws exception for malformed input'
	);
} );
