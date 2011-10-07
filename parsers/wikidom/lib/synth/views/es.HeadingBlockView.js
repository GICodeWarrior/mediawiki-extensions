es.HeadingBlockView = function( model ) {
	es.BlockView.call( this, model, $('<h' + model.level +'/>') );
	this.$.addClass( 'editSurface-headingBlock' );
	this.contentView = new es.ContentView( this.$, this.model.content );
	var view = this;
	this.contentView.on( 'update', function() {
		view.emit('update');
	} );
};

/* Methods */

es.HeadingBlockView.prototype.renderContent = function() {
	this.contentView.render();
};

es.HeadingBlockView.prototype.drawSelection = function( range ) {
	this.contentView.drawSelection( range );
};

es.HeadingBlockView.prototype.clearSelection = function( range ) {
	this.contentView.clearSelection();
};

es.HeadingBlockView.prototype.getLength = function() {
	return this.model.getContentLength();
};

es.HeadingBlockView.prototype.getOffsetFromPosition = function( position ) {
	return this.contentView.getOffset( position );
};

/**                                                                        
 * Gets rendered position of offset within content.                        
 *                                                                         
 * @method                                                                 
 * @param offset {Integer} Offset to get position for                      
 * @returns {es.Position} Position of offset                               
 */                                                                        
es.HeadingBlockView.prototype.getRenderedPosition = function( offset ) { 
	var	position = this.contentView.getPosition( offset ),                 
		offset = this.$.offset();                                          
                                                                           
	position.top += offset.top;                                            
	position.left += offset.left;                                          
	position.bottom += offset.top;                                         
	return position;                                                       
};                                                                         

/* Inheritance */

es.extend( es.HeadingBlockView, es.BlockView );
