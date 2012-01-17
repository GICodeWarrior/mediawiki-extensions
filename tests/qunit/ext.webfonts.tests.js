module( 'ext.webfonts', QUnit.newMwEnvironment() );

test( '-- Initial check', function() {
	expect(1);

	ok( mw.webfonts, 'mw.webfonts defined' );
} );

test( '-- Dynamic font loading', function() {
	expect( 7 );
	var cssRulesLength = document.styleSheets.length;
	assertTrue( mw.webfonts.addFont( 'Lohit Devanagari' ) , 'Add the Lohit Devanagari font' );
	assertTrue( $.inArray( 'Lohit Devanagari', mw.webfonts.fonts ) >= 0 , 'Font loaded' );
	assertTrue( cssRulesLength + 1 === document.styleSheets.length, 'New css rule added to the document' );
	var loadedFontsSize = mw.webfonts.fonts.length;
	assertTrue( mw.webfonts.addFont( 'Lohit Devanagari' ) , 'Add the Lohit Devanagari font again' );
	assertTrue( loadedFontsSize === mw.webfonts.fonts.length , 'Already loaded fonts not loaded again.' );
	assertFalse( mw.webfonts.addFont( 'Some Non existing font' ), 'addFont should return false if font not found' );
	assertTrue( cssRulesLength + 1 === document.styleSheets.length, 'No new  css rules added at this stage' );
} );

test( '-- Dynamic font loading based on lang attribute', function() {
	expect( 15 );

	ok( $( 'body' ).append( "<p class='webfonts-testing-lang-attr'>Some Content</p>") );
	$testElement =  $( 'p.webfonts-testing-lang-attr' )
	assertTrue( $testElement !== undefined, 'Test element added' ) ;

	ok( mw.webfonts.loadFontsForLangAttr() );
	assertFalse( $testElement.hasClass( 'webfonts-lang-attr' ), 'The element has no webfonts-lang-attr class since there is no lang attribute' ) ;

	ok( $testElement.attr( 'lang' , 'en' ) , 'Set lang attribute as english' );
	ok( mw.webfonts.loadFontsForLangAttr() );
	assertFalse( $testElement.hasClass( 'webfonts-lang-attr' ), 'The element has no webfonts-lang-attr class since there is en lang has no fonts available' ) ;

	ok( $testElement.attr( 'lang' , 'ta' ) , 'Set lang attribute as Tamil' );
	var cssRulesLength = document.styleSheets.length;
	ok( mw.webfonts.loadFontsForLangAttr() );
	assertTrue( $testElement.hasClass( 'webfonts-lang-attr' ), 'The element has webfonts-lang-attr class' ) ;
	assertTrue( $.inArray( 'Lohit Tamil', mw.webfonts.fonts ) >= 0 , 'Font loaded' );
	assertTrue( cssRulesLength + 1 === document.styleSheets.length, 'New css rule added to the document' );

	ok( mw.webfonts.reset() );
	assertFalse( $testElement.hasClass( 'webfonts-lang-attr' ), 'The element has no webfonts-lang-attr since we reset it' ) ;

	ok( $testElement.remove() );
} );

test( '-- Dynamic font loading based on font-family style attribute', function() {
	expect( 14 )

	ok( $( 'body' ).append( "<p class='webfonts-testing-font-family-style'>Some Content</p>") );
	var $testElement = $( 'p.webfonts-testing-font-family-style' );
	assertTrue(  $testElement !== undefined, 'Test element added' ) ;

	$testElement.css( 'font-family', 'RufScript, Arial, Helvetica, sans');
	var cssRulesLength = document.styleSheets.length;
	assertTrue( $.inArray( 'RufScript', mw.webfonts.fonts ) === -1 , 'RufScript Font not loaded yet' );
	ok( mw.webfonts.loadFontsForFontFamilyStyle() );
	assertTrue( $.inArray( 'RufScript', mw.webfonts.fonts ) >= 0 , 'Font loaded' );
	assertTrue( cssRulesLength +1 === document.styleSheets.length, 'New css rule added to the document' );

	$testElement.css( 'font-family', 'NonExistingFont, Arial, Helvetica, sans' );
	cssRulesLength = document.styleSheets.length;
	ok( mw.webfonts.loadFontsForFontFamilyStyle() );
	assertTrue( $.inArray( 'NonExistingFont', mw.webfonts.fonts ) === -1 , 'Font not loaded since it is not existing, including fallback fonts' );
	assertTrue( cssRulesLength === document.styleSheets.length, 'No new css rule added to the document' );

	$testElement.css( 'font-family', 'NonExistingFont, AnjaliOldLipi, Arial, Helvetica, sans');
	cssRulesLength = document.styleSheets.length;
	assertTrue( $.inArray( 'AnjaliOldLipi', mw.webfonts.fonts ) === -1 , 'Fallback font AnjaliOldLipi not loaded yet' );
	ok( mw.webfonts.loadFontsForFontFamilyStyle() );
	assertTrue( $.inArray( 'AnjaliOldLipi', mw.webfonts.fonts ) >= 0 , 'Fallback font AnjaliOldLipi loaded' );
	assertTrue( cssRulesLength + 1 === document.styleSheets.length, 'New css rule added to the document for fallbackfont' );

	ok( $testElement.remove() );
} );


