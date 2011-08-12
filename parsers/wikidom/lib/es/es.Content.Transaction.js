/**
 * Creates an operation to be applied to a content object.
 * 
 * @class
 * @constructor
 * @param operations {Array} List of operations
 * @property operations {Array} List of operations
 */
es.Content.Transaction = function( content, operations ) {
	this.content = content;
	this.operations = [];
	if ( arguments.length > 1 ) {
		var range = new es.Range();
		for ( var i = 1; i < arguments.length; i++ ) {
			var operation = arguments[i];
			switch ( operation.getType() ) {
				case 'retain':
				case 'delete':
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

es.Content.Transaction.prototype.add = function( operation ) {
	this.operations.push( operation );
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
			case 'delete':
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
			case 'delete':
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
