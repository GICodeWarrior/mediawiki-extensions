<?php

/**
 * 
 *
 * @since 0.1
 *
 * @file SpecialInstitutions.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialInstitutions extends SpecialEPPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'Institutions' );
	}

	/**
	 * Main method.
	 *
	 * @since 0.1
	 *
	 * @param string|null $arg
	 */
	public function execute( $subPage ) {
		parent::execute( $subPage );

		$out = $this->getOutput();

		if ( $this->subPage === '' ) {
			$this->displayPage();
		}
		else {
			$org = EPOrg::has( array( 'name' => $this->subPage ) );
			
			if ( $org === false ) {
				$this->showError( 'ep-institutions-nosuchinstitution', $this->subPage );
				$this->displayPage();
			}
			else {
				$out->redirect( SpecialPage::getTitleFor( 'Institution', $this->subPage )->getLocalURL() );
			}
		}
	}
	
	protected function displayPage() {
		$pager = new EPOrgPager(  );
		
		if ( $pager->getNumRows() ) {
			$this->getOutput()->addHTML(
				$pager->getFilterControl() .
				$pager->getNavigationBar() .
				$pager->getBody() .
				$pager->getNavigationBar()
			);
		}
		else {
			$this->getOutput()->addHTML( $pager->getFilterControl( true ) );
			$this->getOutput()->addWikiMsg( 'ep-institutions-noresults' );
		}
	}

}
