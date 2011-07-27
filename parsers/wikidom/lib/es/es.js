/**
 * EditSurafce namespace.
 * 
 * All classes and functions will be attached to this object to keep the global namespace clean.
 */
var es = {};

/**
 * Extends a constructor with prototype of another.
 * 
 * When using this, it's required to include a call to the constructor of the parent class as the
 * first code in the child class's constructor.
 * 
 * @example
 *     // Define parent class
 *     function Foo() {
 *     }
 *     // Define child class
 *     function Bar() {
 *         // Call parent constructor
 *         Foo.call( this );
 *     }
 *     // Extend prototype
 *     extend( Bar, Foo );
 * 
 * @param dst {Function} Class to copy prototype members to
 * @param src {Function} Class to copy prototype members from
 */
es.extend = function( dst, src ) {
	var base = new src();
	var i; // iterator

	for ( i in base ) {
		if ( typeof base[i] === 'function' && !( i in dst.prototype ) ) {
			dst.prototype[i] = base[i];
		}
	}
}
