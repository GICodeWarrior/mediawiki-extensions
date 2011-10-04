/**
 * Creates an es.DocumentModelNode object.
 * 
 * es.DocumentModelNode is a simple wrapper around es.ModelNode, which adds functionality for model
 * nodes to be used as nodes in a space partitioning tree.
 * 
 * @class
 * @constructor
 * @param {Integer|Array} contents Either Length of content or array of child nodes to append
 * @property {Integer} contentLength Length of content
 */
es.DocumentModelNode = function( contents ) {
	// Extension
	var node = $.extend( new es.ModelNode( $.isArray( contents ) ? contents : [] ), this );
	
	// Observe add and remove operations to keep lengths up to date
	node.addListenerMethods( node, {
		'beforePush': 'onBeforePush',
		'beforeUnshift': 'onBeforeUnshift',
		'beforePop': 'onBeforePop',
		'beforeShift': 'onBeforeShift',
		'beforeSplice': 'onBeforeSplice'
	} );
	
	// Properties
	if ( typeof contents === 'number' ) {
		if ( contents < 0 ) {
			throw 'Invalid content length error. Content length can not be less than 0.';
		}
		node.contentLength = contents;
	} else {
		node.contentLength = 0;
		// If contents was an array, some items were added, which we need to account for
		if ( this.length ) {
			for ( var i = 0; i < this.length; i++ ) {
				node.contentLength += this[i].getElementLength();
			}
		}
	}
	
	return node;
};

/* Methods */

es.DocumentModelNode.prototype.onBeforePush = function( childModel ) {
	this.adjustContentLength( childModel.getElementLength() );
};

es.DocumentModelNode.prototype.onBeforeUnshift = function( childModel ) {
	this.adjustContentLength( childModel.getElementLength() );
};

es.DocumentModelNode.prototype.onBeforePop = function() {
	this.adjustContentLength( -this[this.length - 1].getElementLength() );
};

es.DocumentModelNode.prototype.onBeforeShift = function() {
	this.adjustContentLength( -this[0].getElementLength() );
};

es.DocumentModelNode.prototype.onBeforeSplice = function( index, howmany ) {
	var diff = 0,
		removed = this.slice( index, index + howmany ),
		added = Array.prototype.slice.call( arguments, 2 );
	for ( var i = 0; i < removed.length; i++ ) {
		diff -= removed[i].getElementLength();
	}
	for ( var i = 0; i < added.length; i++ ) {
		diff += added[i].getElementLength();
	}
	this.adjustContentLength( diff );
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
es.DocumentModelNode.prototype.adjustContentLength = function( adjustment ) {
	this.contentLength += adjustment;
	// Make sure the adjustment was sane
	if ( this.contentLength < 0 ) {
		// Reverse the adjustment
		this.contentLength -= adjustment;
		// Complain about it
		throw 'Invalid adjustment error. Content length can not be less than 0.';
	}
	if ( this.parent ) {
		this.parent.adjustContentLength( adjustment );
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
 * @returns {Integer} Length of element
 */
es.DocumentModelNode.prototype.getElementLength = function() {
	return this.contentLength + 2;
};
