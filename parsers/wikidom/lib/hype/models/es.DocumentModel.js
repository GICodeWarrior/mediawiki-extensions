/**
 * Creates an es.DocumentModel object.
 * 
 * es.DocumentModel objects extend the native Array object, so it's contents are directly accessible
 * through the typical methods.
 * 
 * @class
 * @constructor
 * @param {Array} data Model data to initialize with, such as data from es.DocumentModel.getData()
 * @param {Object} attributes Document attributes
 */
es.DocumentModel = function( data, attributes ) {
	// Inheritance
	var node = $.extend( new es.DocumentModelNode( length ), this );
	
	// Properties
	node.data = $.isArray( data ) ? data : [];
	node.attributes = $.isPlainObject( attributes ) ? attributes : {};
	
	// Initialization
	node.rebuildChildNodes();
	
	return node;
};

/* Static Members */

/**
 * Mapping of symbolic names and node model constructors.
 */
es.DocumentModel.nodeModels = {};

/* Static Methods */

/**
 * Creates a document model from a plain object.
 * 
 * @static
 * @method
 * @param {Object} obj Object to create new document model from
 * @returns {es.DocumentModel} Document model created from obj
 */
es.DocumentModel.newFromPlainObject = function( obj ) {
	if ( obj.type === 'document' ) {
		var data = [],
			attributes = $.isPlainObject( obj.attributes ) ? es.copyObject( obj.attributes ) : {};
		for ( var i = 0; i < obj.children.length; i++ ) {
			data = data.concat( es.DocumentModel.flattenPlainObjectElementNode( obj.children[i] ) );
		}
		return new es.DocumentModel( data, attributes );
	}
	throw 'Invalid object error. Object is not a valid document object.';
};

/**
 * Creates an es.ContentModel object from a plain content object.
 * 
 * A plain content object contains plain text and a series of annotations to be applied to ranges of
 * the text.
 * 
 * @example
 * {
 *     'text': '1234',
 *     'annotations': [
 *         // Makes "23" bold
 *         {
 *             'type': 'bold',
 *             'range': {
 *                 'start': 1,
 *                 'end': 3
 *             }
 *         }
 *     ]
 * }
 * 
 * @static
 * @method
 * @param {Object} obj Plain content object, containing a "text" property and optionally
 * an "annotations" property, the latter of which being an array of annotation objects including
 * range information
 * @returns {Array}
 */
es.DocumentModel.flattenPlainObjectContentNode = function( obj ) {
	if ( !$.isPlainObject( obj ) ) {
		// Use empty content
		return [];
	} else {
		// Convert string to array of characters
		var data = obj.text.split('');
		// Render annotations
		if ( $.isArray( obj.annotations ) ) {
			$.each( obj.annotations, function( i, src ) {
				// Build simplified annotation object
				var dst = { 'type': src.type };
				if ( 'data' in src ) {
					dst.data = es.copyObject( src.data );
				}
				// Apply annotation to range
				if ( src.start < 0 ) {
					// TODO: The start can not be lower than 0! Throw error?
					// Clamp start value
					src.start = 0;
				}
				if ( src.end > data.length ) {
					// TODO: The end can not be higher than the length! Throw error?
					// Clamp end value
					src.end = data.length;
				}
				for ( var i = src.start; i < src.end; i++ ) {
					// Auto-convert to array
					typeof data[i] === 'string' && ( data[i] = [data[i]] );
					// Append 
					data[i].push( dst );
				}
			} );
		}
		return data;
	}
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
es.DocumentModel.flattenPlainObjectElementNode = function( obj ) {
	var i,
		data = [],
		element = { 'type': obj.type };
	if ( $.isPlainObject( obj.attributes ) ) {
		element.attributes = es.copyObject( obj.attributes );
	}
	// Open element
	data.push( element );
	if ( $.isPlainObject( obj.content ) ) {
		// Add content
		data = data.concat( es.DocumentModel.flattenPlainObjectContentNode( obj.content ) );
	} else if ( $.isArray( obj.children ) ) {
		// Add children - only do this if there is no content property
		for ( i = 0; i < obj.children.length; i++ ) {
			// TODO: Figure out if all this concatenating is inefficient. I think it is
			data = data.concat( es.DocumentModel.flattenPlainObjectElementNode( obj.children[i] ) );
		}
	}
	// Close element - TODO: Do we need attributes here or not?
	data.push( { 'type': '/' + obj.type } );
	return data;
};

/* Methods */

/**
 * Checks if a data at a given offset is content.
 * 
 * @static
 * @method
 * @param {Integer} offset Offset in data to check
 * @returns {Boolean} If data at offset is content
 */
es.DocumentModel.prototype.isContent = function( offset ) {
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
es.DocumentModel.prototype.isElement = function( offset ) {
	// TODO: Is there a safer way to check if it's a plain object without sacrificing speed?
	return this.data[offset].type !== undefined;
};

/**
 * Creates a document view for this model.
 * 
 * @method
 * @returns {es.DocumentView}
 */
es.DocumentModel.prototype.createView = function() {
	// return new es.DocumentView( this );
};

/**
 * Regenerates child nodes from content data.
 * 
 * @method
 */
es.DocumentModel.prototype.rebuildChildNodes = function() {
	// Remove child nodes
	this.splice( 0, this.length );
	// Build a tree of models, which is a space partitioning data structure
	var currentNode = this;
	for ( var i = 0, length = this.data.length; i < length; i++ ) {
		if ( this.data[i].type !== undefined ) {
			// It's an element
			var type = this.data[i].type,
				open = type[0] !== '/';
			if ( !open ) {
				type = type.substr( 1 );
			}
			if ( !( type in es.DocumentModel.nodeModels ) ) {
				throw 'Unsuported element error. No class registered for element type: ' + type;
			}
			if ( open ) {
				var newNode = new es.DocumentModel.nodeModels[this.data[i].type]();
				currentNode.push( newNode );
				currentNode = newNode;
			} else {
				currentNode = currentNode.getParent();
			}
		} else {
			// It's content
			var start = i;
			while ( this.data[i].type === undefined && i < length ) {
				i++;
			}
			currentNode.setContentLength( i - start );
		}
	}
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
 * @method
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareContentAnnotation = function( range, method, annotation ) {
	//
};

/**
 * 
 * @method
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareElementAttributeChange = function( index, method, annotation ) {
	//
};

/**
 * 
 * @method
 * @param {es.Transaction}
 */
es.DocumentModel.prototype.commit = function( transaction ) {
	//
};

/**
 * 
 * @method
 * @param {es.Transaction}
 */
es.DocumentModel.prototype.rollback = function( transaction ) {
	//
};

/* Inheritance */

es.extend( es.DocumentModel, es.DocumentModelNode );
