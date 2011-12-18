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

		$out = $this->getOutput();

		if ( $this->subPage === '' ) {
			$this->displayPage();
		}
		else {
			$org = EPOrg::has( array( 'name' => $this->subPage ) );
			
			if ( $org === false ) {
				$this->showError( wfMessage( 'ep-terms-nosuchcourses', $this->subPage ) );
				$this->displayPage();
			}
			else {
				$out->redirect( SpecialPage::getTitleFor( 'Term', $this->subPage )->getLocalURL() );
			}
		}
	}
	
	/**
	 * Display all the stuff that should be on the page.
	 * 
	 * @since 0.1
	 */
	protected function displayPage() {
		$user = $this->getUser();
		
		if ( $user->isAllowed( 'epadmin' ) ) {
			$this->displayAddNewControl();
		}
		elseif ( $user->isAllowed( 'epmentor' ) ) {
			$mentor = EPMentor::select( array( 'user_id' => $user->getId() ) );
			
			if ( $mentor !== false && count( $mentor->getOrgs() ) > 0 ) {
				$this->displayAddNewControl();
			}
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
				'action' => SpecialPage::getTitleFor( 'EditTerm' )->getLocalURL(),
			)
		) );

		$out->addHTML( '<fieldset>' );

		$out->addHTML( '<legend>' . wfMsgHtml( 'ep-terms-addnew' ) . '</legend>' );

		$out->addHTML( Html::element( 'p', array(), wfMsg( 'ep-terms-namedoc' ) ) );

		$out->addHTML( Html::element( 'label', array( 'for' => 'newcourse' ), wfMsg( 'ep-terms-newcourse' ) ) );
		
		$select = new XmlSelect( 'newcourse', 'newcourse' );
		$select->addOptions( EPCourse::getCoursesForAdmin( $this->getUser() ) );
		$out->addHTML( $select->getHTML() );
		
		$out->addHTML( Xml::inputLabel( wfMsg( 'ep-terms-newyear' ), 'newyear', 'newyear' ) );

		$out->addHTML( '&#160;' . Html::input(
			'addnewterm',
			wfMsg( 'ep-terms-add' ),
			'submit'
		) );

		$out->addHTML( Html::hidden( 'newEditToken', $this->getUser()->editToken() ) );

		$out->addHTML( '</fieldset></form>' );
	}

}
