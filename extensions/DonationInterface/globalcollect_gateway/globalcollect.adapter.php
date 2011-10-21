<?php

class GlobalCollectAdapter extends GatewayAdapter {
	const GATEWAY_NAME = 'Global Collect';
	const IDENTIFIER = 'globalcollect';
	const COMMUNICATION_TYPE = 'xml';
	const GLOBAL_PREFIX = 'wgGlobalCollectGateway';

	/**
	 * Define accountInfo
	 */
	public function defineAccountInfo() {
		$this->accountInfo = array(
			'MERCHANTID' => self::getGlobal( 'MerchantID' ),
			//'IPADDRESS' => '', //TODO: Not sure if this should be OUR ip, or the user's ip. Hurm. 
			'VERSION' => "1.0",
		);
	}

	/**
	 * Define var_map
	 */
	public function defineVarMap() {
		$this->var_map = array(
			'ORDERID' => 'order_id',
			'AMOUNT' => 'amount',
			'CURRENCYCODE' => 'currency',
			'LANGUAGECODE' => 'language',
			'COUNTRYCODE' => 'country',
			'MERCHANTREFERENCE' => 'order_id',
			'RETURNURL' => 'returnto', //TODO: Fund out where the returnto URL is supposed to be coming from. 
			'IPADDRESS' => 'user_ip', //TODO: Not sure if this should be OUR ip, or the user's ip. Hurm.
			'PAYMENTPRODUCTID' => 'card_type',
			'CVV' => 'cvv',
			'EXPIRYDATE' => 'expiration',
			'CREDITCARDNUMBER' => 'card_num',
			'FIRSTNAME' => 'fname',
			'SURNAME' => 'lname',
			'STREET' => 'street',
			'CITY' => 'city',
			'STATE' => 'state',
			'ZIP' => 'zip',
			'EMAIL' => 'email',
		);
	}

	/**
	 * Define return_value_map
	 */
	public function defineReturnValueMap() {
		$this->return_value_map = array(
			'OK' => true,
			'NOK' => false,
		);
		$this->addCodeRange( 'GET_ORDERSTATUS', 'STATUSID', 'pending', 0, 70 );
		$this->addCodeRange( 'GET_ORDERSTATUS', 'STATUSID', 'failed', 100, 180 );
		$this->addCodeRange( 'GET_ORDERSTATUS', 'STATUSID', 'pending', 200 );
		$this->addCodeRange( 'GET_ORDERSTATUS', 'STATUSID', 'failed', 220, 280 );
		$this->addCodeRange( 'GET_ORDERSTATUS', 'STATUSID', 'pending', 300 );
		$this->addCodeRange( 'GET_ORDERSTATUS', 'STATUSID', 'failed', 310, 350 );
		$this->addCodeRange( 'GET_ORDERSTATUS', 'STATUSID', 'revised', 400 );
		$this->addCodeRange( 'GET_ORDERSTATUS', 'STATUSID', 'pending_poke', 525 );
		$this->addCodeRange( 'GET_ORDERSTATUS', 'STATUSID', 'pending', 550, 650 );
		$this->addCodeRange( 'GET_ORDERSTATUS', 'STATUSID', 'complete', 800, 975 ); //these are all post-authorized, but technically pre-settled...
		$this->addCodeRange( 'GET_ORDERSTATUS', 'STATUSID', 'complete', 1000, 1050 );
		$this->addCodeRange( 'GET_ORDERSTATUS', 'STATUSID', 'failed', 1100, 99999 );
	}

	/**
	 * Define transactions
	 *
	 * Please do not add more transactions to this array.
	 * This method should define:
	 * - INSERT_ORDERWITHPAYMENT: used for payments
	 * - TEST_CONNECTION: testing connections - is this still valid?
	 * - GET_ORDERSTATUS
	 *
	 * @todo
	 * - Remove BANK_TRANSFER
	 *
	 */
	public function defineTransactions() {

		// Define the transaction types and groups
		$this->defineTransactionGroups();
		$this->defineTransactionTypes();
		
		$this->transactions = array( );

		$this->transactions['INSERT_ORDERWITHPAYMENT'] = array(
			'request' => array(
				'REQUEST' => array(
					'ACTION',
					'META' => array(
						'MERCHANTID',
						// 'IPADDRESS',
						'VERSION'
					),
					'PARAMS' => array(
						'ORDER' => array(
							'ORDERID',
							'AMOUNT',
							'CURRENCYCODE',
							'LANGUAGECODE',
							'COUNTRYCODE',
							'MERCHANTREFERENCE'
						),
						'PAYMENT' => array(
							'PAYMENTPRODUCTID',
							'AMOUNT',
							'CURRENCYCODE',
							'LANGUAGECODE',
							'COUNTRYCODE',
							'HOSTEDINDICATOR',
							'RETURNURL',
//							'CVV',
//							'EXPIRYDATE',
//							'CREDITCARDNUMBER',
							'FIRSTNAME',
							'SURNAME',
							'STREET',
							'CITY',
							'STATE',
							'ZIP',
							'EMAIL',
						)
					)
				)
			),
			'values' => array(
				'ACTION' => 'INSERT_ORDERWITHPAYMENT',
				'HOSTEDINDICATOR' => '1',
			//'PAYMENTPRODUCTID' => '11',
			),
			'do_validation' => true,
			'addDonorDataToSession' => true,
		);

		$this->transactions['TEST_CONNECTION'] = array(
			'request' => array(
				'REQUEST' => array(
					'ACTION',
					'META' => array(
						'MERCHANTID',
//							'IPADDRESS',
						'VERSION'
					),
					'PARAMS' => array( )
				)
			),
			'values' => array(
				'ACTION' => 'TEST_CONNECTION'
			)
		);

		$this->transactions['GET_ORDERSTATUS'] = array(
			'request' => array(
				'REQUEST' => array(
					'ACTION',
					'META' => array(
						'MERCHANTID',
//						'IPADDRESS',
						'VERSION'
					),
					'PARAMS' => array(
						'ORDER' => array(
							'ORDERID',
						),
					)
				)
			),
			'values' => array(
				'ACTION' => 'GET_ORDERSTATUS',
				'VERSION' => '2.0'
			),
			'do_processhooks' => true,
			'pullDonorDataFromSession' => true,
			'loop_for_status' => array(
				//'pending',
				'pending_poke',
				'complete',
				'failed',
				'revised',
			)
		);
	}
	
	/**
	 * Define transaction groups
	 *
	 * At some point, we are going to need methods to get this information to display available forms
	 *
	 * @todo
	 * - This is not in use. This is a map to @see GlobalCollectAdapter::defineTransactionTypes()
	 *
	 */
	private function defineTransactionGroups() {
		
		$this->transaction_groups = array();
		
		$this->transaction_groups['rtbt'] = array(
			'label'	=> 'Real time bank transfer',
			'types'	=> array( 'rtbt_ideal',  'rtbt_eps',  'rtbt_sofortuberweisung',  'rtbt_nordea_sweeden', 'rtbt_enets', ),
		);
		
		$this->transaction_groups['bt'] = array(
			'label'	=> 'Bank transfer',
			'types'	=> array( 'bt', ),
			'validation' => array( 'creditCard' => false, )
			//'forms'	=> array( 'Gateway_Form_TwoStepAmount', ),
		);
	}

	/**
	 * Define transaction types
	 *
	 */
	private function defineTransactionTypes() {
		
		$this->transaction_types = array();

		/*
		 * Bank transfers
		 */
		 
		// Bank Transfer
		$this->transaction_types['bt'] = array(
			'paymentproductid'	=> 11,
			'label'	=> 'Bank Transfer',
			'group'	=> 'bt',
			'validation' => array( 'creditCard' => false, ),
		);

		/*
		 * Real time bank transfers
		 */
		 
		// Nordea (Sweeden)
		$this->transaction_types['rtbt_nordea_sweeden'] = array(
			'paymentproductid'	=> 805,
			'label'	=> 'Nordea (Sweeden)',
			'group'	=> 'rtbt',
			'validation' => array( 'creditCard' => false, ),
		);
		 
		// Ideal
		$this->transaction_types['rtbt_ideal'] = array(
			'paymentproductid'	=> 809,
			'label'	=> 'Ideal',
			'group'	=> 'rtbt',
			'validation' => array( 'creditCard' => false, ),
		);
		 
		// eNETS
		$this->transaction_types['rtbt_enets'] = array(
			'paymentproductid'	=> 810,
			'label'	=> 'eNETS',
			'group'	=> 'rtbt',
			'validation' => array( 'creditCard' => false, ),
		);
		 
		// Sofortuberweisung/DIRECTebanking
		$this->transaction_types['rtbt_sofortuberweisung'] = array(
			'paymentproductid'	=> 836,
			'label'	=> 'Sofortuberweisung/DIRECTebanking',
			'group'	=> 'rtbt',
			'validation' => array( 'creditCard' => false, ),
		);
		 
		// eps Online-Überweisung
		$this->transaction_types['rtbt_eps'] = array(
			'paymentproductid'	=> 856,
			'label'	=> 'eps Online-Überweisung',
			'group'	=> 'rtbt',
			'validation' => array( 'creditCard' => false, ),
			'issuerids' => array( 
				824 => 'Bankhaus Spängler',
				825 => 'Hypo Tirol Bank',
				822 => 'NÖ HYPO',
				823 => 'Voralberger HYPO',
				828 => 'P.S.K.',
				829 => 'Easy',
				826 => 'Erste Bank und Sparkassen',
				827 => 'BAWAG',
				820 => 'Raifeissen',
				821 => 'Volksbanken Gruppe',
				831 => 'Sparda-Bank',
			)
		);
	}

	/**
	 * Get a transaction group meta
	 *
	 * @param	string	$group	Groups contain transaction types
	 */
	public function getTransactionGroupMeta( $group ) {
		
		if ( isset( $this->transaction_groups[ $group ] ) ) {
			
			return $this->transaction_groups[ $group ];
		}
		else {
			$message = 'The transaction group [ ' . $group . ' ] was not found.';
			throw new Exception( $message );
		}
	}

	/**
	 * Get a transaction type meta
	 *
	 * @param	string	$transactionType	Transaction types are mapped to paymentproductid
	 */
	public function getTransactionTypeMeta( $transactionType, $options = array() ) {
		
		extract( $options );
		
		$log = isset( $log ) ? (boolean) $log : false ;
		
		if ( isset( $this->transaction_types[ $transactionType ] ) ) {
			
			if ( $log ) {
				$this->log( 'Getting transaction type: ' . ( string ) $transactionType );
			}
			
			// Ensure that the validation index is set.
			if ( !isset( $this->transaction_types[ $transactionType ]['validation'] ) ) {
				$this->transaction_types[ $transactionType ]['validation'] = array();
			}
			
			return $this->transaction_types[ $transactionType ];
		}
		else {
			$message = 'The transaction type [ ' . $transactionType . ' ] was not found.';
			throw new Exception( $message );
		}
	}
	
	/**
	 * Take the entire response string, and strip everything we don't care about.
	 * For instance: If it's XML, we only want correctly-formatted XML. Headers must be killed off. 
	 * return a string.
	 *
	 * @param string	$rawResponse	The raw response a string of XML.
	 */
	public function getFormattedResponse( $rawResponse ) {
		$xmlString = $this->stripXMLResponseHeaders( $rawResponse );
		$displayXML = $this->formatXmlString( $xmlString );
		$realXML = new DomDocument( '1.0' );
		self::log( "Here is the Raw XML: " . $displayXML ); //I am apparently a huge fibber.
		$realXML->loadXML( trim( $xmlString ) );
		return $realXML;
	}

	/**
	 * Parse the response to get the status. Not sure if this should return a bool, or something more... telling.
	 *
	 * @param array	$response	The response array
	 */
	public function getResponseStatus( $response ) {

		$aok = true;

		foreach ( $response->getElementsByTagName( 'RESULT' ) as $node ) {
			if ( array_key_exists( $node->nodeValue, $this->return_value_map ) && $this->return_value_map[$node->nodeValue] !== true ) {
				$aok = false;
			}
		}

		return $aok;
	}

	/**
	 * Parse the response to get the errors in a format we can log and otherwise deal with.
	 * return a key/value array of codes (if they exist) and messages. 
	 *
	 * @param array	$response	The response array
	 */
	public function getResponseErrors( $response ) {
		$errors = array( );
		foreach ( $response->getElementsByTagName( 'ERROR' ) as $node ) {
			$code = '';
			$message = '';
			foreach ( $node->childNodes as $childnode ) {
				if ( $childnode->nodeName === "CODE" ) {
					$code = $childnode->nodeValue;
				}
				if ( $childnode->nodeName === "MESSAGE" ) {
					$message = $childnode->nodeValue;
				}
			}
			$errors[$code] = $message;
		}
		return $errors;
	}

	/**
	 * Harvest the data we need back from the gateway. 
	 * return a key/value array
	 *
	 * @param array	$response	The response array
	 */
	public function getResponseData( $response ) {
		$data = array( );

		$transaction = $this->currentTransaction();

		switch ( $transaction ) {
			case 'BANK_TRANSFER':
				$data = $this->xmlChildrenToArray( $response, 'ROW' );
				$data['ORDER'] = $this->xmlChildrenToArray( $response, 'ORDER' );
				$data['PAYMENT'] = $this->xmlChildrenToArray( $response, 'PAYMENT' );
				break;
			case 'INSERT_ORDERWITHPAYMENT':
				$data = $this->xmlChildrenToArray( $response, 'ROW' );
				$data['ORDER'] = $this->xmlChildrenToArray( $response, 'ORDER' );
				$data['PAYMENT'] = $this->xmlChildrenToArray( $response, 'PAYMENT' );
				break;
			case 'GET_ORDERSTATUS':
				$data = $this->xmlChildrenToArray( $response, 'STATUS' );
				$this->setTransactionWMFStatus( $this->findCodeAction( 'GET_ORDERSTATUS', 'STATUSID', $data['STATUSID'] ) );
				$data['ORDER'] = $this->xmlChildrenToArray( $response, 'ORDER' );
				break;
		}


		self::log( "Returned Data: " . print_r( $data, true ) );
		return $data;
	}


	/**
	 * Process the response
	 *
	 * @param array	$response	The response array
	 */
	public function processResponse( $response ) {
		//set the transaction result message
		$responseStatus = isset( $response['STATUSID'] ) ? $response['STATUSID'] : '';
		$this->setTransactionResult( "Response Status: " . $responseStatus, 'txn_message' ); //TODO: Translate for GC. 
		$this->setTransactionResult( $this->getData( 'order_id' ), 'gateway_txn_id' );
	}

	/**
	 * The default section of the switch will be hit on first time forms. This
	 * should be okay, because we are only concerned with staged_vars that have
	 * been posted.
	 *
	 * Credit cards staged_vars are set to ensure form failures on validation in
	 * the default case. This should prevent accidental form submission with
	 * unknown transaction types. 
	 */
	public function defineStagedVars() {

		//OUR field names. 
		$this->staged_vars = array(
			'amount',
			'card_type',
			//'card_num',
			'returnto',
			'transaction_type',
			'order_id', //This may or may not oughta-be-here...
		);
	}

	/**
	 * Stage: amount
	 *
	 * @param string	$type	request|response
	 */
	protected function stage_amount( $type = 'request' ) {
		switch ( $type ) {
			case 'request':
				$this->postdata['amount'] = $this->postdata['amount'] * 100;
				break;
			case 'response':
				$this->postdata['amount'] = $this->postdata['amount'] / 100;
				break;
		}
	}

	/**
	 * Stage: card_num
	 *
	 * @param string	$type	request|response
	 */
	protected function stage_card_num( $type = 'request' ) {
		//I realize that the $type isn't used. Voodoo.
		if ( array_key_exists( 'card_num', $this->postdata ) ) {
			$this->postdata['card_num'] = str_replace( ' ', '', $this->postdata['card_num'] );
		}
	}

	/**
	 * Stage: card_type
	 *
	 * @param string	$type	request|response
	 */
	protected function stage_card_type( $type = 'request' ) {

		$types = array(
			'visa' => '1',
			'mastercard' => '3',
			'american' => '2',
			'discover' => '128'
		);

		if ( $type === 'response' ) {
			$types = array_flip( $types );
		}

		if ( ( array_key_exists( 'card_type', $this->postdata ) ) && array_key_exists( $this->postdata['card_type'], $types ) ) {
			$this->postdata['card_type'] = $types[$this->postdata['card_type']];
		} else {
			//$this->postdata['card_type'] = '';
			//iono: maybe nothing? 
		}
	}

	/**
	 * Stage: transaction_type
	 *
	 * @param string	$type	request|response
	 *
	 * @todo
	 * - ISSUERID will need to provide a dropdown for rtbt_ideal and rtbt_ideal.
	 */
	protected function stage_transaction_type( $type = 'request' ) {
		
		$transaction_type = array_key_exists( 'transaction_type', $this->postdata ) ? $this->postdata['transaction_type']: false;

		// These will be grouped and ordred by payment product id
		switch ( $transaction_type )  {
			
			/* Bank transfer */
			case 'bt':
				$this->postdata['payment_product'] = 11;
				$this->var_map['PAYMENTPRODUCTID'] = 'payment_product';
				break;
			
			/* Real time bank transfer */
			case 'rtbt_nordea_sweeden':
				$this->postdata['payment_product'] = 805;
				$this->var_map['PAYMENTPRODUCTID'] = 'payment_product';
				break;
			
			case 'rtbt_ideal':
				$this->postdata['payment_product'] = 809;
				$this->var_map['PAYMENTPRODUCTID'] = 'payment_product';
				//$this->var_map['ISSUERID'] = 'issuer';
				break;
			
			case 'rtbt_enets':
				$this->postdata['payment_product'] = 810;
				$this->var_map['PAYMENTPRODUCTID'] = 'payment_product';
				break;
			
			case 'rtbt_sofortuberweisung':
				$this->postdata['payment_product'] = 836;
				$this->var_map['PAYMENTPRODUCTID'] = 'payment_product';
				break;
			
			case 'rtbt_eps':
				$this->postdata['payment_product'] = 856;
				$this->var_map['PAYMENTPRODUCTID'] = 'payment_product';
				//$this->var_map['ISSUERID'] = 'issuer';
				break;
		}
	}

	/**
	 * Stage: returnto
	 *
	 * @param string	$type	request|response
	 */
	protected function stage_returnto( $type = 'request' ) {
		if ( $type === 'request' ) {
			$this->postdata['returnto'] = $this->postdata['returnto'] . "?order_id=" . $this->postdata['order_id'];
		}
	}

}