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
					'type': 'row',
					'children': [
						{
							'type': 'cell',
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
	['b', { 'type': 'bold' }],
	//  3 - Annotated content
	['c', { 'type': 'italic' }],
	//  4 - End of paragraph
	{ 'type': '/paragraph' },
 	//  5 - Beginning of table
	{ 'type': 'table' },
 	//  6 - Beginning of row
	{ 'type': 'row' },
 	//  7 - Beginning of cell
	{ 'type': 'cell' },
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
	{ 'type': '/cell' },
	// 23 - End of row
	{ 'type': '/row' },
	// 24 - End of table
	{ 'type': '/table' },
 	// 25 - Beginning of paragraph
	{ 'type': 'paragraph' },
	// 26 - Plain content
	'a',
 	// 27 - End of paragraph
	{ 'type': '/paragraph' }
];

test( 'es.ModelNode', function() {
	var documentModel = es.DocumentModel.newFromPlainObject( obj );
	
	deepEqual( documentModel.getData(), data, 'Flattening plain objects results in correct data' );
} );
