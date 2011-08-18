/**
 * Creates a transaction which can be applied to a content object.
 * 
 * Transactions contain a series of operations, such as retain, insert, remove, start and end. Each
 * operation describes a step that must be taken to construct a new version of a content object.
 * 
 * @example
 *     // Given the following content... 
 *     var content = es.Content.newFromText( 'abc' );
 *     
 *     // Build transaction
 *     var tx = new es.Transaction();
 *     tx.add( 'retain', 1 );
 *     tx.add( 'remove', content.getData( new es.Range( 1, 2 ) ) );
 *     tx.add( 'insert', es.Content.newFromText( 'B' ) );
 *     tx.add( 'retain', 1 );
 *     
 *     // Commit transaction to content
 *     var committed = tx.commit( content );
 *     console.log( committed.getText() ); // Logs "aBc"
 *     
 *     // Apply transaction to content
 *     var rolledback = tx.rollback( content );
 *     console.log( rolledback.getText() ); // Logs "abc"
 * 
 * @class
 * @constructor
 * @param content {es.Content} Content to operate on
 * @property operations {Array} List of operations
 */
es.Transaction = function() {
	this.operations = [];
	this.cursor = 0;
};

/**
 * List of operation implementations. 
 */
es.Transaction.operations = ( function() {
	function annotate( con, add, rem ) {
		for ( var i = 0; i < add.length; i++ ) {
			con.annotate( 'add', add[i] );
		}
		for ( var i = 0; i < rem.length; i++ ) {
			con.annotate( 'remove', rem[i] );
		}
	}
	function retain( val, cur, src, dst, add, rem ) {
		var con = src.getContent( new es.Range( cur, cur + val ) );
		if ( add.length || rem.length ) {
			annotate( con, add, rem );
		}
		dst.insert( dst.getLength(), con.getData() );
		return val;
	}
	function insert( val, cur, src, dst, add, rem ) {
		var con = val.getContent();
		if ( add.length || rem.length ) {
			annotate( con, add, rem );
		}
		dst.insert( dst.getLength(), con.getData() );
		return 0;
	}
	function start( val, cur, src, dst, add, rem ) {
		if ( val.method === 'add' ) {
			add.push( val.annotation );
		} else if ( val.method === 'remove' ) {
			rem.push( val.annotation );
		} else {
			throw 'Annotation method error. Unsupported annotation method: ' + val.method;
		}
		return 0;
	}
	function end( val, cur, src, dst, add, rem ) {
		var stack;
		if ( val.method === 'add' ) {
			stack = add;
		} else if ( val.method === 'remove' ) {
			stack = rem;
		} else {
			throw 'Annotation method error. Unsupported annotation method: ' + val.method;
		}
		var index;
		for ( var i = 0; i < stack.length; i++ ) {
			// TODO: Compare data too: es.Content.compareObjects( stack[i], val.annotation )
			if ( stack[i].type === val.annotation.type ) {
				index = i;
				break;
			}
		}
		if ( index === undefined ) {
			throw 'Annotation stack error. Annotation is missing.';
		}
		stack.splice( index, 1 );
		return 0;
	}
	function measure( val ) {
		return val.getLength();
	}
	function pass( val ) {
		return val;
	}
	function zero( val ) {
		return 0;
	}
	return {
		'retain': {
			'commit': retain,
			'rollback': retain,
			'advance': pass
		},
		'insert': {
			'commit': insert,
			'rollback': measure,
			'advance': zero
		},
		'remove': {
			'commit': measure,
			'rollback': insert,
			'advance': measure
		},
		'start': {
			'commit': start,
			'rollback': function( val, cur, src, dst, add, rem ) {
				return start( val, cur, src, dst, rem, add );
			},
			'advance': zero
		},
		'end': {
			'commit': end,
			'rollback': function( val, cur, src, dst, add, rem ) {
				return end( val, cur, src, dst, rem, add );
			},
			'advance': zero
		}
	};
} )();

es.Transaction.prototype.getCursor = function() {
	return this.cursor;
};

es.Transaction.prototype.reset = function() {
	this.operations = [];
	this.cursor = 0;
};

es.Transaction.prototype.add = function( type, val ) {
	if ( !( type in es.Transaction.operations ) ) {
		throw 'Unknown operation error. Operation type is not supported: ' + type;
	}
	var model = es.Transaction.operations[type];
	this.operations.push( {
		'type': type,
		'val': val,
		'model': model
	} );
	this.cursor += model.advance( val );
};

es.Transaction.prototype.commit = function( src ) {
	var cur = 0,
		dst = new es.Content(),
		add = [],
		rem = [],
		adv;
	for ( var i = 0; i < this.operations.length; i++ ) {
		var op = this.operations[i];
		cur += op.model.commit( op.val, cur, src, dst, add, rem );
	}
	return dst;
};

es.Transaction.prototype.rollback = function( src ) {
	var cur = 0,
		dst = new es.Content(),
		add = [],
		rem = [],
		adv;
	for ( var i = 0; i < this.operations.length; i++ ) {
		var op = this.operations[i];
		cur += op.model.rollback( op.val, cur, src, dst, add, rem );
	}
	return dst;
};
