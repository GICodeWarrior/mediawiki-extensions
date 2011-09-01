module( 'Base classes' );

test( 'Containers', function() {
	var container1 = new es.Container( 'a' ),
		container2 = new es.Container( 'b' );
	deepEqual( container1.a, [], 'Container list name can be specialized' );
	deepEqual( container2.b, [], 'Container list name can be specialized' );
	
	var updates = 0;
	container1.on( 'update', function( item ) {
		updates++
	} );
	
	// Creating
	
	var item1 = new es.ContainerItem( 'a' ),
		item2 = new es.ContainerItem( 'b' ),
		item3 = new es.ContainerItem( 'c' );
	
	strictEqual( item1.a, null, 'Item container name can be specialized' );
	strictEqual( item2.b, null, 'Item container name can be specialized' );
	strictEqual( item3.c, null, 'Item container name can be specialized' );
	
	// Adding
	
	container1.append( item1 );
	equal( updates, 1, 'es.Container emits update events on append' );
	strictEqual( item1.a, container1, 'es.Container.append attaches item to container' );
	container1.append( item2 );
	equal( updates, 2, 'es.Container emits update events on append' );
	strictEqual( item2.b, container1, 'es.Container.append attaches item to container' );
	container1.append( item3 );
	equal( updates, 3, 'es.Container emits update events on append' );
	strictEqual( item3.c, container1, 'es.Container.append attaches item to container' );
	
	// Accessing
	
	deepEqual( container1.items(), [item1, item2, item3], 'es.Container.items returns all items' )
	
	strictEqual( container1.get( 0 ), item1, 'es.Container.get returns correct item at index' );
	strictEqual( container1.get( 1 ), item2, 'es.Container.get returns correct item at index' );
	strictEqual( container1.get( 2 ), item3, 'es.Container.get returns correct item at index' );
	strictEqual( container1.get( 3 ), null, 'es.Container.get returns null for invalid item' );
	
	equal( container1.indexOf( item1 ), 0, 'es.Container.indexOf returns correct index of item' );
	equal( container1.indexOf( item2 ), 1, 'es.Container.indexOf returns correct index of item' );
	equal( container1.indexOf( item3 ), 2, 'es.Container.indexOf returns correct index of item' );
	equal( container1.indexOf( null ), -1, 'es.Container.indexOf returns -1 for nonexistent items' );
	
	equal( container1.getLength(), 3, 'es.Container.getLength returns correct number of items' );
	strictEqual( container1.first(), item1, 'es.Container.first returns correct first item' );
	strictEqual( container1.last(), item3, 'es.Container.last returns correct first item' );
	
	// Iterating
	
	var items = [],
		indexes = [];
	container1.each( function( item, index ) {
		items.push( item );
		indexes.push( index );
	} );
	equal( items.length, 3, 'es.Container.each iterates over all items' );
	deepEqual( items, [item1, item2, item3], 'es.Container.each provides item as first argument' );
	deepEqual( indexes, [0, 1, 2], 'es.Container.each provides index as first argument' );
	
	var count = 0;
	container1.each( function( item, index ) {
		count++;
		if ( index === 1 ) {
			return false;
		}
	} );
	equal( count, 2, 'es.Container.each stops iterating when a callback returns false' )
	
	// Updating
	
	updates = 0;
	
	item1.emit( 'update' );
	equal( updates, 1, 'es.Container relays update events from items' );
	item2.emit( 'update' );
	equal( updates, 2, 'es.Container relays update events from items' );
	item3.emit( 'update' );
	equal( updates, 3, 'es.Container relays update events from items' );
	
	// Removing
	
	updates = 0;
	
	container1.remove( item3 );
	equal( updates, 1, 'es.Container emits update event on item removal' );
	strictEqual( item3.c, null, 'es.Container.append detaches item to container' );
	
	equal( container1.getLength(), 2, 'es.Container.getLength returns correct number of items' );
	
	container1.remove( item1 );
	equal( updates, 2, 'es.Container emits update event on item removal' );
	strictEqual( item1.a, null, 'es.Container.append detaches item to container' );
	
	equal( container1.getLength(), 1, 'es.Container.getLength returns correct number of items' );
	strictEqual( container1.first(), item2, 'es.Container.first returns correct first item' );
	strictEqual( container1.last(), item2, 'es.Container.last returns correct first item' );
	
	container1.remove( item2 );
	equal( updates, 3, 'es.Container emits update event on item removal' );
	strictEqual( item2.b, null, 'es.Container.append detaches item to container' );
	
	equal( container1.getLength(), 0, 'es.Container.getLength returns correct number of items' );
	strictEqual( container1.first(), null, 'es.Container.first returns null when empty' );
	strictEqual( container1.last(), null, 'es.Container.last returns null when empty' );
	
	updates = 0;
	
	item1.emit( 'update' );
	equal( updates, 0, 'es.Container does not relay events from removed items' );
	item2.emit( 'update' );
	equal( updates, 0, 'es.Container does not relay events from removed items' );
	item3.emit( 'update' );
	equal( updates, 0, 'es.Container does not relay events from removed items' );
	
	// Inserting
	
	container1.append( item1 );
	deepEqual( container1.items(), [item1], 'es.Container.append adds item to end' );
	container1.prepend( item3 );
	deepEqual( container1.items(), [item3, item1], 'es.Container.prepend adds item to begining' );
	container1.insertBefore( item2, item1 );
	deepEqual(
		container1.items(),
		[item3, item2, item1],
		'es.Container.insertBefore inserts item before another'
	);
	container1.insertBefore( item2, item3 );
	deepEqual(
		container1.items(),
		[item2, item3, item1],
		'es.Container.insertBefore moves item before another'
	);
	
	container2.prepend( item1 );
	deepEqual( container2.items(), [item1], 'es.Container.prepend adds item to begining' );
	container2.append( item3 );
	deepEqual( container2.items(), [item1, item3], 'es.Container.append adds item to end' );
	container2.insertAfter( item2, item1 );
	deepEqual(
		container2.items(),
		[item1, item2, item3],
		'es.Container.insertAfter inserts item after another'
	);
	container2.insertAfter( item1, item2 );
	deepEqual(
		container2.items(),
		[item2, item1, item3],
		'es.Container.insertAfter moves item after another'
	);
	
	// TODO: Events for appending, prepending, inserting and removing
} );

function ContentStub( name, size ) {
	this.name = name;
	this.size = size;
}

ContentStub.prototype.getLength = function() {
	return this.size;
};

test( 'ContentSeries lookup, rangeOf and getLengthOfItems', function() {
	strictEqual(
		( new ContentStub( 'a', 0 ) ).getLength(),
		0,
		'Stub.getLength() returns value that it was initialized with'
	);
	var a = new ContentStub( 'a', 0 ),
		b = new ContentStub( 'b', 1 ),
		c = new ContentStub( 'c', 2 ),
		d = new ContentStub( 'd', 3 ),
		e = new ContentStub( 'e', 4 ),
		contentSeries = new es.ContentSeries( [ a, b, c, d, e ] );
		
	var lengthOfItemsTests = [
		{ 'input' : [ ], 'output' : 0 },
		{ 'input' : [ a ], 'output' : 0 },
		{ 'input' : [ a, b ], 'output' : 2 },
		{ 'input' : [ a, b, c ], 'output' : 5 },
		{ 'input' : [ a, b, c, d ], 'output' : 9 },
		{ 'input' : [ a, b, c, d, e ], 'output' : 14 }
	];

	for ( var i = 0; i < lengthOfItemsTests.length; i++ ) {
		strictEqual(
			( new es.ContentSeries( lengthOfItemsTests[i].input ) ).getLengthOfItems(),
			lengthOfItemsTests[i].output,
			'es.ContentSeries.getLengthOfItems returns correct value'
		);
	}

	var lookupTests = [
		{ 'input' : -1, 'output' : null },
		{ 'input' : 0, 'output' : a },
		{ 'input' : 1, 'output' : b },
		{ 'input' : 2, 'output' : b },
		{ 'input' : 3, 'output' : c },
		{ 'input' : 4, 'output' : c },
		{ 'input' : 5, 'output' : c },
		{ 'input' : 6, 'output' : d },
		{ 'input' : 7, 'output' : d },
		{ 'input' : 8, 'output' : d },
		{ 'input' : 9, 'output' : d },
		{ 'input' : 10, 'output' : e },
		{ 'input' : 11, 'output' : e },
		{ 'input' : 12, 'output' : e },
		{ 'input' : 13, 'output' : e },
		{ 'input' : 14, 'output' : e },
		{ 'input' : 15, 'output' : null }
	];
	
	for ( var i = 0; i < lookupTests.length; i++ ) {
		strictEqual(
			contentSeries.lookup( lookupTests[i].input ),
			lookupTests[i].output,
			'es.ContentSeries.lookup finds the right item or returns null when out of range'
		);
	}
	
	var rangeOfTests = [
		{ 'input' : a, 'output' : new es.Range( 0, 0 ) },
		{ 'input' : b, 'output' : new es.Range( 1, 2 ) },
		{ 'input' : c, 'output' : new es.Range( 3, 5 ) },
		{ 'input' : d, 'output' : new es.Range( 6, 9 ) },
		{ 'input' : e, 'output' : new es.Range( 10, 14 ) },
		{ 'input' : null, 'output' : null }
	];
	
	for ( var i = 0; i < rangeOfTests.length; i++ ) {
		deepEqual(
			contentSeries.rangeOf( rangeOfTests[i].input ),
			rangeOfTests[i].output,
			'es.ContentSeries.rangeOf returns the correct range or null if item is not found'
		);
	}

} );

test( 'ContentSeries Selection', function() {
	var a = new ContentStub( 'a', 10 ),
		b = new ContentStub( 'b', 10 ),
		c = new ContentStub( 'c', 10 ),
		contentSeries = new es.ContentSeries( [a, b, c] )
		tests = [
			{
				'input': [5, 9],
				'output': [{ 'item': a, 'from': 5, 'to': 9 }]
			},
			{
				'input': [5, 10],
				'output': [{ 'item': a, 'from': 5, 'to': 10 }]
			},
			{
				'input': [5, 11],
				'output': [{ 'item': a, 'from': 5, 'to': 10 }]
			},
			{
				'input': [5, 12],
				'output': [{ 'item': a, 'from': 5, 'to': 10 }, { 'item': b, 'from': 0, 'to': 1 }]
			},
			{
				'input': [8, 16],
				'output': [{ 'item': a, 'from': 8, 'to': 10 }, { 'item': b, 'from': 0, 'to': 5 }]
			},
			{
				'input': [9, 16],
				'output': [{ 'item': a, 'from': 9, 'to': 10 }, { 'item': b, 'from': 0, 'to': 5 }]
			},
			{
				'input': [10, 16],
				'output': [{ 'item': b, 'from': 0, 'to': 5 }]
			},
			{
				'input': [11, 16],
				'output': [{ 'item': b, 'from': 0, 'to': 5 }]
			},
			{
				'input': [12, 16],
				'output': [{ 'item': b, 'from': 1, 'to': 5 }]
			}
		];
	for ( var i = 0; i < tests.length; i++ ) {
		deepEqual(
			contentSeries.select.apply( contentSeries, tests[i].input ),
			tests[i].output,
			'es.ContentSeries.select returns the correct items and ranges.'
		);
	}
} );
