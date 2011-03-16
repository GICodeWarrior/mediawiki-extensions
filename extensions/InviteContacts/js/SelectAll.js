var formblock;
var forminputs;

function prepare() {
	formblock = document.getElementById( 'form_id' );
	forminputs = formblock.getElementsByTagName( 'input' );
}

function select_all( name, value ) {
	for( i = 0; i < forminputs.length; i++ ) {
		// regex here to check name attribute
		var regex = new RegExp( name, "i" );
		if( regex.test( forminputs[i].getAttribute( 'name' ) ) ) {
			if( value == '1' ) {
				forminputs[i].checked = true;
			} else {
				forminputs[i].checked = false;
			}
		}
	}
}

if( window.addEventListener ) {
	window.addEventListener( 'load', prepare, false );
} else if( window.attachEvent ) {
	window.attachEvent( 'onload', prepare );
} else if( document.getElementById ) {
	window.onload = prepare;
}