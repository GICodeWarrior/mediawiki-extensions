<?php
/**
 * Validates a transaction against MaxMind's minFraud service
 */

class PayflowProGateway_Extras_reCaptcha extends PayflowProGateway_Extras {

	/**
	 * Container for singelton instance of self
	 */
	static $instance;

	/**
	 * Container for the captcha error
	 * @var string
	 */
	public $recap_err;

	public function __construct() {
		parent::__construct();

		// load the reCaptcha API
		require_once( dirname( __FILE__ ) . '/recaptcha-php/recaptchalib.php' );
	}

	/**
	 * Handle the challenge logic
	 */
	public function challenge( &$pfp_gateway_object, &$data ) {
		// if captcha posted, validate
		if ( isset( $_POST[ 'recaptcha_response_field' ] )) { 
			//check the captcha response
			$captcha_resp = $this->check_captcha();
			if ( $captcha_resp->is_valid ){
				// if validated, update the action and move on
				$this->log( $data[ 'contribution_tracking_id' ], 'Captcha passed' );
				$pfp_gateway_object->action = "process";
				return TRUE;
			} else {
				$this->recap_err = $captcha_resp->error;
				$this->log( $data[ 'contribution_tracking_id' ], 'Captcha failed' );
			}
		}
		// display captcha
		$this->display_captcha( $pfp_gateway_object, $data  );
		return TRUE;
	}

	/**
	 * Display the submission form with the captcha injected into it
	 */
	public function display_captcha( &$pfp_gateway_object, &$data ) {
		$this->log( $data[ 'contribution_tracking_id' ], 'Captcha triggered' );
		
		global $wgOut;
		$form_class = $pfp_gateway_object->getFormClass();
		$form_obj = new $form_class( $data, $pfp_gateway_object->errors );
		$form = $form_obj->generateFormBody( $data, $pfp_gateway_object->errors );
		$form .= Xml::openElement( 'div', array( 'id' => 'mw-donate-captcha' ));

		// get the captcha
		global $wgPayflowRecaptchaPublicKey, $wgProto;
		$use_ssl = ( $wgProto == 'https' ) ? TRUE : FALSE;
		$form .= recaptcha_get_html( $wgPayflowRecaptchaPublicKey, $this->recap_err, $use_ssl );
		$form .= '<span class="creditcard-error-msg">' . wfMsg( 'payflowpro_gateway-error-msg-captcha-please') . '</span>';
		$form .= Xml::closeElement( 'div' );
		$form .= $form_obj->generateFormSubmit( $data, $pfp_gateway_object->errors );
		$wgOut->addHTML( $form );
	}

	/**
	 * Check recaptcha answer
	 */
	public function check_captcha() {
		global $wgPayflowRecaptchaPrivateKey, $wgRequest;
		$resp = recaptcha_check_answer( $wgPayflowRecaptchaPrivateKey,
			wfGetIP(),
			$wgRequest->getText( 'recaptcha_challenge_field' ),
			$wgRequest->getText( 'recaptcha_response_field' ));

		return $resp;
	}

	static function onChallenge( &$pfp_gateway_object, &$data ) {
		return self::singleton()->challenge( $pfp_gateway_object, $data );
	}

	static function singleton() {
		if ( !self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
}
