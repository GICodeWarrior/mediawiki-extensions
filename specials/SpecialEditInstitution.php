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
		parent::__construct( 'EditInstitution', 'epadmin', false );
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
			'id' => 'org-name-field',
		);

		return $this->processFormFields( $fields );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see SpecialEPFormPage::getListPage()
	 */
	protected function getListPage() {
		return 'Institutions';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see SpecialEPFormPage::getListPage()
	 */
	protected function getObjectClassName() {
		return 'EPOrg';
	}

}
