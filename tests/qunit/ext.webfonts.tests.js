module( 'ext.webfonts', QUnit.newMwEnvironment() );

test( '-- Initial check', function() {
	expect(1);

	ok( mw.webfonts, 'mw.webfonts defined' );
});

test( '-- Dynamic font loading', function() {
	expect( 7 );
	var cssRulesLength = document.styleSheets.length;
	assertTrue( mw.webfonts.addFont( 'Lohit Devanagari' ) , 'Add the Lohit Devanagari font' );
	assertTrue( $.inArray( 'Lohit Devanagari', mw.webfonts.fonts ) >= 0 , 'Font loaded' );
	assertTrue( cssRulesLength +1 === document.styleSheets.length, 'New css rule added to the document' );
	var loadedFontsSize = mw.webfonts.fonts.length;
	assertTrue( mw.webfonts.addFont( 'Lohit Devanagari' ) , 'Add the Lohit Devanagari font again' );
	assertTrue( loadedFontsSize === mw.webfonts.fonts.length , 'Already loaded fonts not loaded again.' );
	assertFalse( mw.webfonts.addFont( 'Some Non existing font' ), 'addFont should return false if font not found' );
	assertTrue( cssRulesLength +1 === document.styleSheets.length, 'No new  css rules added at this stage' );
});

