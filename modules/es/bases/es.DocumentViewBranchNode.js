/**
 * Creates an es.DocumentViewBranchNode object.
 * 
 * @class
 * @abstract
 * @constructor
 * @extends {es.DocumentBranchNode}
 * @extends {es.DocumentViewNode}
 * @param model {es.ModelNode} Model to observe
 * @param {jQuery} [$element] Element to use as a container
 */
es.DocumentViewBranchNode = function( model, $element, horizontal ) {
	// Inheritance
	es.DocumentBranchNode.call( this );
	es.DocumentViewNode.call( this, model, $element );

	// Properties
	this.horizontal = horizontal || false;

	if ( model ) {
		// Append existing model children
		var childModels = model.getChildren();
		for ( var i = 0; i < childModels.length; i++ ) {
			this.onAfterPush( childModels[i] );
		}

		// Observe and mimic changes on model
		this.model.addListenerMethods( this, {
			'afterPush': 'onAfterPush',
			'afterUnshift': 'onAfterUnshift',
			'afterPop': 'onAfterPop',
			'afterShift': 'onAfterShift',
			'afterSplice': 'onAfterSplice',
			'afterSort': 'onAfterSort',
			'afterReverse': 'onAfterReverse'
		} );
	}
};

/* Methods */

es.DocumentViewBranchNode.prototype.onAfterPush = function( childModel ) {
	var childView = childModel.createView();
	this.emit( 'beforePush', childView );
	childView.attach( this );
	childView.on( 'update', this.emitUpdate );
	// Update children
	this.children.push( childView );
	// Update DOM
	this.$.append( childView.$ );
	// TODO: adding and deleting classes has to be implemented for unshift, shift, splice, sort
	// and reverse as well
	if ( this.children.length === 1 ) {
		childView.$.addClass('es-viewBranchNode-firstChild');
	}
	this.emit( 'afterPush', childView );
	this.emit( 'update' );
	this.renderContent();
};

es.DocumentViewBranchNode.prototype.onAfterUnshift = function( childModel ) {
	var childView = childModel.createView();
	this.emit( 'beforeUnshift', childView );
	childView.attach( this );
	childView.on( 'update', this.emitUpdate );
	// Update children
	this.children.unshift( childView );
	// Update DOM
	this.$.prepend( childView.$ );
	this.emit( 'afterUnshift', childView );
	this.emit( 'update' );
	childView.renderContent();
};

es.DocumentViewBranchNode.prototype.onAfterPop = function() {
	this.emit( 'beforePop' );
	// Update children
	var childView = this.children.pop();
	childView.detach();
	childView.removeEventListener( 'update', this.emitUpdate );
	// Update DOM
	childView.$.detach();
	this.emit( 'afterPop' );
	this.emit( 'update' );
};

es.DocumentViewBranchNode.prototype.onAfterShift = function() {
	this.emit( 'beforeShift' );
	// Update children
	var childView = this.children.shift();
	childView.detach();
	childView.removeEventListener( 'update', this.emitUpdate );
	// Update DOM
	childView.$.detach();
	this.emit( 'afterShift' );
	this.emit( 'update' );
};

es.DocumentViewBranchNode.prototype.onAfterSplice = function( index, howmany ) {
	var i,
		length,
		args = Array.prototype.slice.call( arguments, 0 );
	// Convert models to views and attach them to this node
	if ( args.length >= 3 ) {
		for ( i = 2, length = args.length; i < length; i++ ) {
			args[i] = args[i].createView();
		}
	}
	this.emit.apply( this, ['beforeSplice'].concat( args ) );
	var removals = this.children.splice.apply( this.children, args );
	for ( i = 0, length = removals.length; i < length; i++ ) {
		removals[i].detach();
		removals[i].removeListener( 'update', this.emitUpdate );
		// Update DOM
		removals[i].$.detach();
	}
	if ( args.length >= 3 ) {
		var $target;
		if ( index ) {
			// Get the element before the insertion point
			$anchor = this.$.children().eq( index - 1 );
		}
		for ( i = args.length - 1; i >= 2; i-- ) {
			args[i].attach( this );
			args[i].on( 'update', this.emitUpdate );
			if ( index ) {
				$anchor.after( args[i].$ );
			} else {
				this.$.prepend( args[i].$ );
			}
		}
	}
	this.emit.apply( this, ['afterSplice'].concat( args ) );
	if ( args.length >= 3 ) {
		for ( i = 2, length = args.length; i < length; i++ ) {
			args[i] = args[i].renderContent();
		}
	}
};

es.DocumentViewBranchNode.prototype.onAfterSort = function() {
	this.emit( 'beforeSort' );
	var childModels = this.model.getChildren();
	for ( var i = 0; i < childModels.length; i++ ) {
		for ( var j = 0; j < this.children.length; j++ ) {
			if ( this.children[j].getModel() === childModels[i] ) {
				var childView = this.children[j];
				// Update children
				this.children.splice( j, 1 );
				this.children.push( childView );
				// Update DOM
				this.$.append( childView.$ );
			}
		}
	}
	this.emit( 'afterSort' );
	this.emit( 'update' );
	this.renderContent();
};

es.DocumentViewBranchNode.prototype.onAfterReverse = function() {
	this.emit( 'beforeReverse' );
	// Update children
	this.reverse();
	// Update DOM
	this.$.children().each( function() {
		$(this).prependTo( $(this).parent() );
	} );
	this.emit( 'afterReverse' );
	this.emit( 'update' );
	this.renderContent();
};

/**
 * Render content.
 * 
 * @method
 */
es.DocumentViewBranchNode.prototype.renderContent = function() {
	for ( var i = 0; i < this.children.length; i++ ) {
		this.children[i].renderContent();
	}
};

/**
 * Draw selection around a given range.
 * 
 * @method
 * @param {es.Range} range Range of content to draw selection around
 */
es.DocumentViewBranchNode.prototype.drawSelection = function( range ) {
	var selectedNodes = this.selectNodes( range, true );
	for ( var i = 0; i < this.children.length; i++ ) {
		if ( selectedNodes.length && this.children[i] === selectedNodes[0].node ) {
			for ( var j = 0; j < selectedNodes.length; j++ ) {
				selectedNodes[j].node.drawSelection( selectedNodes[j].range );
			}
			i += selectedNodes.length - 1;
		} else {
			this.children[i].clearSelection();
		}
	}
};

/**
 * Clear selection.
 * 
 * @method
 */
es.DocumentViewBranchNode.prototype.clearSelection = function() {
	for ( var i = 0; i < this.children.length; i++ ) {
		this.children[i].clearSelection();
	}
};

/**
 * Gets the nearest offset of a rendered position.
 * 
 * @method
 * @param {es.Position} position Position to get offset for
 * @returns {Integer} Offset of position
 */
es.DocumentViewBranchNode.prototype.getOffsetFromRenderedPosition = function( position ) {
	if ( this.children.length === 0 ) {
		return 0;
	}
	var node = this.children[0];
	for ( var i = 1; i < this.children.length; i++ ) {
		if ( this.horizontal && this.children[i].$.offset().left > position.left ) {
			break;
		} else if ( !this.horizontal && this.children[i].$.offset().top > position.top ) {
			break;			
		}
		node = this.children[i];
	}
	return node.getParent().getOffsetFromNode( node, true ) +
		node.getOffsetFromRenderedPosition( position ) + 1;
};

/**
 * Gets rendered position of offset within content.
 * 
 * @method
 * @param {Integer} offset Offset to get position for
 * @returns {es.Position} Position of offset
 */
es.DocumentViewBranchNode.prototype.getRenderedPositionFromOffset = function( offset, leftBias ) {
	var node = this.getNodeFromOffset( offset, true );
	if ( node !== null ) {
		return node.getRenderedPositionFromOffset(
			offset - this.getOffsetFromNode( node, true ) - 1,
			leftBias
		);
	}
	return null;
};

es.DocumentViewBranchNode.prototype.getRenderedLineRangeFromOffset = function( offset ) {
	var node = this.getNodeFromOffset( offset, true );
	if ( node !== null ) {
		var nodeOffset = this.getOffsetFromNode( node, true );
		return es.Range.newFromTranslatedRange(
			node.getRenderedLineRangeFromOffset( offset - nodeOffset - 1 ),
			nodeOffset + 1
		);
	}
	return null;
};

/* Inheritance */

es.extendClass( es.DocumentViewBranchNode, es.DocumentBranchNode );
es.extendClass( es.DocumentViewBranchNode, es.DocumentViewNode );
