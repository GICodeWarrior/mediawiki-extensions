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
		$this->errors = $this->getPossibleErrors();
	}

	/**
	 * Show the special page
	 *
	 * @param $par Mixed: parameter passed to the page or null
	 */
	public function execute( $par ) {
		global $wgRequest, $wgOut, $wgScriptPath,
			$wgPayFlowProGatewayCSSVersion,
			$wgPayflowGatewaySalt;

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
			'payflowproGatewayErrorMsgCountry' => wfMsg( 'payflowpro_gateway-error-msg-country' ),
			'payflowproGatewayErrorMsgCardNum' => wfMsg( 'payflowpro_gateway-error-msg-card_num' ),
			'payflowproGatewayErrorMsgExpiration' => wfMsg( 'payflowpro_gateway-error-msg-expiration' ),
			'payflowproGatewayErrorMsgCvv' => wfMsg( 'payflowpro_gateway-error-msg-cvv' ),
			'payflowproGatewayCVVExplain' => wfMsg( 'payflowpro_gateway-cvv-explain' ),
		);

		$wgOut->addScript( Skin::makeVariablesScript( $scriptVars ) );

		// @fixme can this be moved into the form generators?
        // @fixme this is broken on MW 1.16, executes before jQuery load
		 $js = <<<EOT
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("div#p-logo a").attr("href","#");
});
</script>
EOT;
        $wgOut->addHeadItem( 'logolinkoverride', $js );

		// find out if amount was a radio button or textbox, set amount
		if ( isset( $_REQUEST['amount'] ) && preg_match( '/^\d+(\.(\d+)?)?$/', $wgRequest->getText( 'amount' ) ) ) {
			$amount = $wgRequest->getText( 'amount' );
		} elseif ( isset( $_REQUEST['amountGiven'] ) && preg_match( '/^\d+(\.(\d+)?)?$/', $wgRequest->getText( 'amountGiven' ) ) ) {
			$amount = number_format( $wgRequest->getText( 'amountGiven' ), 2, '.', '' );
		} elseif ( isset( $_REQUEST['amount'] ) ) {
			$amount = '0.00';
		} elseif ( $wgRequest->getText( 'amount' ) == '-1' ) {
			$amount = $wgRequest->getText( 'amountOther' );
		} else {
			$amount = '0.00';
		}

		// track the number of attempts the user has made
		$numAttempt = $wgRequest->getVal( 'numAttempt', 0 );

		// Get array of default account values necessary for Payflow
		require_once( 'includes/payflowUser.inc' );

		$payflow_data = payflowUser();

		// make a log entry if the user has submitted the cc form
		if ( $wgRequest->wasPosted() && $wgRequest->getText( 'process', 0 )) {
			self::log( $payflow_data[ 'order_id' ] . " Transaction initiated." );			
		} else {
			self::log( $payflow_data[ 'order_id' ] . " " . $payflow_data[ 'i_order_id' ] . " Initial credit card form request.", 'payflowpro_gateway', LOG_DEBUG );
		}

		// if _cache_ is requested by the user, do not set a session/token; dynamic data will be loaded via ajax
		if ( $wgRequest->getText( '_cache_', false ) ) {
			self::log( $payflow_data[ 'order_id' ] . " " . $payflow_data[ 'i_order_id' ] . " Cache requested", 'payflowpro_gateway', LOG_DEBUG );
			$cache = true;
			$token = '';
			$token_match = false;

			// if we have squid caching enabled, set the maxage
			global $wgUseSquid, $wgPayflowSMaxAge;
			if ( $wgUseSquid ) {
				self::log( $payflow_data[ 'order_id' ] .  " " . $payflow_data[ 'i_order_id' ] . " Setting s-max-age: " . $wgPayflowSMaxAge, 'payflowpro_gateway', LOG_DEBUG );
				$wgOut->setSquidMaxage( $wgPayflowSMaxAge );	
			}
		} else {
			$cache = false;

			// establish the edit token to prevent csrf
			$token = self::fnPayflowEditToken( $wgPayflowGatewaySalt );
			
			self::log( $payflow_data[ 'order_id' ] .  " " . $payflow_data[ 'i_order_id' ] . " fnPayflowEditToken: " . $token, 'payflowpro_gateway', LOG_DEBUG );
			
			// match token
			$token_check = ( $wgRequest->getText( 'token' ) ) ? $wgRequest->getText( 'token' ) : $token;
			$token_match = $this->fnPayflowMatchEditToken( $token_check, $wgPayflowGatewaySalt );
			if ( $wgRequest->wasPosted() ) {
				self::log( $payflow_data[ 'order_id' ] .  " " . $payflow_data[ 'i_order_id' ] . " Submitted edit token: " . $wgRequest->getText( 'token', 'None' ), 'payflowpro_gateway', LOG_DEBUG);
				self::log( $payflow_data[ 'order_id' ] . " " . $payflow_data[ 'i_order_id' ] . " Token match: " . ($token_match ? 'true' : 'false' ), 'payflowpro_gateway', LOG_DEBUG );
			}
		}

		$this->setHeaders();

		// Populate form data
		$data = $this->fnGetFormData( $amount, $numAttempt, $token, $payflow_data['order_id'], $payflow_data['i_order_id'] );

		/**
		 *  handle PayPal redirection
		 *
		 *  if paypal redirection is enabled ($wgPayflowGatewayPaypalURL must be defined)
		 *  and the PaypalRedirect form value must be true
		 */
		if ( $wgRequest->getText( 'PaypalRedirect', 0 ) ) {
			$this->paypalRedirect( $data );
			return;
		}
		// dispatch forms/handling
		if ( $token_match ) {
			if ( $data['payment_method'] == 'processed' ) {
				
				// increase the count of attempts
				++$data['numAttempt'];
				// Check form for errors and redisplay with messages
				$form_errors = $this->fnPayflowValidateForm( $data, $this->errors );
				if ( $form_errors ) {
					$this->fnPayflowDisplayForm( $data, $this->errors );
				} else { // The submitted form data is valid, so process it
					// allow any external validators to have their way with the data
					self::log( $data[ 'order_id' ] . " Preparing to query MaxMind" );
					wfRunHooks( 'PayflowGatewayValidate', array( &$this, &$data ) );
					self::log( $data[ 'order_id' ] . ' Finished querying Maxmind' );

					// if the transaction was flagged for review
					if ( $this->action == 'review' ) {
						// expose a hook for external handling of trxns flagged for review
						wfRunHooks( 'PayflowGatewayReview', array( &$this, &$data ));
					}

					// if the transaction was flagged to be 'challenged'
					if ( $this->action == 'challenge' ) {
						// expose a hook for external handling of trxns flagged for challenge (eg captcha)
						wfRunHooks( 'PayflowGatewayChallenge', array( &$this, &$data ) );
					}

					// if the transaction was flagged for rejection
					if ( $this->action == 'reject' ) {
						// expose a hook for external handling of trxns flagged for rejection
						wfRunHooks( 'PayflowGatewayReject', array( &$this, &$data ) );

						$this->fnPayflowDisplayDeclinedResults( '' );
						$this->fnPayflowUnsetEditToken();
					}

					// if the transaction was flagged for processing
					if ( $this->action == 'process' ) {
						// expose a hook for external handling of trxns ready for processing
						wfRunHooks( 'PayflowGatewayProcess', array( &$this, &$data ) );
						$this->fnPayflowProcessTransaction( $data, $payflow_data );
					}

					// expose a hook for any post processing
					wfRunHooks( 'PayflowGatewayPostProcess', array( &$this, &$data ) );
				}
			} else {
				// Display form for the first time
				$this->fnPayflowDisplayForm( $data, $this->errors );
			}
		} else {
			if ( !$cache ) {
				// if we're not caching, there's a token mismatch
				$this->errors['general']['token-mismatch'] = wfMsg( 'payflowpro_gateway-token-mismatch' );
			}
			$this->fnPayflowDisplayForm( $data, $this->errors );
		}
	}

	/**
	 * Build and display form to user
	 *
	 * @param $data Array: array of posted user input
	 * @param $error Array: array of error messages returned by validate_form function
	 *
	 * The message at the top of the form can be edited in the payflow_gateway.i18n.php file
	 */
	public function fnPayflowDisplayForm( &$data, &$error ) {
		global $wgOut, $wgRequest;

		// save contrib tracking id early to track abondonment
		if ( $data[ 'numAttempt' ] == '0' && ( !$wgRequest->getText( 'utm_source_id', false ) || $wgRequest->getText( '_nocache_' ) == 'true' ) ) {
			$tracked = $this->fnPayflowSaveContributionTracking( $data );
			if ( !$tracked ) {
				$when = time();
				self::log( $data[ 'order_id' ] . ' Unable to save data to the contribution_tracking table ' . $when );
			}
		}

		$form_class = $this->getFormClass();
		$form_obj = new $form_class( $data, $error );
		$form = $form_obj->getForm();
		$wgOut->addHTML( $form );
	}

	/**
	 * Set the form class to use to generate the CC form
	 *
	 * @param string $class_name The class name of the form to use
	 */
	public function setFormClass( $class_name = NULL ) {
		if ( !$class_name ) {
			global $wgRequest, $wgPayflowGatewayDefaultForm;
			$form_class = $wgRequest->getText( 'form_name', $wgPayflowGatewayDefaultForm );

			// make sure our form class exists before going on, if not try loading default form class
			$class_name = "PayflowProGateway_Form_" . $form_class;
			if ( !class_exists( $class_name ) ) {
				$class_name_orig = $class_name;
				$class_name = "PayflowProGateway_Form_" . $wgPayflowGatewayDefaultForm;
				if ( !class_exists( $class_name ) ) {
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
		if ( !isset( $this->form_class ) ) {
			$this->setFormClass();
		}
		return $this->form_class;
	}

	/**
	 * Checks posted form data for errors and returns array of messages
	 */
	private function fnPayflowValidateForm( &$data, &$error ) {
		global $wgPayflowPriceFloor, $wgPayflowPriceCieling;
		
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
		foreach ( $data as $key => $value ) {
			if ( $value == '' || ($key == 'state' && $value == 'YY' )) {
				// ignore fields that are not required
				if ( isset( $msg[$key] ) ) {
					$error[$key] = "**" . wfMsg( 'payflowpro_gateway-error-msg', $msg[$key] ) . "**<br />";
					$error_result = '1';
				}
			}
		}

		// check amount
		if ( !preg_match( '/^\d+(\.(\d+)?)?$/', $data[ 'amount' ] ) || 
			( (float) $this->convert_to_usd( $data[ 'currency' ], $data[ 'amount' ] ) < (float) $wgPayflowPriceFloor || 
				(float) $this->convert_to_usd( $data[ 'currency' ], $data[ 'amount' ] ) > (float) $wgPayflowPriceCieling ) ) {
			$error['invalidamount'] = wfMsg( 'payflowpro_gateway-error-msg-invalid-amount' );
			$error_result = '1';
		}

		// is email address valid?
		$isEmail = User::isValidEmailAddr( $data['email'] );

		// create error message (supercedes empty field message)
		if ( !$isEmail ) {
			$error['emailAdd'] = wfMsg( 'payflowpro_gateway-error-msg-email' );
			$error_result = '1';
		}

		// validate that credit card number entered is correct and set the card type
		if ( preg_match( '/^3[47][0-9]{13}$/', $data[ 'card_num' ] ) ) { // american express
			$data[ 'card' ] = 'american';
		} elseif ( preg_match( '/^5[1-5][0-9]{14}$/', $data[ 'card_num' ] ) ) { //	mastercard
			$data[ 'card' ] = 'mastercard';
		} elseif ( preg_match( '/^4[0-9]{12}(?:[0-9]{3})?$/', $data[ 'card_num' ] ) ) {// visa
			$data[ 'card' ] = 'visa';
		} elseif ( preg_match( '/^6(?:011|5[0-9]{2})[0-9]{12}$/', $data[ 'card_num' ] ) ) { // discover
			$data[ 'card' ] = 'discover';
		} else { // an invalid credit card number was entered
			$error_result = '1';
			$error[ 'card_num' ] = wfMsg( 'payflowpro_gateway-error-msg-card-num' );
		}
		
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
		global $wgOut, $wgDonationTestingMode, $wgPayflowGatewayUseHTTPProxy, $wgPayflowGatewayHTTPProxy, $wgPayflowProTimeout;

		// update contribution tracking
		$this->updateContributionTracking( $data, defined( 'OWA' ) );

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
			'CITY' => $data['city'],
			'STATE' => $data['state'],
			'COUNTRY' => $data['country'],
			'ZIP' => $data['zip'],
			'INVNUM' => $data['order_id'],
			'CVV2' => $data['cvv'],
			'CURRENCY' => $data['currency'],
			'VERBOSITY' => $payflow_data['verbosity'],
			'CUSTIP' => $payflow_data['user_ip'],
		);

		foreach ( $queryArray as $name => $value ) {
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
		curl_setopt( $ch, CURLOPT_TIMEOUT, $wgPayflowProTimeout );
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

		while ( $i++ <= 3 ) {
			self::log( $data[ 'order_id' ] . ' Preparing to send transaction to PayflowPro' );
			$result = curl_exec( $ch );
			$headers = curl_getinfo( $ch );

			if ( $headers['http_code'] != 200 && $headers['http_code'] != 403 ) {
				self::log( $data[ 'order_id' ] . ' Failed sending transaction to PayflowPro, retrying' );
				sleep( 1 );
			} elseif ( $headers['http_code'] == 200 || $headers['http_code'] == 403 ) {
				self::log( $data[ 'order_id' ] . ' Finished sending transaction to PayflowPro' );
				break;
			}
		}

		if ( $headers['http_code'] != 200 ) {
			$wgOut->addHTML( '<h3>No response from credit card processor.  Please try again later!</h3><p>' );
			$when = time();
			self::log( $data[ 'order_id' ] . ' No response from credit card processor: ' . curl_error( $ch ) );
			curl_close( $ch );
			return;
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
		$responseMsg = '';

		// interpret result code, return
		// approved (1), denied (2), try again (3), general error (4)
		$errorCode = $this->fnPayflowGetResponseMsg( $resultCode, $responseMsg );
		
		// log that the transaction is essentially complete
		self::log( $data[ 'order_id' ] . " Transaction complete." );
		
		// if approved, display results and send transaction to the queue
		if ( $errorCode == '1' ) {
			self::log( $data[ 'order_id' ] . " " . $data[ 'i_order_id' ] . " Transaction approved.", 'payflowpro_gateway', LOG_DEBUG );
			$this->fnPayflowDisplayApprovedResults( $data, $responseArray, $responseMsg );
			// give user a second chance to enter incorrect data
		} elseif ( ( $errorCode == '3' ) && ( $data['numAttempt'] < '5' ) ) {
			self::log( $data[ 'order_id' ] . " " . $data[ 'i_order_id' ] . " Transaction unsuccessful (invalid info).", 'payflowpro_gateway', LOG_DEBUG );
			// pass responseMsg as an array key as required by displayForm
			$this->errors['retryMsg'] = $responseMsg;
			$this->fnPayflowDisplayForm( $data, $this->errors );
			// if declined or if user has already made two attempts, decline
		} elseif ( ( $errorCode == '2' ) || ( $data['numAttempt'] >= '3' ) ) {
			self::log( $data[ 'order_id' ] . " " . $data[ 'i_order_id' ] . " Transaction declined.", 'payflowpro_gateway', LOG_DEBUG );
			$this->fnPayflowDisplayDeclinedResults( $responseMsg );
		} elseif ( ( $errorCode == '4' ) ) {
			self::log( $data[ 'order_id' ] . " " . $data[ 'i_order_id' ] . " Transaction unsuccessful.", 'payflowpro_gateway', LOG_DEBUG );
			$this->fnPayflowDisplayOtherResults( $responseMsg );
		} elseif ( ( $errorCode == '5' ) ) {
			self::log( $data[ 'order_id' ] . " " . $data[ 'i_order_id' ] . " Transaction pending.", 'payflowpro_gateway', LOG_DEBUG );
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
	 * Prepares the transactional message to be sent via Stomp to queueing service
	 * 
	 * @param array $data
	 * @param array $resposneArray
	 * @param array $responseMsg
	 * @return array
	 */
	public function prepareStompTransaction( $data, $responseArray, $responseMsg ) {
		$countries = $this->getCountries();
		
		$transaction = array();

		// include response message
		$transaction['response'] = $responseMsg;
		
		// include date
		$transaction['date'] = time();
		
		// put all data into one array
		$optout = $this->determineOptOut( $data );
		$data[ 'anonymous' ] = $optout[ 'anonymous' ];
		$data[ 'optout' ] = $optout[ 'optout' ];
		
		$transaction += array_merge( $data, $responseArray );
		
		return $transaction;
	}
	
	/**
	 * Fetch an array of country abbrevs => country names
	 */
	public static function getCountries() {
		require_once( 'includes/countryCodes.inc' );
		return countryCodes();
	}
	
	/**
	 * Display response message to user with submitted user-supplied data
	 *
	 * @param $data Array: array of posted data from form
	 * @param $responseMsg String: message supplied by getResults function
	 */
	function fnPayflowDisplayApprovedResults( $data, $responseArray, $responseMsg ) {
		global $wgOut, $wgExternalThankYouPage;

		$transaction = $this->prepareStompTransaction( $data, $responseArray, $responseMsg );

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
			$countries = $this->getCountries();

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

		$transaction = $this->prepareStompTransaction( $data, $responseArray, $responseMsg );

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
	public static function determineOptOut( $data ) {
		$optout[ 'optout' ] = ( isset( $data[ 'email-opt' ] ) && $data[ 'email-opt' ] == "1" ) ? '0' : '1';
		$optout[ 'anonymous' ] = ( isset( $data[ 'comment-option' ] ) && $data[ 'comment-option' ] == "1" ) ? '0' : '1';
		return $optout;
	}

	function fnPayflowSaveContributionTracking( &$data ) {
		// determine opt-out settings
		$optout = self::determineOptOut( $data );

		$tracked_contribution = array(
			'note' => $data['comment'],
			'referrer' => $data['referrer'],
			'anonymous' => $optout[ 'anonymous' ],
			'utm_source' => $data['utm_source'],
			'utm_medium' => $data['utm_medium'],
			'utm_campaign' => $data['utm_campaign'],
			'optout' => $optout[ 'optout' ],
			'language' => $data['language'],
			'ts' => '',
		);

		// insert tracking data and get the tracking id
		$data['contribution_tracking_id'] = self::insertContributionTracking( $tracked_contribution );

		if ( !$data[ 'contribution_tracking_id' ] ) {
			return false;
		}
		return true;
	}

	/**
	 * Insert a record into the contribution_tracking table
	 *
	 * @param array $tracking_data The array of tracking data to insert to contribution_tracking
	 * 	NOTE: this should probably be run thru self::cleanTrackingData to ensure data integrity
	 * @return mixed Contribution tracking ID or false on failure
	 */
	public static function insertContributionTracking( $tracking_data ) {
		$db = payflowGatewayConnection();

		if ( !$db ) { return false; }

		// set the time stamp if it's not already set
		if ( !isset( $tracking_data[ 'ts' ] ) || !strlen( $tracking_data[ 'ts' ] ) ) {
			$tracking_data[ 'ts' ] = $db->timestamp();
		}

		// Store the contribution data
		if ( $db->insert( 'contribution_tracking', $tracking_data ) ) {
		 	return $db->insertId();
		} else {
			return false;
		}
	}

	/**
	 * Clean array of tracking data to contain valid fields
	 *
	 * Compares tracking data array to list of valid tracking fields and
	 * removes any extra tracking fields/data.  Also sets empty values to
	 * 'null' values.
	 * @param array $tracking_data
	 * @param bool $clean_opouts If true, form opt-out values will be run through $this->determineOptOut
	 * 	for cleanup.
	 */
	public static function cleanTrackingData( $tracking_data, $clean_optouts = false ) {
		// clean up the optout values if necessary
		if ( $clean_optouts ) {
			$optouts = self::determineOptOut( $tracking_data );
			$tracking_data[ 'optout' ] = $optouts[ 'optout' ];
			$tracking_data[ 'anonymous' ] = $optouts[ 'anonymous' ];
		}

		// define valid tracking fields
		$tracking_fields = array(
			'note',
			'referrer',
			'anonymous',
			'utm_source',
			'utm_medium',
			'utm_campaign',
			'optout',
			'language',
			'ts'
		);

		// loop through tracking data and clean it up
		foreach ( $tracking_data as $key => $value ) {
			// Make sure we only have valid fields
			if ( !in_array( $key, $tracking_fields ) ) {
				unset( $tracking_data[ $key ] );
			}

			// Make all empty strings NULL
			if ( !strlen( $value ) ) {
				$tracking_data[$key] = null;
			}
		}

		return $tracking_data;
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
	public static function fnPayflowEditToken( $salt = '' ) {

		// make sure we have a session open for tracking a CSRF-prevention token
		self::fnPayflowEnsureSession();

		if ( !isset( $_SESSION[ 'payflowEditToken' ] ) ) {
			// generate unsalted token to place in the session
			$token = self::fnPayflowGenerateToken();
			$_SESSION[ 'payflowEditToken' ] = $token;
		} else {
			$token = $_SESSION[ 'payflowEditToken' ];
		}

		if ( is_array( $salt ) ) {
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
	public static function fnPayflowGenerateToken( $salt = '' ) {
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
	function fnPayflowMatchEditToken( $val, $salt = '' ) {
		// fetch a salted version of the session token
		$sessionToken = self::fnPayflowEditToken( $salt );
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
	public static function fnPayflowEnsureSession() {
		// if the session is already started, do nothing
		if ( session_id() ) return;

		// otherwise, fire it up using global mw function wfSetupSession
		wfSetupSession();
	}


/**
	 * Fetches ID for reference URL for OWA tracking
	 * 
	 * In the event that the URL is not already in the database, insert it
	 * and return it's id.  Otehrewise, just return its id.
	 * @param string $ref The reference URL
	 * @return int The id for the reference URL - 0 if not found
	 */
	function get_owa_ref_id( $ref ) {
		if ( !defined( 'OWA' ) ) {
			return 0;
		}
		// Replication lag means sometimes a new event will not exist in the table yet
		$dbw = payflowGatewayConnection();
		$id_num = $dbw->selectField(
			'contribution_tracking_owa_ref',
			'id',
			array( 'url' => $ref ),
			__METHOD__
		);
		// Once we're on mysql 5, we can use replace() instead of this selectField --> insert or update hooey
		if ( $id_num === false ) {
			$dbw->insert(
				'contribution_tracking_owa_ref',
				array( 'url' => (string) $ref ),
				__METHOD__
			);
			$id_num = $dbw->insertId();
		}
		return $id_num === false ? 0 : $id_num;
	}

	/**
	 * Populate the $data array for the credit card form
	 *
	 * Provides a way to prepopulate the form with test data using $wgPayflowGatewayTest
	 * @return array
	 */
	public function fnGetFormData( $amount, $numAttempt, $token, $order_id, $i_order_id=0 ) {
		global $wgPayflowGatewayTest, $wgRequest;

		// fetch ID for the url reference for OWA tracking
		$owa_ref = $wgRequest->getText( 'owa_ref', null );
		if( $owa_ref != null  && !is_numeric( $owa_ref )){
			$owa_ref = $this->get_owa_ref_id( $owa_ref );
		}

		// if we're in testing mode and an action hasn't yet be specified, prepopulate the form
		if ( !$wgRequest->getText( 'action', false ) && !$wgRequest->getText( 'process', 0 ) && $wgPayflowGatewayTest ) {
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
				'amount' => ( $amount != "0.00" ) ? $amount : "35",
				'amountOther' => '',
				'email' => 'test@example.com',
				'fname' => 'Tester',
				'mname' => 'T.',
				'lname' => 'Testington',
				'street' => '548 Market St.',
				'city' => 'San Francisco',
				'state' => 'CA',
				'zip' => '94104',
				'country' => 'US',
				'fname2' => 'Testy',
				'lname2' => 'Testerson',
				'street2' => '123 Telegraph Ave.',
				'city2' => 'Berkeley',
				'state2' => 'CA',
				'zip2' => '94703',
				'country2' => 'US',
				'size' => 'small',
				'premium_language' => 'es',
				'card_num' => $card_nums[ $cards[ $card_index ]][ $card_num_index ],
				'card' => $cards[ $card_index ],
				'expiration' => date( 'my', strtotime( '+1 year 1 month' ) ),
				'cvv' => '001',
				'currency' => 'USD',
				'payment_method' => $wgRequest->getText( 'payment_method' ),
				'order_id' => $order_id,
				'i_order_id' => $i_order_id,
				'numAttempt' => $numAttempt,
				'referrer' => 'http://www.baz.test.com/index.php?action=foo&action=bar',
				'utm_source' => self::getUtmSource(),
				'utm_medium' => $wgRequest->getText( 'utm_medium' ),
				'utm_campaign' => $wgRequest->getText( 'utm_campaign' ),
				'language' => 'en',
				'comment-option' => $wgRequest->getText( 'comment-option' ),
				'comment' => $wgRequest->getText( 'comment' ),
				'email-opt' => $wgRequest->getText( 'email-opt' ),
				'test_string' => $wgRequest->getText( 'process' ),
				'token' => $token,
				'contribution_tracking_id' => $wgRequest->getText( 'contribution_tracking_id' ),
				'data_hash' => $wgRequest->getText( 'data_hash' ),
				'action' => $wgRequest->getText( 'action' ),
				'gateway' => 'payflowpro',
				'owa_session' => $wgRequest->getText( 'owa_session', null ),
				'owa_ref' => $owa_ref,
			);
		} else {
			$data = array(
				'amount' => $amount,
				'amountOther' => $wgRequest->getText( 'amountOther' ),
				'email' => $wgRequest->getText( 'emailAdd' ),
				'fname' => $wgRequest->getText( 'fname' ),
				'mname' => $wgRequest->getText( 'mname' ),
				'lname' => $wgRequest->getText( 'lname' ),
				'street' => $wgRequest->getText( 'street' ),
				'city' => $wgRequest->getText( 'city' ),
				'state' => $wgRequest->getText( 'state' ),
				'zip' => $wgRequest->getText( 'zip' ),
				'country' => $wgRequest->getText( 'country' ),
				'fname2' => $wgRequest->getText( 'fname' ),
				'lname2' => $wgRequest->getText( 'lname' ),
				'street2' => $wgRequest->getText( 'street' ),
				'city2' => $wgRequest->getText( 'city' ),
				'state2' => $wgRequest->getText( 'state' ),
				'zip2' => $wgRequest->getText( 'zip' ),
				/**
				 * For legacy reasons, we might get a 0-length string passed into the form for country2.  If this happens, we need to set country2
				 * to be 'country' for downstream processing (until we fully support passing in two separate addresses).  I thought about completely
				 * disabling country2 support in the forms, etc but realized there's a chance it'll be resurrected shortly.  Hence this silly hack.
				 */
				'country2' => ( strlen( $wgRequest->getText( 'country2' ))) ? $wgRequest->getText( 'country2' ) : $wgRequest->getText( 'country' ),
				'size' => $wgRequest->getText( 'size' ),
				'premium_language' => $wgRequest->getText( 'premium_language', "en" ),
				'card_num' => str_replace( ' ', '', $wgRequest->getText( 'card_num' ) ),
				'card' => $wgRequest->getText( 'card' ),
				'expiration' => $wgRequest->getText( 'mos' ) . substr( $wgRequest->getText( 'year' ), 2, 2 ),
				'cvv' => $wgRequest->getText( 'cvv' ),
				'currency' => $wgRequest->getText( 'currency_code' ),
				'payment_method' => $wgRequest->getText( 'payment_method' ),
				'order_id' => $order_id,
				'i_order_id' => $i_order_id,
				'numAttempt' => $numAttempt,
				'referrer' => ( $wgRequest->getVal( 'referrer' ) ) ? $wgRequest->getVal( 'referrer' ) : $wgRequest->getHeader( 'referer' ),
				'utm_source' => self::getUtmSource(),
				'utm_medium' => $wgRequest->getText( 'utm_medium' ),
				'utm_campaign' => $wgRequest->getText( 'utm_campaign' ),
				// try to honor the user-set language (uselang), otherwise the language set in the URL (language)
				'language' => $wgRequest->getText( 'uselang', $wgRequest->getText( 'language' ) ),
				'comment-option' => $wgRequest->getText( 'comment-option' ),
				'comment' => $wgRequest->getText( 'comment' ),
				'email-opt' => $wgRequest->getText( 'email-opt' ),
				'test_string' => $wgRequest->getText( 'process' ), // for showing payflow string during testing
				'token' => $token,
				'contribution_tracking_id' => $wgRequest->getText( 'contribution_tracking_id' ),
				'data_hash' => $wgRequest->getText( 'data_hash' ),
				'action' => $wgRequest->getText( 'action' ),
				'gateway' => 'payflowpro', // this may need to become dynamic in the future
				'owa_session' => $wgRequest->getText( 'owa_session', null ),
				'owa_ref' => $owa_ref,
			);
		}
		
		// sanitize user input
		array_walk( $data, array( $this, 'sanitizeInput' ) );

		return $data;
	}

	/**
	 * Sanitize user input
	 * 
	 * Intended to be used with something like array_walk
	 * 
	 * @param $value The value of the array
	 * @param $key The key of the array
	 * @param $flags The flag constant for htmlspecialchars
	 * @param $double_encode Whether or not to double-encode strings
	 */
	public function sanitizeInput( &$value, $key, $flags=ENT_COMPAT, $double_encode=false ) {
		$value = htmlspecialchars( $value, $flags, 'UTF-8', $double_encode );
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
	 * @param string $utm_source The utm_source for tracking - if not passed directly,
	 * 	we try to figure it out from the request object
	 * @param int $utm_source_id The utm_source_id for tracking - if not passed directly,
	 * 	we try to figure it out from the request object
	 * @return string The full utm_source
	 */
	public static function getUtmSource( $utm_source = null, $utm_source_id = null ) {
		global $wgRequest;

		/**
		 * fetch whatever was passed in as the utm_source
		 *
		 * if utm_source was not passed in as a param, we try to divine it from
		 * the request.  if it's not set there, no big deal, we'll just be
		 * missing some tracking data.
		 */
		if ( is_null( $utm_source ) ) {
			$utm_source = $wgRequest->getText( 'utm_source' );
		}

		/**
		 * if we have a utm_source_id, then the user is on a single-step credit card form.
		 * if that's the case, we treat the single-step credit card form as a landing page,
		 * which we label as cc#, where # = the utm_source_id
		 */
		if ( is_null( $utm_source_id ) ) {
			$utm_source_id = $wgRequest->getVal( 'utm_source_id', 0 );
		}

		// this is how the CC portion of the utm_source should be defined
		$correct_cc_source = ( $utm_source_id ) ? 'cc' . $utm_source_id . '.cc' : 'cc';

		// check to see if the utm_source is already correct - if so, return
		if ( preg_match( '/' . str_replace( ".", "\.", $correct_cc_source ) . '$/', $utm_source ) ) {
			return $utm_source;
		}

		// split the utm_source into its parts for easier manipulation
		$source_parts = explode( ".", $utm_source );

		// if there are no sourceparts element, then the banner portion of the string needs to be set.
		// since we don't know what it is, set it to an empty string
		if ( !count( $source_parts ) ) $source_parts[0] = '';

		// if the utm_source_id is set, set the landing page portion of the string to cc#
		$source_parts[1] = ( $utm_source_id ) ? 'cc' . $utm_source_id : ( isset( $source_parts[1] ) ? $source_parts[1] : '' );

		// the payment instrument portion should always be 'cc' if this method is being accessed
		$source_parts[2] = 'cc';

		// return a reconstructed string
		return implode( ".", $source_parts );
	}

	/**
	 * Update contribution_tracking table
	 *
	 * @param array $data Form data
	 * @param bool $force If set to true, will ensure that contribution tracking is updated
	 */
	public function updateContributionTracking( &$data, $force = false ) {
		// ony update contrib tracking if we're coming from a single-step landing page
		// which we know with cc# in utm_source or if force=true or if contribution_tracking_id is not set
		if ( !$force &&
				!preg_match( "/cc[0-9]/", $data[ 'utm_source' ] ) &&
				is_numeric( $data[ 'contribution_tracking_id' ] ) ) {
			return;
		}


		// determine opt-out settings
		$optout = self::determineOptOut( $data );

		$db = payflowGatewayConnection();

		if ( !$db ) { return true ; }

		$tracked_contribution = array(
			'note' => $data['comment'],
			'referrer' => $data['referrer'],
			'anonymous' => $optout[ 'anonymous' ],
			'utm_source' => $data['utm_source'],
			'utm_medium' => $data['utm_medium'],
			'utm_campaign' => $data['utm_campaign'],
			'owa_session' => $data['owa_session'],
			'owa_ref' => $data['owa_ref'],
			'optout' => $optout[ 'optout' ],
			'language' => $data['language'],
		);

		// Make all empty strings NULL
		foreach ( $tracked_contribution as $key => $value ) {
			if ( $value === '' ) {
				$tracked_contribution[$key] = null;
			}
		}

		// if contrib tracking id is not already set, we need to insert the data, otherwise update
		if ( !$data[ 'contribution_tracking_id' ] ) {
			$data[ 'contribution_tracking_id' ] = $this->insertContributionTracking( $tracked_contribution );
		} else {
			$db->update( 'contribution_tracking', $tracked_contribution, array( 'id' => $data[ 'contribution_tracking_id' ] ) );
		}
	}

	/**
	 * Handle redirection of form content to PayPal
	 *
	 * @fixme If we can update contrib tracking table in ContributionTracking
	 * 	extension, we can probably get rid of this method and just submit the form
	 *  directly to the paypal URL, and have all processing handled by ContributionTracking
	 *  This would make this a lot less hack-ish
	 */
	public function paypalRedirect( &$data ) {
		global $wgPayflowGatewayPaypalURL, $wgOut;

		// if we don't have a URL enabled throw a graceful error to the user
		if ( !strlen( $wgPayflowGatewayPaypalURL ) ) {
			$this->errors['general'][ 'nopaypal' ] = wfMsg( 'payflow_gateway-error-msg-nopaypal' );
			return;
		}

		// update the utm source to set the payment instrument to pp rather than cc
		$utm_source_parts = explode( ".", $data[ 'utm_source' ] );
		$utm_source_parts[2] = 'pp';
		$data[ 'utm_source' ] = implode( ".", $utm_source_parts );
		$data[ 'gateway' ] = 'paypal';
		$data[ 'currency_code' ] = $data[ 'currency' ];
		/**
		 * update contribution tracking
		 */
		$this->updateContributionTracking( $data, true );

		$wgPayflowGatewayPaypalURL .= "/" . $data[ 'language' ] . "?gateway=paypal";
		
		// submit the data to the paypal redirect URL
		$wgOut->redirect( $wgPayflowGatewayPaypalURL . '&' . http_build_query( $data ) );
	}
	
	public static function log( $msg, $identifier='payflowpro_gateway', $log_level=LOG_INFO ) {
		global $wgPayflowGatewayUseSyslog;
		
		// if we're not using the syslog facility, use wfDebugLog
		if ( !$wgPayflowGatewayUseSyslog ) {
			wfDebugLog( $identifier, $msg );
			return;
		}
		
		// otherwise, use syslogging
		openlog( $identifier, LOG_ODELAY, LOG_SYSLOG );
		syslog( $log_level, $msg );
		closelog();	
	}
	
	/**
	 * Convert an amount for a particular currency to an amount in USD
	 * 
	 * This is grosley rudimentary and likely wildly inaccurate.
	 * This mimicks the hard-coded values used by the WMF to convert currencies
	 * for validatoin on the front-end on the first step landing pages of their
	 * donation process - the idea being that we can get a close approximation
	 * of converted currencies to ensure that contributors are not going above
	 * or below the price ceiling/floor, even if they are using a non-US currency.
	 * 
	 * In reality, this probably ought to use some sort of webservice to get real-time
	 * conversion rates.
	 *  
	 * @param $currency_code
	 * @param $amount
	 * @return unknown_type
	 */
	public function convert_to_usd( $currency_code, $amount ) {
		switch ( strtoupper( $currency_code ) ) {
			case 'USD':
				$usd_amount = $amount / 1;
				break;
			case 'GBP':
				$usd_amount = $amount / 1;
				break;
			case 'EUR':
				$usd_amount = $amount / 1;
				break;
			case 'AUD':
				$usd_amount = $amount / 2;
				break;
			case 'CAD':
				$usd_amount = $amount / 1;
				break;
			case 'CHF':
				$usd_amount = $amount / 1;
				break;
			case 'CZK':
				$usd_amount = $amount / 20;
				break;
			case 'DKK':
				$usd_amount = $amount / 5;
				break;
			case 'HKD':
				$usd_amount = $amount / 10;
				break;
			case 'HUF':
				$usd_amount = $amount / 200;
				break;
			case 'JPY':
				$usd_amount = $amount / 100;
				break;
			case 'NZD':
				$usd_amount = $amount / 2;
				break;
			case 'NOK':
				$usd_amount = $amount / 10;
				break;
			case 'PLN':
				$usd_amount = $amount / 5;
				break;
			case 'SGD':
				$usd_amount = $amount / 2;
				break;
			case 'SEK':
				$usd_amount = $amount / 10;
				break;
			case 'ILS':
				$usd_amount = $amount / 5;
				break;
			default:
				$usd_amount = $amount;
				break;
		}
		
		return $usd_amount;
	}
} // end class
