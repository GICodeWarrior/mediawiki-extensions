<?php

/**
 * Shows the info for a single institution, with management and
 * enrollment controls depending on the user and his rights.
 *
 * @since 0.1
 *
 * @file SpecialInstitution.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialInstitution extends SpecialEPPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'Institution' );
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
			$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Institutions' )->getLocalURL() );
		}
		else {
			$out->setPageTitle( wfMsgExt( 'ep-institution-title', 'parsemag', $this->subPage ) );
			
			$org = EPOrg::selectRow( null, array( 'name' => $this->subPage ) );
			
			if ( $org === false ) {
				$this->displayNavigation();
				
				if ( $this->getUser()->isAllowed( 'epadmin' ) ) {
					$out->addWikiMsg( 'ep-institution-create', $this->subPage );
					EPOrg::displayAddNewControl( $this->getContext(), array( 'name' => $this->subPage ) );
				}
				else {
					$out->addWikiMsg( 'ep-institution-none', $this->subPage );
				}
			}
			else {
				$links = array();
				
				if ( $this->getUser()->isAllowed( 'epadmin' ) ) {
					$links[wfMsg( 'ep-institution-nav-edit' )] = SpecialPage::getTitleFor( 'EditInstitution', $this->subPage );
				}
				
				$this->displayNavigation( $links );
				
				$this->displaySummary( $org );
				
				$out->addHTML( Html::element( 'h2', array(), wfMsg( 'ep-institution-courses' ) ) );
				
				EPCourse::displayPager( $this->getContext(), array( 'org_id' => $org->getId() ) );
			}
		}
	}
	
	/**
	 * Gets the summary data.
	 *
	 * @since 0.1
	 *
	 * @param EPOrg $org
	 *
	 * @return array
	 */
	protected function getSummaryData( EPDBObject $org ) {
		$stats = array();

		$stats['name'] = $org->getField( 'name' );
		$stats['city'] = $org->getField( 'city' );
		
		$countries = CountryNames::getNames( $this->getLanguage()->getCode() );
		$stats['country'] = $countries[$org->getField( 'country' )];

		foreach ( $stats as &$stat ) {
			$stat = htmlspecialchars( $stat );
		}

		return $stats;
	}
	
}
