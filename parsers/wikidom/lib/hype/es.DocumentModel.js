/**
 * @class
 * @constructor
 */
es.DocumentModel = function() {
	this.data = [];
};

/*
// High-level operations

es.DocumentModel.prototype.prepareInsertContent = function( offset, content ) {
	// retain ^ .. offset
	// insert content
	// retain offset .. $
};
es.DocumentModel.prototype.prepareRemoveContent = function( range ) {
	// retain ^ .. range.start
	// retain range.end .. $
};
es.DocumentModel.prototype.prepareAnnotateContent = function( range, annotations ) {
	// retain ^ .. range.start
	// start annotations
	// retain range.start .. range.end
	// end annotations
	// retain range.end .. $
};
es.DocumentModel.prototype.prepareInsertBlock = function( offset, type, attributes, content ) {
	// retain ^ .. offset
	// insert elementStart (type, attributes)
	// insert content
	// insert elementEnd (type, attributes)
	// retain offset .. $
};
es.DocumentModel.prototype.prepareRemoveBlock = function( offset ) {
	// retain ^ .. offset
	// retain findMatchingElementEnd( offset ) .. $
};
*/

// Low-level operations

es.DocumentModel.newFromPlainObject = function( obj ) {
	
};

es.DocumentModel.prototype.toPlainObject = function() {
	
};

es.DocumentModel.prototype.insertContent = function( offset, content ) {
	this.data = this.data.slice( 0, offset ).concat( content ).concat( this.data.slice( offset ) );
};

es.DocumentModel.prototype.removeContent = function( range ) {
	this.data.splice( range.start, range.end - range.start );
};

es.DocumentModel.prototype.annotateContent = function( range, annotations ) {
	for ( var i = 0; i < annotations.length; i++ ) {
		var annotation = annotations[i];
		if ( annotation.action = 'add' ) {
			// this.data[i][?]
		} else if ( annotation.action = 'remove' ) {
			// this.data[i][?]
		}
	}
};

es.DocumentModel.prototype.insertElement = function( offset, element ) {
	this.data.splice( offset, 0, element );
};

es.DocumentModel.prototype.removeElement = function( offset ) {
	this.data.splice( offset, 1 );
};

es.DocumentModel.prototype.annotateElement = function( offset, annotations ) {
	for ( var i = 0; i < annotations.length; i++ ) {
		var annotation = annotations[i];
		if ( annotation.action = 'add' ) {
			// this.data[i].annotations[?]
		} else if ( annotation.action = 'remove' ) {
			// this.data[i].annotations[?]
		}
	}
};

/*
 * Example of content data
 * 
 * Content data is an array made up of 3 kinds of values:
 * 		String: Plain text character
 * 		Array: Annotated character
 * 		Object: Opening or closing structural element
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
	{ 'type': '/paragraph' }
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
	{ 'type': 'item', 'styles': ['bullet'] },
	// 13 - Plain content
	'a',
 	// 14 - End of item
	{ 'type': '/item' },
 	// 15 - Beginning of nested bullet list item
	{ 'type': 'item', 'styles': ['bullet', 'bullet'] },
	// 16 - Plain content
	'b',
 	// 17 - End of item
	{ 'type': '/item' },
 	// 18 - Beginning of numbered list item
	{ 'type': 'item', 'styles': ['number'] },
	// 19 - Plain content
	'c',
 	// 20 - End of item
	{ 'type': '/item' },
 	// 21 - End of list
	{ 'type': '/list' },
	// 22 - End of cell
	{ 'type': '/cell' }
	// 23 - End of row
	{ 'type': '/row' }
	// 24 - End of table
	{ 'type': '/table' }
 	// 25 - Beginning of paragraph
	{ 'type': 'paragraph' },
	// 26 - Plain content
	'a'
 	// 27 - End of paragraph
	{ 'type': '/paragraph' },
];

/*
 * Example of content tree
 * 
 * Content trees are kept in sync with content data, providing a mapping between a structured user
 * interface and a flat content model. They are made up of nodes which have some common properties:
 * 		type: Symbolic name of a block or sub-block component
 * 		length: Number of elements in content data between the element start and end
 * 		items: Information about the content between the element start and end
 */
var tree = [
	{
		'type': 'paragraph',
		'length': 5,
		//'content': ['a', ['b', { 'type': 'bold' }], ['c', { 'type': 'italic' }]],
	},
	{
		'type': 'table',
		'length': 19,
		'items': [
			{
				'type': 'row',
				'length': 17,
				'items': [
					{
						'type': 'cell',
						'length': 15,
						'items': {
							{
								'type': 'paragraph',
								'length': 3
								//'content': ['a']
							},
							{
								'type': 'list',
								'length': 12,
								'items': [
									{
										'type': 'item',
										'styles': ['bullet'],
										'length': 3,
										//'content': ['a']
									},
									{
										'type': 'item',
										'styles': ['bullet', 'bullet'],
										'length': 3,
										//'content': ['b']
									},
									{
										'type': 'item',
										'styles': ['number'],
										'length': 3,
										//'content': ['c']
									}
								]
							}
						}
					}
				]
			}
		]
	},
	{
		'type': 'paragraph',
		'length': 3,
		//'content': ['a']
	}
];
