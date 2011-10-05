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
	
	// Build a tree of models, which is a space partitioning data structure
	var currentNode = node;
	for ( var i = 0, length = node.data.length; i < length; i++ ) {
		if ( node.data[i].type !== undefined ) {
			// It's an element, figure out it's type
			var type = node.data[i].type,
				open = type[0] !== '/';
			// Trim the "/" off the beginning of closing tag types
			if ( !open ) {
				type = type.substr( 1 );
			}
			if ( open ) {
				// Validate the element type
				if ( !( type in es.DocumentModel.nodeModels ) ) {
					throw 'Unsuported element error. No class registered for element type: ' + type;
				}
				// Create a model node for the element
				var newNode = new es.DocumentModel.nodeModels[node.data[i].type]();
				// Add the new model node as a child
				currentNode.push( newNode );
				// Descend into the new model node
				currentNode = newNode;
			} else {
				// Return to the parent node
				currentNode = currentNode.getParent();
			}
		} else {
			// It's content, let's start tracking the length
			var start = i;
			// Move forward to the next object, tracking the length as we go
			while ( node.data[i].type === undefined && i < length ) {
				i++;
			}
			// Now we know how long the current node is
			currentNode.setContentLength( i - start );
			// The while loop left us 1 element to far
			i--;
		}
	}
	
	return node;
};

/* Static Members */

/**
 * Mapping of symbolic names and node model constructors.
 */
es.DocumentModel.nodeModels = {};

/**
 * Mapping of operation types to pure functions.
 * 
 * Each function is called in the context of a state, and takes an operation object as a parameter.
 */
es.DocumentModel.operations = ( function() {
	function retain( op ) {
		annotate.call( this, this.cursor + op.length );
		this.cursor += op.length;
	};
	
	function insert( op ) {
		// Splice content into document in 1024 element chunks, as to not overflow max allowed
		// arguments, which apply is limited by
		var index = 0;
		while ( index < op.data.length ) {
			this.data.splice.apply(
				this.data, [this.cursor, 0].concat( op.data.slice( index, index + 1024 ) )
			);
			index += 1024;
		}
		annotate.call( this, this.cursor + op.data.length );
		this.cursor += op.data.length;
	};
	
	function remove( op ) {
		this.data.splice( this.cursor, op.data.length );
	};
	
	function indexOfAnnotation( character, annotation ) {
		if ( $.isArray( character ) ) {
			// Find the index of a comparable annotation (checking for same value, not reference)
			var index;
			for ( var i = 0; i < target.length; i++ ) {
				if ( es.compareObjects( target[i], op.annotation ) ) {
					return index;
				}
			}
		}
		return -1;
	}
	
	function attribute( op, invert ) {
		var element = this.data[this.cursor];
		if ( element.type === undefined ) {
			throw 'Invalid element error. Can not set attributes on non-element data.';
		}
		if ( op.method === 'set' || ( op.method === 'clear' && invert ) ) {
			// Automatically initialize attributes object
			if ( !element.attributes ) {
				element.attributes = {};
			}
			element.attributes[op.name] = op.value;
		} else if ( op.method === 'clear' || ( op.method === 'set' && invert ) ) {
			if ( element.attributes ) {
				delete element.attributes[op.name];
			}
			// Automatically clean up attributes object
			var empty = true;
			for ( key in element.attributes ) {
				empty = false;
				break;
			}
			if ( empty ) {
				delete element.attributes;
			}
		} else {
			throw 'Invalid method error. Can not operate attributes this way: ' + method;
		}
	};
	
	function annotate( to ) {
		// Handle annotations
		if ( this.set.length ) {
			for ( var i = 0, length = this.set.length; i < length; i++ ) {
				var annotation = this.set[i];
				for ( var j = this.cursor; j < to; j++ ) {
					if ( $.isArray( this.data[j] ) ) {
						this.data[j].push( annotation );
					} else {
						this.data[j] = [this.data[j], annotation];
					}
				}
			}
		}
		if ( this.clear.length ) {
			for ( var i = 0, length = this.clear.length; i < length; i++ ) {
				var annotation = this.clear[i];
				for ( var j = this.cursor; j < to; j++ ) {
					var index = indexOfAnnotation( this.data[j], annotation );
					if ( index !== -1 ) {
						this.data[j].splice( index, 1 );
					}
				}
			}
		}
	}
	
	function mark( op, invert ) {
		var target;
		if ( op.method === 'set' || ( op.method === 'clear' && invert ) ) {
			target = this.set;
		} else if ( op.method === 'clear' || ( op.method === 'set' && invert ) ) {
			target = this.clear;
		} else {
			throw 'Invalid method error. Can not operate attributes this way: ' + method;
		}
		if ( op.bias === 'start' ) {
			target.push( op.annotation );
		} else if ( op.bias === 'end' ) {
			// Find the index of a comparable annotation (checking for same value, not reference)
			var index;
			for ( var i = 0; i < target.length; i++ ) {
				if ( es.compareObjects( target[i], op.annotation ) ) {
					index = i;
					break;
				}
			}
			if ( index === undefined ) {
				throw 'Annotation stack error. Annotation is missing.';
			}
			target.splice( index, 1 );
		}
	};
	
	return {
		// Retain
		'retain': {
			'commit': retain,
			'rollback': retain
		},
		// Insert
		'insert': {
			'commit': insert,
			'rollback': remove
		},
		// Remove
		'remove': {
			'commit': remove,
			'rollback': insert
		},
		// Change element attributes
		'attribute': {
			'commit': function( op ) {
				attribute( op, false );
			},
			'rollback': function( op ) {
				attribute( op, true );
			}
		},
		// Change content annotations
		'annotate': {
			'commit': function( op ) {
				mark( op, false );
			},
			'rollback': function( op ) {
				mark( op, true );
			}
		}
	};
} )();

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
 * This method is pretty expensive. If you need to get different slices of the same content, get
 * the content first, then slice it up locally.
 * 
 * TODO: Rewrite this method to not use recursion, because the function call overhead is expensive
 * 
 * @method
 * @param {es.DocumentModelNode} node Node to get offset of
 * @param {es.DocumentModelNode} [from=this] Node to look within
 * @returns {Integer} Offset of node or -1 of node was not found
 */
es.DocumentModel.prototype.offsetOf = function( node, from ) {
	if ( from === undefined ) {
		from = this;
	}
	var offset = 0;
	for ( var i = 0; i < from.length; i++ ) {
		if ( node === from[i] ) {
			return offset;
		}
		if ( from[i].length ) {
			var childOffset = this.offsetOf( node, from[i] );
			if ( childOffset !== -1 ) {
				return offset + childOffset;
			}
		}
		offset += from[i].getElementLength();
	}
	return -1;
};

/**
 * Gets the element object of a node.
 * 
 * @method
 * @param {es.DocumentModelNode} node Node to get element object for
 * @returns {Object|null} Element object
 */
es.DocumentModel.prototype.getElement = function( node ) {
	var offset = this.offsetOf( node );
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
 * @returns {Array|null} List of content and elements inside node or null if node is not found
 */
es.DocumentModel.prototype.getContent = function( node, range ) {
	if ( range ) {
		range.normalize();
	} else {
		range = {
			'start': 0,
			'end': this.contentLength
		};
	}
	var offset = this.offsetOf( node );
	if ( offset !== -1 ) {
		return this.data.slice( offset + 1, offset + node.getContentLength() + 1 );
	}
	return null;
};

/**
 * Generates a transaction which inserts data at a given offset.
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
 * Generates a transaction which removes data from a given range.
 * 
 * @method
 * @param {es.Range} range
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareRemoval = function( range ) {
	//
};

/**
 * Generates a transaction which annotates content within a given range.
 * 
 * @method
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareContentAnnotation = function( range, method, annotation ) {
	//
};

/**
 * Generates a transaction which changes attributes on an element at a given index.
 * 
 * @method
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareElementAttributeChange = function( index, method, annotation ) {
	//
};

/**
 * Applies a transaction to the content data.
 * 
 * @method
 * @param {es.Transaction}
 */
es.DocumentModel.prototype.commit = function( transaction ) {
	var state = {
		'data': this.data,
		'cursor': 0,
		'set': [],
		'clear': []
	};
	for ( var i = 0, length = this.operations.length; i < length; i++ ) {
		var op = this.operations[i];
		if ( op.type in this.operations ) {
			this.operations[op.type].commit.call( state, op );
		} else {
			throw 'Invalid operation error. Operation type is not supported: ' + op.type;
		}
	}
};

/**
 * Reverses a transaction's effects on the content data.
 * 
 * @method
 * @param {es.Transaction}
 */
es.DocumentModel.prototype.rollback = function( transaction ) {
	var state = {
		'data': this.data,
		'cursor': 0,
		'set': [],
		'clear': []
	};
	for ( var i = 0, length = this.operations.length; i < length; i++ ) {
		var op = this.operations[i];
		if ( op.type in this.operations ) {
			this.operations[op.type].rollback.call( state, op );
		} else {
			throw 'Invalid operation error. Operation type is not supported: ' + op.type;
		}
	}
};

/* Inheritance */

es.extend( es.DocumentModel, es.DocumentModelNode );
