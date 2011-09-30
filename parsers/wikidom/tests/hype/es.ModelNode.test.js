module( 'Bases' );

test( 'es.ModelNode', 17, function() {
	// Example data (integers) is used for simplicity of testing
	var modelNode1 = new es.ModelNode(),
		modelNode2 = new es.ModelNode( [1] ),
		modelNode3 = new es.ModelNode( [1, 2]),
		modelNode4 = new es.ModelNode( [1, 2, 3] );
	
	// Event triggering is detected using a callback that increments a counter
	var updates = 0;
	modelNode1.on( 'update', function() {
		updates++;
	} );
	var attaches = 0;
	modelNode2.on( 'attach', function() {
		attaches++;
	} );
	var detaches = 0;
	modelNode2.on( 'detach', function() {
		detaches++;
	} );
	
	/** @covers es.ModelNode.push */
	modelNode1.push( modelNode2 );
	equal( updates, 1, 'es.ModelNode emits update events on push' );
	equal( modelNode1[0], modelNode2, 'es.ModelNode appends node on push' );
	
	/** @covers es.ModelNode.attach */
	equal( attaches, 1, 'es.ModelNode emits attach events when added to another node' );
	
	/** @covers es.ModelNode.unshift */
	modelNode1.unshift( modelNode3 );
	equal( updates, 2, 'es.ModelNode emits update events on unshift' );
	equal( modelNode1[0], modelNode3, 'es.ModelNode prepends node on unshift' );
	
	/** @covers es.ModelNode.splice */
	modelNode1.splice( 1, 0, modelNode4 );
	equal( updates, 3, 'es.ModelNode emits update events on splice' );
	equal( modelNode1[1], modelNode4, 'es.ModelNode inserts node on splice' );
	
	/** @covers es.ModelNode.reverse */
	modelNode1.reverse();
	equal( updates, 4, 'es.ModelNode emits update events on reverse' );
	
	/** @covers es.ModelNode.sort */
	modelNode1.sort( function( a, b ) {
		return a.length < b.length ? -1 : 1;
	} );
	equal( updates, 5, 'es.ModelNode emits update events on sort' );
	deepEqual(
		modelNode1.slice( 0 ),
		[modelNode2, modelNode3, modelNode4],
		'es.ModelNode properly orders nodes on sort'
	);
	
	/** @covers es.ModelNode.pop */
	modelNode1.pop();
	equal( updates, 6, 'es.ModelNode emits update events on pop' );
	deepEqual(
		modelNode1.slice( 0 ),
		[modelNode2, modelNode3],
		'es.ModelNode removes last node on pop'
	);
	
	/** @covers es.ModelNode.shift */
	modelNode1.shift();
	equal( updates, 7, 'es.ModelNode emits update events on shift' );
	deepEqual(
		modelNode1.slice( 0 ),
		[modelNode3],
		'es.ModelNode removes first Node on shift'
	);
	
	/** @covers es.ModelNode.detach */
	equal( detaches, 1, 'es.ModelNode emits detach events when removed from another node' );
	
	/** @covers es.ModelNode.getParent */
	strictEqual( modelNode3.getParent(), modelNode1, 'Child nodes have correct parent reference' );
	
	try {
		var view = modelNode3.createView();
	} catch ( err ){
		ok( true, 'Calling createView on a plain ModelNode throws an exception' );
	}
} );
