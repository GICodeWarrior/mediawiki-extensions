<?php

/**
 * Adittion and modification interface for terms.
 *
 * @since 0.1
 *
 * @file SpecialEditTerm.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialEditTerm extends SpecialEPFormPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'EditTerm', 'epmentor', 'EPTerm', 'Terms' );
	}

	/**
	 * (non-PHPdoc)
	 * @see SpecialEPFormPage::getFormFields()
	 * @return array
	 */
	protected function getFormFields() {
		$fields = parent::getFormFields();
		
		$courseOptions = EPCourse::getCourseOptions( EPCourse::getEditableCourses( $this->getUser() ) );
		
		$fields['course_id'] = array (
			'type' => 'select',
			'label-message' => 'ep-term-edit-course',
			'required' => true,
			'options' => $courseOptions,
			'validation-callback' => function ( $value, array $alldata = null ) use ( $courseOptions ) {
				return in_array( (int)$value, array_values( $courseOptions ) ) ? true : wfMsg( 'ep-term-invalid-course' );
			},
			'default' => array_shift( $courseOptions )
		);
		
		$fields['year'] = array (
			'type' => 'text',
			'label-message' => 'ep-term-edit-year',
			'required' => true,
			'validation-callback' => function ( $value, array $alldata = null ) {
				return ctype_digit( $value ) ? true : wfMsg( 'ep-term-invalid-year' );
			},
		);
		
		return $this->processFormFields( $fields );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see SpecialEPFormPage::getTitleConditions()
	 */
	protected function getTitleConditions() {
		return array( 'id' => $this->subPage );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see SpecialEPFormPage::getNewData()
	 */
	protected function getNewData() {
		return array(
			'course_id' => $this->getRequest()->getVal( 'newcourse' ),
			'year' => $this->getRequest()->getVal( 'newyear' ),
		);
	}
	
}
