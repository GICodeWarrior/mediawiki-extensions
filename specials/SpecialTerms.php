<?php

/**
 * Page listing all terms in a pager with filter control.
 * Also has a form for adding new items for those with matching priviliges.
 *
 * @since 0.1
 *
 * @file SpecialTerms.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialTerms extends SpecialEPPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'Terms' );
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

		if ( $this->subPage === '' ) {
			$this->displayNavigation();
			EPTerm::displayAddNewRegion( $this->getContext() );
			EPTerm::displayPager( $this->getContext() );
		}
		else {
			$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Term', $this->subPage )->getLocalURL() );
		}
	}

}
