module( 'ext.webfonts', QUnit.newMwEnvironment() );

test( '-- Initial check', function() {
	expect(1);

	ok( mw.webfonts, 'mw.webfonts is defined' );
} );

test( '-- Dynamic font loading', function() {
	expect( 7 );

	var validFontName = 'Lohit Devanagari';
	mw.webfonts.fonts = [];
	var cssRulesLength = document.styleSheets.length;
	assertTrue( mw.webfonts.addFont( validFontName ) , 'Add the ' + validFontName + ' font' );
	assertTrue( $.inArray( validFontName, mw.webfonts.fonts ) >= 0 , validFontName + ' font loaded' );
	assertTrue( cssRulesLength + 1 === document.styleSheets.length, 'New css rule added to the document' );
	var loadedFontsSize = mw.webfonts.fonts.length;
	assertTrue( mw.webfonts.addFont( validFontName ) , 'Add the ' + validFontName + ' font again' );
	assertTrue( loadedFontsSize === mw.webfonts.fonts.length , 'A font that is already loaded is not loaded again' );
	assertFalse( mw.webfonts.addFont( 'Some non-existing font' ), 'addFont returns false if the font was not found' );
	assertTrue( cssRulesLength + 1 === document.styleSheets.length, 'Loading the font does not add new css rules' );
} );

test( '-- Dynamic font loading based on lang attribute', function() {
	expect( 15 );

	mw.webfonts.fonts = [];
	mw.config.set( {
		wgLanguage: "en",
		wgUserVariant: "en",
		wgUserLanguage: "en",
		wgPageContentLanguage: "en",
	} );
	
	ok( $( 'body' ).append( "<p class='webfonts-testing-lang-attr'>Some content</p>"), ' A testing element was appended to <body>' );
	$testElement =  $( 'p.webfonts-testing-lang-attr' )
	assertTrue( $testElement !== [], 'The test element is defined' );

	ok( mw.webfonts.loadFontsForLangAttr(), 'Attempted to load fonts for the lang attribute' );
	assertFalse( $testElement.hasClass( 'webfonts-lang-attr' ), 'The element has no webfonts-lang-attr class since there is no lang attribute' );

	ok( $testElement.attr( 'lang' , 'en' ) , 'The lang attribute of the test element was set to en (English)' );
	ok( mw.webfonts.loadFontsForLangAttr(), 'Attempted to load fonts for the lang attribute en' );
	assertFalse( $testElement.hasClass( 'webfonts-lang-attr' ), 'The test element has no webfonts-lang-attr class since en lang has no fonts available' );

	var tamilFont = 'Lohit Tamil';
	ok( $testElement.attr( 'lang' , 'ta' ) , 'Set lang attribute to ta (Tamil)' );
	ok( mw.webfonts.loadFontsForLangAttr(), 'Attempted to load fonts for the lang attribute ta' );
	assertTrue( $testElement.hasClass( 'webfonts-lang-attr' ), 'The test element has webfonts-lang-attr class' );
	assertTrue( $.inArray( tamilFont, mw.webfonts.fonts ) >= 0 , tamilFont + ' font loaded' );
	assertTrue( isFontFaceLoaded( tamilFont ), 'New css rule font-face was added to the document for font ' + tamilFont );

	ok( mw.webfonts.reset(), 'Reset webfonts' );
	assertFalse( $testElement.hasClass( 'webfonts-lang-attr' ), 'The element has no webfonts-lang-attr since we reset it' );

	ok( $testElement.remove(), 'The test element was removed from <body>' );
} );

test( '-- Dynamic font loading based on font-family style attribute', function() {
	expect( 14 )

	mw.webfonts.fonts = [];
	ok( $( 'body' ).append( "<p class='webfonts-testing-font-family-style'>Some Content</p>" ) );
	var $testElement = $( 'p.webfonts-testing-font-family-style' );
	assertTrue(  $testElement !== [], 'Test element added' );

	$testElement.attr( 'style','font-family: RufScript, Arial, Helvetica, sans' );
	assertTrue( $.inArray( 'RufScript', mw.webfonts.fonts ) === -1 , 'RufScript Font not loaded yet' );
	ok( mw.webfonts.loadFontsForFontFamilyStyle() );
	assertTrue( $.inArray( 'RufScript', mw.webfonts.fonts ) >= 0 , 'Font loaded' );
	assertTrue( isFontFaceLoaded('RufScript'), 'New css rule added to the document for RufScript'  );

	$testElement.attr( 'style','font-family: NonExistingFont, Arial, Helvetica, sans' );
	ok( mw.webfonts.loadFontsForFontFamilyStyle() );
	assertTrue( $.inArray( 'NonExistingFont', mw.webfonts.fonts ) === -1 , 'Font not loaded since it is not existing, including fallback fonts' );
	assertFalse( isFontFaceLoaded( 'NonExistingFont' ), 'No new css rule added to the document' );
	
	$testElement.attr( 'style','font-family: NonExistingFont, AnjaliOldLipi, Arial, Helvetica, sans' );
	assertTrue( $.inArray( 'AnjaliOldLipi', mw.webfonts.fonts ) === -1 , 'Fallback font AnjaliOldLipi not loaded yet' );
	ok( mw.webfonts.loadFontsForFontFamilyStyle() );
	assertTrue( $.inArray( 'AnjaliOldLipi', mw.webfonts.fonts ) >= 0 , 'Fallback font AnjaliOldLipi loaded' );
	assertTrue( isFontFaceLoaded('AnjaliOldLipi') , 'New css rule added to the document for fallbackfont AnjaliOldLipi' );

	ok( $testElement.remove() );
} );

isFontFaceLoaded = function(fontFamilyName){
	var lastStyleIndex = document.styleSheets.length-1;
	// Iterate from last.
	for( var styleIndex = lastStyleIndex; styleIndex > 0; styleIndex-- ){
		var lastStyleSheet = document.styleSheets[styleIndex];
		if ( !lastStyleSheet ) continue;
		if ( !lastStyleSheet.cssRules[0] ) continue;
		var cssText =  lastStyleSheet.cssRules[0].cssText;
		if ( cssText.indexOf( '@font-face' ) >= 0 &&  cssText.indexOf( fontFamilyName ) >= 0 ){
			return true;
		}
	}
	return false;
}
