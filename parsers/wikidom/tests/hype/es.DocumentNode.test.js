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
	strictEqual(
		( new DocumentNodeStub( [], 'a', 0 ) ).getElementLength(),
		2,
		'DocumentNodeStub.getElementLength() returns initialized length plus 2 for elements'
	);
	var a = new DocumentNodeStub( [], 'a', 0 ),
		b = new DocumentNodeStub( [], 'b', 1 ),
		c = new DocumentNodeStub( [], 'c', 2 ),
		d = new DocumentNodeStub( [], 'd', 3 ),
		e = new DocumentNodeStub( [], 'e', 4 ),
		root1 = new DocumentNodeStub( [a, b, c, d, e], 'root1', 20 ),
		i;

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
} );
