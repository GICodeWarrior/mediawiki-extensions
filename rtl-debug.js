jQuery('*').each( function( index, elt ) {
	var style = window.getComputedStyle( elt, null );
	var background;
	if ( style.getPropertyValue( 'direction' ) == 'rtl' ) {
		background = '#faa';
	} else {
		background = '#afa';
	}
	elt.style.backgroundColor = background;
} );

