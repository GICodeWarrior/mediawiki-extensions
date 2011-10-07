module( 'Bases' );

test( 'es.ModelNode',20, function() {
	// Example data (integers) is used for simplicity of testing
	var modelNode1 = new es.ModelNode(),
		modelNode2 = new es.ModelNode(),
		modelNode3 = new es.ModelNode( [new es.ModelNode()] ),
		modelNode4 = new es.ModelNode( [new es.ModelNode(), new es.ModelNode()] );
	
	// Event triggering is detected using a callback that increments a counter
	var updates = 0;
	modelNode1.on( 'update', function() {
		updates++;
	} );
	var attaches = 0;
	modelNode2.on( 'afterAttach', function() {
		attaches++;
	} );
	modelNode3.on( 'afterAttach', function() {
		attaches++;
	} );
	modelNode4.on( 'afterAttach', function() {
		attaches++;
	} );
	var detaches = 0;
	modelNode2.on( 'afterDetach', function() {
		detaches++;
	} );
	modelNode3.on( 'afterDetach', function() {
		detaches++;
	} );
	modelNode4.on( 'afterDetach', function() {
		detaches++;
	} );
	
	/** @covers es.ModelNode.push */
	modelNode1.push( modelNode2 );
	equal( updates, 1, 'push emits update events' );
	equal( modelNode1[0], modelNode2, 'push appends a node' );

	/** @covers es.ModelNode.attach */
	equal( attaches, 1, 'push attaches added node' );
	
	/** @covers es.ModelNode.unshift */
	modelNode1.unshift( modelNode3 );
	equal( updates, 2, 'unshift emits update events' );
	equal( modelNode1[0], modelNode3, 'unshift prepends a node' );
	
	/** @covers es.ModelNode.attach */
	equal( attaches, 2, 'unshift attaches added node' );
	
	/** @covers es.ModelNode.splice */
	modelNode1.splice( 1, 0, modelNode4 );
	equal( updates, 3, 'splice emits update events' );
	equal( modelNode1[1], modelNode4, 'splice inserts nodes' );
	
	/** @covers es.ModelNode.attach */
	equal( attaches, 3, 'splice attaches added nodes' );
	
	/** @covers es.ModelNode.reverse */
	modelNode1.reverse();
	equal( updates, 4, 'reverse emits update events' );
	
	/** @covers es.ModelNode.sort */
	modelNode1.sort( function( a, b ) {
		return a.length < b.length ? -1 : 1;
	} );
	equal( updates, 5, 'sort emits update events' );
	deepEqual(
		modelNode1.slice( 0 ),
		[modelNode2, modelNode3, modelNode4],
		'sort reorderes nodes correctly'
	);
	
	/** @covers es.ModelNode.pop */
	modelNode1.pop();
	equal( updates, 6, 'pop emits update events' );
	deepEqual(
		modelNode1.slice( 0 ),
		[modelNode2, modelNode3],
		'pop removes the last child node'
	);
	
	/** @covers es.ModelNode.detach */
	equal( detaches, 1, 'pop detaches a node' );
	
	/** @covers es.ModelNode.shift */
	modelNode1.shift();
	equal( updates, 7, 'es.ModelNode emits update events on shift' );
	deepEqual(
		modelNode1.slice( 0 ),
		[modelNode3],
		'es.ModelNode removes first Node on shift'
	);
	
	/** @covers es.ModelNode.detach */
	equal( detaches, 2, 'shift detaches a node' );
	
	/** @covers es.ModelNode.getParent */
	strictEqual( modelNode3.getParent(), modelNode1, 'getParent returns the correct reference' );
	
	try {
		var view = modelNode3.createView();
	} catch ( err ){
		ok( true, 'createView throws an exception when not overridden' );
	}
} );
