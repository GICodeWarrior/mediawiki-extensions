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
	if ( arguments.length > 1 ) {
		// Support variadic arguments
		if ( !$.isArray( operations ) ) {
			operations = Array.prototype.slice.call( arguments, 1 );
		}
		var range = new es.Range();
		for ( var i = 0; i < operations.length; i++ ) {
			var operation = operations[i];
			switch ( operation.getType() ) {
				case 'retain':
				case 'remove':
					range.to = range.from + operation.getLength();
					if ( !operation.hasContent() ) {
						operation.setContent( content.getContent( range ) );
					}
					range.from = range.to;
					break;
			}
			this.operations.push( operation );
		}
	}
};

/**
 * Builds a transaction that removes and or inserts content.
 * 
 * @param content {es.Content} Content to operate on
 * @param range {es.Range} Range of content to remove, or zero length range when inserting only
 * @param insert {es.Content} Content to insert (optional)
 */
es.Content.Transaction.newFromReplace = function( content, range, insert ) {
	var operations = [];
	range.normalize();
	if ( content.getLength() ) {
		// Delete range
		if ( range.start ) {
			// Use content up until the range begins
			operations.push( new es.Content.Operation( 'retain', range.start ) );
		}
		// Skip over the range
		if ( range.getLength() ) {
			operations.push( new es.Content.Operation( 'remove', range.getLength() ) );
		}
	}
	if ( insert ) {
		// Add content to the output
		operations.push( new es.Content.Operation( 'insert', insert ) );
	}
	// Retain remaining content
	if ( range.end < content.getLength() ) {
		operations.push(
			new es.Content.Operation( 'retain', content.getLength() - range.end )
		);
	}
	return new es.Content.Transaction( content, operations );
};

es.Content.Transaction.prototype.commit = function() {
	var range = new es.Range(),
		to = new es.Content();
	for ( var i = 0; i < this.operations.length; i++ ) {
		var operation = this.operations[i];
		switch (operation.getType()) {
			case 'retain':
				range.to = range.from + operation.getLength();
				// Automatically add content to operation
				if ( !operation.hasContent() ) {
					operation.setContent( this.content.getContent( range ) );
				}
				to.insert( to.getLength(), operation.getContent().getData() );
				range.from = range.to;
				break;
			case 'insert':
				to.insert( to.getLength(), operation.getContent().getData() );
				break;
			case 'remove':
				range.to = range.from + operation.getLength();
				// Automatically add content to operation
				if ( !operation.hasContent() ) {
					operation.setContent( this.content.getContent( range ) );
				}
				range.from = range.to;
				break;
		}
	}
	return to;
};

es.Content.Transaction.prototype.rollback = function() {
	var range = new es.Range(),
		to = new es.Content();
	for ( var i = 0; i < this.operations.length; i++ ) {
		var operation = this.operations[i];
		switch (operation.getType()) {
			case 'retain':
				range.to = range.from + operation.getLength();
				to.insert( to.getLength(), operation.getContent().getData() );
				range.from = range.to;
				break;
			case 'remove':
				to.insert( to.getLength(), operation.getContent().getData() );
				break;
			case 'insert':
				range.to = range.from + operation.getLength();
				range.from = range.to;
				break;
		}
	}
	return to;
};

es.Content.Transaction.prototype.optimize = function() {
	// reduce consecutive operations of the same type to single operations if possible
};
