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
				if ( $this->getUser()->isLoggedIn() ) {
					if ( $this->getUser()->isAllowed( 'epstudent' ) ) {
						$this->showEntrollmentForm( $term );
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
	 * @param EPTerm $term
	 * 
	 * @since 0.1
	 */
	protected function showSignupLink( EPTerm $term ) {
		$out = $this->getOutput();
		
		$out->addWikiMsg( 'ep-enroll-login-first' );
		
		$out->addHTML( Linker::linkKnown(
			SpecialPage::getTitleFor( 'UserLogin' ),
			wfMsgHtml( 'ep-enroll-login-and-entroll' ),
			array(),
			array(
				'returnto' => $this->getTitle( $this->subPage )->getFullText()
			)
		) );
		
		$out->addHTML( Linker::linkKnown(
			SpecialPage::getTitleFor( 'UserLogin' ),
			wfMsgHtml( 'ep-enroll-signup-and-entroll' ),
			array(),
			array(
				'returnto' => $this->getTitle( $this->subPage )->getFullText(),
				'type' => 'signup'
			)
		) );
	}
	
	/**
	 * 
	 * 
	 * @since 0.1
	 * 
	 * @param EPTerm $term
	 */
	protected function showEntrollmentForm( EPTerm $term ) {
		
	}

}
