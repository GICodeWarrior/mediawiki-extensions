<?php

class Gateway_Form_TwoColumnLetter2 extends Gateway_Form_OneStepTwoColumn {
	public $paypal = false; // true for paypal only version

	public function __construct( &$form_data, &$form_errors, &$gateway ) {
		global $wgScriptPath;

		// set the path to css, before the parent constructor is called, checking to make sure some child class hasn't already set this
		if ( !strlen( $this->getStylePath() ) ) {
			$this->setStylePath( $wgScriptPath . '/extensions/DonationInterface/payflowpro_gateway/forms/css/TwoColumnLetter.css' );
		}

		parent::__construct( $form_data, $form_errors, $gateway );
	}

	public function generateFormStart() {
		global $wgOut, $wgRequest;

		$this->paypal = $wgRequest->getBool( 'paypal', false );

		$form = parent::generateBannerHeader();

		$form .= Xml::openElement( 'table', array( 'width' => '100%', 'cellspacing' => 0, 'cellpadding' => 0, 'border' => 0 ) );
		$form .= Xml::openElement( 'tr' );
		$form .= Xml::openElement( 'td', array( 'id' => 'appeal', 'valign' => 'top' ) );

		$text_template = $wgRequest->getText( 'text_template', '2010/JimmyAppealLong' );
		// if the user has uselang set, honor that, otherwise default to the language set for the form defined by 'language' in the query string
		if ( $wgRequest->getText( 'language' ) ) $text_template .= '/' . $this->form_data[ 'language' ];

		$template = ( strlen( $text_template ) ) ? $wgOut->parse( '{{' . $text_template . '}}' ) : '';
		// if the template doesn't exist, prevent the display of the red link
		if ( preg_match( '/redlink\=1/', $template ) ) $template = NULL;
		$form .= $template;

		$form .= Xml::closeElement( 'td' );

		$form .= Xml::openElement( 'td', array( 'id' => 'donate', 'valign' => 'top' ) );

		// add noscript tags for javascript disabled browsers
		$form .= $this->getNoScript();

		// $form .= Xml::tags( 'h2', array( 'id' => 'donate-head' ), wfMsg( 'payflowpro_gateway-make-your-donation' ));

		// provide a place at the top of the form for displaying general messages
		if ( $this->form_errors['general'] ) {
			$form .= Xml::openElement( 'div', array( 'id' => 'mw-payflow-general-error' ) );
			if ( is_array( $this->form_errors['general'] ) ) {
				foreach ( $this->form_errors['general'] as $this->form_errors_msg ) {
					$form .= Xml::tags( 'p', array( 'class' => 'creditcard-error-msg' ), $this->form_errors_msg );
				}
			} else {
				$form .= Xml::tags( 'p', array( 'class' => 'creditcard-error-msg' ), $this->form_errors_msg );
			}
			$form .= Xml::closeElement( 'div' );  // close div#mw-payflow-general-error
		}

		// Xml::element seems to convert html to htmlentities
		$form .= "<p class='creditcard-error-msg'>" . $this->form_errors['retryMsg'] . "</p>";
		$form .= Xml::openElement( 'form', array( 'name' => 'payment', 'method' => 'post', 'action' => $this->getNoCacheAction(), 'onsubmit' => 'return formCheck(this)', 'autocomplete' => 'off' ) );

		$form .= $this->generateBillingContainer();
		return $form;
	}

	public function generateFormEnd() {
		$form = '';
		$form .= $this->generateFormClose();
		return $form;
	}

	protected function generateBillingContainer() {
		$form = '';
		$form .= Xml::openElement( 'div', array( 'id' => 'payflowpro_gateway-personal-info' ) );
		$form .= Xml::openElement( 'table', array( 'id' => 'payflow-table-donor' ) );
		$form .= $this->generateBillingFields();
		$form .= Xml::closeElement( 'table' ); // close table#payflow-table-donor
		$form .= Xml::closeElement( 'div' ); // close div#payflowpro_gateway-personal-info

		return $form;
	}

	protected function generateBillingFields() {
		global $wgScriptPath, $wgRequest;
		$scriptPath = "$wgScriptPath/extensions/DonationInterface/gateway_forms/includes";

		$form = '';

		if ( !$this->paypal ) {
			// PayPal button
			$form .= '<tr>';
			$form .= '<td style="text-align:center;" colspan="2"><big><b>' . wfMsg( 'payflowpro_gateway-paypal-button' ) . '</b></big><br/><a href="#" onclick="document.payment.PaypalRedirect.value=1;document.payment.submit();"><img src="' . $scriptPath . '/paypal.png"/></a><br/>' .
			'— ' . wfMsg( 'payflowpro_gateway-or' ) . ' —<br/><big><b>' . wfMsg( 'payflowpro_gateway-donate-wikipedia' ) . '</b></big></td>';
			$form .= '</tr>';
		}

		// name
		$form .= $this->getNameField();

		// email
		$form .= $this->getEmailField();

		// amount
		$form .= $this->getAmountField();

		if ( !$this->paypal ) {
			// PayPal button
			// make sure we have a paypal url set to redirect the user to before displaying the button
			if ( strlen( $this->gateway->getGlobal( "PaypalURL" ) ) ) {
				$form .= '<tr>';
				$form .= '<td class="label"></td>';
				$form .= '<td>';
				$form .= Html::hidden( 'PaypalRedirect', 0 );
				$form .= Xml::tags( 'div',
						array(),
						Xml::element( 'img', array( 'src' => $wgScriptPath . "/extensions/DonationInterface/gateway_forms/includes/credit_card_logos.gif" ) )
					);
				$form .= '</td>';
				$form .= '</tr>';
			}

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
		}

		// anonymous
		$comment_opt_value = ( $wgRequest->wasPosted() ) ? $this->form_data[ 'comment-option' ] : true;
		$form .= '<tr>';
		$form .= '<td class="check-option" colspan="2">' . Xml::check( 'comment-option', $comment_opt_value );
		$form .= ' ' . Xml::label( wfMsg( 'payflowpro_gateway-anon-message' ), 'comment-option' ) . '</td>';
		$form .= '</tr>';

		// email agreement
		$form .= $this->getEmailOptField();

		return $form;
	}

	public function generateFormSubmit() {
		// submit button
		$form = Xml::openElement( 'div', array( 'id' => 'payflowpro_gateway-form-submit' ) );
		$form .= Xml::openElement( 'div', array( 'id' => 'mw-donate-submit-button' ) );
		if ( $this->paypal ) {
			$form .= Html::hidden( 'PaypalRedirect', 0 );
			$form .= Xml::element( 'input', array( 'class' => 'button-plain', 'value' => wfMsg( 'payflowpro_gateway-paypal-button' ), 'onclick' => 'document.payment.PaypalRedirect.value=1;return true;', 'type' => 'submit' ) );
		} else {
			$form .= Xml::element( 'input', array( 'class' => 'button-plain', 'value' => wfMsg( 'payflowpro_gateway-donor-submit' ), 'type' => 'submit' ) );
			$form .= Xml::closeElement( 'div' ); // close div#mw-donate-submit-button
			$form .= Xml::openElement( 'div', array( 'class' => 'mw-donate-submessage', 'id' => 'payflowpro_gateway-donate-submessage' ) ) .
			wfMsg( 'payflowpro_gateway-donate-click' );
		}
		$form .= Xml::closeElement( 'div' ); // close div#payflowpro_gateway-donate-submessage
		$form .= Xml::closeElement( 'div' ); // close div#payflowpro_gateway-form-submit

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
			$form .= Html::hidden( $field, $value );
		}

		$form .= Xml::closeElement( 'form' ); // close form 'payment'
		$form .= $this->generateDonationFooter();
		$form .= Xml::closeElement( 'td' );
		$form .= Xml::closeElement( 'tr' );
		$form .= Xml::closeElement( 'table' );
		return $form;
	}

	/**
	 * Generates the donation footer ("There are other ways to give...")
	 * @return string of HTML
	 */
	public function generateDonationFooter() {
		global $wgScriptPath;
		$form = '';
		$form .= Xml::openElement( 'div', array( 'class' => 'payflow-cc-form-section', 'id' => 'payflowpro_gateway-donate-addl-info' ) );
		$form .= Xml::openElement( 'div', array( 'id' => 'payflowpro_gateway-donate-addl-info-secure-logos' ) );
		$form .= Xml::tags( 'p', array( 'class' => '' ), Xml::openElement( 'img', array( 'src' => $wgScriptPath . "/extensions/DonationInterface/gateway_forms/includes/rapidssl_ssl_certificate.gif" ) ) );
		$form .= Xml::closeElement( 'div' ); // close div#payflowpro_gateway-donate-addl-info-secure-logos
		$form .= Xml::openElement( 'div', array( 'id' => 'payflowpro_gateway-donate-addl-info-text' ) );
		$form .= Xml::tags( 'p', array( 'class' => '' ), wfMsg( 'payflowpro_gateway-otherways-short' ) );
		$form .= Xml::tags( 'p', array( 'class' => '' ), wfMsg( 'payflowpro_gateway-credit-storage-processing' ) );
		$form .= Xml::tags( 'p', array( 'class' => '' ), wfMsg( 'payflowpro_gateway-question-comment' ) );
		$form .= Xml::closeElement( 'div' ); // close div#payflowpro_gateway-donate-addl-info-text
		$form .= Xml::closeElement( 'div' ); // close div#payflowpro_gateway-donate-addl-info
		return $form;
	}
}
