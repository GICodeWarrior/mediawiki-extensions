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
}
