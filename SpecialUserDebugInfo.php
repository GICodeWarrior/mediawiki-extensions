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
		$wgOut->addHTML( Xml::openElement( 'table', array( 'class' => 'wikitable' ) ) );

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

		$this->printRow( 'userdebuginfo-useragent', htmlspecialchars( $_SERVER['HTTP_USER_AGENT'] ) );

		if ( isset( $_SERVER['REMOTE_HOST'] ) ) {
			$this->printRow( 'userdebuginfo-remotehost', $_SERVER['REMOTE_HOST'] );
		}

		$this->printRow( 'userdebuginfo-remoteaddr', wfGetIP() );
		$this->printRow( 'userdebuginfo-language', htmlspecialchars( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) );

		$wgOut->addHTML( '</tbody>' );
		$wgOut->addHTML( '</table>' );
	}

	/**
	 * @param $key string Message key to be converted for output
	 * @param $value string Text to output
	 */
	private function printRow( $key, $value ) {
		global $wgOut;
		$wgOut->addHTML( '<tr>' );
		$wgOut->addHTML( '<td>' );
		$wgOut->addWikiMsg( $key );
		$wgOut->addHTML( '</td>' );

		$wgOut->addHTML( '<td>' );
		$wgOut->addHTML( $value );
		$wgOut->addHTML( '</td>' );

		$wgOut->addHTML( '</tr>' );
	}
}

