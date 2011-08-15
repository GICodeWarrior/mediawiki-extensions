/**
 * Creates an operation to be applied to a content object.
 * 
 * @class
 * @constructor
 */

es.Content.Operation = function( type, content, data ) {
	this.type = type;
	this.content = content || null;
	this.data = data || null;
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
	return 0;
};

es.Content.Operation.prototype.getAdvance = function() {
	return 0
};

es.Content.Operation.prototype.getData = function() {
	return this.data;
};

es.Content.Operation.prototype.setData = function() {
	return this.data;
};

es.Content.Operation.prototype.commit = function( content, annotations ) {
	throw 'es.Content.Operation.commit not implemented in this subclass.';
};

es.Content.Operation.prototype.rollback = function( content, annotations ) {
	throw 'es.Content.Operation.rollback not implemented in this subclass.';
};

/**
 * @class
 * @constructor
 */
es.Content.Operation.Retain = function( length ) {
	es.Content.Operation.call( this, 'remove' );
	this.type = 'retain';
	this.content = null;
	this.length = length;
};
es.extend( es.Content.Operation.Retain, es.Content.Operation );

es.Content.Operation.Retain.prototype.getLength = function() {
	return this.length;
};

es.Content.Operation.Retain.prototype.getAdvance = function() {
	return this.length;
};

es.Content.Operation.Retain.prototype.commit = function( content, annotations ) {
	content.insert( content.getLength(), this.content.getData() );
	return this.length;
};

es.Content.Operation.Retain.prototype.rollback = es.Content.Operation.Retain.prototype.commit;

/**
 * @class
 * @constructor
 */
es.Content.Operation.Insert = function( content ) {
	es.Content.Operation.call( this, 'insert', content );
};
es.extend( es.Content.Operation.Insert, es.Content.Operation );

es.Content.Operation.Insert.prototype.getLength = function() {
	return this.content.getLength();
};

es.Content.Operation.Insert.prototype.commit = function( content, annotations ) {
	content.insert( content.getLength(), this.content.getData() );
	return 0;
};

es.Content.Operation.Insert.prototype.rollback = function( content, annotations ) {
	return this.content.getLength();
};

/**
 * @class
 * @constructor
 */
es.Content.Operation.Remove = function( length ) {
	es.Content.Operation.call( this, 'remove' );
	this.length = length;
};
es.extend( es.Content.Operation.Remove, es.Content.Operation );

es.Content.Operation.Remove.prototype.getLength = function() {
	return this.length;
};

es.Content.Operation.Remove.prototype.getAdvance = function() {
	return this.length;
};

es.Content.Operation.Remove.prototype.commit = es.Content.Operation.Insert.prototype.rollback;
es.Content.Operation.Remove.prototype.rollback = es.Content.Operation.Insert.prototype.commit;

/**
 * @class
 * @constructor
 */
es.Content.Operation.Begin = function( annotation ) {
	es.Content.Operation.call( this, 'begin', null, annotation );
};
es.extend( es.Content.Operation.Begin, es.Content.Operation );

es.Content.Operation.Begin.prototype.commit = function( content, annotations ) {
	annotations.push( this.data );
	return 0;
};

es.Content.Operation.Begin.prototype.rollback = function( content, annotations ) {
	var index;
	for ( var i = 0; i < annotations.length; i++ ) {
		if ( es.Content.compareObjects( annotations[i], this.data ) ) {
			index = i;
		}
	}
	if ( index === undefined ) {
		throw 'Annotation stack error. Annotation is missing.';
	}
	annotations.splice( index, 1 );
	return 0;
};

/**
 * @class
 * @constructor
 */
es.Content.Operation.End = function( annotation ) {
	es.Content.Operation.call( this, 'end', null, annotation );
};
es.extend( es.Content.Operation.End, es.Content.Operation );

es.Content.Operation.End.prototype.commit = es.Content.Operation.Begin.prototype.rollback;
es.Content.Operation.End.prototype.rollback = es.Content.Operation.Begin.prototype.commit;
