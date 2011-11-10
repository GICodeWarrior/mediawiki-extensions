/**
 * Creates an es.DocumentModelBranchNode object.
 * 
 * @class
 * @abstract
 * @constructor
 * @extends {es.DocumentBranchNode}
 * @extends {es.DocumentModelNode}
 * @param {String} type Symbolic name of node type
 * @param {Object} element Element object in document data
 * @param {es.DocumentModelBranchNode[]} [contents] List of child nodes to append
 */
es.DocumentModelBranchNode = function( type, element, contents ) {
	// Inheritance
	es.DocumentBranchNode.call( this );
	es.DocumentModelNode.call( this, type, element, 0 );

	// Child nodes
	if ( es.isArray( contents ) ) {
		for ( var i = 0; i < contents.length; i++ ) {
			this.push( contents[i] );
		}
	}
};

/* Methods */

/**
 * Gets a plain object representation of the document's data.
 * 
 * @method
 * @see {es.DocumentModelNode.getPlainObject}
 * @see {es.DocumentModel.newFromPlainObject}
 * @returns {Object} Plain object representation
 */
es.DocumentModelBranchNode.prototype.getPlainObject = function() {
	var obj = { 'type': this.type };
	if ( this.element && this.element.attributes ) {
		obj.attributes = es.copyObject( this.element.attributes );
	}
	obj.children = [];
	for ( var i = 0; i < this.children.length; i++ ) {
		obj.children.push( this.children[i].getPlainObject() );
	}
	return obj;
};

/**
 * Adds a node to the end of this node's children.
 * 
 * @method
 * @param {es.DocumentModelBranchNode} childModel Item to add
 * @returns {Integer} New number of children
 * @emits beforePush (childModel)
 * @emits afterPush (childModel)
 * @emits update
 */
es.DocumentModelBranchNode.prototype.push = function( childModel ) {
	this.emit( 'beforePush', childModel );
	childModel.attach( this );
	childModel.on( 'update', this.emitUpdate );
	this.children.push( childModel );
	this.adjustContentLength( childModel.getElementLength(), true );
	this.emit( 'afterPush', childModel );
	this.emit( 'update' );
	return this.children.length;
};

/**
 * Adds a node to the beginning of this node's children.
 * 
 * @method
 * @param {es.DocumentModelBranchNode} childModel Item to add
 * @returns {Integer} New number of children
 * @emits beforeUnshift (childModel)
 * @emits afterUnshift (childModel)
 * @emits update
 */
es.DocumentModelBranchNode.prototype.unshift = function( childModel ) {
	this.emit( 'beforeUnshift', childModel );
	childModel.attach( this );
	childModel.on( 'update', this.emitUpdate );
	this.children.unshift( childModel );
	this.adjustContentLength( childModel.getElementLength(), true );
	this.emit( 'afterUnshift', childModel );
	this.emit( 'update' );
	return this.children.length;
};

/**
 * Removes a node from the end of this node's children
 * 
 * @method
 * @returns {es.DocumentModelBranchNode} Removed childModel
 * @emits beforePop
 * @emits afterPop
 * @emits update
 */
es.DocumentModelBranchNode.prototype.pop = function() {
	if ( this.children.length ) {
		this.emit( 'beforePop' );
		var childModel = this.children[this.children.length - 1];
		childModel.detach();
		childModel.removeListener( 'update', this.emitUpdate );
		this.children.pop();
		this.adjustContentLength( -childModel.getElementLength(), true );
		this.emit( 'afterPop' );
		this.emit( 'update' );
		return childModel;
	}
};

/**
 * Removes a node from the beginning of this node's children
 * 
 * @method
 * @returns {es.DocumentModelBranchNode} Removed childModel
 * @emits beforeShift
 * @emits afterShift
 * @emits update
 */
es.DocumentModelBranchNode.prototype.shift = function() {
	if ( this.children.length ) {
		this.emit( 'beforeShift' );
		var childModel = this.children[0];
		childModel.detach();
		childModel.removeListener( 'update', this.emitUpdate );
		this.children.shift();
		this.adjustContentLength( -childModel.getElementLength(), true );
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
 * @param {es.DocumentModelBranchNode} [...] Variadic list of nodes to insert
 * @returns {es.DocumentModelBranchNode[]} Removed nodes
 * @emits beforeSplice (index, howmany, [...])
 * @emits afterSplice (index, howmany, [...])
 * @emits update
 */
es.DocumentModelBranchNode.prototype.splice = function( index, howmany ) {
	var i,
		length,
		args = Array.prototype.slice.call( arguments, 0 ),
		diff = 0;
	this.emit.apply( this, ['beforeSplice'].concat( args ) );
	if ( args.length >= 3 ) {
		for ( i = 2, length = args.length; i < length; i++ ) {
			diff += args[i].getElementLength();
			args[i].attach( this );
		}
	}
	var removed = this.children.splice.apply( this.children, args );
	for ( i = 0, length = removed.length; i < length; i++ ) {
		diff -= removed[i].getElementLength();
		removed[i].detach();
		removed[i].removeListener( 'update', this.emitUpdate );
	}
	this.adjustContentLength( diff, true );
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
es.DocumentModelBranchNode.prototype.sort = function( sortfunc ) {
	this.emit( 'beforeSort', sortfunc );
	this.children.sort( sortfunc );
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
es.DocumentModelBranchNode.prototype.reverse = function() {
	this.emit( 'beforeReverse' );
	this.children.reverse();
	this.emit( 'afterReverse' );
	this.emit( 'update' );
};

/**
 * Gets the index of a given child node.
 * 
 * @method
 * @param {es.DocumentModelNode} node Child node to find index of
 * @returns {Integer} Index of child node or -1 if node was not found
 */
es.DocumentModelBranchNode.prototype.indexOf = function( node ) {
	return this.children.indexOf( node );
};

/**
 * Sets the root node to this and all of it's children.
 * 
 * @method
 * @see {es.DocumentModelNode.prototype.setRoot}
 * @param {es.DocumentModelNode} root Node to use as root
 */
es.DocumentModelBranchNode.prototype.setRoot = function( root ) {
	this.root = root;
	for ( var i = 0; i < this.children.length; i++ ) {
		this.children[i].setRoot( root );
	}
};

/**
 * Clears the root node from this and all of it's children.
 * 
 * @method
 * @see {es.DocumentModelNode.prototype.clearRoot}
 */
es.DocumentModelBranchNode.prototype.clearRoot = function() {
	this.root = null;
	for ( var i = 0; i < this.children.length; i++ ) {
		this.children[i].clearRoot();
	}
};

/* Inheritance */

es.extendClass( es.DocumentModelBranchNode, es.DocumentBranchNode );
es.extendClass( es.DocumentModelBranchNode, es.DocumentModelNode );
