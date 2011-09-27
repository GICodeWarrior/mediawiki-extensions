/**
 * Creates an es.ModelList object.
 * 
 * es.ModelList extends native JavaScript Array objects, without changing Array.prototype by
 * dynamically extending an array literal with the methods of es.ModelList.
 * 
 * Child objects must extend es.ModelItem.
 * 
 * @class
 * @constructor
 * @extends {Array}
 * @extends {es.EventEmitter}
 */
es.ModelList = function( items ) {
	es.EventEmitter.call( this );
	var list = new es.AggregateArray( list );
	
	// Reusable function for passing update events upstream
	this.emitUpdate = function() {
		list.emit( 'update' );
	};
	
	// Extend native array with method and properties of this
	return $.extend( list, this );
};

/* Methods */

/**
 * Gets the first item in the list.
 * 
 * @method
 * @returns {es.ModelItem|undefined} First item in the list, or undefined if none exists
 */
es.ModelList.prototype.getFirstItem = function() {
	return this[0];
};

/**
 * Gets the last item in the list.
 * 
 * @method
 * @returns {es.ModelItem|undefined} last item in the list, or undefined if none exists
 */
es.ModelList.prototype.getLastItem = function() {
	return this[this.length - 1];
};

/**
 * Adds an item to the end of the list.
 * 
 * @method
 * @param {es.ModelItem} item Item to add
 * @returns {Integer} New length of list
 * @emits push (item)
 * @emits update
 */
es.ModelList.prototype.push = function( item ) {
	item.attach( this );
	item.on( 'update', this.emitUpdate );
	Array.prototype.push.call( this, item );
	this.emit( 'push', item );
	this.emit( 'update' );
	return this.length;
};

/**
 * Adds an item to the beginning of the list.
 * 
 * @method
 * @param {es.ModelItem} item Item to add
 * @returns {Integer} New length of list
 * @emits unshift (item)
 * @emits update
 */
es.ModelList.prototype.unshift = function( item ) {
	item.attach( this );
	item.on( 'update', this.emitUpdate );
	Array.prototype.unshift.call( this, item );
	this.emit( 'unshift', item );
	this.emit( 'update' );
	return this.length;
};

/**
 * Removes an item from the end of the list.
 * 
 * @method
 * @returns {Integer} Removed item
 * @emits pop
 * @emits update
 */
es.ModelList.prototype.pop = function() {
	if ( this.length ) {
		var item = this[this.length - 1];
		item.detach();
		item.removeListener( 'update', this.emitUpdate );
		Array.prototype.pop.call( this, item );
		this.emit( 'pop' );
		this.emit( 'update' );
		return item;
	}
};

/**
 * Removes an item from the beginning of the list.
 * 
 * @method
 * @returns {Integer} Removed item
 * @emits shift
 * @emits update
 */
es.ModelList.prototype.shift = function() {
	if ( this.length ) {
		var item = this[0];
		item.detach();
		item.removeListener( 'update', this.emitUpdate );
		Array.prototype.shift.call( this, item );
		this.emit( 'shift' );
		this.emit( 'update' );
		return item;
	}
};

/**
 * Removes an item from the beginning of the list.
 * 
 * @method
 * @param {Integer} index Index to remove and or insert items
 * @param {Integer} howmany Number of items to remove
 * @param {es.ModelItem} [...] Variadic list of items to insert
 * @returns {es.ModelItem[]} Removed items
 * @emits splice (index, howmany, [...])
 * @emits update
 */
es.ModelList.prototype.splice = function( index, howmany ) {
	var args = Array.prototype.slice.call( arguments, 0 );
	if ( args.length >= 3 ) {
		for ( var i = 2; i < args.length; i++ ) {
			args[i].attach( this );
		}
	}
	var removed = Array.prototype.splice.apply( this, args );
	for ( var i = 0; i < removed.length; i++ ) {
		removed[i].detach();
		removed[i].removeListener( 'update', this.emitUpdate );
	}
	this.emit.apply( this, ['splice'].concat( args ) );
	this.emit( 'update' );
	return removed;
};

/**
 * Sorts items in list.
 * 
 * @method
 * @param {Function} sortfunc Function to use when sorting
 * @emits sort
 * @emits update
 */
es.ModelList.prototype.sort = function( sortfunc ) {
	this.emit( 'sort' );
	this.emit( 'update' );
	Array.prototype.reverse.call( this );
};

/**
 * Reverses the order of the list.
 * 
 * @method
 * @emits reverse
 * @emits update
 */
es.ModelList.prototype.reverse = function() {
	this.emit( 'reverse' );
	this.emit( 'update' );
	Array.prototype.reverse.call( this );
};

/* Inheritance */

es.extend( es.ModelList, es.EventEmitter );
