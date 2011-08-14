<?php

/**
 *
 */
class SpecialUserDebugInfo extends SpecialPage {

	public function __construct() {
		parent::__construct( 'UserDebugInfo' );
	}

	public function execute( $subpage ) {
		$this->setHeaders();
		global $wgOut;
		$wgOut->addHTML( Xml::openElement( 'table', array( 'class' => 'TablePager' ) ) );

		$wgOut->addHTML( '<thead>' );
		$wgOut->addHTML( '<tr>' );
		$wgOut->addHTML( '<th>' );
		$wgOut->addWikiMsg( 'userdebuginfo-key' );
		$wgOut->addHTML( '</th>' );
		$wgOut->addHTML( '<th>' );
		$wgOut->addWikiMsg( 'userdebuginfo-value' );
		$wgOut->addHTML( '</th>' );
		$wgOut->addHTML( '</tr>' );
		$wgOut->addHTML( '</thead>' );

		$wgOut->addHTML( '<tbody>' );

		$wgOut->addHTML( '<tr>' );
		$wgOut->addHTML( '<td>' );
		$wgOut->addWikiMsg( 'userdebuginfo-useragent' );
		$wgOut->addHTML( '</td>' );

		$wgOut->addHTML( '<td>' );
		$wgOut->addHTML( $_SERVER['HTTP_USER_AGENT'] );
		$wgOut->addHTML( '</td>' );

		$wgOut->addHTML( '</tr>' );

		if ( isset( $_SERVER['REMOTE_HOST'] ) ) {
			$wgOut->addHTML( '<tr>' );
			$wgOut->addHTML( '<td>' );
			$wgOut->addWikiMsg( 'userdebuginfo-remotehost' );
			$wgOut->addHTML( '</td>' );

			$wgOut->addHTML( '<td>' );
			$wgOut->addHTML( $_SERVER['REMOTE_HOST'] );
			$wgOut->addHTML( '</td>' );

			$wgOut->addHTML( '</tr>' );
		}

		$wgOut->addHTML( '<tr>' );
		$wgOut->addHTML( '<td>' );
		$wgOut->addWikiMsg( 'userdebuginfo-remoteaddr' );
		$wgOut->addHTML( '</td>' );

		$wgOut->addHTML( '<td>' );
		$wgOut->addHTML( $_SERVER['REMOTE_ADDR'] );
		$wgOut->addHTML( '</td>' );

		$wgOut->addHTML( '</tr>' );

		$wgOut->addHTML( '</tbody>' );
		$wgOut->addHTML( '</table>' );
	}
}

