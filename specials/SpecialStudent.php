<?php

/**
 *
 *
 * @since 0.1
 *
 * @file SpecialStudent.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialStudent extends SpecialEPPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'Student' );
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
			$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Students' )->getLocalURL() );
		}
		else {
			$this->displayNavigation();

			$student = EPStudent::selectRow( null, array( 'id' => $this->subPage ) );

			if ( $student === false ) {
				$out->addWikiMsg( 'ep-student-none', $this->subPage );
			}
			else {
				$out->setPageTitle( wfMsgExt( 'ep-student-title', 'parsemag', $student->getUser()->getName() ) );

				$this->displaySummary( $student );
			}
		}
	}

	/**
	 * Gets the summary data.
	 *
	 * @since 0.1
	 *
	 * @param EPStudent $student
	 *
	 * @return array
	 */
	protected function getSummaryData( EPDBObject $student ) {
		$stats = array();

		$stats['first-enroll'] = htmlspecialchars( $this->getLanguage()->timeanddate( $student->getField( 'first_enroll' ), true ) );
		$stats['last-active'] = htmlspecialchars( $this->getLanguage()->timeanddate( $student->getField( 'last_active' ), true ) );
		$stats['active-enroll'] = wfMsgHtml( $student->getField( 'active_enroll' ) ? 'ep-student-actively-enrolled' : 'ep-student-no-active-enroll' );

		return $stats;
	}

}
