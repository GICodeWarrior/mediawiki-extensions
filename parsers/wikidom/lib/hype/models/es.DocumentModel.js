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
 * Creates a document model from a plain object.
 * 
 * @static
 * @method
 * @param {Object} obj Object to create new document model from
 * @returns {es.DocumentModel} Document model created from obj
 */
es.DocumentModel.newFromPlainObject = function( obj ) {
	return new es.DocumentModel( es.DocumentModel.flattenPlainObjectNode( obj ) );
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
 * @param {Boolean} [deep=false] Whether to scan recursively
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
			var length = this.offsetOf( node, deep, node );
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
 * @param {Boolean} [deep=false] Whether to scan recursively
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
 * @param {Boolean} [deep=false] Whether to scan recursively
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
es.DocumentModel.prototype.prepareInsertion = function( offset, data ) {
	//
};

/**
 * 
 * @method
 * @param {es.Range} range
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareRemoval = function( range ) {
	//
};

/**
 * 
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareContentAnnotation = function( range, method, annotation ) {
	//
};

/**
 * 
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareElementAttributeChange = function( index, method, annotation ) {
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
