<?php

/* Pages */

// Drafts Special Page
class DraftsPage extends SpecialPage {

	/* Functions */

	function DraftsPage() {
		// Initialize special page
		SpecialPage::SpecialPage( 'Drafts' );

		// Internationalization
		wfLoadExtensionMessages( 'Drafts' );
	}

	function execute( $par ) {
		global $wgRequest, $wgOut, $wgUser, $wgTitle;

		// Begin output
		$this->setHeaders();

		// Make sure the user is logged in
		if ( !$wgUser->isLoggedIn() ) {
			// If not, let them know they need to
			$wgOut->loginToUse();

			// Continue
			return true;
		}

		// Handle discarding
		$draft = new Draft( $wgRequest->getIntOrNull( 'discard' ) );
		if ( $draft->exists() )
		{
			// Discard draft
			$draft->discard();
			
			// Redirect to the article editor or view if returnto was set
			$section = $wgRequest->getIntOrNull( 'section' );
			$urlSection = $section !== null ? "&section={$section}" : '';
			switch( $wgRequest->getText( 'returnto' ) )
			{
				case 'edit':
					$title = Title::newFromDBKey( $draft->getTitle() );
					$wgOut->redirect( wfExpandURL( $title->getEditURL() . $urlSection ) );
					break;
				case 'view':
					$title = Title::newFromDBKey( $draft->getTitle() );
					$wgOut->redirect( wfExpandURL( $title->getFullURL() . $urlSection ) );
					break;
			}
		}

		// Show list of drafts, or a message that there are none
		if( Draft::listDrafts() == 0 ) {
			$wgOut->addHTML( wfMsgHTML( 'drafts-view-nonesaved' ) );
		}
	}
}
