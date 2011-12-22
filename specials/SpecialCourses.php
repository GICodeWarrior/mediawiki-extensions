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
		
		$orgs = EPOrg::getEditableOrgs( $this->getUser() );
		
		if ( count( $orgs ) > 0 ) {
			$this->displayAddNewControl( $orgs );
		}
		elseif ( $user->isAllowed( 'epadmin' ) ) {
			$this->getOutput()->addWikiMsg( 'ep-courses-noorgs' );
		}
		elseif ( $user->isAllowed( 'epmentor' ) ) {
			$this->getOutput()->addWikiMsg( 'ep-courses-addorgfirst' );
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
	 * 
	 * @param array $orgs
	 */
	protected function displayAddNewControl( array /* of EPOrg */ $orgs ) {
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

		$out->addHTML( Html::element( 'label', array( 'for' => 'neworg' ), wfMsg( 'ep-courses-neworg' ) ) );
		
		$out->addHTML( '&#160;' );
		
		$select = new XmlSelect( 'neworg', 'neworg' );
		$select->addOptions( EPOrg::getOrgOptions( $orgs ) );
		$out->addHTML( $select->getHTML() );
		
		$out->addHTML( '&#160;' );
		
		$out->addHTML( Xml::inputLabel( wfMsg( 'ep-courses-newname' ), 'newname', 'newname' ) );

		$out->addHTML( '&#160;' );
		
		$out->addHTML( Html::input(
			'addneworg',
			wfMsg( 'ep-courses-add' ),
			'submit'
		) );

		$out->addHTML( Html::hidden( 'newEditToken', $this->getUser()->editToken() ) );

		$out->addHTML( '</fieldset></form>' );
	}

}
