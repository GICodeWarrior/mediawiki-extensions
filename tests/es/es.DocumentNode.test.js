module( 'es/bases' );

/* Stubs */

function DocumentBranchNodeStub( items, name, size ) {
	// Inheritance
	es.DocumentBranchNode.call( this, items );

	// Properties
	this.name = name;
	this.size = size;
}

DocumentBranchNodeStub.prototype.getContentLength = function() {
	return this.size;
};

DocumentBranchNodeStub.prototype.getElementLength = function() {
	// Mimic document data which has an opening and closing around the content
	return this.size + 2;
};

es.extendClass( DocumentBranchNodeStub, es.DocumentBranchNode );

/* Tests */

test( 'es.DocumentBranchNodeStub.getElementLength', 1, function() {
	// Test 1
	strictEqual(
		( new DocumentBranchNodeStub( [], 'a', 0 ) ).getElementLength(),
		2,
		'DocumentBranchNodeStub.getElementLength() returns initialized length plus 2 for elements'
	);
} );

// Common stubs
var a = new DocumentBranchNodeStub( [], 'a', 0 ),
	b = new DocumentBranchNodeStub( [], 'b', 1 ),
	c = new DocumentBranchNodeStub( [], 'c', 2 ),
	d = new DocumentBranchNodeStub( [], 'd', 3 ),
	e = new DocumentBranchNodeStub( [], 'e', 4 ),
	root1 = new DocumentBranchNodeStub( [a, b, c, d, e], 'root1', 20 );

test( 'es.DocumentBranchNode.getRangeFromNode', 6, function() {
	// Tests 1 .. 6
	var getRangeFromNodeTests = [
		{ 'input': a, 'output': new es.Range( 0, 2 ) },
		{ 'input': b, 'output': new es.Range( 2, 5 ) },
		{ 'input': c, 'output': new es.Range( 5, 9 ) },
		{ 'input': d, 'output': new es.Range( 9, 14 ) },
		{ 'input': e, 'output': new es.Range( 14, 20 ) },
		{ 'input': null, 'output': null }
	];
	for ( var i = 0; i < getRangeFromNodeTests.length; i++ ) {
		deepEqual(
			root1.getRangeFromNode( getRangeFromNodeTests[i].input ),
			getRangeFromNodeTests[i].output,
			'getRangeFromNode returns the correct range or null if item is not found'
		);
	}
} );

test( 'es.DocumentBranchNode.getNodeFromOffset', 22, function() {
	// Tests 1 .. 22
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
	for ( var i = 0; i < getNodeFromOffsetTests.length; i++ ) {
		strictEqual(
			root1.getNodeFromOffset( getNodeFromOffsetTests[i].input ),
			getNodeFromOffsetTests[i].output,
			'getNodeFromOffset finds the right item or returns null when out of range'
		);
	}
} );

test( 'es.DocumentBranchNode.getOffsetFromNode', 6, function() {
	// Tests 1 .. 6
	var getOffsetFromNodeTests = [
		{ 'input': a, 'output': 0 },
		{ 'input': b, 'output': 2 },
		{ 'input': c, 'output': 5 },
		{ 'input': d, 'output': 9 },
		{ 'input': e, 'output': 14 },
		{ 'input': null, 'output': -1 }
	];
	for ( var i = 0; i < getOffsetFromNodeTests.length; i++ ) {
		strictEqual(
			root1.getOffsetFromNode( getOffsetFromNodeTests[i].input ),
			getOffsetFromNodeTests[i].output,
			'getOffsetFromNode finds the right offset or returns -1 when node is not found'
		);
	}
} );

test( 'es.DocumentBranchNode.selectNodes', 75, function() {

	// selectNodes tests

	// <f> a b c d e f g h </f> <g> a b c d e f g h </g> <h> a b c d e f g h </h>
	//^   ^ ^ ^ ^ ^ ^ ^ ^ ^    ^   ^ ^ ^ ^ ^ ^ ^ ^ ^    ^   ^ ^ ^ ^ ^ ^ ^ ^ ^     ^
	//0   1 2 3 4 5 6 7 8 9    0   1 2 3 4 5 6 7 8 9    0   1 2 3 4 5 6 7 8 9     0
	//    0 1 2 3 4 5 6 7 8        0 1 2 3 4 5 6 7 8        0 1 2 3 4 5 6 7 8
	var f = new DocumentBranchNodeStub( [], 'f', 8 ),
		g = new DocumentBranchNodeStub( [], 'g', 8 ),
		h = new DocumentBranchNodeStub( [], 'h', 8 ),
		root2 = new DocumentBranchNodeStub( [f, g, h], 'root2', 30 ),
		big = es.DocumentModel.newFromPlainObject( esTest.obj );
	
	// Tests 1 ... 22
	// Possible positions are:
	// * before beginning
	// * at beginning
	// * middle
	// * at end
	// * past end
	var selectNodesTests = [
		// Complete set of combinations within the same node:
		{
			'node': root2,
			'input': new es.Range( 0, 0 ),
			'output': [],
			'desc': 'Zero-length range before the beginning of a node'
		},
		{
			'node': root2,
			'input': new es.Range( 0, 1 ),
			'output': [{ 'node': f, 'range': new es.Range( 0, 0 ) }],
			'desc': 'Range starting before the beginning of a node and ending at the beginning'
		},
		{
			'node': root2,
			'input': new es.Range( 10, 15 ),
			'output': [{ 'node': g, 'range': new es.Range( 0, 4 ) }],
			'desc': 'Range starting before the beginning of a node and ending in the middle'
		},
		{
			'node': root2,
			'input': new es.Range( 20, 29 ),
			'output': [{ 'node': h, 'range': new es.Range( 0, 8 ) }],
			'desc': 'Range starting before the beginning of a node and ending at the end'
		},
		{
			'node': root2,
			'input': new es.Range( 0, 10 ),
			'output': [{ 'node': f } ],
			'desc': 'Range starting before the beginning of a node and ending past the end'
		},
		{
			'node': root2,
			'input': new es.Range( 11, 11 ),
			'output': [{ 'node': g, 'range': new es.Range( 0, 0 ) }],
			'desc': 'Zero-length range at the beginning of a node'
		},
		{
			'node': root2,
			'input': new es.Range( 21, 26 ),
			'output': [{ 'node': h, 'range': new es.Range( 0, 5 ) }],
			'desc': 'Range starting at the beginning of a node and ending in the middle'
		},
		{
			'node': root2,
			'input': new es.Range( 1, 9 ),
			'output': [{ 'node': f, 'range': new es.Range( 0, 8 ) }],
			'desc': 'Range starting at the beginning of a node and ending at the end'
		},
		{
			'node': root2,
			'input': new es.Range( 11, 20 ),
			'output': [{ 'node': g, 'range': new es.Range( 0, 8 ) }],
			'desc': 'Range starting at the beginning of a node and ending past the end'
		},
		{
			'node': root2,
			'input': new es.Range( 22, 22 ),
			'output': [{ 'node': h, 'range': new es.Range( 1, 1 ) }],
			'desc': 'Zero-length range in the middle of a node'
		},
		{
			'node': root2,
			'input': new es.Range( 2, 7 ),
			'output': [{ 'node': f, 'range': new es.Range( 1, 6 ) }],
			'desc': 'Range starting and ending in the middle of the same node'
		},
		{
			'node': root2,
			'input': new es.Range( 13, 19 ),
			'output': [{ 'node': g, 'range': new es.Range( 2, 8 ) }],
			'desc': 'Range starting in the middle of a node and ending at the end'
		},
		{
			'node': root2,
			'input': new es.Range( 24, 30 ),
			'output': [{ 'node': h, 'range': new es.Range( 3, 8 ) }],
			'desc': 'Range starting in the middle of a node and ending past the end'
		},
		{
			'node': root2,
			'input': new es.Range( 9, 9 ),
			'output': [{ 'node': f, 'range': new es.Range( 8, 8 ) }],
			'desc': 'Zero-length range at the end of a node'
		},
		{
			'node': root2,
			'input': new es.Range( 19, 20 ),
			'output': [{ 'node': g, 'range': new es.Range( 8, 8 ) }],
			'desc': 'Range starting at the end of a node and ending past the end'
		},
		{
			'node': root2,
			'input': new es.Range( 30, 30 ),
			'output': [],
			'desc': 'Zero-length range past the end of a node'
		},
		{
			'node': root2,
			'input': new es.Range( 20, 20 ),
			'output': [],
			'desc': 'Zero-length range between two nodes'
		},
		// Complete set of combinations for cross-node selections. Generated with help of a script
		{
			'node': root2,
			'input': new es.Range( 0, 11 ),
			'output': [
				{ 'node': f },
				{ 'node': g, 'range': new es.Range( 0, 0 ) }
			],
			'desc': 'Range starting before the beginning of the first node and ending at the beginning of the second node'
		},
		{
			'node': root2,
			'input': new es.Range( 0, 14 ),
			'output': [
				{ 'node': f },
				{ 'node': g, 'range': new es.Range( 0, 3 ) }
			],
			'desc': 'Range starting before the beginning of the first node and ending in the middle of the second node'
		},
		{
			'node': root2,
			'input': new es.Range( 0, 19 ),
			'output': [
				{ 'node': f },
				{ 'node': g, 'range': new es.Range( 0, 8 ) }
			],
			'desc': 'Range starting before the beginning of the first node and ending at the end of the second node'
		},
		{
			'node': root2,
			'input': new es.Range( 0, 20 ),
			'output': [
				{ 'node': f },
				{ 'node': g }
			],
			'desc': 'Range starting before the beginning of the first node and ending between the second and the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 0, 21 ),
			'output': [
				{ 'node': f },
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 0 ) }
			],
			'desc': 'Range starting before the beginning of the first node and ending at the beginning of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 0, 27 ),
			'output': [
				{ 'node': f },
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 6 ) }
			],
			'desc': 'Range starting before the beginning of the first node and ending in the middle of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 0, 29 ),
			'output': [
				{ 'node': f },
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 8 ) }
			],
			'desc': 'Range starting before the beginning of the first node and ending at the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 0, 30 ),
			'output': [
				{ 'node': f },
				{ 'node': g },
				{ 'node': h }
			],
			'desc': 'Range starting before the beginning of the first node and ending past the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 1, 11 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 0, 8 ) },
				{ 'node': g, 'range': new es.Range( 0, 0 ) }
			],
			'desc': 'Range starting at the beginning of the first node and ending at the beginning of the second node'
		},
		{
			'node': root2,
			'input': new es.Range( 1, 14 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 0, 8 ) },
				{ 'node': g, 'range': new es.Range( 0, 3 ) }
			],
			'desc': 'Range starting at the beginning of the first node and ending in the middle of the second node'
		},
		{
			'node': root2,
			'input': new es.Range( 1, 19 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 0, 8 ) },
				{ 'node': g, 'range': new es.Range( 0, 8 ) }
			],
			'desc': 'Range starting at the beginning of the first node and ending at the end of the second node'
		},
		{
			'node': root2,
			'input': new es.Range( 1, 20 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 0, 8 ) },
				{ 'node': g }
			],
			'desc': 'Range starting at the beginning of the first node and ending between the second and the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 1, 21 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 0, 8 ) },
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 0 ) }
			],
			'desc': 'Range starting at the beginning of the first node and ending at the beginning of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 1, 27 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 0, 8 ) },
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 6 ) }
			],
			'desc': 'Range starting at the beginning of the first node and ending in the middle of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 1, 29 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 0, 8 ) },
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 8 ) }
			],
			'desc': 'Range starting at the beginning of the first node and ending at the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 1, 30 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 0, 8 ) },
				{ 'node': g },
				{ 'node': h }
			],
			'desc': 'Range starting at the beginning of the first node and ending past the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 5, 11 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 4, 8 ) },
				{ 'node': g, 'range': new es.Range( 0, 0 ) }
			],
			'desc': 'Range starting in the middle of the first node and ending at the beginning of the second node'
		},
		{
			'node': root2,
			'input': new es.Range( 5, 14 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 4, 8 ) },
				{ 'node': g, 'range': new es.Range( 0, 3 ) }
			],
			'desc': 'Range starting in the middle of the first node and ending in the middle of the second node'
		},
		{
			'node': root2,
			'input': new es.Range( 5, 19 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 4, 8 ) },
				{ 'node': g, 'range': new es.Range( 0, 8 ) }
			],
			'desc': 'Range starting in the middle of the first node and ending at the end of the second node'
		},
		{
			'node': root2,
			'input': new es.Range( 5, 20 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 4, 8 ) },
				{ 'node': g }
			],
			'desc': 'Range starting in the middle of the first node and ending between the second and the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 5, 21 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 4, 8 ) },
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 0 ) }
			],
			'desc': 'Range starting in the middle of the first node and ending at the beginning of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 5, 27 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 4, 8 ) },
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 6 ) }
			],
			'desc': 'Range starting in the middle of the first node and ending in the middle of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 5, 29 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 4, 8 ) },
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 8 ) }
			],
			'desc': 'Range starting in the middle of the first node and ending at the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 5, 30 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 4, 8 ) },
				{ 'node': g },
				{ 'node': h }
			],
			'desc': 'Range starting in the middle of the first node and ending past the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 9, 11 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 8, 8 ) },
				{ 'node': g, 'range': new es.Range( 0, 0 ) }
			],
			'desc': 'Range starting at the end of the first node and ending at the beginning of the second node'
		},
		{
			'node': root2,
			'input': new es.Range( 9, 14 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 8, 8 ) },
				{ 'node': g, 'range': new es.Range( 0, 3 ) }
			],
			'desc': 'Range starting at the end of the first node and ending in the middle of the second node'
		},
		{
			'node': root2,
			'input': new es.Range( 9, 19 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 8, 8 ) },
				{ 'node': g, 'range': new es.Range( 0, 8 ) }
			],
			'desc': 'Range starting at the end of the first node and ending at the end of the second node'
		},
		{
			'node': root2,
			'input': new es.Range( 9, 20 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 8, 8 ) },
				{ 'node': g }
			],
			'desc': 'Range starting at the end of the first node and ending between the second and the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 9, 21 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 8, 8 ) },
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 0 ) }
			],
			'desc': 'Range starting at the end of the first node and ending at the beginning of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 9, 27 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 8, 8 ) },
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 6 ) }
			],
			'desc': 'Range starting at the end of the first node and ending in the middle of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 9, 29 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 8, 8 ) },
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 8 ) }
			],
			'desc': 'Range starting at the end of the first node and ending at the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 9, 30 ),
			'output': [
				{ 'node': f, 'range': new es.Range( 8, 8 ) },
				{ 'node': g },
				{ 'node': h }
			],
			'desc': 'Range starting at the end of the first node and ending past the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 10, 21 ),
			'output': [
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 0 ) }
			],
			'desc': 'Range starting between the first and the second node and ending at the beginning of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 10, 27 ),
			'output': [
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 6 ) }
			],
			'desc': 'Range starting between the first and the second node and ending in the middle of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 10, 29 ),
			'output': [
				{ 'node': g },
				{ 'node': h, 'range': new es.Range( 0, 8 ) }
			],
			'desc': 'Range starting between the first and the second node and ending at the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 10, 30 ),
			'output': [
				{ 'node': g },
				{ 'node': h }
			],
			'desc': 'Range starting between the first and the second node and ending past the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 11, 21 ),
			'output': [
				{ 'node': g, 'range': new es.Range( 0, 8 ) },
				{ 'node': h, 'range': new es.Range( 0, 0 ) }
			],
			'desc': 'Range starting at the beginning of the second node and ending at the beginning of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 11, 27 ),
			'output': [
				{ 'node': g, 'range': new es.Range( 0, 8 ) },
				{ 'node': h, 'range': new es.Range( 0, 6 ) }
			],
			'desc': 'Range starting at the beginning of the second node and ending in the middle of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 11, 29 ),
			'output': [
				{ 'node': g, 'range': new es.Range( 0, 8 ) },
				{ 'node': h, 'range': new es.Range( 0, 8 ) }
			],
			'desc': 'Range starting at the beginning of the second node and ending at the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 11, 30 ),
			'output': [
				{ 'node': g, 'range': new es.Range( 0, 8 ) },
				{ 'node': h }
			],
			'desc': 'Range starting at the beginning of the second node and ending past the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 14, 21 ),
			'output': [
				{ 'node': g, 'range': new es.Range( 3, 8 ) },
				{ 'node': h, 'range': new es.Range( 0, 0 ) }
			],
			'desc': 'Range starting in the middle of the second node and ending at the beginning of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 14, 27 ),
			'output': [
				{ 'node': g, 'range': new es.Range( 3, 8 ) },
				{ 'node': h, 'range': new es.Range( 0, 6 ) }
			],
			'desc': 'Range starting in the middle of the second node and ending in the middle of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 14, 29 ),
			'output': [
				{ 'node': g, 'range': new es.Range( 3, 8 ) },
				{ 'node': h, 'range': new es.Range( 0, 8 ) }
			],
			'desc': 'Range starting in the middle of the second node and ending at the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 14, 30 ),
			'output': [
				{ 'node': g, 'range': new es.Range( 3, 8 ) },
				{ 'node': h }
			],
			'desc': 'Range starting in the middle of the second node and ending past the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 19, 21 ),
			'output': [
				{ 'node': g, 'range': new es.Range( 8, 8 ) },
				{ 'node': h, 'range': new es.Range( 0, 0 ) }
			],
			'desc': 'Range starting at the end of the second node and ending at the beginning of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 19, 27 ),
			'output': [
				{ 'node': g, 'range': new es.Range( 8, 8 ) },
				{ 'node': h, 'range': new es.Range( 0, 6 ) }
			],
			'desc': 'Range starting at the end of the second node and ending in the middle of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 19, 29 ),
			'output': [
				{ 'node': g, 'range': new es.Range( 8, 8 ) },
				{ 'node': h, 'range': new es.Range( 0, 8 ) }
			],
			'desc': 'Range starting at the end of the second node and ending at the end of the third node'
		},
		{
			'node': root2,
			'input': new es.Range( 19, 30 ),
			'output': [
				{ 'node': g, 'range': new es.Range( 8, 8 ) },
				{ 'node': h }
			],
			'desc': 'Range starting at the end of the second node and ending past the end of the third node'
		},
		// Tests for childless nodes
		{
			'node': g,
			'input': new es.Range( 1, 3 ),
			'output': [
				{ 'node': g, 'range': new es.Range( 1, 3 ) }
			],
			'desc': 'Childless node given, range not out of bounds'
		},
		{
			'node': g,
			'input': new es.Range( 0, 8 ),
			'output': [
				{ 'node': g, 'range': new es.Range( 0, 8 ) }
			],
			'desc': 'Childless node given, range covers entire node'
		},
		// Tests for out-of-bounds cases
		{
			'node': g,
			'input': new es.Range( -1, 3 ),
			'exception': /^The start offset of the range is negative$/,
			'desc': 'Childless node given, range start out of bounds'
		},
		{
			'node': g,
			'input': new es.Range( 1, 9 ),
			'exception': /^The end offset of the range is past the end of the node$/,
			'desc': 'Childless node given, range end out of bounds'
		},
		{
			'node': root2,
			'input': new es.Range( 31, 35 ),
			'exception': /^The start offset of the range is past the end of the node$/,
			'desc': 'Node with children given, range start out of bounds'
		},
		{
			'node': root2,
			'input': new es.Range( 30, 35 ),
			'exception': /^The end offset of the range is past the end of the node$/,
			'desc': 'Node with children given, range end out of bounds'
		},
		// Tests for recursion cases
		{
			'node': big,
			'input': new es.Range( 2, 10 ),
			'output': [
				{ 'node': big.children[0], 'range': new es.Range( 1, 3 ) },
				{ 'node': big.children[1], 'range': new es.Range( 0, 4 ) }
			],
			'desc': 'Select from before the b to after the d'
		},
		{
			'node': big,
			'input': new es.Range( 3, 27 ),
			'output': [
				{ 'node': big.children[0], 'range': new es.Range( 2, 3 ) },
				{ 'node': big.children[1] },
				{ 'node': big.children[2], 'range': new es.Range( 0, 1 ) }
			],
			'desc': 'Select from before the c to after the h'
		},
		{
			'node': big,
			'input': new es.Range( 9, 17 ),
			'output': [
				{ 'node': big.children[1].children[0].children[0].children[0], 'range': new es.Range( 0, 1 ) },
				{ 'node': big.children[1].children[0].children[0].children[1], 'range': new es.Range( 0, 5 ) }
			],
			'desc': 'Select from before the d to after the f, with recursion'
		},
		{
			'node': big,
			'input': new es.Range( 9, 17 ),
			'shallow': true,
			'output': [
				{ 'node': big.children[1], 'range': new es.Range( 3, 11 ) }
			],
			'desc': 'Select from before the d to after the f, without recursion'
		}
	];
	
	for ( var i = 0; i < selectNodesTests.length; i++ ) {
		if ( 'output' in selectNodesTests[i] ) {
			deepEqual(
				selectNodesTests[i].node.selectNodes( selectNodesTests[i].input, selectNodesTests[i].shallow ),
				selectNodesTests[i].output,
				selectNodesTests[i].desc
			);
		} else if ( 'exception' in selectNodesTests[i] ) {
			raises(
				function() {
					selectNodesTests[i].node.selectNodes( selectNodesTests[i].input, selectNodesTests[i].shallow );
				},
				selectNodesTests[i].exception,
				selectNodesTests[i].desc
			);
		}
	}
} );
