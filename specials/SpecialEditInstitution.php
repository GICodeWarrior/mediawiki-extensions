<?php

/**
 * Adittion and modification interface for insitutions.
 *
 * @since 0.1
 *
 * @file SpecialEditInstitution.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialEditInstitution extends SpecialEPFormPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'EditInstitution', 'epadmin', 'EPOrg', 'Institutions' );
	}

	/**
	 * (non-PHPdoc)
	 * @see SpecialEPFormPage::getFormFields()
	 * @return array
	 */
	protected function getFormFields() {
		$fields = parent::getFormFields();

		$fields['name'] = array (
			'type' => 'text',
			'label-message' => 'educationprogram-org-edit-name',
			'required' => true,
			'validation-callback' => function ( $value, array $alldata = null ) {
				return strlen( $value ) < 2 ? wfMsg( 'educationprogram-org-invalid-name' ) : true;
			},
		);
		
		$fields['city'] = array (
			'type' => 'text',
			'label-message' => 'educationprogram-org-edit-city',
			'required' => true,
			'validation-callback' => function ( $value, array $alldata = null ) {
				return strlen( $value ) < 2 ? wfMsg( 'educationprogram-org-invalid-city' ) : true;
			},
		);
		
		$fields['country'] = array (
			'type' => 'select',
			'label-message' => 'educationprogram-org-edit-country',
			'required' => true,
			'options' => array( 'foo' => 'foo', 'bar' => 'bar' ), // TODO
		);

		return $this->processFormFields( $fields );
	}

}
