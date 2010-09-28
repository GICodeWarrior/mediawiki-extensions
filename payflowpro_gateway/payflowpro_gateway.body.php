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
	 * A container for the form class
	 *
	 * Used to loard the form object to display the CC form
	 * @var object
	 */
	public $form_class;
	
	/**
	 * An array of form errors
	 * @var array
	 */
	public $errors = array();

	/**
	 * Constructor - set up the new special page
	 */
	public function __construct() {
		parent::__construct( 'PayflowProGateway' );
		wfLoadExtensionMessages( 'PayflowProGateway' );

		$this->errors = $this->getPossibleErrors();
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


		// find out if amount was a radio button or textbox, set amount
		if( isset( $_REQUEST['amount'] ) && preg_match( '/^\d+(\.(\d+)?)?$/', $wgRequest->getText( 'amount' ) ) ) {
			$amount = $wgRequest->getText( 'amount' );
		} elseif( isset( $_REQUEST['amountGiven'] ) && preg_match( '/^\d+(\.(\d+)?)?$/', $wgRequest->getText( 'amountGiven' ) ) ) { 
			$amount = number_format( $wgRequest->getText( 'amountGiven' ), 2, '.', '' );
		} elseif( isset( $_REQUEST['amount'] ) ) { 
			$amount = '0.00';
		} else {
			$amount = '0.00';
		}
		
		// track the number of attempts the user has made
		$numAttempt = $wgRequest->getVal( 'numAttempt', 0 );

		// Get array of default account values necessary for Payflow 
		require_once( 'includes/payflowUser.inc' );

		$payflow_data = payflowUser();

		// Populate form data
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
				$form_errors = $this->fnPayflowValidateForm( $data, $this->errors );
				if( $form_errors ) {
					$this->fnPayflowDisplayForm( $data, $this->errors );
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
					}

					// expose a hook for any post processing
					wfRunHooks( 'PayflowGatewayPostProcess', array( &$this, &$data ));
				}
			} else {
				//Display form for the first time
				$this->fnPayflowDisplayForm( $data, $this->errors );
			}
		} else { 
			// there's a token mismatch
			$this->errors['general']['token-mismatch'] = wfMsg( 'payflowpro_gateway-token-mismatch' );
			$this->fnPayflowDisplayForm( $data, $this->errors );
		}
	}

	/**
	 * Build and displays form to user
	 *
	 * @param $data Array: array of posted user input
	 * @param $error Array: array of error messages returned by validate_form function
	 *
	 * The message at the top of the form can be edited in the payflow_gateway.i18.php file
	 */
	public function fnPayflowDisplayForm( &$data, &$error ) {
		global $wgOut;	

		// save contrib tracking id early to track abondonment
		if ( $data[ 'numAttempt' ] == '0' ) {
			if ( !$tracked = $this->fnPayflowSaveContributionTracking( $data ) ) {
				$when = time();
				wfDebugLog( 'payflowpro_gateway', 'Unable to save data to the contribution_tracking table ' . $when );
			}
		}

		$form_class = $this->getFormClass();
		$form_obj = new $form_class( $data, $error );  	
		$form = $form_obj->generateFormStart();
		$form .= $form_obj->generateFormSubmit();
		$form .= $form_obj->generateFormEnd();
		$wgOut->addHTML( $form );
	}

	/**
	 * Set the form class to use to generate the CC form
	 *
	 * @param string $class_name The class name of the form to use
	 */
	public function setFormClass( $class_name=NULL ) {
		if ( !$class_name ) {
			global $wgRequest, $wgPayflowGatewayDefaultForm;
			$form_class = ( strlen( $wgRequest->getText( 'form_name' ))) ? $wgRequest->getText( 'form_name' ) : $wgPayflowGatewayDefaultForm;
		
			// make sure our form class exists before going on, if not try loading default form class
			$class_name = "PayflowProGateway_Form_" . $form_class;
			if ( !class_exists( $class_name )) {
				$class_name_orig = $class_name;
				$class_name = "PayflowProGateway_Form_" . $wgPayflowGatewayDefaultForm;
				if ( !class_exists( $class_name )) {
					throw new MWException( 'Could not load form ' . $class_name_orig . ' nor default form ' . $class_name );
				}
			}
		}

		$this->form_class = $class_name;
	}

	/**
	 * Get the currently set form class
	 *
	 * Will set the form class if the form class not already set
	 * Using logic in setFormClass()
	 * @return string
	 */
	public function getFormClass( ) {
		if ( !isset( $this->form_class )) {
			$this->setFormClass();
		}
		return $this->form_class;
	}

	/**
	 * Checks posted form data for errors and returns array of messages
	 */
	private function fnPayflowValidateForm( $data, &$error ) {
		global $wgOut;
		
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
		global $wgOut, $wgDonationTestingMode, $wgPayflowGatewayUseHTTPProxy, $wgPayflowGatewayHTTPProxy;

		// update contribution tracking
		$this->updateContributionTracking( $data );
		
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

		// set proxy settings if necessary
		if ( $wgPayflowGatewayUseHTTPProxy ) {
			curl_setopt( $ch, CURLOPT_HTTPPROXYTUNNEL, 1 );
			curl_setopt( $ch, CURLOPT_PROXY, $wgPayflowGatewayHTTPProxy );
		}

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
			list( $key, $value ) = preg_split( "/=/", $result_pair );
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
				$this->errors['retryMsg'] = $responseMsg;
				$this->fnPayflowDisplayForm( $data, $this->errors );
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
		$optout = $this->determineOptOut($data);
		$data[ 'anonymous' ] = $optout[ 'anonymous' ];
		$data[ 'optout' ] = $optout[ 'optout' ];
		$transaction += array_merge( $data, $responseArray );
		
		/**
		 * hook to call stomp functions
		 * 
		 * Sends transaction to Stomp-based queueing service,
		 * eg ActiveMQ
		 */
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
		// unset edit token
		$this->fnPayflowUnsetEditToken();
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
		$wgOut->addHTML( '<h3 class="response_message">' . $declinedDefault . ' ' . $responseMsg . '</h3>' );
		
		// unset edit token
		$this->fnPayflowUnsetEditToken();
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
		$wgOut->addHTML( '<h3 class="response_message">' . $declinedDefault . ' ' . $responseMsg . '</h3>' );
		
		// unset edit token
		$this->fnPayflowUnsetEditToken();
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
		$countries = countryCodes();
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

		// unset edit token
		$this->fnPayflowUnsetEditToken();
	}
	
	/**
	 * Determine proper opt-out settings for contribution tracking
	 * 
	 * because the form elements for comment anonymization and email opt-out
	 * are backwards (they are really opt-in) relative to contribution_tracking
	 * (which is opt-out), we need to reverse the values
	 */
	function determineOptOut( $data ) {
		$optout[ 'optout' ] = ( $data[ 'email-opt' ] == "1" ) ? '0' : '1';
		$optout[ 'anonymous' ] = ( $data[ 'comment-option' ] == "1" ) ? '0' : '1';
		return $optout;
	}
	
	function fnPayflowSaveContributionTracking( &$data ) {
		// determine opt-out settings
		$optout = $this->determineOptOut( $data );

		$db = payflowGatewayConnection();
			
		if (!$db) { return true ; }

		$ts = $db->timestamp();

		$tracked_contribution = array(
			'note' => $data['comment'],
			'referrer' => $data['referrer'],
			'anonymous' => $optout[ 'anonymous' ],
			'utm_source' => $data['utm_source'],
			'utm_medium' => $data['utm_medium'],
			'utm_campaign' => $data['utm_campaign'],
			'optout' => $optout[ 'optout' ],
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
		} else { 
			return false; 
		}		
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
		if ( $val != $sessionToken ) {
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
		
		// if we're in testing mode and an action hasn't yet be specified, prepopulate the form
		if ( !$wgRequest->getText( 'action', false ) && !$numAttempt && $wgPayflowGatewayTest ) {
			// define arrays of cc's and cc #s for random selection
			$cards = array( 'american' );
			$card_nums = array(
				'american' => array(
					378282246310005
				),
			);

			// randomly select a credit card
			$card_index = array_rand( $cards );

			// randomly select a credit card #
			$card_num_index = array_rand( $card_nums[ $cards[ $card_index ]] );

			$data = array(
				'amount' => ( $amount != "0.00" ) ? $amount : "30.00",
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
				'utm_source' => $this->getUtmSource(),
				'utm_medium' => $wgRequest->getText( 'utm_medium' ),
				'utm_campaign' => $wgRequest->getText( 'utm_campaign' ),
				'language' => 'en',
				'comment' => ($wgRequest->getVal( 'comment' )) ? $wgRequest->getVal( 'comment' ) : 'This sure is neat',
				'comment-option' => $wgRequest->getText( 'comment-option' ),
				'email-opt' => $wgRequest->getText( 'email-opt' ),
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
				'referrer' => ( $wgRequest->getVal( 'referrer' )) ? $wgRequest->getVal( 'referrer' ) : $wgRequest->getHeader( 'referer' ),
				'utm_source' => $this->getUtmSource(),
				'utm_medium' => $wgRequest->getText( 'utm_medium' ),
				'utm_campaign' => $wgRequest->getText( 'utm_campaign' ),
				'language' => $wgRequest->getText( 'language' ),
				'comment' => $wgRequest->getText( 'comment' ),
				'comment-option' => $wgRequest->getText( 'comment-option' ),
				'email-opt' => $wgRequest->getText( 'email-opt' ),
				'test_string' => $wgRequest->getText( 'process' ), //for showing payflow string during testing
				'token' => $token,
				'contribution_tracking_id' => $wgRequest->getText( 'contribution_tracking_id' ),
				'data_hash' => $wgRequest->getText( 'data_hash' ),
				'action' => $wgRequest->getText( 'action' ),
			);
		}
		return $data;
	}

	public function getPossibleErrors() {
		return array(
			'general' => '',
			'retryMsg' => '',
			'invalidamount' => '',
			'card_num' => '',
			'card' => '',
			'cvv' => '',
			'fname' => '',
			'lname' => '',
			'city' => '',
			'country' => '',
			'street' => '',
			'state' => '',
			'zip' => '',
			'emailAdd' => '',
		);
	}

	/**
	 * Get the utm_source string
	 *
	 * Checks to see if the utm_source is set properly for the credit card
	 * form including any cc form variants (identified by utm_source_id).  If
	 * anything cc form related is out of place for the utm_source, this
	 * will fix it.
	 *
	 * the utm_source is structured as: banner.landing_page.payment_instrument
	 *
	 * @return string The full utm_source
	 */
	public function getUtmSource() {
		global $wgRequest;

		// fetch whatever was passed in as the utm_source
		$utm_source = $wgRequest->getText( 'utm_source' );
		
		/**
		 * if we have a utm_source_id, then the user is on a single-step credit card form.
		 * if that's the case, we treat the single-step credit card form as a landing page, 
		 * which we label as cc#, where # = the utm_source_id
		 */
		$utm_source_id = $wgRequest->getVal( 'utm_source_id', 0 );
		
		// this is how the CC portion of the utm_source should be defined
		$correct_cc_source = ( $utm_source_id ) ? 'cc' . $utm_source_id . '.cc' : 'cc';
		
		// check to see if the utm_source is already correct - if so, return
		if ( preg_match('/' . str_replace( ".", "\.", $correct_cc_source ) . '$/', $utm_source)) {
			return $utm_source;
		}
		
		// split the utm_source into its parts for easier manipulation
		$source_parts = explode( ".", $utm_source );
		
		// if there are no sourceparts element, then the banner portion of the string needs to be set.
		// since we don't know what it is, set it to an empty string
		if ( !count( $source_parts )) $source_parts[0] = '';
		
		// if the utm_source_id is set, set the landing page portion of the string to cc# 
		$source_parts[1] = ( $utm_source_id ) ? 'cc' . $utm_source_id : ( isset( $source_parts[1] ) ? $source_parts[1] : '');
		
		// the payment instrument portion should always be 'cc' if this method is being accessed
		$source_parts[2] = 'cc';		
		
		// return a reconstructed string
		return implode( ".", $source_parts );
	}

	public function updateContributionTracking( &$data ) {
		// ony update contrib tracking if we're coming from a single-step landing page 
		// which we know with cc# in utm_source
		if ( !preg_match( "/cc[0-9]/", $data[ 'utm_source' ] )) {
			return;
		}

		
		// determine opt-out settings
		$optout = $this->determineOptOut( $data );
		
		$db = payflowGatewayConnection();
			
		if (!$db) { return true ; }

		$tracked_contribution = array(
			'note' => $data['comment'],
			'referrer' => $data['referrer'],
			'anonymous' => $optout[ 'anonymous' ],
			'utm_source' => $data['utm_source'],
			'utm_medium' => $data['utm_medium'],
			'utm_campaign' => $data['utm_campaign'],
			'optout' => $optout[ 'optout' ],
			'language' => $data['language'],
		);
		
		// Make all empty strings NULL
		foreach ($tracked_contribution as $key => $value) {
			if ($value === '') {
				$tracked_contribution[$key] = null;
			}
		}

		$db->update( 'contribution_tracking', $tracked_contribution, array( 'id' => $data[ 'contribution_tracking_id' ] ));
	}
} // end class
