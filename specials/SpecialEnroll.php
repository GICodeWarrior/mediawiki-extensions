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
		// We can not demand ep-enroll here already, since the user might first need to login.
		parent::__construct( 'Enroll', '', false );
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

		$args = explode( '/', $this->subPage, 2 );

		if ( !ctype_digit( $args[0] ) ) {
			$this->showWarning( wfMessage( $args[0] === '' ? 'ep-enroll-no-id' : 'ep-enroll-invalid-id' ) );
		}
		else {
			$term = EPTerm::selectRow( null, array( 'id' => $args[0] ) );
			
			if ( $term === false ) {
				$this->showWarning( wfMessage( 'ep-enroll-invalid-id' ) );
			}
			elseif ( $term->getStatus() === 'current' ) {
				$token = '';
				$tokenIsValid = $term->getField( 'token' ) === '';
				
				if ( !$tokenIsValid ) {
					$tokenIsValid = $term->getField( 'token' ) === $token;
					
					if ( count( $args ) === 2 ) {
						$token = $args[1];
					}
					elseif ( $this->getRequest()->wasPosted() && $this->getRequest()->getCheck( 'wptoken' ) ) {
						$token = $this->getRequest()->getText( 'wptoken' );
					}
				}
				
				if ( $tokenIsValid ) {
					$this->showEnrollmentView( $term );
				}
				else {
					if ( $token !== '' ) {
						$this->showWarning( wfMessage( 'ep-enroll-invalid-token' ) );
					}
					
					$this->showTokenInput();
				}
			}
			else {
				$this->showWarning( wfMessage( 'ep-enroll-term-' . $term->getStatus() ) );
			}
		}
	}
	
	/**
	 * Shows the actuall enrollment view.
	 * Should only be called after everything checks out, ie the user can enroll in the term.
	 * 
	 * @since 0.1
	 * 
	 * @param EPTerm $term
	 */
	protected function showEnrollmentView( EPTerm $term ) {
		$this->term = $term;

		$this->setPageTitle( $term );

		if ( $this->getUser()->isLoggedIn() ) {
			if ( $this->getUser()->isAllowed( 'ep-enroll' ) ) {
				$user = $this->getUser();
				$hasFields = trim( $user->getRealName() ) !== '' && $user->getOption( 'gender' ) !== 'unknown';

				if ( $hasFields ) {
					$this->doEnroll( $term );
					$this->onSuccess();
				}
				else {
					$this->showEnrollmentForm( $term );
				}
			}
			else {
				$this->showWarning( wfMessage( 'ep-enroll-not-allowed' ) );
			}
		}
		else {
			$this->showSignupLink();
		}	
	}
	
	/**
	 * Show an input for a token.
	 * 
	 * @since 0.1
	 */
	protected function showTokenInput() {
		$out = $this->getOutput();
		
		$out->addHTML( Html::openElement(
			'form',
			array(
				'method' => 'post',
				'action' => $this->getTitle( $this->subPage )->getLocalURL(),
			)
		) );

		$out->addHTML( '<fieldset>' );

		$out->addHTML( '<legend>' . wfMsgHtml( 'ep-enroll-add-token' ) . '</legend>' );

		$out->addHTML( Html::element( 'p', array(), wfMsg( 'ep-enroll-add-token-doc' ) ) );

		$out->addHTML( '&#160;' . Xml::inputLabel( wfMsg( 'ep-enroll-token' ), 'wptoken', 'wptoken' ) );

		$out->addHTML( '&#160;' . Html::input(
			'submittoken',
			wfMsg( 'ep-enroll-submit-token' ),
			'submit'
		) );

		$out->addHTML( '</fieldset></form>' );
	}

	/**
	 * Set the page title.
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
	 * Show links to signup.
	 *
	 * @since 0.1
	 */
	protected function showSignupLink() {
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
	 * Just enroll the user in the term.
	 *
	 * @since 0.1
	 *
	 * @param EPTerm $term
	 *
	 * @return boolean Success indicator
	 */
	protected function doEnroll( EPTerm $term ) {
		$student = EPStudent::newFromUser( $this->getUser(), array( 'id' ) );
		$hadStudent = $student !== false;

		$fields = array(
			'active_enroll' => 1
		);

		if ( !$hadStudent ) {
			$student = new EPStudent( array( 'user_id' => $this->getUser()->getId() ), true );
			$fields['first_enroll'] = wfTimestamp( TS_MW );
		}

		$student->setFields( $fields );

		$success = $student->writeToDB();

		if ( $success ) {
			$success = $student->associateWithTerms( array( $term ) ) && $success;

			if ( !$hadStudent ) {
				$this->getUser()->setOption( 'ep_showtoplink', true );
				$this->getUser()->saveSettings();
			}
		}

		return $success;
	}

	/**
	 * Create and display the enrollment form.
	 *
	 * @since 0.1
	 *
	 * @param EPTerm $term
	 */
	protected function showEnrollmentForm( EPTerm $term ) {
		$this->getOutput()->addWikiMsg( 'ep-enroll-header' );

		$form = new HTMLForm( $this->getFormFields(), $this->getContext() );

		$form->setSubmitCallback( array( $this, 'handleSubmission' ) );
		$form->setSubmitText( wfMsg( 'educationprogram-org-submit' ) );
		$form->setWrapperLegend( $this->msg( 'ep-enroll-legend' ) );

		if ( $form->show() ) {
			$this->onSuccess();
		}
	}

	/**
	 * Returns the definitions for the fields of the signup form.
	 *
	 * @since 0.1
	 *
	 * @return array
	 */
	protected function getFormFields() {
		$fields = array();

		$user = $this->getUser();

		$fields['enroll'] = array(
			'type' => 'hidden',
			'default' => 1
		);

		if ( trim( $user->getRealName() ) === '' ) {
			$fields['realname'] = array(
				'type' => 'text',
				'default' => '',
				'label-message' => 'ep-enroll-realname',
				'required' => true,
				'validation-callback' => function( $value, array $alldata = null ) {
					return strlen( $value ) < 2 ? wfMsgExt( 'ep-enroll-invalid-name', 'parsemag', 2 ) : true;
				}
			);
		}

		if ( $user->getOption( 'gender' ) === 'unknown' ) {
			$fields['gender'] = array(
				'type' => 'select',
				'default' => 'unknown',
				'label-message' => 'ep-enroll-gender',
				'validation-callback' => function( $value, array $alldata = null ) {
					return in_array( $value, array( 'male', 'female', 'unknown' ) ) ? true : wfMsg( 'ep-enroll-invalid-gender' );
				} ,
				'options' => array(
					wfMsg( 'gender-male' ) => 'male',
					wfMsg( 'gender-female' ) => 'female',
					wfMsg( 'gender-unknown' ) => 'unknown',
				)
			);
		}
		
		if ( $this->getRequest()->getCheck( 'wptoken' ) ) {
			$fields['token'] = array(
				'type' => 'hidden',
				'default' => $this->getRequest()->getText( 'wptoken' )
			);
		}

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
		if ( array_key_exists( 'realname', $data ) ) {
			$this->getUser()->setRealName( $data['realname'] );
		}

		if ( array_key_exists( 'gender', $data ) ) {
			$this->getUser()->setOption( 'gender', $data['gender'] );
		}

		$this->getUser()->saveSettings();

		if ( $this->doEnroll( $this->term ) ) {
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
