module( 'Base classes' );

test( 'es.ModelList and es.ModelItem', function() {
	var modelList = new es.ModelList(),
		modelItem1 = new es.ModelItem(),
		modelItem2 = new es.ModelItem(),
		modelItem3 = new es.ModelItem();
	
	// Event triggering is detected using a callback that increments a number
	var updates = 0;
	modelList.on( 'update', function() {
		updates++
	} );
	
	// Array methods
	
	modelList.push( modelItem1 );
	equal( updates, 1, 'es.modelList emits update events on push' );
	equal( modelList[0], modelItem1, 'es.modelList appends item on push' );
	
	modelList.unshift( modelItem2 );
	equal( updates, 2, 'es.modelList emits update events on unshift' );
	equal( modelList[0], modelItem2, 'es.modelList prepends item on unshift' );
	
	modelList.splice( 1, 0, modelItem3 );
	equal( updates, 3, 'es.modelList emits update events on splice' );
	equal( modelList[1], modelItem3, 'es.modelList inserts item on splice' );
	
	modelList.pop();
	equal( updates, 4, 'es.modelList emits update events on pop' );
	deepEqual(
		modelList.slice( 0 ),
		[modelItem2, modelItem3],
		'es.modelList removes last item on pop'
	);
	
	modelList.shift();
	equal( updates, 5, 'es.modelList emits update events on shift' );
	deepEqual(
		modelList.slice( 0 ),
		[modelItem3],
		'es.modelList removes first item on shift'
	);
} );
