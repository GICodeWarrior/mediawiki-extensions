<?php

class EmailNewArticle extends UnlistedSpecialPage {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct( 'EmailNewArticle' );
	}

	/**
	 * Show the special page
	 *
	 * @param $par Mixed: parameter passed to the page or null
	 */
	public function execute( $par ) {
		global $wgOut, $wgRequest, $wgScriptPath;
		wfLoadExtensionMessages( 'InviteContacts' );
		$wgOut->setPageTitle( wfMsg( 'invite-sharearticle' ) );

		$pageFromRequest = $wgRequest->getVal( 'page' );
		if ( isset( $pageFromRequest ) ) {
			$page = $pageFromRequest;
		} elseif ( isset( $par ) ) {
			$page = $par;
		}
		$new_page = Title::makeTitle( NS_MAIN, $page );
		$invite = SpecialPage::getTitleFor( 'InviteEmail' );

		$wgOut->addExtensionStyle( $wgScriptPath . '/extensions/InviteContacts/css/EmailNewArticle.css' );

		$wgOut->addHTML(
			'<div class="email-new-article-message">'
				. wfMsg( 'send-new-article-to-friends-message' ) .
			'</div>
			<input type="button" class="site-button" onclick="window.location=\'' . $invite->getFullURL( "email_type=view&page={$page}" ) . '\'" value="'  .wfMsg( 'invite-myfriends' ) . '" />
			<input type="button" class="site-button" onclick="window.location=\'' . $new_page->getFullURL() . '\'" value="' . wfMsg( 'invite-nothanks' ) . '" />' . "\n"
		);
	}
}