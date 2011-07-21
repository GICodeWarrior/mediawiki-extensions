/**
 * 
 * @extends {es.EventEmitter}
 * @param blocks {Array} List of blocks
 * @returns {es.Document}
 */
es.Document = function( blocks ) {
	es.Container.call( this, blocks, 'document', 'blocks' );
	this.width = null;
}

es.Document.prototype.renderBlocks = function() {
	// Bypass rendering when width has not changed
	var width = this.$.innerWidth();
	if ( this.width === width ) {
		return;
	}
	this.width = width;
	// Render blocks
	for ( var i = 0; i < this.blocks.length; i++ ) {
		this.blocks[i].renderContent();
	}
};

es.extend( es.Document, es.Container );
