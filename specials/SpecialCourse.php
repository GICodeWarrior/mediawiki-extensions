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
				
				if ( $this->getUser()->isAllowed( 'epadmin' ) || $this->getUser()->isAllowed( 'epmentor' ) ) {
					$out->addWikiMsg( 'ep-course-create', $this->subPage );
					EPCourse::displayAddNewRegion( $this->getContext(), array( 'name' => $this->subPage ) );
				}
				else {
					$out->addWikiMsg( 'ep-course-none', $this->subPage );
				}
			}
			else {
				$links = array();
				
				if ( $course->useCanManage( $this->getUser() ) ) {
					$links[wfMsg( 'ep-course-nav-edit' )] = SpecialPage::getTitleFor( 'EditCourse', $this->subPage );
				}
				
				$this->displayNavigation( $links );
				
				$this->displaySummary( $course );
				
				$out->addHTML( Html::element( 'h2', array(), wfMsg( 'ep-course-description' ) ) );
				
				$out->addHTML( $this->getOutput()->parse( $course->getField( 'description' ) ) );
				
				$out->addHTML( Html::element( 'h2', array(), wfMsg( 'ep-course-terms' ) ) );
				
				EPTerm::displayPager( $this->getContext(), array( 'course_id' => $course->getId() ) );
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

		$stats['name'] = $course->getField( 'name' );
		$stats['org'] = EPOrg::selectFieldsRow( 'name', array( 'id' => $course->getField( 'org_id' ) ) );

		foreach ( $stats as &$stat ) {
			$stat = htmlspecialchars( $stat );
		}

		return $stats;
	}

}
