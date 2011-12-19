<?php

/**
 * Adittion and modification interface for courses.
 *
 * @since 0.1
 *
 * @file SpecialEditCourse.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialEditCourse extends SpecialEPFormPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'EditCourse', 'epmentor', 'EPCourse', 'Courses' );
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
			'label-message' => 'ep-course-edit-name',
			'required' => true,
			'validation-callback' => function ( $value, array $alldata = null ) {
				return strlen( $value ) < 5 ? wfMsg( 'ep-course-invalid-name' ) : true;
			},
		);
		
		$orgOptions = EPOrg::getOrgOptions( EPOrg::getEditableOrgs( $this->getUser() ) );
		
		$fields['org'] = array (
			'type' => 'select',
			'label-message' => 'ep-course-edit-org',
			'required' => true,
			'options' => $orgOptions,
			'validation-callback' => function ( $value, array $alldata = null ) {
				return strlen( $value ) < 10 ? wfMsg( 'ep-course-invalid-description' ) : true;
			},
			'default' => array_shift( $orgOptions )
		);
		
		$fields['description'] = array (
			'type' => 'textarea',
			'label-message' => 'ep-course-edit-description',
			'required' => true,
			'validation-callback' => function ( $value, array $alldata = null ) {
				return strlen( $value ) < 10 ? wfMsg( 'ep-course-invalid-description' ) : true;
			},
			'default' => '',
			'rows' => 5
		);

		return $this->processFormFields( $fields );
	}
	
}
