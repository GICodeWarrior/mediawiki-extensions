/**
 * Creates a list block item.
 * Levels are 0-indexed.
 * 
 * @class
 * @constructor
 * @extends {es.EventEmitter}
 * @param content {es.Content}
 * @param style {String}
 * @param level {Integer}
 */
es.ListBlockItem = function( content, styles ) {
	es.EventEmitter.call( this );
	this.styles = styles || ['bullet'];
	this.content = content || new es.Content();
	this.$icon = $( '<div class="editSurface-listItem-icon"></div>' );
	this.$content = $( '<div class="editSurface-listItem-content"></div>' );
	this.$ = $( '<div class="editSurface-listItem"></div>' )
		.append( this.$icon )
		.append( this.$content )
		.addClass( 'editSurface-listItem-level' + ( this.styles.length - 1 ) )
		.addClass( 'editSurface-listItem-' + this.styles[this.styles.length - 1] );
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

es.ListBlockItem.prototype.setLevel = function( level, style ) {
	this.$.removeClass( 'editSurface-listItem-level' + ( this.styles.length - 1 ) );
	this.$.removeClass( 'editSurface-listItem-' + this.styles[this.styles.length - 1] );
	if ( level <= this.styles.length - 1 ) {
		this.styles = this.styles.slice( 0, level + 1 );
		if ( typeof style !== 'undefined' ) {
			this.styles[this.styles.length - 1] = style;
		}
	} else {
		if ( typeof style === 'undefined' ) {
			style = this.styles[this.styles.length - 1];
		}
		while ( this.styles.length - 1  < level ) {
			this.styles.push( style );
		}
	}
	this.$.addClass( 'editSurface-listItem-level' + ( this.styles.length - 1 ) );
	this.$.addClass( 'editSurface-listItem-' + this.styles[this.styles.length - 1] );
};

es.ListBlockItem.prototype.getLevel = function() {
	return this.styles.length - 1;
};

es.ListBlockItem.prototype.setStyle = function( style ) {
	this.$.removeClass( 'editSurface-listItem-' + this.styles[this.styles.length - 1] );	
	this.styles.pop();
	this.styles.push( style );
	this.$.addClass( 'editSurface-listItem-' + this.styles[this.styles.length - 1] );
};

es.ListBlockItem.prototype.getStyle = function( level ) {
	if ( typeof level === 'undefined') {
		return this.styles[this.styles.length - 1];
	} else {
		return this.styles[level];
	}
};

es.ListBlockItem.prototype.renderContent = function( offset ) {
	this.flow.render();
};

es.ListBlockItem.prototype.getIndex = function( ) {
	return this.list.items.indexOf( this );
};

/* Inheritance */
es.extend( es.ListBlockItem, es.EventEmitter );