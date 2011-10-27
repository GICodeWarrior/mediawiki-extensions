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
 * @since		r98249
 * @author Jeremy Postlethwaite <jpostlethwaite@wikimedia.org>
 */

/**
 * This form is designed for bank transfers
 */
class Gateway_Form_TwoStepAmount extends Gateway_Form {

	/**
	 * Initialize the form
	 *
	 */
	protected function init() {
		
		//TODO: This is pretty odd to do here. However, as this form is only 
		//being used for testing purposes, it's getting the update that goes 
		//along with yet another change in Form Class construction.
		$this->form_data['payment_method'] = empty($this->form_data['payment_method']) ? 'bt' : $this->form_data['payment_method'];
		$this->form_data['payment_submethod'] = empty($this->form_data['payment_submethod']) ? 'bt' : $this->form_data['payment_submethod'];
		
		$this->setPaymentMethod( $this->form_data['payment_method'] );
		$this->setPaymentSubmethod( $this->form_data['payment_submethod'] );
		
		$this->form_data['process'] = 'other';

		$this->loadResources();
	}

	/**
	 * Load form resources
	 */
	protected function loadResources() {
		
		$this->loadValidateJs();
	}

	protected function loadValidateJs() {
		global $wgOut;
		$wgOut->addModules( 'gc.form.core.validate' );
		$wgOut->addHeadItem( 'donationinterface_validate', "\n" . '<script type="text/javascript" src="/extensions/DonationInterface/globalcollect_gateway/modules/js/validate.js"></script>' );
		$wgOut->addHeadItem( 'donationinterface_js_validate', "\n" . '<script type="text/javascript" src="/extensions/DonationInterface/globalcollect_gateway/modules/js/jquery.validate.js"></script>' );
		$wgOut->addHeadItem( 'donationinterface_js_validate_additional', "\n" . '<script type="text/javascript" src="/extensions/DonationInterface/globalcollect_gateway/modules/js/jquery.validate.additional-methods.js"></script>' );
		
		$js = "\n" . '<script type="text/javascript">' . "validateForm( { validate: { address: true, amount: true, creditCard: false, email: true, name: true, }, payment_method: '" . $this->getPaymentMethod() . "', payment_submethod: '" . $this->getPaymentSubmethod() . "', formId: '" . $this->getFormId() . "' } );" . '</script>' . "\n";
		$wgOut->addHeadItem( 'placeholders', $js );
	}

	/**
	 * Required method for returning the full HTML for a form.
	 *
	 * @return string The entire form HTML
	 */
	public function getForm() {
		$form = $this->generateFormStart();
		$form .= $this->getCaptchaHTML();
		$form .= $this->generateFormEnd();
		return $form;
	}

	/**
	 * Generate the first part of the form
	 */
	public function generateFormStart() {
		
		$form = '';
		
		//$form .= $this->generateBannerHeader();

		$form .= Xml::openElement( 'div', array( 'id' => 'mw-creditcard' ) );

		// provide a place at the top of the form for displaying general messages
		if ( $this->form_errors['general'] ) {
			$form .= Xml::openElement( 'div', array( 'id' => 'mw-payment-general-error' ) );
			if ( is_array( $this->form_errors['general'] ) ) {
				foreach ( $this->form_errors['general'] as $this->form_errors_msg ) {
					$form .= Xml::tags( 'p', array( 'class' => 'creditcard-error-msg' ), $this->form_errors_msg );
				}
			} else {
				$form .= Xml::tags( 'p', array( 'class' => 'creditcard-error-msg' ), $this->form_errors_msg );
			}
			$form .= Xml::closeElement( 'div' );
		}

		// add noscript tags for javascript disabled browsers
		$form .= $this->getNoScript();

		// open form
		$form .= Xml::openElement( 'div', array( 'id' => 'mw-creditcard-form' ) );

		// Xml::element seems to convert html to htmlentities
		$form .= "<p class='creditcard-error-msg'>" . $this->form_errors['retryMsg'] . "</p>";
		$form .= Xml::openElement( 'form', array( 'id' => $this->getFormId(), 'name' => $this->getFormName(), 'method' => 'post', 'action' => $this->getNoCacheAction(), 'onsubmit' => '', 'autocomplete' => 'off' ) );

		$form .= Xml::openElement( 'div', array( 'id' => 'left-column', 'class' => 'payment-cc-form-section' ) );
		$form .= $this->generatePersonalContainer();
		$form .= $this->generatePaymentContainer();
		$form .= $this->generateFormSubmit();
		$form .= Xml::closeElement( 'div' ); // close div#left-column

		//$form .= Xml::openElement( 'div', array( 'id' => 'right-column', 'class' => 'payment-cc-form-section' ) );

		return $form;
	}

	public function generateFormSubmit() {
		// submit button
		$form = Xml::openElement( 'div', array( 'id' => 'payment_gateway-form-submit' ) );
		$form .= Xml::openElement( 'div', array( 'id' => 'mw-donate-submit-button' ) );
		$form .= Xml::element( 'input', array( 'class' => 'button-plain', 'value' => wfMsg( 'donate_interface-submit-button' ), 'type' => 'submit' ) );
		$form .= Xml::closeElement( 'div' ); // close div#mw-donate-submit-button
		$form .= Xml::closeElement( 'div' ); // close div#payment_gateway-form-submit
		return $form;
	}

	public function generateFormEnd() {
		$form = '';
		// add hidden fields
		$hidden_fields = $this->getHiddenFields();
		foreach ( $hidden_fields as $field => $value ) {
			$form .= Html::hidden( $field, $value );
		}

		$form .= Xml::closeElement( 'form' );
		$form .= Xml::closeElement( 'div' ); // close div#mw-creditcard-form
		$form .= $this->generateDonationFooter();
		$form .= Xml::closeElement( 'div' ); // div#close mw-creditcard
		return $form;
	}

	protected function generatePersonalContainer() {
		$form = '';
		$form .= Xml::openElement( 'div', array( 'id' => 'payment_gateway-personal-info' ) );                 ;
		//$form .= Xml::tags( 'h3', array( 'class' => 'payment-cc-form-header', 'id' => 'payment-cc-form-header-personal' ), wfMsg( 'donate_interface-cc-form-header-personal' ) );
		$form .= Xml::openElement( 'table', array( 'id' => 'payment-table-donor' ) );

		$form .= $this->generatePersonalFields();

		$form .= Xml::closeElement( 'table' ); // close table#payment-table-donor
		$form .= Xml::closeElement( 'div' ); // close div#payment_gateway-personal-info

		return $form;
	}

	protected function generatePersonalFields() {
		// first name
		$form = $this->getNameField();

		// country
		$form .= $this->getCountryField();

		// street
		$form .= $this->getStreetField();


		// city
		$form .= $this->getCityField();

		// state
		$form .= $this->getStateField();

		// zip
		$form .= $this->getZipField();

		// email
		$form .= $this->getEmailField();

		return $form;
	}

	protected function generatePaymentContainer() {
		$form = '';
		// credit card info
		$form .= Xml::openElement( 'div', array( 'id' => 'donation-payment-info' ) );
		//$form .= Xml::tags( 'h3', array( 'class' => 'payment-cc-form-header', 'id' => 'payment-cc-form-header-payment' ), wfMsg( 'donate_interface-cc-form-header-payment' ) );
		$form .= Xml::openElement( 'table', array( 'id' => 'donation-table-cc' ) );

		$form .= $this->generatePaymentFields();

		$form .= Xml::closeElement( 'table' ); // close table#payment-table-cc
		$form .= Xml::closeElement( 'div' ); // close div#payment_gateway-payment-info

		return $form;
	}

	protected function generatePaymentFields() {
		// amount
		$form = '<tr>';
		$form .= '<td colspan="2"><span class="donation-error-msg">' . $this->form_errors['invalidamount'] . '</span></td>';
		$form .= '</tr>';
		$form .= '<tr>';
		$form .= '<td class="label">' . Xml::label( wfMsg( 'donate_interface-donor-amount' ), 'amount' ) . '</td>';
		$form .= '<td>' . Xml::input( 'amount', '7', $this->form_data['amount'], array( 'class' => 'required', 'type' => 'text', 'maxlength' => '10', 'id' => 'amount' ) ) .
		' ' . $this->generateCurrencyDropdown( array( 'showCardsOnCurrencyChange' => false, ) ) . '</td>';
		$form .= '</tr>';

		return $form;
	}
}
