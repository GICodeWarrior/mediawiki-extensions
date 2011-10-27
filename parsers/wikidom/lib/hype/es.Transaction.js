/**
 * Creates an es.Transaction object.
 * 
 * @class
 * @extends {Array}
 * @constructor
 */
es.Transaction = function() {
	return es.extendObject( [], this );
};

/* Methods */

es.Transaction.prototype.pushRetain = function( length ) {
	this.push( {
		'type': 'retain',
		'length': length
	} );
};

es.Transaction.prototype.pushInsert = function( content ) {
	this.push( {
		'type': 'insert',
		'data': content
	} );
};

es.Transaction.prototype.pushRemove = function( data ) {
	this.push( {
		'type': 'remove',
		'data': data
	} );
};

es.Transaction.prototype.pushChangeElementAttribute = function( method, key, value ) {
	this.push( {
		'type': 'attribute',
		'method': method,
		'key': key,
		'value': value
	} );
};

es.Transaction.prototype.pushStartAnnotating = function( method, annotation ) {
	this.push( {
		'type': 'annotate',
		'method': method,
		'bias': 'start',
		'annotation': annotation
	} );
};

es.Transaction.prototype.pushStopAnnotating = function( method, annotation ) {
	this.push( {
		'type': 'annotate',
		'method': method,
		'bias': 'stop',
		'annotation': annotation
	} );
};
