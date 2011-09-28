/**
 * Creates an es.ModelNode object.
 * 
 * es.ModelNode extends native JavaScript Array objects, without changing Array.prototype by
 * dynamically extending an array literal with the methods of es.ModelNode.
 * 
 * Child objects must extend es.ModelNode.
 * 
 * @class
 * @constructor
 * @extends {Array}
 * @extends {es.EventEmitter}
 */
es.ModelNode = function( children ) {
	// Inheritance
	es.EventEmitter.call( this );
	var node = $.isArray( children ) ? children : [];
	
	// Reusable function for passing update events upstream
	this.emitUpdate = function() {
		node.emit( 'update' );
	};
	
	// Extend native array with method and properties of this
	return $.extend( node, this );
};

/* Methods */

/**
 * Adds a node to the end of this node's children.
 * 
 * @method
 * @param {es.ModelItem} childModel Item to add
 * @returns {Integer} New number of children
 * @emits push (childModel)
 * @emits update
 */
es.ModelNode.prototype.push = function( childModel ) {
	childModel.attach( this );
	childModel.on( 'update', this.emitUpdate );
	Array.prototype.push.call( this, childModel );
	this.emit( 'push', childModel );
	this.emit( 'update' );
	return this.length;
};

/**
 * Adds a node to the beginning of this node's children.
 * 
 * @method
 * @param {es.ModelItem} childModel Item to add
 * @returns {Integer} New number of children
 * @emits unshift (childModel)
 * @emits update
 */
es.ModelNode.prototype.unshift = function( childModel ) {
	childModel.attach( this );
	childModel.on( 'update', this.emitUpdate );
	Array.prototype.unshift.call( this, childModel );
	this.emit( 'unshift', childModel );
	this.emit( 'update' );
	return this.length;
};

/**
 * Removes a node from the end of this node's children
 * 
 * @method
 * @returns {Integer} Removed childModel
 * @emits pop
 * @emits update
 */
es.ModelNode.prototype.pop = function() {
	if ( this.length ) {
		var childModel = this[this.length - 1];
		childModel.detach();
		childModel.removeListener( 'update', this.emitUpdate );
		Array.prototype.pop.call( this, childModel );
		this.emit( 'pop' );
		this.emit( 'update' );
		return childModel;
	}
};

/**
 * Removes a node from the beginning of this node's children
 * 
 * @method
 * @returns {Integer} Removed childModel
 * @emits shift
 * @emits update
 */
es.ModelNode.prototype.shift = function() {
	if ( this.length ) {
		var childModel = this[0];
		childModel.detach();
		childModel.removeListener( 'update', this.emitUpdate );
		Array.prototype.shift.call( this, childModel );
		this.emit( 'shift' );
		this.emit( 'update' );
		return childModel;
	}
};

/**
 * Adds and removes nodes from this node's children.
 * 
 * @method
 * @param {Integer} index Index to remove and or insert nodes at
 * @param {Integer} howmany Number of nodes to remove
 * @param {es.ModelItem} [...] Variadic list of nodes to insert
 * @returns {es.ModelItem[]} Removed nodes
 * @emits splice (index, howmany, [...])
 * @emits update
 */
es.ModelNode.prototype.splice = function( index, howmany ) {
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
 * Sorts this node's children.
 * 
 * @method
 * @param {Function} sortfunc Function to use when sorting
 * @emits sort
 * @emits update
 */
es.ModelNode.prototype.sort = function( sortfunc ) {
	this.emit( 'sort' );
	this.emit( 'update' );
	Array.prototype.sort.call( this );
};

/**
 * Reverses the order of this node's children.
 * 
 * @method
 * @emits reverse
 * @emits update
 */
es.ModelNode.prototype.reverse = function() {
	this.emit( 'reverse' );
	this.emit( 'update' );
	Array.prototype.reverse.call( this );
};

/**
 * Gets a reference to this node's parent.
 * 
 * @method
 * @returns {es.ModelNode} Reference to this node's parent
 */
es.ModelNode.prototype.getParent = function() {
	return this.parent;
};

/**
 * Attaches this node to another as a child.
 * 
 * @method
 * @param {es.ModelNode} parent Node to attach to
 * @emits attach (parent)
 */
es.ModelNode.prototype.attach = function( parent ) {
	this.parent = parent;
	this.emit( 'attach', parent );
};

/**
 * Detaches this node from it's parent.
 * 
 * @method
 * @emits detach (parent)
 */
es.ModelNode.prototype.detach = function() {
	var parent = this.parent;
	this.parent = null;
	this.emit( 'detach', parent );
};

/**
 * Creates a view for this node.
 * 
 * @method
 * @returns {es.ViewNode} New item view associated with this model
 */
es.ModelNode.prototype.createView = function() {
	throw 'ModelItem.createView not implemented in this subclass:' + this.constructor;
};

/* Inheritance */

es.extend( es.ModelNode, es.EventEmitter );
