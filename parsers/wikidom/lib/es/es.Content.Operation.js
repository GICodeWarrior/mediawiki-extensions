/**
 * Creates an operation to be applied to a content object.
 * 
 * @class
 * @constructor
 * @param type {String} Type of operation, e.g. insert, delete, annotate
 * @param content {es.Content} Content being inserted or modified
 * @param data {Object} Data of operation, e.g. range
 * @property type {String} Type of operation
 * @property content {es.Content} Content of operation
 * @property data {Object} Data of operation
 */
es.Content.Operation = function( type, content, data ) {
	this.type = type;
	this.contents = contents;
	this.data = data;
};

es.Content.Operation.prototype.getType = function() {
	return this.type;
};

es.Content.Operation.prototype.getContent = function() {
	return this.content;
};

es.Content.Operation.prototype.getLength = function() {
	return this.content.getLength();;
};

es.Content.Operation.prototype.getData = function() {
	return this.data;
};
