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
			EPTerm::displayAddNewRegion( $this->getContext() );
			EPTerm::displayPager( $this->getContext() );
		}
		else {
			$this->getOutput()->redirect( SpecialPage::getTitleFor( 'Term', $this->subPage )->getLocalURL() );
		}
	}
	
	/**
	 * Display all the stuff that should be on the page.
	 * 
	 * @since 0.1
	 */
	protected function displayPage() {
		$user = $this->getUser();
		
		$courses = EPCourse::getEditableCourses( $this->getUser() );
		
		if ( count( $courses ) > 0 ) {
			$this->displayAddNewControl( $courses );
		}
		elseif ( $user->isAllowed( 'epmentor' ) ) {
			$this->getOutput()->addWikiMsg( 'ep-terms-addcoursefirst' );
		}
		
		$pager = new EPTermPager( $this->getContext() );
		
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
			$this->getOutput()->addWikiMsg( 'ep-terms-noresults' );
		}
	}



}
