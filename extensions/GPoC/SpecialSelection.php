<?php
/**
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "not a valid entry point.\n" );
	die( 1 );
}

class SpecialSelection extends SpecialPage {

	public function __construct() {
		parent::__construct( 'Selection' );
	}

	public function execute( $par ) {
        global $wgOut, $wgRequest;

		$name = $par;

		$entries = Selection::getSelection( $name );
		$this->setHeaders();

		$wgOut->setPageTitle("Selection");

		$template = new SelectionTemplate();
		$template->set( 'articles', $entries );

		$wgOut->addTemplate( $template );

	}
}
