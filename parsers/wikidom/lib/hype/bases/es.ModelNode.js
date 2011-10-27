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
	
	// Extension
	var node = es.extendObject( [], this );
	
	// Reusable function for passing update events upstream
	node.emitUpdate = function() {
		node.emit( 'update' );
	};
	
	// Properties
	node.parent = null;
	node.root = node;
	
	// Children
	if ( es.isArray( children ) ) {
		for ( var i = 0; i < children.length; i++ ) {
			node.push( children[i] );
		}
	}
	
	return node;
};

/* Methods */

/**
 * Adds a node to the end of this node's children.
 * 
 * @method
 * @param {es.ModelItem} childModel Item to add
 * @returns {Integer} New number of children
 * @emits beforePush (childModel)
 * @emits afterPush (childModel)
 * @emits update
 */
es.ModelNode.prototype.push = function( childModel ) {
	this.emit( 'beforePush', childModel );
	childModel.attach( this );
	childModel.on( 'update', this.emitUpdate );
	Array.prototype.push.call( this, childModel );
	this.emit( 'afterPush', childModel );
	this.emit( 'update' );
	return this.length;
};

/**
 * Adds a node to the beginning of this node's children.
 * 
 * @method
 * @param {es.ModelItem} childModel Item to add
 * @returns {Integer} New number of children
 * @emits beforeUnshift (childModel)
 * @emits afterUnshift (childModel)
 * @emits update
 */
es.ModelNode.prototype.unshift = function( childModel ) {
	this.emit( 'beforeUnshift', childModel );
	childModel.attach( this );
	childModel.on( 'update', this.emitUpdate );
	Array.prototype.unshift.call( this, childModel );
	this.emit( 'afterUnshift', childModel );
	this.emit( 'update' );
	return this.length;
};

/**
 * Removes a node from the end of this node's children
 * 
 * @method
 * @returns {Integer} Removed childModel
 * @emits beforePop
 * @emits afterPop
 * @emits update
 */
es.ModelNode.prototype.pop = function() {
	if ( this.length ) {
		this.emit( 'beforePop' );
		var childModel = this[this.length - 1];
		childModel.detach();
		childModel.removeListener( 'update', this.emitUpdate );
		Array.prototype.pop.call( this );
		this.emit( 'afterPop' );
		this.emit( 'update' );
		return childModel;
	}
};

/**
 * Removes a node from the beginning of this node's children
 * 
 * @method
 * @returns {Integer} Removed childModel
 * @emits beforeShift
 * @emits afterShift
 * @emits update
 */
es.ModelNode.prototype.shift = function() {
	if ( this.length ) {
		this.emit( 'beforeShift' );
		var childModel = this[0];
		childModel.detach();
		childModel.removeListener( 'update', this.emitUpdate );
		Array.prototype.shift.call( this );
		this.emit( 'afterShift' );
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
 * @emits beforeSplice (index, howmany, [...])
 * @emits afterSplice (index, howmany, [...])
 * @emits update
 */
es.ModelNode.prototype.splice = function( index, howmany ) {
	var i,
		length,
		args = Array.prototype.slice.call( arguments, 0 );
	this.emit.apply( this, ['beforeSplice'].concat( args ) );
	if ( args.length >= 3 ) {
		for ( i = 2, length = args.length; i < length; i++ ) {
			args[i].attach( this );
		}
	}
	var removed = Array.prototype.splice.apply( this, args );
	for ( i = 0, length = removed.length; i < length; i++ ) {
		removed[i].detach();
		removed[i].removeListener( 'update', this.emitUpdate );
	}
	this.emit.apply( this, ['afterSplice'].concat( args ) );
	this.emit( 'update' );
	return removed;
};

/**
 * Sorts this node's children.
 * 
 * @method
 * @param {Function} sortfunc Function to use when sorting
 * @emits beforeSort (sortfunc)
 * @emits afterSort (sortfunc)
 * @emits update
 */
es.ModelNode.prototype.sort = function( sortfunc ) {
	this.emit( 'beforeSort', sortfunc );
	Array.prototype.sort.call( this );
	this.emit( 'afterSort', sortfunc );
	this.emit( 'update' );
};

/**
 * Reverses the order of this node's children.
 * 
 * @method
 * @emits beforeReverse
 * @emits afterReverse
 * @emits update
 */
es.ModelNode.prototype.reverse = function() {
	this.emit( 'beforeReverse' );
	Array.prototype.reverse.call( this );
	this.emit( 'afterReverse' );
	this.emit( 'update' );
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
 * Gets the root node in the tree this node is currently attached to.
 * 
 * @method
 * @returns {es.ModelNode} Root node
 */
es.ModelNode.prototype.getRoot = function() {
	return this.root;
};

/**
 * Attaches this node to another as a child.
 * 
 * @method
 * @param {es.ModelNode} parent Node to attach to
 * @emits attach (parent)
 */
es.ModelNode.prototype.attach = function( parent ) {
	this.emit( 'beforeAttach', parent );
	this.parent = parent;
	this.setRoot( parent.getRoot() );
	this.emit( 'afterAttach', parent );
};

/**
 * Detaches this node from it's parent.
 * 
 * @method
 * @emits detach
 */
es.ModelNode.prototype.detach = function() {
	this.emit( 'beforeDetach' );
	this.parent = null;
	this.clearRoot();
	this.emit( 'afterDetach' );
};

/**
 * Sets the root node to this and all of it's children.
 * 
 * @method
 * @param {es.ModelNode} root Node to use as root
 */
es.ModelNode.prototype.setRoot = function( root ) {
	this.root = root;
	for ( var i = 0; i < this.length; i++ ) {
		this[i].setRoot( root );
	}
};

/**
 * Clears the root node from this and all of it's children.
 * 
 * @method
 */
es.ModelNode.prototype.clearRoot = function() {
	this.root = null;
	for ( var i = 0; i < this.length; i++ ) {
		this[i].clearRoot();
	}
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

es.extendClass( es.ModelNode, es.EventEmitter );
