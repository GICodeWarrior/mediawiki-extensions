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
		
		$this->getOutput()->addModules( 'ep.datepicker' );
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
		);
		
		$fields['token'] = array (
			'type' => 'text',
			'label-message' => 'ep-term-edit-token',
			'maxlength' => 255,
			'required' => true,
			'size' => 20,
			'validation-callback' => function ( $value, array $alldata = null ) {
				return strlen( $value ) < 2 ? wfMsgExt( 'ep-term-invalid-token', 'parsemag', 2 ) : true;
			},
		);
		
		$fields['year'] = array (
			'type' => 'int',
			'label-message' => 'ep-term-edit-year',
			'required' => true,
			'min' => 2000,
			'max' => 9001,
			'size' => 15,
		);
		
		$fields['start'] = array (
			'class' => 'EPHTMLDateField',
			'label-message' => 'ep-term-edit-start',
			'required' => true,
		);
		
		$fields['end'] = array (
			'class' => 'EPHTMLDateField',
			'label-message' => 'ep-term-edit-end',
			'required' => true,
		);
		
		$fields['description'] = array (
			'type' => 'textarea',
			'label-message' => 'ep-term-edit-description',
			'required' => true,
			'validation-callback' => function ( $value, array $alldata = null ) {
				return strlen( $value ) < 10 ? wfMsgExt( 'ep-term-invalid-description', 'parsemag', 10 ) : true;
			},
			'rows' => 10
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
	
	/**
	 * (non-PHPdoc)
	 * @see SpecialEPFormPage::handleKnownField()
	 */
	protected function handleKnownField( $name, $value ) {
		if ( in_array( $name, array( 'end', 'start' ) ) ) {
			$value = wfTimestamp( TS_MW, strtotime( $value ) );
		}
		
		return $value;
	}
	
}

class EPHTMLDateField extends HTMLTextField {
	
	public function __construct( $params ) {
		parent::__construct( $params );
		
		$this->mClass .= " ep-datepicker";
	}
	
	function getSize() {
		return isset( $this->mParams['size'] )
			? $this->mParams['size']
			: 20;
	}
	
	function getInputHTML( $value ) {
		$value = explode( 'T',  wfTimestamp( TS_ISO_8601, strtotime( $value ) ) );
		return parent::getInputHTML( $value[0] );
	}
	
	function validate( $value, $alldata ) {
		$p = parent::validate( $value, $alldata );

		if ( $p !== true ) {
			return $p;
		}

		$value = trim( $value );
		
		// TODO: further validation
		
		return true;
	}
}
