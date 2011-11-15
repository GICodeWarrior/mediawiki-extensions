/**
 * Creates an es.DocumentBranchNode object.
 * 
 * @class
 * @abstract
 * @constructor
 * @param {es.DocumentNode[]} nodes List of document nodes to add
 */
es.DocumentBranchNode = function( nodes ) {
	this.children = es.isArray( nodes ) ? nodes : [];
};

/* Methods */

/**
 * Checks if this node has child nodes.
 * 
 * @method
 * @see {es.DocumentNode.prototype.hasChildren}
 * @returns {Boolean} Whether this node has children
 */
es.DocumentBranchNode.prototype.hasChildren = function() {
	return true;
};

/**
 * Gets a list of child nodes.
 * 
 * @abstract
 * @method
 * @returns {es.DocumentNode[]} List of document nodes
 */
es.DocumentBranchNode.prototype.getChildren = function() {
	return this.children;
};

/**
 * Gets the index of a given child node.
 * 
 * @method
 * @param {es.DocumentModelNode} node Child node to find index of
 * @returns {Integer} Index of child node or -1 if node was not found
 */
es.DocumentBranchNode.prototype.indexOf = function( node ) {
	return es.inArray( node, this.children );
};

/**
 * Traverse leaf nodes depth first.
 * 
 * Callback functions are expected to accept a node and index argument. If a callback returns false,
 * iteration will stop.
 * 
 * @param {Function} callback Function to execute for each leaf node
 * @param {es.DocumentNode} [from] Node to start at. Must be a descendant of this node
 * @param {Boolean} [reverse] Whether to iterate backwards
 */
es.DocumentBranchNode.prototype.traverseLeafNodes = function( callback, from, reverse ) {
		// Stack of indices that lead from this to node
	var	indexStack = [],
		// Node whose children we're currently traversing
		node = this,
		// Index of the child node we're currently visiting
		index = reverse ? node.children.length - 1 : 0,
		// Shortcut for node.children[index]
		childNode,
		// Result of the last invocation of the callback
		callbackResult,
		// Variables for the loop that builds indexStack if from is specified
		n, p, i;
	
	if ( from !== undefined ) {
		// Reverse-engineer the index stack by starting at from and
		// working our way up until we reach this
		n = from;
		while ( n !== this ) {
			p = n.getParent();
			if ( !p ) {
				// n is a root node and we haven't reached this
				// That means from isn't a descendant of this
				throw "from parameter passed to traverseLeafNodes() must be a descendant";
			}
			// Find the index of n in p
			i = p.getChildren().indexOf( n );
			if ( i === -1 ) {
				// This isn't supposed to be possible
				throw "Tree corruption detected: node isn't in its parent's children array";
			}
			indexStack.push( i );
			// Move up
			n = p;
		}
		// We've built the indexStack in reverse order, so reverse it
		indexStack = indexStack.reverse();
		
		// Set up the variables such that from will be visited next
		index = indexStack.pop();
		node = from.getParent(); // from is a descendant of this so its parent exists
		
		// If we're going in reverse, then we still need to visit from if it's
		// a leaf node, but we should not descend into it
		// So if from is not a leaf node, skip it now
		if ( reverse && from.hasChildren() ) {
			index--;
		}
	}
	
	while ( true ) {
		childNode = node.children[index];
		if ( childNode === undefined ) {
			if ( indexStack.length > 0 ) {
				// We're done traversing the current node, move back out of it
				node = node.getParent();
				index = indexStack.pop();
				// Move to the next child
				reverse ? index-- : index++;
				continue;
			} else {
				// We can't move up any more, so we're done
				return;
			}
		}
		
		if ( childNode.hasChildren() ) {
			// Descend into this node
			node = childNode;
			// Push our current index onto the stack
			indexStack.push( index );
			// Set the current index to the first element we're visiting
			index = reverse ? node.children.length - 1 : 0;
		} else {
			// This is a leaf node, visit it
			callbackResult = callback( childNode ); // TODO what is index?
			if ( callbackResult === false ) {
				// The callback is telling us to stop
				return;
			}
			// Move to the next child
			reverse ? index-- : index++;
		}
	}
};

/**
 * Gets the range within this node that a given child node covers.
 * 
 * @method
 * @param {es.ModelNode} node Node to get range for
 * @param {Boolean} [shallow] Do not iterate into child nodes of child nodes
 * @returns {es.Range|null} Range of node or null if node was not found
 */
es.DocumentBranchNode.prototype.getRangeFromNode = function( node, shallow ) {
	if ( this.children.length ) {
		var childNode;
		for ( var i = 0, length = this.children.length, left = 0; i < length; i++ ) {
			childNode = this.children[i];
			if ( childNode === node ) {
				return new es.Range( left, left + childNode.getElementLength() );
			}
			if ( !shallow && childNode.hasChildren() && childNode.getChildren().length ) {
				var range = childNode.getRangeFromNode( node );
				if ( range !== null ) {
					// Include opening of parent
					left++;
					return es.Range.newFromTranslatedRange( range, left );
				}
			}
			left += childNode.getElementLength();
		}
	}
	return null;
};

/**
 * Gets the content offset of a node.
 * 
 * This method is pretty expensive. If you need to get different slices of the same content, get
 * the content first, then slice it up locally.
 * 
 * TODO: Rewrite this method to not use recursion, because the function call overhead is expensive
 * 
 * @method
 * @param {es.DocumentNode} node Node to get offset of
 * @param {Boolean} [shallow] Do not iterate into child nodes of child nodes
 * @returns {Integer} Offset of node or -1 of node was not found
 */
es.DocumentBranchNode.prototype.getOffsetFromNode = function( node, shallow ) {
	if ( node === this ) {
		return 0;
	}
	if ( this.children.length ) {
		var offset = 0,
			childNode;
		for ( var i = 0, length = this.children.length; i < length; i++ ) {
			childNode = this.children[i];
			if ( childNode === node ) {
				return offset;
			}
			if ( !shallow && childNode.hasChildren() && childNode.getChildren().length ) {
				var childOffset = this.getOffsetFromNode.call( childNode, node );
				if ( childOffset !== -1 ) {
					return offset + 1 + childOffset;
				}
			}
			offset += childNode.getElementLength();
		}
	}
	return -1;
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
 * @param {Integer} offset Offset get node for
 * @param {Boolean} [shallow] Do not iterate into child nodes of child nodes
 * @returns {es.DocumentNode|null} Node at offset, or null if non was found
 */
es.DocumentBranchNode.prototype.getNodeFromOffset = function( offset, shallow ) {
	if ( offset === 0 ) {
		return this;
	}
	// TODO a lot of logic is duplicated in selectNodes(), abstract that into a traverser or something
	if ( this.children.length ) {
		var nodeOffset = 0,
			nodeLength,
			childNode;
		for ( var i = 0, length = this.children.length; i < length; i++ ) {
			childNode = this.children[i];
			if ( offset == nodeOffset ) {
				// The requested offset is right before childNode,
				// so it's not inside any of this's children, but inside this
				return this;
			}
			nodeLength = childNode.getElementLength();
			if ( offset >= nodeOffset && offset < nodeOffset + nodeLength ) {
				if ( !shallow && childNode.hasChildren() && childNode.getChildren().length ) {
					return this.getNodeFromOffset.call( childNode, offset - nodeOffset - 1 );
				} else {
					return childNode;
				}
			}
			nodeOffset += nodeLength;
		}
		if ( offset == nodeOffset ) {
			// The requested offset is right before this.children[i],
			// so it's not inside any of this's children, but inside this
			return this;
		}
	}
	return null;
};

/**
 * Gets a list of nodes and their sub-ranges which are covered by a given range.
 * 
 * @method
 * @param {es.Range} range Range to select nodes within
 * @param {Boolean} [shallow] Do not recurse into child nodes of child nodes
 * @returns {Array} List of objects with 'node', 'range' and 'globalRange' properties describing nodes which are
 * covered by the range and the range within the node that is covered
 */
es.DocumentBranchNode.prototype.selectNodes = function( range, shallow ) {
	if ( typeof range === 'undefined' ) {
		range = new es.Range( 0, this.model.getContentLength() );
	} else {
		range.normalize();
	}
	var nodes = [],
		i,
		j,
		left,
		right,
		start = range.start,
		end = range.end,
		startInside,
		endInside,
		childNode;
	
	if ( start < 0 ) {
		throw 'The start offset of the range is negative';
	}
	
	if ( this.children.length === 0 ) {
		// Special case: this node doesn't have any children
		// The return value is simply the range itself, if it is not out of bounds
		if ( end > this.getContentLength() ) {
			throw 'The end offset of the range is past the end of the node';
		}
		return [{ 'node': this, 'range': new es.Range( start, end ), 'globalRange': new es.Range( start, end ) }];
	}
	
	// This node has children, loop over them
	left = 1; // First offset inside the first child. Offset 0 is before the first child
	for ( i = 0; i < this.children.length; i++ ) {
		childNode = this.children[i];
		// left <= any offset inside childNode <= right
		right = left + childNode.getContentLength();
		
		if ( start == end && ( start == left - 1 || start == right + 1 ) ) {
			// Empty range outside of any node
			return [];
		}
		
		startInside = start >= left && start <= right; // is the start inside childNode?
		endInside = end >= left && end <= right; // is the end inside childNode?
		
		if ( startInside && endInside ) {
			// The range is entirely inside childNode
			if ( shallow || !childNode.children ) {
				// For leaf nodes, use the same behavior as for shallow calls.
				// A proper recursive function would let the recursion handle this,
				// but the leaves don't have .selectNodes() because they're not DocumentBranchNodes
				// FIXME get rid of this crazy branch-specificity
				// TODO should probably rewrite this recursive function as an iterative function anyway, probably faster
				nodes = [
					{
						'node': childNode,
						'range': new es.Range( start - left, end - left ),
						'globalRange': new es.Range( start, end )
					}
				];
			} else {
				// Recurse into childNode
				nodes = childNode.selectNodes( new es.Range( start - left, end - left ) );
				// Adjust globalRange
				for ( j = 0; j < nodes.length; j++ ) {
					if ( nodes[j].globalRange !== undefined ) {
						nodes[j].globalRange = es.Range.newFromTranslatedRange( nodes[j].globalRange, left );
					}
				}
			}
			// Since the start and end are both inside childNode, we know for sure that we're
			// done, so return
			return nodes;
		} else if ( startInside ) {
			// The start is inside childNode but the end isn't
			// Add a range from the start of the range to the end of childNode
			nodes.push( {
				'node': childNode,
				'range': new es.Range( start - left, right - left ),
				'globalRange': new es.Range( start, right )
			} );
		} else if ( endInside ) {
			// The end is inside childNode but the start isn't
			// Add a range from the start of childNode to the end of the range
			nodes.push( {
				'node': childNode,
				'range': new es.Range( 0, end - left ),
				'globalRange': new es.Range( left, end )
			} );
			// We've found the end, so we're done
			return nodes;
		} else if ( end == right + 1 ) {
			// end is between childNode and this.children[i+1]
			// start is not inside childNode, so the selection covers
			// all of childNode, then ends
			nodes.push( { 'node': childNode } );
			// We've reached the end so we're done
			return nodes;
		} else if ( start == left - 1 ) {
			// start is between this.children[i-1] and childNode
			// end is not inside childNode, so the selection covers
			// all of childNode and more
			nodes.push( { 'node': childNode } );
		} else if ( nodes.length > 0 ) {
			// Neither the start nor the end is inside childNode, but nodes is non-empty,
			// so childNode must be between the start and the end
			// Add the entire node, so no range property
			nodes.push( { 'node': childNode } );
		}
		
		// Move left to the start of this.children[i+1] for the next iteration
		// We use +2 because we need to jump over the offset between childNode and
		// this.children[i+1]
		left = right + 2;
		if ( end < left ) {
			// We've skipped over the end, so we're done
			return nodes;
		}
	}
	
	// If we got here, that means that at least some part of the range is out of bounds
	// This is an error
	if ( start > right + 1 ) {
		throw 'The start offset of the range is past the end of the node';
	} else {
		// Apparently the start was inside this node, but the end wasn't
		throw 'The end offset of the range is past the end of the node';
	}
	return nodes;
};
