/**
 * Creates an es.Transaction object.
 * 
 * @class
 * @extends {Array}
 * @constructor
 */
es.Transaction = function() {
	return $.extend( [], this );
};

/* Methods */

es.Transaction.prototype.pushRetain( length ) {
	this.push( {
		'type': 'retain',
		'length': length
	} );
};

es.Transaction.prototype.pushInsert( content ) {
	this.push( {
		'type': 'insert',
		'data': data
	} );
};

es.Transaction.prototype.pushRemove( data ) {
	this.push( {
		'type': 'remove',
		'data': data
	} );
};

es.Transaction.prototype.pushSetElementAttribute( key, value ) {
	this.push( {
		'type': 'attribute',
		'method': 'set',
		'key': key,
		'value': value
	} );
};

es.Transaction.prototype.pushClearElementAttribute( key, value ) {
	this.push( {
		'type': 'attribute',
		'method': 'clear',
		'key': key,
		'value': value
	} );
};

es.Transaction.prototype.pushStartSettingAnnotation( annotation ) {
	this.push( {
		'type': 'annotate',
		'method': 'set',
		'bias': 'start',
		'annotation': annotation
	} );
};

es.Transaction.prototype.pushStopSettingAnnotation( annotation ) {
	this.push( {
		'type': 'annotate',
		'method': 'set',
		'bias': 'stop',
		'annotation': annotation
	} );
};

es.Transaction.prototype.pushStartClearingAnnotation( annotation ) {
	this.push( {
		'type': 'annotate',
		'method': 'clear',
		'bias': 'start',
		'annotation': annotation
	} );
};

es.Transaction.prototype.pushStopClearingAnnotation( annotation ) {
	this.push( {
		'type': 'annotate',
		'method': 'clear',
		'bias': 'stop',
		'annotation': annotation
	} );
};
