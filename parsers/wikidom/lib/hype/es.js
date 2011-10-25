/**
 * EditSurface namespace.
 * 
 * All classes and functions will be attached to this object to keep the global namespace clean.
 */
var es = {};

/* Functions */

/**
 * Extends a constructor with the prototype of another.
 * 
 * When using this, it's required to include a call to the constructor of the parent class as the
 * first code in the child class's constructor.
 * 
 * @example
 *     // Define parent class
 *     function Foo() {
 *         // code here
 *     }
 *     // Define child class
 *     function Bar() {
 *         // Call parent constructor
 *         Foo.call( this );
 *     }
 *     // Extend prototype
 *     extend( Bar, Foo );
 * 
 * @static
 * @method
 * @param dst {Function} Class to extend
 * @param src {Function} Base class to use methods from
 */
es.extend = function( dst, src ) {
	var base = new src();
	for ( var method in base ) {
		if ( typeof base[method] === 'function' && !( method in dst.prototype ) ) {
			dst.prototype[method] = base[method];
		}
	}
};

/**
 * Recursively compares string and number property between two objects.
 * 
 * A false result may be caused by property inequality or by properties in one object missing from
 * the other. An asymmetrical test may also be performed, which checks only that properties in the
 * first object are present in the second object, but not the inverse.
 * 
 * @static
 * @method
 * @param a {Object} First object to compare
 * @param b {Object} Second object to compare
 * @param asymmetrical {Boolean} Whether to check only that b contains values from a
 * @returns {Boolean} If the objects contain the same values as each other
 */
es.compareObjects = function( a, b, asymmetrical ) {
	var aValue, bValue, aType, bType;
	var k;
	for ( k in a ) {
		aValue = a[k];
		bValue = b[k];
		aType = typeof aValue;
		bType = typeof bValue;
		if ( aType !== bType ||
			( ( aType === 'string' || aType === 'number' ) && aValue !== bValue ) ||
			( $.isPlainObject( aValue ) && !es.compareObjects( aValue, bValue ) ) ) {
			return false;
		}
	}
	// If the check is not asymmetrical, recursing with the arguments swapped will verify our result
	return asymmetrical ? true : es.compareObjects( b, a, true );
};

/**
 * Gets a deep copy of an array's string, number, array and plain-object contents.
 * 
 * @static
 * @method
 * @param source {Array} Array to copy
 * @returns {Array} Copy of source array
 */
es.copyArray = function( source ) {
	var destination = [];
	for ( var i = 0; i < source.length; i++ ) {
		sourceValue = source[i];
		sourceType = typeof sourceValue;
		if ( sourceType === 'string' || sourceType === 'number' ) {
			destination.push( sourceValue );
		} else if ( $.isPlainObject( sourceValue ) ) {
			destination.push( es.copyObject( sourceValue ) );
		} else if ( $.isArray( sourceValue ) ) {
			destination.push( es.copyArray( sourceValue ) );
		}
	}
	return destination;
};

/**
 * Gets a deep copy of an object's string, number, array and plain-object properties.
 * 
 * @static
 * @method
 * @param source {Object} Object to copy
 * @returns {Object} Copy of source object
 */
es.copyObject = function( source ) {
	var destination = {};
	for ( var key in source ) {
		sourceValue = source[key];
		sourceType = typeof sourceValue;
		if ( sourceType === 'string' || sourceType === 'number' ) {
			destination[key] = sourceValue;
		} else if ( $.isPlainObject( sourceValue ) ) {
			destination[key] = es.copyObject( sourceValue );
		} else if ( $.isArray( sourceValue ) ) {
			destination[key] = es.copyArray( sourceValue );
		}
	}
	return destination;
};

/**
 * Splice one array into another. This is the equivalent of arr.splice( offset, 0, i1, i2, i3, ... )
 * except that i1, i2, i3, ... are specified as an array rather than separate parameters.
 * 
 * @static
 * @method
 * @param arr {Array} Array to splice insertion into. Will be modified
 * @param offset {Number} Offset in arr to splice insertion in at. May be negative; see the 'index' parameter for Array.prototype.splice()
 * @param insertion {Array} Array to insert
 */
es.spliceArray = function( arr, offset, insertion ) {
	// We need to splice insertion in in batches, because of parameter list length limits which vary cross-browser.
	// 1024 seems to be a safe batch size on all browsers.
	var index = 0, batchSize = 1024;
	while ( index < insertion.length ) {
		// Call arr.splice( offset, 0, i0, i1, i2, ..., i1023 );
		arr.splice.apply(
			arr, [index + offset, 0].concat( insertion.slice( index, index + batchSize ) )
		);
		index += batchSize;
	}
};
