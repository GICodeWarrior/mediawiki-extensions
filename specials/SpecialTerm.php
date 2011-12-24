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
	 * @param string $arg
	 */
	public function execute( $subPage ) {
		parent::execute( $subPage );

		$out = $this->getOutput();
		
		if ( trim( $subPage ) === '' ) {
			$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Terms' )->getLocalURL() );
		}
		else {
			$out->setPageTitle( wfMsgExt( 'ep-term-title', 'parsemag', $this->subPage ) );
		
			$this->displayNavigation();
			
			$term = EPTerm::selectRow( null, array( 'id' => $this->subPage ) );
			
			if ( $term === false ) {
				if ( $this->getUser()->isAllowed( 'epadmin' ) || $this->getUser()->isAllowed( 'epmentor' ) ) {
					$out->addWikiMsg( 'ep-term-create', $this->subPage );
					EPTerm::displayAddNewRegion( $this->getContext(), array( 'id' => $this->subPage ) );
				}
				else {
					$out->addWikiMsg( 'ep-term-none', $this->subPage );
				}
			}
			else {
				$this->displayInfo( $term );
				
				$out->addHTML( Html::element( 'h2', array(), wfMsg( 'ep-term-students' ) ) );
				
				// TODO: students
			}
		}
	}
	
	/**
	 * Display the terms info.
	 * 
	 * @since 0.1
	 * 
	 * @param EPTerm $term
	 */
	protected function displayInfo( EPTerm $term ) {
		$out = $this->getOutput();
		
		
	}

}
