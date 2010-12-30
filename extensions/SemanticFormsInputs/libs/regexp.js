/**
 * Javascript code to be used with input type regexp.
 *
 * @author Stephan Gambke
 * @version 0.4 alpha
 *
 */

/**
 * Validates inputs of type regexp.
 *
 * @param input_number (Number) the number of the input to check
 * @param retext (String) the regular expression the input's value has to match
 * @param inverse (Boolean) if the check result shall be inverted
 * @param message (String) the message too be printed if the input's value does not match
 * @param multiple (Boolean) if the input is inside a multiple-instance formular
 * @return (Boolean) true, if the input's value matches the regular expression in
 *         retext, false otherwise; the value is inverted if inverse is true
 */
function validate_input_with_regexp( input_number, retext, inverse, message, multiple ){

	var decoded = jQuery( "<div/>" ).html( retext ).text();
	var re = new RegExp( decoded );

	if ( multiple ) {
		res = true;
		for ( i = 1; i <= num_elements; i++ ) {
			field = document.getElementById( 'input_' + i + "_" + input_number );
			if ( field ) {
				match = re.test( field.value );

				if ( !( match && !inverse ) && !( !match && inverse ) ) {
					infobox = document.getElementById( 'info_' + i + "_" + input_number );
					infobox.innerHTML += " " + message;
					res=false;
				}
			}
		}
		return res;
	} else {
		field = document.getElementById( 'input_' + input_number );

		jQuery( '#input_' + input_number ).parent().children( '.sfiErrorMessage' ).remove();

		match = re.test( field.value );

		if ( ( match && !inverse ) || ( !match && inverse ) ) {
			return true;
		} else {
			jQuery(field).after( '<span class="sfiErrorMessage"> ' + message + '</span>');
			//infobox = document.getElementById( 'info_' + input_number );
			//infobox.innerHTML += " " + message;
			return false;
		}
	}
}
