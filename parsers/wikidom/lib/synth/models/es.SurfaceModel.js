es.SurfaceModel = function( doc ) {
	es.EventEmitter.call( this );
	this.selection = new es.Selection();
	this.doc = doc || new es.DocumentModel();
	
	var model = this;
	this.doc.on( 'update', function() {
		model.emit( 'update' );
	} );
};

es.SurfaceModel.prototype.getSelection = function() {
	return this.selection;
};

es.SurfaceModel.prototype.setSelection = function( selection ) {
	this.selection = selection;
	this.emit( 'select', this.selection );
};

es.SurfaceModel.prototype.getDocument = function() {
	return this.doc;
};

es.extend( es.SurfaceModel, es.EventEmitter );
