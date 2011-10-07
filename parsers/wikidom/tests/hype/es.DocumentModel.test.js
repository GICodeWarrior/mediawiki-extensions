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
					    				'text': 'a'
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
							    				'text': 'a'
							    			}
						    			},
						    			{
						    				'type': 'listItem',
							    			'attributes': {
							    				'styles': ['bullet', 'bullet']
							    			},
							    			'content': {
							    				'text': 'b'
							    			}
						    			},
						    			{
						    				'type': 'listItem',
							    			'attributes': {
							    				'styles': ['number']
							    			},
							    			'content': {
							    				'text': 'c'
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
				'text': 'a'
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
	'a',
 	// 10 - End of paragraph
	{ 'type': '/paragraph' },
 	// 11 - Beginning of list
	{ 'type': 'list' },
 	// 12 - Beginning of bullet list item
	{ 'type': 'listItem', 'attributes': { 'styles': ['bullet'] } },
	// 13 - Plain content
	'a',
 	// 14 - End of item
	{ 'type': '/listItem' },
 	// 15 - Beginning of nested bullet list item
	{ 'type': 'listItem', 'attributes': { 'styles': ['bullet', 'bullet'] } },
	// 16 - Plain content
	'b',
 	// 17 - End of item
	{ 'type': '/listItem' },
 	// 18 - Beginning of numbered list item
	{ 'type': 'listItem', 'attributes': { 'styles': ['number'] } },
	// 19 - Plain content
	'c',
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
	'a',
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

test( 'es.DocumentModel', 16, function() {
	var documentModel = es.DocumentModel.newFromPlainObject( obj );
	
	deepEqual( documentModel.getData(), data, 'Flattening plain objects results in correct data' );
	
	deepEqual( documentModel.slice( 0 ), tree, 'Nodes in the model tree contain correct lengths' );
	
	deepEqual(
		documentModel[0].getContent( new es.Range( 1, 3 ) ),
		[
			['b', { 'type': 'bold', 'hash': '#bold' }],
			['c', { 'type': 'italic', 'hash': '#italic' }]
		],
		'getContent can return an ending portion of the content'
	);
	
	deepEqual(
		documentModel[0].getContent( new es.Range( 0, 2 ) ),
		['a', ['b', { 'type': 'bold', 'hash': '#bold' }]],
		'getContent can return a beginning portion of the content'
	);
	
	deepEqual(
		documentModel[0].getContent( new es.Range( 1, 2 ) ),
		[['b', { 'type': 'bold', 'hash': '#bold' }]],
		'getContent can return a middle portion of the content'
	);
	
	try {
		documentModel[0].getContent( new es.Range( -1, 3 ) );
	} catch ( err ) {
		ok( true, 'getContent throws exceptions when given a range with start < 0' );
	}
	
	try {
		documentModel[0].getContent( new es.Range( 0, 4 ) );
	} catch ( err ) {
		ok( true, 'getContent throws exceptions when given a range with end > length' );
	}
	
	deepEqual( documentModel[2].getContent(), ['a'], 'Content can be extracted from nodes' );
	
	var bold = { 'type': 'bold', 'hash': '#bold' },
		italic = { 'type': 'italic', 'hash': '#italic' },
		nothing = { 'type': 'nothing', 'hash': '#nothing' },
		character = ['a', bold, italic];
	
	equal(
		es.DocumentModel.getIndexOfAnnotation( character, bold ),
		1,
		'getIndexOfAnnotation get the correct index'
	);
	
	equal(
		es.DocumentModel.getIndexOfAnnotation( character, italic ),
		2,
		'getIndexOfAnnotation get the correct index'
	);
	
	equal(
		es.DocumentModel.getIndexOfAnnotation( character, nothing ),
		-1,
		'getIndexOfAnnotation returns -1 if the annotation was not found'
	);
	
	deepEqual(
		documentModel.prepareElementAttributeChange( 0, 'set', 'test', 1234 ),
		[
			{ 'type': 'attribute', 'method': 'set', 'key': 'test', 'value': 1234  },
			{ 'type': 'retain', 'length': 28 }
		],
		'prepareElementAttributeChange retains data after attribute change for first element'
	);
	
	deepEqual(
		documentModel.prepareElementAttributeChange( 5, 'set', 'test', 1234 ),
		[
			{ 'type': 'retain', 'length': 5 },
			{ 'type': 'attribute', 'method': 'set', 'key': 'test', 'value': 1234 },
			{ 'type': 'retain', 'length': 23 }
		],
		'prepareElementAttributeChange retains data before and after attribute change'
	);
	
	try {
		documentModel.prepareElementAttributeChange( 1, 'set', 'test', 1234 )
	} catch ( err ) {
		ok(
			true,
			'prepareElementAttributeChange throws an exception when offset is not an element'
		);
	}
	
	try {
		documentModel.prepareElementAttributeChange( 4, 'set', 'test', 1234 )
	} catch ( err ) {
		ok(
			true,
			'prepareElementAttributeChange throws an exception when offset is a closing element'
		);
	}
	
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

