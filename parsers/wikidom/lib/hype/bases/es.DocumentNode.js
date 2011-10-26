/**
 * Creates an es.DocumentNode object.
 */
es.DocumentNode = function( nodes ) {
	if ( nodes === undefined ) {
		nodes = [];
	}
	$.extend( nodes, this );
	return nodes;
};

/**
 * Gets the range within this node that a given child node covers.
 * 
 * @method
 * @param {es.ModelNode} node
 */
es.DocumentNode.prototype.getRangeFromNode = function( node ) {
	if ( this.length ) {
		var i = 0,
			length = this.length,
			left = 0;
		while ( i < length ) {
			if ( this[i] === node ) {
				return new es.Range( left, left + this[i].getElementLength() );
			}
			left += this[i].getElementLength() + 1;
			i++;
		}
	}
	return null;
};

/**
 * Gets the first offset within this node of a given child node.
 * 
 * @method
 * @param {es.ModelNode} node
 */
es.DocumentNode.prototype.getOffsetFromNode = function( node ) {
	if ( this.length ) {
		var offset = 0;
		for( var i = 0; i < this.length; i++ ) {
			if ( this[i] === node ) {
				return offset;
			}
			offset += this[i].getElementLength() + 1;
		}
	}
	return null;
};

/**
 * Gets the node which a given offset is within.
 * 
 * @method
 * @param {Integer} offset
 */
es.DocumentNode.prototype.getNodeFromOffset = function( offset ) {
	if ( this.length ) {
		var i = 0,
			length = this.length,
			left = 0,
			right;
		while ( i < length ) {
			right = left + this[i].getElementLength() + 1;
			if ( offset >= left && offset < right ) {
				return this[i];
			}
			left = right;
			i++;
		}
	}
	return null;
};

/**
 * Gets a list of nodes and their sub-ranges which are covered by a given range.
 * 
 * @method
 * @param {es.Range} range Range to select nodes within
 * @param {Boolean} [off] Whether to include a list of nodes that are not covered by the range
 * @returns {Object} Object with 'on' and 'off' properties, 'on' being a list of objects with 'node'
 * and 'range' properties describing nodes which are covered by the range and the range within the
 * node that is covered, and 'off' being a list of nodes that are not covered by the range
 */
es.DocumentNode.prototype.selectNodes = function( range, off ) {
	range.normalize();
	var	result = { 'on': [], 'off': [] };
	for ( var i = 0, length = this.length, left = 0, right; i < length; i++ ) {
		right = left + this[i].getElementLength() + 1;
		if ( range.start >= left && range.start < right ) {
			if ( range.end < right ) {
				result.on.push( {
					'node': this[i],
					'range': new es.Range( range.start - left, range.end - left )
				} );
				if ( !off ) {
					break;
				}
			} else {
				result.on.push( {
					'node': this[i],
					'range': new es.Range( range.start - left, right - left - 1 )
				} );	
			}
		} else if ( range.end >= left && range.end < right ) {
			result.on.push( {
				'node': this[i],
				'range': new es.Range( 0, range.end - left )
			} );
			if ( !off ) {
				break;
			}
		} else if ( left >= range.start && right <= range.end ) {
			result.on.push( {
				'node': this[i],
				'range': new es.Range( 0, right - left - 1 )
			} );
		} else if( off ) {
			result.off.push( this[i] );
		}
		left = right;
	}
	return result;
};
