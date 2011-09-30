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
	// Inheritance
	es.DocumentModelNode.call( this, length );
	
	this.data = $.isArray( data ) ? data : [];
};

/* Static Methods */

/**
 * Checks if a data at a given offset is content.
 * 
 * @static
 * @method
 * @param {Integer} offset Offset in data to check
 * @returns {Boolean} If data at offset is content
 */
es.DocumentModel.isContent = function( offset ) {
	return typeof this.data[offset] === 'string' || $.isArray( this.data[offset] );
};

/**
 * Checks if a data at a given offset is an element.
 * 
 * @static
 * @method
 * @param {Integer} offset Offset in data to check
 * @returns {Boolean} If data at offset is an element
 */
es.DocumentModel.isElement = function( offset ) {
	// TODO: Is there a safer way to check if it's a plain object without sacrificing speed?
	return this.data[offset].type !== undefined;
};

/**
 * Flatten a plain node object into a data array, recursively.
 * 
 * TODO: where do we document this whole structure - aka "WikiDom"?
 * 
 * @static
 * @method
 * @param {Object} obj Plain node object to flatten
 * @returns {Array} Flattened version of obj
 */
es.DocumentModel.flattenPlainObjectNode = function( obj ) {
	var i, data = [];
	// Open element
	data.push( { 'type': obj.type, 'attributes': es.copyObject( obj.attributes ), 'node': null } );
	if ( obj.content !== undefined ) {
		// Add content
		data = data.concat( es.ContentModel.newFromPlainObject( obj.content ).data );
	} else {
		// Add children - only do this if there is no content property
		for ( i = 0; i < obj.children.length; i++ ) {
			// TODO: Figure out if all this concatenating is inefficient. I think it is
			data = data.concat( flattenNode( obj.children[i] ) );
		}
	}
	// Close element - TODO: Do we need attributes here or not?
	data.push( { 'type': '/' + obj.type, 'node': null } );
	return data;
};

/* Methods */

/**
 * Gets the length of all document content.
 * 
 * @method
 * @returns {Integer} Length of document content
 */
es.DocumentModel.getContentLength = function() {
	return this.data.length;
};

/**
 * Gets copy of the document data.
 * 
 * @method
 * @param {es.Range} [range] Range of data to get, all data will be given by default
 * @param {Boolean} [deep=false] Whether to return a deep copy (WARNING! This may be very slow)
 * @returns {Array} Copy of document data
 */
es.DocumentModel.prototype.getData = function( range, deep ) {
	var start = 0,
		end = undefined;
	if ( range !== undefined ) {
		range.normalize();
		start = Math.max( 0, Math.min( this.data.length, range.start ) );
		end = Math.max( 0, Math.min( this.data.length, range.end ) );
	}
	var data = this.data.slice( start, end );
	return deep ? es.copyArray( data ) : data;
};

/**
 * Gets the content offset of a node.
 * 
 * @method
 * @param {es.DocumentModelNode} node Node to get offset of
 * @param {Boolean} deep Whether to scan recursively
 * @param {es.DocumentModelNode} [from=this] Node to look within
 * @returns {Integer|false} Offset of node or null of node was not found
 */
es.DocumentModel.prototype.offsetOf = function( node, deep, from ) {
	if ( from === undefined ) {
		from = this;
	}
	var offset = 0;
	for ( var i = 0; i < this.length; i++ ) {
		if ( node === this[i] ) {
			return offset;
		}
		if ( deep && node.length ) {
			var length = this.findElement( node, deep, node );
			if ( length !== null ) {
				return offset + length;
			}
		}
		offset += node.getContentLength() + 2;
	}
	return false;
};

/**
 * Gets the element object of a node.
 * 
 * @method
 * @param {es.DocumentModelNode} node Node to get element object for
 * @param {Boolean} deep Whether to scan recursively
 * @returns {Object|null} Element object
 */
es.DocumentModel.prototype.getElement = function( node, deep ) {
	var offset = this.offsetOf( node, deep );
	if ( offset !== false ) {
		return this.data[offset];
	}
	return null;
};

/**
 * Gets the content data of a node.
 * 
 * @method
 * @param {es.DocumentModelNode} node Node to get content data for
 * @param {Boolean} deep Whether to scan recursively
 * @returns {Array|null} List of content and elements inside node or null if node is not found
 */
es.DocumentModel.prototype.getContent = function( node, deep ) {
	var offset = this.offsetOf( node, deep );
	if ( offset !== false ) {
		return this.data.slice( offset + 1, offset + node.getContentLength() );
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

/* Inheritance */

es.extend( es.DocumentModel, es.DocumentModelNode );

/*
 * SCRATCH CODE
 * 
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

es.DocumentModel.newFromPlainObject = function( obj ) {
	return new es.DocumentModel( es.DocumentModel.flattenPlainObjectNode( obj ) );
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
