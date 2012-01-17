module( 'ext.webfonts', QUnit.newMwEnvironment() );

test( '-- Initial check', function() {
	expect(1);

	ok( mw.webfonts, 'mw.webfonts defined' );
});


