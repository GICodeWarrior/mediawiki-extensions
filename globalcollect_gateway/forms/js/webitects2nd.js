/*
 * The following variable are declared inline in webitects_2_3step.html:
 *   amountErrors, billingErrors, paymentErrors, scriptPath, actionURL
 */
$( document ).ready( function () {

	// check for RapidHtml errors and display, if any
	var amountErrorString = "",
		billingErrorString = "",
		paymentErrorString = "";

	// generate formatted errors to display
	var temp = [];
	for ( var e in amountErrors )
		if ( amountErrors[e] != "" )
			temp[temp.length] = amountErrors[e];
	amountErrorString = temp.join( "<br />" );

	temp = [];
	for ( var f in billingErrors )
		if ( billingErrors[f] != "" )
			temp[temp.length] = billingErrors[f];
	billingErrorString = temp.join( "<br />" );

	temp = [];
	for ( var g in paymentErrors )
		if ( paymentErrors[g] != "" )
			temp[temp.length] = paymentErrors[g];
	paymentErrorString = temp.join( "<br />" );

	// show the errors
	var prevError = false;
	if ( amountErrorString != "" ) {
		$( "#amtErrorMessages" ).html( amountErrorString );
		prevError = true;
		showStep2(); // init the headers
		showStep3();
		showStep1(); // should be default, but ensure
	}
	if ( billingErrorString != "" ) {
		$( "#billingErrorMessages" ).html( billingErrorString );
		if ( !prevError ) {
			showStep1(); // init the headers
			showStep3();
			showStep2();
			prevError = true;
		}
		showAmount( $( 'input[name="amount"]' ) ); // lets go ahead and assume there is something to show
	}
	if ( paymentErrorString != "" ) {
		$( "#paymentErrorMessages" ).html( paymentErrorString );
		if ( !prevError ) {
			showStep1(); // init the headers
			showStep2();
			showStep3();
		}
		showAmount( $( 'input[name="amount"]' ) ); // lets go ahead and assume there is something to show
	}

	$( "#paymentContinueBtn" ).live( "click", function() {
		if ( validate_personal( document.paypalcontribution ) ) {
			displayCreditCardForm()
		}
	} );
	// Set the cards to progress to step 3
	$( ".cardradio" ).live( "click", function() {
		if ( validate_personal( document.paypalcontribution ) ) {
			displayCreditCardForm()
		}
		else {
			// show the continue button to indicate how to get to step 3 since they
			// have already clicked on a card image
			$( "#paymentContinue" ).show();
		}
	} );
	
	// init all of the header actions
	$( "#step1header" ).click( function() {
		showStep1();
	} );
	$( "#step2header" ).click( function() {
		showStep2();
	} );
	// Set selected amount to amount
	$( 'input[name="amountRadio"]' ).click( function() {
		setAmount( $( this ) );
	} );
	// reset the amount field when "other" is changed
	$( "#other-amount" ).change( function() {
		setAmount( $( this ) );
	} );

	// show the CVV help image on click
	$( "#where" ).click( function() {
		$( "#codes" ).toggle();
		return false;
	} );

} );


window.showStep1 = function() {
	// show the correct sections
	$( "#step1wrapper" ).slideDown();
	$( "#step2wrapper" ).slideUp();
	$( "#step3wrapper" ).slideUp();
	$( "#change-amount" ).hide();
	$( "#change-billing" ).show();
	$( "#change-payment" ).show();
	$( "#step1header" ).show(); // just in case
}

window.showStep2 = function() {
	if ( $( '#step3wrapper' ).is(":visible") ) {
		$( "#paymentContinue" ).show(); // Show continue button in 2nd section
	}
	// show the correct sections
	$( "#step1wrapper" ).slideUp();
	$( "#step2wrapper" ).slideDown();
	$( "#step3wrapper" ).slideUp();
	$( "#change-amount" ).show();
	$( "#change-billing" ).hide();
	$( "#change-payment" ).show();
	$( "#step2header" ).show(); // just in case
}

window.showStep3 = function() {
	// show the correct sections
	$( "#step1wrapper" ).slideUp();
	$( "#step2wrapper" ).slideUp();
	$( "#step3wrapper" ).slideDown();
	$( "#change-amount" ).show();
	$( "#change-billing" ).show();
	$( "#change-payment" ).hide();
	$( "#step3header" ).show(); // just in case
}