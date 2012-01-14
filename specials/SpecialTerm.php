<?php

/**
 * Shows the info for a single term, with management and
 * enrollment controls depending on the user and his rights.
 *
 * @since 0.1
 *
 * @file SpecialTerm.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialTerm extends SpecialEPPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'Term' );
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
			$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Terms' )->getLocalURL() );
		}
		else {
			$out->setPageTitle( wfMsgExt( 'ep-term-title', 'parsemag', $this->subPage ) );

			$term = EPTerm::selectRow( null, array( 'id' => $this->subPage ) );

			if ( $term === false ) {
				$this->displayNavigation();

				if ( $this->getUser()->isAllowed( 'ep-term' ) ) {
					$out->addWikiMsg( 'ep-term-create', $this->subPage );
					EPTerm::displayAddNewRegion( $this->getContext(), array( 'id' => $this->subPage ) );
				}
				else {
					$out->addWikiMsg( 'ep-term-none', $this->subPage );
				}
			}
			else {
				$links = array();

				if ( $this->getUser()->isAllowed( 'ep-term' ) ) {
					$links[wfMsg( 'ep-term-nav-edit' )] = SpecialPage::getTitleFor( 'EditTerm', $this->subPage );
				}

				$this->displayNavigation( $links );

				$this->displaySummary( $term );

				$out->addHTML( Html::element( 'h2', array(), wfMsg( 'ep-term-description' ) ) );

				$out->addHTML( $this->getOutput()->parse( $term->getField( 'description' ) ) );

				$out->addHTML( Html::element( 'h2', array(), wfMsg( 'ep-term-students' ) ) );

				$studentIds = array_map(
					function( EPStudent $student ) {
						return $student->getId();
					},
					$term->getStudents( 'id' )
				);

				EPStudent::displayPager( $this->getContext(), array( 'id' => $studentIds ) );
			}
		}
	}

	/**
	 * Gets the summary data.
	 *
	 * @since 0.1
	 *
	 * @param EPTerm $term
	 *
	 * @return array
	 */
	protected function getSummaryData( EPDBObject $term ) {
		$stats = array();

		$org = EPOrg::selectFieldsRow( 'name', array( 'id' => $term->getField( 'org_id' ) ) );

		$stats['org'] = Linker::linkKnown(
			SpecialPage::getTitleFor( 'Institution', $org ),
			htmlspecialchars( $org )
		);

		$course = EPCourse::selectFieldsRow( 'name', array( 'id' => $term->getField( 'course_id' ) ) );

		$stats['course'] = Linker::linkKnown(
			SpecialPage::getTitleFor( 'Course', $course ),
			htmlspecialchars( $course )
		);

		$stats['year'] = htmlspecialchars( $term->getField( 'year' ) ); // TODO: how to properly i18n this?
		$stats['start'] = htmlspecialchars( $this->getLanguage()->timeanddate( $term->getField( 'start' ), true ) );
		$stats['end'] = htmlspecialchars( $this->getLanguage()->timeanddate( $term->getField( 'end' ), true ) );

		if ( $this->getUser()->isAllowed( 'ep-token' ) ) {
			$stats['token'] = Linker::linkKnown(
				SpecialPage::getTitleFor( 'Enroll', $term->getId() . '/' . $term->getField( 'token' ) ),
				htmlspecialchars( $term->getField( 'token' ) )
			);
		}

		return $stats;
	}

}
