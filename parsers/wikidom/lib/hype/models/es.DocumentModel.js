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
	var node = $.extend( new es.DocumentModelNode( null, length ), this );
	
	// Properties
	node.data = $.isArray( data ) ? data : [];
	node.attributes = $.isPlainObject( attributes ) ? attributes : {};
	
	// Build a tree of models, which is a space partitioning data structure
	var currentNode = node;
	for ( var i = 0, length = node.data.length; i < length; i++ ) {
		if ( data[i].type !== undefined ) {
			// It's an element, figure out it's type
			var element = node.data[i],
				type = element.type,
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
				var newNode = new es.DocumentModel.nodeModels[element.type]( element );
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
			while ( data[i].type === undefined && i < length ) {
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
	}
	
	function insert( op ) {
		es.spliceArray( this.data, this.cursor, op.data );
		annotate.call( this, this.cursor + op.data.length );
		this.cursor += op.data.length;
	}
	
	function remove( op ) {
		this.data.splice( this.cursor, op.data.length );
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
			for ( var key in element.attributes ) {
				empty = false;
				break;
			}
			if ( empty ) {
				delete element.attributes;
			}
		} else {
			throw 'Invalid method error. Can not operate attributes this way: ' + method;
		}
	}
	
	function annotate( to ) {
		var i,
			j,
			length,
			annotation;
		// Handle annotations
		if ( this.set.length ) {
			for ( i = 0, length = this.set.length; i < length; i++ ) {
				annotation = this.set[i];
				for ( j = this.cursor; j < to; j++ ) {
					if ( $.isArray( this.data[j] ) ) {
						this.data[j].push( annotation );
					} else {
						this.data[j] = [this.data[j], annotation];
					}
				}
				// Rebuild annotation hash
				annotation.hash = es.DocumentModel.getAnnotationHash( annotation );
			}
		}
		if ( this.clear.length ) {
			for ( i = 0, length = this.clear.length; i < length; i++ ) {
				annotation = this.clear[i];
				for ( j = this.cursor; j < to; j++ ) {
					var index = es.DocumentModel.getIndexOfAnnotation( this.data[j], annotation );
					if ( index !== -1 ) {
						this.data[j].splice( index, 1 );
					}
				}
				// Rebuild annotation hash
				annotation.hash = es.DocumentModel.getAnnotationHash( annotation );
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
			var index = es.DocumentModel.getIndexOfAnnotation( target[i], op.annotation );
			if ( index === -1 ) {
				throw 'Annotation stack error. Annotation is missing.';
			}
			target.splice( index, 1 );
		}
	}
	
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
 * Generates a hash of an annotation object based on it's name and data.
 * 
 * TODO: Add support for deep hashing of array and object properties of annotation data.
 * 
 * @static
 * @method
 * @param {Object} annotation Annotation object to generate hash for
 * @returns {String} Hash of annotation
 */
es.DocumentModel.getAnnotationHash = function( annotation ) {
	var hash = '#' + annotation.type;
	if ( annotation.data ) {
		var keys = [];
		for ( var key in annotation.data ) {
			keys.push( key + ':' + annotation.data );
		}
		keys.sort();
		hash += '|' + keys.join( '|' );
	}
	return hash;
};

es.DocumentModel.getIndexOfAnnotation = function( character, annotation ) {
	if ( annotation === undefined || annotation.type === undefined ) {
		throw 'Invalid annotation error. Can not find non-annotation data in character.';
	}
	if ( $.isArray( character ) ) {
		// Find the index of a comparable annotation (checking for same value, not reference)
		for ( var i = 1; i < character.length; i++ ) {
			if ( character[i].hash === annotation.hash ) {
				return i;
			}
		}
	}
	return -1;
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
			for ( var i = 0, length = obj.annotations.length; i < length; i++ ) {
				var src = obj.annotations[i];
				// Build simplified annotation object
				var dst = { 'type': src.type };
				if ( 'data' in src ) {
					dst.data = es.copyObject( src.data );
				}
				// Add a hash to the annotation for faster comparison
				dst.hash = es.DocumentModel.getAnnotationHash( dst );
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
				for ( var j = src.start; j < src.end; j++ ) {
					// Auto-convert to array
					if ( typeof data[j] === 'string' ) {
						data[j] = [data[j]];
					}
					// Append 
					data[j].push( dst );
				}
			}
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
		end;
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
 * @method
 * @param {es.DocumentModelNode} node Node to get offset of
 * @returns {Integer} Offset of node or -1 of node was not found
 */
es.DocumentModel.prototype.getOffsetFromNode = function( node ) {
	var offset = 0,
		currentNode,
		iteration = [this, 0],
		iterations = [iteration];
	while ( iterations[0][0].length < iteration[0][1] ) {
		currentNode = iteration[0][iteration[1]];
		if ( currentNode === node ) {
			break;
		} else {
			if ( currentNode.length ) {
				// Include opening element when descending
				offset++;
				// Descend one level down
				iterations.push( [currentNode, 0] );
				iteration = iterations[iterations.length - 1];
			} else {
				// Include opening and closing when passing over
				offset += 2;
			}
		}
		iteration[1]++;
		if ( iteration[1] >= iteration[0].length ) {
			// Include closing element when ascending
			offset++;
			// Ascend one level up
			iterations.pop();
			iteration = iterations[iterations.length - 1];
		}
	}
	return offset;
};

/**
 * Gets the node at a given offset.
 * 
 * This method is pretty expensive. If you need to get different slices of the same content, get
 * the content first, then slice it up locally.
 * 
 * TODO: Rewrite this method to not use recursion, because the function call overhead is expensive
 * 
 * @method
 * @param {Integer} offset Offset to find node at
 * @returns {es.DocumentModelNode} Node at offset
 */
es.DocumentModel.prototype.getNodeFromOffset = function( offset ) {
	var nodeOffset = 0,
		nodeLength;
	for ( var i = 0, length = this.length; i < length; i++ ) {
		nodeLength = this[i].getElementLength();
		if ( offset >= nodeOffset && offset < nodeOffset + nodeLength ) {
			return this[i].length ?
				es.DocumentModel.prototype.getNodeFromOffset.call( this[i], offset - nodeOffset ) :
					this[i];
		}
		nodeOffset += nodeLength;
	}
	return this;
};

/**
 * Gets the element object of a node.
 * 
 * @method
 * @param {es.DocumentModelNode} node Node to get element object for
 * @returns {Object|null} Element object
 */
es.DocumentModel.prototype.getElementFromNode = function( node ) {
	var offset = this.getOffsetFromNode( node );
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
es.DocumentModel.prototype.getContentFromNode = function( node, range ) {
	var length = node.getContentLength();
	if ( range ) {
		range.normalize();
		if ( range.start < 0 ) {
			throw 'Invalid range error. Range can not start before node start: ' + range.start;
		}
		if ( range.end > length ) {
			throw 'Invalid range error. Range can not end after node end: ' + range.end;
		}
	} else {
		range = {
			'start': 0,
			'end': length
		};
	}
	var offset = this.getOffsetFromNode( node );
	if ( offset !== -1 ) {
		offset++;
		return this.data.slice( offset + range.start, offset + range.end );
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
	var tx = new es.Transaction();
	if ( offset > 0 ) {
		tx.pushRetain( offset );
	}
	// TODO check for structural changes
	tx.pushInsert( data );
	if ( offset < this.data.length ) {
		tx.pushRetain( this.data.length - offset );
	}
	
	return tx;
	
	/*
	 * // Structural changes
	 * There are 2 basic types of locations the insertion point can be:
	 *     Structural locations
	 *         |<p>a</p><p>b</p> - Beginning of the document
	 *         <p>a</p>|<p>b</p> - Between elements (like in a document or list)
	 *         <p>a</p><p>b</p>| - End of the document
	 *     Content locations
	 *         <p>|a</p><p>b</p> - Inside an element (like in a paragraph or listItem)
	 *         <p>a|</p><p>b</p> - May also be inside an element but right before/after an
	 *                             open/close
	 * 
	 * if ( Incoming data contains structural elements ) {
		   // We're assuming the incoming data is balanced, is that OK?
	 *     if ( Insertion point is a structural location ) {
	 *         if ( Incoming data is not a complete structural element ) {
	 *             Incoming data must be balanced
	 *         }
	 *     } else {
	 *         Closing and opening elements for insertion point must be added to incoming data
	 *     }
	 * } else {
	 *     if ( Insertion point is a structural location ) {
	 *         Incoming data must be balanced   //how? Should this even be allowed?
	 *     } else {
	 *         Content being inserted into content is OK, do nothing
	 *     }
	 * }
	 */
};

/**
 * Generates a transaction which removes data from a given range.
 * 
 * @method
 * @param {es.Range} range
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareRemoval = function( range ) {
	var doc = this;
	//debugger;

	/**
	 * Return true if can merge the remaining contents of the elements after a selection is deleted
	 * across them. For instance, if a selection is painted across two paragraphs, and then the text
	 * is deleted, the two paragraphs can become one paragraph. However, if the selection crosses
	 * into a table, those cannot be merged.
	 * @param {Number} integer offset
	 * @param {Number} integer offset
	 * @return {Boolean}
	*/
	function canMerge( range ) {
		var node1 = doc.getNodeFromOffset( range.start );
		var node2 = doc.getNodeFromOffset( range.end - 1 );
		// This is the simple rule we are following for now -- same type & same parent = can merge.
		// So you can merge adjacent paragraphs, or listitems. And you can't merge a paragraph into
		// a table row. There may be other rules we will want in here later, for instance, special
		// casing merging a listitem into a paragraph.
		
		// wait, some nodes don't have types? Is this the top document node?
		return ( 
					( 
						( node1.type !== undefined && node2.type !== undefined ) && 
						( node1.type === node2.type ) 
					)  &&
					( node1.getParent() === node2.getParent() )
				);
	}
	
	function mergeDelete( range, tx ) {	
		// yay, content can be removed in one fell swoop
		var removed = doc.data.slice( range.start, range.end );
		tx.pushRemove( removed );
	}

	// remove string content only, retain structure
	function stripDelete( range, tx ) { 
		var lastOperation, operationStart;

		var ops = [],
			op;
		//debugger;

		// get a list of operations, with 0-based indexes
		for (var i = range.start; i < range.end; i++ ) {
			var neededOp = doc.data[i].type === undefined ? 'remove' : 'retain';
			op = ops[ ops.length - 1 ];
			if ( op === undefined || op.type !== neededOp ) {
				ops.push( { type: neededOp, start: i, end: i } );
			} else {
				op.end = i;
			}
		}					

		//debugger;
		// insert operations as transactions (end must be adjusted)
		for (var j = 0; j < ops.length; j++ ) {
			op = ops[j];
			if ( op.type === 'retain' ) {
				// we add one because retain(3,3) really means retain 1 char at pos 3
				tx.pushRetain( op.end - op.start + 1 );
			} else if ( op.type === 'remove' ) {
				// we add one because to remove(3,5) we need to slice(3,6), the ending is last
				// subscript removed + 1.
				tx.pushRemove( this.data.slice( op.start, op.end + 1 ) );
			} else {
				console.log( "this is impossible" );
			}
		}

	}

	
	var tx = new es.Transaction();
	range.normalize();
	
	// Retain to the start of the range
	if ( range.start > 0 ) {
		tx.pushRetain( range.start );
	}

	
	// choose a deletion strategy; merging nodes together, or stripping content from existing
	// structure.
	if ( canMerge( range ) ) {
		mergeDelete( range, tx );
	} else {
		stripDelete( range, tx );
	}

	// Retain up to the end of the document. Why do we do this?
	if ( range.end < doc.data.length ) {
		tx.pushRetain( doc.data.length - range.end );
	}
		
	return tx;
};

/**
 * Generates a transaction which annotates content within a given range.
 * 
 * @method
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareContentAnnotation = function( range, method, annotation ) {
	var tx = new es.Transaction();
	range.normalize();
	if ( annotation.hash === undefined ) {
		annotation.hash = es.DocumentModel.getAnnotationHash( annotation );
	}
	var i = range.start,
		span = i,
		on = this.data[i].type !== undefined;
	while ( i < range.end ) {
		if ( this.data[i].type !== undefined ) {
			// Don't annotate structural elements
			if ( on ) {
				tx.pushStopAnnotating( method, annotation );
				span = 0;
				on = false;
			}
		} else {
			var covered = es.DocumentModel.getIndexOfAnnotation( this.data[i], annotation ) !== -1;
			if ( covered && method === 'set' || !covered && method === 'clear' ) {
				// Don't set/clear annotations on content that's already set/cleared
				if ( on ) {
					if ( span ) {
						tx.pushRetain( span );
					}
					tx.pushStopAnnotating( method, annotation );
					span = 0;
					on = false;
				}
			} else {
				// Content
				if ( !on ) {
					if ( span ) {
						tx.pushRetain( span );
					}
					tx.pushStartAnnotating( method, annotation );
					span = 0;
					on = true;
				}
			}
		}
		span++;
		i++;
	}
	if ( on ) {
		if ( span ) {
			tx.pushRetain( span );
		}
		tx.pushStopAnnotating( method, annotation );
	}
	if ( range.end < this.data.length ) {
		tx.pushRetain( this.data.length - range.end );
	}
	return tx;
};

/**
 * Generates a transaction which changes attributes on an element at a given offset.
 * 
 * @method
 * @returns {es.Transaction}
 */
es.DocumentModel.prototype.prepareElementAttributeChange = function( offset, method, key, value ) {
	var tx = new es.Transaction();
	if ( offset ) {
		tx.pushRetain( offset );
	}
	if ( this.data[offset].type === undefined ) {
		throw 'Invalid element offset error. Can not set attributes to non-element data.';
	}
	if ( this.data[offset].type[0] === '/' ) {
		throw 'Invalid element offset error. Can not set attributes on closing element.';
	}
	tx.pushChangeElementAttribute( method, key, value );
	if ( offset < this.data.length ) {
		tx.pushRetain( this.data.length - offset );
	}
	return tx;
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
		'tree': this,
		'cursor': 0,
		'set': [],
		'clear': []
	};
	for ( var i = 0, length = transaction.length; i < length; i++ ) {
		var operation = transaction[i];
		if ( operation.type in es.DocumentModel.operations ) {
			es.DocumentModel.operations[operation.type].commit.call( state, operation );
		} else {
			throw 'Invalid operation error. Operation type is not supported: ' + operation.type;
		}
	}
	// TODO: Synchronize op.tree - insert elements and adjust lengths
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
		'tree': this,
		'cursor': 0,
		'set': [],
		'clear': []
	};
	for ( var i = 0, length = transaction.length; i < length; i++ ) {
		var operation = transaction[i];
		if ( operation.type in es.DocumentModel.operations ) {
			es.DocumentModel.operations[operation.type].rollback.call( state, operation );
		} else {
			throw 'Invalid operation error. Operation type is not supported: ' + operation.type;
		}
	}
	// TODO: Synchronize op.tree - insert elements and adjust lengths
};

/* Inheritance */

es.extend( es.DocumentModel, es.DocumentModelNode );
