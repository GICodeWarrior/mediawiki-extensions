/**
 * Creates an es.DocumentModel object.
 * 
 * es.DocumentModel objects extend the native Array object, so it's contents are directly accessible
 * through the typical methods.
 * 
 * @class
 * @constructor
 * @param {Array} data Model data to initialize with, such as data from es.DocumentModel.getData()
 */
es.DocumentModel = function( data ) {
	var data = $.isArray( data ) ? data : [];
	return $.extend( data, this );
};

/* Static Methods */

es.DocumentModel.isContent = function( content ) {
	return typeof content === 'string' || $.isArray( content );
};

es.DocumentModel.isElement = function( content ) {
	return content.type !== undefined;
};

/* Methods */

es.DocumentModel.prototype.findElement = function( node, root ) {
	for ( var i = 0; i < this.data.length; i++ ) {
		if ( es.DocumentModel.isElement( this.data[i] ) ) {
			if ( content.node === node ) {
				return i;
			}
			// If we are looking for a root node, we can skip over the contents of this one
			if ( root ) {
				i += node.getContentLength() + 2;
			}
		}
	}
	return null;
};

/**
 * Gets the element object of a node.
 * 
 * @method
 * @param {es.DocumentModelNode} node Reference to node object to get element object for
 * @param {Boolean} root Whether to only scan root nodes
 * @returns {Object|null} Element object
 */
es.DocumentModel.prototype.getElement = function( node, root ) {
	var index = this.findNode( node, root );
	if ( index !== null ) {
		return this.data[index];
	}
	return null;
};

/**
 * Gets the content data of a node.
 * 
 * @method
 * @param {es.DocumentModelNode} node Reference to node object to get content data for
 * @param {Boolean} root Whether to only scan root nodes
 * @returns {Array|null} List of content and elements inside node or null if node is not found
 */
es.DocumentModel.prototype.getContent = function( node, root ) {
	var index = this.findNode( node, root );
	if ( index !== null ) {
		return this.data.slice( index + 1, index + node.getContentLength() );
	}
	return null;
};

/**
 * 
 * @method
 * @param {Integer} offset
 * @param {Array} data
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareInsert = function( offset, data ) {
	//
};

/**
 * 
 * @method
 * @param {es.Range} range
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareRemove = function( range ) {
	//
};

/**
 * 
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareAnnotateContent = function( range, method, annotation ) {
	//
};

/**
 * 
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareAnnotateElement = function( index, method, annotation ) {
	//
};

/**
 * 
 */
es.DocumentModel.prototype.commit = function( transaction ) {
	//
};

/**
 * 
 */
es.DocumentModel.prototype.rollback = function( transaction ) {
	//
};

/*
 * SCRATCH CODE
 * 
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
*/

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
 	{ 'type': 'paragraph', 'node': {} },
	//  1 - Plain content
	'a',
	//  2 - Annotated content
	['b', { 'type': 'bold' }],
	//  3 - Annotated content
	['c', { 'type': 'italic' }],
	//  4 - End of paragraph
	{ 'type': '/paragraph', 'node': {} }
 	//  5 - Beginning of table
	{ 'type': 'table', 'node': {} },
 	//  6 - Beginning of row
	{ 'type': 'row', 'node': {} },
 	//  7 - Beginning of cell
	{ 'type': 'cell', 'node': {} },
 	//  8 - Beginning of paragraph
	{ 'type': 'paragraph', 'node': {} },
	//  9 - Plain content
	'a',
 	// 10 - End of paragraph
	{ 'type': '/paragraph', 'node': {} },
 	// 11 - Beginning of list
	{ 'type': 'list', 'node': {} },
 	// 12 - Beginning of bullet list item
	{ 'type': 'item', 'styles': ['bullet'], 'node': {} },
	// 13 - Plain content
	'a',
 	// 14 - End of item
	{ 'type': '/item', 'node': {} },
 	// 15 - Beginning of nested bullet list item
	{ 'type': 'item', 'styles': ['bullet', 'bullet'], 'node': {} },
	// 16 - Plain content
	'b',
 	// 17 - End of item
	{ 'type': '/item', 'node': {} },
 	// 18 - Beginning of numbered list item
	{ 'type': 'item', 'styles': ['number'], 'node': {} },
	// 19 - Plain content
	'c',
 	// 20 - End of item
	{ 'type': '/item', 'node': {} },
 	// 21 - End of list
	{ 'type': '/list', 'node': {} },
	// 22 - End of cell
	{ 'type': '/cell', 'node': {} }
	// 23 - End of row
	{ 'type': '/row', 'node': {} }
	// 24 - End of table
	{ 'type': '/table', 'node': {} }
 	// 25 - Beginning of paragraph
	{ 'type': 'paragraph', 'node': {} },
	// 26 - Plain content
	'a'
 	// 27 - End of paragraph
	{ 'type': '/paragraph', 'node': {} },
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
