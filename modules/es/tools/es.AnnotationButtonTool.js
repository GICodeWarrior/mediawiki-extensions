es.AnnotationButtonTool = function( toolbar, name, data ) {
	es.ButtonTool.call( this, toolbar, name );
	this.data = data;
};

es.AnnotationButtonTool.prototype.onClick = function() {
	var method;
	if ( this.name === 'clear') {
		method = 'clear';
	} else {
		method = this.$.hasClass( 'es-toolbarButtonTool-down' ) ? 'clear' : 'set';
	}

	var tx = this.toolbar.surfaceView.model.getDocument().prepareContentAnnotation(
		this.toolbar.surfaceView.currentSelection,
		method,
		this.data
	);
	this.toolbar.surfaceView.model.transact( tx );
};

es.Tool.tools.bold = {
	constructor: es.AnnotationButtonTool,
	name: 'bold',
	data: { 'type': 'textStyle/bold' }
};

es.Tool.tools.italic = {
	constructor: es.AnnotationButtonTool,
	name: 'italic',
	data: { 'type': 'textStyle/italic' }
};

es.Tool.tools.clear = {
	constructor: es.AnnotationButtonTool,
	name: 'clear',
	data: /.*/
};

es.extendClass( es.AnnotationButtonTool, es.ButtonTool );