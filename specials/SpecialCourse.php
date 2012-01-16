<?php

/**
 * Shows the info for a single course, with management and
 * enrollment controls depending on the user and his rights.
 *
 * @since 0.1
 *
 * @file SpecialCourse.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialCourse extends SpecialEPPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'Course' );
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

		$out = $this->getOutput();

		if ( trim( $subPage ) === '' ) {
			$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Courses' )->getLocalURL() );
		}
		else {
			$out->setPageTitle( wfMsgExt( 'ep-course-title', 'parsemag', $this->subPage ) );

			$course = EPCourse::selectRow( null, array( 'name' => $this->subPage ) );

			if ( $course === false ) {
				$this->displayNavigation();

				if ( $this->getUser()->isAllowed( 'ep-course' ) ) {
					$out->addWikiMsg( 'ep-course-create', $this->subPage );
					EPCourse::displayAddNewRegion( $this->getContext(), array( 'name' => $this->subPage ) );
				}
				else {
					$out->addWikiMsg( 'ep-course-none', $this->subPage );
				}
			}
			else {
				$links = array();

				if ( $this->getUser()->isAllowed( 'ep-course' ) ) {
					$links[wfMsg( 'ep-course-nav-edit' )] = SpecialPage::getTitleFor( 'EditCourse', $this->subPage );
				}

				$this->displayNavigation( $links );

				$this->displaySummary( $course );

				$out->addHTML( Html::element( 'h2', array(), wfMsg( 'ep-course-description' ) ) );

				$out->addHTML( $this->getOutput()->parse( $course->getField( 'description' ) ) );

				$out->addHTML( Html::element( 'h2', array(), wfMsg( 'ep-course-terms' ) ) );

				EPTerm::displayPager( $this->getContext(), array( 'course_id' => $course->getId() ) );

				if ( $this->getUser()->isAllowed( 'ep-course' ) ) {
					$out->addHTML( Html::element( 'h2', array(), wfMsg( 'ep-course-add-term' ) ) );

					EPTerm::displayAddNewControl( $this->getContext(), array( 'course' => $course->getId() ) );
				}
			}
		}
	}

	/**
	 * Gets the summary data.
	 *
	 * @since 0.1
	 *
	 * @param EPCourse $course
	 *
	 * @return array
	 */
	protected function getSummaryData( EPDBObject $course ) {
		$stats = array();

		$stats['name'] = htmlspecialchars( $course->getField( 'name' ) );

		$org = EPOrg::selectFieldsRow( 'name', array( 'id' => $course->getField( 'org_id' ) ) );

		$stats['org'] = Linker::linkKnown(
			SpecialPage::getTitleFor( 'Institution', $org ),
			htmlspecialchars( $org )
		);

		$stats['status'] = wfMsgHtml( $course->getField( 'active' ) ? 'ep-course-active' : 'ep-course-inactive' );
		
		$lang = $this->getLanguage();

		$stats['students'] = htmlspecialchars( $lang->formatNum( $course->getField( 'students' ) ) );

		$termCount = EPTerm::count( array( 'course_id' => $course->getId() ) );
		$stats['terms'] = htmlspecialchars( $lang->formatNum( $termCount ) );

		if ( $termCount > 0 ) {
			$stats['terms'] = Linker::linkKnown(
				SpecialPage::getTitleFor( 'Terms' ),
				 $stats['terms'],
				array(),
				array( 'course_id' => $course->getId() )
			);
		}
		
		$stats['instructors'] = $this->getInstructorsList( $course ) . $this->getInstructorControls( $course );

		return $stats;
	}
	
	/**
	 * Returns a list with the instructors for the provided course
	 * or a message indicating there are none.
	 * 
	 * @since 0.1
	 *  
	 * @param EPCourse $course
	 * 
	 * @return string
	 */
	protected function getInstructorsList( EPCourse $course ) {
		$instructors = $course->getInstructors();
		
		if ( count( $instructors ) > 0 ) {
			$instList = array();
			
			foreach ( $instructors as /* EPInstructor */ $instructor ) {
				$instList[] = $instructor->getUserLink() . $instructor->getToolLinks( $this->getContext(), $course );
			}
			
			if ( count( $instructors ) == 1 ) {
				return $instList[0];
			}
			else {
				return '<ul><li>' . implode( '</li><li>', $instList ) . '</li></ul>';
			}
		}
		else {
			return wfMsgHtml( 'ep-course-no-instructors' );
		}
	}
	
	protected function getInstructorControls( EPCourse $course ) {
		$user = $this->getUser();
		$links = array();
		
		if ( ( $user->isAllowed( 'ep-instructor' ) || $user->isAllowed( 'ep-beinstructor' ) )
			&& !in_array( $user->getId(), $course->getField( 'instructors' ) )
			) {
			$links[] = Html::element(
				'a',
				array(
					'href' => '#',
					'class' => 'ep-become-instructor',
					'data-courseid' => $course->getId(),
					'data-coursename' => $course->getField( 'name' ),
				),
				wfMsg( 'ep-course-become-instructor' )
			);
		}
		
		if ( $user->isAllowed( 'ep-instructor' ) ) {
			$links[] = Html::element(
				'a',
				array(
					'href' => '#',
					'class' => 'ep-add-instructor',
					'data-courseid' => $course->getId(),
					'data-coursename' => $course->getField( 'name' ),
				),
				wfMsg( 'ep-course-add-instructor' )
			);
		}
		
		if ( count( $links ) > 0 ) {
			return '<br />' . $this->getLanguage()->pipeList( $links );
		}
		else {
			return '';
		}
	}

}
