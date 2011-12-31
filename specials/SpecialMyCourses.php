<?php

/**
 * Special page listing the courses that have at least one term in which the current user
 * is or has been enrolled. When a subpage param is provided, and it's a valid course
 * name, info for that course is shown.
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
	 * @param string $subPage
	 */
	public function execute( $subPage ) {
		parent::execute( $subPage );

		if ( $this->getRequest()->getCheck( 'enrolled' ) ) {
			EPStudent::setReadDb( DB_MASTER );
		}

		$student = EPStudent::newFromUser( $this->getUser() );

		if ( $student === false ) {
			$this->getOutput()->addWikiMsg( 'ep-mycourses-not-a-student' );
		}
		else {
			if ( $this->subPage === '' ) {
				$this->displayCourses( $student );
			}
			else {
				$this->displayCourse( $student, $this->subPage );
			}
		}
	}

	/**
	 *
	 *
	 * @since 0.1
	 *
	 * @param EPStudent $student
	 */
	protected function displayCourses( EPStudent $student ) {
		$out = $this->getOutput();

		if ( $student->hasTerm() ) {
			if ( $this->getRequest()->getCheck( 'enrolled' ) ) {
				$term = EPTerm::selectRow( null, array( 'id' => $this->getRequest()->getInt( 'enrolled' ) ) );

				if ( $term !== false ) {
					$this->showSuccess( wfMessage(
						'ep-mycourses-enrolled',
						$term->getCourse()->getField( 'name' ),
						$term->getOrg()->getField( 'name' )
					) );
				}
			}

			$currentCourses = $student->getCurrentCourses();
			$passedCourses = $student->getPassedCourses();

			if ( count( $currentCourses ) > 0 ) {
				$out->addHTML( Html::element( 'h2', array(), wfMsg( 'ep-mycourses-current' ) ) );
				$this->displayCoursesList( $currentCourses );
			}

			if ( count( $passedCourses ) > 0 ) {
				$out->addHTML( Html::element( 'h2', array(), wfMsg( 'ep-mycourses-passed' ) ) );
				$this->displayCoursesList( $passedCourses );
			}
		}
		else {
			$out->addWikiMsg( 'ep-mycourses-not-enrolled' );
		}
	}

	/**
	 *
	 *
	 * @since 0.1
	 *
	 * @param array $courses
	 */
	protected function displayCoursesList( array /* of EPCourse */ $courses ) {
		$out = $this->getOutput();

		$out->addHTML( Xml::openElement(
			'table',
			array( 'class' => 'wikitable sortable' )
		) );

		$headers = array(
			Html::element( 'th', array(), wfMsg( 'ep-mycourses-header-name' ) ),
			Html::element( 'th', array(), wfMsg( 'ep-mycourses-header-institution' ) ),
		);

		$out->addHTML( '<thead><tr>' . implode( '', $headers ) . '</tr></thead>' );

		$out->addHTML( '<tbody>' );

		foreach ( $courses as /* EPCourse */ $course ) {
			$fields = array();

			$fields[] = $course->getField( 'name' );
			$fields[] = $course->getOrg()->getField( 'name' );

			foreach ( $fields as &$field ) {
				$field = Html::rawElement( 'td', array(), $field );
			}

			$out->addHTML( '<tr>' . implode( '', $fields ) . '</tr>' );
		}

		$out->addHTML( '</tbody>' );
		$out->addHTML( '</table>' );
	}

	/**
	 *
	 *
	 * @since 0.1
	 *
	 * @param EPStudent $student
	 * @param string $courseName
	 */
	protected function displayCourse( EPStudent $student, $courseName ) {
		$course = EPCourse::selectRow( null, array( 'name' => $courseName ) );

		if ( $student->hasTerm( array(  ) ) ) {
			// TODO
		}
	}

}
