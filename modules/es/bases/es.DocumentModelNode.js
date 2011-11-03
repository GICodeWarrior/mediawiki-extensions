/**
 * Creates an es.DocumentModelNode object.
 * 
 * @class
 * @abstract
 * @constructor
 * @extends {es.EventEmitter}
 * @param {String} type Symbolic name of node type
 * @param {Integer|Array} contents Either Length of content or array of child nodes to append
 * @property {Integer} contentLength Length of content
 */
es.DocumentModelNode = function( type, element, length ) {
	// Inheritance
	es.EventEmitter.call( this );

	// Reusable function for passing update events upstream
	var _this = this;
	this.emitUpdate = function() {
		_this.emit( 'update' );
	};

	// Properties
	this.type = type;
	this.parent = null;
	this.root = this;
	this.element = element || null;
	this.contentLength = length;
};

/* Abstract Methods */

/**
 * Creates a view for this node.
 * 
 * @abstract
 * @method
 * @returns {es.DocumentViewNode} New item view associated with this model
 */
es.DocumentModelNode.prototype.createView = function() {
	throw 'DocumentModelNode.createView not implemented in this subclass:' + this.constructor;
};

/**
 * Gets a plain object representation of the document's data.
 * 
 * The resulting object is compatible with es.DocumentModel.newFromPlainObject.
 * 
 * @method
 * @returns {Object} Plain object representation
 */
es.DocumentModelNode.prototype.getPlainObject = function() {
	throw 'DocumentModelNode.getPlainObject not implemented in this subclass:' + this.constructor;
};

/* Methods */

/**
 * Gets a reference to this node's parent.
 * 
 * @method
 * @returns {es.DocumentModelNode} Reference to this node's parent
 */
es.DocumentModelNode.prototype.getParent = function() {
	return this.parent;
};

/**
 * Gets the root node in the tree this node is currently attached to.
 * 
 * @method
 * @returns {es.DocumentModelNode} Root node
 */
es.DocumentModelNode.prototype.getRoot = function() {
	return this.root;
};

/**
 * Sets the root node to this and all of it's children.
 * 
 * This method is overridden by nodes with children.
 * 
 * @method
 * @param {es.DocumentModelNode} root Node to use as root
 */
es.DocumentModelNode.prototype.setRoot = function( root ) {
	this.root = root;
};

/**
 * Clears the root node from this and all of it's children.
 * 
 * This method is overridden by nodes with children.
 * 
 * @method
 */
es.DocumentModelNode.prototype.clearRoot = function() {
	this.root = null;
};

/**
 * Attaches this node to another as a child.
 * 
 * @method
 * @param {es.DocumentModelNode} parent Node to attach to
 * @emits attach (parent)
 */
es.DocumentModelNode.prototype.attach = function( parent ) {
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
es.DocumentModelNode.prototype.detach = function() {
	this.emit( 'beforeDetach' );
	this.parent = null;
	this.clearRoot();
	this.emit( 'afterDetach' );
};

/**
 * Sets the content length.
 * 
 * @method
 * @param {Integer} contentLength Length of content
 * @throws Invalid content length error if contentLength is less than 0
 */
es.DocumentModelNode.prototype.setContentLength = function( contentLength ) {
	if ( contentLength < 0 ) {
		throw 'Invalid content length error. Content length can not be less than 0.';
	}
	var diff = contentLength - this.contentLength;
	this.contentLength = contentLength;
	if ( this.parent ) {
		this.parent.adjustContentLength( diff );
	}
};

/**
 * Adjust the content length.
 * 
 * @method
 * @param {Integer} adjustment Amount to adjust content length by
 * @throws Invalid adjustment error if resulting length is less than 0
 */
es.DocumentModelNode.prototype.adjustContentLength = function( adjustment, quiet ) {
	this.contentLength += adjustment;
	// Make sure the adjustment was sane
	if ( this.contentLength < 0 ) {
		// Reverse the adjustment
		this.contentLength -= adjustment;
		// Complain about it
		throw 'Invalid adjustment error. Content length can not be less than 0.';
	}
	if ( this.parent ) {
		this.parent.adjustContentLength( adjustment, true );
	}
	if ( !quiet ) {
		this.emit( 'update' );
	}
};

/**
 * Gets the content length.
 * 
 * @method
 * @returns {Integer} Length of content
 */
es.DocumentModelNode.prototype.getContentLength = function() {
	return this.contentLength;
};

/**
 * Gets the element length.
 * 
 * @method
 * @returns {Integer} Length of content
 */
es.DocumentModelNode.prototype.getElementLength = function() {
	return this.contentLength + 2;
};

/**
 * Gets the element object.
 * 
 * @method
 * @returns {Object} Element object in linear data model
 */
es.DocumentModelNode.prototype.getElement = function() {
	return this.element;
};

/**
 * Gets the symbolic element type name.
 * 
 * @method
 * @returns {String} Symbolic name of element type
 */
es.DocumentModelNode.prototype.getElementType = function() {
	return this.element.type;
};

/**
 * Gets an element attribute value.
 * 
 * @method
 * @returns {Mixed} Value of attribute, or null if no such attribute exists
 */
es.DocumentModelNode.prototype.getElementAttribute = function( key ) {
	if ( this.element && this.element.attributes && key in this.element.attributes ) {
		return this.element.attributes[key];
	}
	return null;
};

/* Inheritance */

es.extendClass( es.DocumentModelNode, es.EventEmitter );
