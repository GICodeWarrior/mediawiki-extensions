<?php
/**
 * Generic Donation API
 * This API should be able to accept donation submissions for any gateway or payment type
 * Call with api.php?action=donate
 */
class DonationApi extends ApiBase {
	var $donationData, $gateway;
	public function execute() {
		global $wgRequest, $wgParser;
		
		$this->donationData = $this->extractRequestParams();
		
		$this->gateway = $this->donationData['gateway'];
		
		// If you want to test with fake data, pass a 'test' param set to true.
		// You still have to set the gateway you are testing though.
		// It looks like this only works if the Test global variable for that gateway is true.
		if ( array_key_exists( 'test', $this->donationData ) && $this->donationData['test'] ) {
			$this->populateTestData();
		} else {
			// If we need to do any local data munging do it here.
		}
		
		$method = $this->donationData['payment_method'];
		
		if ( $this->gateway == 'payflowpro' ) {
			$gatewayObj = new PayflowProAdapter();
			switch ( $method ) {
				// TODO: add other payment methods
				default:
					$result = $gatewayObj->do_transaction( 'Card' );
			}
		} else if ( $this->gateway == 'globalcollect' ) {
			$gatewayObj = new GlobalCollectAdapter();
			switch ( $method ) {
				// TODO: add other payment methods
				case 'card':
					$result = $gatewayObj->do_transaction( 'INSERT_ORDERWITHPAYMENT' );
					break;
				default:
					$result = $gatewayObj->do_transaction( 'TEST_CONNECTION' );
			}
		} else {
			$this->dieUsage( "Invalid gateway <<<$gateway>>> passed to Donation API.", 'unknown_gateway' );
		}
		
		//$normalizedData = $gatewayObj->getData();
		$outputResult = array();
		$outputResult['message'] = $result['message'];
		$outputResult['status'] = $result['status'];
		if ( array_key_exists( 'RETURNURL', $result['data']['PAYMENT'] ) ) {
			$outputResult['returnurl'] = $result['data']['PAYMENT']['RETURNURL'];
		}
		if ( array_key_exists( 'FORMACTION', $result['data'] ) ) {
			$outputResult['formaction'] = $result['data']['FORMACTION'];
		}
		if ( $result['errors'] ) {
			$outputResult['errors'] = $result['errors'];
		}
		
		if ( $this->donationData ) {
			$this->getResult()->addValue( null, 'request', $this->donationData );
		}
		$this->getResult()->addValue( null, 'result', $outputResult );
		
		/*
		$this->getResult()->setIndexedTagName( $result, 'response' );
		$this->getResult()->addValue( 'data', 'result', $result );
		*/
	}

	public function getAllowedParams() {
		return array(
			'gateway' => $this->defineParam( true ),
			'test' => $this->defineParam( false  ),
			'amount' => $this->defineParam( false ),
			'currency' => $this->defineParam( false ),
			'fname' => $this->defineParam( false ),
			'mname' => $this->defineParam( false ),
			'lname' => $this->defineParam( false ),
			'street' => $this->defineParam( false ),
			'city' => $this->defineParam( false ),
			'state' => $this->defineParam( false ),
			'zip' => $this->defineParam( false ),
			'emailAdd' => $this->defineParam( false ),
			'country' => $this->defineParam( false ),
			'card_num' => $this->defineParam( false  ),
			'card_type' => $this->defineParam( false  ),
			'expiration' => $this->defineParam( false  ),
			'cvv' => $this->defineParam( false  ),
			'payment_method' => $this->defineParam( false  ),
			'language' => $this->defineParam( false  ),
		);
	}
	
	private function defineParam( $required = false, $type = 'string' ) {
		if ( $required ) {
			$param = array( ApiBase::PARAM_TYPE => $type, ApiBase::PARAM_REQUIRED => true );
		} else {
			$param = array( ApiBase::PARAM_TYPE => $type );
		}
		return $param;
	}
	
	private function populateTestData() {
		$this->donationData = array(
			'gateway' => $this->gateway,
			'amount' => "35",
			'currency' => 'USD',
			'fname' => 'Tester',
			'mname' => 'T.',
			'lname' => 'Testington',
			'street' => '548 Market St.',
			'city' => 'San Francisco',
			'state' => 'CA',
			'zip' => '94104',
			'emailAdd' => 'test@example.com',
			'country' => 'US',
			'payment_method' => 'card',
			'language' => 'en',
			'card_type' => 'american',
		);
		if ( $gateway != 'globalcollect' ) {
			$params += array(
				'card_num' => '378282246310005',
				'expiration' => date( 'my', strtotime( '+1 year 1 month' ) ),
				'cvv' => '001',
			);
		}
		return true;
	}

	public function getParamDescription() {
		return array(
			'gateway' => 'Which payment gateway to use - payflowpro, globalcollect, etc.',
			'test' => 'Set to true if you want to use bogus test data instead of supplying your own',
			'amount' => 'The amount donated',
			'currency' => 'Currency code',
			'fname' => 'First name',
			'mname' => 'Middle name',
			'lname' => 'Last name',
			'street' => 'First line of street address',
			'city' => 'City',
			'state' => 'State abbreviation',
			'zip' => 'Postal code',
			'emailAdd' => 'Email address',
			'country' => 'Country code',
			'card_num' => 'Credit card number',
			'card_type' => 'Credit card type',
			'expiration' => 'Expiration date',
			'cvv' => 'CVV security code',
			'payment_method' => 'Payment method to use',
			'language' => 'Language code',
		);
	}

	public function getDescription() {
		return array(
			'This API allow you to submit a donation to the Wikimedia Foundation using a',
			'variety of payment processors.',
		);
	}

	public function getExamples() {
		return array(
			'api.php?action=donate&gateway=payflowpro&amount=2.00&currency=USD',
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id: DonationApi.php 1.0 kaldari $';
	}
}
