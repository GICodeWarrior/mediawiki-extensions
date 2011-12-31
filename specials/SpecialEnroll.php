<?php

/**
 *
 *
 * @since 0.1
 *
 * @file SpecialEnroll.php
 * @ingroup EducationProgram
 *
 * @licence GNU GPL v3 or later
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class SpecialEnroll extends SpecialEPPage {

	/**
	 * @since 0.1
	 * @var EPTerm
	 */
	protected $term;

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'Enroll', '', false );
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

		$args = explode( '/', $this->subPage, 2 );
		
		if ( !ctype_digit( $args[0] ) ) {
			$this->showWarning( wfMessage( $args[0] === '' ? 'ep-enroll-no-id' : 'ep-enroll-invalid-id' ) );
		}
		elseif ( count( $args ) === 1 ) {
			// TODO: might want to have an input here
			$this->showWarning( wfMessage( 'ep-enroll-no-token' ) );
		}
		elseif ( count( $args ) === 2 ) {
			$term = EPTerm::selectRow( null, array(
				'id' => $args[0],
				'token' => strtolower( $args[1] )
			) );
			
			if ( $term === false ) {
				$this->showWarning( wfMessage( 'ep-enroll-invalid-token' ) );
			}
			else {
				$this->term = $term;

				$this->setPageTitle( $term );

				if ( $this->getUser()->isLoggedIn() ) {
					if ( $this->getUser()->isAllowed( 'epstudent' ) ) {
						$this->showEnrollmentForm( $term );
					}
					else {
						$this->showWarning( wfMessage( 'ep-enroll-not-allowed' ) );
					}
				}
				else {
					$this->showSignupLink( $term );
				}
			}
		}
	}

	/**
	 *
	 *
	 * @since 0.1
	 *
	 * @param EPTerm $term
	 */
	protected function setPageTitle( EPTerm $term ) {
		$this->getOutput()->setPageTitle( wfMsgExt(
			'ep-enroll-title',
			'parsemag',
			$term->getCourse( 'name' )->getField( 'name' ),
			$term->getOrg( 'name' )->getField( 'name' )
		) );
	}

	/**
	 * 
	 * 
	 * @param EPTerm $term
	 * 
	 * @since 0.1
	 */
	protected function showSignupLink( EPTerm $term ) {
		$out = $this->getOutput();
		
		$out->addWikiMsg( 'ep-enroll-login-first' );

		$out->addHTML( '<ul><li>' );

		$out->addHTML( Linker::linkKnown(
			SpecialPage::getTitleFor( 'Userlogin' ),
			wfMsgHtml( 'ep-enroll-login-and-enroll' ),
			array(),
			array(
				'returnto' => $this->getTitle( $this->subPage )->getFullText()
			)
		) );

		$out->addHTML( '</li><li>' );

		$out->addHTML( Linker::linkKnown(
			SpecialPage::getTitleFor( 'Userlogin' ),
			wfMsgHtml( 'ep-enroll-signup-and-enroll' ),
			array(),
			array(
				'returnto' => $this->getTitle( $this->subPage )->getFullText(),
				'type' => 'signup'
			)
		) );

		$out->addHTML( '</li></ul>' );
	}
	
	/**
	 * 
	 * 
	 * @since 0.1
	 * 
	 * @param EPTerm $term
	 */
	protected function showEnrollmentForm( EPTerm $term ) {
		$form = new HTMLForm( $this->getFormFields(), $this->getContext() );

		$form->setSubmitCallback( array( $this, 'handleSubmission' ) );
		$form->setSubmitText( wfMsg( 'educationprogram-org-submit' ) );
		$form->setWrapperLegend( $this->msg( 'ep-enroll-legend' ) );

		if ( $form->show() ) {
			$this->onSuccess();
		}
	}

	/**
	 *
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	protected function getFormFields() {
		$fields = array();

		$fields['enroll'] = array(
			'type' => 'hidden',
			'default' => 1
		);

		return $fields;
	}

	/**
	 * Process the form.  At this point we know that the user passes all the criteria in
	 * userCanExecute().
	 *
	 * @param array $data
	 *
	 * @return Bool|Array
	 */
	public function handleSubmission( array $data ) {
		$student = EPStudent::newFromUser( $this->getUser(), array( 'id' ) );

		if ( $student === false ) {
			$student = new EPStudent( array( 'user_id' => $this->getUser()->getId() ), true );
		}

		$fields = array(); // TODO

		$student->setFields( $fields );

		$success = $student->writeToDB();

		if ( $success ) {
			$success = $student->associateWithTerms( array( $this->term ) ) && $success;
			$this->getUser()->setOption( 'ep_showtoplink', true );
			$this->getUser()->saveSettings(); // TODO: can't we just save this single option instead of everything?
		}

		if ( $success ) {
			return true;
		}
		else {
			return array(); // TODO
		}
	}

	/**
	 * Gets called after the form is saved.
	 *
	 * @since 0.1
	 */
	public function onSuccess() {
		$this->getOutput()->redirect(
			SpecialPage::getTitleFor( 'MyCourses' )->getLocalURL( array(
				'enrolled' => $this->term->getId()
			) )
		);
	}

}
