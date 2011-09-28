module( 'Base classes' );

test( 'es.ModelNode', function() {
	var modelNode1 = new es.ModelNode(),
		modelNode2 = new es.ModelNode(),
		modelNode3 = new es.ModelNode(),
		modelNode4 = new es.ModelNode();
	
	// Event triggering is detected using a callback that increments a number
	var updates = 0;
	modelNode1.on( 'update', function() {
		updates++
	} );
	
	// Array methods
	
	modelNode1.push( modelNode2 );
	equal( updates, 1, 'es.ModelNode emits update events on push' );
	equal( modelNode1[0], modelNode2, 'es.ModelNode appends Node on push' );
	
	modelNode1.unshift( modelNode3 );
	equal( updates, 2, 'es.ModelNode emits update events on unshift' );
	equal( modelNode1[0], modelNode3, 'es.ModelNode prepends Node on unshift' );
	
	modelNode1.splice( 1, 0, modelNode4 );
	equal( updates, 3, 'es.ModelNode emits update events on splice' );
	equal( modelNode1[1], modelNode4, 'es.ModelNode inserts Node on splice' );
	
	modelNode1.pop();
	equal( updates, 4, 'es.ModelNode emits update events on pop' );
	deepEqual(
		modelNode1.slice( 0 ),
		[modelNode3, modelNode4],
		'es.ModelNode removes last Node on pop'
	);
	
	modelNode1.shift();
	equal( updates, 5, 'es.ModelNode emits update events on shift' );
	deepEqual(
		modelNode1.slice( 0 ),
		[modelNode4],
		'es.ModelNode removes first Node on shift'
	);
} );
