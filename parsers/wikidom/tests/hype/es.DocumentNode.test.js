module( 'Bases' );

function DocumentNodeStub( items, name, size ) {
	this.name = name;
	this.size = size;
	return es.extendObject( new es.DocumentNode( items ), this );
}

DocumentNodeStub.prototype.getElementLength = function() {
	// Mimic document data which has an opening and closing around the content
	return this.size + 2;
};

test( 'es.DocumentNode', function() {

	// Stub test

	strictEqual(
		( new DocumentNodeStub( [], 'a', 0 ) ).getElementLength(),
		2,
		'DocumentNodeStub.getElementLength() returns initialized length plus 2 for elements'
	);

	// Stubs

	var a = new DocumentNodeStub( [], 'a', 0 ),
		b = new DocumentNodeStub( [], 'b', 1 ),
		c = new DocumentNodeStub( [], 'c', 2 ),
		d = new DocumentNodeStub( [], 'd', 3 ),
		e = new DocumentNodeStub( [], 'e', 4 ),
		root1 = new DocumentNodeStub( [a, b, c, d, e], 'root1', 20 ),
		i;

	// getRangeFromNode tests

	var getRangeFromNodeTests = [
		{ 'input': a, 'output': new es.Range( 0, 2 ) },
		{ 'input': b, 'output': new es.Range( 2, 5 ) },
		{ 'input': c, 'output': new es.Range( 5, 9 ) },
		{ 'input': d, 'output': new es.Range( 9, 14 ) },
		{ 'input': e, 'output': new es.Range( 14, 20 ) },
		{ 'input': null, 'output': null }
	];
	
	for ( i = 0; i < getRangeFromNodeTests.length; i++ ) {
		deepEqual(
			root1.getRangeFromNode( getRangeFromNodeTests[i].input ),
			getRangeFromNodeTests[i].output,
			'getRangeFromNode returns the correct range or null if item is not found'
		);
	}

	// getNodeFromOffset tests

	var getNodeFromOffsetTests = [
		{ 'input': -1, 'output': null },
		{ 'input': 0, 'output': a },
		{ 'input': 1, 'output': a },
		{ 'input': 2, 'output': b },
		{ 'input': 3, 'output': b },
		{ 'input': 4, 'output': b },
		{ 'input': 5, 'output': c },
		{ 'input': 6, 'output': c },
		{ 'input': 7, 'output': c },
		{ 'input': 8, 'output': c },
		{ 'input': 9, 'output': d },
		{ 'input': 10, 'output': d },
		{ 'input': 11, 'output': d },
		{ 'input': 12, 'output': d },
		{ 'input': 13, 'output': d },
		{ 'input': 14, 'output': e },
		{ 'input': 15, 'output': e },
		{ 'input': 16, 'output': e },
		{ 'input': 17, 'output': e },
		{ 'input': 18, 'output': e },
		{ 'input': 19, 'output': e },
		{ 'input': 20, 'output': null }
	];

	for ( i = 0; i < getNodeFromOffsetTests.length; i++ ) {
		strictEqual(
			root1.getNodeFromOffset( getNodeFromOffsetTests[i].input ),
			getNodeFromOffsetTests[i].output,
			'getNodeFromOffset finds the right item or returns null when out of range'
		);
	}

	// getOffsetFromNode tests

	var getOffsetFromNodeTests = [
		{ 'input': a, 'output': 0 },
		{ 'input': b, 'output': 2 },
		{ 'input': c, 'output': 5 },
		{ 'input': d, 'output': 9 },
		{ 'input': e, 'output': 14 },
		{ 'input': null, 'output': -1 }
	];

	for ( i = 0; i < getOffsetFromNodeTests.length; i++ ) {
		strictEqual(
			root1.getOffsetFromNode( getOffsetFromNodeTests[i].input ),
			getOffsetFromNodeTests[i].output,
			'getOffsetFromNode finds the right offset or returns -1 when node is not found'
		);
	}
} );
