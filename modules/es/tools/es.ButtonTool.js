es.ButtonTool = function( toolbar, name ) {
	es.Tool.call( this, toolbar );
	if ( !name ) {
		return;
	}
	var _this = this;
	
	this.$.addClass( 'es-toolbarButtonTool' ).addClass( 'es-toolbarButtonTool-' + name );
	
	this.$.click( function ( e ) {
		_this.onClick( e );
	} );
};

es.ButtonTool.prototype.onClick = function( e ) {
};

es.extendClass( es.ButtonTool, es.Tool );