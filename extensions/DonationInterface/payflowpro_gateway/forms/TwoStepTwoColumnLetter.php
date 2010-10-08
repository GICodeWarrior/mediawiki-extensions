<?php

class PayflowProGateway_Form_TwoStepTwoColumnLetter extends PayflowProGateway_Form_TwoStepTwoColumn {
	public function __construct( &$form_data, &$form_errors ) {
		global $wgOut, $wgScriptPath;
		
		// set the path to css, before the parent constructor is called, checking to make sure some child class hasn't already set this
		if ( !strlen( $this->getStylePath())) {
			$this->setStylePath( $wgScriptPath . '/extensions/DonationInterface/payflowpro_gateway/forms/css/TwoColumnLetter.css' );
		}
			
		parent::__construct( $form_data, $form_errors );
	}

	public function generateFormStart() {
		global $wgOut, $wgRequest;
		
		$form = parent::generateBannerHeader();
		
		$form .= Xml::openElement( 'div', array( 'id' => 'payflowpro_gateway-cc_form_container'));
		
		$form .= Xml::openElement( 'div', array( 'id' => 'payflowpro_gateway-cc_form_form', 'class' => 'payflowpro_gateway-cc_form_column'));
		
		$form .= Xml::openElement( 'div', array( 'id' => 'mw-creditcard' ) ); 
		
		// provide a place at the top of the form for displaying general messages
		if ( $this->form_errors['general'] ) {
			$form .= Xml::openElement( 'div', array( 'id' => 'mw-payflow-general-error' ));
			if ( is_array( $this->form_errors['general'] )) {
				foreach ( $this->form_errors['general'] as $this->form_errors_msg ) {
					$form .= Xml::tags( 'p', array( 'class' => 'creditcard-error-msg' ), $this->form_errors_msg );
				}
			} else {
				$form .= Xml::tags( 'p', array( 'class' => 'creditcard-error-msg' ), $this->form_errors_msg );
			}
			$form .= Xml::closeElement( 'div' );  // close div#mw-payflow-general-error
		}

		// open form
		$form .= Xml::openElement( 'div', array( 'id' => 'mw-creditcard-form' ) );
		
		// Xml::element seems to convert html to htmlentities
		$form .= "<p class='creditcard-error-msg'>" . $this->form_errors['retryMsg'] . "</p>";
		$form .= Xml::openElement( 'form', array( 'name' => 'payment', 'method' => 'post', 'action' => '', 'onsubmit' => 'return validate_form(this)', 'autocomplete' => 'off' ) );
		
		$form .= $this->generateBillingContainer();
		return $form;
	}
        
	public function generateFormEnd() {
		global $wgRequest, $wgOut;
		$form = '';
		
		$form .= $this->generateFormClose();

		$form .= Xml::openElement( 'div', array( 'id' => 'payflowpro_gateway-cc_form_letter', 'class' => 'payflowpro_gateway-cc_form_column'));
		$form .= Xml::openElement( 'div', array( 'id' => 'payflowpro_gateway-cc_form_letter_inside' ));
		
		$text_template = $wgRequest->getText( 'text_template' );
		// if the user has uselang set, honor that, otherwise default to the language set for the form defined by 'language' in the query string
		if ( $wgRequest->getText( 'language' )) $text_template .= '/' . $this->form_data[ 'language' ];
		
		$template = ( strlen( $text_template )) ? $wgOut->parse( '{{'.$text_template.'}}' ) : '';
		// if the template doesn't exist, prevent the display of the red link
		if ( preg_match( '/redlink\=1/', $template )) $template = NULL;
		$form .= $template;
		
		$form .= Xml::closeElement( 'div' ); // close div#payflowpro_gateway-cc_form_letter
		$form .= Xml::closeElement( 'div' ); // close div#payflowpro_gateway-cc_form_letter_inside
		return $form;
	}
	
	protected function generateBillingContainer() {
		$form = '';
		$form .= Xml::openElement( 'div', array( 'id' => 'payflowpro_gateway-personal-info' ));
		$form .= Xml::tags( 'h3', array( 'class' => 'payflow-cc-form-header','id' => 'payflow-cc-form-header-personal' ), wfMsg( 'payflowpro_gateway-make-your-donation' ));
		$form .= Xml::openElement( 'table', array( 'id' => 'payflow-table-donor' ) );
		$form .= $this->generateBillingFields();
		$form .= Xml::closeElement( 'table' ); // close table#payflow-table-donor
		$form .= Xml::closeElement( 'div' ); // close div#payflowpro_gateway-personal-info

		return $form;
	}

	protected function generateBillingFields() {
		global $wgScriptPath;
		$scriptPath = "$wgScriptPath/extensions/DonationInterface/payflowpro_gateway/includes";
		
		$form = '';
		
		// name	
		$form .= $this->getNameField();
		
		// email
		$form .= $this->getEmailField();
		
		//comment message
		$form .= $this->getCommentMessageField();
		
		//comment
		$form .= $this->getCommentField();
		
		// anonymous
		$form .= $this->getCommentOptionField();

		// email agreement
		$form .= $this->getEmailOptField();
		
		// amount
		$form .= $this->getAmountField();
		
		// card number
		$form .= $this->getCardNumberField();
		
		// cvv
		$form .= $this->getCvvField();
		
		// expiry
		$form .= $this->getExpiryField();

		// street
		$form .= $this->getStreetField();

		// city
		$form .= $this->getCityField();

		// state
		$form .= $this->getStateField();
		// zip
		$form .= $this->getZipField();
		
		// country
		$form .= $this->getCountryField();

		return $form;
	}

	/**
	 * Generate form closing elements
	 */
	public function generateFormClose() {
		$form = '';
		// add hidden fields			
		$hidden_fields = $this->getHiddenFields();
		foreach ( $hidden_fields as $field => $value ) {
			$form .= Xml::hidden( $field, $value );
		}
			
		$form .= Xml::closeElement( 'form' ); // close form 'payment'
		$form .= $this->generateDonationFooter();
		$form .= Xml::closeElement( 'div' ); //close div#mw-creditcard
		$form .= Xml::closeElement( 'div' ); //close div#payflowpro_gateway-cc_form_form
		$form .= Xml::closeElement( 'div' ); //close div#payflowpro_gateway-cc_form_container
		return $form;
	}
}
