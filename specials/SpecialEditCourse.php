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
				return strlen( $value ) < 5 ? wfMsgExt( 'ep-course-invalid-name', 'parsemag', 5 ) : true;
			},
		);
		
		$orgOptions = EPOrg::getOrgOptions( EPOrg::getEditableOrgs( $this->getUser() ) );
		
		$fields['org_id'] = array (
			'type' => 'select',
			'label-message' => 'ep-course-edit-org',
			'required' => true,
			'options' => $orgOptions,
			'validation-callback' => function ( $value, array $alldata = null ) use ( $orgOptions ) {
				return in_array( (int)$value, array_values( $orgOptions ) ) ? true : wfMsg( 'ep-course-invalid-org' );
			},
		);
		
		$fields['description'] = array (
			'type' => 'textarea',
			'label-message' => 'ep-course-edit-description',
			'required' => true,
			'validation-callback' => function ( $value, array $alldata = null ) {
				return strlen( $value ) < 10 ? wfMsgExt( 'ep-course-invalid-description', 'parsemag', 10 ) : true;
			},
			'rows' => 10
		);

		return $this->processFormFields( $fields );
	}
	
}
