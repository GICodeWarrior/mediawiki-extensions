/**
 * Creates a list block item.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param content {es.Content}
 * @param style {String}
 * @param level {Integer}
 */
es.ListBlockItem = function( content, style, level ) {
	es.EventEmitter.call( this );

	this.content = content || new es.Content();
	this.$icon = $( '<div class="editSurface-listItem-icon"></div>' );
	this.$content = $( '<div class="editSurface-listItem-content"></div>' );
	this.$ = $( '<div class="editSurface-listItem"></div>' )
		.append( this.$icon )
		.append( this.$content );
	this.setStyle( style );
	this.setLevel( level );
	this.flow = new es.ContentFlow( this.$content, this.content );
	// Listen to render events and trigger update event upstream
	var listBlockItem = this;
	this.flow.on( 'render', function() {
		listBlockItem.emit( 'update' );
	} );
}

/* Public Methods */

es.ListBlockItem.prototype.setNumber = function( number ) {
	this.$icon.text( number + '.' );
};

es.ListBlockItem.prototype.setLevel = function( level ) {
	this.$.removeClass( 'editSurface-listItem-level' + this.level );
	this.level = level;
	this.$.addClass( 'editSurface-listItem-level' + this.level );
};

es.ListBlockItem.prototype.setStyle = function( style ) {
	this.$.removeClass( 'editSurface-listItem-' + this.style );
	this.style = style;
	this.$.addClass( 'editSurface-listItem-' + this.style );
};

es.ListBlockItem.prototype.renderContent = function( offset ) {
	this.flow.render();
};

es.ListBlockItem.prototype.getIndex = function( ) {
	return this.list.items.indexOf( this );
};

/* Inheritance */
es.extend( es.ListBlockItem, es.EventEmitter );