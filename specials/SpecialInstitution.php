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
	 * @param string $arg
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
				if ( $this->getUser()->isAllowed( 'epadmin' ) ) {
					$out->addWikiMsg( 'ep-institution-create', $this->subPage );
					EPOrg::displayAddNewControl( $this->getContext(), array( 'name' => $this->subPage ) );
				}
				else {
					$out->addWikiMsg( 'ep-institution-none', $this->subPage );
				}
			}
			else {
				$this->displayInfo( $org );
				
				$out->addHTML( Html::element( 'h2', array(), wfMsg( 'ep-institution-courses' ) ) );
				
				EPCourse::displayPager( $this->getContext(), array( 'org_id' => $org->getId() ) );
			}
		}
	}
	
	/**
	 * Display the orgs info.
	 * 
	 * @since 0.1
	 * 
	 * @param EPOrg $org
	 */
	protected function displayInfo( EPOrg $org ) {
		$out = $this->getOutput();
		
		
	}
	
}
