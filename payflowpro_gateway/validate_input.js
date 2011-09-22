//<![CDATA[
function addEvent(obj, evType, fn){
	if (obj.addEventListener){
		obj.addEventListener(evType, fn, false);
		return true;
	} else if (obj.attachEvent){
		var r = obj.attachEvent("on"+evType, fn);
		return r;
	} else {
		return false;
	}
}

function getIfSessionSet() {
	sajax_do_call( 'efPayflowGatewayCheckSession', [], checkSession );
}

function clearField( field, defaultValue ) {
	if (field.value == defaultValue) {
		field.value = '';
		field.style.color = 'black';
	}
}
function clearField2( field, defaultValue ) {
	if (field.value != defaultValue) {
		field.value = '';
		field.style.color = 'black';
	}
}

function switchToPayPal() {
	document.getElementById('payflow-table-cc').style.display = 'none';
	document.getElementById('payflowpro_gateway-form-submit').style.display = 'none';
	document.getElementById('payflowpro_gateway-form-submit-paypal').style.display = 'block';
}
function switchToCreditCard() {
	document.getElementById('payflow-table-cc').style.display = 'table';
	document.getElementById('payflowpro_gateway-form-submit').style.display = 'block';
	document.getElementById('payflowpro_gateway-form-submit-paypal').style.display = 'none';
}

/*
 * Validates the personal information fields
 *
 * @input form The form containing the inputs to be checked
 *
 * @return boolean true if no errors, false otherwise (also uses an alert() to notify the user)
 */
function validate_personal( form ){

    // TODO: this form should only report a single error for the email address?

	var output = '';
	var currField = '';
	var i = 0;
	var msg = [ 'EmailAdd', 'Fname', 'Lname', 'Street', 'City', 'Zip'];
	var fields = [ "emailAdd","fname","lname","street","city","zip" ],
		numFields = fields.length;
	for( i = 0; i < numFields; i++ ) {
		if( document.getElementById( fields[i] ).value == '' ) {
			currField = window['payflowproGatewayErrorMsg'+ msg[i]];
			output += payflowproGatewayErrorMsgJs + ' ' + currField + '.\r\n';
		}
	}
	var stateField = document.getElementById( 'state' );
	var countryField = document.getElementById( 'country' );
	if( stateField.options[stateField.selectedIndex].value == 'YY' ) {
		output += payflowproGatewayErrorMsgJs + ' ' + window['payflowproGatewayErrorMsgState'] + '.\r\n';
	}

	if( countryField.type == "select" ){ // country is a dropdown select
		if( countryField.options[countryField.selectedIndex].value == '' ) {
			output += payflowproGatewayErrorMsgJs + ' ' + window['payflowproGatewayErrorMsgCountry'] + '.\r\n';
		}
	}
	else{ // country is a hidden or text input
		if( countryField.value == '' ) {
			output += payflowproGatewayErrorMsgJs + ' ' + window['payflowproGatewayErrorMsgCountry'] + '.\r\n';
		}
	}

	//set state to "outside us"
	if ( form.country.value != 'US' ) {
			form.state.value = 'XX';
	}

	// validate email address
	var apos = form.emailAdd.value.indexOf("@");
	var dotpos = form.emailAdd.value.lastIndexOf(".");

	if( apos < 1 || dotpos-apos < 2 ) {
		output += payflowproGatewayErrorMsgEmail;
	}

	if( output ) {
		alert( output );
		return false;
	}

	return true;
}

function validate_form( form ) {
	if( form == null ){
		form = document.payment
	}

	var output = '';
	var currField = '';
	var i = 0;
	var msg = [ 'EmailAdd', 'Fname', 'Lname', 'Street', 'City', 'Zip', 'CardNum', 'Cvv' ];
	var fields = ["emailAdd","fname","lname","street","city","zip","card_num","cvv" ],
		numFields = fields.length;
	for( i = 0; i < numFields; i++ ) {
		if( document.getElementById( fields[i] ).value == '' ) {
			currField = window['payflowproGatewayErrorMsg'+ msg[i]];
			output += payflowproGatewayErrorMsgJs + ' ' + currField + '.\r\n';
		}
	}
	var stateField = document.getElementById( 'state' );
	var countryField = document.getElementById( 'country' );
	if( stateField.options[stateField.selectedIndex].value == 'YY' ) {
		output += payflowproGatewayErrorMsgJs + ' ' + window['payflowproGatewayErrorMsgState'] + '.\r\n';
	}
	// output += "State:" + stateField.options[stateField.selectedIndex].value + '.\r\n';
	
	if( countryField.type == "select" ){ // country is a dropdown select
		if( countryField.options[countryField.selectedIndex].value == '' ) {
			output += payflowproGatewayErrorMsgJs + ' ' + window['payflowproGatewayErrorMsgCountry'] + '.\r\n';
		}
		// output += "Country:" + countryField.options[countryField.selectedIndex].value + '.\r\n';
	}
	else{ // country is a hidden or text input
		if( countryField.value == '' ) {
			output += payflowproGatewayErrorMsgJs + ' ' + window['payflowproGatewayErrorMsgCountry'] + '.\r\n';
		}
		// output += "Country:" + countryField.value + '.\r\n';
	}

	//set state to "outside us"
	if ( form.country.value != 'US' ) {
			form.state.value = 'XX';
	}

	// validate email address
	var apos = form.emailAdd.value.indexOf("@");
	var dotpos = form.emailAdd.value.lastIndexOf(".");

	if( apos < 1 || dotpos-apos < 2 ) {
		output += payflowproGatewayErrorMsgEmail;
	}

	if( output ) {
		alert( output );
		return false;
	}

	return true;
}

function submit_form( ccform ) {
	if ( validate_form( ccform )) {
		// weird hack!!!!!! for some reasondoing just ccform.submit() throws an error....
		$j(ccform).submit();
	}
	return true;
}

function disableStates( form ) {

		if ( document.payment.country.value != 'US' ) {
			document.payment.state.value = 'XX';
		} else {
			document.payment.state.value = 'YY';
		}

		return true;
}

function showCards() {
	if ( document.getElementById('four_cards') && document.getElementById('two_cards') ) {
		var index = document.getElementById('input_currency_code').selectedIndex;
		if ( document.getElementById('input_currency_code').options[index].value == 'USD' ) {
			document.getElementById('four_cards').style.display = 'table-row';
			document.getElementById('two_cards').style.display = 'none';
		} else {
			document.getElementById('four_cards').style.display = 'none';
			document.getElementById('two_cards').style.display = 'table-row';	
		}
	}
}

var cvv;

function PopupCVV() {
	cvv = window.open("", 'cvvhelp','scrollbars=yes,resizable=yes,width=600,height=400,left=200,top=100');
	cvv.document.write( payflowproGatewayCVVExplain );
	cvv.focus();
}

function CloseCVV() {
	if (cvv) {
		if (!cvv.closed) cvv.close();
		cvv = null;
	}
}

window.onfocus = CloseCVV;
//]]>
