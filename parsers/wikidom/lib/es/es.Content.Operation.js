/**
 * Creates an operation to be applied to a content object.
 * 
 * @class
 * @constructor
 * @param type {String} Type of operation, e.g. insert, delete, annotate
 * @param content {Mixed} Either {Integer} length, {String} text or {es.Content} content
 * @param data {Object} Data of operation, e.g. range
 * @property type {String} Type of operation
 * @property content {es.Content} Content of operation
 * @property data {Object} Data of operation
 */
es.Content.Operation = function( type, content, data ) {
	this.type = type;
	switch ( typeof content ) {
		case 'number':
			this.content = null;
			this.length = content;
			break;
		case 'string':
			this.content = es.Content.newFromText( content );
			this.length = this.content.getLength();
			break;
		case 'object':
			this.content = content;
			this.length = this.content.getLength();
			break;
	}
	this.data = data || {};
};

es.Content.Operation.prototype.getType = function() {
	return this.type;
};

es.Content.Operation.prototype.getContent = function() {
	return this.content;
};

es.Content.Operation.prototype.setContent = function( content ) {
	this.content = content;
};

es.Content.Operation.prototype.hasContent = function() {
	return !!this.content;
};

es.Content.Operation.prototype.getLength = function() {
	return this.content ? this.content.getLength() : this.length;
};

es.Content.Operation.prototype.getData = function() {
	return this.data;
};
