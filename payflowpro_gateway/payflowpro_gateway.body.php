<?php

class PayflowProGateway extends UnlistedSpecialPage {
	
	/**
	 * Defines the action to take on a PFP transaction.
	 *
	 * Possible values include 'process', 'challenge', 
	 * 'review', 'reject'.  These values can be set during
	 * data processing validation, for instance.
	 *
	 * Hooks are exposed to handle the different actions.
	 *
	 * Defaults to 'process'.
	 * @var string
	 */
	public $action = 'process';

	/**
	 * Holds the PayflowPro response from a transaction
	 * @var array
	 */
	public $payflow_response = array();

	/**
	 * Constructor - set up the new special page
	 */
	public function __construct() {
		parent::__construct( 'PayflowProGateway' );
		wfLoadExtensionMessages( 'PayflowProGateway' );
	}

	/**
	 * Show the special page
	 *
	 * @param $par Mixed: parameter passed to the page or null
	 */
	public function execute( $par ) {
		global $wgRequest, $wgOut, $wgUser, $wgScriptPath, $wgPayFlowProGatewayCSSVersion;
		session_cache_limiter( 'nocache' );
		$this->fnPayflowEnsureSession();
		$this->setHeaders();
		
		$wgOut->addHeadItem( 'validatescript', '<script type="text/javascript" language="javascript" src="' . 
				     $wgScriptPath . 
 				     '/extensions/DonationInterface/payflowpro_gateway/validate_input.js"></script>' );

		$wgOut->addExtensionStyle( 
			"{$wgScriptPath}/extensions/DonationInterface/payflowpro_gateway/payflowpro_gateway.css?" . 
			$wgPayFlowProGatewayCSSVersion);
		
		$scriptVars = array(
			'payflowproGatewayErrorMsgJs' => wfMsg( 'payflowpro_gateway-error-msg-js' ),
			'payflowproGatewayErrorMsgEmail' => wfMsg( 'payflowpro_gateway-error-msg-email' ),
			'payflowproGatewayErrorMsgAmount' => wfMsg( 'payflowpro_gateway-error-msg-amount' ),
			'payflowproGatewayErrorMsgEmailAdd' => wfMsg( 'payflowpro_gateway-error-msg-emailAdd' ),
			'payflowproGatewayErrorMsgFname' => wfMsg( 'payflowpro_gateway-error-msg-fname' ),
			'payflowproGatewayErrorMsgLname' => wfMsg( 'payflowpro_gateway-error-msg-lname' ),
			'payflowproGatewayErrorMsgStreet' => wfMsg( 'payflowpro_gateway-error-msg-street' ),
			'payflowproGatewayErrorMsgCity' => wfMsg( 'payflowpro_gateway-error-msg-city' ),
			'payflowproGatewayErrorMsgState' => wfMsg( 'payflowpro_gateway-error-msg-state' ),
			'payflowproGatewayErrorMsgZip' => wfMsg( 'payflowpro_gateway-error-msg-zip' ),
			'payflowproGatewayErrorMsgCardNum' => wfMsg( 'payflowpro_gateway-error-msg-card_num' ),
			'payflowproGatewayErrorMsgExpiration' => wfMsg( 'payflowpro_gateway-error-msg-expiration' ),
			'payflowproGatewayErrorMsgCvv' => wfMsg( 'payflowpro_gateway-error-msg-cvv' ),
			'payflowproGatewayCVVExplain' => wfMsg( 'payflowpro_gateway-cvv-explain' ),
		);
		

		$wgOut->addScript( Skin::makeVariablesScript( $scriptVars ) );
		
		// establish the edit token to prevent csrf
		global $wgPayflowGatewaySalt;
		$token = $this->fnPayflowEditToken( $wgPayflowGatewaySalt ); //$wgUser->editToken( 'mrxc877668DwQQ' );

		$error[] = '';

		// find out if amount was a radio button or textbox, set amount
		if( isset( $_REQUEST['amount'] ) && preg_match( '/^\d+(\.(\d+)?)?$/', $wgRequest->getText( 'amount' ) ) ) {
			$amount = $wgRequest->getText( 'amount' );
		} elseif( isset( $_REQUEST['amountGiven'] ) && preg_match( '/^\d+(\.(\d+)?)?$/', $wgRequest->getText( 'amountGiven' ) ) ) { 
				$amount = number_format( $wgRequest->getText( 'amountGiven' ), 2, '.', '' );
		} elseif( isset( $_REQUEST['amount'] ) ) { 
				$amount = '0.00';
		} else {
				$wgOut->addHTML( wfMsg( 'payflowpro_gateway-accessible' ) );
				return;
		}
		
		// track the number of attempts the user has made
		$numAttempt = ( $wgRequest->getText( 'numAttempt' ) == '' ) ? '0' : $wgRequest->getText( 'numAttempt' );

		// Get array of default account values necessary for Payflow 
		require_once( 'includes/payflowUser.inc' );

		$payflow_data = payflowUser();

		// Populate from data
		$data = $this->fnGetFormData( $amount, $numAttempt, $token, $payflow_data['order_id'] );
		
		// Check form for errors and display 
		// match token
		$token_check = ( $wgRequest->getText( 'token' ) ) ? $wgRequest->getText( 'token' ) : $token;
		$token_match = $this->fnPayflowMatchEditToken( $token_check, $wgPayflowGatewaySalt );
		if( $token_match ) {
			if( $data['payment_method'] == 'processed' ) {
				//increase the count of attempts
				++$data['numAttempt'];
				
				// Check form for errors and redisplay with messages
				$form_errors = $this->fnPayflowValidateForm( $data, $error );
				if( $form_errors ) {
					$this->fnPayflowDisplayForm( $data, $error );
				} else { // The submitted form data is valid, so process it
					// allow any external validators to have their way with the data	
					wfRunHooks( 'PayflowGatewayValidate', array( &$this, &$data ));

					// if the transaction was flagged for review
					if ( $this->action == 'review' ) {
						// expose a hook for external handling of trxns flagged for review
						wfRunHooks( 'PayflowGatewayReview', array( &$this, &$data ));
					}

					// if the transaction was flagged to be 'challenged'
					if ( $this->action == 'challenge' ) {
						// expose a hook for external handling of trxns flagged for challenge (eg captcha)
						wfRunHooks( 'PayflowGatewayChallenge', array( &$this, &$data ));
					}

					// if the transaction was flagged for rejection
					if ( $this->action == 'reject' ) {
						// expose a hook for external handling of trxns flagged for rejection
						wfRunHooks( 'PayflowGatewayReject', array( &$this, &$data ));

						$this->fnPayflowDisplayDeclinedResults( '' );
						$this->fnPayflowUnsetEditToken();
					}

					// if the transaction was flagged for processing
					if ( $this->action == 'process' ) {
						// expose a hook for external handling of trxns ready for processing
						wfRunHooks( 'PayflowGatewayProcess', array( &$this, &$data ));
						$this->fnPayflowProcessTransaction( $data, $payflow_data );
						$this->fnPayflowUnsetEditToken();
					}

					// expose a hook for any post processing
					wfRunHooks( 'PayflowGatewayPostProcess', array( &$this, &$data ));
				}
			} else {
				//Display form for the first time
				$this->fnPayflowDisplayForm($data, $error);
			}
		} else { 
			// there's a token mismatch
			$error['general']['token-mismatch'] = wfMsg( 'payflowpro_gateway-token-mismatch' );
			$this->fnPayflowDisplayForm( $data, $error );
		}
	}

	/**
	 * Build the submission form sans submit button
	 *
	 * This allows for additional form elements/processing to be handled
	 * by extra modules (eg during 'challenge' action)
	 * 
	 * See $this->fnPayflowDisplayForm
	 */
	public function fnPayflowGenerateFormBody( &$data, &$error ) {
		require_once( 'includes/stateAbbreviations.inc' );
		require_once( 'includes/countryCodes.inc' );
	
		global $wgOut, $wgLang, $wgPayflowGatewayHeader, $wgPayflowGatewayTest;

		// save contrib tracking id early to track abondonment
		if ( $data[ 'numAttempt' ] == '0' ) {
			if ( !$tracked = $this->fnPayflowSaveContributionTracking( $data ) ) {
				$when = time();
				wfDebugLog( 'payflowpro_gateway', 'Unable to save data to the contribution_tracking table ' . $when );
			}
		}

		// create drop down of countries
		$countries = countryCodes();

		foreach( $countries as $value => $fullName ) {
			if ( $value == $data['country'] ) {
				$countryMenu .= Xml::option( $fullName, $value, true );
			} else {
				$countryMenu .= Xml::option( $fullName, $value, false ); }
		}
		
		//common HTML tags for table
		$endCell = '</td><td>';
		$endRow = '</td></tr> <tr><td>';
		
		//create drop down of credit card types
		$cardOptions = array(
			'visa' => wfMsg( 'payflow_gateway-card-name-visa' ),
			'mastercard' => wfMsg( 'payflow_gateway-card-name-mc' ),
			'american' => wfMsg( 'payflow_gateway-card-name-amex' ),
			'discover' => wfMsg( 'payflow_gateway-card-name-discover' ),
		);

		foreach( $cardOptions as $value => $fullName ) {
			if ( $value == $data[ 'card' ] && $wgPayflowGatewayTest ) {
				$cardOptionsMenu .= Xml::option( $fullName, $value, true );
			} else {
				$cardOptionsMenu .= Xml::option( $fullName, $value, false );
			}
		}
	
		if ( $data['expiration'] ) {
			$mo = substr( $data['expiration'], 0, 2);
			$yr = substr( $data['expiration'], 2, 2);
		}
		
		//create expiration month menu
		$expMos = '';

		for( $i = 1; $i < 13; $i++ ) {
			if ( $i == $mo && $wgPayflowGatewayTest ) {
				$expMos .= Xml::option( $wgLang->getMonthName( $i ), str_pad( $i, 2, '0', STR_PAD_LEFT ), true );
			} else {
				$expMos .= Xml::option( $wgLang->getMonthName( $i ), str_pad( $i, 2, '0', STR_PAD_LEFT ), false );
			}
		}
		
		//create expiration year menu
		$expYr = '';
  
		for( $i = 0; $i < 11; $i++ ) {
			if ( date( 'Y' ) + $i == substr(date('Y'), 0, 2) . $yr && $wgPayflowGatewayTest ) {
				$expYr .= Xml::option( date( 'Y' ) + $i, date( 'Y' ) + $i, true );
			} else {
				$expYr .= Xml::option( date( 'Y' ) + $i, date( 'Y' ) + $i, false );
			}
		}
		
		$states = statesMenuXML();
		
		$stateMenu = '';

		foreach( $states as $value => $fullName ) {
			if ( $value == $data['state'] ) {
				$stateMenu .= Xml::option( $fullName, $value, true );
			} else $stateMenu .= Xml::option( $fullName, $value, false );
		}
		
		//currencies
		//get available currencies
		$currencies = $this->fnPayflowReturnCurrencies();
		
		$currencyMenu = '';

  		foreach( $currencies as $value => $fullName ) {
    			$currencyMenu .= Xml::option( $fullName, $value );
  		}
  	
  		// Build currency options
  		$default_currency = $data['currency'];
        
  		$currency_options = '';
  	
  		foreach ( $currencies as $code => $name ) {
      		$selected = '';
        	if ( $code == $default_currency ) {
				$selected = ' selected="selected"';
        	}
			$currency_options .= '<option value="' . $code . '"' . $selected . '>' . wfMsg( 'donate_interface-' . $code ) . '</option>';
    	}
		
		// intro text
		if ( $wgPayflowGatewayHeader ) {
			$header = str_replace( '@language', $data['language'], $wgPayflowGatewayHeader );
			$wgOut->addHtml( $wgOut->parse( $header ));
		}	

		$form = Xml::openElement( 'div', array( 'id' => 'mw-creditcard' ) ) .
			Xml::openElement( 'div', array( 'id' => 'mw-creditcard-intro' ) ) .
			Xml::tags( 'p', array( 'class' => 'mw-creditcard-intro-msg' ), wfMsg( 'payflowpro_gateway-form-message' ) ) .
			Xml::closeElement( 'div' );
	
		// provide a place at the top of the form for displaying general messages
		if ( $error['general'] ) {
			$form .= Xml::openElement( 'div', array( 'id' => 'mw-payflow-general-error' ));
			if ( is_array( $error['general'] )) {
				foreach ( $error['general'] as $error_msg ) {
					$form .= Xml::tags( 'p', array( 'class' => 'creditcard-error-msg' ), $error_msg );
				}
			} else {
				$form .= Xml::tags( 'p', array( 'class' => 'creditcard-error-msg' ), $error_msg );
			}
			$form .= Xml::closeElement( 'div' );
		}

		// open form	
		$form .= Xml::openElement( 'div', array( 'id' => 'mw-creditcard-form' ) ) . 
			Xml::element( 'p', array( 'class' => 'creditcard-error-msg' ), $error['retryMsg'] );
		$form .= Xml::openElement( 'form', array( 'name' => 'payment', 'method' => 'post', 'action' => '', 'onsubmit' => 'return validate_form(this)', 'autocomplete' => 'off' ) );
		$form .= Xml::openElement( 'div', array( 'class' => 'payflow-cc-form-section', 'id' => 'payflowpro_gateway-personal-info' ));			;
		$form .= Xml::tags( 'h3', array( 'class' => 'payflow-cc-form-header','id' => 'payflow-cc-form-header-personal' ), wfMsg( 'payflowpro_gateway-cc-form-header-personal' ));
		// donor amount and name			
		$form .= Xml::openElement( 'table', array( 'id' => 'payflow-table-donor' ) );
		$form .= '<tr><td>';
		$form .= Xml::label( wfMsg( 'payflowpro_gateway-donor-fname' ), 'fname' ) .
			$endCell .
			Xml::input( 'fname', '30', $data['fname'], array( 'maxlength' => '15', 'class' => 'required', 'id' => 'fname' ) ) .
			'<span class="creditcard-error-msg">' . '  ' . $error['fname'] . '</span>' .
			$endRow .
			Xml::label( wfMsg( 'payflowpro_gateway-donor-mname' ), 'mname' ) .
			$endCell .
			Xml::input( 'mname', '30', $data['mname'], array( 'maxlength' => '15', 'id' => 'mname' ) ) .
			$endRow .
			Xml::label( wfMsg( 'payflowpro_gateway-donor-lname' ), 'lname' ) .
			$endCell .
			Xml::input( 'lname', '30', $data['lname'], array( 'maxlength' => '15', 'id' => 'lname' ) ) .
			'<span class="creditcard-error-msg">' . '  ' . $error['lname'] . '</span>' .
			$endRow;
			 
		//donor address
		$form .= Xml::label( wfMsg( 'payflowpro_gateway-donor-country' ), 'country' ) .
			 $endCell .
			Xml::openElement( 'select', array( 'name' => 'country', 'id' => 'country', 'onchange' => 'return disableStates( this )' ) ) .
			$countryMenu .
			Xml::closeElement( 'select' )  .
			'<span class="creditcard-error-msg">' . '  ' . $error['country'] . '</span>' .
			$endRow .
			Xml::label( wfMsg( 'payflowpro_gateway-donor-street' ), 'street' ) .
			$endCell .
			Xml::input( 'street', '30', $data['street'], array( 'maxlength' => '30', 'id' => 'street' ) ) .
			'<span class="creditcard-error-msg">' . '  ' . $error['street'] . '</span>' .
			$endRow .
			Xml::label( wfMsg( 'payflowpro_gateway-donor-city' ), 'city' ) .
			$endCell .
			Xml::input( 'city', '30', $data['city'], array( 'maxlength' => '20', 'id' => 'city' ) ) .
			'<span class="creditcard-error-msg">' . '  ' . $error['city'] . '</span>' .
			$endRow .
			Xml::label( wfMsg( 'payflowpro_gateway-donor-state' ), 'state' ) .
			$endCell .
			Xml::openElement( 'select', array( 'name' => 'state', 'id' => 'state' ) ) .
			$stateMenu .
			Xml::closeElement( 'select' ) .
			'<span class="creditcard-error-msg">' . '  ' . $error['state'] . '</span>' .
			$endRow .
			Xml::label( wfMsg( 'payflowpro_gateway-donor-postal' ), 'zip' ) .
			$endCell .
			Xml::input( 'zip', '30', $data['zip'], array( 'maxlength' => '9', 'id' => 'zip' ) ) .
			'<span class="creditcard-error-msg">' . '  ' . $error['zip'] . '</span>' .
			$endRow . 
			Xml::label( wfMsg( 'payflowpro_gateway-donor-email' ), 'emailAdd' ) .
			$endCell . 
			Xml::input( 'emailAdd', '30', $data['email'], array( 'maxlength' => '64', 'id' => 'emailAdd' ) ) .
			'<span class="creditcard-error-msg">' . '  ' . $error['emailAdd'] . '</span>' .
			'</td></tr>' .
			Xml::closeElement( 'table' );
		$form .= Xml::closeElement( 'div' );
			
		// credit card info
		global $wgScriptPath;
		$card_num = ( $wgPayflowGatewayTest ) ? $data[ 'card_num' ] : '';
		$cvv = ( $wgPayflowGatewayTest ) ? $data[ 'cvv' ] : '';
		$form .= Xml::openElement( 'div', array( 'class' => 'payflow-cc-form-section', 'id' => 'payflowpro_gateway-payment-info' ));
		$form .= Xml::tags( 'h3', array( 'class' => 'payflow-cc-form-header', 'id' => 'payflow-cc-form-header-payment' ), wfMsg( 'payflowpro_gateway-cc-form-header-payment' ));
		$form .= Xml::openElement( 'table', array( 'id' => 'payflow-table-cc' ) );
		$form .= '<tr><td>';
		$form .= Xml::label(wfMsg( 'payflowpro_gateway-amount-legend' ), 'amount', array( 'maxlength' => '10' ) ) . 
			$endCell .
			Xml::input( 'amount', '7', $data['amount'], array( 'id' => 'amount' ) ) .
			'<span class="creditcard-error-msg">' . '  ' . $error['invalidamount'] . '</span>' .
			Xml::openElement( 'select', array( 'name' => 'currency_code', 'id' => "input_currency_code" )) .
		      	$currency_options . 
      			Xml::closeElement( 'select' ) .
     			$endRow . 
			'</td><td>' .Xml::openElement( 'img', array( 'src' => $wgScriptPath . "/extensions/DonationInterface/payflowpro_gateway/includes/credit_card_logos.gif" )) .
			$endRow .
			Xml::label( wfMsg( 'payflowpro_gateway-donor-card' ), 'card' ) .
			$endCell .
			Xml::openElement( 'select', array( 'name' => 'card', 'id' => 'card' ) ) .
			$cardOptionsMenu .
			Xml::closeElement( 'select') .
			$endRow .
			Xml::label( wfMsg( 'payflowpro_gateway-donor-card-num' ), 'card_num' ) .
			$endCell .
			Xml::input( 'card_num', '30', $card_num, array( 'maxlength' => '100', 'id' => 'card_num', 'autocomplete' => 'off' ) ) .
			'<span class="creditcard-error-msg">' . '  ' . $error['card_num'] . '</span>' .
			'</tr><tr><td></td><td>' .
			'<span class="creditcard-error-msg">' . '  ' . $error['card'] . '</span>' .
			$endRow .
			Xml::label( wfMsg( 'payflowpro_gateway-donor-expiration' ), 'expiration' ) .
			$endCell .
			Xml::openElement( 'select', array( 'name' => 'mos', 'id' => 'expiration' ) ) .
			$expMos .
			Xml::closeElement( 'select' ) .
			Xml::openElement( 'select', array( 'name' => 'year', 'id' => 'year' ) ) .
			$expYr .
			Xml::closeElement( 'select' ) .
			$endRow .
			Xml::label( wfMsg( 'payflowpro_gateway-donor-security' ), 'cvv' ) .
			$endCell .
			Xml::input( 'cvv', '5', $cvv, array( 'maxlength' => '10', 'id' => 'cvv', 'autocomplete' => 'off') ) .
			'<a href="javascript:PopupCVV();">' . wfMsg( 'word-separator' ) . wfMsg( 'payflowpro_gateway-cvv-link' ) . '</a>' .
			'<span class="creditcard-error-msg">' . '  ' . $error['cvv'] . '</span>' .
			'</td></tr>' .
			Xml::closeElement( 'table' ); 
		
		return $form;
	}

	/**
 	 * Build the submit portion of the submission form
	 *
	 * @fixme There is an open div from fnPayflowGenerateFormBody that this closes
	 * at the end of the method.  This should probably not be the case, but 
	 * was the only way  I could think of gracefully handling this quickly.
	 *
	 * See $this->fnPayflowDiplayForm
	 */
	public function fnPayflowGenerateFormSubmit( &$data, &$error ) {
		// submit button and close form
		$form .= Xml::openElement( 'div', array( 'id' => 'payflowpro_gateway-form-submit'));
		$form .= Xml::openElement( 'div', array( 'id' => 'mw-donate-submit-button' )) . 	
				Xml::submitButton( wfMsg( 'payflowpro_gateway-submit-button' ));
		$form .= Xml::closeElement( 'div' );
		$form .= Xml::openElement( 'div', array( 'class' => 'mw-donate-submessage', 'id' => 'payflowpro_gateway-donate-submessage' ) ) .
			wfMsg( 'payflowpro_gateway-donate-click' ); 
		$form .= Xml::closeElement( 'div' );
		$form .= Xml::closeElement( 'div' );
		$form .= Xml::closeElement( 'div' );
		$form .= Xml::openElement( 'div', array( 'class' => 'payflow-cc-form-section', 'id' => 'payflowpro_gateway-donate-addl-info' ));
		$form .= Xml::tags( 'p', array( 'class' => '' ), 
				wfMsg( 'payflowpro_gateway-credit-storage-processing' ) ) .
			Xml::tags( 'p', array( 'class' => ''), 
				wfMsg( 'payflowpro_gateway-question-comment' ) );
		$form .= Xml::closeElement( 'div' );

		// add hidden fields			
		$form .= Xml::hidden( 'utm_source', $data['utm_source'] ) .
			Xml::hidden( 'utm_medium', $data['utm_medium'] ) .
			Xml::hidden( 'utm_campaign', $data['utm_campaign'] ) .
			Xml::hidden( 'language', $data['language'] ) .
			Xml::hidden( 'referrer', $data['referrer'] ) .
			Xml::hidden( 'comment', $data['comment'] ) .
			Xml::hidden( 'comment-option', $data['anonymous'] ) .
			Xml::hidden( 'email', $data['optout'] ) .
			Xml::hidden( 'process', 'CreditCard' ) .
			Xml::hidden( 'payment_method', 'processed' ) .
			Xml::hidden( 'token', $data['token'] ) .
			Xml::hidden( 'orderid', $data['order_id'] ) .
			Xml::hidden( 'numAttempt', $data['numAttempt'] ) .
			Xml::hidden( 'contribution_tracking_id', $data['contribution_tracking_id'] ) .
			Xml::hidden( 'data_hash', $data[ 'data_hash' ] ) .
			Xml::hidden( 'action', $data[ 'action' ] );
			
		$form .= Xml::closeElement( 'form' ) .
			Xml::closeElement( 'div' ) .
			Xml::closeElement( 'div' );
		return $form;
	}

	/**
	 * Build and displays form to user
	 *
	 * @param $data Array: array of posted user input
	 * @param $error Array: array of error messages returned by validate_form function
	 *
	 * The message at the top of the form can be edited in the payflow_gateway.i18.php file
	 */
	public function fnPayflowDisplayForm( $data, &$error ) {
		global $wgOut;
		$form = $this->fnPayflowGenerateFormBody( $data, $error );
		$form .= $this->fnPayflowGenerateFormSubmit( $data, $error );
		$wgOut->addHTML( $form );
	}

	/**
	 * Checks posted form data for errors and returns array of messages
	 */
	private function fnPayflowValidateForm( $data, &$error ) {
		global $wgOut;
		
		$error = '';

		// begin with no errors
		$error_result = '0';

		// create the human-speak message for required fields
		// does not include fields that are not required
		$msg = array(  
			'amount' => wfMsg( 'payflowpro_gateway-error-msg-amount' ),
			'emailAdd' => wfMsg( 'payflowpro_gateway-error-msg-emailAdd' ),
			'fname' => wfMsg( 'payflowpro_gateway-error-msg-fname' ),
			'lname' => wfMsg( 'payflowpro_gateway-error-msg-lname' ),
			'street' => wfMsg( 'payflowpro_gateway-error-msg-street' ),
			'city' => wfMsg( 'payflowpro_gateway-error-msg-city' ),
			'state' => wfMsg( 'payflowpro_gateway-error-msg-state' ),
			'zip' => wfMsg( 'payflowpro_gateway-error-msg-zip' ),
			'card_num' => wfMsg( 'payflowpro_gateway-error-msg-card_num' ),
			'expiration' => wfMsg( 'payflowpro_gateway-error-msg-expiration' ),
			'cvv' => wfMsg( 'payflowpro_gateway-error-msg-cvv' ),
		);

		// find all empty fields and create message  
		foreach( $data as $key => $value ) {
			if( $value == '' || $data['state'] == 'YY' ) {
				// ignore fields that are not required
				if( isset($msg[$key]) ) {
					$error[$key] = "**" . wfMsg( 'payflowpro_gateway-error-msg', $msg[$key] ) . "**<br />";
					$error_result = '1';
				}
			}
		}
		
		//check amount
		if ( !preg_match( '/^\d+(\.(\d+)?)?$/', $data['amount'] ) || $data['amount'] == "0.00" ) {
			$error['invalidamount'] = wfMsg( 'payflowpro_gateway-error-msg-invalid-amount' );
			$error_result = '1';
		}
			
		// is email address valid?
		$isEmail = User::isValidEmailAddr( $data['email'] );

		// create error message (supercedes empty field message)
		if( !$isEmail ) {
			$error['emailAdd'] = wfMsg( 'payflowpro_gateway-error-msg-email' );
			$error_result = '1';
		}
		
		// validate that credit card number entered is correct for the brand
		switch( $data['card'] ) {
			case 'american':
				// pattern for Amex
				$pattern = '/^3[47][0-9]{13}$/';

				// if the pattern doesn't match
				if( !preg_match( $pattern, $data['card_num']  ) ) {
					$error_result = '1';
					$error['card'] = wfMsg( 'payflowpro_gateway-error-msg-amex' );
				}

				break;

			case 'mastercard':
				// pattern for Mastercard
				$pattern = '/^5[1-5][0-9]{14}$/';

				// if pattern doesn't match
				if( !preg_match( $pattern, $data['card_num'] ) ) {
					$error_result = '1';
					$error['card'] = wfMsg( 'payflowpro_gateway-error-msg-mc' );
				}

				break;

			case 'visa':
				// pattern for Visa
				$pattern = '/^4[0-9]{12}(?:[0-9]{3})?$/';

				// if pattern doesn't match
				if( !preg_match( $pattern, $data['card_num'] ) ) {
					$error_result = '1';
					$error['card'] = wfMsg( 'payflowpro_gateway-error-msg-visa' );
				}

				break;
				
			case 'discover':
				// pattern for Visa
				$pattern = '/^6(?:011|5[0-9]{2})[0-9]{12}$/';

				// if pattern doesn't match
				if( !preg_match( $pattern, $data['card_num'] ) ) {
					$error_result = '1';
					$error['card'] = wfMsg( 'payflowpro_gateway-error-msg-discover' );
				}

				break;
				
				
				
		} // end switch
		
		return $error_result;
	}

	/**
	 * Sends a name-value pair string to Payflow gateway
	 *
	 * @param $data Array: array of user input
	 * @param $payflow_data Array: array of necessary Payflow variables to
	 * 						include in string (i.e. Vendor, password)
	 */
	private function fnPayflowProcessTransaction( $data, $payflow_data ) {
		global $wgOut, $wgDonationTestingMode;

		// create payflow query string, include string lengths
		$queryArray = array(
			'TRXTYPE' => $payflow_data['trxtype'],
			'TENDER'  => $payflow_data['tender'],
			'USER'  => $payflow_data['user'],
			'VENDOR' => $payflow_data['vendor'],
			'PARTNER' => $payflow_data['partner'],
			'PWD' => $payflow_data['password'],
			'ACCT'  => $data['card_num'],
			'EXPDATE' => $data['expiration'],
			'AMT' => $data['amount'],
			'FIRSTNAME' => $data['fname'],
			'LASTNAME' => $data['lname'],
			'STREET' => $data['street'],
			'ZIP' => $data['zip'],
			'INVNUM' => $data['order_id'],
			'CVV2' => $data['cvv'],
			'CURRENCY' => $data['currency'],
			'VERBOSITY' => $payflow_data['verbosity'],
			'CUSTIP' => $payflow_data['user_ip'],
		);

		foreach( $queryArray as $name => $value ) {
			$query[] = $name . '[' . strlen( $value ) . ']=' . $value;
		}

		$queryString = implode( '&', $query );

		$payflow_query = $queryString;

		// assign header data necessary for the curl_setopt() function
		$user_agent = Http::userAgent();
		$headers[] = 'Content-Type: text/namevalue';
		$headers[] = 'Content-Length : ' . strlen( $payflow_query );
		$headers[] = 'X-VPS-Client-Timeout: 45';
		$headers[] = 'X-VPS-Request-ID:' . $data['order_id'];
		$ch = curl_init();
		$paypalPostTo = isset ( $wgDonationTestingMode ) ? 'testingurl' : 'paypalurl'; 
		curl_setopt( $ch, CURLOPT_URL, $payflow_data[ $paypalPostTo ] );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch, CURLOPT_USERAGENT, $user_agent );
		curl_setopt( $ch, CURLOPT_HEADER, 1 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_TIMEOUT, 90 );
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 0 );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $payflow_query );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST,  2 );
		curl_setopt( $ch, CURLOPT_FORBID_REUSE, true ); 
		curl_setopt( $ch, CURLOPT_POST, 1 );

		// As suggested in the PayPal developer forum sample code, try more than once to get a response
		// in case there is a general network issue 
		$i = 1;

		while( $i++ <= 3 ) {
			$result = curl_exec( $ch );
			$headers = curl_getinfo( $ch );

			if( $headers['http_code'] != 200 && $headers['http_code'] != 403 ) {
				sleep( 5 );
			} elseif( $headers['http_code'] == 200 || $headers['http_code'] == 403 ) {
				break;
			}
		}

		if( $headers['http_code'] != 200 ) {
			$wgOut->addHTML( '<h3>No response from credit card processor.  Please try again later!</h3><p>' );
			$when = time();
			wfDebugLog( 'payflowpro_gateway', 'No response from credit card processor ' . $when );
			curl_close( $ch );
			exit;
		}

		curl_close( $ch );

		// get result string
		$result = strstr( $result, 'RESULT' );

		// parse string and display results to the user
		$this->fnPayflowGetResults( $data, $result );
	}

	/**
	 * "Reads" the name-value pair result string returned by Payflow and creates corresponding error messages
	 *
	 * @param $data Array: array of user input
	 * @param $result String: name-value pair results returned by Payflow
	 *
	 * Credit: code modified from payflowpro_example_EC.php posted (and supervised) on the PayPal developers message board
	 */
	private function fnPayflowGetResults( $data, $result ) {
		global $wgOut;

		// prepare NVP response for sorting and outputting 
		$responseArray = array();
		
		/**
		 * The result response string looks like:
		 *	RESULT=7&PNREF=E79P2C651DC2&RESPMSG=Field format error&HOSTCODE=10747&DUPLICATE=1
		 * We want to turn this into an array of key value pairs, so explode on '&' and then 
		 * split up the resulting strings into $key => $value
		 */
		$result_arr = explode( "&", $result );
		foreach ( $result_arr as $result_pair ) {
			list( $key, $value ) = split( "=", $result_pair );
			$responseArray[ $key ] = $value;
		}
	
		// store the response array as an object property for easy retrival/manipulation elsewhere
		$this->payflow_response = $responseArray;

		// errors fall into three categories, "try again please", "sorry it didn't work out", and "approved"
		// get the result code for response array
		$resultCode = $responseArray['RESULT'];

		// initialize response message
		$tryAgainResponse = '';
		$responseMsg = '';

		// interpret result code, return
		// approved (1), denied (2), try again (3), general error (4)
		$errorCode = $this->fnPayflowGetResponseMsg( $resultCode, $responseMsg );

		// if approved, display results and send transaction to the queue
		if( $errorCode == '1' ) {
			$this->fnPayflowDisplayApprovedResults( $data, $responseArray, $responseMsg );
			// give user a second chance to enter incorrect data
		} elseif( ( $errorCode == '3' ) && ( $data['numAttempt'] < '5' ) ) {
			// pass responseMsg as an array key as required by displayForm
				$tryAgainResponse['retryMsg'] = $responseMsg;
				$this->fnPayflowDisplayForm( $data, $tryAgainResponse );
			// if declined or if user has already made two attempts, decline
		} elseif( ( $errorCode == '2' ) || ( $data['numAttempt'] >= '3' ) ) {
				$this->fnPayflowDisplayDeclinedResults( $responseMsg );
		} elseif( ( $errorCode == '4' ) ) {
				$this->fnPayflowDisplayOtherResults( $responseMsg );
		} elseif( ( $errorCode == '5' ) ) {
				$this->fnPayflowDisplayPending( $data, $responseArray, $responseMsg );
		}

	}// end display results

	/**
	 * Interpret response code, return 
	 * 1 if approved
	 * 2 if declined
	 * 3 if invalid data was submitted by user
	 * 4 all other errors
	 */
	function fnPayflowGetResponseMsg( $resultCode, &$responseMsg ) {
		$responseMsg = wfMsg( 'payflowpro_gateway-response-default' );
		$errorCode = '0';

		switch( $resultCode ) {
			case '0':
				$responseMsg = wfMsg( 'payflowpro_gateway-response-0' );
				$errorCode = '1';
				break;
			case '126':
				$responseMsg = wfMsg( 'payflowpro_gateway-response-126-2' );
				$errorCode = '5';
				break;
			case '12':
				$responseMsg = wfMsg( 'payflowpro_gateway-response-12' );
				$errorCode = '2';
				break;
			case '13':
				$responseMsg = wfMsg( 'payflowpro_gateway-response-13' );
				$errorCode = '2';
				break;
			case '114':
				$responseMsg = wfMsg( 'payflowpro_gateway-response-114' );
				$errorCode = '2';
				break;
			case '4':
				$responseMsg = wfMsg( 'payflowpro_gateway-response-4' );
				$errorCode = '3';
				break;
			case '23':
				$responseMsg = wfMsg( 'payflowpro_gateway-response-23' );
				$errorCode = '3';
				break;
			case '24':
				$responseMsg = wfMsg( 'payflowpro_gateway-response-24' );
				$errorCode = '3';
				break;
			case '112':
				$responseMsg = wfMsg( 'payflowpro_gateway-response-112' );
				$errorCode = '3';
				break;
			case '125':
				$responseMsg = wfMsg( 'payflowpro_gateway-response-125-2' );
				$errorCode = '3';
				break;
			default:
				$responseMsg = wfMsg( 'payflowpro_gateway-response-default' );
				$errorCode = '4';
		}

		return $errorCode;
	} 

	/**
	 * Display response message to user with submitted user-supplied data
	 *
	 * @param $data Array: array of posted data from form
	 * @param $responseMsg String: message supplied by getResults function
	 */
	function fnPayflowDisplayApprovedResults( $data, $responseArray, $responseMsg ) {
		require_once( 'includes/countryCodes.inc' );

		global $wgOut, $wgExternalThankYouPage;
		$transaction = '';
		$tracked = '';

		// push to ActiveMQ server 
		// include response message
		$transaction['response'] = $responseMsg;
		// include date
		$transaction['date'] = time();
		// send both the country as text and the three digit ISO code
		$countries = countryCodes();
		$transaction['country_name'] = $countries[$data['country']];
		$transaction['country_code'] = $data['country'];
		// put all data into one array
		$transaction += array_merge( $data, $responseArray );
		
		// hook to call stomp functions
		wfRunHooks( 'gwStomp', array( $transaction ) );

		if ( $wgExternalThankYouPage ) {
			$wgOut->redirect( $wgExternalThankYouPage . "/" . $data['language'] );
		} else {
			// display response message
			$wgOut->addHTML( '<h3 class="response_message">' . $responseMsg . '</h3>' );

			// translate country code into text 
			$countries = countryCodes();

			$rows = array(
				'title' => array( wfMsg( 'payflowpro_gateway-post-transaction' ) ),
				'amount' => array( wfMsg( 'payflowpro_gateway-donor-amount' ), $data['amount'] ),
				'email' => array( wfMsg( 'payflowpro_gateway-donor-email' ), $data['email'] ),
				'name' => array( wfMsg( 'payflowpro_gateway-donor-name' ), $data['fname'], $data['mname'], $data['lname'] ),
				'address' => array( wfMsg( 'payflowpro_gateway-donor-address' ), $data['street'], $data['city'], $data['state'], $data['zip'], $countries[$data['country']] ),
			);

			// if we want to show the response
			$wgOut->addHTML( Xml::buildTable( $rows, array( 'class' => 'submitted-response' ) ) );
		}
	}

	/**
	 * Display response message to user with submitted user-supplied data
	 *
	 * @param $responseMsg String: message supplied by getResults function
	 */
	function fnPayflowDisplayDeclinedResults( $responseMsg ) {
		global $wgOut;

		// general decline message
		$declinedDefault = wfMsg( 'php-response-declined' );

		// display response message
		$wgOut->addHTML( '<h3 class="response_message">' . $declinedDefault . $responseMsg . '</h3>' );
	}

	/**
	 * Display response message when there is a system error unrelated to user's entry
	 *
	 * @param $responseMsg String: message supplied by getResults function
	 */
	function fnPayflowDisplayOtherResults( $responseMsg ) {
		global $wgOut;

		// general decline message
		$declinedDefault = wfMsg( 'php-response-declined' );

		// display response message
		$wgOut->addHTML( '<h3 class="response_message">' . $declinedDefault . $responseMsg . '</h3>' );
	}
	
	function fnPayflowDisplayPending( $data, $responseArray, $responseMsg ) {
		global $wgOut;
		
		$transaction = '';

		// push to ActiveMQ server 
		// include response message
		$transaction['response'] = $responseMsg;
		// include date
		$transaction['date'] = time();
		// send both the country as text and the three digit ISO code
		$transaction['country_name'] = $countries[$data['country']];
		$transaction['country_code'] = $data['country'];
		// put all data into one array
		$transaction += array_merge( $data, $responseArray );

		// hook to call stomp functions
		wfRunHooks( 'gwPendingStomp', array( $transaction ) );

		$thankyou = wfMsg( 'payflowpro_gateway-thankyou' );

		// display response message
		$wgOut->addHTML( '<h2 class="response_message">' . $thankyou . '</h2>' );
		$wgOut->addHTML( '<p>' . $responseMsg );

	}
	
	function fnPayflowSaveContributionTracking( &$data ) {
		$data['optout'] = ($data['optout'] == "1") ? '0' : '1';
		$data['anonymous'] = ($data['anonymous'] == "1") ? '0' : '1';

		$db = payflowGatewayConnection();
			
		if (!$db) { return true ; }

		$ts = $db->timestamp();

		$tracked_contribution = array(
			'note' => $data['comment'],
			'referrer' => $data['referrer'],
			'anonymous' => $data['anonymous'],
			'utm_source' => $data['utm_source'],
			'utm_medium' => $data['utm_medium'],
			'utm_campaign' => $data['utm_campaign'],
			'optout' => $data['optout'],
			'language' => $data['language'],
			'ts' => $ts,
		);
		
		// Make all empty strings NULL
		foreach ($tracked_contribution as $key => $value) {
			if ($value === '') {
				$tracked_contribution[$key] = null;
			}
		}
		
		// Store the contribution data
		if ($db->insert( 'contribution_tracking', $tracked_contribution ) ) {
			$data['contribution_tracking_id'] = $db->insertId();
		 	return true;
		} else { return false; }
		
	}
	
	function fnPayflowReturnCurrencies() {
	
		$payflowCurrencies = array(
			'GBP' => 'GBP: British Pound',
			'EUR' => 'EUR: Euro',
			'USD' => 'USD: U.S. Dollar',
			'AUD' => 'AUD: Australian Dollar',
			'CAD' => 'CAD: Canadian Dollar',
			'JPY' => 'JPY: Japanese Yen',
		);	
		
		return $payflowCurrencies;
	}
	
	/**
	 * Establish an 'edit' token to help prevent CSRF, etc
	 *
	 * We use this in place of $wgUser->editToken() b/c currently
	 * $wgUser->editToken() is broken (apparently by design) for 
	 * anonymous users.  Using $wgUser->editToken() currently exposes 
	 * a security risk for non-authenticated users.  Until this is 
	 * resolved in $wgUser, we'll use our own methods for token
	 * handling.
	 *
	 * @var mixed $salt
	 * @return string
	 */
	function fnPayflowEditToken( $salt='' ) {
		if ( !isset( $_SESSION[ 'payflowEditToken' ] )) {
			//generate unsalted token to place in the session
			$token = self::fnPayflowGenerateToken();
			$_SESSION[ 'payflowEditToken' ] = $token;
		} else {
			$token = $_SESSION[ 'payflowEditToken' ];
		}
		
		if ( is_array( $salt )) {
			$salt = implode( "|", $salt );
		}
		return md5( $token . $salt ) . EDIT_TOKEN_SUFFIX;
	}

	/**
	 * Generate a token string
	 * 
	 * @var mixed $salt
	 * @return string
	 */
	public static function fnPayflowGenerateToken( $salt='' ) {
		$token = dechex( mt_rand() ) . dechex( mt_rand() );
		return md5( $token . $salt );
	}

	/**
	 * Determine the validity of a token
	 *
	 * @var string $val
	 * @var mixed $salt
	 * @return bool
	 */
	function fnPayflowMatchEditToken( $val, $salt='' ) {
		// fetch a salted version of the session token
		$sessionToken = $this->fnPayflowEditToken( $salt );
		if ( $val != $session_token ) {
			wfDebug( "PayflowproGateway::fnPayflowMatchEditToken: broken session data\n" );
		}
		return $val == $sessionToken;
	}

	/**
	 * Unset the payflow edit token from a user's session
	 */
	function fnPayflowUnsetEditToken() {
		unset( $_SESSION[ 'payflowEditToken' ] );
	}

	/**
	 * Ensure that we have a session set for the current user
	 *
	 * If we do not have a session set for the current user, 
	 * start the session.
	 */
	public function fnPayflowEnsureSession() {
		// if the session is already started, do nothing
		if ( session_id() ) return;

		// otherwise, fire it up using global mw function wfSetupSession
		wfSetupSession();
	}

	/**
	 * Populate the $data array for the credit card form
	 *
	 * Provides a way to prepopulate the form with test data using $wgPayflowGatewayTest
	 * @return array
	 */
	public function fnGetFormData( $amount, $numAttempt, $token, $order_id ) {
		global $wgPayflowGatewayTest, $wgRequest;
		if ( $wgRequest->getText( 'email' ) && !$numAttempt && $wgPayflowGatewayTest ) { // if we're in testing mode, prepopulate the form
			// define arrays of cc's and cc #s for random selection
			$cards = array( 'visa', 'mastercard', 'american', 'discover');
			$card_nums = array(
				'visa' => array(
					4111111111111111,
					4012888888881881,
					4222222222222
				),
				'mastercard' => array(
					5105105105105100,
					5555555555554444,
				),
				'american' => array(
					378734493671000,
					371449635398431,
					378282246310005
				),
				'discover' => array(
					6011111111111117,
					6011000990139424
				),
			);

			// randomly select a credit cards
			$card_index = array_rand( $cards );

			// randomly select a credit card #
			$card_num_index = array_rand( $card_nums[ $cards[ $card_index ]] );

			$data = array(
				'amount' => $amount,
				'email' => 'test@example.com',
				'fname' => 'Tester',
				'mname' => 'T.',
				'lname' => 'Testington',
				'street' => '548 Market St.',
				'city' => 'San Francisco',
				'state' => 'CA',
				'zip' => '94104',
				'country' => 840,
				'card' => $cards[ $card_index ],
				'card_num' => $card_nums[ $cards[ $card_index ]][ $card_num_index ],
				'expiration' => date( 'my', strtotime( '+1 year 1 month' )),
				'cvv' => '001',
				'currency' => 'USD',
				'payment_method' => $wgRequest->getText( 'payment_method' ),
				'order_id' => $order_id, 
				'numAttempt' => $numAttempt,
				'referrer' => 'http://www.baz.test.com/index.php?action=foo&action=bar',
				'utm_source' => '.Spam.Support.cc',
				'utm_medium' => $wgRequest->getText( 'utm_medium' ),
				'utm_campaign' => $wgRequest->getText( 'utm_campaign' ),
				'language' => 'en',
				'comment' => 'This sure is neat',
				'anonymous' => $wgRequest->getText( 'comment-option' ),
				'optout' => $wgRequest->getText( 'email' ),
				'test_string' => $wgRequest->getText( 'process' ),
				'token' => $token,
				'contribution_tracking_id' => $wgRequest->getText( 'contribution_tracking_id' ),
				'data_hash' => $wgRequest->getText( 'data_hash' ),
				'action' => $wgRequest->getText( 'action' ),
			);
		} else {
			$data = array(
				'amount' => $amount,
				'email' => $wgRequest->getText( 'emailAdd' ),
				'fname' => $wgRequest->getText( 'fname' ),
				'mname' => $wgRequest->getText( 'mname' ),
				'lname' => $wgRequest->getText( 'lname' ),
				'street' => $wgRequest->getText( 'street' ),
				'city' => $wgRequest->getText( 'city' ),
				'state' => $wgRequest->getText( 'state' ),
				'zip' => $wgRequest->getText( 'zip' ),
				'country' => $wgRequest->getText( 'country' ),
				'card' => $wgRequest->getText( 'card' ),
				'card_num' => str_replace( ' ', '', $wgRequest->getText( 'card_num' ) ),
				'expiration' => $wgRequest->getText( 'mos' ) . substr( $wgRequest->getText( 'year' ), 2, 2 ),
				'cvv' => $wgRequest->getText( 'cvv' ),
				'currency' => $wgRequest->getText( 'currency_code' ),
				'payment_method' => $wgRequest->getText( 'payment_method' ),
				'order_id' => $order_id,
				'numAttempt' => $numAttempt,
				'referrer' => $wgRequest->getText( 'referrer' ),
				'utm_source' => $wgRequest->getText( 'utm_source' ),
				'utm_medium' => $wgRequest->getText( 'utm_medium' ),
				'utm_campaign' => $wgRequest->getText( 'utm_campaign' ),
				'language' => $wgRequest->getText( 'language' ),
				'comment' => $wgRequest->getText( 'comment' ),
				'anonymous' => $wgRequest->getText( 'comment-option' ),
				'optout' => $wgRequest->getText( 'email' ),
				'test_string' => $wgRequest->getText( 'process' ), //for showing payflow string during testing
				'token' => $token,
				'contribution_tracking_id' => $wgRequest->getText( 'contribution_tracking_id' ),
				'data_hash' => $wgRequest->getText( 'data_hash' ),
				'action' => $wgRequest->getText( 'action' ),
			);
		}
		return $data;
	}
} // end class
