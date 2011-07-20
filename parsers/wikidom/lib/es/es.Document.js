/**
 * 
 * @extends {es.EventEmitter}
 * @param blocks {Array} List of blocks
 * @returns {es.Document}
 */
es.Document = function( blocks ) {
	es.EventEmitter.call( this );
	this.blocks = [];
	var i;
	for( i = 0; i < blocks.length; i++ ) {
		this.appendBlock(blocks[i]);
	}
	this.width = null;
	this.$ = $( '<div class="editSurface-document"></div>' )
		.data( 'document', this );
}

/**
 * Gets the first block in the document.
 * 
 * @returns {es.Block}
 */
es.Document.prototype.firstBlock = function() {
	return this.blocks.length ? this.blocks[0] : null;
};

/**
 * Gets the last block in the document.
 * 
 * @returns {es.Block}
 */
es.Document.prototype.lastBlock = function() {
	return this.blocks.length ? this.blocks[this.blocks.length - 1] : null;
};

/**
 * Adds a block to the end of the document.
 * 
 * @param {es.Block} Block to append
 */
es.Document.prototype.appendBlock = function( block ) {
	block.document = this;
	block.on( 'update', function() {
		block.document.emit( 'update' );
	} );
	this.blocks.push( block );
};

/**
 * Adds a block to the beginning of the document.
 * 
 * @param {es.Block} Block to prepend
 */
es.Document.prototype.prependBlock = function( block ) {
	block.document = this;
	block.on( 'update', function() {
		block.document.emit( 'update' );
	} );
	this.blocks.unshift( block );
};

/**
 * Adds a block to the document after an existing block.
 * 
 * @param block {es.Block} Block to insert
 * @param before {es.Block} Block to insert before, if null then block will be inserted at the end
 */
es.Document.prototype.insertBlockBefore = function( block, before ) {
	block.document = this;
	block.on( 'update', function() {
		block.document.emit( 'update' );
	} );
	if ( before ) {
		this.blocks.splice( before.getIndex(), 0, block );
	} else {
		this.blocks.push( block );
	}
};
/**
 * Adds a block to the document after an existing block.
 * @param block {es.Block} Block to insert
 * @param after {es.Block} Block to insert after, if null then block will be inserted at the end
 */
es.Document.prototype.insertBlockAfter = function( block, after ) {
	block.document = this;
	block.on( 'update', function() {
		block.document.emit( 'update' );
	} );
	if ( after ) {
		this.blocks.splice( after.getIndex() + 1, 0, block );
	} else {
		this.blocks.push( block );
	}
};

/**
 * Removes a block from the document.
 * 
 * @param {es.Block} Block to remove
 */
es.Document.prototype.removeBlock = function( block ) {
	block.removeAllListeners( 'update' );
	this.blocks.splice( block.getIndex(), 1 );
	block.document = null;
	block.$.detach();
	this.emit( 'update' );
};

es.Document.prototype.renderBlocks = function( offset ) {
	// Remember width, to avoid updates when without width changes
	this.width = this.$.innerWidth();
	// Render blocks
	var i;
	for ( i = 0; i < this.blocks.length; i++ ) {
		this.$.append( this.blocks[i].$ );
		this.blocks[i].renderContent( offset );
	}
};

es.Document.prototype.updateBlocks = function( offset ) {
	// Bypass rendering when width has not changed
	var width = this.$.innerWidth();
	if ( this.width === width ) {
		return;
	}
	this.width = width;
	// Render blocks
	var doc;
	this.$.children( '.editSurface-block' ).each( function( i ) {
		$(this).data( 'block' ).renderContent( offset );
	} );
};

es.extend( es.Document, es.EventEmitter );
