<?php
/**
 * Wikimedia Foundation
 *
 * LICENSE
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 */

/**
 * GatewayType Interface
 *
 */
interface GatewayType {
	//all the particulars of the child classes. Aaaaall.

	/**
	 * Take the entire response string, and strip everything we don't care about.
	 * For instance: If it's XML, we only want correctly-formatted XML. Headers must be killed off. 
	 * return a string.
	 */
	function getFormattedResponse( $rawResponse );

	/**
	 * Parse the response to get the status. Not sure if this should return a bool, or something more... telling.
	 */
	function getResponseStatus( $response );

	/**
	 * Parse the response to get the errors in a format we can log and otherwise deal with.
	 * return a key/value array of codes (if they exist) and messages. 
	 */
	function getResponseErrors( $response );

	/**
	 * Harvest the data we need back from the gateway. 
	 * return a key/value array
	 */
	function getResponseData( $response );

	/**
	 * Actually do... stuff. Here. 
	 * TODO: Better comment. 
	 * Process the entire response gott'd by the last four functions. 
	 */
	function processResponse( $response );

	/**
	 * Should be a list of our variables that need special staging. 
	 * @see $this->staged_vars
	 */
	function defineStagedVars();

	/**
	 * defineTransactions will define the $transactions array. 
	 * The array will contain everything we need to know about the request structure for all the transactions we care about, 
	 * for the current gateway. 
	 * First array key: Some way for us to id the transaction. Doesn't actually have to be the gateway's name for it, but I'm going with that until I have a reason not to. 
	 * Second array key: 
	 * 		'request' contains the structure of that request. Leaves in the array tree will eventually be mapped to actual values of ours, 
	 * 		according to the precidence established in the getTransactionSpecificValue function. 
	 * 		'values' contains default values for the transaction. Things that are typically not overridden should go here. 
	 */
	function defineTransactions();

	/**
	 * defineVarMap needs to set up the $var_map array. 
	 * Keys = the name (or node name) value in the gateway transaction
	 * Values = the mediawiki field name for the corresponding piece of data. 
	 */
	function defineVarMap();

	/**
	 * defineAccountInfo needs to set up the $accountInfo array. 
	 * Keys = the name (or node name) value in the gateway transaction
	 * Values = The actual values for those keys. Probably have to access a global or two. (use getGlobal()!) 
	 */
	function defineAccountInfo();

	/**
	 * defineReturnValueMap sets up the $return_value_map array.
	 * Keys = The different constants that may be contained as values in the gateway's response.
	 * Values = what that string constant means to mediawiki. 
	 */
	function defineReturnValueMap();
}

/**
 * GatewayAdapter
 *
 */
abstract class GatewayAdapter implements GatewayType {

	//Contains the map of THEIR var names, to OURS.
	//I'd have gone the other way, but we'd run into 1:many pretty quick. 
	protected $var_map;
	protected $accountInfo;
	protected $url;
	protected $transactions;

	/**
	 * $payment_methods will be defined by the adapter.
	 *
	 * @var	array	$payment_methods
	 */
	protected $payment_methods = array();

	/**
	 * $payment_submethods will be defined by the adapter.
	 *
	 * @var	array	$payment_submethods
	 */
	protected $payment_submethods = array();

	/**
	 * Staged variables. This is affected by the transaction type.
	 *
	 * @var array $staged_vars
	 */
	protected $staged_vars = array();
	protected $return_value_map;
	protected $postdata;
	protected $postdatadefaults;
	protected $xmlDoc;
	protected $dataObj;
	protected $transaction_results;
	protected $form_class;
	protected $validation_errors;
	protected $current_transaction;
	public $action; //Currently, hooks need to be able to set this directly.
	public $debugarray; //TODO: Take me out. 

	//ALL OF THESE need to be redefined in the children. Much voodoo depends on the accuracy of these constants. 
	const GATEWAY_NAME = 'Donation Gateway';
	const IDENTIFIER = 'donation';
	const COMMUNICATION_TYPE = 'xml'; //this needs to be either 'xml' or 'namevalue'
	const GLOBAL_PREFIX = 'wgDonationGateway'; //...for example. 

	/**
	 * Constructor
	 *
	 * @param array	$options
	 *   OPTIONAL - You may set options for testing
	 *   - testData - Submit test data 
	 *
	 * @see DonationData
	 */
	public function __construct( $options = array() ) {
		global $wgRequest;

		// Extract the options
		extract( $options );

		$testData = isset( $testData ) ? $testData : false;
		$postDefaults = isset( $postDefaults ) ? $postDefaults : false;

		if ( !self::getGlobal( 'Test' ) ) {
			$this->url = self::getGlobal( 'URL' );

			// Only submit test data if we are in test mode.
			$testData = false;
		} else {
			$this->url = self::getGlobal( 'TestingURL' );
		}

		$this->dataObj = new DonationData( get_called_class(), self::getGlobal( 'Test' ), $testData );

		$this->postdata = $this->dataObj->getData();
		//TODO: Fix this a bit. 

		$this->posted = $wgRequest->wasPosted();
		$this->setPostDefaults( $postDefaults );
		$this->defineTransactions();
		$this->defineVarMap();
		$this->defineAccountInfo();
		$this->defineReturnValueMap();

		$this->displaydata = $this->postdata;
		$this->stageData();
	}

	/**
	 * Override this in children if you want different defaults. 
	 */
	function setPostDefaults( $options = array() ) {

		// Extract the options
		if ( is_array( $options ) ) {
			extract( $options );
		}

		$returnTitle = isset( $returnTitle ) ? $returnTitle : Title::newFromText( 'Special:GlobalCollectGatewayResult' );
		$returnTo = isset( $returnTo ) ? $returnTo : $returnTitle->getFullURL();

		$this->postdatadefaults = array(
			'order_id' => '112358' . rand(),
			'amount' => '11.38',
			'currency' => 'USD',
			'language' => 'en',
			'country' => 'US',
			'returnto' => $returnTo,
			'user_ip' => ( self::getGlobal( 'Test' ) ) ? '12.12.12.12' : wfGetIP(), // current user's IP address
			'card_type' => 'visa',
		);
	}

	function getThankYouPage() {
		global $wgLang;
		$language = $wgLang->getCode();
		$page = self::getGlobal( "ThankYouPage" ) . "/$language";
//		$returnTitle = Title::newFromText( $page );
//		$returnto = $returnTitle->getFullURL();
		return $page;
	}

	function getFailPage() {
		global $wgLang;
		$language = $wgLang->getCode();
		$page = self::getGlobal( "FailPage" ) . "/$language";
		$returnTitle = Title::newFromText( $page );
		$returnto = $returnTitle->getFullURL();
		return $returnto;
	}

	/**
	 * Checks the edit tokens in the user's session against the one gathered 
	 * from populated form data.  
	 * Adds a string to the debugarray, to make it a little easier to tell what 
	 * happened if we turn the debug results on.  
	 * @return boolean true if match, else false.  
	 */
	public function checkTokens() {
		$checkResult = $this->dataObj->checkTokens();
		
		if ( $checkResult ) {
			$this->debugarray[] = 'Token Match';
		} else {
			$this->debugarray[] = 'Token MISMATCH';
		}
		
		$this->refreshGatewayValueFromSource( 'token' );		
		return $checkResult;
	}

	function getData( $val = '' ) {
		if ( $val === '' ) {
			return $this->postdata;
		} else {
			if ( array_key_exists( $val, $this->postdata ) ) {
				return $this->postdata[$val];
			} else {
				return null;
			}
		}
	}

	/**
	 * Returns the variable $this->dataObj which should be an instance of
	 * DonationData
	 *
	 * @return DonationData
	 */
	public function getDonationData() {
		
		return $this->dataObj;
	}
	
	function getDisplayData() {
		return $this->displaydata;
	}

	function isCache() {
		return $this->dataObj->isCache();
	}

	/**
	 * This function is important. 
	 * All the globals in Donation Interface should be accessed in this manner 
	 * if they are meant to have a default value, but can be overridden by any 
	 * of the gateways. It will check to see if a gateway-specific global 
	 * exists, and if one is not set, it will pull the default from the 
	 * wgDonationInterface definitions. Through this function, it is no longer 
	 * necessary to define gateway-specific globals in LocalSettings unless you 
	 * wish to override the default value for all gateways. 
	 * @staticvar array $gotten A cache of all the globals we've already... 
	 * gotten. 
	 * @param type $varname The global value we're looking for. It will first 
	 * look for a global named for the instantiated gateway's GLOBAL_PREFIX, 
	 * plus the $varname value. If that doesn't come up with anything that has 
	 * been set, it will use the default value for all of donation interface, 
	 * stored in $wgDonationInterface . $varname. 
	 * @return mixed The configured value for that gateway if it exists. If not, 
	 * the configured value for Donation Interface if it exists or not. 
	 */
	static function getGlobal( $varname ) {
		static $gotten = array(); //cache. 
		if ( !array_key_exists( $varname, $gotten ) ) {
			$globalname = self::getGlobalPrefix() . $varname;
			global $$globalname;
			if ( !isset( $$globalname ) ) {
				$globalname = "wgDonationInterface" . $varname;
				global $$globalname; //set or not. This is fine. 
			}
			$gotten[$varname] = $$globalname;
		}
		return $gotten[$varname];
	}

	/**
	 * getVarMap
	 *
	 * This method was added for unit testing.
	 *
	 * @return	array	Returns @see GatewayAdapter::$var_map
	 */
	public function getVarMap() {
	
		return $this->var_map;
	}
	
	/**
	 * This function is used exclusively by the two functions that build 
	 * requests to be sent directly to external payment gateway servers. Those 
	 * two functions are buildRequestNameValueString, and (perhaps less 
	 * obviously) buildRequestXML. As such, unless a valid current transaction 
	 * has already been set, this will error out rather hard. 
	 * In other words: In all likelihood, this is not the function you're 
	 * looking for.
	 * @param string $gateway_field_name The GATEWAY's field name that we are 
	 * hoping to populate. Probably not even remotely the way we name the same 
	 * data internally. 
	 * @param boolean $token This is a throwback to a road we nearly went down, 
	 * with ajax and client-side token replacement. The idea was, if this was 
	 * set to true, we would simply pass the fully-formed transaction structure 
	 * with our tokenized var names in the spots where form values would usually 
	 * go, so we could fetch the structure and have some client-side voodoo 
	 * populate the transaction so we wouldn't have to touch the data at all.
	 * At this point, very likely cruft that can be removed, but as I'm not 100% 
	 * on that point, I'm keeping it for now. If we do kill off this param, we 
	 * should also get rid of the function buildTransactionFormat and anything 
	 * that calls it. 
	 * @return mixed The value we want to send directly to the gateway, for the 
	 * specified gateway field name. 
	 */
	protected function getTransactionSpecificValue( $gateway_field_name, $token = false ) {
		if ( empty( $this->transactions ) ) {
			$msg = self::getGatewayName() . ': Transactions structure is empty! No transaction can be constructed.';
			self::log( $msg, LOG_CRIT );
			throw new MWException( $msg );
		}
		//Ensures we are using the correct transaction structure for our various lookups. 
		$transaction = $this->getCurrentTransaction();
		
		if ( !$transaction ){
			return null;
		}

		//If there's a hard-coded value in the transaction definition, use that.
		if ( !empty( $transaction ) ) {
			if ( array_key_exists( $transaction, $this->transactions ) && is_array( $this->transactions[$transaction] ) &&
				array_key_exists( 'values', $this->transactions[$transaction] ) &&
				array_key_exists( $gateway_field_name, $this->transactions[$transaction]['values'] ) ) {
				return $this->transactions[$transaction]['values'][$gateway_field_name];
			}
		}

		//if it's account info, use that.
		//$this->accountInfo;
		if ( array_key_exists( $gateway_field_name, $this->accountInfo ) ) {
			return $this->accountInfo[$gateway_field_name];
		}


		//If there's a value in the post data (name-translated by the var_map), use that.
		if ( array_key_exists( $gateway_field_name, $this->var_map ) ) {
			if ( $token === true ) { //we just want the field name to use, so short-circuit all that mess. 
				return '@' . $this->var_map[$gateway_field_name];
			}
			if ( array_key_exists( $this->var_map[$gateway_field_name], $this->postdata ) &&
				$this->postdata[$this->var_map[$gateway_field_name]] !== '' ) {
				//if it was sent, use that. 
				return $this->postdata[$this->var_map[$gateway_field_name]];
			} else {
				//return the default for that form value
				
				$tempField = isset( $this->var_map[ $gateway_field_name ] ) ? $this->var_map[ $gateway_field_name ] : false;
				
				$tempValue = '';
				
				if ( $tempField && isset( $this->postdatadefaults[ $tempField ] ) ) {
					$tempValue = $this->postdatadefaults[ $tempField ];
				}
				
				return $tempValue;
			}
		}

		//not in the map, or hard coded. What then? 
		//Complain furiously, for your code is faulty. 
		$msg = self::getGatewayName() . ': Requested value ' . $gateway_field_name . ' cannot be found in the transactions structure.';
		self::log( $msg, LOG_CRIT );
		throw new MWException( $msg );
	}
	
	
	/**
	 * Returns the current transaction request structure if it exists, otherwise 
	 * returns false. 
	 * Fails nicely if the current transaction is simply not set yet.
	 * Throws an exception if the transaction is set, but no structure is defined. 
	 * @return mixed current transaction's structure as an array, or false
	 */
	protected function getTransactionRequestStructure(){
		$transaction = $this->getCurrentTransaction();
		if ( !$transaction ){
			return false;
		}
		
		if ( empty( $this->transactions ) || 
			!array_key_exists( $transaction, $this->transactions ) || 
			!array_key_exists( 'request', $this->transactions[$transaction] ) ) {
			
			$msg = self::getGatewayName() . ": $transaction request structure is empty! No transaction can be constructed.";
			self::log( $msg, LOG_CRIT );
			throw new MWException( $msg );
		}
		
		return $this->transactions[$transaction]['request'];
	}

	/**
	 * Builds a set of transaction data in name/value format
	 *		*)The current transaction must be set before you call this function.
	 *		*)Uses getTransactionSpecificValue to assign staged values to the 
	 * fields required by the gateway. Look there for more insight into the 
	 * heirarchy of all possible data sources. 
	 * @return string The raw transaction in name/value format, ready to be 
	 * curl'd off to the remote server. 
	 */
	protected function buildRequestNameValueString() {
		// Look up the request structure for our current transaction type in the transactions array
		$structure = $this->getTransactionRequestStructure();
		if ( !is_array( $structure ) ) {
			return '';
		}

		$queryvals = array();

		//we are going to assume a flat array, because... namevalue. 
		foreach ( $structure as $fieldname ) {
			$fieldvalue = $this->getTransactionSpecificValue( $fieldname );
			if ( $fieldvalue !== '' && $fieldvalue !== false ) {
				$queryvals[] = $fieldname . '[' . strlen( $fieldvalue ) . ']=' . $fieldvalue;
			}
		}

		$ret = implode( '&', $queryvals );
		return $ret;
	}

	/**
	 * Builds a set of transaction data in XML format
	 *		*)The current transaction must be set before you call this function.
	 *		*)(eventually) uses getTransactionSpecificValue to assign staged 
	 * values to the fields required by the gateway. Look there for more insight 
	 * into the heirarchy of all possible data sources. 
	 * @return string The raw transaction in xml format, ready to be 
	 * curl'd off to the remote server. 
	 */
	protected function buildRequestXML() {
		$this->xmlDoc = new DomDocument( '1.0' );
		$node = $this->xmlDoc->createElement( 'XML' );

		// Look up the request structure for our current transaction type in the transactions array
		$structure = $this->getTransactionRequestStructure();
		if ( !is_array( $structure ) ) {
			return '';
		}

		$this->buildTransactionNodes( $structure, $node );
		$this->xmlDoc->appendChild( $node );
		return $this->xmlDoc->saveXML();
	}

	/**
	 * buildRequestXML helper function. 
	 * Builds the XML transaction by recursively crawling the transaction 
	 * structure and adding populated nodes by reference. 
	 * @param array $structure Current transaction's more leafward structure, 
	 * from the point of view of the current XML node. 
	 * @param xmlNode $node The current XML node. 
	 * @param bool $js More likely cruft relating back to buildTransactionFormat
	 */
	protected function buildTransactionNodes( $structure, &$node, $js = false ) {

		if ( !is_array( $structure ) ) { //this is a weird case that shouldn't ever happen. I'm just being... thorough. But, yeah: It's like... the base-1 case. 
			$this->appendNodeIfValue( $structure, $node, $js );
		} else {
			foreach ( $structure as $key => $value ) {
				if ( !is_array( $value ) ) {
					//do not use $key. $key is meaningless in this case.			
					$this->appendNodeIfValue( $value, $node, $js );
				} else {
					$keynode = $this->xmlDoc->createElement( $key );
					$this->buildTransactionNodes( $value, $keynode, $js );
					$node->appendChild( $keynode );
				}
			}
		}
		//not actually returning anything. It's all side-effects. Because I suck like that. 
	}

	/**
	 * appendNodeIfValue is a helper function for buildTransactionNodes, which 
	 * is used by buildRequestXML to construct an XML transaction. 
	 * This function will append an XML node to the transaction being built via 
	 * the passed-in parent node, only if the current node would have a 
	 * non-empty value.  
	 * @param string $value The GATEWAY's field name for the current node. 
	 * @param string $node The parent node this node will be contained in, if it
	 *  is determined to have a non-empty value. 
	 * @param bool $js Probably cruft at this point. This is connected to the 
	 * function buildTransactionFormat. 
	 */
	protected function appendNodeIfValue( $value, &$node, $js = false ) {
		$nodevalue = $this->getTransactionSpecificValue( $value, $js );
		if ( $nodevalue !== '' && $nodevalue !== false ) {
			$temp = $this->xmlDoc->createElement( $value, $nodevalue );
			$node->appendChild( $temp );
		}
	}

	/**
	 * This is a throwback to a road we nearly went down, 
	 * with ajax and client-side token replacement. The idea was, if this was 
	 * set to true, we would simply pass the fully-formed transaction structure 
	 * with our tokenized var names in the spots where form values would usually 
	 * go, so we could fetch the structure and have some client-side voodoo 
	 * populate the transaction so we wouldn't have to touch the data at all.
	 * At this point, very likely cruft that can be removed, but as I'm not 100% 
	 * on that point, I'm keeping it for now.
	 * @param string $transaction The current transaction. 
	 * @return string XML transaction with the form values tokenized instead of 
	 * populated.  
	 */
	public function buildTransactionFormat( $transaction ) {
		$this->setCurrentTransaction( $transaction );
		$this->xmlDoc = new DomDocument( '1.0' );
		$node = $this->xmlDoc->createElement( 'XML' );

		$structure = $this->getTransactionRequestStructure();		
		if ( !is_array( $structure ) ) {
			return '';
		}

		$this->buildTransactionNodes( $structure, $node, true );
		$this->xmlDoc->appendChild( $node );
		$xml = $this->xmlDoc->saveXML();
		$xmlStart = strpos( $xml, "<XML>" );
		self::log( "XML START" . $xmlStart );
		$xml = substr( $xml, $xmlStart );
		self::log( "XML stubby thing..." . $xml );

		return $xml;
	}

	/**
	 * Perform a transaction through the gateway.
	 * This is the entire end-to-end function, meant to be used from the 
	 * outside, to communicate with a properly constructed gateway and handle 
	 * all the return data in an appropriate manner, according to the requested 
	 * transaction's structure and definition.  
	 *
	 * @param string $transaction This is a specific transaction type like 'INSERT_ORDERWITHPAYMENT'
	 * that maps to a first-level key in the $transactions array.
	 * @return array The results of the transaction attempt. Minimum keys include: 
	 *	'status' = The result of the pure communication attempt. If there was a 
	 *		server there, and it responded in a way that was parsable, this will be 
	 *		set to true, even if it gave us bad news. In all other cases, this will be false. 
	 *	'message' = An appropriate thing to say to... whatever called us, about 
	 *		the overall result that happened here. 
	 *		TODO: Some kind of i18n here. Either pass message labels, or...
	 *		...wait, I like that one. Let's pass message labels. 
	 *	'errors' = sort of a misnomer, that should probably be renamed to 
	 *		result_codes or similar. This is always going to be an array of 
	 *		numeric codes (even if we have to make them up ourselves) and 
	 *		human-readable assessments of what happened, probably straight from 
	 *		the gateway. 
	 *	'action' = (sometimes there) What the pre-commit hooks said we should go 
	 *		do with ourselves. Mostly in there for debugging purposes at this 
	 *		point, as nothing on the outside should care at all, how we do things 
	 *		internally. 
	 *	'data' = The data passed back to us from the transaction, in a nice 
	 *		key-value array. 
	 */
	public function do_transaction( $transaction ) {
		try {
			$this->setCurrentTransaction( $transaction );
			//update the contribution tracking data
			$this->incrementNumAttempt();

			//if we're supposed to add the donor data to the session, do that. 
			if ( $this->transaction_option( 'addDonorDataToSession' ) ) {
				$this->addDonorDataToSession();
			}

			$this->runPreProcess(); //many hooks get fired here...

			if ( $this->action != 'process' ) {
				self::log( "Transaction failed pre-process checks." . print_r( $this->getData(), true ) );
				return array(
					'status' => false,
					//TODO: appropriate messages. 
					'message' => "$transaction : Failed failed pre-process checks. Somebody PLEASE override me!",
					'errors' => array(
						'1000000' => 'pre-process failed you.' //...stupid code.
					),
					'action' => $this->action,
				);
			}

			// expose a hook for external handling of trxns ready for processing		
			if ( $this->transaction_option( 'do_processhooks' ) ) {
				wfRunHooks( 'GatewayProcess', array( &$this ) ); //don't think anybody is using this yet, but you could!
			}

			$this->dataObj->updateContributionTracking( defined( 'OWA' ) );

			// If the payment processor requires XML, package our data into XML.
			if ( $this->getCommunicationType() === 'xml' ) {
				$this->getStopwatch( "buildRequestXML" ); // begin profiling
				$curlme = $this->buildRequestXML(); // build the XML
				$this->saveCommunicationStats( "buildRequestXML", $transaction ); // save profiling data
			}

			// If the payment processor requires name/value pairs, package our data into name/value pairs.
			if ( $this->getCommunicationType() === 'namevalue' ) {
				$this->getStopwatch( "buildRequestNameValueString" ); // begin profiling
				$curlme = $this->buildRequestNameValueString(); // build the name/value pairs
				$this->saveCommunicationStats( "buildRequestNameValueString", $transaction ); // save profiling data
			}
		} catch ( MWException $e ) {
			self::log( "Malformed gateway definition. Cannot continue: Aborting.", LOG_CRIT );
			return array(
				'status' => false,
				//TODO: appropriate messages. 
				'message' => "$transaction : Malformed gateway definition. Cannot continue: Aborting.",
				'errors' => array(
					'1000000' => 'Transaction could not be processed due to an internal error.'
				),
				'action' => $this->action,
			);
		}

		//start looping here, if we're the sort of transaction that needs to do that. 
		$stopflag = false;
		$counter = 0;
		$statuses = $this->transaction_option( 'loop_for_status' );
		$this->getStopwatch( __FUNCTION__, true );
		while ( $stopflag === false ) {
			$stopflag = true;
			$counter += 1;
			$txn_ok = $this->curl_transaction( $curlme );

			if ( $txn_ok === true ) { //We have something to slice and dice. 
				self::log( "RETURNED FROM CURL:" . print_r( $this->getTransactionAllResults(), true ) );

				//set the status of the response. This is the COMMUNICATION status, and has nothing
				//to do with the result of the transaction. 
				$formatted = $this->getFormattedResponse( $this->getTransactionRawResponse() );
				$this->setTransactionResult( $this->getResponseStatus( $formatted ), 'status' );

				//set errors
				//TODO: This "errors" business is becoming a bit of a misnomer, as the result code and message
				//are frequently packaged togther in the same place, whether the transaction passed or failed. 
				$this->setTransactionResult( $this->getResponseErrors( $formatted ), 'errors' );

				//if we're still okay (hey, even if we're not), get relevent dataz.
				$pulled_data = $this->getResponseData( $formatted );
				$this->setTransactionResult( $pulled_data, 'data' );

				//TODO: Death to the pulled_data parameter! 
				$this->processResponse( $pulled_data ); //now we've set all the transaction results... 
			} else {
				self::log( "Transaction Communication failed" . print_r( $this->getTransactionAllResults(), true ) );
			}

			if ( is_array( $statuses ) ) { //only then will we consider doing this again. 
				if ( $this->getStopwatch( __FUNCTION__ ) < self::getGlobal( "RetrySeconds" ) ) {
					if ( $txn_ok === false ) {
						$stopflag = false;
					} else {
						if ( !in_array( $this->getTransactionWMFStatus(), $statuses ) ) {
							$stopflag = false;
						}
					}
				}
			}
		}

		//Log out how many times we looped, and what the clock is now. 
		$this->saveCommunicationStats( __FUNCTION__, $transaction, "counter = $counter" );

		if ( $txn_ok === false ) { //nothing to process, so we have to build it manually
			return array(
				'status' => false,
				'message' => "$transaction Communication Failed!",
				'errors' => array(
					'1000000' => 'communication failure' //...stupid code.
				),
			);
		}

		// expose a hook for any post processing
		if ( $this->transaction_option( 'do_processhooks' ) ) {
			wfRunHooks( 'GatewayPostProcess', array( &$this ) ); //conversion log (at least)
			$this->doStompTransaction();
		}

		//TODO: Actually pull these from somewhere legit. 
		if ( $this->getTransactionStatus() === true ) {
			$this->setTransactionResult( "$transaction Transaction Successful!", 'message' );
			
		} elseif ( $this->getTransactionStatus() === false ) {
			$this->setTransactionResult( "$transaction Transaction FAILED!", 'message' );
		} else {
			$this->setTransactionResult( "$transaction Transaction... weird. I have no idea what happened there.", 'message' );
		}

		// log that the transaction is essentially complete
		self::log( $this->getData( 'order_id' ) . " Transaction complete." );

		//Session Handling
		//getTransactionStatus works here like this, because it only returns 
		//something other than false if it's the sort of a transaction that can 
		//denote a successful donation.  
		$wmfStatus = $this->getTransactionWMFStatus();
		switch ( $wmfStatus ){
			case 'failed' : //only kill their session if they've tried three (or somehow more) times. 
				if ( (int)$this->postdata['numAttempt'] < 3 ) {
					break;
				}
			case 'complete' :
			case 'pending' :
			case 'pending-poke' :
				$this->unsetAllSessionData();
		}	
		//if we're not actively adding the donor data to the session, kill it. 
		if ( !$this->transaction_option( 'addDonorDataToSession' ) ) {
			$this->dataObj->unsetDonorSessionData(); //just that. Not the whole session. 
		}
		$this->debugarray[] = 'numAttempt = ' . $this->postdata['numAttempt'];

		return $this->getTransactionAllResults();

		//speaking of universal form: 
		//$result['status'] = something I wish could be boiled down to a bool, but that's way too optimistic, I think.
		//$result['message'] = whatever we want to display back? 
		//$result['errors']['code']['message'] = 
		//$result['data'][$whatever] = values they pass back to us for whatever reason. We might... log it, or pieces of it, or something? 
	}

	function getCurlBaseOpts() {
		//I chose to return this as a function so it's easy to override. 
		//TODO: probably this for all the junk I currently have stashed in the constructor.
		//...maybe. 
		$opts = array(
			CURLOPT_URL => $this->url,
			CURLOPT_USERAGENT => Http::userAgent(),
			CURLOPT_HEADER => 1,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_TIMEOUT => self::getGlobal( 'Timeout' ),
			CURLOPT_FOLLOWLOCATION => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_SSL_VERIFYHOST => 2,
			CURLOPT_FORBID_REUSE => true,
			CURLOPT_POST => 1,
		);

		// set proxy settings if necessary
		if ( self::getGlobal( 'UseHTTPProxy' ) ) {
			$opts[CURLOPT_HTTPPROXYTUNNEL] = 1;
			$opts[CURLOPT_PROXY] = self::getGlobal( 'HTTPProxy' );
		}
		return $opts;
	}

	function getCurlBaseHeaders() {
		$headers = array(
			'Content-Type: text/' . $this->getCommunicationType() . '; charset=utf-8',
			'X-VPS-Client-Timeout: 45',
			'X-VPS-Request-ID:' . $this->postdatadefaults['order_id'],
		);
		return $headers;
	}

	/**
	 * Sets the transaction you are about to send to the payment gateway. This 
	 * will throw an exception if you try to set it to something that has no 
	 * transaction definition. 
	 * @param type $transaction_name This is a specific transaction type like 
	 * 'INSERT_ORDERWITHPAYMENT' (if you're GlobalCollect) that maps to a 
	 * first-level key in the $transactions array.
	 */
	public function setCurrentTransaction( $transaction_name ){
		if ( empty( $this->transactions ) || !is_array( $this->transactions ) || !array_key_exists( $transaction_name, $this->transactions ) ) {
			$msg = self::getGatewayName() . ': Transaction Name "' . $transaction_name . '" undefined for this gateway.';
			self::log( $msg, LOG_CRIT );
			throw new MWException( $msg );
		} else {
			$this->current_transaction = $transaction_name;
		}
	}
	
	/**
	 * Gets the currently set transaction name. This value should only ever be 
	 * set with setCurrentTransaction: A function that ensures the current 
	 * transaction maps to a first-level key that is known to exist in the 
	 * $transactions array, defined in the child gateway. 
	 * @return mixed The name of the properly set transaction, or false if none 
	 * has been set. 
	 */
	public function getCurrentTransaction(){
		if ( is_null( $this->current_transaction ) ) {
			return false;
		} else {
			return $this->current_transaction;
		}
	}
	
	/**
	 * Define payment methods
	 *
	 * Payment methods include:
	 * - Paypal
	 * - Credit Card
	 * - Debit
	 * - Bank Transfer
	 * - Real Time Bank Transfer
	 *
	 * Not all payment methods are available within an adapter
	 *
	 * @return	array	Returns the available payment methods for the specific adapter
	 */
	public function getPaymentMethods() {
		
		// Define the payment methods if they have not been set yet.
		if ( empty( $this->payment_methods ) ) {
			
			$this->definePaymentMethods();
		}
		
		return $this->payment_methods;
	}
	
	/**
	 * Define payment methods
	 *
	 * @todo
	 * - this is not implemented in all adapters yet
	 *
	 * Payment methods include:
	 * - Paypal: paypal, recurring paypal
	 * - Credit Card: Master Card
	 * - Debit
	 * - Bank Transfer
	 * - Real Time Bank Transfer
	 *
	 * Not all payment submethods are available within an adapter
	 *
	 * @return	array	Returns the available payment submethods for the specific adapter
	 */
	public function getPaymentSubmethods() {
		
		// Define the payment methods if they have not been set yet.
		if ( empty( $this->payment_submethods ) ) {
			
			$this->definePaymentSubmethods();
		}
		
		return $this->payment_methods;
	}
	
	/**
	 * Sends a curl request to the gateway server, and gets a response. 
	 * Saves that response to the gateway object with setTransactionResult();
	 * @param string $data the raw data we want to curl up to a server somewhere. 
	 * Should have been constructed with either buildRequestNameValueString, or 
	 * buildRequestXML. 
	 * @return boolean true if the communication was successful and there is a 
	 * parseable response, false if there was a fundamental communication 
	 * problem. (timeout, bad URL, etc.) 
	 */
	protected function curl_transaction( $data ) {
		// assign header data necessary for the curl_setopt() function
		$this->getStopwatch( __FUNCTION__, true );

		$ch = curl_init();

		$headers = $this->getCurlBaseHeaders();
		$headers[] = 'Content-Length: ' . strlen( $data );

		if ( $this->getCommunicationType() === 'xml' ) {
			self::log( "Sending Data: " . $this->formatXmlString( $data ) );
		} else {
			self::log( "Sending Data: " . $data );
		}

		$curl_opts = $this->getCurlBaseOpts();
		$curl_opts[CURLOPT_HTTPHEADER] = $headers;
		$curl_opts[CURLOPT_POSTFIELDS] = $data;

		foreach ( $curl_opts as $option => $value ) {
			curl_setopt( $ch, $option, $value );
		}

		// As suggested in the PayPal developer forum sample code, try more than once to get a response
		// in case there is a general network issue
		$i = 1;

		$results = array();

		while ( $i++ <= 3 ) {
			self::log( $this->postdatadefaults['order_id'] . ' Preparing to send transaction to ' . self::getGatewayName() );
			$results['result'] = curl_exec( $ch );
			$results['headers'] = curl_getinfo( $ch );

			if ( $results['headers']['http_code'] != 200 && $results['headers']['http_code'] != 403 ) {
				self::log( $this->postdatadefaults['order_id'] . ' Failed sending transaction to ' . self::getGatewayName() . ', retrying' );
				sleep( 1 );
			} elseif ( $results['headers']['http_code'] == 200 || $results['headers']['http_code'] == 403 ) {
				self::log( $this->postdatadefaults['order_id'] . ' Finished sending transaction to ' . self::getGatewayName() );
				break;
			}
		}

		$this->saveCommunicationStats( __FUNCTION__, $this->getCurrentTransaction(), "Request:" . print_r( $data, true ) . "\nResponse" . print_r( $results, true ) );

		if ( $results['headers']['http_code'] != 200 ) {
			$results['result'] = false;
			//TODO: i18n here! 
			//TODO: But also, fire off some kind of "No response from the gateway" thing to somebody so we know right away. 
			$results['message'] = 'No response from ' . self::getGatewayName() . '.  Please try again later!';
			self::log( $this->postdatadefaults['order_id'] . ' No response from ' . self::getGatewayName() . ': ' . curl_error( $ch ) );
			curl_close( $ch );
			return false;
		}

		curl_close( $ch );

		$this->setTransactionResult( $results );
		return true;
	}

	function stripXMLResponseHeaders( $rawResponse ) {
		$xmlStart = strpos( $rawResponse, '<?xml' );
		if ( $xmlStart == false ) { //I totally saw this happen one time. No XML, just <RESPONSE>...
			$xmlStart = strpos( $rawResponse, '<RESPONSE' );
		}
		if ( $xmlStart == false ) { //Still false. Your Head Asplode.
			self::log( "Wow, that was so messed up I couldn't even parse the response, so here's the thing in its entirety:\n" . $rawResponse );
			return false;
		}
		$justXML = substr( $rawResponse, $xmlStart );
		$this->setTransactionResult( $justXML, 'unparsed_data' );
		return $justXML;
	}

	function stripNameValueResponseHeaders( $rawResponse ) {
		$result = strstr( $rawResponse, 'RESULT' );
		$this->setTransactionResult( $result, 'unparsed_data' );
		return $result;
	}

	public static function log( $msg, $log_level = LOG_INFO, $log_id_suffix = '' ) {
		$identifier = self::getIdentifier() . "_gateway" . $log_id_suffix;

		// if we're not using the syslog facility, use wfDebugLog
		if ( !self::getGlobal( 'UseSyslog' ) ) {
			wfDebugLog( $identifier, $msg );
			return;
		}

		// otherwise, use syslogging
		openlog( $identifier, LOG_ODELAY, LOG_SYSLOG );
		syslog( $log_level, $msg );
		closelog();
	}

	//To avoid reinventing the wheel: taken from http://recursive-design.com/blog/2007/04/05/format-xml-with-php/
	function formatXmlString( $xml ) {
		// add marker linefeeds to aid the pretty-tokeniser (adds a linefeed between all tag-end boundaries)
		$xml = preg_replace( '/(>)(<)(\/*)/', "$1\n$2$3", $xml );

		// now indent the tags
		$token = strtok( $xml, "\n" );
		$result = ''; // holds formatted version as it is built
		$pad = 0; // initial indent
		$matches = array(); // returns from preg_matches()
		// scan each line and adjust indent based on opening/closing tags
		while ( $token !== false ) :

			// test for the various tag states
			// 1. open and closing tags on same line - no change
			if ( preg_match( '/.+<\/\w[^>]*>$/', $token, $matches ) ) :
				$indent = 0;
			// 2. closing tag - outdent now
			elseif ( preg_match( '/^<\/\w/', $token, $matches ) ) :
				$pad--;
			// 3. opening tag - don't pad this one, only subsequent tags
			elseif ( preg_match( '/^<\w[^>]*[^\/]>.*$/', $token, $matches ) ) :
				$indent = 1;
			// 4. no indentation needed
			else :
				$indent = 0;
			endif;

			// pad the line with the required number of leading spaces
			$line = str_pad( $token, strlen( $token ) + $pad, ' ', STR_PAD_LEFT );
			$result .= $line . "\n"; // add to the cumulative result, with linefeed
			$token = strtok( "\n" ); // get the next token
			$pad += $indent; // update the pad size for subsequent lines    
		endwhile;

		return $result;
	}

	/**
	 * Get the communication type from the gateway class. The communication type is how we need to
	 * package the donation data before we send it off to the payment processor, for example, 'xml'
	 * or 'namevalue'.
	 */
	static function getCommunicationType() {
		$c = get_called_class();
		return $c::COMMUNICATION_TYPE;
	}

	static function getGatewayName() {
		$c = get_called_class();
		return $c::GATEWAY_NAME;
	}

	static function getGlobalPrefix() {
		$c = get_called_class();
		return $c::GLOBAL_PREFIX;
	}

	static function getIdentifier() {
		$c = get_called_class();
		return $c::IDENTIFIER;
	}

	/**
	 * getStopwatch keeps track of how long things take, for logging, 
	 * output, determining if we should loop on some method again... whatever. 
	 * @staticvar array $start The microtime at which a stopwatch was started. 
	 * @param string $string Some identifier for each stopwatch value we want to 
	 * keep. Each unique $string passed in will get its own value in $start.
	 * @param bool $reset If this is set to true, it will reset any $start value 
	 * recorded for the $string identifier. 
	 * @return numeric The difference in microtime (rounded to 4 decimal places) 
	 * between the $start value, and now.  
	 */
	public function getStopwatch( $string, $reset = false ) {
		static $start = array();
		$now = microtime( true );

		if ( empty( $start ) || !array_key_exists( $string, $start ) || $reset === true ) {
			$start[$string] = $now;
		}
		$clock = round( $now - $start[$string], 4 );
		self::log( "\nClock at $string: $clock ($now)" );
		return $clock;
	}

	/**
	 *
	 * @param type $function
	 * @param type $additional
	 * @param type $vars 
	 */
	function saveCommunicationStats( $function = '', $additional = '', $vars = '' ) {
		$params = array();
		if ( self::getGlobal( 'SaveCommStats' ) ) {
			$db = ContributionTrackingProcessor::contributionTrackingConnection();

			//TODO: Actually define this table somewhere in the code, once we 
			//are reasonably certain we know what we want to see in it. 
			if ( !( $db->tableExists( 'communication_stats' ) ) ) {
				return;
			}

			$params['contribution_id'] = $this->dataObj->getVal( 'contribution_tracking_id' );
			$params['ts'] = $db->timestamp();
			$params['duration'] = $this->getStopwatch( __FUNCTION__ );
			$params['gateway'] = self::getGatewayName();
			$params['function'] = $function;
			$params['vars'] = $vars;
			$params['additional'] = $additional;

			$db->insert( 'communication_stats', $params );
		}
	}

	function xmlChildrenToArray( $xml, $nodename ) {
		$data = array();
		foreach ( $xml->getElementsByTagName( $nodename ) as $node ) {
			foreach ( $node->childNodes as $childnode ) {
				if ( trim( $childnode->nodeValue ) != '' ) {
					$data[$childnode->nodeName] = $childnode->nodeValue;
				}
			}
		}
		return $data;
	}

	/**
	 * addCodeRange is used to define ranges of response codes for major WMF 
	 * donation-making gateway transactions, that let us know what status bucket 
	 * to sort them into.
	 * DO NOT DEFINE OVERLAPPING RANGES!
	 * TODO: Make sure it won't let you add overlapping ranges. That would 
	 * probably necessitate the sort moving to here, too.
	 * @param string $transaction The transaction these codes map to.
	 * @param string $key The (incoming) field name containing the numeric codes 
	 * we're defining here. 
	 * @param string $action Should be limited to the values 'complete', 
	 * 'pending', 'pending-poke', 'failed' and 'revised'... but for now you're 
	 * on the honor system, kids. TODO: Limit these values in this function, 
	 * once we are slightly more certain we don't need more values.   
	 * @param int $lower The integer value of the lower-bound in this code range. 
	 * @param int $upper Optional: The integer value of the upper-bound in the 
	 * code range. If omitted, it will make a range of one value: The lower bound.
	 */
	protected function addCodeRange( $transaction, $key, $action, $lower, $upper = null ) {
		if ( $upper === null ) {
			$this->return_value_map[$transaction][$key][$lower] = $action;
		} else {
			$this->return_value_map[$transaction][$key][$upper] = array( 'action' => $action, 'lower' => $lower );
		}
	}

	function findCodeAction( $transaction, $key, $code ) {
		$this->getStopwatch( __FUNCTION__, true );
		if ( !array_key_exists( $transaction, $this->return_value_map ) || !array_key_exists( $key, $this->return_value_map[$transaction] ) ) {
			return null;
		}
		if ( !is_array( $this->return_value_map[$transaction][$key] ) ) {
			return null;
		}
		//sort the array so we can do this quickly. 
		ksort( $this->return_value_map[$transaction][$key], SORT_NUMERIC );

		$ranges = $this->return_value_map[$transaction][$key];
		//so, you have a code, which is a number. You also have a numerically sorted array.
		//loop through until you find an upper >= your code.
		//make sure it's in the range, and return the action. 
		foreach ( $ranges as $upper => $val ) {
			if ( $upper >= $code ) { //you've arrived. It's either here or it's nowhere.
				if ( is_array( $val ) ) {
					if ( $val['lower'] <= $code ) {
						$this->saveCommunicationStats( __FUNCTION__, $transaction, "code = $code" );
						return $val['action'];
					} else {
						return null;
					}
				} else {
					if ( $upper === $code ) {
						$this->saveCommunicationStats( __FUNCTION__, $transaction, "code = $code" );
						return $val;
					} else {
						return null;
					}
				}
			}
		}
		//if we walk straight off the end...
		return null;
	}

	/**
	 * Adds donor data to the user's session, presumably for retrieval before we 
	 * unset all the session data. 
	 * An example of a time you would want to use this, is when fetching 
	 * GlobalCollect's credit card iFrame. They need the donor data, but don't 
	 * pass it back to us, so we have to hold on to it somehow prior to the 
	 * point we save it to the database (on successful conversion)
	 */
	public function addDonorDataToSession() {
		$this->dataObj->addDonorDataToSession();
	}

	/**
	 * Destroys the session completely. 
	 * Note: This will leave the cookie behind! It just won't go to anything at 
	 * all. 
	 */
	function unsetAllSessionData() {
		$this->dataObj->killAllSessionEverything();
		$this->debugarray[] = 'Killed all the session everything.';
	}

	/**
	 * Called in do_transaction, in the case that we have successfully completed 
	 * a transaction that has 'do_processhooks' enabled. 
	 * Saves a stomp frame to the configured server and queue, based on the 
	 * outcome of our current transaction. 
	 * The big tricky thing here, is that we DO NOT SET a TransactionWMFStatus, 
	 * unless we have just learned what happened to a donation in progress, 
	 * through performing the current transaction. 
	 * To put it another way, getTransactionWMFStatus should always return 
	 * false, unless it's new data about a new transaction. In that case, the 
	 * outcome will be assigned and the proper stomp hook selected. 
	 * @return null 
	 */
	protected function doStompTransaction() {
		$this->debugarray[] = "Attempting Stomp Transaction!";
		$hook = '';

		$status = $this->getTransactionWMFStatus();
		switch ( $status ) {
			case 'complete':
				$hook = 'gwStomp';
				break;
			case 'pending':
			case 'pending-poke':
				$hook = 'gwPendingStomp';
				break;
		}
		if ( $hook === '' ) {
			$this->debugarray[] = "No Stomp Hook Found for WMF_Status $status";
			return;
		}

		// send the thing.
		$transaction = array(
			'response' => $this->getTransactionMessage(),
			'date' => time(),
			'gateway_txn_id' => $this->getTransactionGatewayTxnID(),
			//'language' => '',
		);
		$transaction += $this->getDisplayData();

		self::log( "Intended STOMP transaction: " . print_r( $transaction, true ) );
		
		try {
			wfRunHooks( $hook, array( $transaction ) );
		} catch ( Exception $e ) {
			self::log( "STOMP ERROR. Could not add message. " . $e->getMessage() , LOG_CRIT );
		}
		
	}

	function smooshVarsForStaging() {

		foreach ( $this->staged_vars as $field ) {
			if ( !array_key_exists( $field, $this->postdata ) || empty( $this->postdata[$field] ) ) {
				if ( array_key_exists( $field, $this->postdatadefaults ) ) {
					$this->postdata[$field] = $this->postdatadefaults[$field];
				}
			}
			//what do we do in the event that we're still nothing? (just move on.)
		}
	}

	/**
	 *
	 * @param type $type Whatever types of staging you feel like having in your child class. 
	 * ...but usually request and response. I think. 
	 */
	function stageData( $type = 'request' ) {
		$this->defineStagedVars();
		$this->smooshVarsForStaging(); //yup, we do need to do this seperately. 
		//If we tried to piggyback off the same loop, all the vars wouldn't be ready, and some staging functions will require 
		//multiple variables.
		foreach ( $this->staged_vars as $field ) {
			$function_name = 'stage_' . $field;
			if ( method_exists( $this, $function_name ) ) {
				$this->{$function_name}( $type );
			}
		}
	}

	function getPaypalRedirectURL() {
		$utm_source = $this->getData( 'utm_source' );

		// update the utm source to set the payment instrument to pp rather than cc
		$utm_source_parts = explode( ".", $utm_source );
		$utm_source_parts[2] = 'pp';
		$data['utm_source'] = implode( ".", $utm_source_parts );
		$data['gateway'] = 'paypal';
		$data['currency_code'] = $data['currency'];

		// Add our response vars to the data object. 
		$this->dataObj->addData( $data );
		// refresh our data
		$this->postdata = $this->dataObj->getData();

		//update contribution tracking
		$this->dataObj->updateContributionTracking( true );

		$ret = self::getGlobal( "PaypalURL" ) . "/" . $this->postdata['language'] . "?gateway=paypal&" . http_build_query( $this->getPaypalData() );
		self::log( $ret );
		return $ret;
	}
	
	protected function getPaypalData() {
		$paypalkeys = array(
			'gateway',
			'contribution_tracking_id',
			'comment',
			'referrer',
			'comment-option',
			'utm_source',
			'utm_medium',
			'utm_campaign',
			'email-opt',
			'language',
			'owa_session',
			'owa_ref',
			'tshirt',
			'returnto',
			'currency_code',
			'fname',
			'lname',
			'email',
			'address1',
			'city',
			'state',
			'zip',
			'country',
			'address_override',
			'recurring_paypal',
			'amount',
			'amountGiven',
			'size',
			'premium_language', 
		);
		$ret = array();
		foreach ( $paypalkeys as $key ){
			$val = $this->getData( $key );
			if (!is_null( $val )){
				$ret[$key] = $this->getData( $key );
			}
		}
		return $ret;
	}

	public function getTransactionAllResults() {
		if ( $this->transaction_results && is_array( $this->transaction_results ) ) {
			return $this->transaction_results;
		} else {
			return false;
		}
	}

	/**
	 * SetTransactionResult sets the gateway adapter object's 
	 * $transaction_results value. 
	 * If a $key is specified, it only sets the specified key's value. If no 
	 * $key is specified, it resets the value of the entire array.
	 * @param mixed $value The value to set in $transaction_results
	 * @param mixed $key Optional: A specific key to set, or false (default) to 
	 * reset the entire result array. 
	 */
	public function setTransactionResult( $value, $key = false ) {
		if ( $key === false ) {
			$this->transaction_results = $value;
		} else {
			$this->transaction_results[$key] = $value;
		}
	}

	public function getTransactionRawResponse() {
		if ( array_key_exists( 'result', $this->transaction_results ) ) {
			return $this->transaction_results['result'];
		} else {
			return false;
		}
	}

	/**
	 * If it has been set: returns the Transaction Status in the 
	 * $transaction_results array. Otherwise, returns false.
	 * @return mixed Transaction results status, or false if not set.  
	 */
	public function getTransactionStatus() {
		if ( array_key_exists( 'status', $this->transaction_results ) ) {
			return $this->transaction_results['status'];
		} else {
			return false;
		}
	}

	/**
	 * If it has been set: returns the WMF Transaction Status in the 
	 * $transaction_results array. This is the one we care about for switching 
	 * on overall behavior. Otherwise, returns false.
	 * @return mixed WMF Transaction results status, or false if not set. 
	 * Possible valid statuses are: 'complete', 'pending', 'pending-poke', 'failed' and 'revised'.
	 */
	public function getTransactionWMFStatus() {
		if ( array_key_exists( 'WMF_STATUS', $this->transaction_results ) ) {
			return $this->transaction_results['WMF_STATUS'];
		} else {
			return false;
		}
	}

	/**
	 * Sets the WMF Transaction Status. This is the one we care about for 
	 * switching on behavior. 
	 */
	public function setTransactionWMFStatus( $status ) {
		$this->transaction_results['WMF_STATUS'] = $status;
	}

	public function getTransactionMessage() {
		if ( array_key_exists( 'txn_message', $this->transaction_results ) ) {
			return $this->transaction_results['txn_message'];
		} else {
			return false;
		}
	}

	public function getTransactionGatewayTxnID() {
		if ( array_key_exists( 'gateway_txn_id', $this->transaction_results ) ) {
			return $this->transaction_results['gateway_txn_id'];
		} else {
			return false;
		}
	}

	/**
	 * Returns the FORMATTED data harvested from the reply, or false if it is not set. 
	 * @return mixed An array of returned data, or false.  
	 */
	public function getTransactionData() {
		if ( array_key_exists( 'data', $this->transaction_results ) ) {
			return $this->transaction_results['data'];
		} else {
			return false;
		}
	}

	public function setFormClass( $formClassName ) {
		//I'm adding this because Captcha needs it, and we're gonna fire the hook inside. Nothing else really needs it as far as I know.
		$this->form_class = $formClassName;
	}

	public function getFormClass() {
		if ( isset( $this->form_class ) && class_exists( $this->form_class ) ) {
			return $this->form_class;
		} else {
			return false;
		}
	}

	public function getGatewayAdapterClass() {
		return get_called_class();
	}

	public function setValidationErrors( $errors ) {
		$this->validation_errors = $errors;
	}

	public function getValidationErrors() {
		if ( !empty( $this->validation_errors ) ) {
			return $this->validation_errors;
		} else {
			return false;
		}
	}

	public function incrementNumAttempt() {
		$this->dataObj->incrementNumAttempt();
		$this->refreshGatewayValueFromSource( 'numAttempt' );
	}

	public function setHash( $hashval ) {
		$this->dataObj->setVal( 'data_hash', $hashval );
	}

	public function unsetHash() {
		$this->dataObj->expunge( 'data_hash' );
	}

	public function setActionHash( $hashval ) {
		$this->dataObj->setVal( 'action', $hashval );
	}

	public function unsetActionHash() {
		$this->dataObj->expunge( 'action' );
	}

	function runPreProcess() {
		global $wgHooks;
		if ( $this->transaction_option( 'do_validation' ) ) {
			if ( !isset( $wgHooks['GatewayValidate'] ) ) {
				//if there ARE no validate hooks, we're okay.
				$this->action = 'process';
				return;
			}
			// allow any external validators to have their way with the data
			self::log( $this->getData( 'order_id' ) . " Preparing to query MaxMind" );
			wfRunHooks( 'GatewayValidate', array( &$this ) );
			self::log( $this->getData( 'order_id' ) . ' Finished querying Maxmind' );

			// if the transaction was flagged for review
			if ( $this->action == 'review' ) {
				// expose a hook for external handling of trxns flagged for review
				wfRunHooks( 'GatewayReview', array( &$this ) );
			}

			// if the transaction was flagged to be 'challenged'
			if ( $this->action == 'challenge' ) {
				// expose a hook for external handling of trxns flagged for challenge (eg captcha)
				wfRunHooks( 'GatewayChallenge', array( &$this ) );
			}

			// if the transaction was flagged for rejection
			if ( $this->action == 'reject' ) {
				// expose a hook for external handling of trxns flagged for rejection
				wfRunHooks( 'GatewayReject', array( &$this ) );
				$this->unsetAllSessionData();
			}
		} else {
			$this->action = 'process'; //we have to do this so do_transaction doesn't kick out. 
		}
	}

	function transaction_option( $option_value ) {
		//ooo, ugly. 
		$transaction = $this->getCurrentTransaction();
		if ( !$transaction ){
			return false;
		}
		if ( array_key_exists( $option_value, $this->transactions[$transaction] ) ) {
			if ( $this->transactions[$transaction][$option_value] === true ) {
				return true;
			}
			if ( is_array( $this->transactions[$transaction][$option_value] ) &&
				!empty( $this->transactions[$transaction][$option_value] ) ) {
				return $this->transactions[$transaction][$option_value];
			}
		}
		return false;
	}
	
	/**
	 * Instead of pulling all the DonationData back through to update one local 
	 * value, use this. It updates both postdata (which is intended to be 
	 * staged for the gateway) and displaydata (which could potentially become 
	 * staged for the user). 
	 * 
	 * TODO: handle the cases where $val is listed in the gateway adapter's 
	 * staged_vars. 
	 * Not doing this right now, though, because it's not yet necessary for 
	 * anything we have at the moment. 
	 * 
	 * @param string $val The field name that we are looking to retrieve from 
	 * our DonationData object. 
	 */
	function refreshGatewayValueFromSource( $val ){
		$refreshed = $this->dataObj->getVal( $val );
		$this->postdata[$val] = $refreshed;
		$this->displaydata[$val] = $refreshed;
	}

}
