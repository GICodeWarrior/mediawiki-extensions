/**
 * Ordered collection of blocks.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param blocks {Array} List of blocks
 * @property blocks {Array}
 * @property width {Integer}
 */
es.Document = function( blocks ) {
	es.Container.call( this, 'document', 'blocks', blocks );
	this.width = null;
}

/* Static Methods */

es.Document.newFromWikiDomDocument = function( wikidomBlocks ) {
	var blocks = [];
	var block;
	for ( var i = 0; i < wikidomBlocks.length; i++ ) {
		block = es.Block.newFromWikiDomBlock( wikidomBlocks[i] );
		if ( block ) {
			blocks.push( block );
		}
	}
	return new es.Document( blocks );
}

/* Methods */

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

/* Inheritance */

es.extend( es.Document, es.Container );
