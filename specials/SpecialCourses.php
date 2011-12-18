<?php

/**
 * Page listing all courses in a pager with filter control.
 * Also has a form for adding new items for those with matching priviliges.
 *
 * @since 0.1
 *
 * @file SpecialCourses.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialCourses extends SpecialEPPage {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'Courses' );
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
				$this->showError( wfMessage( 'ep-courses-nosuchcourses', $this->subPage ) );
				$this->displayPage();
			}
			else {
				$out->redirect( SpecialPage::getTitleFor( 'Course', $this->subPage )->getLocalURL() );
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
		
		$pager = new EPCoursePager( $this->getContext() );
		
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
			$this->getOutput()->addWikiMsg( 'ep-courses-noresults' );
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
				'action' => SpecialPage::getTitleFor( 'EditCourse' )->getLocalURL(),
			)
		) );

		$out->addHTML( '<fieldset>' );

		$out->addHTML( '<legend>' . wfMsgHtml( 'ep-courses-addnew' ) . '</legend>' );

		$out->addHTML( Html::element( 'p', array(), wfMsg( 'ep-courses-namedoc' ) ) );

		$out->addHTML( Xml::inputLabel( wfMsg( 'ep-courses-newname' ), 'newname', 'newname' ) );

		$out->addHTML( '&#160;' . Html::input(
			'addneworg',
			wfMsg( 'ep-courses-add' ),
			'submit'
		) );

		$out->addHTML( Html::hidden( 'newEditToken', $this->getUser()->editToken() ) );

		$out->addHTML( '</fieldset></form>' );
	}

}
