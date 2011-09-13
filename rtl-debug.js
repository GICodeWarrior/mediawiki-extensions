(function($) {
	$('*').each( function() {
		var style = window.getComputedStyle( this, null );
		if ( style.getPropertyValue( 'direction' ) == 'rtl' ) {
			$(this).addClass( 'mw-rtldebug-rtl' );
		} else {
			$(this).addClass( 'mw-rtldebug-ltr' );
		}
	} );
})(jQuery);
