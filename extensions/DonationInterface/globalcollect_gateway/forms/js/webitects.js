
window.displayCreditCardForm = function() {
	$( '#payment' ).empty();
	// Load wait spinner
	$( '#payment' ).append( '<br/><br/><br/><img alt="loading" src="'+mw.config.get( 'wgScriptPath' )+'/extensions/DonationInterface/gateway_forms/includes/loading-white.gif" />' );
	showStep3(); // Open the 3rd section
	var language = 'en'; // default value is English
	var matches = document.location.href.match(/uselang=(\w+)/i); // fine the real language
	if ( matches && matches[1] ) {
		language = matches[1];
	}
	
	var currencyField = document.getElementById( 'currency' );
	var currency = '';
	if ( currencyField && currencyField.type == 'select-one' ) { // currency is a dropdown select
		currency = $( 'select#currency option:selected' ).val();
	} else {
		currency = $( "input[name='currency_code']" ).val();
	}
	
	var stateField = document.getElementById( 'state' );
	var state = '';
	if ( stateField && stateField.type == 'select-one' ) { // state is a dropdown select
		state = $( 'select#state option:selected' ).val();
	} else {
		state = $( "input[name='state']" ).val();
	}
	
	var countryField = document.getElementById( 'country' );
	var country = '';
	if ( countryField && countryField.type == 'select-one' ) { // country is a dropdown select
		country = $( 'select#country option:selected' ).val();
	} else {
		country = $( "input[name='country']" ).val();
	}
	
	var sendData = {
		'action': 'donate',
		'gateway': 'globalcollect',
		'currency': currency,
		'amount': $( "input[name='amount']" ).val(),
		'fname': $( "input[name='fname']" ).val(),
		'lname': $( "input[name='lname']" ).val(),
		'street': $( "input[name='street']" ).val(),
		'city': $( "input[name='city']" ).val(),
		'state': state,
		'zip': $( "input[name='zip']" ).val(),
		'emailAdd': $( "input[name='emailAdd']" ).val(),
		'country': country,
		'payment_method': 'cc',
		'language': language,
		'card_type': $( "input[name='cardtype']:checked" ).val().toLowerCase(),
		'contribution_tracking_id': $( "input[name='contribution_tracking_id']" ).val(),
		'numAttempt': $( "input[name='numAttempt']" ).val(),
		'utm_source': $( "input[name='utm_source']" ).val(),
		'utm_campaign': $( "input[name='utm_campaign']" ).val(),
		'utm_medium': $( "input[name='utm_medium']" ).val(),
		'format': 'json'
	};
	$.ajax( {
		'url': mw.config.get( 'wgServer' ) + mw.config.get( 'wgScriptPath' ) + '/api.php?',
		'data': sendData,
		'dataType': 'json',
		'type': 'GET',
		'success': function( data ) {
			if ( typeof data.result !== 'undefined' ) {
				if ( data.result.errors ) {
					var errors = new Array();
					$.each( data.result.errors, function( index, value ) {
						alert( value ); // Show them the error
						$( "#paymentContinue" ).show(); // Show continue button in 2nd section
						showStep2(); // Switch back to 2nd section of form
					} );
				} else {
					if ( data.result.formaction ) {
						$( '#payment' ).empty();
						// Insert the iframe into the form
						$( '#payment' ).append(
							'<iframe src="'+data.result.formaction+'" width="318" height="314" frameborder="0"></iframe>'
						);

					}
				}
			}
		}
	} );
}


// set the hidden amount input to the value of the selected element
window.setAmount = function( e ) {
	$( 'input[name="amount"]' ).val( e.val() );
}
// Display selected amount
window.showAmount = function( e ) {
	$( "#selected-amount" ).html( "($" + e.val() + ")" );
	$( "#change-amount" ).show();
}
window.validateAmount = function() {
	var error = true;
	var amount = $( 'input[name="amount"]' ).val(); // get the amount
	// Normalize weird amount formats.
	// Don't mess with these unless you know what you're doing.
	amount = amount.replace( /[,.](\d)$/, '\:$10' );
	amount = amount.replace( /[,.](\d)(\d)$/, '\:$1$2' );
	amount = amount.replace( /[,.]/g, '' );
	amount = amount.replace( /:/, '.' );
	$( 'input[name="amount"]' ).val( amount ); // set the new amount back into the form

	// Check amount is a real number, sets error as true (good) if no issues
	error = ( amount == null || isNaN( amount ) || amount.value <= 0 );

	// Check amount is at least the minimum
	var currency_code = $( 'input[name="currency_code"]' ).val();
	if ( typeof( wgCurrencyMinimums[currency_code] ) == 'undefined' ) {
		wgCurrencyMinimums[currency_code] = 1;
	}
	if ( amount < wgCurrencyMinimums[currency_code] || error ) {
		alert( 'You must contribute at least $1'.replace( '$1', wgCurrencyMinimums[currency_code] + ' ' + currency_code ) );
		error = true;
	}
	return !error;
}

window.validate_cc = function() {
	// reset the errors
	$( "#paymentErrorMessages" ).html( '' );
	var error = false;
	if ( $( 'input[name="card_num"]' ).val() == '' ) {
		$( "#paymentErrorMessages" ).append( "Please enter a valid credit card number" );
		error = true;
	}
	if ( $( 'select[name="mos"]' ).val() == '' ) {
		if ( $( "#paymentErrorMessages" ).html() != "" )
			$( "#paymentErrorMessages" ).append( "<br />" );
		$( "#paymentErrorMessages" ).append( "Please enter a valid month for the expiration date" );
		error = true;
	}
	if ( $( 'select[name="year"]' ).val() == '' ) {
		if ( $( "#paymentErrorMessages" ).html() != "" )
			$( "#paymentErrorMessages" ).append( "<br />" );
		$( "#paymentErrorMessages" ).append( "Please enter a valid year for the expiration date" );
		error = true;
	}
	if ( $( 'input[name="cvv"]' ).val() == '' ) {
		if ( $( "#paymentErrorMessages" ).html() != "" )
			$( "#paymentErrorMessages" ).append( "<br />" );
		$( "#paymentErrorMessages" ).append( "Please enter a valid security code" );
		error = true;
	}
	return !error;
}