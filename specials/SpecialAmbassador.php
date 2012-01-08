<?php

/**
 * Shows the info for a single ambassador.
 *
 * @since 0.1
 *
 * @file SpecialAmbassador.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialAmbassador extends SpecialEPPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'Ambassador' );
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
			$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Ambassadors' )->getLocalURL() );
		}
		else {
			$out->setPageTitle( wfMsgExt( 'ep-ambassador-title', 'parsemag', $this->subPage ) );

			$this->displayNavigation();

			$mentor = false; //EPMentor::selectRow( null, array( 'id' => $this->subPage ) );
			
			if ( $mentor === false ) {
				$this->showWarning( wfMessage( 'ep-ambassador-does-not-exist', $this->subPage ) );
			}
			else {
				$this->displaySummary( $mentor );
			}
		}
	}
	
	/**
	 * Gets the summary data.
	 *
	 * @since 0.1
	 *
	 * @param EPMentor $mentor
	 *
	 * @return array
	 */
	protected function getSummaryData( EPDBObject $mentor ) {
		$stats = array();

		$orgs = array();

		foreach ( $mentor->getOrgs( 'name' ) as /* EPOrg */ $org ) {
			$orgs[] = Linker::linkKnown(
				SpecialPage::getTitleFor( 'Institution', $org->getField( 'name' ) ),
				htmlspecialchars( $org->getField( 'name' ) )
			);
		}

		$stats['orgs'] = $this->getLanguage()->pipeList( $orgs );

		return $stats;
	}

}
