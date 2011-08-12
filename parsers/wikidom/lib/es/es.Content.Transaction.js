/**
 * Creates an operation to be applied to a content object.
 * 
 * @class
 * @constructor
 * @param operations {Array} List of operations
 * @property operations {Array} List of operations
 */
es.Content.Transaction = function( operations ) {
	this.operations = operations || [];
};

es.Content.Transaction.prototype.add = function( operation ) {
	this.operations.push( operation );
};

es.Content.Transaction.prototype.commit = function( from ) {
	var range = new es.Range(),
		to = new es.Content();
	for ( var i = 0; i < this.operations.length; i++ ) {
		var operation = this.operations[i];
		range.to = range.from + operation.getLength();
		switch (operation.getType()) {
			case 'retain':
				to.insert( to.getLength(), from.getData( range ) );
				range.from = range.to;
				break;
			case 'insert':
				to.insert( to.getLength(), operation.getContent() );
				break;
			case 'delete':
				// TODO: Validate operation.getContent against content being skipped
				offset += operation.getLength();
				break;
		}
	}
	return to;
};

es.Content.Transaction.prototype.rollback = function( from ) {
	var range = new es.Range(),
		to = new es.Content();
	for ( var i = 0; i < this.operations.length; i++ ) {
		var operation = this.operations[i];
		range.to = range.from + operation.getLength();
		switch (operation.getType()) {
			case 'retain':
				to.insert( to.getLength(), from.getData( range ) );
				range.from = range.to;
				break;
			case 'insert':
				// TODO: Validate operation.getContent against content being skipped
				offset += operation.getLength();
				break;
			case 'delete':
				to.insert( to.getLength(), operation.getContent() );
				break;
		}
	}
	return to;
};

es.Content.Transaction.prototype.optimize = function() {
	// reduce consecutive operations of the same type to single operations if possible
};
