module( 'Models' );

/*
 * Sample plain object (WikiDom).
 * 
 * There are two kinds of nodes in WikiDom:
 * 
 *     {Object} ElementNode
 *         type: {String} Symbolic node type name
 *         [attributes]: {Object} List of symbolic attribute name and literal value pairs
 *         [content]: {Object} Content node (not defined if node has children)
 *         [children]: {Object[]} Child nodes (not defined if node has content)
 * 
 *     {Object} ContentNode
 *         text: {String} Plain text data of content
 *         [annotations]: {Object[]} List of annotation objects that can be used to render text
 *             type: {String} Symbolic name of annotation type
 *             start: {Integer} Offset within text to begin annotation
 *             end: {Integer} Offset within text to end annotation
 *             [data]: {Object} Additional information, only used by more complex annotations
 */
var obj = {
	'type': 'document',
	'children': [
		{
			'type': 'paragraph',
			'content': {
				'text': 'abc',
				'annotations': [
					{
						'type': 'bold',
						'start': 1,
						'end': 2
					},
					{
						'type': 'italic',
						'start': 2,
						'end': 3
					}
				]
			}
		},
		{
			'type': 'table',
			'children': [
				{
					'type': 'tableRow',
					'children': [
						{
							'type': 'tableCell',
							'children': [
								{
									'type': 'paragraph',
									'content': {
										'text': 'd'
									}
								},
								{
									'type': 'list',
									'children': [
										{
											'type': 'listItem',
											'attributes': {
												'styles': ['bullet']
											},
											'content': {
												'text': 'e'
											}
										},
										{
											'type': 'listItem',
											'attributes': {
												'styles': ['bullet', 'bullet']
											},
											'content': {
												'text': 'f'
											}
										},
										{
											'type': 'listItem',
											'attributes': {
												'styles': ['number']
											},
											'content': {
												'text': 'g'
											}
										}
									]
								}
							]
						}
					]
				}
			]
		},
		{
			'type': 'paragraph',
			'content': {
				'text': 'h'
			}
		}
	]
};

/*
 * Sample content data.
 * 
 * There are three types of components in content data:
 * 
 *     {String} Plain text character
 *     
 *     {Array} Annotated character
 *         {String} Character
 *         {String} Hash
 *         {Object}... List of annotation object references
 *     
 *     {Object} Opening or closing structural element
 *         type: {String} Symbolic node type name, if closing element first character will be "/"
 *         node: {Object} Reference to model tree node
 *         [attributes]: {Object} List of symbolic attribute name and literal value pairs
 */
var data = [
	//  0 - Beginning of paragraph
	{ 'type': 'paragraph' },
	//  1 - Plain content
	'a',
	//  2 - Annotated content
	['b', { 'type': 'bold', 'hash': '#bold' }],
	//  3 - Annotated content
	['c', { 'type': 'italic', 'hash': '#italic' }],
	//  4 - End of paragraph
	{ 'type': '/paragraph' },
	//  5 - Beginning of table
	{ 'type': 'table' },
	//  6 - Beginning of row
	{ 'type': 'tableRow' },
	//  7 - Beginning of cell
	{ 'type': 'tableCell' },
	//  8 - Beginning of paragraph
	{ 'type': 'paragraph' },
	//  9 - Plain content
	'd',
	// 10 - End of paragraph
	{ 'type': '/paragraph' },
	// 11 - Beginning of list
	{ 'type': 'list' },
	// 12 - Beginning of bullet list item
	{ 'type': 'listItem', 'attributes': { 'styles': ['bullet'] } },
	// 13 - Plain content
	'e',
	// 14 - End of item
	{ 'type': '/listItem' },
	// 15 - Beginning of nested bullet list item
	{ 'type': 'listItem', 'attributes': { 'styles': ['bullet', 'bullet'] } },
	// 16 - Plain content
	'f',
	// 17 - End of item
	{ 'type': '/listItem' },
	// 18 - Beginning of numbered list item
	{ 'type': 'listItem', 'attributes': { 'styles': ['number'] } },
	// 19 - Plain content
	'g',
	// 20 - End of item
	{ 'type': '/listItem' },
	// 21 - End of list
	{ 'type': '/list' },
	// 22 - End of cell
	{ 'type': '/tableCell' },
	// 23 - End of row
	{ 'type': '/tableRow' },
	// 24 - End of table
	{ 'type': '/table' },
	// 25 - Beginning of paragraph
	{ 'type': 'paragraph' },
	// 26 - Plain content
	'h',
	// 27 - End of paragraph
	{ 'type': '/paragraph' }
];

/**
 * Sample content data index.
 * 
 * This is a node tree that describes each partition within the document's content data. This is
 * what is automatically built by the es.DocumentModel constructor.
 */
var tree = [
	new es.ParagraphModel( data[0], 3 ),
	new es.TableModel( data[5], [
		new es.TableRowModel( data[6], [
			new es.TableCellModel( data[7], [
				new es.ParagraphModel( data[8], 1 ),
				new es.ListModel( data[11], [
					new es.ListItemModel( data[12], 1 ),
					new es.ListItemModel( data[15], 1 ),
					new es.ListItemModel( data[18], 1 )
				] )
			] )
		] )
	] ),
	new es.ParagraphModel( data[25], 1 )
];

test( 'es.DocumentModel.getData', 1, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( obj );
	
	// Test 1
	deepEqual( documentModel.getData(), data, 'Flattening plain objects results in correct data' );
} );

test( 'es.DocumentModel.slice', 1, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( obj );
	
	// Test 1
	deepEqual( documentModel.slice( 0 ), tree, 'Nodes in the model tree contain correct lengths' );
} );

test( 'es.DocumentModel.getContent', 6, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( obj );

	// Test 1
	deepEqual(
		documentModel[0].getContent( new es.Range( 1, 3 ) ),
		[
			['b', { 'type': 'bold', 'hash': '#bold' }],
			['c', { 'type': 'italic', 'hash': '#italic' }]
		],
		'getContent can return an ending portion of the content'
	);

	// Test 2
	deepEqual(
		documentModel[0].getContent( new es.Range( 0, 2 ) ),
		['a', ['b', { 'type': 'bold', 'hash': '#bold' }]],
		'getContent can return a beginning portion of the content'
	);
	
	// Test 3
	deepEqual(
		documentModel[0].getContent( new es.Range( 1, 2 ) ),
		[['b', { 'type': 'bold', 'hash': '#bold' }]],
		'getContent can return a middle portion of the content'
	);
	
	// Test 4
	try {
		documentModel[0].getContent( new es.Range( -1, 3 ) );
	} catch ( negativeIndexError ) {
		ok( true, 'getContent throws exceptions when given a range with start < 0' );
	}
	
	// Test 5
	try {
		documentModel[0].getContent( new es.Range( 0, 4 ) );
	} catch ( outOfRangeError ) {
		ok( true, 'getContent throws exceptions when given a range with end > length' );
	}
	
	// Test 6
	deepEqual( documentModel[2].getContent(), ['h'], 'Content can be extracted from nodes' );
} );

test( 'es.DocumentModel.getIndexOfAnnotation', 3, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( obj );
	
	var bold = { 'type': 'bold', 'hash': '#bold' },
		italic = { 'type': 'italic', 'hash': '#italic' },
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

test( 'es.DocumentModel.prepareElementAttributeChange', 4, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( obj );

	// Test 1
	deepEqual(
		documentModel.prepareElementAttributeChange( 0, 'set', 'test', 1234 ),
		[
			{ 'type': 'attribute', 'method': 'set', 'key': 'test', 'value': 1234  },
			{ 'type': 'retain', 'length': 28 }
		],
		'prepareElementAttributeChange retains data after attribute change for first element'
	);
	
	// Test 2
	deepEqual(
		documentModel.prepareElementAttributeChange( 5, 'set', 'test', 1234 ),
		[
			{ 'type': 'retain', 'length': 5 },
			{ 'type': 'attribute', 'method': 'set', 'key': 'test', 'value': 1234 },
			{ 'type': 'retain', 'length': 23 }
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
	var documentModel = es.DocumentModel.newFromPlainObject( obj );

	// Test 1
	deepEqual(
		documentModel.prepareContentAnnotation( new es.Range( 1, 4 ), 'set', { 'type': 'bold' } ),
		[
			{ 'type': 'retain', 'length': 1 },
			{
				'type': 'annotate',
				'method': 'set',
				'bias': 'start',
				'annotation': { 'type': 'bold', 'hash': '#bold' }
			},
			{ 'type': 'retain', 'length': 1 },
			{
				'type': 'annotate',
				'method': 'set',
				'bias': 'stop',
				'annotation': { 'type': 'bold', 'hash': '#bold' }
			},
			{ 'type': 'retain', 'length': 1 },
			{
				'type': 'annotate',
				'method': 'set',
				'bias': 'start',
				'annotation': { 'type': 'bold', 'hash': '#bold' }
			},
			{ 'type': 'retain', 'length': 1 },
			{
				'type': 'annotate',
				'method': 'set',
				'bias': 'stop',
				'annotation': { 'type': 'bold', 'hash': '#bold' }
			},
			{ 'type': 'retain', 'length': 24 }
		],
		'prepareContentAnnotation skips over content that is already set or cleared'
	);
} );

test( 'es.DocumentModel.prepareRemoval', 3, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( obj );

	// Test 1
	deepEqual(
		documentModel.prepareRemoval( new es.Range( 1, 4 ) ),
		[
			{ 'type': 'retain', 'length': 1 },
			{
				'type': 'remove',
				'data': [
					'a',
					['b', { 'type': 'bold', 'hash': '#bold' }],
					['c', { 'type': 'italic', 'hash': '#italic' }]
				]
			},
			{ 'type': 'retain', 'length': 24 }
		],
		'prepareRemoval includes the content being removed'
	);
	
	// Test 2
	deepEqual(
		documentModel.prepareRemoval( new es.Range( 15, 18 ) ),
		[
			{ 'type': 'retain', 'length': 15 },
			{
				'type': 'remove',
				'data': [
					{ 'type': 'listItem', 'attributes': { 'styles': ['bullet', 'bullet'] } },
					'b',
					{ 'type': '/listItem' }
				]
			},
			{ 'type': 'retain', 'length': 10 }
		],
		'prepareRemoval removes entire elements'
	);
	
	// Test 3
	deepEqual(
		documentModel.prepareRemoval( new es.Range( 17, 19 ) ),
		[
			{ 'type': 'retain', 'length': 17 },
			{
				'type': 'remove',
				'data': [
					{ 'type': '/listItem' },
					{ 'type': 'listItem', 'attributes': { 'styles': ['number'] } }
				]
			},
			{ 'type': 'retain', 'length': 9 }
		],
		'prepareRemoval merges two list items'
	); 
} );

test( 'es.DocumentModel.prepareInsertion', 6, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( obj );

	// Test 1
	deepEqual(
		documentModel.prepareInsertion( 1, ['d', 'e', 'f'] ),
		[
			{ 'type': 'retain', 'length': 1 },
			{ 'type': 'insert', 'data': ['d', 'e', 'f'] },
			{ 'type': 'retain', 'length': 27 }
		],
		'prepareInsertion retains data up to the offset and includes the content being inserted'
	);
	
	// Test 2
	deepEqual(
		documentModel.prepareInsertion(
			5,
			[{ 'type': 'paragraph' }, 'd', 'e', 'f', { 'type': '/paragraph' }]
		),
		[
			{ 'type': 'retain', 'length': 5 },
			{
				'type': 'insert',
				'data': [{ 'type': 'paragraph' }, 'd', 'e', 'f', { 'type': '/paragraph' }]
			},
			{ 'type': 'retain', 'length': 23 }
		],
		'prepareInsertion inserts a paragraph between two structural elements'
	);
	
	// Test 3
	deepEqual(
		documentModel.prepareInsertion(
			5,
			['d', 'e', 'f']
		),
		[
			{ 'type': 'retain', 'length': 5 },
			{
				'type': 'insert',
				'data': [{ 'type': 'paragraph' }, 'd', 'e', 'f', { 'type': '/paragraph' }]
			},
			{ 'type': 'retain', 'length': 23 }
		],
		'prepareInsertion wraps unstructured content inserted between elements in a paragraph'
	);
	
	// Test 4
	deepEqual(
		documentModel.prepareInsertion(
			5,
			[{ 'type': 'paragraph' }, 'd', 'e', 'f']
		),
		[
			{ 'type': 'retain', 'length': 5 },
			{
				'type': 'insert',
				'data': [{ 'type': 'paragraph' }, 'd', 'e', 'f', { 'type': '/paragraph' }]
			},
			{ 'type': 'retain', 'length': 23 }
		],
		'prepareInsertion completes opening elements in inserted content'
	);
	
	// Test 5
	deepEqual(
		documentModel.prepareInsertion(
			2,
			[ { 'type': 'table' }, { 'type': '/table' } ]
		),
		[
			{ 'type': 'retain', 'length': 2 },
			{
				'type': 'insert',
				'data': [ { 'type': '/paragraph' }, { 'type': 'table' }, { 'type': '/table' }, { 'type': 'paragraph' } ]
			},
			{ 'type': 'retain', 'length': 26 }
		],
		'prepareInsertion splits up paragraph when inserting a table in the middle'
	);
	
	// Test 6
	deepEqual(
		documentModel.prepareInsertion(
			2,
			[ 'f', 'o', 'o', { 'type': '/paragraph' }, { 'type': 'paragraph' }, 'b', 'a', 'r' ]
		),
		[
			{ 'type': 'retain', 'length': 2 },
			{
				'type': 'insert',
				'data': [ 'f', 'o', 'o', { 'type': '/paragraph' }, { 'type': 'paragraph' }, 'b', 'a', 'r' ]
			},
			{ 'type': 'retain', 'length': 26 }
		],
		'prepareInsertion splits up paragraph when inserting a paragraph closing and opening into a paragraph'
	);
} );

test( 'es.DocumentModel.commit, es.DocumentModel.rollback', 10, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( obj );

	var elementAttributeChange = documentModel.prepareElementAttributeChange(
		0, 'set', 'test', 1
	);

	// Test 1
	documentModel.commit( elementAttributeChange );
	deepEqual(
		documentModel.getData( new es.Range( 0, 5 ) ),
		[
			{ 'type': 'paragraph', 'attributes': { 'test': 1 } },
			'a',
			['b', { 'type': 'bold', 'hash': '#bold' }],
			['c', { 'type': 'italic', 'hash': '#italic' }],
			{ 'type': '/paragraph' }
		],
		'commit applies an element attribute change transaction to the content'
	);

	// Test 2
	documentModel.rollback( elementAttributeChange );
	deepEqual(
		documentModel.getData( new es.Range( 0, 5 ) ),
		[
			{ 'type': 'paragraph' },
			'a',
			['b', { 'type': 'bold', 'hash': '#bold' }],
			['c', { 'type': 'italic', 'hash': '#italic' }],
			{ 'type': '/paragraph' }
		],
		'rollback reverses the effect of an element attribute change transaction on the content'
	);

	var contentAnnotation = documentModel.prepareContentAnnotation(
		new es.Range( 1, 4 ), 'set', { 'type': 'bold' }
	);

	// Test 3
	documentModel.commit( contentAnnotation );
	deepEqual(
		documentModel.getData( new es.Range( 0, 5 ) ),
		[
			{ 'type': 'paragraph' },
			['a', { 'type': 'bold', 'hash': '#bold' }],
			['b', { 'type': 'bold', 'hash': '#bold' }],
			['c', { 'type': 'italic', 'hash': '#italic' }, { 'type': 'bold', 'hash': '#bold' }],
			{ 'type': '/paragraph' }
		],
		'commit applies a content annotation transaction to the content'
	);

	// Test 4
	documentModel.rollback( contentAnnotation );
	deepEqual(
		documentModel.getData( new es.Range( 0, 5 ) ),
		[
			{ 'type': 'paragraph' },
			'a',
			['b', { 'type': 'bold', 'hash': '#bold' }],
			['c', { 'type': 'italic', 'hash': '#italic' }],
			{ 'type': '/paragraph' }
		],
		'rollback reverses the effect of a content annotation transaction on the content'
	);

	var insertion = documentModel.prepareInsertion( 4, ['d'] );

	// Test 5
	documentModel.commit( insertion );
	deepEqual(
		documentModel.getData( new es.Range( 0, 6 ) ),
		[
			{ 'type': 'paragraph' },
			'a',
			['b', { 'type': 'bold', 'hash': '#bold' }],
			['c', { 'type': 'italic', 'hash': '#italic' }],
			'd',
			{ 'type': '/paragraph' }
		],
		'commit applies an insertion transaction to the content'
	);

	// Test 6
	deepEqual(
		documentModel[0].getContent(),
		[
			'a',
			['b', { 'type': 'bold', 'hash': '#bold' }],
			['c', { 'type': 'italic', 'hash': '#italic' }],
			'd'
		],
		'commit keeps model tree up to date'
	);

	// Test 7
	documentModel.rollback( insertion );
	deepEqual(
		documentModel.getData( new es.Range( 0, 5 ) ),
		[
			{ 'type': 'paragraph' },
			'a',
			['b', { 'type': 'bold', 'hash': '#bold' }],
			['c', { 'type': 'italic', 'hash': '#italic' }],
			{ 'type': '/paragraph' }
		],
		'rollback reverses the effect of an insertion transaction on the content'
	);

	// Test 8
	deepEqual(
		documentModel[0].getContent(),
		[
			'a',
			['b', { 'type': 'bold', 'hash': '#bold' }],
			['c', { 'type': 'italic', 'hash': '#italic' }]
		],
		'rollback keeps model tree up to date'
	);

	var removal = documentModel.prepareRemoval( new es.Range( 2, 4 ) );

	// Test 9
	documentModel.commit( removal );
	deepEqual(
		documentModel.getData( new es.Range( 0, 3 ) ),
		[
			{ 'type': 'paragraph' },
			'a',
			{ 'type': '/paragraph' }
		],
		'commit applies a removal transaction to the content'
	);

	// Test 10
	documentModel.rollback( removal );
	deepEqual(
		documentModel.getData( new es.Range( 0, 5 ) ),
		[
			{ 'type': 'paragraph' },
			'a',
			['b', { 'type': 'bold', 'hash': '#bold' }],
			['c', { 'type': 'italic', 'hash': '#italic' }],
			{ 'type': '/paragraph' }
		],
		'rollback reverses the effect of a removal transaction on the content'
	);

} );
