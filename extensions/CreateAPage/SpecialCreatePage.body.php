<?php

class CreatePage extends SpecialPage {

	/**
	 * Constructor -- set up the new special page
	 */
	public function __construct() {
		parent::__construct( 'CreatePage', 'createpage' );
	}

	/**
	 * Show the special page
	 *
	 * @param $par Mixed: parameter passed to the page or null
	 */
	public function execute( $par ) {
		global $wgOut, $wgUser, $wgRequest;

		// If user is blocked, s/he doesn't need to access this page
		if ( $wgUser->isBlocked() ) {
			$wgOut->blockedPage();
			return;
		}

		// Is the database locked?
		if( wfReadOnly() ) {
			$wgOut->readOnlyPage();
			return;
		}

		// Do we have the required permissions?
		if( !$wgUser->isAllowed( 'createpage' ) ) {
			$wgOut->permissionRequired( 'createpage' );
			return;
		}

		// Set the page title, robot policies, etc.
		$this->setHeaders();

		// Add YUI CSS & JS
		$out->addScript( '<script language="javascript" src="http://yui.yahooapis.com/2.5.2/build/utilities/utilities.js"></script>' . "\n" );
		$out->addScript( '<script language="javascript" src="http://yui.yahooapis.com/2.5.2/build/container/container-min.js"></script>' . "\n" );
		// this MUST be included so that the overlay thingy on
		// Special:CreatePage works properly
		$out->addExtensionStyle( 'http://yui.yahooapis.com/2.5.2/build/container/assets/container.css' );

		$mainForm = new CreatePageCreateplateForm( $par );

		$action = $wgRequest->getVal( 'action' );
		if ( $wgRequest->wasPosted() && $action == 'submit' ) {
			$mainForm->submitForm();
		} elseif( $action == 'check' ) {
			$mainForm->checkArticleExists( $wgRequest->getVal( 'to_check' ), true );
		} else {
			$mainForm->showForm( '' );
			$mainForm->showCreateplate( true );
		}
	}

}