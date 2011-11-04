esTest = {};

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
esTest.obj = {
	'type': 'document',
	'children': [
		{
			'type': 'paragraph',
			'content': {
				'text': 'abc',
				'annotations': [
					{
						'type': 'textStyle/bold',
						'range': {
							'start': 1,
							'end': 2
						}
					},
					{
						'type': 'textStyle/italic',
						'range': {
							'start': 2,
							'end': 3
						}
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
esTest.data = [
	//  0 - Beginning of paragraph
	{ 'type': 'paragraph' },
	//  1 - Plain content
	'a',
	//  2 - Annotated content
	['b', { 'type': 'textStyle/bold', 'hash': '#textStyle/bold' }],
	//  3 - Annotated content
	['c', { 'type': 'textStyle/italic', 'hash': '#textStyle/italic' }],
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
esTest.tree = [
	new es.ParagraphModel( esTest.data[0], 3 ),
	new es.TableModel( esTest.data[5], [
		new es.TableRowModel( esTest.data[6], [
			new es.TableCellModel( esTest.data[7], [
				new es.ParagraphModel( esTest.data[8], 1 ),
				new es.ListModel( esTest.data[11], [
					new es.ListItemModel( esTest.data[12], 1 ),
					new es.ListItemModel( esTest.data[15], 1 ),
					new es.ListItemModel( esTest.data[18], 1 )
				] )
			] )
		] )
	] ),
	new es.ParagraphModel( esTest.data[25], 1 )
];
