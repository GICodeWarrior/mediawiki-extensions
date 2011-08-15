/**
 * Creates an operation to be applied to a content object.
 * 
 * @class
 * @constructor
 * @param operations {Array} List of operations - can also be the first in a list of variadic
 * arguments, each containing a single operation
 * @property operations {Array} List of operations
 */
es.Content.Transaction = function( content, operations ) {
	this.content = content;
	this.operations = [];
	this.length = 0;
	if ( arguments.length > 1 ) {
		// Support variadic arguments
		if ( !$.isArray( operations ) ) {
			operations = Array.prototype.slice.call( arguments, 1 );
		}
		for ( var i = 0; i < operations.length; i++ ) {
			this.add( operations[i] );
		}
	}
};

es.Content.Transaction.prototype.add = function( operation ) {
	// Auto-add content to operations which affect a range but don't have content (yet)
	var range = new es.Range( this.length, this.length + operation.getLength() );
	if ( operation.getLength() && !operation.hasContent() ) {
		if ( !operation.hasContent() ) {
			operation.setContent( content.getContent( range ) );
		}
	}
	this.length += operation.getAdvance();
	this.operations.push( operation );
};

/**
 * Builds a transaction that removes and or inserts content.
 * 
 * @param content {es.Content} Content to operate on
 * @param range {es.Range} Range of content to remove, or zero length range when inserting only
 * @param insert {es.Content} Content to insert (optional)
 */
es.Content.Transaction.newFromReplace = function( content, range, insert ) {
	var transaction = new es.Content.Transaction( content );
	range.normalize();
	if ( content.getLength() ) {
		// Delete range
		if ( range.start ) {
			// Use content up until the range begins
			transaction.add( new es.Content.Operation.Retain( range.start ) );
		}
		// Skip over the range
		if ( range.getLength() ) {
			transaction.add( new es.Content.Operation.Remove( range.getLength() ) );
		}
	}
	if ( insert ) {
		// Add content to the output
		transaction.add( new es.Content.Operation.Insert( insert ) );
	}
	// Retain remaining content
	if ( range.end < content.getLength() ) {
		transaction.add( new es.Content.Operation.Retain( content.getLength() - range.end ) );
	}
	return transaction;
};

/**
 * Builds a transaction that applies annotations
 * 
 * TODO: Support method argument
 * 
 * @param content {es.Content} Content to operate on
 * @param range {es.Range} Range of content to annotate, content will be retained
 * @param method {String} Mode of application; "add", "remove", or "toggle"
 * @param annotation {Object} Annotation to apply
 */
es.Content.Transaction.newFromAnnotate = function( content, range, method, annotation ) {
	var transaction = new es.Content.Transaction();
	range.normalize();
	if ( content.getLength() ) {
		if ( range.start ) {
			// Use content up until the range begins
			transaction.add( new es.Content.Operation.Retain( range.start ) );
		}
		if ( range.getLength() ) {
			// Apply annotation to range
			transaction.add( new es.Content.Operation.Begin( annotation ) );
			transaction.add( new es.Content.Operation.Retain( range.getLength() ) );
			transaction.add( new es.Content.Operation.End( annotation ) );
		}
		// Retain remaining content
		if ( range.end < content.getLength() ) {
			transaction.add( new es.Content.Operation.Begin( content.getLength() - range.end ) );
		}
	}
	return transaction;
};

es.Content.Transaction.prototype.commit = function() {
	var offset = 0,
		content = new es.Content(),
		annotations = [];
	for ( var i = 0; i < this.operations.length; i++ ) {
		var length = this.operations[i].commit( content, annotations );
		// TODO: Apply annotations in stack
		offset += length;
	}
	return content;
};

es.Content.Transaction.prototype.rollback = function() {
	var offset = 0,
		content = new es.Content(),
		annotations = [];
	for ( var i = 0; i < this.operations.length; i++ ) {
		var length = this.operations[i].rollback( content, annotations );
		// TODO: Apply annotations in stack
		offset += length;
	}
	return content;
};

es.Content.Transaction.prototype.optimize = function() {
	// reduce consecutive operations of the same type to single operations if possible
};
