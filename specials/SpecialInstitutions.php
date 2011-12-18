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
				$this->showError( wfMessage( 'ep-institutions-nosuchinstitution', $this->subPage ) );
				$this->displayPage();
			}
			else {
				$out->redirect( SpecialPage::getTitleFor( 'Institution', $this->subPage )->getLocalURL() );
			}
		}
	}
	
	/**
	 * Display all the stuff that should be on the page.
	 * 
	 * @since 0.1
	 */
	protected function displayPage() {
		if ( $this->getUser()->isAllowed( 'epadmin' ) ) {
			$this->displayAddNewControl();
		}
		
		$pager = new EPOrgPager( $this->getContext() );
		
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
	
	/**
	 * Displays a small form to add a new institution.
	 *
	 * @since 0.1
	 */
	protected function displayAddNewControl() {
		$out = $this->getOutput();

		$out->addHTML( Html::openElement(
			'form',
			array(
				'method' => 'post',
				'action' => SpecialPage::getTitleFor( 'EditInstitution' )->getLocalURL(),
			)
		) );

		$out->addHTML( '<fieldset>' );

		$out->addHTML( '<legend>' . wfMsgHtml( 'ep-institutions-addnew' ) . '</legend>' );

		$out->addHTML( Html::element( 'p', array(), wfMsg( 'ep-institutions-namedoc' ) ) );

		$out->addHTML( Xml::inputLabel( wfMsg( 'ep-institutions-newname' ), 'newname', 'newname' ) );

		$out->addHTML( '&#160;' . Html::input(
			'addneworg',
			wfMsg( 'ep-institutions-add' ),
			'submit'
		) );

		$out->addHTML( Html::hidden( 'newEditToken', $this->getUser()->editToken() ) );

		$out->addHTML( '</fieldset></form>' );
	}

}
