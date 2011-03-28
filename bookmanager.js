/*Script here */
/* Navegação pelas setas do teclado */
	$nav = $( ' .mw-book-navigation ' );
	$prev = $nav.find( ' .mw-prev a' );
	$next = $nav.find( ' .mw-next a' );
	if ( $prev[0] ) {
		$(document).bind('keydown', 'left', function(){
			location.href = $prev[0].href;
		});
	}
	if ( $next[0] ) {
		$(document).bind('keydown', 'right', function(){
			 location.href = $next[0].href;
		});
	}

