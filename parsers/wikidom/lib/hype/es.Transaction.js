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

es.Transaction.prototype.pushChangeElementAttribute( method, key, value ) {
	this.push( {
		'type': 'attribute',
		'method': method,
		'key': key,
		'value': value
	} );
};

es.Transaction.prototype.pushStartAnnotating( method, annotation ) {
	this.push( {
		'type': 'annotate',
		'method': method,
		'bias': 'start',
		'annotation': annotation
	} );
};

es.Transaction.prototype.pushStopAnnotating( method, annotation ) {
	this.push( {
		'type': 'annotate',
		'method': method,
		'bias': 'stop',
		'annotation': annotation
	} );
};
