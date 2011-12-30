<?php

/**
 * 
 *
 * @since 0.1
 *
 * @file SpecialMyCourses.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialMyCourses extends SpecialEPPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'MyCourses', 'epstudent' );
	}

	/**
	 * Main method.
	 *
	 * @since 0.1
	 *
	 * @param string $arg
	 */
	public function execute( $subPage ) {
		parent::execute( $subPage );

		if ( $this->getRequest()->getCheck( 'enrolled' ) ) {
			EPStudent::setReadDb( DB_MASTER );
		}

		$student = EPStudent::newFromUser( $this->getUser() );
		EPStudent::setReadDb( DB_SLAVE );

		if ( $student === false ) {
			$this->getOutput()->addWikiMsg( 'ep-mycourses-not-a-student' );
		}
		else {
			if ( $this->subPage === '' ) {
				$this->displayCourse( $student, $this->subPage );
			}
			else {
				$this->displayCourses( $student );
			}
		}
	}

	protected function displayCourses( EPStudent $student ) {
		$out = $this->getOutput();

		if ( $student->hasTerm() ) {
			if ( $this->getRequest()->getCheck( 'enrolled' ) ) {
				$this->showSuccess( wfMessage( 'ep-mycourses-enrolled', '', '' ) ); // TODO
			}

			$this->displayCourses( $student );
		}
		else {
			$out->addWikiMsg( 'ep-mycourses-not-enrolled' );
		}
	}

	protected function displayCourse( EPStudent $student, $courseName ) {
		$course = EPCourse::selectRow( null, array( 'name' => $courseName ) );

		if ( $student->hasTerm( array(  ) ) ) {
			// TODO
		}
	}

}
